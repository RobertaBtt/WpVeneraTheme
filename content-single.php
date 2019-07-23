<?php
/**
 * @package venera
 */
?>
<h1 class='post-title'><?php the_title(); ?></h1>
<p id="post-<?php the_ID(); ?>" class='post-info'>
    <span class='info-item'>
        Tags:
            <?php 
                $all_the_tags = get_the_tags();
                if ($all_the_tags) :
                    foreach($all_the_tags as $this_tag) { ?> 

                        <a href='<?php echo get_tag_link($this_tag->term_id); ?>' class='post-tag'>
                        <span class='label label-info'><?php echo $this_tag->name; ?></span>
                      </a>
                    <?php }endif; 

                    ?>
            </span>
            <span class='info-item'>
                by <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) )?>"
                      title="<?php echo esc_attr( sprintf( __( 'View all posts by %s', 'venera' ), get_the_author() ) ) ?>">
                      <?php echo get_the_author() ?>
                </a>                
            </span>
            <span class='info-item'><?php echo get_the_date( 'F d, Y' ); ?></span>
            <span class='info-item'>
                <a href="<?php echo get_comments_link() ?>">
                    <?php echo generate_comments_string_link(get_comments_number()) ?></a>
            </span>
</p>

<div class='single-post-image bottom decor-image'>
  <img alt="Image-placeholder-1" src=<?php the_post_thumbnail( 'full' ); ?></img>
</div>

<div class='post-content'>
    <?php the_content(); ?>
    <footer>
        <?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'venera' ), 'after' => '</div>' ) ); ?>
    </footer>
</div>


