<?php
/*
 * Template Name: Blog Full Width Cards
 */
get_header();
?>
<section class="section-wrapper stripped">
    <div class='container'>
        <div class='row'>
            <div class='span12'>
                <h3 class='section-header'>From the Blog</h3>
                
                
                
            </div>
            
             <?php
            $args = array(
                'orderby' => 'date',
                'order' => 'DESC'
            );
            $temp = $wp_query;
            $wp_query = new WP_Query($args);
            // The Loop
            global $more;
            query_posts('showposts=3');
            while ($wp_query->have_posts()) : $wp_query->the_post();
                $more = 0;
                ?>      
                
                <div class='span4'> 
                
                                    <?php get_template_part('partials/post', 'blog-vertical') ?>

                </div>        
                <?php
            endwhile;
            $wp_query = $temp;
            ?>
        </div>
        
    </div>
</section>
<?php get_footer(); ?>