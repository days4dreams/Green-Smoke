<?php
/** A Journal category page, e.g. /the-journal/design. Called by the-journal.php, which sets $categoryKey. */
$cat = $categories[$categoryKey];
$posts = journal_posts_in($categoryKey);

// Links to the other categories that have posts, for the "You can also read..." line.
$otherLinks = [];
foreach (journal_categories_in_use() as $key => $other) {
    if ($key !== $categoryKey) {
        $otherLinks[] = '<a href="/the-journal/' . e($key) . '">' . e($other['name']) . '</a>';
    }
}
$lastLink = array_pop($otherLinks);
$otherText = $otherLinks ? implode(', ', $otherLinks) . ' and ' . $lastLink : $lastLink;

$title = $cat['name'];
$description = $cat['intro'];
$wfPage = '6641f38e1590de74e871f717';
require __DIR__ . '/../includes/head.php';
?>
  <div id="Hero" class="section">
    <div class="w-layout-grid grid">
      <div id="w-node-_6b9dae73-6a5f-5ef7-1c3b-a9bfe345bc12-e871f717" class="elements-headline-wrap">
        <h1><?= e($cat['name']) ?></h1>
        <p class="subheadline-paragraph"><?= e($cat['intro']) ?></p>
      </div>
    </div>
  </div>
  <div class="section wrapper">
    <div class="w-layout-grid other4-grid">
      <a href="#wf-form-Email" id="w-node-_3d2e9364-dd97-e53d-5ab2-099447c724c3-47c724c1" class="w-inline-block">
        <div id="w-node-_3d2e9364-dd97-e53d-5ab2-099447c724c4-47c724c1" class="notification-content">
          <div class="other4-text"><h5>For free advice on easy user experience improvements, join the newsletter</h5></div><img src="/images/arrow-light2x.svg" alt="" class="button-arrow">
        </div>
      </a>
    </div>
  </div>
  <div class="section wrapper m100">
    <div class="w-layout-grid article-grid">
      <div id="w-node-a78c6918-6048-8d9a-60a5-29ef4c1a6806-e871f717" class="cta10-headline-wrap">
        <a data-w-id="af15f62c-5bbc-7199-15f4-0afa6f26462b" href="/the-journal" class="button-text w-inline-block">
          <div class="button-label">The Journal</div><img src="/images/arrow-dark2x.svg" alt="" class="button-arrow"><div class="second-button-label"><?= e($cat['name']) ?></div>
        </a>
        <h3>Recent articles</h3>
        <p><?= e($cat['blurb']) ?><?php if ($otherText): ?> You can also read <?= $otherText ?>, too.<?php endif; ?></p>
      </div>
<?php if (!$posts): ?>
      <div class="article-option-wrap article-item">
        <div class="article-summary">
          <h5>Coming soon</h5>
          <p>The first articles in this category are on their way.</p>
        </div>
      </div>
<?php endif; ?>
<?php foreach ($posts as $post): ?>
      <div class="article-option-wrap article-item">
        <div class="article-summary">
          <h5><?= $post['has_page'] ? '' : 'Coming soon: ' ?><?= e($post['title']) ?><?= $post['draft'] === true ? ' (Draft)' : '' ?></h5>
          <p><?= e($post['summary']) ?></p>
        </div>
<?php if ($post['has_page']): ?>
        <a href="<?= e($post['url']) ?>" data-w-id="fa375292-2154-9e8d-0c2f-b5cd76fe90c4" class="button-small w-inline-block">
          <div class="button-label">Read the post</div><img src="/images/arrow-light2x.svg" alt="" class="button-arrow">
        </a>
<?php endif; ?>
      </div>
<?php endforeach; ?>
    </div>
  </div>
<?php include __DIR__ . '/../includes/footer.php'; ?>
