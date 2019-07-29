<?php
/**
 * The Template for displaying portfolio posts.
 *
 * @package venera
 */

get_header();
$css_header_class = (get_field('same_line_title') === true) ? 'same-line' : '';

while ( have_posts() ) : the_post(); ?>
  <?php get_template_part( 'partials/shared', 'highlighted-header' ); ?>
  <section class="section-wrapper">
    <?php
    get_template_part( 'content', 'single-venera_portfolio' ); ?>
  </section>
<?php
endwhile; // end of the loop. ?>

<?php get_footer(); ?>



