<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package venera
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <?php if(get_field('extra_padding_on_top') == 'yes'){ ?>
    <section class="section-wrapper">
  <?php } ?>
  <?php if(get_field('use_title_as_a_header')){ ?>
  	<header class="entry-header">
      <div class="container">
    		<h1 class="entry-title header-lined"><?php the_title(); ?></h1>
      </div>
  	</header><!-- .entry-header -->
  <?php } ?>
    <?php if(substr(get_the_content(), 0, 1 ) === "[") { ?>
    <?php the_content(); ?>
    <?php }else{ ?>
    <div class="container"><?php the_content(); ?></div>
    <?php } ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'venera' ), 'after' => '</div>' ) ); ?>
  	<?php edit_post_link( __( 'Edit', 'venera' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
  <?php if(get_field('extra_padding_on_top') == 'yes'){ ?>
    </section>
  <?php } ?>
</article><!-- #post-## -->
