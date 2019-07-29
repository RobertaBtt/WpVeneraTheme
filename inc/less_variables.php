<?php

class my_less extends lessc {

  private $default_vars = array();

  function __construct() {
    parent::__construct();

    // Images path
    define('CSS_IMAGES_PATH', get_template_directory_uri()."/images/");
  }

  public function load_defaults()
  {
    $scheme = array();
    $color = $this->get_current_color();
    switch($color){
      case 'color1':
        require_once('colors/color1.php');
      break;
      case 'color2':
        require_once('colors/color2.php');
      break;
      case 'color3':
        require_once('colors/color3.php');
      break;
      case 'color4':
        require_once('colors/color4.php');
      break;
      case 'color5':
        require_once('colors/color5.php');
      break;
      default:
        require_once('colors/color1.php');
      break;
    }
    $this->default_vars = $scheme;
  }

  public static function get_current_color()
  {
    if(isset($_SESSION['color_scheme'])){
      $color = $_SESSION['color_scheme'];
    }else{
      $color = get_field('color_scheme', 'option');
    }
    return $color;
  }


  // **************************************************
  // **************************************************
  // **************************************************

  // SETTING LESS CSS VARIABLES FROM THE ADMIN OPTIONS

  // **************************************************
  // **************************************************
  // **************************************************


