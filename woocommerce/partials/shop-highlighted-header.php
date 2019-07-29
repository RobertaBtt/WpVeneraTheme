<?php if(get_field('show_highlighted_header', woocommerce_get_page_id( 'shop' )) === true){ ?>
  <?php
  $css_header_class = (get_field('header_same_line_title', woocommerce_get_page_id( 'shop' )) === true) ? 'same-line' : '';
  $css = '';
  $icon_html = '';
  if(get_field('header_custom_background', woocommerce_get_page_id( 'shop' )) == true){
    if(get_field('header_background_image', woocommerce_get_page_id( 'shop' ))){
      $background_url_arr = get_field('header_background_image', woocommerce_get_page_id( 'shop' ));
      if(is_array($background_url_arr)) $css .= 'background: url(' . $background_url_arr['url'] . ') top left repeat;';
    }
    if(get_field('header_solid_color', woocommerce_get_page_id( 'shop' )) != '') $css .= 'background:' . get_field('header_solid_color', woocommerce_get_page_id( 'shop' )).';';
    if(get_field('header_custom_sub_title_font_color', woocommerce_get_page_id( 'shop' )) != '') $sub_title_css = 'color: '.get_field('header_custom_sub_title_font_color', woocommerce_get_page_id( 'shop' )).';';
  } ?>
  <section class="section-highlighted-header header-align-<?php the_field('header_icon_position', woocommerce_get_page_id( 'shop' )) ?>" style="<?php echo $css; ?>">
    <div class="container">
      <header class="<?php echo $css_header_class ?>">
        <div class="row">
          <?php
          if(get_field('add_icon_or_image_to_header', woocommerce_get_page_id( 'shop' ))){
            $icon_html .= '<div class="span2">';
            if(get_field('header_icon_class', woocommerce_get_page_id( 'shop' ))) $icon_html .= '<div class="highlighted-header-icon"><i class="' . get_field('header_icon_class', woocommerce_get_page_id( 'shop' )) . '"></i></div>';
            if(get_field('header_image', woocommerce_get_page_id( 'shop' ))){
              $header_img_arr = get_field('header_image', woocommerce_get_page_id( 'shop' ));
              if(is_array($header_img_arr)) $icon_html .= '<div class="highlighted-header-image"><img src="' . $header_img_arr['url'] . '" alt=""></div>';
            }
            $icon_html .= '</div>';
          }
          ?>
          <?php if(get_field('header_icon_position', woocommerce_get_page_id( 'shop' )) == 'left') echo $icon_html; ?>
          <div class="<?php echo (get_field('add_icon_or_image_to_header', woocommerce_get_page_id( 'shop' ))) ? "span10" : "span12"; ?>">
            <hgroup>
              <h1><?php the_field('header_title', woocommerce_get_page_id( 'shop' )); ?></h1>
              <h2 style="<?php echo $sub_title_css; ?>"><?php the_field('header_sub_title', woocommerce_get_page_id( 'shop' )); ?></h2>
            </hgroup>
          </div>
          <?php if(get_field('header_icon_position', woocommerce_get_page_id( 'shop' )) == 'right') echo $icon_html; ?>
        </div>
      </header>
    </div>
  </section>
<?php } ?>