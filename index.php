<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package venera
 */

get_header(); 
# If sidebar has any widgets inside - show it, otherwise center the main content
$content_span = is_active_sidebar('sidebar-default') ? 'span8' : 'span8 offset2';
?>

<section class="section-wrapper">
	<div class="container">
		<div class="row">
			<div class="<?php echo $content_span; ?>">
				<?php if ( have_posts() ) : ?>

					<?php /* Start the Loop */ ?>
					<?php while ( have_posts() ) : the_post(); ?>

						<?php
							/* Include the Post-Format-specific template for the content.
							 * If you want to overload this in a child theme then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */
							get_template_part( 'content', get_post_format() );
						?>

					<?php endwhile; ?>

					<?php venera_content_nav( 'nav-below' ); ?>

				<?php else : ?>

					<?php get_template_part( 'no-results', 'index' ); ?>

				<?php endif; ?>
			</div>
			<?php
			# If sidebar has widgets - show it, otherwise don't
			if ( is_active_sidebar( 'sidebar-default' ) ): ?>
			<div class="span4">
				<?php get_sidebar(); ?>
			</div>
			<?php endif; ?>
		</div>
	</div>
</section>
<?php get_footer(); ?>