  function my_less_vars( $vars, $handle ) {
    $this->load_defaults();
    $vars = $this->default_vars;
    $vars[ 'veneraFolderPath' ] = "'".get_template_directory_uri()."'";
    $vars[ 'veneraComposerAssetsPath' ] = "'".get_template_directory_uri()."/inc/js_composer/assets/'";

    if (get_field('logo_type', 'option') == 'text'){
      $vars[ 'logoFontSize' ] = $this->custom_or_default('logo_font_size', 'logoFontSize', '24px');
      $vars[ 'logoPadding' ] = '8px';
    }else{
      $vars[ 'logoFontSize' ] = '24px';
      $vars[ 'logoPadding' ] = '0px';
    }


    // Check if "allow override of color scheme" is checked in admin
    if(get_field('allow_overwrite_of_color_scheme', 'option') == true) {
      $vars[ 'bodyBackground' ]               = $this->custom_or_default('background_solid_color' , 'bodyBackground'); // #edece3 // #D5E5EF
      $vars[ 'textColor' ]                    = $this->custom_or_default('text_color', 'textColor');
      $vars[ 'headingsColor' ]                = $this->custom_or_default('headings_text_color', 'headingsColor'); // #3d3b36;

      /* ******************* */
      // FONTS
      /* ******************* */
      $vars[ 'primaryFontFamily' ]            = $this->custom_or_default( 'primary_font_family', 'primaryFontFamily' );
      $vars[ 'secondaryFontFamily' ]          = $this->custom_or_default( 'secondary_font_family', 'secondaryFontFamily' );
      $vars[ 'headingsFontWeight' ]           = $this->custom_or_default( 'headings_font_weight', 'headingsFontWeight' );
      $vars[ 'baseFontSize' ]                 = $this->custom_or_default( 'base_font_size', 'baseFontSize' );
      $vars[ 'baseLineHeight' ]               = $this->custom_or_default( 'base_line_height', 'baseLineHeight' );
      $vars[ 'baseFontWeight' ]               = $this->custom_or_default( 'base_font_weight', 'baseFontWeight' );
      // NAVIGTION FONTS
      $vars[ 'navigationFontFamily' ]         = $this->custom_or_default( 'navigation_font_family', 'navigationFontFamily' );
      $vars[ 'navigationFontWeight' ]         = $this->custom_or_default( 'navigation_font_weight', 'navigationFontWeight' );
      $vars[ 'navigationFontSize' ]           = $this->custom_or_default( 'navigation_font_size', 'navigationFontSize' );
      // BUTTONS FONTS
      $scheme[ 'btnFontFamily' ]              = $this->custom_or_default( 'buttons_font_family', 'btnFontFamily' );
      $scheme[ 'btnFontWeight' ]              = $this->custom_or_default( 'buttons_font_weight', 'btnFontWeight' );
      // FONT WEIGHTS
      $vars[ 'primaryFontWeightBold' ]        = $this->custom_or_default( 'primary_font_weight_bold', 'primaryFontWeightBold' );
      $vars[ 'primaryFontWeightNormal' ]      = $this->custom_or_default( 'primary_font_weight_normal', 'primaryFontWeightNormal' );
      $vars[ 'primaryFontWeightThin' ]        = $this->custom_or_default( 'primary_font_weight_thin', 'primaryFontWeightThin' );
      $vars[ 'secondaryFontWeightBold' ]      = $this->custom_or_default( 'secondary_font_weight_bold', 'secondaryFontWeightBold' );
      $vars[ 'secondaryFontWeightNormal' ]    = $this->custom_or_default( 'secondary_font_weight_normal', 'secondaryFontWeightNormal' );
      $vars[ 'secondaryFontWeightThin' ]      = $this->custom_or_default( 'secondary_font_weight_thin', 'secondaryFontWeightThin' );

      /* ******************* */
      // TOP BAR (NAVIGATION BAR)
      /* ******************* */
      $vars[ 'navbarBackground' ]             = $this->custom_or_default('top_bar_background_solid_color', 'navbarBackground');
      $vars[ 'navbarBackgroundHighlight' ]    = $this->custom_or_default('top_bar_background_solid_color', 'navbarBackgroundHighlight');
      $vars[ 'navbarBackgroundImage' ]        = $this->custom_or_default_image_url('top_bar_background_image', 'navbarBackgroundImage', 'none');
      $vars[ 'navbarText' ]                   = $this->custom_or_default('top_bar_text_color', 'navbarText');
      $vars[ 'navbarLinkColor' ]              = $this->custom_or_default('top_bar_text_color', 'navbarLinkColor');
      $vars[ 'navbarBottomBorder' ]           = $this->custom_merged_or_default('top_bar_bottom_border_color', 'navbarBottomBorder', '4px solid ', '4px solid '.$vars[ 'navbarBackground' ]);
      $vars[ 'navbarTopBorder' ]              = $this->custom_merged_or_default('top_bar_top_border_color', 'navbarTopBorder', '4px solid ', '4px solid '.$vars[ 'navbarBackground' ]);
      $vars[ 'navbarShadow' ]                 = $this->custom_or_default('top_bar_drop_shadow', 'navbarShadow');
      if(get_field('top_bar_drop_shadow', 'option') == true){
        $vars[ 'navbarShadow' ] = '0px 0px 6px 2px rgba(0,0,0,0.2)';
      }else{
        $vars[ 'navbarShadow' ] = 'none';
      }
      $vars[ 'bodyTopPadding' ]               = (get_field('top_bar_fixed_to_top', 'option') == 'yes') ? '78px' : '0px';

      /* ******************* */
      // HIGHLIGHTED HEADER ON TOP OF THE PAGE
      /* ******************* */
      $vars[ 'highlightedHeaderBackground' ]  = $this->custom_or_default('default_page_header_background_solid_color', 'highlightedHeaderBackground');
      $vars[ 'highlightedHeaderBackgroundImage' ]  = $this->custom_or_default_image_url('default_page_header_background_image', 'highlightedHeaderBackgroundImage');
      $vars[ 'highlightedHeaderHeadingColor' ]  = $this->custom_or_default('default_page_header_title_font_color', 'highlightedHeaderHeadingColor');
      $vars[ 'highlightedHeaderSubHeadingColor' ]  = $this->custom_or_default('default_page_header_sub_title_font_color', 'highlightedHeaderSubHeadingColor');
      if(get_field('default_page_header_make_it_flat', 'option') == true){
        $vars[ 'highlightedHeaderShadow' ]      = 'none';
        $vars[ 'highlightedHeaderTextShadow' ]  = 'none';
      }else{
        $vars[ 'highlightedHeaderShadow' ]      = "inset 0px -2px 5px 0px rgba(0,0,0,0.3), 0px 4px 1px 0px " . $this->adjustBrightness( $vars[ 'bodyBackground' ], 30 );
        $vars[ 'highlightedHeaderTextShadow' ]  = '2px 2px 0px '.$this->getContrastYIQ( $vars[ 'highlightedHeaderBackground' ], "rgba(255,255,255,0.3)", "rgba(0,0,0,0.3)");
      }


      /* ******************* */
      // MAIN AREA ON A HOMEPAGE - BIG SLIDER
      /* ******************* */
      $vars[ 'leaderBackground' ]             = $this->custom_or_default('leader_board_background_solid_color', 'leaderBackground'); // #76a3a0; // #494f50 // #5E717A
      $vars[ 'leaderBackgroundImage' ]        = $this->custom_or_default_image_url('leader_board_background_image', 'leaderBackgroundImage'); // #76a3a0; // #494f50 // #5E717A
      $vars[ 'leaderTextColor' ]              = $this->custom_or_default('leader_board_primary_text_color', 'leaderTextColor'); // #fff
      $vars[ 'leaderSecondaryTextColor' ]     = $this->custom_or_default('leader_board_secondary_text_color', 'leaderSecondaryTextColor'); // #fff
      $vars[ 'leaderHighlightColor' ]         = $this->custom_or_default('leader_board_highlight_text_color', 'leaderHighlightColor'); // #fff299
      $vars[ 'leaderFilterTextShadow' ]       = '0px 1px 0px '.$this->getContrastYIQ( $vars[ 'leaderBackground' ], "rgba(255,255,255,0.3)", "rgba(0,0,0,0.3)");

      /* ******************* */
      // HIGHLIGHTED BLOCK UNDER THE SLIDER
      /* ******************* */
      $vars[ 'accentBackground' ]             = $this->custom_or_default('highlighted_block_background_color', 'accentBackground'); // #4A5161
      $vars[ 'accentBackgroundHighlight' ]    = $this->custom_or_default('highlighted_block_background_color', 'accentBackgroundHighlight'); // #4A5161
      $vars[ 'accentHeadingColor' ]           = $this->custom_or_default('highlighted_block_headings_colors', 'accentHeadingColor');
      $vars[ 'accentIconsColor' ]             = $this->custom_or_default('highlighted_block_icons_color', 'accentIconsColor');
      $vars[ 'accentTextColor' ]              = $this->custom_or_default('highlighted_block_text_color', 'accentTextColor');
      if(get_field('highlighted_block_make_it_flat', 'option') == true){
        $vars[ 'accentIconsTextShadow' ]      = 'none';
        $vars[ 'accentBorders' ]              = 'none';
        $vars[ 'accentShadow' ]               = 'none';
      }else{
        $vars[ 'accentIconsTextShadow' ]      = '0px 4px 0px ' . $this->getContrastYIQ( $vars[ 'accentHeadingColor' ], "rgba(0,0,0,0.3)", "rgba(255,255,255,0.3)");
        # Default background was changed - regenerate border colors
        if(get_field('highlighted_block_background_color', 'option'))
          $vars[ 'accentBorders' ] = '2px solid '.$this->adjustBrightness( $vars[ 'accentBackground' ], -50 );
      }


      /* ******************* */
      // CTA SECTION
      /* ******************* */
      $vars[ 'standoutBackground' ]           = $this->custom_or_default('call_to_action_section_background', 'standoutBackground'); // #556270;
      $vars[ 'standoutBackgroundImage' ]      = $this->custom_or_default_image_url('call_to_action_section_background_image', 'standoutBackgroundImage'); // #556270;
      $vars[ 'standoutTextColor' ]            = $this->custom_or_default('call_to_action_section_text_color', 'standoutTextColor'); // #fff;

      /* ******************* */
      // FRAMED POSTS
      /* ******************* */
      $vars[ 'framedPostBackground' ]         = $this->custom_or_default('item_block_background_color', 'framedPostBackground');
      $vars[ 'framedPostBackgroundHover' ]    = $this->adjustBrightness($vars[ 'framedPostBackground' ], 10);
      if(get_field('item_block_flat', 'option') == true){
        # Flat items
        $vars[ 'framedPostBackgroundHighlight'] = $vars[ 'framedPostBackground' ];
      }else{
        $vars[ 'framedPostBackgroundHighlight'] = $this->custom_or_default('item_block_background_color', 'framedPostBackgroundHighlight');
      }
      $vars[ 'framedPostRadius' ]             = $this->custom_or_default('item_block_border_radius', 'framedPostRadius');
      $vars[ 'framedPostPadding' ]            = $this->custom_or_default('item_block_padding', 'framedPostPadding');
      $vars[ 'framedPostHeadingColor' ]       = $this->custom_or_default('item_block_text_color', 'framedPostHeadingColor');
      $vars[ 'framedPostTextColor' ]          = $this->custom_or_default('item_block_text_color', 'framedPostTextColor');
      if(get_field('item_block_flat', 'option') == true){
        $vars[ 'framedPostShadow' ]           = 'none';
        $vars[ 'framedPostShadowHover' ]      = 'none';
      }else{
        $inner_shadow_color = $this->adjustBrightness( $vars[ 'framedPostBackground' ], 10);
        $vars[ 'framedPostShadow' ]           = '0px 2px 4px 1px rgba(0,0,0,0.15), inset 2px 2px 3px 0px '.$inner_shadow_color;
        $vars[ 'framedPostShadowHover' ]      = '0px 2px 10px 2px rgba(0,0,0,0.25), inset 2px 2px 3px 0px '.$inner_shadow_color;
      }

      $vars[ 'framedPostLinkColor' ]          = $this->custom_or_default('item_block_text_links_color', 'framedPostLinkColor');
      $vars[ 'framedPostTagBg' ]              = $this->custom_or_default('item_block_tag_background_color', 'framedPostTagBg');
      $vars[ 'framedPostTagTextColor' ]       = $this->custom_or_default('item_block_tag_text_color', 'framedPostTagTextColor');

      /* ******************* */
      // TESTIMONIALS
      /* ******************* */
      $vars[ 'testimonialBubbleBackground' ]  = $this->custom_or_default('testimonial_background_color', 'testimonialBubbleBackground');
      $vars[ 'testimonialBubbleRadius' ]      = $this->custom_or_default('testimonial_border_radius', 'testimonialBubbleRadius');
      $vars[ 'testimonialBubblePadding' ]     = $this->custom_or_default('testimonial_box_padding', 'testimonialBubblePadding');
      $vars[ 'testimonialHighlightColor' ]    = $this->custom_or_default('testimonial_highlight_color', 'testimonialHighlightColor');
      $vars[ 'testimonialHeadingColor' ]      = $this->custom_or_default('testimonial_heading_color', 'testimonialHeadingColor');
      $vars[ 'testimonialTextColor' ]         = $this->custom_or_default('testimonial_text_color', 'testimonialTextColor');
      $vars[ 'testimonialByColor' ]           = $this->custom_or_default('testimonial_author_text_color', 'testimonialByColor');
      $vars[ 'testimonialBorderColor' ]       = $this->custom_or_default('testimonial_border_color', 'testimonialBorderColor');

      if(get_field('testimonial_make_it_flat', 'option') == true){
        $vars[ 'testimonialBubbleShadow' ]        = 'none';
        $vars[ 'testimonialAuthorShadow' ]        = 'none';
        $vars[ 'testimonialAuthorShadowFaded' ]   = 'none';
      }else{
        $inner_shadow_color = $this->adjustBrightness( $vars[ 'testimonialBubbleBackground' ], 5);
        $vars[ 'testimonialBubbleShadow' ]        = '0px 2px 10px 1px rgba(0,0,0,0.15), inset 1px 1px 2px 0px '.$inner_shadow_color;
        $vars[ 'testimonialAuthorShadow' ]        = '3px 3px 0px 0px rgba(0,0,0,0.15)';
        $vars[ 'testimonialAuthorShadowFaded' ]   = '-3px -3px 0px 0px rgba(0,0,0,0.15)';
      }

      /* ******************* */
      // ACCORDION
      /* ******************* */
      $vars[ 'accordionHeaderBackground' ]        = $this->custom_or_default('accordion_tab_header_bg', 'accordionHeaderBackground');
      $vars[ 'accordionHeaderColor' ]             = $this->custom_or_default('accordion_tab_header_text_color', 'accordionHeaderColor');
      $vars[ 'accordionHeaderBackgroundActive' ]  = $this->custom_or_default('accordion_tab_header_active_bg', 'accordionHeaderBackgroundActive');
      $vars[ 'accordionHeaderColorActive' ]       = $this->custom_or_default('accordion_tab_header_active_text_color', 'accordionHeaderColorActive');
      $vars[ 'accordionContentBackground' ]       = $this->custom_or_default('accordion_tab_content_bg', 'accordionContentBackground');
      $vars[ 'accordionContentColor' ]            = $this->custom_or_default('accordion_tab_content_text_color', 'accordionContentColor');
      $vars[ 'accordionRadius' ]                  = $this->custom_or_default('accordion_border_radius', 'accordionRadius');
      $vars[ 'accordionIconColor' ]               = $this->custom_or_default('accordion_icon_color', 'accordionIconColor');
      $vars[ 'accordionIconColorActive' ]         = $this->custom_or_default('accordion_icon_active_color', 'accordionIconColorActive');
      if(get_field('accordion_make_it_flat', 'option') == true){
        $vars[ 'accordionHeaderShadow' ]          = 'none';
        $vars[ 'accordionShadow' ]                = 'none';
      }else{
        $inner_shadow_color = $this->adjustBrightness( $vars[ 'accordionHeaderBackground' ], 5);
        $vars[ 'accordionHeaderShadow' ]          = '0px 2px 10px 1px rgba(0,0,0,0.15), inset 2px 2px 3px 0px '.$inner_shadow_color;
        $vars[ 'accordionShadow' ]                = '0px 2px 10px 1px rgba(0,0,0,0.15)';
      }

      /* ******************* */
      // TABS
      /* ******************* */
      $vars[ 'tabsHeaderBackground' ]        = $this->custom_or_default('tabs_tab_header_bg', 'tabsHeaderBackground');
      $vars[ 'tabsHeaderColor' ]             = $this->custom_or_default('tabs_tab_header_text_color', 'tabsHeaderColor');
      $vars[ 'tabsHeaderBackgroundActive' ]  = $this->custom_or_default('tabs_tab_header_active_bg', 'tabsHeaderBackgroundActive');
      $vars[ 'tabsHeaderColorActive' ]       = $this->custom_or_default('tabs_tab_header_active_text_color', 'tabsHeaderColorActive');
      $vars[ 'tabsContentBackground' ]       = $this->custom_or_default('tabs_tab_content_bg', 'tabsContentBackground');
      $vars[ 'tabsContentColor' ]            = $this->custom_or_default('tabs_tab_content_text_color', 'tabsContentColor');
      $vars[ 'tabsRadius' ]                  = $this->custom_or_default('tabs_border_radius', 'tabsRadius');
      if(get_field('tabs_make_it_flat', 'option') == true){
        $vars[ 'tabsHeaderShadow' ]          = 'none';
        $vars[ 'tabsContentShadow' ]         = 'none';
      }else{
        $inner_shadow_color = $this->adjustBrightness( $vars[ 'tabsHeaderBackground' ], -5);
        $vars[ 'tabsHeaderShadow' ]          = 'inset 0px -3px 0px 0px '.$inner_shadow_color;
        $vars[ 'tabsHeaderActiveShadow' ]    = 'none';
        $vars[ 'tabsContentShadow' ]         = '0px 2px 10px 1px rgba(0,0,0,0.15)';
      }


      /* ******************* */
      // SINGLE BLOG POSTS
      /* ******************* */
      $vars[ 'postContentRadius' ]                = $this->custom_or_default('post_content_radius', 'postContentRadius');
      $vars[ 'postContentPadding' ]               = $this->custom_or_default('post_content_padding', 'postContentPadding');
      $vars[ 'postContentBackground' ]            = $this->custom_or_default('post_content_background', 'postContentBackground');
      $vars[ 'postContentBackgroundHighlight' ]   = $this->custom_or_default('post_content_background', 'postContentBackground');
      $vars[ 'postContentHeadingsColor' ]         = $this->custom_or_default('post_content_headings_color', 'postContentHeadingsColor');
      $vars[ 'postContentTextColor' ]             = $this->custom_or_default('post_content_text_color', 'postContentTextColor');
      $vars[ 'postContentLinksColor' ]            = $this->custom_or_default('post_content_links_color', 'postContentLinksColor');
      if(get_field('post_content_make_it_flat', 'option') == true){
        $vars[ 'postContentShadow' ]              = 'none';
      }else{
        $vars[ 'postContentShadow' ]              = '0px 1px 10px 0px '.$this->adjustBrightness( $vars[ 'bodyBackground' ], -40 ).', inset 2px 2px 2px 0px '.$this->adjustBrightness( $vars[ 'postContentBackgroundHighlight' ], 20 );
      }

      /* ******************* */
      // POST COMMENTS
      /* ******************* */

      $vars[ 'postCommentFormRadius' ]                = $this->custom_or_default('comment_box_radius', 'postCommentFormRadius');
      $vars[ 'postCommentFormBackground' ]            = $this->custom_or_default('comment_box_background', 'postCommentFormBackground');
      $vars[ 'postCommentFormBackgroundHighlight' ]   = $this->custom_or_default('comment_box_background', 'postCommentFormBackgroundHighlight');
      $vars[ 'postCommentFormPadding' ]               = $this->custom_or_default('comment_box_padding', 'postCommentFormPadding');
      $vars[ 'postCommentFormHeadingsColor' ]         = $this->custom_or_default('comment_box_headings_color', 'postCommentFormHeadingsColor');
      $vars[ 'postCommentFormTextColor' ]             = $this->custom_or_default('comment_box_text_color', 'postCommentFormTextColor');
      $vars[ 'postCommentFormLinksColor' ]            = $this->custom_or_default('comment_box_links_color', 'postCommentFormLinksColor');

      if(get_field('comment_box_make_it_flat', 'option') == true){
        $vars[ 'postCommentFormShadow' ]              = 'none';
      }else{
        $vars[ 'postCommentFormShadow' ]              = '0px 1px 10px 0px '.$this->adjustBrightness( $vars[ 'bodyBackground' ], -40 ).', inset 2px 2px 2px 0px '.$this->adjustBrightness( $vars[ 'postCommentFormBackgroundHighlight' ], 20 );
      }

      /* ******************* */
      // PRICING TABLES
      /* ******************* */
      $vars[ 'pricingPackageBackground' ]         = $this->custom_or_default('pricing_background_color', 'pricingPackageBackground');
      $vars[ 'pricingPackageHeadingColor' ]       = $this->custom_or_default('pricing_heading_color', 'pricingPackageHeadingColor');
      $vars[ 'pricingPackageTextColor' ]          = $this->custom_or_default('pricing_text_color', 'pricingPackageTextColor');
      $vars[ 'pricingPackagePeriodColor' ]        = $this->custom_or_default('pricing_period_color', 'pricingPackagePeriodColor');
      $vars[ 'pricingPackageFeatureHighlight' ]   = $this->custom_or_default('pricing_highlight_color', 'pricingPackageFeatureHighlight');
      $vars[ 'pricingPackageRadius' ]             = $this->custom_or_default('pricing_border_radius', 'pricingPackageRadius');
      if(get_field('pricing_make_it_flat', 'option') == true){
        $vars[ 'pricingPackageShadow' ]             = 'none';
      }else{
        $vars[ 'pricingPackageShadow' ]             = '0px 0px 10px 0px rgba(0,0,0,0.3)';
      }

      /* ******************* */
      // BROWSER FRAME
      /* ******************* */
      $vars[ 'browserBackground' ]            = $this->custom_or_default('browser_background_color', 'browserBackground');
      $vars[ 'browserButtonsColor' ]          = $this->custom_or_default('browser_buttons_color', 'browserButtonsColor');
      $vars[ 'browserUrlBackground' ]         = $this->custom_or_default('browser_url_background', 'browserUrlBackground');
      $vars[ 'browserUrlColor' ]              = $this->custom_or_default('browser_url_color', 'browserUrlColor');
      $vars[ 'browserRadius' ]                = $this->custom_or_default('browser_border_radius', 'browserRadius');
      $vars[ 'browserUrlRadius' ]             = $this->custom_or_default('browser_url_border_radius', 'browserUrlRadius');
      if(get_field('browser_make_it_flat', 'option') == true){
        $vars[ 'browserShadow' ]              = 'none';
        $vars[ 'browserUrlShadow' ]           = 'none';
        $vars[ 'browserBorder' ]              = 'none';
        $vars[ 'browserButtonShadow' ]        = 'none';
        $vars[ 'browserContentShadow' ]       = 'none';
      }else{
        $vars[ 'browserShadow' ]              = '0px 2px 12px 1px rgba(0,0,0,0.25), inset 0px 0px 2px 1px '.$this->adjustBrightness( $vars[ 'browserBackground' ], 10 );
        $vars[ 'browserUrlShadow' ]           = 'inset 0px 1px 2px 0px ' . $this->adjustBrightness( $vars[ 'browserUrlBackground' ], -40 ) .', 0px 2px 0px 0px '.$this->adjustBrightness( $vars[ 'browserBackground' ], 15 );
        $vars[ 'browserContentShadow' ]       = 'inset 0px 1px 3px 1px rgba(0,0,0,0.4)';
        $vars[ 'browserBorder' ]              = '1px solid '.$this->adjustBrightness( $vars[ 'bodyBackground' ], -100 );
        $vars[ 'browserButtonShadow' ]        = '0px 2px 0px '.$this->getContrastYIQ( $vars[ 'browserButtonsColor' ], $this->adjustBrightness( $vars[ 'browserBackground' ], -20 ), $this->adjustBrightness( $vars[ 'browserBackground' ], 20 ));
      }



      /* ******************* */
      // BUTTONS
      /* ******************* */
      $vars[ 'btnType' ]                          = $this->custom_or_default('button_style', 'btnType');
      $vars[ 'btnBorderRadius' ]                  = $this->custom_or_default('button_border_radius', 'btnBorderRadius');
      $vars[ 'btnBorderRadiusSmall' ]             = $this->custom_or_default('button_border_radius', 'btnBorderRadiusSmall');
      $vars[ 'btnBorderRadiusLarge' ]             = $this->custom_or_default('button_border_radius', 'btnBorderRadiusLarge');
      $vars[ 'btnBorderRadiusHuge' ]              = $this->custom_or_default('button_border_radius', 'btnBorderRadiusHuge');

      // DEFAULT
      $vars[ 'btnBackground' ]                    = $this->custom_or_default('button_default_background_color', 'btnBackground');
      $vars[ 'btnBackgroundHighlight' ]           = $this->adjustBrightness( $vars[ 'btnBackground' ], -40 );
      $vars[ 'btnColor' ]                         = $this->custom_or_default('button_default_text_color', 'btnColor');
      $vars[ 'btnTextShadow' ]                    = ($vars[ 'btnType' ] == 'abs_flat') ? 'none' : $this->getContrastYIQ( $vars [ 'btnColor' ], '0px -1px 1px '.$this->adjustBrightness($vars[ 'btnBackgroundHighlight' ], -70), '0px 1px 1px '.$this->adjustBrightness($vars[ 'btnBackground' ], 10));
      // PRIMARY
      $vars[ 'btnPrimaryBackground' ]             = $this->custom_or_default('button_primary_background_color', 'btnPrimaryBackground');
      $vars[ 'btnPrimaryBackgroundHighlight' ]    = $this->adjustBrightness( $vars[ 'btnPrimaryBackground' ], -40 );
      $vars[ 'btnPrimaryColor' ]                  = $this->custom_or_default('button_primary_text_color', 'btnPrimaryColor');
      $vars[ 'btnPrimaryTextShadow' ]             = ($vars[ 'btnType' ] == 'abs_flat') ? 'none' : $this->getContrastYIQ( $vars[ 'btnPrimaryColor' ], '0px -1px 1px '.$this->adjustBrightness($vars[ 'btnPrimaryBackgroundHighlight' ], -70), '0px 1px 1px '.$this->adjustBrightness($vars[ 'btnPrimaryBackground' ], 10));
      // INFO
      $vars[ 'btnInfoBackground' ]                = $this->custom_or_default('button_info_background_color', 'btnInfoBackground');
      $vars[ 'btnInfoBackgroundHighlight' ]       = $this->adjustBrightness( $vars[ 'btnInfoBackground' ], -40 );
      $vars[ 'btnInfoColor' ]                     = $this->custom_or_default('button_info_text_color', 'btnInfoColor');
      $vars[ 'btnInfoTextShadow' ]                = ($vars[ 'btnType' ] == 'abs_flat') ? 'none' : $this->getContrastYIQ( $vars[ 'btnInfoColor' ], '0px -1px 1px '.$this->adjustBrightness($vars[ 'btnInfoBackgroundHighlight' ], -70), '0px 1px 1px '.$this->adjustBrightness($vars[ 'btnInfoBackground' ], 10));
      // WARNING
      $vars[ 'btnWarningBackground' ]             = $this->custom_or_default('button_warning_background_color', 'btnWarningBackground');
      $vars[ 'btnWarningBackgroundHighlight' ]    = $this->adjustBrightness( $vars[ 'btnWarningBackground' ], -40 );
      $vars[ 'btnWarningColor' ]                  = $this->custom_or_default('button_warning_text_color', 'btnWarningColor');
      $vars[ 'btnWarningTextShadow' ]             = ($vars[ 'btnType' ] == 'abs_flat') ? 'none' : $this->getContrastYIQ( $vars[ 'btnWarningColor' ], '0px -1px 1px '.$this->adjustBrightness($vars[ 'btnWarningBackgroundHighlight' ], -70), '0px 1px 1px '.$this->adjustBrightness($vars[ 'btnWarningBackground' ], 10));
      // DANGER
      $vars[ 'btnDangerBackground' ]              = $this->custom_or_default('button_danger_background_color', 'btnDangerBackground');
      $vars[ 'btnDangerBackgroundHighlight' ]     = $this->adjustBrightness( $vars[ 'btnDangerBackground' ], -40 );
      $vars[ 'btnDangerColor' ]                   = $this->custom_or_default('button_danger_text_color', 'btnDangerColor');
      $vars[ 'btnDangerTextShadow' ]              = ($vars[ 'btnType' ] == 'abs_flat') ? 'none' : $this->getContrastYIQ( $vars[ 'btnDangerColor' ], '0px -1px 1px '.$this->adjustBrightness($vars[ 'btnDangerBackgroundHighlight' ], -70), '0px 1px 1px '.$this->adjustBrightness($vars[ 'btnDangerBackground' ], 10));
      // INVERSE
      $vars[ 'btnInverseBackground' ]             = $this->custom_or_default('button_inverse_background_color', 'btnInverseBackground');
      $vars[ 'btnInverseBackgroundHighlight' ]    = $this->adjustBrightness( $vars[ 'btnInverseBackground' ], -40 );
      $vars[ 'btnInverseColor' ]                  = $this->custom_or_default('button_inverse_text_color', 'btnInverseColor');
      $vars[ 'btnInverseTextShadow' ]             = ($vars[ 'btnType' ] == 'abs_flat') ? 'none' : $this->getContrastYIQ( $vars[ 'btnInverseColor' ], '0px -1px 1px '.$this->adjustBrightness($vars[ 'btnInverseBackgroundHighlight' ], -70), '0px 1px 1px '.$this->adjustBrightness($vars[ 'btnInverseBackground' ], 10));


      /* ******************* */
      // HEADING SHADOWS
      /* ******************* */
      if( get_field('make_headers_flat', 'option') == true ){
        $vars[ 'headingsBorder' ]             = '1px solid '. $this->adjustBrightness( $vars[ 'bodyBackground' ], -30 );
        $vars[ 'headingsShadow' ]             = 'none';
        $vars[ 'standoutHeadingsBorder' ]     = '1px solid '. $this->adjustBrightness( $vars[ 'standoutBackground' ], -30 );
        $vars[ 'standoutHeadingsShadow' ]     = 'none';
        $vars[ 'leaderHeadingsBorder' ]       = '1px solid '. $this->adjustBrightness( $vars[ 'leaderBackground' ], -30 );
        $vars[ 'leaderHeadingsShadow' ]       = 'none';
      }else{
        $vars[ 'headingsBorder' ]             = '3px solid '. $this->adjustBrightness( $vars[ 'bodyBackground' ], -10 );
        $vars[ 'headingsShadow' ]             = '0px 1px 0px ' . $this->adjustBrightness( $vars[ 'bodyBackground' ], -40 ) . ', 0px 3px 0px 0px '. $this->adjustBrightness( $vars[ 'bodyBackground' ], 15 );
        $vars[ 'standoutHeadingsBorder' ]     = '3px solid '. $this->adjustBrightness( $vars[ 'standoutBackground' ], -10 );
        $vars[ 'standoutHeadingsShadow' ]     = '0px 1px 0px ' . $this->adjustBrightness( $vars[ 'standoutBackground' ], -40 ) . ', 0px 3px 0px 0px '. $this->adjustBrightness( $vars[ 'standoutBackground' ], 15 );
        $vars[ 'leaderHeadingsBorder' ]       = '3px solid '. $this->adjustBrightness( $vars[ 'leaderBackground' ], -10 );
        $vars[ 'leaderHeadingsShadow' ]       = '0px 1px 0px ' . $this->adjustBrightness( $vars[ 'leaderBackground' ], -40 ) . ', 0px 3px 0px 0px '. $this->adjustBrightness( $vars[ 'leaderBackground' ], 15 );
      }

      /* ******************* */
      // FOOTER
      /* ******************* */
      $vars[ 'preFooterBackground' ]          = $this->custom_or_default('pre_footer_background_solid_color', 'preFooterBackground');  // #76a3a0 // #92a298
      $vars[ 'footerBackground' ]             = $this->custom_or_default('deep_footer_background_color', 'footerBackground'); // #556270 // 6c7065
      if(get_field('pre_footer_background_solid_color', 'option')){
        $vars[ 'preFooterBackgroundImage' ]   = 'none';
      }

      if(get_field('borders_between_footers', 'option') == true){
        $vars[ 'preFooterBorder' ]            = '10px solid '.$this->adjustBrightness( $vars[ 'preFooterBackground' ], -20);
        $vars[ 'footerBorder' ]               = '2px solid '.$this->adjustBrightness( $vars[ 'footerBackground' ], -20);
      }else{
        $vars[ 'footerBorder' ]               = 'none';
        $vars[ 'preFooterBorder' ]            = 'none';
      }
    }
    return $vars;
  }

