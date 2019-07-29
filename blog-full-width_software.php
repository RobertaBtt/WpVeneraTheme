<?php
/*
* Template Name: Software Blog Full Software
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
    query_posts( array ( 'category_name' => 'software', 'posts_per_page' =>  2  ) );

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
  <?php venera_content_nav( 'nav-below' ); ?>
</section>
<?php get_footer(); ?>