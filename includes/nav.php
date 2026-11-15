<?php $navRoot = "/"; ?>
<?php if($pagedepth > 0) {
    $navRoot = str_repeat("../", $pagedepth);
} ?>    
<div class="navigation-wrap">
    <a href="<?php echo $navRoot; ?>" id="w-node-logo" aria-current="page" class="brand w-nav-brand w--current"><img src="<?php echo $navRoot; ?>images/green-smoke-r.png" loading="lazy" sizes="(max-width: 479px)70vw, (max-width: 991px) 31vw, 23vw" height="Auto" alt="Green Smoke Studio logo" srcset="<?php echo $navRoot; ?>images/green-smoke-r-p-500.png 500w, <?php echo $navRoot; ?>images/green-smoke-r.png 618w" class="logo"></a>
    <div id="w-node-_7666247e-8cbc-9984-eaf2-0979a050cf59-a050cf55" class="navigation-menu-wrap">
    <nav role="navigation" class="navigation-menu w-nav-menu">
        <a href="<?php echo $navRoot; ?>index.php" aria-current="page" class="navigation-link w-nav-link w--current">Home</a>
        <a href="<?php echo $navRoot; ?>work.php" class="navigation-link w-nav-link">Work</a>
        <a href="<?php echo $navRoot; ?>services.php" class="navigation-link w-nav-link">Services</a>
        <a href="<?php echo $navRoot; ?>the-journal.php" class="navigation-link w-nav-link">The Journal</a>
        <a href="<?php echo $navRoot; ?>contact.php" class="navigation-link w-nav-link">Contact</a>
    </nav>
    <div class="menu-button w-nav-button"><img src="<?php echo $navRoot; ?>images/menu-icon.png" width="20" alt="" class="menu-icon"></div>
    </div>
</div>