<?php
/** The Journal home page: recent posts and the category list. Called by the-journal.php. */
$posts = journal_posts();
$latest = null;
foreach ($posts as $p) {
    if ($p['has_page']) { $latest = $p; break; }
}
$title = 'The Journal';
$description = 'Design advice, small business support and studio updates from Green Smoke Studio, an independent design studio in Ponteland, Northumberland.';
$wfPage = '6641f27b190e1564182b3d0f';
require __DIR__ . '/../includes/head.php';
?>
  <div class="section">
    <div class="w-layout-grid hero3">
      <div id="w-node-_14085544-47f2-0f3f-fdd8-830f5219ad48-182b3d0f" class="hero3-content">
        <div class="label">Writing</div>
        <h1>The Journal</h1>
        <h5>A place to share good news stories, updates from the studio, and some of our client work.</h5>
      </div>
      <div id="w-node-_14085544-47f2-0f3f-fdd8-830f5219ad4f-182b3d0f" class="hero3-image"></div>
<?php if ($latest): ?>
      <a id="w-node-_14085544-47f2-0f3f-fdd8-830f5219ad50-182b3d0f" data-w-id="14085544-47f2-0f3f-fdd8-830f5219ad50" href="<?= e($latest['url']) ?>" class="button-large hero2-button w-inline-block">
        <div class="text-block-11">Jump into the latest from the Green Smoke Journal</div><img src="/images/arrow-light2x.svg" alt="" class="button-arrow">
      </a>
<?php endif; ?>
    </div>
  </div>
  <div class="section wrapper m100">
    <div class="w-layout-grid blog1-grid">
      <div id="w-node-_4b85df00-b72a-5bec-5bb1-12fb349ec960-182b3d0f" class="blog1-headline-wrap">
        <h4>Green Smoke Studio Journal</h4>
        <h3>Recent Posts</h3>
      </div>
      <div id="w-node-_4b85df00-b72a-5bec-5bb1-12fb349ec967-182b3d0f" class="blog1-headline-wrap">
        <h4>Explore more</h4>
        <h3>Categories</h3>
      </div>
      <div id="w-node-_4b85df00-b72a-5bec-5bb1-12fb349ec96d-182b3d0f" class="div-block-2">
<?php foreach ($posts as $post): include __DIR__ . '/journal-card.php'; endforeach; ?>
      </div>
      <div id="w-node-_4b85df00-b72a-5bec-5bb1-12fb349ec98d-182b3d0f">
        <div>
          <div class="journal-nav-items-wrap">
            <div class="journal-nav-lists">
<?php foreach (journal_categories_in_use() as $key => $cat): ?>
              <a href="/the-journal/<?= e($key) ?>" class="journal-category-link journal-all-items"><?= e($cat['name']) ?></a>
<?php endforeach; ?>
            </div>
          </div>
        </div>
        <div class="blog1-divider"></div>
          <div>
          <h4>Have you considered?</h4>
          <p class="blog">Each edition of the Newsletter, I share a short guide to an improvement for your website, marketing, processes and more. Always free, and always with a summary the advice in 100 words or less.</p>
          <a data-w-id="af15f62c-5bbc-7199-15f4-0afa6f26462b" href="#wf-form-Email" class="button-text w-inline-block">
            <div class="button-label">Join the Newsletter</div><img src="/images/arrow-dark2x.svg" alt="" class="button-arrow">
          </a>
        </div>
        <div class="blog-end-divider"></div>
      </div>
    </div>
  </div>
<?php include __DIR__ . '/../includes/footer.php'; ?>
