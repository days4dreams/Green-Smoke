<?php
/**
 * The Journal. One file handles three kinds of address:
 *   /the-journal                          -> list of recent posts
 *   /the-journal/{category}               -> posts in one category
 *   /the-journal/{category}/{post}        -> one article
 * .htaccess passes the category and post in as ?category=...&slug=...
 * Pages are built from the files in content/journal/ by the templates in templates/.
 */
require_once __DIR__ . '/includes/content.php';

$categoryKey = $_GET['category'] ?? '';
$slug = $_GET['slug'] ?? '';

if ($categoryKey === '' && $slug === '') {
    require __DIR__ . '/templates/journal-index.php';
} elseif ($slug === '' && valid_slug($categoryKey) && isset($categories[$categoryKey])) {
    require __DIR__ . '/templates/journal-category.php';
} elseif ($post = find_post($categoryKey, $slug)) {
    require __DIR__ . '/templates/journal-article.php';
} else {
    http_response_code(404);
    require __DIR__ . '/404.php';
}
