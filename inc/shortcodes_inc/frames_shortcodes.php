<?php
# --------------------------------------------#
# SHORTCODE FOR BROWSER FRAME
#---------------------------------------------#
function shortcode_framed_image_func($atts, $content = null){
  extract(shortcode_atts(array(
    'content_type' => 'image',
    'video_link' => false,
    'frame_type' => '',
    'images' => '',
    'img_size' => 'thumbnail',
    'lightbox_on_click'         => true,
    'custom_image_for_lightbox' => false,
    'browser_url' => '',
    'faded_text' => false,
    'custom_link' => false,
    'lightbox' => false,
    'slider_engine' => 'flexslider',
    'css_animation' => '',
    'extra_class' => '',
    'hide_buttons' => false
  ), $atts));
  switch($frame_type){
    case "browser":
      return shortcode_browser_frame_func($atts, $content);
    break;
    case "phone":
      return shortcode_phone_frame_func($atts, $content);
    break;
    case "picture":
      return shortcode_picture_frame_func($atts, $content);
    break;
    case 'plain':
      return shortcode_plain_frame_func($atts, $content);
    break;
    default:
      return shortcode_no_frame_func($atts, $content);
    break;
  }

}

# --------------------------------------------#
# SHORTCODE FOR BROWSER FRAME
#---------------------------------------------#
function shortcode_browser_frame_func($atts, $content = null){
  extract(shortcode_atts(array(
    'content_type' => 'image',
    'video_link' => false,
    'images' => '',
    'img_size' => 'thumbnail',
    'lightbox_on_click'         => true,
    'custom_image_for_lightbox' => false,
    'browser_url' => '',
    'faded_text' => false,
    'faded_text' => false,
    'custom_link' => false,
    'lightbox' => false,
    'slider_engine' => 'flexslider',
    'css_animation' => '',
    'extra_class' => '',
    'hide_buttons' => false
  ), $atts));

  $animation_class = getCSSAnimation($css_animation);
  $buttons_html = '';
  if($hide_buttons != 'yes'){
    $buttons_html =
    '<div class="browser-buttons-w hidden-phone">
      <div class="browser-button browser-button-first">
        <i class="icon-arrow-left"></i>
      </div>
      <div class="browser-button browser-button-second">
        <i class="icon-arrow-right"></i>
      </div>
      <div class="browser-button browser-button-third">
        <i class="icon-repeat"></i>
      </div>
    </div>';
  }
  $settings_icon = '';
  if($hide_buttons != 'yes'){
    $settings_icon =
    '<div class="browser-settings-w">
      <div class="browser-settings">
        <i class="icon-reorder"></i>
      </div>
    </div>';
  }
  $output =
  '<div class="browser-w' . $animation_class . ' ' . $extra_class .'">
    <div class="portfolio-browser-controls">'. $buttons_html .
      '<div class="browser-url-w">
        <div class="browser-url">
          <span>' . $browser_url . '</span>
        </div>
      </div>
      ' . $settings_icon . '
    </div>
    <div class="browser-content-w">';
      switch($content_type){
        case "image":
          $output .= shortcode_venera_image_slider_func($atts, $content);
          if($faded_text){
            $output .=
            '<div class="browser-fade">
              <div class="browser-fade-desc">
                <span>' . $faded_text . '</span>
              </div>
            </div>';
          }
        break;
        case "video":
          $output .= do_shortcode('[vc_video link="'.$video_link.'"]');
        break;
      }
      $output .=
    '</div>
  </div>';

  return $output;
}

