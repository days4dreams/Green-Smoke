<?php
/** One post card on the Journal page. Expects $post. */
$cat = $categories[$post['category']];
$imageStyle = 'background-image: url(' . e($post['image']) . ')';
?>
        <div>
          <div class="blog1-image-wrap">
            <div class="label inside-label"><?= e($cat['name']) ?><?= $post['draft'] === true ? ' (Draft)' : '' ?></div>
<?php if ($post['has_page']): ?>
            <a href="<?= e($post['url']) ?>" class="blog-design-image w-inline-block" style="<?= $imageStyle ?>" role="img" aria-label="<?= e($post['image_alt'] ?: $post['title']) ?>"></a>
<?php else: ?>
            <div class="blog-design-image" style="<?= $imageStyle ?>" role="img" aria-label="<?= e($post['image_alt'] ?: $post['title']) ?>"></div>
<?php endif; ?>
          </div>
<?php if ($post['has_page']): ?>
          <a href="<?= e($post['url']) ?>" class="size4-link"><?= e($post['title']) ?></a>
<?php else: ?>
          <a class="size4-link">Coming Soon: <?= e($post['title']) ?></a>
<?php endif; ?>
          <p>By <?= e($post['author']) ?></p>
          <p class="blog"><?= e($post['summary']) ?></p>
          <div class="blog1-button-wrap">
<?php if ($post['has_page']): ?>
            <a href="<?= e($post['url']) ?>" data-w-id="4b85df00-b72a-5bec-5bb1-12fb349ec97a" class="button-small w-inline-block">
              <div class="button-label">Read article</div><img src="/images/arrow-light2x.svg" alt="" class="button-arrow">
            </a>
<?php else: ?>
            <span class="button-small w-inline-block">
              <div class="button-label">Coming soon</div>
            </span>
<?php endif; ?>
          </div>
        </div>
