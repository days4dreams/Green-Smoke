<?php
/** One project card on the Work page. Expects $project. */
$external = preg_match('#^https?://#', $project['link']);
$linkAttrs = $external ? ' target="_blank" rel="noopener"' : '';
?>
      <div>
<?php if ($project['link']): ?>
        <a href="<?= e($project['link']) ?>"<?= $linkAttrs ?> class="blog1-image-wrap work-image-link">
<?php if ($project['image']): ?>
          <?= image_tag($project['image'], $project['image_alt'] ?: $project['title'], 'work-card-image') ?>
<?php else: /* no image yet: a plain block keeps the grid even */ ?>
          <span class="work-card-image work-card-placeholder" role="img" aria-label="<?= e($project['title']) ?>"></span>
<?php endif; ?>
        </a>
        <a href="<?= e($project['link']) ?>"<?= $linkAttrs ?> class="size4-link"><?= e($project['title']) ?><?= $project['draft'] === true ? ' (Draft)' : '' ?></a>
<?php else: ?>
        <div class="blog1-image-wrap">
<?php if ($project['image']): ?>
          <?= image_tag($project['image'], $project['image_alt'] ?: $project['title'], 'work-card-image') ?>
<?php else: ?>
          <span class="work-card-image work-card-placeholder" role="img" aria-label="<?= e($project['title']) ?>"></span>
<?php endif; ?>
        </div>
        <p class="size4-link"><?= e($project['title']) ?><?= $project['draft'] === true ? ' (Draft)' : '' ?></p>
<?php endif; ?>
<?php if ($project['tags']): ?>
        <div class="work-tags"><?= e(implode(' · ', $project['tags'])) ?></div>
<?php endif; ?>
        <p class="blog"><?= e($project['summary']) ?></p>
      </div>