  public function FunctionName($value='')
  {
      # code...
  }

  // Convert RGBA color to 6 digit HEX
  public function my_rgba_to_hex($rgba_arr){
    return "#".substr(parent::lib_rgbahex($rgba_arr), -6);
  }

  // Mix 2 colors
  public function my_mix($color1, $color2, $percent){
    return $this->my_rgba_to_hex(parent::lib_mix(array("list", ",", array( array("raw_color", $color1),  array("raw_color", $color2), array("number", $percent, "%")))));
  }


  function adjustBrightness($hex, $steps) {
    $hex = str_replace('#','',$hex);
    // Steps should be between -255 and 255. Negative = darker, positive = lighter
    $steps = max(-255, min(255, $steps));

    // Format the hex color string
    $hex = str_replace('#', '', $hex);
    if (strlen($hex) == 3) {
        $hex = str_repeat(substr($hex,0,1), 2).str_repeat(substr($hex,1,1), 2).str_repeat(substr($hex,2,1), 2);
    }

    // Get decimal values
    $r = hexdec(substr($hex,0,2));
    $g = hexdec(substr($hex,2,2));
    $b = hexdec(substr($hex,4,2));

    // Adjust number of steps and keep it inside 0 to 255
    $r = max(0,min(255,$r + $steps));
    $g = max(0,min(255,$g + $steps));
    $b = max(0,min(255,$b + $steps));

    $r_hex = str_pad(dechex($r), 2, '0', STR_PAD_LEFT);
    $g_hex = str_pad(dechex($g), 2, '0', STR_PAD_LEFT);
    $b_hex = str_pad(dechex($b), 2, '0', STR_PAD_LEFT);
    return '#'.$r_hex.$g_hex.$b_hex;
  }

