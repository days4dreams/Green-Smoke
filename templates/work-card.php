<?php
/** One project card on the Work page. Expects $project. */
$external = preg_match('#^https?://#', $project['link']);
$linkAttrs = $external ? ' target="_blank" rel="noopener"' : '';
?>
      <div>
<?php if ($project['link']): ?>
<?php if ($project['image']): ?>
        <a href="<?= e($project['link']) ?>"<?= $linkAttrs ?> class="blog1-image-wrap work-image-link">
          <?= image_tag($project['image'], $project['image_alt'] ?: $project['title'], 'work-card-image') ?>
        </a>
<?php endif; ?>
        <a href="<?= e($project['link']) ?>"<?= $linkAttrs ?> class="size4-link"><?= e($project['title']) ?><?= $project['draft'] === true ? ' (Draft)' : '' ?></a>
<?php else: ?>
<?php if ($project['image']): ?>
        <div class="blog1-image-wrap"><?= image_tag($project['image'], $project['image_alt'] ?: $project['title'], 'work-card-image') ?></div>
<?php endif; ?>
        <p class="size4-link"><?= e($project['title']) ?><?= $project['draft'] === true ? ' (Draft)' : '' ?></p>
<?php endif; ?>
<?php if ($project['tags']): ?>
        <div class="work-tags"><?= e(implode(' · ', $project['tags'])) ?></div>
<?php endif; ?>
        <p class="blog"><?= e($project['summary']) ?></p>
      </div>
