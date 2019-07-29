<?php
/**
 * @package venera
 */

$description_class = (get_field('portfolio_wrap_description') == true) ? 'box-wrapper' : '';


$description_html = '';
$item_html = '';
$content_html = '';

$images = false;
if((get_field('content_type') == 'image') && get_field('images')){
  $images_arr = get_field('images');
  foreach($images_arr as $image_arr){
    $images[] = $image_arr['id'];
  }
}
$browser_url = ( get_field('browser_url_text') ) ? get_field('browser_url_text') : get_the_title();
$image_size = ( get_field('image_size') ) ? get_field('image_size') : 'thumbnail';
$item_html = shortcode_framed_image_func(
  array(
    'content_type'              => get_field('content_type'),
    'video_link'                => get_field('video_link'),
    'frame_type'                => get_field('frame_type'),
    'images'                    => $images,
    'img_size'                  => $image_size,
    'lightbox_on_click'         => get_field('portfolio_show_image_lightbox'),
    'custom_image_for_lightbox' => get_field('custom_image_for_lightbox'),
    'browser_url'               => $browser_url,
    'faded_text'                => false,
    'custom_link'               => false,
    'lightbox'                  => false,
    'slider_engine'             => 'flexslider',
    'css_animation'             => get_field('css_animation'),
    'extra_class'               => 'portfolio-frame-w'
  )
);

$content = get_the_content();
$content = apply_filters('the_content', $content);
$content = str_replace(']]>', ']]&gt;', $content);

$description_html .= '
  <div class="entry-content-w ' . $description_class . '">
    <header class="entry-header">
      <h2 class="entry-title">' . get_the_title() . '</h2>
      <div class="entry-meta">' . get_the_term_list(get_the_ID(), 'portfolio-category') . '</div>
    </header>
    <div class="entry-content">'. $content. '</div>';
    if(get_field('link_to_external_website')){
      $description_html .= '<div><a href="' . get_field('link_to_external_website') . '" class="btn btn-primary">Visit Website <i class="icon-circle-arrow-right"></i></a></div>';
    }
    $description_html .= '
  </div>';

if(get_field('portfolio_description_column_position') == 'bottom'){
  $content_html .= '<div class="portfolio-on-top">'.$item_html.'</div>'.$description_html;
}else{
  $description_column_width = get_field('portfolio_description_column_width');
  if ($description_column_width == '') {
    // Set a narrower image column if a phone selected as a frame type and there is no custom column width set in admin
    if(get_field('photo_wrapper_type') == 'phone'){
      $description_column_width = 8;
    } else {
      $description_column_width = 6;
    }
  }
  $image_column_width = 12 - $description_column_width;
  $content_html .= '<div class="row"><div class="span'.$image_column_width.'">'.$item_html.'</div><div class="span'.$description_column_width.'">'.$description_html.'</div></div>';
}
?>

<div class="container">
  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>><?php echo $content_html; ?></article>
  <?php edit_post_link( __( 'Edit', 'venera' ), '<span class="edit-link"><i class="icon-cog"></i> ', '</span>' ); ?>
</div>
<?php
  # If sidebar has widgets - show it, otherwise don't
  if ( is_active_sidebar('sidebar-under-portfolio') ): ?>
    <aside class="portfolio-sidebar-w">
      <div class="container">
        <?php
        the_widget( 'VeneraRelatedPortfolioItemsWidget', array( 'title' => __( 'Related Items', 'venera' ), 'number_of_posts' => 4 ), array(
          'name'            => __( 'Under Portfolio', 'venera' ),
          'id'              => 'sidebar-under-portfolio',
          'description'     => 'Sidebar for section under portfolio item',
          'before_widget'   => '<aside id="%1$s" class="widget %2$s">',
          'after_widget'    => '</aside>',
          'before_title'    => '<h4 class="widget-title">',
          'after_title'     => '</h4>',
          ) );
        ?>
      </div>
    </aside>
  <?php
  endif; ?>
<div class="container">
  <?php venera_content_nav( 'nav-below' ); ?>
</div>
<div class="container">
  <?php
    // If comments are open or we have at least one comment, load up the comment template
    if ( comments_open() || '0' != get_comments_number() )
      comments_template(); ?>
</div>