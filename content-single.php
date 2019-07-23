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
</div>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'venera' ), 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->

	<footer class="entry-meta">
		<?php
			/* translators: used between list items, there is a space after the comma */
			$category_list = get_the_category_list( __( ', ', 'venera' ) );

			/* translators: used between list items, there is a space after the comma */
			$tag_list = get_the_tag_list( '', __( ', ', 'venera' ) );

			if ( ! venera_categorized_blog() ) {
				// This blog only has 1 category so we just need to worry about tags in the meta text
				if ( '' != $tag_list ) {
					$meta_text = __( 'This entry was tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'venera' );
				} else {
					$meta_text = __( 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'venera' );
				}

			} else {
				// But this blog has loads of categories so we should probably display them here
				if ( '' != $tag_list ) {
					$meta_text = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'venera' );
				} else {
					$meta_text = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'venera' );
				}

			} // end check for categories on this blog
                        ?> 
                    
			<?php printf(
				$meta_text,
				$category_list,
				$tag_list,
				get_permalink(),
				the_title_attribute( 'echo=0' )
			);
		?>

		<?php edit_post_link( __( 'Edit', 'venera' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-meta -->
</article><!-- #post-## -->
