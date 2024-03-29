<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package venera
 */
?>

<div class="blog-side-bar">
    <div class='blog-side-search widget-tp'>            
        <h3>
            <i class='icon-search'></i>
            Search in blog
        </h3>
        <aside class="default-sidebar">
            <div class="blog-side-bar">
                <?php dynamic_sidebar( 'sidebar-default' ); ?>
            </div>
        </aside>

    </div>
    <div class='blog-categories widget-tp'>
        <h3>
          <i class='icon-th-list'></i>
          Post Categories
        </h3>
        <?php the_category( $separator, $parents, $post_id ); ?> 
        
    </div>
        
    <div class='blog-side-text-block widget-filled widget-yellow'>
    <?php if ( is_tag() ) {  ?>
        <h3>Tag Description</h3>
        <p><?php echo tag_description() ?></p>        
    <?php }?>
                
    <?php if (is_single()) { ?>
        <h3>Post Summary</h3>
        <?php echo get_the_excerpt(  );}?>
        
        <?php if (is_category()) { ?>
        <h3>Category Description</h3>
        <?php echo category_description(  );}?>
        
        <?php if (is_search()) { ?>
        <h3>You Looked for: </h3>
        <p><?php echo get_search_query( true ); }?></p>

  </div>

<?php 
    $all_the_tags = get_the_tags();
    if ($all_the_tags) { ?>
        <div class='blog-side-tags widget-tp'>
            <h3>
              <i class='icon-tags'></i>Tags
            </h3>
            <ul>
                <?php foreach($all_the_tags as $this_tag) { ?>
                    <li>
                        <a href="<?php echo get_tag_link($this_tag->term_id); ?>" 
                           class="side-tag"><?php echo $this_tag->name; ?></a>
                    </li>

                <?php } ?>
            </ul>
        </div>
    <?php } ?>
</div>
    





