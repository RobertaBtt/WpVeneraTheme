<?php
/**
 * The Template for displaying all single posts.
 *
 * @package venera
 */

get_header();
# If sidebar has any widgets inside - show it, otherwise center the main content
$content_span = is_active_sidebar('sidebar-default') ? 'span8' : 'span8 offset2';
?>
<section class="section-wrapper post-w">
    <div class="container">
        <div class="row">
            <div class='span8'>
                <div class='single-post-w'>
                    <?php while ( have_posts() ) : the_post(); ?>
                        <?php get_template_part( 'content', 'single' ); ?>
                        <?php venera_content_nav( 'nav-below' ); ?>
                        <?php
                            // If comments are open or we have at least one comment, load up the comment template
                            if ( comments_open() || '0' != get_comments_number() )
                                comments_template();
                        ?>
                   
                    <?php endwhile; // end of the loop. ?>
                </div>
            </div>
                

                <?php
                # If sidebar has widgets - show it, otherwise don't
                //if ( is_active_sidebar('sidebar-default') ): ?>
                <div class="span4">
                        <?php get_sidebar( 'sidebar-default' ); ?>
                </div>
                <?php //endif; ?>
		</div>
	</div>
</section>

<?php get_footer(); ?>



