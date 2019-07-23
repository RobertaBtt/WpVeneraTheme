<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package venera
 */

if ( ! function_exists( 'venera_content_nav' ) ) :
/**
 * Display navigation to next/previous pages when applicable
 */
function venera_content_nav( $nav_id ) {
	global $wp_query, $post;

	// Don't print empty markup on single pages if there's nowhere to navigate.
	if ( is_single() ) {
		$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
		$next = get_adjacent_post( false, '', false );

		if ( ! $next && ! $previous )
			return;
	}

	// Don't print empty markup in archives if there's only one page.
	if ( $wp_query->max_num_pages < 2 && ( is_home() || is_archive() || is_search() ) )
		return;

	$nav_class = ( is_single() ) ? 'navigation-post' : 'navigation-paging';

	?>
	<nav role="navigation" id="<?php echo esc_attr( $nav_id ); ?>" class="<?php echo $nav_class; ?>">
		<h4 class="screen-reader-text"><?php _e( 'Post navigation', 'venera' ); ?></h4>

	<?php if ( is_single() ) : // navigation links for single posts ?>

		<?php previous_post_link( '<div class="previous">%link</div>', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'venera' ) . '</span> %title' ); ?>
		<?php next_post_link( '<div class="next">%link</div>', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'venera' ) . '</span>' ); ?>

	<?php elseif ( $wp_query->max_num_pages > 1 && ( is_home() || is_archive() || is_search() ) ) : // navigation links for home, archive, and search pages ?>

		<?php if ( get_next_posts_link() ) : ?>
		<div class="previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'venera' ) ); ?></div>
		<?php endif; ?>

		<?php if ( get_previous_posts_link() ) : ?>
		<div class="next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'venera' ) ); ?></div>
		<?php endif; ?>

	<?php endif; ?>

	</nav><!-- #<?php echo esc_html( $nav_id ); ?> -->
	<?php
}
endif; // venera_content_nav

if ( ! function_exists( 'venera_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 */
function venera_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'venera' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( 'Edit', 'venera' ), '<span class="edit-link">', '<span>' ); ?></p>
	<?php
			break;
		default :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<div class="row-fluid">
				<div class="span1">
					<?php echo get_avatar( $comment, 40 ); ?>
				</div>
				<div class="span11">
					<header>
						<div class="comment-author vcard">
							<?php printf( __( '%s <span class="says">says:</span>', 'venera' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
						</div>
						<?php if ( $comment->comment_approved == '0' ) : ?>
							<div class="alert"><?php _e( 'Your comment is awaiting moderation.', 'venera' ); ?></div>
						<?php endif; ?>
					</header>
					<div class="comment-content"><?php comment_text(); ?></div>
					<footer>
						<div class="comment-meta commentmetadata">
							<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>"><time datetime="<?php comment_time( 'c' ); ?>">
							<?php printf( _x( '%1$s at %2$s', '1: date, 2: time', 'venera' ), get_comment_date(), get_comment_time() ); ?>
							</time></a>
							<?php edit_comment_link( __( 'Edit', 'venera' ), '<span class="edit-link">', '<span>' ); ?>
						</div><!-- .comment-meta .commentmetadata -->
						<div class="reply">
							<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
						</div><!-- .reply -->
					</footer>
				</div>
			</div>
		</article><!-- #comment-## -->

	<?php
			break;
	endswitch;
}
endif; // ends check for venera_comment()

if ( ! function_exists( 'venera_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function venera_posted_on() {
	printf( __( 'Posted on <a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a><span class="byline"> by <span class="author vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s</a></span></span>', 'venera' ),
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'venera' ), get_the_author() ) ),
		get_the_author()
	);
}
endif;

if ( ! function_exists( 'generate_comments_string_link' ) ) :
/* Generate a translated string for comments link */
function generate_comments_string_link($comments_number) {
	$comments_string = __( 'No comments', 'venera' );
	switch($comments_number){
		case 0:
			break;
		case 1:
			$comments_string = "1 ".__( 'Comment', 'venera' );
			break;
		default:
			$comments_string = $comments_number.' '.__( 'Comments', 'venera' );
			break;
	}
	return $comments_string;
}
endif;

if ( ! function_exists( 'venera_post_meta_top' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time, author and tags.
 */
function venera_post_meta_top() {

	printf( __( '<ul>
								<li>%1$s</li>
								<li>Posted on <a href="%2$s" title="%3$s" rel="bookmark"><time class="entry-date" datetime="%4$s">%5$s</time></a></li>
								<li><span class="byline"> by <span class="author vcard"><a class="url fn n" href="%6$s" title="%7$s" rel="author">%8$s</a></span></span></li>
								<li><a href="%9$s">%10$s</a></li>
							</ul>', 'venera' ),
		get_the_tag_list( '<div class="entry-meta-tags">Tags: ', '', '</div>' ),
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'venera' ), get_the_author() ) ),
		get_the_author(),
		get_comments_link(),
		generate_comments_string_link(get_comments_number())
	);
}
endif;


/**
 * Returns true if a blog has more than 1 category
 */
function venera_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'all_the_cool_cats' ) ) ) {
		// Create an array of all the categories that are attached to posts
		$all_the_cool_cats = get_categories( array(
			'hide_empty' => 1,
		) );

		// Count the number of categories that are attached to the posts
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'all_the_cool_cats', $all_the_cool_cats );
	}

	if ( '1' != $all_the_cool_cats ) {
		// This blog has more than 1 category so venera_categorized_blog should return true
		return true;
	} else {
		// This blog has only 1 category so venera_categorized_blog should return false
		return false;
	}
}

/**
 * Flush out the transients used in venera_categorized_blog
 */
function venera_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'all_the_cool_cats' );
}
add_action( 'edit_category', 'venera_category_transient_flusher' );
add_action( 'save_post', 'venera_category_transient_flusher' );