<?php
/**
 * Builds /sitemap.xml for Google and other search engines.
 * Journal posts and categories are added automatically from content/journal/.
 * Add other pages to the list below when you create them.
 */
require __DIR__ . '/includes/content.php';

$pages = [
    '/',
    '/work',
    '/services',
    '/contact',
    '/privacy-policy',
    '/the-journal',
];
foreach (array_keys(journal_categories_in_use()) as $key) {
    $pages[] = '/the-journal/' . $key;
}
foreach (journal_posts() as $post) {
    if ($post['has_page'] && $post['draft'] !== true) {
        $pages[] = $post['url'];
    }
}

header('Content-Type: application/xml; charset=utf-8');
echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
foreach ($pages as $page) {
    echo '  <url><loc>' . e($site['url'] . $page) . "</loc></url>\n";
}
echo "</urlset>\n";
