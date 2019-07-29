<?php
# --------------------------------------------#
# SHORTCODE FOR PRICING TABLES
#---------------------------------------------#
function shortcode_pricing_table_func($atts, $content = null){
  extract(shortcode_atts(array(
    'title' => '',
    'currency_position' => 'before'
  ), $atts));
  $output =
  '<div class="pricing-table-w">';
    if( $title != '') $output .= '<h3 class="header-lined">' . $title . '</h3>';
    $output .= '
    <div class="pricing-packages">
      <div class="row-fluid">';
        $pricing_loop = venera_get_pricing_packages();
        $total_columns = 12 / $pricing_loop->found_posts;
        while ( $pricing_loop->have_posts() ) : $pricing_loop->the_post();
          # Generate tags for price value elements
          $price_currency_tag = '<span class="price-currency">' . get_field('price_currency') . '</span>';
          $price_period_tag   = '<span class="price-period">' . get_field('price_period') . '</span>';
          $price_value_tag    = '<span class="price-value">' . get_field('package_price') . '</span>';
          switch( $currency_position ){
            case 'before':
              $package_price_string = $price_currency_tag.$price_value_tag;
              break;
            case 'after':
              $package_price_string = $price_value_tag.$price_currency_tag;
              break;
            default:
              $package_price_string = $price_value_tag;
              break;
          }
          if( get_field('price_period') != '' ) $package_price_string .= $price_period_tag;
          $content = get_the_content();
          $content = apply_filters('the_content', $content);
          $content = str_replace(']]>', ']]&gt;', $content);
          $output.= '
          <div class="span' . $total_columns . '">
            <div class="pricing-package">
              <div class="package-name">' . get_the_title() . '</div>
              <div class="package-price">' . $package_price_string . '</div>
              <div class="package-features">' . $content . '</div>
              <div class="package-description">' . get_field('package_description') . '</div>
              <a href="' . get_field('package_link') . '" class="btn btn-primary btn-large">' . get_field('button_label') . '</a>
            </div>
          </div>';
        endwhile;
        $output.= '
      </div>
    </div>
  </div>';
  wp_reset_postdata();
  return $output;
}

# --------------------------------------------#
# SHORTCODE FOR CLIENTS
#---------------------------------------------#
function shortcode_clients_func($atts, $content = null){
  extract(shortcode_atts(array(
    'title' => __('Our Clients', 'venera'),
    'images' => '',
    'columns_per_row' => 6,
    'img_size' => 'thumbnail',
    'css_animation' => ''
  ), $atts));
  $column_class = VENERA_TOTAL_COLUMNS / $columns_per_row;

  $animation_class = getCSSAnimation($css_animation);
  $images = explode( ',', $images);
  $output =
    '<div class="framed-posts clients-w'.$animation_class.'">
      <h3 class="header-lined">' . $title . '</h3>
      <div class="row-fluid">';
      for($i = 0; $i < count($images); $i++) {
        $output .= '<div class="span'. $column_class .'">';
        $post_thumbnail = wpb_getImageBySize(array( 'attach_id' => $images[$i], 'thumb_size' => $img_size ));
        $output .= '<div class="framed-post client-w"><div class="fp-featured-img">' . $post_thumbnail['thumbnail'] . '</div></div>';
        $output .= '</div>';
      }
      $output .=
      '</div>
    </div>';
  return $output;
}

# --------------------------------------------#
# SHORTCODE FOR RECENT POSTS
#---------------------------------------------#
function shortcode_recent_posts_func($atts, $content = null){
  extract(shortcode_atts(array(
    'title' => __('Recent Posts', 'venera'),
    'columns_per_row' => 4,
    'limit' => 4,
    'css_animation' => ''
  ), $atts));
  $recent_posts_loop = venera_get_recent_posts($limit);
  $column_class = VENERA_TOTAL_COLUMNS / $columns_per_row;
  $animation_class = getCSSAnimation($css_animation);
  global $more;
  $output =
  '<section class="framed-posts recent-posts-w">';
    if( empty($title) == false ) $output.= '<h3 class="header-lined">' . $title . '</h3>';
    $output.= '
    <div class="row-fluid">';
      while ( $recent_posts_loop->have_posts() ) : $recent_posts_loop->the_post();
      $more = 0;
      $output.= '
      <div class="span' . $column_class . '">
        <div class="framed-post'. $animation_class .'">
          <h4 class="fp-title"><a href="' . get_permalink() . '">' . get_the_title() . '</a></h4>
          <div class="fp-meta-elements">
            <span class="fp-meta-element">' . get_the_date() . '</span>
            <a href="' . get_comments_link() . '" class="fp-meta-element">' . generate_comments_string_link(get_comments_number()) . '</a>
          </div>';
          if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
          $output.= '
          <a href="' . get_permalink() . '" class="fp-featured-img">' . get_the_post_thumbnail() . '</a>';
          }
          $output.= '
          <div class="fp-content"><p>' . get_the_excerpt() . '</p></div>
          <div class="fp-buttons">
            <a href="' . get_permalink() . '" class="btn">' . __('Read More', 'venera') . '</a>
          </div>
        </div>
      </div>';
      endwhile;
      $output.= '
    </div>
  </section>';
  wp_reset_postdata();
  return $output;
}



