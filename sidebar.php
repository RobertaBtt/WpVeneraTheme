<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package venera
 */
?>
<aside class="default-sidebar">
    <?php dynamic_sidebar( 'sidebar-default' ); ?>
</aside>


<div class='blog-side-text-block widget-filled widget-yellow'>
    <?php if ( is_tag() ) {  ?>
        <h3>Tag Description</h3>
        <p><?php echo tag_description() ?></p>        
    <?php }?>
        
    <?php if (is_single()) { echo get_the_excerpt(  );}?>

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

