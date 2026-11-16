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
        // Add more here when ready, e.g. 'facebook' => 'https://...'
    ],
    // Image shown when a page is shared on social media, unless the page sets its own.
    'default_image'  => '/images/green-field-smoke-p-1600.jpg',
];

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