# --------------------------------------------#
# SHORTCODE FOR SLIDER
#---------------------------------------------#
function shortcode_venera_slider_func($atts, $content = null){
  extract(shortcode_atts(array(
    'slide_ids' => false,
    'delay' => false
  ), $atts));
  $slides_loop = venera_get_slides($slide_ids);
  global $more;
  $slides_count = 0;
  $slider_id = uniqid('slider_');
  wp_enqueue_style('flexslider');
  wp_enqueue_script('flexslider');

  // FLEXSLIDER ( I DONT LIKE HOW IT HIDES SLIDES UNTIL THEY ALL LOAD...NEED TO THINK HOW TO FIX IT)
  // $output =
  // '<div id="' . $slider_id . '" class="flexslider main-slider no-margin">
  //   <ul class="slides">';
  //     while ( $slides_loop->have_posts() ) : $slides_loop->the_post();
  //       $more = 0;
  //       $layout_css_class = get_field('layout_type');

  //       $content = get_the_content();
  //       $content = apply_filters('the_content', $content);
  //       $content = str_replace(']]>', ']]&gt;', $content);

  //       $output .= '<li><section class="section-leader ' . $layout_css_class . '">' . do_shortcode($content) . '</section></li>';
  //     endwhile;
  //     $output.= '
  //   </ul>';
  // $output .= '
  // </div>';

  // BOOTSTRAP SLIDER
  $autostart = ($delay > 0) ? 'yes' : 'no';
  $output =
  '<div id="' . $slider_id . '" class="carousel slide main-slider content-slider" data-interval="' . $delay . '" data-autostart="' . $autostart . '">
    <div class="carousel-inner">';
      while ( $slides_loop->have_posts() ) : $slides_loop->the_post();
        $more = 0;
        $active_class = ($slides_count == 0) ? "active" : "";
        $layout_css_class = get_field('layout_type');

        $content = get_the_content();
        $content = apply_filters('the_content', $content);
        $content = str_replace(']]>', ']]&gt;', $content);

        $output .= '<section class="item section-leader '. $active_class . ' ' . $layout_css_class . '">' . do_shortcode($content) . '</section>';
        $slides_count++;
      endwhile;
      $output .=
    '</div>
    <a class="carousel-control left" href="#' . $slider_id . '" data-slide="prev"><i class="icon-chevron-left"></i></a>
    <a class="carousel-control right" href="#' . $slider_id . '" data-slide="next"><i class="icon-chevron-right"></i></a>
  </div>';
  wp_reset_postdata();
  return $output;
}