  function getContrastYIQ($hexcolor, $dark = 'black', $light = 'white'){
    $r = hexdec(substr($hexcolor,0,2));
    $g = hexdec(substr($hexcolor,2,2));
    $b = hexdec(substr($hexcolor,4,2));
    $yiq = (($r*299)+($g*587)+($b*114))/1000;
    return ($yiq >= 128) ? $dark : $light;
  }

  function custom_or_default($custom_key, $default_key, $default_value = '#aaa'){
    $option_value = get_field("{$custom_key}", 'option');
    if(!empty($option_value)){
      return $option_value;
    }else{
      if(isset($this->default_vars["{$default_key}"]))
        return $this->default_vars["{$default_key}"];
      else
        return $default_value;
    }
  }

  function custom_or_default_image_url($custom_key, $default_key, $default_value = '#aaa'){
    $option_value = get_field("{$custom_key}", 'option');
    if(!empty($option_value)){
      return $this->wrap_in_url($option_value);
    }else{
      if(isset($this->default_vars["{$default_key}"]))
        return $this->default_vars["{$default_key}"];
      else
        return $default_value;
    }
  }

  public function wrap_in_url($value='none')
  {
    if($value == 'none'){
      return 'none';
    }else{
      return 'url('.$value.')';
    }
  }

