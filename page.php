<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package venera
 */

get_header(); ?>
<div id="primary" role="main">

    <?php while ( have_posts() ) : the_post(); ?>
      <?php get_template_part( 'partials/shared', 'highlighted-header' ); ?>

			<?php get_template_part( 'content', 'page' ); ?>

		<?php endwhile; // end of the loop. ?>

</div><!-- #primary -->

<?php get_footer(); ?>