# --------------------------------------------#
# SHORTCODE FOR TESTIMONIALS
#---------------------------------------------#
function shortcode_testimonials_func($atts, $content = null){
  extract(shortcode_atts(array(
    'title' => __('Testimonials', 'venera'),
    'columns_per_row' => 3,
    'limit' => 6,
    'style' => 'clicktoshow',
    'css_animation' => ''
  ), $atts));
  $testimonials_loop = venera_get_testimonials($limit);

  $output = '
  <section class="section-testimonials testimonials-style-' . $style . '">';
  if( empty($title) == false ) $output.= '<h3 class="header-lined">' . $title . '</h3>';

  switch ($style){
    case 'clicktoshow':
      global $more;
      $column_class = VENERA_TOTAL_COLUMNS / $columns_per_row;
      $faces = '';
      $speeches = '';
      $count = 0;
      $active = 'active';
      while ( $testimonials_loop->have_posts() ) : $testimonials_loop->the_post();
        $more = 0;
        if($count > 0) $active = '';
        $faces .= '<div class="span'.$column_class.'">';
          if ( has_post_thumbnail() ) $faces.= '<a class="testimonial-photo ' . $active . '" data-toggle="testimonial" href="#testimonial'. $count .'"><span>' . get_the_post_thumbnail() . '</span></a>';
        $faces .= '</div>';
        $title = (get_the_title() == '') ? '' : '<h4>"' . get_the_title() . '"</h4>';

        $content = get_the_content();
        // $content = apply_filters('the_content', $content);
        // $content = str_replace(']]>', ']]&gt;', $content);

        $speeches .= '<div class="testimonial-speech ' . $active . '" id="testimonial' . $count . '">' . $title . '<p>' . $content . '</p><div class="testimonial-speech-by">- ' . implode(', ', array_filter(array(get_field('person_name'), get_field('company_name')))) . '</div></div>';
        $count++;
      endwhile;
      $output .= '<div class="row-fluid hidden-phone">' . $faces . '</div>' . '<div class="testimonial-speeches">' . $speeches . '</div>';
    break;
    case 'opened':
      global $more;
      $animation_class = getCSSAnimation($css_animation);
      $column_class = VENERA_TOTAL_COLUMNS / $columns_per_row;
      $output.= '
      <div class="row-fluid">';
        global $more;
        while ( $testimonials_loop->have_posts() ) : $testimonials_loop->the_post();
          $more = 0;
          $output.= '
          <div class="span'. $column_class .'">';
            $title = (get_the_title() == '') ? '' : '<h4>"' . get_the_title() . '"</h4>';
            $content = get_the_content();
            // $content = apply_filters('the_content', $content);
            // $content = str_replace(']]>', ']]&gt;', $content);
            $output .= '<div class="testimonial-speech'. $animation_class .'">' . $title . '<p>' . $content . '</p></div>';
            $output .= '
            <div class="row-fluid">';
              $output .= '<div class="span3 offset1 hidden-phone">';
              if ( has_post_thumbnail() ) $output.= '<a class="testimonial-photo"><span>' . get_the_post_thumbnail() . '</span></a>';
              $output .= '</div>';

              $output .= '<div class="span8"><div class="testimonial-speech-by">- ' . implode(', ', array_filter(array(get_field('person_name'), get_field('company_name')))) . '</div></div>';
              $output .= '
            </div>
          </div>';
        endwhile;
      $output.= '
      </div>';
    break;
  }
  $output.= '</section>';
  wp_reset_postdata();
  return $output;
}

