
    
    <div class='white-card recent-post clearfix'>
        
        <h5 class='recent-post-header'>
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h5>
        
        <div class='post-info clearfix'>            
            <div class='pull-left'>
                <span class='post-date'><?php echo get_the_date('F d, Y'); ?></span>
                <a href="<?php comments_link(); ?>" class="post-comments">
                    <?php echo generate_comments_string_link(get_comments_number()) ?>
                </a>
            </div>
              <?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it. ?>
                    <div class="post-image"> 
                        <?php the_post_thumbnail(); ?>
                    </div>
            <?php } ?>
            <p class='post-content separated'><?php the_excerpt( false ); ?></p>
            <a href="<?php the_permalink(); ?>" class="btn btn-primary btn-extra pull-right">Read More &gt;</a>

        </div>
    </div>

 