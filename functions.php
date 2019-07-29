<?php
/**
 * venera functions and definitions
 *
 * @package venera-by-osetin
 */
/**
* Define constants used throughout the theme
*/
if (!defined('VENERA_TOTAL_COLUMNS')) define('VENERA_TOTAL_COLUMNS', 12);
if (!defined('VENERA_THEME_VERSION')) define('VENERA_THEME_VERSION', '1.3');

if (!headers_sent()) {
  if(session_id() == '') session_start();
}
// Translation
load_theme_textdomain( 'venera', get_template_directory().'/languages' );

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */


// -------------------------------------
// Load AdvancedCustomFields plugin (http://www.advancedcustomfields.com/)
// -------------------------------------

/*
Load data for advanced custom fields,
Registered field groups will not appear in the list of editable field groups. This is useful for including fields in themes.
Please note that if you export and register field groups within the same WP, you will see duplicate fields on your edit screens.
To fix this, please move the original field group to the trash or remove the code from your functions.php file.
*/
include_once( get_template_directory() . '/inc/load-data.php');  # Comment this line if you want to allow users to modify data of custom fields

// --------------------------------
// END ACF ADDONS
// --------------------------------


// Load Jetpack compatibility file.
require( get_template_directory() . '/inc/jetpack.php' );
// Load custom functions to work with DB
require( get_template_directory() . '/inc/db_queries.php' );
// Load shortcodes
require( get_template_directory() . '/inc/shortcodes.php' );
// Load custom post types
require( get_template_directory() . '/inc/custom_post_types.php' );
// Load various helper functions
require( get_template_directory() . '/inc/helper.php' );
// Register Custom Navigation Walker
require_once( get_template_directory() . '/inc/twitter_bootstrap_nav_walker.php' );
// Register Custom Widgets
require_once( get_template_directory() . '/inc/custom_widgets.php' );
// Register Custom Sidebars
require_once( get_template_directory() . '/inc/custom_sidebars.php' );


// --------------------------------
// WOOCOMMERCE
// --------------------------------

// Enable support for WooCommerce plugin
add_theme_support( 'woocommerce' );
// Woocommerce integration file, require only if woocommerce is active
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
  require_once( get_template_directory() . '/inc/woocommerce_integration.php' );
}

/*
*  Change the Options Page menu to 'Theme Options'
*/

if( function_exists('acf_set_options_page_title') )
{
    acf_set_options_page_title( __('Theme Options', 'venera') );
}

/* Create admin options pages */
if( function_exists( "acf_add_options_sub_page" ) )
{
    acf_add_options_sub_page( __('Appearance', 'venera') );
    acf_add_options_sub_page( __('UI Elements', 'venera') );
    acf_add_options_sub_page( __('Frames', 'venera') );
    acf_add_options_sub_page( __('Blog Posts', 'venera') );
    acf_add_options_sub_page( __('Header', 'venera') );
    acf_add_options_sub_page( __('Footer', 'venera') );
    acf_add_options_sub_page( __('Other', 'venera') );
 }

/* Include less css processing helper functions */
require_once( get_template_directory() . '/inc/wp-less.php');
require_once( get_template_directory() . '/inc/less_variables.php');

include_once( get_template_directory() . '/inc/activate-plugins.php' );


/**
 * INIT THE VISUAL COMPOSER INTEGRATED PLUGIN
 */

/*
if (!class_exists('WPBakeryVisualComposerAbstract')) {
  $dir = dirname(__FILE__) . '/inc/';
  $composer_settings = Array(
      'APP_ROOT'      => $dir . '/js_composer',
      'WP_ROOT'       => dirname( dirname( dirname( dirname($dir ) ) ) ). '/',
      'APP_DIR'       => basename( $dir ) . '/js_composer/',
      'CONFIG'        => $dir . '/js_composer/config/',
      'ASSETS_DIR'    => 'assets/',
      'COMPOSER'      => $dir . '/js_composer/composer/',
      'COMPOSER_LIB'  => $dir . '/js_composer/composer/lib/',
      'SHORTCODES_LIB'  => $dir . '/js_composer/composer/lib/shortcodes/',
      'USER_DIR_NAME'  => '/inc/js_composer_extend/templates',

      //for which content types Visual Composer should be enabled by default
      'default_post_types' => Array('page', 'venera_slide')
  );
  require_once locate_template('/inc/js_composer/js_composer.php');
  $wpVC_setup->init($composer_settings);
}
*/