# --------------------------------------------#
# SHORTCODE FOR TEAM MEMBERS
#---------------------------------------------#
function shortcode_team_members_func($atts, $content = null){
  extract(shortcode_atts(array(
    'title' => __('Team Members', 'venera'),
    'columns_per_row' => 4,
    'members_limit' => 4,
    'separated' => true,
    'show_social_icons' => false,
    'css_animation' => ''
  ), $atts));
  $animation_class = getCSSAnimation($css_animation);
  $column_class = VENERA_TOTAL_COLUMNS / $columns_per_row;
  $separated_class = $separated === true ? ' section-separated ' : '';
  $team_members_loop = venera_get_team_members($members_limit);

  $output = '
  <section class="framed-posts section-team-members' . $separated_class . '">';
  if( empty($title) == false ) $output.= '<h3 class="header-lined">' . $title . '</h3>';
    $output.= '
    <div class="row-fluid">';
      global $more;
      $member_count = 0;
      while ( $team_members_loop->have_posts() ) : $team_members_loop->the_post();
        $member_count++;
        $more = 0;
        $output.= '
        <div class="span'. $column_class .'">
          <div class="framed-post'. $animation_class .'">';
            if ( has_post_thumbnail() ) $output.= '<div class="fp-featured-img">' . get_the_post_thumbnail() . '</div>';
            $output.= '
            <h5 class="fp-title">' . get_the_title();
            if ( get_field('sub_title') ) $output.= '<span class="fp-sub-title">' . get_field('sub_title') . '</span>';
            $output.= '
            </h5>';
            $output.= '
            <div class="fp-content">' . get_the_excerpt() . '</div>';
            if ( get_field('has_contact_information') ) {
              if(get_field('show_social_icons')){
                $output.= '
                <div class="fp-social-iconed-block">';
                  if ( get_field('twitter_url') )   $output.= '<a href="' . get_field('twitter_url') . '" class="fpi-item"><i class="icon-twitter"></i></a>';
                  if ( get_field('facebook_url') )  $output.= '<a href="' . get_field('facebook_url') . '" class="fpi-item"><i class="icon-facebook"></i></a>';
                  if ( get_field('linkedin_url') )  $output.= '<a href="' . get_field('linkedin_url') . '" class="fpi-item"><i class="icon-linkedin"></i></a>';
                  if ( get_field('pinterest_url') ) $output.= '<a href="' . get_field('pinterest_url') . '" class="fpi-item"><i class="icon-pinterest"></i></a>';
                  if ( get_field('email') )  $output.= '<a href="mailto:' . get_field('email') . '" class="fpi-item"><i class="icon-envelope"></i></a>';
                  if ( get_field('phone_number') )  $output.= '<span class="fpi-item"><i class="icon-phone"></i>' . get_field('phone_number') . '</span>';
                  $output.= '
                </div>';
              }else{
                $output.= '
                <div class="fp-social-text-block">';
                  if ( get_field('twitter_url') )   $output.= '<a href="' . get_field('twitter_url') . '" class="fpi-item">Twitter</a>';
                  if ( get_field('facebook_url') )  $output.= '<a href="' . get_field('facebook_url') . '" class="fpi-item">Facebook</a>';
                  if ( get_field('linkedin_url') )  $output.= '<a href="' . get_field('linkedin_url') . '" class="fpi-item">LinkedIn</a>';
                  if ( get_field('pinterest_url') ) $output.= '<a href="' . get_field('pinterest_url') . '" class="fpi-item">Pinterest</a>';
                  if ( get_field('email') )  $output.= '<a href="mailto:' . get_field('email') . '" class="fpi-item">Email</a>';
                  if ( get_field('phone_number') )  $output.= '<span class="fpi-item">' . get_field('phone_number') . '</span>';
                  $output.= '
                </div>';
              }
            }
            $output.= '
          </div>
        </div>';
        if($member_count == $columns_per_row){
          $member_count = 0;
          $output .= '</div><div class="row-fluid">';
        }
      endwhile;
    $output.= '
    </div>
  </section>';
  wp_reset_postdata();
  return $output;
}


# --------------------------------------------#
# SHORTCODE FOR ICON FONT
#---------------------------------------------#
function shortcode_icon_font_func($atts, $content = null){
  extract(shortcode_atts(array(
    'class' => 'icon-wrench',
    'size' => false,
    'color' => false,
    'margin' => false
  ), $atts));
  $css = '';
  if($size) $css .= 'font-size: '.$size.';';
  if($color) $css .= 'color: '.$color.';';
  if($margin) $css .= 'margin: '.$margin.';';
  $output = '<i class="'.$class.'"';
  if($css != '') $output .= ' style="' . $css . '"';
  $output .= '></i>';
  return $output;
}



# --------------------------------------------#
# SHORTCODE FOR FEATURES BLOCK WITH ICONS WRAPPER
#---------------------------------------------#
function shortcode_iconed_feature_func($atts, $content = null){
  extract(shortcode_atts(array(
    'icon_class' => '',
    'title' => '',
    'text' => '',
    'link' => ''
  ), $atts));
  $output = '<section class="iconed-feature">';
  if($link != '') $output .= '<a href="'.$link.'">';
  $output .= '<header>';
  if($icon_class != '') $output .= '<i class="' . $icon_class . '"></i>';
  if($title != '') $output .= '<h4>' . $title . '</h4>';
  $output .= '</header>';
  if($text != '') $output .= '<p>' . $text . '</p>';
  if($link != '') $output .= '</a>';
  $output .= '</section>';

  return $output;
}