# --------------------------------------------#
# SHORTCODE FOR PHONE FRAME
#---------------------------------------------#
function shortcode_phone_frame_func($atts, $content = null){
  extract(shortcode_atts(array(
    'content_type' => 'image',
    'video_link' => false,
    'images' => '',
    'img_size' => 'thumbnail',
    'lightbox_on_click'         => true,
    'custom_image_for_lightbox' => false,
    'browser_url' => '',
    'faded_text' => false,
    'faded_text' => false,
    'custom_link' => false,
    'lightbox' => false,
    'slider_engine' => 'bootstrap',
    'css_animation' => '',
    'extra_class' => ''
  ), $atts));
  // $atts['slider_engine'] = $slider_engine = 'bootstrap';
  $animation_class = getCSSAnimation($css_animation);
  $output =
    '<div class="phone-w' . $animation_class . ' ' . $extra_class .'">
      <div class="phone-power"></div>
      <div>
        <div class="phone-camera"></div>
      </div>
      <div>
        <div class="phone-mic"></div>
      </div>
      <div class="phone-content-w">
        <div class="phone-photo">';
          switch($content_type){
            case "image":
              $output .= shortcode_venera_image_slider_func($atts, $content);
            break;
            case "video":
              $output .= do_shortcode('[vc_video link="'.$video_link.'"]');
            break;
          }
        $output .=
        '</div>
      </div>
      <div class="phone-button-w">
        <div class="phone-button-i"></div>
      </div>
    </div>';

  return $output;
}

# --------------------------------------------#
# SHORTCODE FOR PICTURE FRAME
#---------------------------------------------#
function shortcode_picture_frame_func($atts, $content = null){
  extract(shortcode_atts(array(
    'content_type' => 'image',
    'video_link' => false,
    'images' => '',
    'img_size' => 'thumbnail',
    'lightbox_on_click'         => true,
    'custom_image_for_lightbox' => false,
    'browser_url' => '',
    'faded_text' => false,
    'css_animation' => '',
    'extra_class' => ''
  ), $atts));

  $animation_class = getCSSAnimation($css_animation);
  $output =
  '<div class="portfolio-photo-frame-w ' . $animation_class . ' ' . $extra_class .'">
    <div class="portfolio-photo-frame-i">
      <div class="portfolio-photo-frame-shadow">';
      switch($content_type){
        case "image":
          $output .= shortcode_venera_image_slider_func($atts, $content);
        break;
        case "video":
          $output .= do_shortcode('[vc_video link="'.$video_link.'"]');
        break;
      }
      $output .=
      '</div>
    </div>
  </div>';

  return $output;
}

# --------------------------------------------#
# SHORTCODE FOR PLAIN FRAME
#---------------------------------------------#
function shortcode_plain_frame_func($atts, $content = null){
  extract(shortcode_atts(array(
    'content_type' => 'image',
    'video_link' => false,
    'images' => '',
    'img_size' => 'thumbnail',
    'lightbox_on_click'         => true,
    'custom_image_for_lightbox' => false,
    'browser_url' => '',
    'faded_text' => false,
    'faded_text' => false,
    'custom_link' => false,
    'lightbox' => false,
    'slider_engine' => 'flexslider',
    'css_animation' => '',
    'extra_class' => ''
  ), $atts));

  $animation_class = getCSSAnimation($css_animation);
  $output = '<div class="portfolio-photo-plain-w' . $animation_class . ' ' . $extra_class .'">';
    switch($content_type){
      case "image":
        $output .= shortcode_venera_image_slider_func($atts, $content);
      break;
      case "video":
        $output .= do_shortcode('[vc_video link="'.$video_link.'"]');
      break;
    }
  $output .= '</div>';

  return $output;
}


# --------------------------------------------#
# SHORTCODE FOR NO FRAME
#---------------------------------------------#
function shortcode_no_frame_func($atts, $content = null){
  extract(shortcode_atts(array(
    'content_type' => 'image',
    'video_link' => false,
    'images' => '',
    'img_size' => 'thumbnail',
    'lightbox_on_click'         => true,
    'custom_image_for_lightbox' => false,
    'browser_url' => '',
    'faded_text' => false,
    'faded_text' => false,
    'custom_link' => false,
    'lightbox' => false,
    'slider_engine' => 'flexslider',
    'css_animation' => '',
    'extra_class' => ''
  ), $atts));

  $animation_class = getCSSAnimation($css_animation);
  $output = '<div class="portfolio-no-frame' . $animation_class . ' ' . $extra_class .'">';
      switch($content_type){
        case "image":
          $output .= shortcode_venera_image_slider_func($atts, $content);
        break;
        case "video":
          $output .= do_shortcode('[vc_video link="'.$video_link.'"]');
        break;
      }
  $output .= '</div>';

  return $output;
}