if ( function_exists( 'vc_map' ) && function_exists( 'vc_add_param' ) ){
  $dir = get_template_directory() . '/inc/js_composer_extend/templates';
  vc_set_shortcodes_templates_dir( $dir );
  // Load my shortcodes for visual composer
  require( get_template_directory() . '/inc/js_composer_extend/my_map.php' );
  // Extend visual composer
  require_once( get_template_directory() . '/inc/js_composer_extend/extend.php' );
}


if ( ! function_exists( 'venera_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function venera_setup() {

	/**
	 * Custom template tags for this theme.
	 */
	require( get_template_directory() . '/inc/template-tags.php' );

	/**
	 * Custom functions that act independently of the theme templates
	 */
	require( get_template_directory() . '/inc/extras.php' );

	/**
	 * Customizer additions
	 */
	require( get_template_directory() . '/inc/customizer.php' );

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on venera, use a find and replace
	 * to change 'venera' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'venera', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails
	 */
        
        if ( function_exists( 'add_theme_support' ) ) {
            add_theme_support( 'post-thumbnails' );
            set_post_thumbnail_size( 350, 300, true ); // default Featured Image dimensions (cropped)

            // additional image sizes
            // delete the next line if you do not need additional image sizes
            add_image_size( 'category-thumb', 300, 350 ); // 300 pixels wide (and unlimited height)
         }
 
	//add_theme_support( 'post-thumbnails' );
        
        //add_image_size(350, 300);

	/**
	 * This theme uses wp_nav_menu() in two location.
	 */
	register_nav_menus( array(
		'header-menu' => __( 'Header Menu', 'venera' ),
		'footer-menu' => __( 'Footer Menu', 'venera' ),
	) );

	/**
	 * Enable support for Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );
}
endif; // venera_setup
add_action( 'after_setup_theme', 'venera_setup' );








// LOGIC TO RECOMPILE STYLESHEETS IF THE OPTION VARIABLE IS SET TO TRUE
function prefix_check_acf_save_flag() {
  if ( 'yes' == get_option( 'prefix_force_recompile' ) ) {
    // Force the LESS style sheets to be recompiled.
    add_filter( 'less_force_compile', '__return_true' );

    // Reset the flag so the style sheets won't be recompiled on every request.
    delete_option( 'prefix_force_recompile' );
  }
}


// REMOVE PAGES FROM SEARCH RESULTS
function remove_pages_from_search() {
  global $wp_post_types;
  $wp_post_types['page']->exclude_from_search = true;
}
add_action('init', 'remove_pages_from_search');


// GENERATE CSS CLASS FOR ANIMATION
function getCSSAnimation($css_animation) {
  $output = '';
  if ( $css_animation != '' ) {
    wp_enqueue_script( 'waypoints' );
    $output = ' wpb_animate_when_almost_visible wpb_'.$css_animation;
  }
  return $output;
}

/**
 * Enqueue scripts and styles
 */
function venera_scripts() {
  prefix_check_acf_save_flag();
  // wp_enqueue_style( 'venera-style', get_stylesheet_uri() );
  //wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css', array(), VENERA_THEME_VERSION );
  wp_enqueue_style( 'style', get_template_directory_uri() . '/css/theme_venera.css', array(), VENERA_THEME_VERSION );


  $color = my_less::get_current_color();
  switch($color){
//    case 'color1':
//      wp_enqueue_style( 'color-scheme-one', get_template_directory_uri() . '/less/colors/color1.less', array(), VENERA_THEME_VERSION );
//    break;
//    case 'color2':
//      wp_enqueue_style( 'color-scheme-two', get_template_directory_uri() . '/less/colors/color2.less', array(), VENERA_THEME_VERSION );
//    break;
//    case 'color3':
//      wp_enqueue_style( 'color-scheme-three', get_template_directory_uri() . '/less/colors/color3.less', array(), VENERA_THEME_VERSION );
//    break;
//    case 'color4':
//      wp_enqueue_style( 'color-scheme-four', get_template_directory_uri() . '/less/colors/color4.less', array(), VENERA_THEME_VERSION );
//    break;
//    case 'color5':
//      wp_enqueue_style( 'color-scheme-five', get_template_directory_uri() . '/less/colors/color5.less', array(), VENERA_THEME_VERSION );
//    break;
//    default:
//      wp_enqueue_style( 'color-scheme-one', get_template_directory_uri() . '/less/colors/color1.less', array(), VENERA_THEME_VERSION );
//    break;
  }

  //wp_enqueue_style( 'venera-font-awesome', get_template_directory_uri() . '/less/font-awesome/font-awesome.less', array(), VENERA_THEME_VERSION );
  
  // wp_enqueue_style( 'venera-flexslider', get_template_directory_uri() . '/vendor/flexslider/flexslider.css' );



  if(get_field('web_fonts_href', 'option') != ''){
    $fonts_string = get_field('web_fonts_href', 'option');
  }else{
    $fonts_string = "http://fonts.googleapis.com/css?family=Oswald:400,700,300|Roboto+Condensed:300,400,700";
  }
  # Load google fonts
  wp_enqueue_style( 'venera-fonts-google', $fonts_string, false );

  // wp_enqueue_script( 'venera-navigation', get_template_directory_uri() . '/js/navigation.js', array(), VENERA_THEME_VERSION, true );
  // wp_enqueue_script( 'venera-isotope', get_template_directory_uri() . '/js/jquery.isotope.min.js', array(), VENERA_THEME_VERSION, true );
  // wp_enqueue_script( 'venera-flexslider', get_template_directory_uri() . '/vendor/flexslider/jquery.flexslider-min.js', array(), VENERA_THEME_VERSION, true );

  wp_enqueue_style( 'isotope-css' );
  wp_enqueue_script( 'isotope' );
  wp_enqueue_style( 'flexslider' );
  wp_enqueue_script( 'flexslider' );
  wp_enqueue_script( 'prettyphoto' );
  wp_enqueue_style( 'prettyphoto' );
  wp_enqueue_style( 'js_composer_front' );
  wp_enqueue_script( 'wpb_composer_front_js' );
  wp_enqueue_style('js_composer_custom_css');


  wp_enqueue_script( 'venera-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), VENERA_THEME_VERSION, true );

  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
      wp_enqueue_script( 'comment-reply' );
  }

  if ( is_singular() && wp_attachment_is_image() ) {
      wp_enqueue_script( 'venera-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array(), VENERA_THEME_VERSION );
  }

  //wp_register_script('lightbox',get_template_directory_uri().'/js/lightbox.js',array(),NULL,true);
  //wp_enqueue_script('venera-lightbox',get_template_directory_uri() . '/js/lightbox.js', array(), VENERA_THEME_VERSION, true );
  wp_enqueue_script( 'venera-imagesloaded', get_template_directory_uri() . '/js/imagesloaded.pkgd.min.js', array(), VENERA_THEME_VERSION, true );
  wp_enqueue_script( 'venera-smartresize', get_template_directory_uri() . '/js/smartresize.js', array(), VENERA_THEME_VERSION, true );
  wp_enqueue_script( 'venera-bootstrap-transition', get_template_directory_uri() . '/js/bootstrap/bootstrap-transition.js', array(), VENERA_THEME_VERSION, true );
  wp_enqueue_script( 'venera-bootstrap-dropdown', get_template_directory_uri() . '/js/bootstrap/bootstrap-dropdown.js', array(), VENERA_THEME_VERSION, true );
  wp_enqueue_script( 'venera-bootstrap-carousel', get_template_directory_uri() . '/js/bootstrap/bootstrap-carousel.js', array(), VENERA_THEME_VERSION, true );
  wp_enqueue_script( 'venera-bootstrap-collapse', get_template_directory_uri() . '/js/bootstrap/bootstrap-collapse.js', array(), VENERA_THEME_VERSION, true );
  wp_enqueue_script( 'venera-bootstrap-button', get_template_directory_uri() . '/js/bootstrap/bootstrap-button.js', array(), VENERA_THEME_VERSION, true );
  wp_enqueue_script( 'venera-main', get_template_directory_uri() . '/js/main.js', array(), VENERA_THEME_VERSION, true );

}
add_action( 'wp_enqueue_scripts', 'venera_scripts' );


// VENERA ADMIN SCRIPTS
function venera_admin_scripts() {
  wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/less/font-awesome/font-awesome.less', array(), VENERA_THEME_VERSION );
  wp_enqueue_style( 'venera-admin-styles', get_template_directory_uri() . '/less/admin_styles.less', array(), VENERA_THEME_VERSION );
}
add_action( 'admin_enqueue_scripts', 'venera_admin_scripts' );

/**
 * Filter the except length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function wpdocs_custom_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 20 );