# --------------------------------------------#
# IMAGE SLIDER FOR VARIOUS USES
#---------------------------------------------#
function shortcode_venera_image_slider_func($atts, $content = null){
  extract(shortcode_atts(array(
    'images'                    => '',
    'img_size'                  => 'thumbnail',
    'custom_link'               => false,
    'lightbox'                  => false,
    'slider_engine'             => 'bootstrap',
    'lightbox_on_click'         => 'yes',
    'custom_image_for_lightbox' => false
  ), $atts));
  if(!is_array($images)){
    $images = explode( ',', $images);
  }
  $output = '';
  $slider_id = uniqid('slider_');
  $gallery_id = uniqid('gallery_');
  if($lightbox_on_click == 'yes'){
    wp_enqueue_script( 'prettyphoto' );
    wp_enqueue_style( 'prettyphoto' );
  }

  // $slider_engine = 'bootstrap'; // Temprorary hardcode

  if(count($images) > 1){
    # If there are multiple images selected - build a slider
    switch($slider_engine){
      case "flexslider":
        wp_enqueue_style('flexslider');
        wp_enqueue_script('flexslider');
        $output .=
        '<div id="' . $slider_id . '" class="flexslider">
          <ul class="slides">';
            foreach($images as $image_info){
              $image = (is_array($image_info) && isset($image_info['id'])) ? wp_get_attachment_image_src($image_info['id'], $img_size) : wp_get_attachment_image_src($image_info, $img_size);
              if($lightbox_on_click == 'yes'){
                if($custom_image_for_lightbox){
                  $lightbox_image_arr = wp_get_attachment_image_src($custom_image_for_lightbox, 'full');
                  $lightbox_image = (isset($lightbox_image_arr[0])) ? $lightbox_image_arr[0] : $image[0];
                }else{
                  $lightbox_image = $image[0];
                }
                $output .= '<li><a href="'.$lightbox_image.'" data-rel="prettyPhoto['.$gallery_id.']" class="browser-photo prettyphoto"><img src="' . $image[0] . '" alt=""/></a></li>';
              }else{
                $output .= '<li><div class="browser-photo"><img src="' . $image[0] . '" alt=""/></div></li>';
              }
            }
            $output .=
          '</ul>
        </div>';
      break;
      case "bootstrap":
        $index = 0;
        $output .=
        '<div id="' . $slider_id . '" class="carousel slide">
          <div class="carousel-inner">';
            foreach($images as $index => $image_info){
              $active = ($index == 0) ? "active" : "";
              $image = (is_array($image_info) && isset($image_info['id'])) ? wp_get_attachment_image_src($image_info['id'], $img_size) : wp_get_attachment_image_src($image_info, $img_size);
              $tmp = wp_get_attachment_image_src($image_info, $img_size);

              if($lightbox_on_click == 'yes'){
                if($custom_image_for_lightbox){
                  $lightbox_image_arr = wp_get_attachment_image_src($custom_image_for_lightbox, 'full');
                  $lightbox_image = (isset($lightbox_image_arr[0])) ? $lightbox_image_arr[0] : $image[0];
                }else{
                  $lightbox_image = $image[0];
                }
                $output .= '<div class="item ' . $active .'"><a href="'.$lightbox_image.'" data-rel="prettyPhoto['.$gallery_id.']" class="browser-photo prettyphoto"><img src="' . $image[0] . '" alt=""/></a></div>';
              }else{
                $output .= '<div class="item ' . $active .'"><div class="browser-photo"><img src="' . $image[0] . '" alt=""/></div></div>';
              }
              $index++;
            }
            $output .=
          '</div>
          <a class="carousel-control left" href="#' . $slider_id . '" data-slide="prev"><i class="icon-chevron-left"></i></a>
          <a class="carousel-control right" href="#' . $slider_id . '" data-slide="next"><i class="icon-chevron-right"></i></a>
        </div>';
      break;
    }
  }else{
    # single image selected - show that image only
    if(isset($images[0])){
      $post_thumbnail = wpb_getImageBySize(array( 'attach_id' => $images[0], 'thumb_size' => $img_size ));
      if($lightbox_on_click == 'yes'){
        if($custom_image_for_lightbox){
          $lightbox_image_arr = wp_get_attachment_image_src($custom_image_for_lightbox, 'full');
          $lightbox_image = (isset($lightbox_image_arr[0])) ? $lightbox_image_arr[0] : $post_thumbnail['p_img_large'][0];
        }else{
          $lightbox_image = $post_thumbnail['p_img_large'][0];
        }
        $output .= '<a href="' . $lightbox_image . '" data-rel="prettyPhoto['.$gallery_id.']" class="browser-photo prettyphoto"><img src="' . $post_thumbnail['p_img_large'][0] . '" alt=""/></a>';
      }else{
        if($custom_link){
          $output .= '<a href="' . $custom_link . '" class="browser-photo"><img src="' . $post_thumbnail['p_img_large'][0] . '" alt=""/></a>';
        }else{
          $output .= '<div class="browser-photo"><img src="' . $post_thumbnail['p_img_large'][0] . '" alt=""/></div>';
        }
      }
    }
  }
  return $output;
}

