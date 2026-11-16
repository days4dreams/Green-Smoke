<?php
/**
 * Reads Journal posts and Work projects from the /content folder.
 *
 * Each post or project is one text file:
 *
 *   ---
 *   title: Design for all
 *   date: 2024-06-04
 *   ...more settings...
 *   ---
 *   The article itself, written in Markdown.
 *
 * The file name is the web address: content/journal/design-for-all.md
 * appears at /the-journal/{category}/design-for-all. File names must be
 * lower case letters, numbers and hyphens only, ending in .md.
 */
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/lib/Parsedown.php';

const SLUG_PATTERN = '/^[a-z0-9]+(?:-[a-z0-9]+)*$/';
const CONTENT_DIR  = __DIR__ . '/../content';

/** True when previewing on your own computer (drafts are then shown, marked "Draft"). */
function is_local_preview()
{
    $host = strtolower(explode(':', $_SERVER['HTTP_HOST'] ?? '')[0]);
    return in_array($host, ['localhost', '127.0.0.1'], true);
}

/** Is this a safe address part? Checked before any file is opened, so no one can ask for files outside /content. */
function valid_slug($slug)
{
    return is_string($slug) && preg_match(SLUG_PATTERN, $slug) === 1;
}

/**
 * Split a content file into its settings (the part between the --- lines)
 * and its body. Settings are simple "name: value" lines; true/false become
 * yes/no switches, and the names in $listFields become lists split on commas.
 */
function read_content_file($path, $listFields = [])
{
    $text = str_replace("\r\n", "\n", file_get_contents($path));
    $meta = [];
    $body = $text;

    if (preg_match('/\A---\n(.*?)\n---\n?(.*)\z/s', $text, $m)) {
        $body = $m[2];
        foreach (explode("\n", $m[1]) as $line) {
            if (trim($line) === '' || $line[0] === '#' || strpos($line, ':') === false) {
                continue; // blank lines and # notes are ignored
            }
            [$key, $value] = array_map('trim', explode(':', $line, 2));
            $value = trim($value, "\"'");
            if (in_array(strtolower($value), ['true', 'yes'], true)) {
                $value = true;
            } elseif (in_array(strtolower($value), ['false', 'no', ''], true) && !in_array($key, $listFields, true)) {
                $value = ($value === '') ? '' : false;
            }
            if (in_array($key, $listFields, true)) {
                $value = ($value === '') ? [] : array_values(array_filter(array_map('trim', explode(',', $value))));
            }
            $meta[strtolower($key)] = $value;
        }
    }
    return [$meta, $body];
}

/** Every content file in a folder, keyed by slug (file name without .md). */
function content_files($folder)
{
    $files = [];
    foreach (glob(CONTENT_DIR . "/$folder/*.md") ?: [] as $path) {
        $slug = basename($path, '.md');
        if (valid_slug($slug)) { // template and oddly named files are skipped
            $files[$slug] = $path;
        }
    }
    return $files;
}

/**
 * All Journal posts, newest first.
 * Drafts are left out on the live site. "Coming soon" posts are listed but have no page.
 */
function journal_posts()
{
    global $categories;
    $posts = [];
    foreach (content_files('journal') as $slug => $path) {
        [$meta, $body] = read_content_file($path);
        $post = $meta + [
            'title' => $slug, 'date' => '', 'category' => '', 'summary' => '',
            'image' => '', 'image_alt' => '', 'author' => 'Lauren Young',
            'draft' => false, 'coming_soon' => false,
        ];
        if (!isset($categories[$post['category']])) {
            continue; // unknown category: not shown (check the spelling in the file)
        }
        if ($post['draft'] === true && !is_local_preview()) {
            continue;
        }
        $post['slug'] = $slug;
        $post['body'] = $body;
        $post['url'] = '/the-journal/' . $post['category'] . '/' . $slug;
        $post['has_page'] = ($post['coming_soon'] !== true);
        $post['image'] = $post['image'] ?: $categories[$post['category']]['image'];
        $posts[] = $post;
    }
    usort($posts, function ($a, $b) {
        return strcmp($b['date'], $a['date']);
    });
    return $posts;
}