  function custom_merged_or_default($custom_key, $default_key, $merge_string, $default_value = "4px solid #fff"){
    $option_value = get_field("{$custom_key}", 'option');
    if(!empty($option_value)){
      return $merge_string.$option_value;
    }else{
      if(isset($this->default_vars["{$default_key}"]))
        return $this->default_vars["{$default_key}"];
      else
        return $default_value;
    }
  }

  function adjust_custom_or_use_default($custom_key, $default_key, $steps){
    $option_value = get_field("{$custom_key}", 'option');
    if(!empty($option_value)){
      return $this->adjustBrightness($option_value, $steps);
    }else{
      return $this->default_vars["{$default_key}"];
    }
  }

  function adjust_mix_custom_or_use_default($custom_key, $default_key, $steps, $mix_color, $mix_value){
    $option_value = get_field("{$custom_key}", 'option');
    if(!empty($option_value)){
      $adjusted_color = $this->adjustBrightness($option_value, $steps);
      $mixed_color = $this->my_mix($mix_color, $adjusted_color, $mix_value);
      return $mixed_color;
    }else{
      return $this->default_vars["{$default_key}"];
    }
  }

}


// Hook to the ACF and set a variable to recompile a less css if options have been saved
function my_acf_save_post( $post_id ) {
  // stop function if not "options" page
  if( $post_id != "options" ) {
    return;
  }
  // Set a flag to recompile LESS on the next front end request.
  update_option( 'prefix_force_recompile', 'yes' );
}
// run after ACF saves the $_POST['fields'] data
add_action('acf/save_post', 'my_acf_save_post', 20);

$my_less = new my_less;
// pass variables into all .less files
add_filter( 'less_vars', array($my_less, 'my_less_vars'), 10, 2 );

/*
DARK COLORS:
494f50
ebebeb
f7f7f7
bf9e60
*/
?>