# --------------------------------------------#
# SHORTCODE FOR PORTFOLIO ITEMS
#---------------------------------------------#
function shortcode_portfolio_block_func($atts, $content = null){
  extract(shortcode_atts(array(
    'title' => '',
    'columns_per_row' => 4,
    'icon_class' => '',
    'limit' => -1,
    'show_title' => '',
    'show_category' => '',
    'show_excerpt' => '',
    'show_link' => '',
    'show_lightbox' => '',
    'show_on_hover' => 'everything',
    'grid_template' => 'grid', //grid, filtered_grid
    'grid_layout_mode' => 'fitRows',
    'button_size' => '',
    'details_btn_color' => '',
    'lightbox_btn_color' => '',
    'flipping_effect' => 'style_1',
    'text_align' => '',
    'css_animation' => ''
  ), $atts));
  $animation_class = getCSSAnimation($css_animation);
  $portfolio_loop = venera_get_portfolio_items($limit);
  $column_class = VENERA_TOTAL_COLUMNS / $columns_per_row;
  $taxonomies = array('portfolio-category');
  $section_title_html = '';
  global $more;
  $teaser_categories = Array();
  $css_align = ($text_align != '' && $text_align != 'auto') ? 'text-'.$text_align : '';
  $icon_html = ( empty($icon_class) == false ) ? '<i class="' . $icon_class . '"></i>' : '';
  if( empty($title) == false ) $section_title_html.= '<h3 class="header-lined">' . $icon_html . $title . '</h3>';

  if ( $grid_template == 'grid' || $grid_template == 'filtered_grid') {
    wp_enqueue_style('isotope-css');
    wp_enqueue_script( 'isotope' );
    $isotope_item = 'isotope-item ';
  } else {
    $isotope_item = '';
  }
  $items = '';
  $items.= '
  <ul class="wpb_thumbnails wpb_thumbnails-fluid clearfix portfolio-items-grid-w" data-layout-mode="'.$grid_layout_mode.'">';
    $items_count = 0;
    while ( $portfolio_loop->have_posts() ) : $portfolio_loop->the_post();
    $items_count++;
    $more = 0;
    $categories_css = '';
    if( $grid_template == 'filtered_grid' ) {
      $post_categories = wp_get_object_terms($portfolio_loop->post->ID, $taxonomies);
      if(!is_wp_error($post_categories)) {
        foreach($post_categories as $cat) {
          if(!in_array($cat->term_id, $teaser_categories)) {
              $teaser_categories[] = $cat->term_id;
          }
          $categories_css .= ' grid-cat-'.$cat->term_id;
        }
      }
    }
    $image_html = '';
    $items.= '
    <li class="vc_span' . $column_class . ' ' . $css_align . ' ' . $isotope_item . $categories_css.'">
      <div class="framed-post'.$animation_class.'"><figure>';
        if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
        $image_html = '
        <div class="fp-featured-img">' . get_the_post_thumbnail() . '</div>';
        }
        $items.= '
        <figcaption>';
          $show_on_hover_html = '';
          $show_always_html = $image_html;
          $title_html = '';
          $categories_html = '';
          $content_html = '';
          $buttons_html = '';
          $lightbox_image_src_arr = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
          if(isset($lightbox_image_src_arr[0])){
            $lightbox_image_src = $lightbox_image_src_arr[0];
          }else{
            $lightbox_image_src = get_the_post_thumbnail();
          }

          if($show_title == 'yes') $title_html .= '<h5 class="fp-title"><a href="' . get_permalink() . '">' . get_the_title() . '</a></h5>';
          $taxonomy = get_the_term_list(get_the_ID(), 'portfolio-category');
          if(($show_category == 'yes') && $taxonomy) $categories_html .= '<div class="fp-category">' . $taxonomy . '</div>';
          if($show_excerpt == 'yes') $content_html .= '<div class="fp-content">' . get_the_excerpt() . '</div>';
          if($show_link == 'yes') $buttons_html .= '<a href="'. get_permalink() .'" class="btn ' . $details_btn_color . ' '. $button_size . ' fp-details-btn"><i class="icon-file-text-alt"></i> ' . __("View Details", "Portfolio") . '</a>';
          if($show_lightbox == 'yes'){
            wp_enqueue_script( 'prettyphoto' );
            wp_enqueue_style( 'prettyphoto' );
            $buttons_html .= '<a href="'. $lightbox_image_src .'" data-rel="prettyPhoto" class="btn ' . $lightbox_btn_color . ' '. $button_size . ' fp-lightbox-btn prettyphoto"><i class="icon-zoom-in"></i> ' . __("View Bigger", "Portfolio") . '</a>';
          }
          if($buttons_html != '') $buttons_html = '<div class="fp-buttons">'.$buttons_html.'</div>';

          switch($show_on_hover){
            case "everything":
              $show_on_hover_html = $title_html.$categories_html.$content_html.$buttons_html;
            break;
            case "buttons":
              $show_on_hover_html = $buttons_html;
              $show_always_html .= $title_html.$categories_html.$content_html;
            break;
            case "excerpt_and_buttons":
              $show_on_hover_html = $content_html.$buttons_html;
              $show_always_html .= $title_html.$categories_html;
            break;
          }
          if($show_always_html != '') $items .= '<div class="fp-show-always">' . $show_always_html . '</div>';
          if($show_on_hover_html != '') $items .= '<div class="fp-show-on-hover">' . $show_on_hover_html . '</div>';
          $items.= '
        </figcaption>
      </figure></div>
    </li>';
    endwhile;
    $items.= '
  </ul>';
  wp_reset_postdata();

  if( $grid_template == 'filtered_grid' ) {
      $categories_array = get_terms($taxonomies, array(
          'orderby' => 'name'
      ));

      $categories_list_output = '<ul class="categories_filter clearfix">';
      $categories_list_output .= '<li class="active"><a href="#" data-filter="*">' . __('All', 'js_composer') . '</a></li>';
      foreach($categories_array as $cat) {
          $categories_list_output .= '<li><a href="#" data-filter=".grid-cat-'.$cat->term_id.'">' . esc_attr($cat->name) . '</a></li>';
      }
      $categories_list_output.= '</ul><div class="clearfix"></div>';
  } else {
      $categories_list_output = '';
  }
  return '<section class="framed-posts portfolio-gallery-w '. $flipping_effect . ' on-hover-' . $show_on_hover . ' portfolio-items-'.$grid_template.' wpb_'.$grid_template.'">' . $section_title_html . $categories_list_output . $items . '</section>';
}



