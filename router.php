<?php
/**
 * Local preview router — NOT used on the live server.
 *
 * PHP's built-in server doesn't read .htaccess, so this file copies the
 * important rules from it, letting you preview the site exactly as it will
 * behave live:
 *
 *     php -S localhost:8000 router.php
 *
 * then open http://localhost:8000 in your browser.
 */

$path = rawurldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
$root = __DIR__;

// Never serve private folders (same as .htaccess).
if (preg_match('#^/(includes|templates|content|dev)(/|$)#', $path) || preg_match('#/\.#', $path)) {
    http_response_code(404);
    require $root . '/404.php';
    return true;
}

// Old addresses ending in .html or .php redirect to the clean address.
if (preg_match('#^/(.+?)\.(html|php)$#', $path, $m) && $path !== '/router.php') {
    $clean = ($m[1] === 'index') ? '/' : '/' . $m[1];
    header('Location: ' . $clean, true, 301);
    return true;
}

// /about has no page yet, so it goes to the homepage (same as .htaccess).
if ($path === '/about') {
    header('Location: /', true, 301);
    return true;
}

// Real files (CSS, images, fonts, JS) are served as they are.
if ($path !== '/' && is_file($root . $path)) {
    return false;
}

// The sitemap is built by sitemap.php.
if ($path === '/sitemap.xml') {
    require $root . '/sitemap.php';
    return true;
}

// Journal categories and articles (same as .htaccess).
if (preg_match('#^/the-journal/([a-z0-9-]+)(?:/([a-z0-9-]+))?/?$#', $path, $m)) {
    $_GET['category'] = $m[1];
    $_GET['slug'] = $m[2] ?? '';
    require $root . '/the-journal.php';
    return true;
}

// Clean addresses: /work -> work.php, / -> index.php
$page = ($path === '/') ? 'index' : trim($path, '/');
if (preg_match('#^[a-z0-9-]+(/[a-z0-9-]+)*$#', $page) && is_file("$root/$page.php")) {
    chdir(dirname("$root/$page.php"));
    require "$root/$page.php";
    return true;
}

http_response_code(404);
require $root . '/404.php';
return true;
