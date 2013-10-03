<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
  <?php print $user_picture; ?>

  <?php print render($title_prefix); ?>
  <?php if (!$page): ?>
    <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
  <?php endif; ?>
  <?php print render($title_suffix); ?>

  <?php if ($display_submitted || !empty($content['links']['terms'])): ?>
    <div class="meta">
      <?php if ($display_submitted && isset($submitted) && $submitted): ?>
        <span class="submitted"><?php print $submitted; ?></span>
      <?php endif; ?>

      <?php if (!empty($content['links']['terms'])): ?>
        <div class="terms terms-inline">
          <?php print render($content['links']['terms']); ?>
        </div>
      <?php endif; ?>
    </div>
  <?php endif; ?>

  <?php if (!$teaser): ?>
    <div id="node-top" class="node-top region nested">
      <?php print render($node_top); ?>
    </div>
  <?php endif; ?>
  
  <div class="content"<?php print $content_attributes; ?>>
    <?php
      // We hide the comments and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);
      print render($content);
    ?>
  </div>

  <?php print render($content['links']); ?>

  <?php print render($content['comments']); ?>

  <?php if (!$teaser): ?>
    <div id="node-bottom" class="node-bottom region nested">
      <?php print render($node_bottom); ?>
    </div>
  <?php endif; ?>
  
</div>