require_once( get_template_directory() . '/inc/shortcodes_inc/frames_shortcodes.php' );

function register_shortcodes(){
  add_shortcode( 'team_members', 'shortcode_team_members_func' );
  add_shortcode( 'iconed_feature', 'shortcode_iconed_feature_func' );
  add_shortcode( 'clients', 'shortcode_clients_func' );
  add_shortcode( 'recent_work', 'shortcode_recent_work_func' );
  add_shortcode( 'recent_posts', 'shortcode_recent_posts_func' );
  add_shortcode( 'pricing_table', 'shortcode_pricing_table_func' );
  add_shortcode( 'portfolio_block', 'shortcode_portfolio_block_func' );

  add_shortcode( 'venera_framed_image', 'shortcode_framed_image_func' );
  add_shortcode( 'browser_frame', 'shortcode_browser_frame_func' );
  add_shortcode( 'phone_frame', 'shortcode_phone_frame_func' );
  add_shortcode( 'picture_frame', 'shortcode_picture_frame_func' );
  add_shortcode( 'plain_frame', 'shortcode_plain_frame_func' );
  add_shortcode( 'no_frame', 'shortcode_no_frame_func' );

  add_shortcode( 'feature_block', 'shortcode_feature_block_func' );
  add_shortcode( 'testimonials', 'shortcode_testimonials_func' );
  add_shortcode( 'icon', 'shortcode_icon_font_func' );
  add_shortcode( 'venera_slider', 'shortcode_venera_slider_func' );
  add_shortcode( 'venera_image_slider', 'shortcode_venera_image_slider_func' );
}
register_shortcodes();
// add_action( 'init', 'register_shortcodes');