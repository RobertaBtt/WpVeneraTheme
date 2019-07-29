<div class="framed-post">
  <h4 class="fp-title">
    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
  </h4>
  <?php
  if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it. ?>
  <div class="fp-featured-img">
    <?php the_post_thumbnail(); ?>
  </div>
  <?php
  } ?>
  <div class="fp-content"><?php the_excerpt( false ); ?></div>
  <div class="fp-buttons">
    <a href="<?php the_permalink(); ?>" class="btn"><?php _e('Read More', 'venera'); ?></a>
  </div>
</div>