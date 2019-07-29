<?php
// Extending or changing default js composer functionality

if(function_exists('vc_add_param')){

add_filter('wpb_widget_title', 'override_widget_title', 10, 2);
function override_widget_title($output = '', $params = array('')) {
  $extraclass = (isset($params['extraclass'])) ? " ".$params['extraclass'] : "";
  return '<h3 class="header-lined'.$extraclass.'">'.$params['title'].'</h3>';
}


// --------------------
// ROW EXTEND
// --------------------

vc_add_param('vc_row',
  array(
    "type" => "textfield",
    "heading" => __("Header for the section", "js_composer"),
    "param_name" => "section_header",
    "description" => __("Optional Header for the section", "js_composer")
  )
);
vc_add_param('vc_row',
  array(
    "type" => "checkbox",
    "heading" => __("Make it stand-out section?", "js_composer"),
    "param_name" => "is_standout",
    "value" => Array(__("Yes", "js_composer") => 'yes'),
    "description" => __("Do you want this section to stand-out and be different color than body?", "js_composer")
  )
);
vc_add_param('vc_row',
  array(
    "type" => "colorpicker",
    "heading" => __("Background custom color", "js_composer"),
    "param_name" => "custom_bg",
    "description" => __("Select custom background color for this section, or leave blank to be default as specified in theme settings.", "js_composer"),
    "dependency" => Array('element' => "is_standout", 'value' => array('yes'))
  )
);
vc_add_param('vc_row',
  array(
    "type" => "colorpicker",
    "heading" => __("Text custom color", "js_composer"),
    "param_name" => "custom_color",
    "description" => __("Select custom text color for this section, or leave blank to be default as specified in theme settings.", "js_composer"),
    "dependency" => Array('element' => "is_standout", 'value' => array('yes'))
  )
);
vc_add_param('vc_row',
  array(
    "type" => "checkbox",
    "heading" => __("Do you want contents of the row to be full width?", "js_composer"),
    "param_name" => "is_full_width",
    "value" => Array(__("Yes", "js_composer") => 'yes'),
    "description" => __("If you want this row to occupy full width of the browser screen - check it.", "js_composer")
  )
);
vc_add_param('vc_row',
  array(
    "type" => "textfield",
    "heading" => __("CSS Class for a wrapper div (leave blank to not wrap with in a div)", "js_composer"),
    "param_name" => "prepend_with",
    "description" => __("If you wish to wrap this row in another div with custom class - input that class here.", "js_composer")
  )
);



// --------------------
// COLUMN EXTEND
// --------------------

vc_add_param('vc_column',
  array(
    "type" => "dropdown",
    "heading" => __("Text Align", "js_composer"),
    "param_name" => "text_align",
    "value" => array(__('Auto', "js_composer") => "auto", __('Align left', "js_composer") => "left", __('Align center', "js_composer") => "center", __('Align right', "js_composer") => "right"),
    "description" => __("Align text of the section.", "js_composer")
  )
);


}