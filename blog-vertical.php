<?php
/*
* Template Name: Blog Vertical Cards
*/
get_header();

# If sidebar has any widgets inside - show it, otherwise center the main content
$content_span = is_active_sidebar('sidebar-default') ? 'span8' : 'span12';
$item_width = is_active_sidebar('sidebar-default') ? 'half' : 'one-third';
?>

<?php get_template_part( 'partials/shared', 'highlighted-header' ); ?>
<section class="section-wrapper">
  <div class="container">
    <div class="row">
      <div class="<?php echo $content_span; ?>">
        <div class="fluid-posts-w">
          <?php
          $args = array(
          'orderby' => 'date',
          'order'   => 'DESC'
          );
          $temp = $wp_query;
          $wp_query = new WP_Query( $args );
          // The Loop
          global $more;
          while ( $wp_query->have_posts() ) : $wp_query->the_post();
            $more = 0;  ?>
            <div class="item <?php echo $item_width; ?>">
              <?php get_template_part( 'partials/post', 'blog-vertical') ?>
            </div>
            <?php
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