/** Posts in one category, newest first. */
function journal_posts_in($category)
{
    return array_values(array_filter(journal_posts(), function ($p) use ($category) {
        return $p['category'] === $category;
    }));
}

/** Categories that have at least one post, in the order set in config.php. */
function journal_categories_in_use()
{
    global $categories;
    $used = array_unique(array_column(journal_posts(), 'category'));
    return array_filter($categories, function ($key) use ($used) {
        return in_array($key, $used, true);
    }, ARRAY_FILTER_USE_KEY);
}

/** One post with a page, or null if it doesn't exist (or is a draft on the live site). */
function find_post($category, $slug)
{
    if (!valid_slug($category) || !valid_slug($slug)) {
        return null;
    }
    foreach (journal_posts() as $post) {
        if ($post['slug'] === $slug && $post['category'] === $category && $post['has_page']) {
            return $post;
        }
    }
    return null;
}

/** All Work projects: featured first, then newest year first. */
function work_projects()
{
    $projects = [];
    foreach (content_files('work') as $slug => $path) {
        [$meta, $body] = read_content_file($path, ['tags']);
        $project = $meta + [
            'title' => $slug, 'client' => '', 'year' => '', 'tags' => [], 'summary' => '',
            'image' => '', 'image_alt' => '', 'link' => '', 'featured' => false, 'draft' => false,
        ];
        if ($project['draft'] === true && !is_local_preview()) {
            continue;
        }
        $project['slug'] = $slug;
        $projects[] = $project;
    }
    usort($projects, function ($a, $b) {
        return [$b['featured'] === true, $b['year']] <=> [$a['featured'] === true, $a['year']];
    });
    return $projects;
}

/** "Web Design" -> "web-design", for filter addresses like /work?tag=web-design */
function tag_slug($tag)
{
    return trim(preg_replace('/[^a-z0-9]+/', '-', strtolower($tag)), '-');
}

/** Turn Markdown into HTML for an article. */
function markdown($text)
{
    global $site;
    $html = (new Parsedown())->text($text);

    // A line containing only <br> adds extra space, as in the original articles.
    $html = str_replace('<p><br></p>', '<br>', $html);

    // Links to other websites open in a new tab.
    $html = preg_replace_callback('/<a href="(https?:\/\/[^"]+)"/', function ($m) use ($site) {
        $isOwnSite = strpos($m[1], $site['url']) === 0;
        return $isOwnSite ? $m[0] : $m[0] . ' target="_blank" rel="noopener"';
    }, $html);

    return $html;
}

/** "2024-06-04" -> "4th June 2024" */
function nice_date($date)
{
    $time = strtotime($date);
    return $time ? date('jS F Y', $time) : '';
}

/**
 * An <img> tag with width, height and alt text, plus smaller versions for
 * phones when they exist next to the image (e.g. photo-p-500.jpg,
 * photo-p-800.jpg; see dev/make-image-sizes.sh).
 */
function image_tag($src, $alt, $class = '', $lazy = true)
{
    $file = __DIR__ . '/..' . $src;
    $attrs = ['src' => $src, 'alt' => $alt];
    if (is_file($file) && ($size = @getimagesize($file))) {
        $attrs['width'] = $size[0];
        $attrs['height'] = $size[1];

        $info = pathinfo($src);
        $srcset = [];
        foreach ([500, 800, 1080, 1600, 2000] as $w) {
            $variant = "{$info['dirname']}/{$info['filename']}-p-$w.{$info['extension']}";
            if ($w < $size[0] && is_file(__DIR__ . '/..' . $variant)) {
                $srcset[] = "$variant {$w}w";
            }
        }
        if ($srcset) {
            $srcset[] = "$src {$size[0]}w";
            $attrs['srcset'] = implode(', ', $srcset);
            $attrs['sizes'] = '(max-width: 479px) 100vw, (max-width: 991px) 50vw, 33vw';
        }
    }
    if ($lazy) {
        $attrs['loading'] = 'lazy';
    }
    if ($class) {
        $attrs['class'] = $class;
    }
    $html = '<img';
    foreach ($attrs as $name => $value) {
        $html .= ' ' . $name . '="' . e($value) . '"';
    }
    return $html . '>';
}
