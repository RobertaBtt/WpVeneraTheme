<?php
/*
* Template Name: Blog Horizontal Cards
*/
get_header();

# If sidebar has any widgets inside - show it, otherwise center the main content
$content_span = is_active_sidebar('sidebar-default') ? 'span8' : 'span8 offset2';
?>
category ???
<?php get_template_part( 'partials/shared', 'highlighted-header' ); ?>
<section class="section-wrapper">
  <div class="container">
    <div class="row">
      <div class="<?php echo $content_span; ?>">
        <div class="row-fluid horizontal-posts-w">
          <?php
          $args = array(
          'orderby' => 'date',
          'order'   => 'DESC'
          );
          $temp = $wp_query;
          $wp_query = new WP_Query( $args );
          // The Loop
          global $more;
          $posts_on_line = 0;
          while ( $wp_query->have_posts() ) : $wp_query->the_post();
            $more = 0;  ?>
            <div class="span12 item">
              <?php get_template_part( 'partials/post', 'blog-horizontal') ?>
            </div>
            <?php
            $posts_on_line++;
            if( $posts_on_line == 1 ){
              echo '</div><div class="row-fluid horizontal-posts-w">';
              $posts_on_line = 0;
            }
          endwhile;
          $wp_query = $temp; ?>
        </div>
        <?php venera_content_nav( 'nav-below' ); ?>
      </div>
      <?php
      # If sidebar has widgets - show it, otherwise don't
      if ( is_active_sidebar('sidebar-default') ): ?>
      <div class="span4">
        <?php get_sidebar( 'sidebar-default' ); ?>
      </div>
      <?php endif; ?>
    </div>
  </div>
</section>
<?php get_footer(); ?>