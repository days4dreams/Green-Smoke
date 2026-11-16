<?php
/** One Journal article. Called by the-journal.php, which sets $post. */
$cat = $categories[$post['category']];
$intro = $post['intro'] ?? '' ?: $post['summary'];
$title = $post['title'];
$description = $intro;
$ogImage = $post['image'];
$wfPage = '6641f6461590de74e874a22d';
require __DIR__ . '/../includes/head.php';
?>
  <div class="wrapper m100-50">
    <div class="section">
      <div class="w-layout-grid headline-grid">
        <div id="w-node-e7eaa082-df6d-6ff2-6a13-fda244d5bb5c-e874a22d">
          <a data-w-id="af15f62c-5bbc-7199-15f4-0afa6f26462b" href="/the-journal/<?= e($post['category']) ?>" class="button-text">
            <div class="button-label">The Journal</div><img src="/images/arrow-dark2x.svg" alt="" class="button-arrow"><div class="second-button-label"><?= e($cat['name']) ?></div>
          </a>
          <br><br><!-- two line breaks, as in the original design -->
          <div class="divider"></div>
          <p class="label"><?= $post['draft'] === true ? 'Draft, not yet published' : 'Written ' . e(nice_date($post['date'])) ?></p>
          <h1><?= e($post['title']) ?></h1>
          <p><?= e($intro) ?></p>
        </div>
      </div>
    </div>
  </div>
  <div class="section">
    <div class="divider"></div>
    <div class="w-layout-grid blog-detail-grid">
      <div id="w-node-_00dea1f2-65fd-17be-2f0e-ecf423349b0b-e874a22d" class="rich-text-block w-richtext">
<?= markdown($post['body']) ?>
        <div id="w-node-_00dea1f2-65fd-17be-2f0e-ecf423349b49-e874a22d" class="blog-detail-author-wrap">
          <div class="blog-detail-name-wrap">
            <h4>Written by <?= e($post['author']) ?></h4>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php include __DIR__ . '/../includes/footer.php'; ?>
