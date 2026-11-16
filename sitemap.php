<?php
/**
 * Builds /sitemap.xml for Google and other search engines.
 * Add a page's address to the list below when you create a new page.
 * (Phase 2 will add Journal articles and Work projects automatically.)
 */
require __DIR__ . '/includes/config.php';

$pages = [
    '/',
    '/work',
    '/services',
    '/contact',
    '/privacy-policy',
    '/the-journal',
    '/the-journal/design',
    '/the-journal/business',
    '/the-journal/studio',
    '/the-journal/design/design-for-all',
    '/the-journal/business/have-you-considered-recognition',
];

header('Content-Type: application/xml; charset=utf-8');
echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
foreach ($pages as $page) {
    echo '  <url><loc>' . e($site['url'] . $page) . "</loc></url>\n";
}
echo "</urlset>\n";
