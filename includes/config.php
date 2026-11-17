<?php
/**
 * Site settings — the ONE place to change these details.
 * Every page reads from here, so an update here updates the whole site.
 */

$site = [
    'name'           => 'Green Smoke Studio',
    'tagline'        => 'A considerate creative',
    'url'            => 'https://www.greensmokestudio.com', // no trailing slash
    'email'          => 'hellogreensmoke@gmail.com',
    'location'       => 'Ponteland, Northumberland',
    'address'        => ['7 Lynwood Close', 'Darras Hall', 'Ponteland', 'Northumberland', 'NE20 9JG'],
    'company_number' => '15616860',
    'year'           => date('Y'), // updates itself every January
    'social' => [
        'linkedin' => 'https://www.linkedin.com/in/lauren-jane-young/',
        'behance'  => 'https://www.behance.net/greensmokestudio',
        'facebook' => 'https://www.facebook.com/greensmokestudio',
        'instagram' => 'https://www.instagram.com/greensmokestudio/',
        // Google Business Profile link that opens the "write a review" box
        'google_review' => 'https://g.page/r/CZaHg_ASB42CEAE/review',
    ],
    // Image shown when a page is shared on social media, unless the page sets its own.
    'default_image'  => '/images/green-field-smoke-p-1600.jpg',
];

/**
 * Journal categories. The key (e.g. 'design') is the web address:
 * /the-journal/design. Changing a key changes the address, so prefer
 * changing only the name and text. A category only appears in the
 * Journal menu once it has at least one post (or "coming soon" post).
 */
$categories = [
    'design' => [
        'name'  => 'Thoughts on Design',
        'intro' => 'I discuss topics from the world of print, digital, web and user experience design.',
        'blurb' => 'Interested in design? You\'re in the right place.',
        'image' => '/images/open-book-on-typography.jpg', // used when a post has no image
    ],
    'business' => [
        'name'  => 'Small Business Support',
        'intro' => 'I discuss topics from the world of small business, freelance and creativity in the North East.',
        'blurb' => 'Interested in small business? You\'re in the right place.',
        'image' => '/images/business-setup.jpg',
    ],
    'case-studies' => [
        'name'  => 'Case Studies',
        'intro' => 'A closer look at recent projects: the brief, the thinking and the results.',
        'blurb' => 'Curious how a project comes together? You\'re in the right place.',
        'image' => '/images/multi-portfolio.jpg',
    ],
    'studio' => [
        'name'  => 'Studio Updates',
        'intro' => 'I share stories from life at Green Smoke Studio, including client work and life as a designer.',
        'blurb' => 'Here, you\'ll find the latest news from Green Smoke Studio.',
        'image' => '/images/lauren-coffee.jpg',
    ],
];

/**
 * Work tags, in the order the filter buttons appear on the Work page.
 * A project can have any number of these (see content/work/).
 */
$workTags = ['UX Design', 'Branding', 'Printed Materials', 'Web Design', 'Web Development', 'Digital Design'];

/** Escape text before printing it into HTML. Use for anything that isn't hard-coded markup. */
function e($text)
{
    return htmlspecialchars((string) $text, ENT_QUOTES, 'UTF-8');
}

/** The current page's clean path, e.g. "/the-journal/design" (no query string, no trailing slash). */
function current_path()
{
    $path = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';
    $path = preg_replace('#\.(php|html)$#', '', $path);
    if ($path === '/index') {
        $path = '/';
    }
    return ($path === '/') ? '/' : rtrim($path, '/');
}

/**
 * Is this nav link the section we're in? "/the-journal" is current on
 * "/the-journal" and on every article inside it; "/" only on the homepage.
 */
function is_current($link)
{
    $path = current_path();
    if ($link === '/') {
        return $path === '/';
    }
    return $path === $link || strpos($path, $link . '/') === 0;
}

/** The registered address on one line, e.g. "7 Lynwood Close, Darras Hall, ..." */
function address_line($site)
{
    return implode(', ', $site['address']);
}
