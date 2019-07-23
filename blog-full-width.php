<?php
/*
* Template Name: Blog Full Width Cards
*/
get_header();

?>

<?php get_template_part( 'partials/shared', 'highlighted-header' ); ?>
<section class="section-wrapper stripped">
  <div class="full-width-posts-w">
    <?php
    $args = array(
    'orderby' => 'date',
    'order'   => 'DESC'
    );
    $temp = $wp_query;
    $wp_query = new WP_Query( $args );
    // The Loop
    global $more;
    query_posts('showposts=9');
    while ( $wp_query->have_posts() ) : $wp_query->the_post();
      $more = 0;  ?>
      <div class="item">
          ciao !!
        <?php get_template_part( 'partials/post', 'blog-vertical') ?>
      </div>
      <?php
    endwhile;
    $wp_query = $temp; ?>
  </div>
  ssss<?php venera_content_nav( 'nav-below' ); ?>aaaa
</section>
<?php get_footer(); ?>