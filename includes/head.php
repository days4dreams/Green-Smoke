<?php
/**
 * Everything from <!DOCTYPE> to the opening <body>, plus the site header.
 *
 * Set these in the page BEFORE including this file:
 *   $title        Page title, e.g. "Contact" (the site name is added automatically)
 *   $description  One or two sentences for Google and social media (aim for 150 characters)
 *   $ogImage      Optional. Image for social media shares, e.g. "/images/my-image.jpg"
 *   $wfPage       Optional. Webflow page ID, needed by the Webflow animations for now
 */
require_once __DIR__ . '/config.php';

$fullTitle = (isset($title) && $title !== '') ? $title . ' | ' . $site['name'] : $site['name'];
$description = $description ?? '';
$canonical = $site['url'] . (current_path() === '/' ? '/' : current_path());
$shareImage = $site['url'] . ($ogImage ?? $site['default_image']);
?>
<!DOCTYPE html>
<html lang="en-GB"<?php if (!empty($wfPage)): ?> data-wf-page="<?= e($wfPage) ?>" data-wf-site="663f659b3bb82a36e38d26f1"<?php endif; ?>>
<head>
  <meta charset="utf-8">
  <title><?= e($fullTitle) ?></title>
  <meta name="description" content="<?= e($description) ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="canonical" href="<?= e($canonical) ?>">
  <meta property="og:type" content="website">
  <meta property="og:site_name" content="<?= e($site['name']) ?>">
  <meta property="og:title" content="<?= e($fullTitle) ?>">
  <meta property="og:description" content="<?= e($description) ?>">
  <meta property="og:url" content="<?= e($canonical) ?>">
  <meta property="og:image" content="<?= e($shareImage) ?>">
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="<?= e($fullTitle) ?>">
  <meta name="twitter:description" content="<?= e($description) ?>">
  <meta name="twitter:image" content="<?= e($shareImage) ?>">
  <link href="/css/webflow.css" rel="stylesheet" type="text/css">
  <link href="/css/style.css" rel="stylesheet" type="text/css">
  <script>!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script>
  <link href="/images/favicon.ico" rel="shortcut icon" type="image/x-icon">
  <link href="/images/webclip.png" rel="apple-touch-icon">
</head>
<body>
<?php include __DIR__ . '/header.php'; ?>
