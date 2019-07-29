<?php
/*
* Template Name: Software Blog Full Width Cards
*/
get_header();

?>

<section class="section-wrapper stripped">
  <div class="full-width-posts-w">
      <?php if ( have_posts() ) : ?>
                <?php if ( is_category() ) {
                     printf( __( 'Category Archives: %s', 'venera' ), '<span>' 
                             . single_cat_title( '', false ) . '</span>' );
                }
              ?>
      
       
            <?php if ( is_category() ) {
                  // show an optional category description
                  $category_description = category_description();
                  if ( ! empty( $category_description ) )
                          echo apply_filters( 'category_archive_meta', '<div class="taxonomy-description">' . $category_description . '</div>' );

              }?>
      
      
      
      
       <?php /* Start the Loop */ ?>
      
      <?php while ( have_posts() ) : the_post(); ?>
          <div class="item">
        <?php get_template_part( 'partials/post', 'blog-vertical') ?>
        </div>
       <?php endwhile; ?> <?php
      
   
      venera_content_nav( 'nav-below' );?>
      <?php else : ?>
          <?php get_template_part( 'no-results', 'archive' ); ?>

    <?php endif; ?>
      
      
  </div>
     
</section>
<?php get_footer(); ?>