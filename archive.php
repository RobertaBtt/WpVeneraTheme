<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package venera
 */
get_header();
?>

<section class="section-wrapper posts-w">
    <div class="container">
        <div class="row">
            <div class="span8">
                <?php if (have_posts()) : ?>
                   
                    <?php /* Start the Loop */ ?>
                    <?php while (have_posts()) : the_post(); ?>
                
                        <div class='row'>
                            <div class='span8'>
                              <div class='white-card recent-post clearfix extra-padding'>
                                  <h5 class='recent-post-header'>
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                  </h5>
                                  
                               <div class='post-info clearfix'>
                                    <div class='pull-left'>
                                      <span class='post-date'><?php echo get_the_date('F d, Y'); ?></span>
                                      <a href="<?php comments_link(); ?>" 
                                         class="post-comments"><?php echo generate_comments_string_link(get_comments_number()) ?></a>
                                    </div>
                                    <div class='pull-right'>
                                      <a href="#" class="post-like"><i class='icon-heart'></i>
                                        <?php echo get_comments_number() ?>
                                      </a>
                                    </div>
                                </div>
                                <div class='row-fluid'>
                                    <div class='span4'>
                                      <div class='decor-image post-image-aside'>
                                           <?php the_post_thumbnail(); ?>
                                      </div>
                                    </div>
                                    <div class='span8'>
                                      <p class='post-content'><?php the_excerpt( false ); ?></p>
                                      <a href="<?php the_permalink(); ?>" class="btn btn-extra pull-right">Read More &gt;</a>
                                    </div>
                                </div>
                              </div>
                            </div>
                        </div>
                
                    <?php endwhile; ?>

                    <?php venera_content_nav('nav-below'); ?>

                <?php else : ?>

                    <?php get_template_part('no-results', 'archive'); ?>

                <?php endif; ?>
            </div>
            <div class="span4">
                <?php get_sidebar(); ?>
            </div>
        </div>
</section>
<?php get_footer(); ?>