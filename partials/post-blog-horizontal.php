<div class="framed-post framed-post-horizontal">
  <h4 class="fp-title">
    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
  </h4>
  <div class="fp-meta-elements">
    <span class="fp-meta-element"><?php echo get_the_date(); ?></span>
    <a href="<?php comments_link(); ?>" class="fp-meta-element"><?php echo generate_comments_string_link(get_comments_number()) ?></a>
  </div>
  <?php
  if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it. ?>
  <div class="fp-featured-img">
    <?php the_post_thumbnail(); ?>
  </div>
  <?php
  } ?>
  <div class="fp-content"><?php the_excerpt( false ); ?></div>
  <div class="fp-buttons">
    <a href="<?php the_permalink(); ?>" class="btn">Read More</a>
  </div>
</div>