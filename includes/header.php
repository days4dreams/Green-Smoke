<?php
/**
 * Site header: logo and main navigation.
 * The link for the section you're in is highlighted automatically (is_current in config.php).
 */
$navLinks = [
    '/'            => 'Home',
    '/work'        => 'Work',
    '/services'    => 'Services',
    '/the-journal' => 'The Journal',
    '/contact'     => 'Contact',
];
$homeCurrent = is_current('/') ? ' aria-current="page"' : '';
?>
  <div data-collapse="medium" data-animation="default" data-duration="400" data-no-scroll="1" data-easing="ease" data-easing2="ease" role="banner" class="navigation-bar active-navigation w-nav">
    <div class="navigation-wrap">
      <a href="/" id="w-node-logo"<?= $homeCurrent ?> class="brand w-nav-brand<?= is_current('/') ? ' w--current' : '' ?>"><img src="/images/green-smoke-r.png" sizes="(max-width: 479px) 70vw, (max-width: 991px) 31vw, 23vw" width="618" height="80" alt="Green Smoke Studio logo" srcset="/images/green-smoke-r-p-500.png 500w, /images/green-smoke-r.png 618w" class="logo"></a>
      <div id="w-node-_7666247e-8cbc-9984-eaf2-0979a050cf59-a050cf55" class="navigation-menu-wrap">
        <nav role="navigation" class="navigation-menu w-nav-menu">
<?php foreach ($navLinks as $href => $label): $current = is_current($href); ?>
          <a href="<?= $href ?>"<?= $current ? ' aria-current="page"' : '' ?> class="navigation-link w-nav-link<?= $current ? ' w--current' : '' ?>"><?= e($label) ?></a>
<?php endforeach; ?>
        </nav>
        <div class="menu-button w-nav-button"><img src="/images/menu-icon.png" width="20" alt="Menu" class="menu-icon"></div>
      </div>
    </div>
  </div>
