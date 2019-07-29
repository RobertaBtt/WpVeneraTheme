<?php


function osetin_init_my_map() {

  $btn_size_arr = array(__("Regular size", "js_composer") => "", __("Huge", "js_composer") => "btn-huge", __("Large", "js_composer") => "btn-large", __("Small", "js_composer") => "btn-small", __("Mini", "js_composer") => "btn-mini");
  $btn_colors_arr = array(__("Default", "js_composer") => "", __("Primary", "js_composer") => "btn-primary", __("Informational", "js_composer") => "btn-info", __("Success", "js_composer") => "btn-success", __("Warning", "js_composer") => "btn-warning", __("Danger", "js_composer") => "btn-danger", __("Inverse", "js_composer") => "btn-inverse");

  $add_css_animation = array(
    "type" => "dropdown",
    "heading" => __("CSS Animation", "js_composer"),
    "param_name" => "css_animation",
    "admin_label" => true,
    "value" => array(__("No", "js_composer") => '', __("Top to bottom", "js_composer") => "top-to-bottom", __("Bottom to top", "js_composer") => "bottom-to-top", __("Left to right", "js_composer") => "left-to-right", __("Right to left", "js_composer") => "right-to-left", __("Appear from center", "js_composer") => "appear"),
    "description" => __("Select animation type if you want this element to be animated when it enters into the browsers viewport. Note: Works only in modern browsers.", "js_composer")
  );


  if(function_exists('vc_map')){
    /* Gallery/Slideshow
    ---------------------------------------------------------- */
    vc_map( array(
      "name" => __("Framed Item", "js_composer"),
      "base" => "venera_framed_image",
      "icon" => "icon-wpb-images-stack",
      "category" => __('Content', 'js_composer'),
      "params" => array(
        array(
          "type" => "dropdown",
          "heading" => __("Content Type", "js_composer"),
          "param_name" => "content_type",
          "value" => array(__("Image(s)", "js_composer") => "image", __("Video", "js_composer") => "video"),
          "description" => __("Select content type.", "js_composer")
        ),
        array(
          "type" => "attach_images",
          "heading" => __("Images", "js_composer"),
          "param_name" => "images",
          "value" => "",
          "description" => __("Select images from media library.", "js_composer"),
          "dependency" => Array('element' => "content_type", 'value' => array('image'))
        ),
        array(
          "type" => "textfield",
          "heading" => __("Custom Link (e.g. http://example.com)", "js_composer"),
          "param_name" => "custom_link",
          "description" => __("Custom link to open on image click", "js_composer"),
          "dependency" => Array('element' => "content_type", 'value' => array('image'))
        ),
        array(
          "type" => "textfield",
          "heading" => __("Image size", "js_composer"),
          "param_name" => "img_size",
          "description" => __("Enter image size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use 'thumbnail' size.", "js_composer"),
          "dependency" => Array('element' => "content_type", 'value' => array('image'))
        ),
        array(
          "type" => "textfield",
          "heading" => __("Video link", "js_composer"),
          "param_name" => "video_link",
          "admin_label" => true,
          "description" => sprintf(__('Link to the video. More about supported formats at %s.', "js_composer"), '<a href="http://codex.wordpress.org/Embeds#Okay.2C_So_What_Sites_Can_I_Embed_From.3F" target="_blank">WordPress codex page</a>'),
          "dependency" => Array('element' => "content_type", 'value' => array('video'))
        ),
        array(
          "type" => "dropdown",
          "heading" => __("Frame type", "js_composer"),
          "param_name" => "frame_type",
          "value" => array(__("No Frame", 'js_composer') => 'none', __("Browser", "js_composer") => 'browser', __("Phone", "js_composer") => 'phone', __("Picture Frame", "js_composer") => 'picture', __("Plain", "js_composer") => 'plain'),
          "description" => __("Select a browser frame type you want to show depending on your images.", "js_composer")
        ),
        array(
          "type" => "textfield",
          "heading" => __("Browser URL", "js_composer"),
          "param_name" => "browser_url",
          "description" => __("Text to appear in a browser address bar", "js_composer"),
          "dependency" => Array('element' => "frame_type", 'value' => array('browser'))
        ),
        array(
          "type" => "textfield",
          "heading" => __("Faded Text", "js_composer"),
          "param_name" => "faded_text",
          "description" => __("Fade image with some text.", "js_composer"),
          "dependency" => Array('element' => "content_type", 'value' => array('image'))
        ),
        array(
          "type" => "dropdown",
          "heading" => __("Slider Type", "js_composer"),
          "param_name" => "slider_engine",
          "value" => array(__("Flexslider", "js_composer") => 'flexslider', __("Bootstrap", "js_composer") => 'bootstrap'),
          "description" => __("Select a browser frame type you want to show depending on your images.", "js_composer")
        ),
        array(
          "type" => "checkbox",
          "heading" => __("Hide Buttons", "js_composer"),
          "param_name" => "hide_buttons",
          "value" => Array(__("Yes", "js_composer") => 'yes'),
          "description" => __("Do you want to hide browser buttons (prev, next, refresh).", "js_composer"),
          "dependency" => Array('element' => "frame_type", 'value' => array('browser'))
        ),
        array(
          "type" => "checkbox",
          "heading" => __("Show lightbox on click", "js_composer"),
          "param_name" => "lightbox_on_click",
          "value" => Array(__("No", "js_composer") => 'no'),
          "description" => __("Do you want to show lightbox of the image on click, check to use a custom link instead.", "js_composer"),
          "dependency" => Array('element' => "content_type", 'value' => array('image'))
        ),
        $add_css_animation
      )
    ) );

    /* Clients
    ---------------------------------------------------------- */
    vc_map( array(
      "name" => __("Clients", "js_composer"),
      "base" => "clients",
      "icon" => "icon-wpb-images-stack",
      "category" => __('Content', 'js_composer'),
      "params" => array(
        array(
          "type" => "attach_images",
          "heading" => __("Images", "js_composer"),
          "param_name" => "images",
          "value" => "",
          "description" => __("Select images from media library.", "js_composer")
        ),
        array(
          "type" => "textfield",
          "heading" => __("Image size", "js_composer"),
          "param_name" => "img_size",
          "description" => __("Enter image size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use 'thumbnail' size.", "js_composer")
        ),
        array(
          "type" => "textfield",
          "heading" => __("Title", "js_composer"),
          "param_name" => "title",
          "value" => "Our Clients",
          "description" => __("Text to appear as a section title", "js_composer")
        ),
        array(
          "type" => "dropdown",
          "heading" => __("Items per row", "js_composer"),
          "param_name" => "columns_per_row",
          "value" => array(__("One", "js_composer") => 1, __("Two", "js_composer") => 2, __("Three", "js_composer") => 3, __("Four", "js_composer") => 4, __("Six", "js_composer") => 6),
          "description" => __("Select number of items to show per row.", "js_composer")
        ),
        $add_css_animation
      )
    ) );
    /* Team Members */

    vc_map( array(
      "name" => __("Team Members", "js_composer"),
      "base" => "team_members",
      "icon" => "icon-wpb-images-stack",
      "params" => array(
        array(
          "type" => "textfield",
          "heading" => __("Limit", "js_composer"),
          "param_name" => "members_limit",
          "value" => 3,
          "description" => __("Total number of team members to show", "js_composer")
        ),
        array(
          "type" => "textfield",
          "heading" => __("Title", "js_composer"),
          "param_name" => "title",
          "value" => "Team Members",
          "description" => __("Text to appear as a section title", "js_composer")
        ),
        array(
          "type" => "dropdown",
          "heading" => __("Items per row", "js_composer"),
          "param_name" => "columns_per_row",
          "value" => array(__("One", "js_composer") => 1, __("Two", "js_composer") => 2, __("Three", "js_composer") => 3, __("Four", "js_composer") => 4, __("Six", "js_composer") => 6),
          "description" => __("Select number of items to show per row.", "js_composer")
        ),
        array(
          "type" => "checkbox",
          "heading" => __("Show icons?", "js_composer"),
          "param_name" => "show_social_icons",
          "value" => Array(__("Yes", "js_composer") => 'yes'),
          "description" => __("Do you want to show icons or just text labels for social items.", "js_composer")
        ),
        $add_css_animation
      )
    ) );


    /* Pricing Table */

    vc_map( array(
      "name" => __("Pricing Table", "js_composer"),
      "base" => "pricing_table",
      "icon" => "icon-wpb-images-stack",
      "params" => array(
        array(
          "type" => "textfield",
          "heading" => __("Title", "js_composer"),
          "param_name" => "title",
          "value" => "",
          "description" => __("Text to appear as a section title", "js_composer")
        ),
        array(
          "type" => "dropdown",
          "heading" => __("Currency symbol position", "js_composer"),
          "param_name" => "currency_position",
          "value" => array(__("Before", "js_composer") => 'before', __("After", "js_composer") => 'after', __("None", "js_composer") => 'none'),
          "description" => __("Select where to show a currency symbol", "js_composer")
        )
      )
    ) );



    /* Recents Posts */

    vc_map( array(
      "name" => __("Recent Posts", "js_composer"),
      "base" => "recent_posts",
      "icon" => "icon-wpb-images-stack",
      "params" => array(
        array(
          "type" => "textfield",
          "heading" => __("Limit", "js_composer"),
          "param_name" => "limit",
          "value" => 4,
          "description" => __("Total number of posts to show", "js_composer")
        ),
        array(
          "type" => "textfield",
          "heading" => __("Title", "js_composer"),
          "param_name" => "title",
          "value" => "Recent Posts",
          "description" => __("Text to appear as a section title", "js_composer")
        ),
        array(
          "type" => "dropdown",
          "heading" => __("Posts per row", "js_composer"),
          "param_name" => "columns_per_row",
          "value" => array(__("One", "js_composer") => 1, __("Two", "js_composer") => 2, __("Three", "js_composer") => 3, __("Four", "js_composer") => 4, __("Six", "js_composer") => 6),
          "description" => __("Select number of items to show per row.", "js_composer")
        ),
        $add_css_animation
      )
    ) );

    /* Iconed feature */

    vc_map( array(
      "name" => __("Iconed Feature", "js_composer"),
      "base" => "iconed_feature",
      "icon" => "icon-wpb-images-stack",
      "params" => array(
        array(
          "type" => "textfield",
          "heading" => __("Icon Type", "js_composer"),
          "param_name" => "icon_class",
          "value" => '',
          "description" => __("Class of the icon", "js_composer")
        ),
        array(
          "type" => "textfield",
          "heading" => __("Title", "js_composer"),
          "param_name" => "title",
          "value" => "",
          "description" => __("Text to appear as a feature title", "js_composer")
        ),
        array(
          "type" => "textfield",
          "heading" => __("Text", "js_composer"),
          "param_name" => "text",
          "value" => "",
          "description" => __("Text to appear for the feature", "js_composer")
        ),
        array(
          "type" => "textfield",
          "heading" => __("Link", "js_composer"),
          "param_name" => "link",
          "value" => "",
          "description" => __("You can make this block a clickable link, or leave blank and the block will be a text", "js_composer")
        )
      )
    ) );


    /* Testimonials */

    vc_map( array(
      "name" => __("Testimonials", "js_composer"),
      "base" => "testimonials",
      "icon" => "icon-wpb-images-stack",
      "params" => array(
        array(
          "type" => "textfield",
          "heading" => __("Limit", "js_composer"),
          "param_name" => "limit",
          "value" => 6,
          "description" => __("Total number of testimonials to show", "js_composer")
        ),
        array(
          "type" => "textfield",
          "heading" => __("Title", "js_composer"),
          "param_name" => "title",
          "value" => "Testimonials",
          "description" => __("Text to appear as a section title", "js_composer")
        ),
        array(
          "type" => "dropdown",
          "heading" => __("Items per row", "js_composer"),
          "param_name" => "columns_per_row",
          "value" => array(__("One", "js_composer") => 1, __("Two", "js_composer") => 2, __("Three", "js_composer") => 3, __("Four", "js_composer") => 4, __("Six", "js_composer") => 6),
          "description" => __("Select number of testimonials to show per row.", "js_composer")
        ),
        array(
          "type" => "dropdown",
          "heading" => __("Visual Style", "js_composer"),
          "param_name" => "style",
          "value" => array(__("Toggle on click", "js_composer") => 'clicktoshow', __("Opened", "js_composer") => 'opened'),
          "description" => __("Choose how do you want to output testimonials", "js_composer")
        ),
        $add_css_animation
      )
    ) );

    /* SLIDER */

    vc_map( array(
      "name" => __("Content Slider", "js_composer"),
      "base" => "venera_slider",
      "icon" => "icon-wpb-images-stack",
      "params" => array(
        array(
          "type" => "textfield",
          "heading" => __("Slide IDs (optional)", "js_composer"),
          "param_name" => "slide_ids",
          "value" => false,
          "description" => __("Fill this field with slide IDs separated by commas (,), to retrieve only them.", "js_composer")
        ),
        array(
          "type" => "textfield",
          "heading" => __("Delay", "js_composer"),
          "param_name" => "delay",
          "value" => 3000,
          "description" => __("Delay between autoslide, set to 0 to disable autoslide.", "js_composer")
        )
      )
    ) );


    /* Portfolio */
    vc_map( array(
      "name" => __("Portfolio Block", "js_composer"),
      "base" => "portfolio_block",
      "icon" => "icon-wpb-images-stack",
      "params" => array(
        array(
          "type" => "textfield",
          "heading" => __("Title", "js_composer"),
          "param_name" => "title",
          "value" => "",
          "description" => __("Text to appear as a section title", "js_composer")
        ),
        array(
          "type" => "textfield",
          "heading" => __("Icon Class", "js_composer"),
          "param_name" => "icon_class",
          "value" => "",
          "description" => __("Icon to use with a title", "js_composer")
        ),
        array(
          "type" => "dropdown",
          "heading" => __("Items per row", "js_composer"),
          "param_name" => "columns_per_row",
          "value" => array(__("One", "js_composer") => 1, __("Two", "js_composer") => 2, __("Three", "js_composer") => 3, __("Four", "js_composer") => 4, __("Six", "js_composer") => 6),
          "description" => __("Select number of items to show per row.", "js_composer")
        ),
        array(
          "type" => "textfield",
          "heading" => __("Limit", "js_composer"),
          "param_name" => "limit",
          "value" => "",
          "description" => __("Total number of portfolio items to show (leave blank to have no limit)", "js_composer")
        ),
        array(
          "type" => "dropdown",
          "heading" => __("Grid layout", "js_composer"),
          "param_name" => "grid_template",
          "value" => array(__("Grid", "js_composer") => "grid", __("Grid with filter", "js_composer") => "filtered_grid"),
          "description" => __("Teaser layout template.", "js_composer")
        ),
        array(
          "type" => "dropdown",
          "heading" => __("Layout mode", "js_composer"),
          "param_name" => "grid_layout_mode",
          "value" => array(__("Fit rows", "js_composer") => "fitRows", __('Masonry', "js_composer") => 'masonry'),
          "dependency" => Array('element' => 'grid_template', 'value' => array('filtered_grid', 'grid')),
          "description" => __("Teaser layout template.", "js_composer")
        ),
        array(
          "type" => "checkbox",
          "heading" => __("Show item title?", "js_composer"),
          "param_name" => "show_title",
          "value" => Array(__("Yes", "js_composer") => 'yes')
        ),
        array(
          "type" => "checkbox",
          "heading" => __("Show item category?", "js_composer"),
          "param_name" => "show_category",
          "value" => Array(__("Yes", "js_composer") => 'yes')
        ),
        array(
          "type" => "checkbox",
          "heading" => __("Show item excerpt?", "js_composer"),
          "param_name" => "show_excerpt",
          "value" => Array(__("Yes", "js_composer") => 'yes')
        ),
        array(
          "type" => "checkbox",
          "heading" => __("Show details link?", "js_composer"),
          "param_name" => "show_link",
          "value" => Array(__("Yes", "js_composer") => 'yes')
        ),
        array(
          "type" => "checkbox",
          "heading" => __("Show lightbox link?", "js_composer"),
          "param_name" => "show_lightbox",
          "value" => Array(__("Yes", "js_composer") => 'yes')
        ),
        array(
          "type" => "dropdown",
          "heading" => __("Which fields to show only on hover", "js_composer"),
          "param_name" => "show_on_hover",
          "value" => array(__("Everything", "js_composer") => "everything",
                          __("Buttons", "js_composer") => "buttons",
                          __("Excerpt and buttons", "js_composer") => "excerpt_and_buttons"),
          "description" => __("Which fields should be visible only on hover.", "js_composer")
        ),
        array(
          "type" => "dropdown",
          "heading" => __("Flipping Effect", "js_composer"),
          "param_name" => "flipping_effect",
          "value" => array(__("None", "js_composer") => "flipping_none",
                          __("Style 1", "js_composer") => "flipping_style_1",
                          __("Style 2", "js_composer") => "flipping_style_2",
                          __("Style 3", "js_composer") => "flipping_style_3"),
          "description" => __("Choose a flipping effect for hover on meta info, or select None to always show meta info.", "js_composer")
        ),
        array(
          "type" => "dropdown",
          "heading" => __("Text Align", "js_composer"),
          "param_name" => "text_align",
          "value" => array(__('Auto', "js_composer") => "auto", __('Align left', "js_composer") => "left", __('Align center', "js_composer") => "center", __('Align right', "js_composer") => "right"),
          "description" => __("Align text of the section.", "js_composer")
        ),
        array(
          "type" => "dropdown",
          "heading" => __("Size of buttons", "js_composer"),
          "param_name" => "button_size",
          "value" => $btn_size_arr
        ),
        array(
          "type" => "dropdown",
          "heading" => __("Details button color", "js_composer"),
          "param_name" => "details_btn_color",
          "value" => $btn_colors_arr
        ),
        array(
          "type" => "dropdown",
          "heading" => __("Lightbox button color", "js_composer"),
          "param_name" => "lightbox_btn_color",
          "value" => $btn_colors_arr
        ),
        $add_css_animation
      )
    ) );

  }
}
add_action( 'vc_before_init', 'osetin_init_my_map' );