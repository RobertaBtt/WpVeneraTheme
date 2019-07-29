<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package venera
 */

get_header(); ?>

	<section class="section-wrapper search-results-w">
		<div class="container">
			<div class="row">
				<div class="span8">
					<?php if ( have_posts() ) : ?>

						<header class="page-header-search">
							<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'venera' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
						</header><!-- .page-header -->

						<?php /* Start the Loop */ ?>
						<?php while ( have_posts() ) : the_post(); ?>
							<?php get_template_part( 'content', 'search' ); ?>

						<?php endwhile; ?>

						<?php venera_content_nav( 'nav-below' ); ?>

					<?php else : ?>

						<?php get_template_part( 'no-results', 'search' ); ?>

					<?php endif; ?>
				</div>
				<div class="span4">
					<?php get_sidebar(); ?>
				</div>
			</div><!-- .container -->
		</div><!-- .row -->
	</section><!-- .section-wrapper -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>