<?php
/**
 * The template for displaying portfolio category pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package venera
 */

get_header(); ?>

<section class="section-wrapper">
  <div class="container">
    <?php if ( have_posts() ) : ?>

      <header class="page-header-archive">
        <h2 class="page-title">
          <?php echo __( 'Portfolio by Category: ', 'venera') . $wp_query->queried_object->name; ?>
        </h2>
        <?php
          if ( is_category() ) {
            // show an optional category description
            $category_description = category_description();
            if ( ! empty( $category_description ) )
              echo apply_filters( 'category_archive_meta', '<div class="taxonomy-description">' . $category_description . '</div>' );

          } elseif ( is_tag() ) {
            // show an optional tag description
            $tag_description = tag_description();
            if ( ! empty( $tag_description ) )
              echo apply_filters( 'tag_archive_meta', '<div class="taxonomy-description">' . $tag_description . '</div>' );
          }
        ?>
      </header><!-- .page-header -->

      <?php /* Start the Loop */ ?>
      <?php $posts_on_line = 0; ?>
      <div class="row-fluid">
      <?php while ( have_posts() ) : the_post();
        $more = 0;  ?>
        <div class="span4">
          <?php get_template_part( 'content', 'venera_portfolio') ?>
        </div>
        <?php
        $posts_on_line++;
        if( $posts_on_line == 3 ){
          echo '</div><div class="row-fluid">';
          $posts_on_line = 0;
        }
      ?>
      <?php endwhile; ?>
      </div>

      <?php venera_content_nav( 'nav-below' ); ?>

    <?php else : ?>

      <?php get_template_part( 'no-results', 'archive' ); ?>

    <?php endif; ?>
  </div>
</section>
<?php get_footer(); ?>