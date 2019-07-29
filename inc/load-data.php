<?php

define( 'ACF_LITE' , true );  # Uncomment this line to Prevent users from editing or creating fields by enabling ‘lite mode’ to hide the UI interface
include_once( get_template_directory() . '/inc/acf/main/acf.php' );

// Load AdvancedCustomFields add-on gallery field (http://www.advancedcustomfields.com/add-ons/gallery-field/)
add_action('acf/register_fields', 'my_register_acf_fields');
function my_register_acf_fields()
{
  include_once( get_template_directory() . '/inc/acf/addons/acf-gallery/gallery.php');
}

// Load AdvancedCustomFields add-on options page (http://www.advancedcustomfields.com/add-ons/options-page/)
include_once( get_template_directory() . '/inc/acf/addons/acf-options-page/acf-options-page.php');

include_once( get_template_directory() . '/inc/acf/data.php');  # Comment this line if you want to allow users to modify data of custom fields


// !!! DEVELOPERS: UNCOMMENTING THE FOLLOWING LINE WILL FORSE RECOMPILE LESS STYLESHEETS
// add_filter( 'less_force_compile', '__return_true' );