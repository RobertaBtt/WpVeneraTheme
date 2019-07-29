<?php
// tell WooCommerce not to use woocommerce.css
define('WOOCOMMERCE_USE_CSS', false);





/**
// Change default product in loop wrapper
 */
// add_action('woocommerce_before_shop_loop_item', 'venera_woo_before_shop_loop_item', 1);
// add_action('woocommerce_after_shop_loop_item', 'venera_woo_after_shop_loop_item', 10);

// function venera_woo_before_shop_loop_item()
// {
//   echo '<div class="framed-post">';
// }

// function venera_woo_after_shop_loop_item()
// {
//   echo '</div>';
// }






/*

Change default placeholder image

*/

add_action( 'init', 'venera_woo_fix_thumbnail' );

function venera_woo_fix_thumbnail() {
  add_filter('woocommerce_placeholder_img_src', 'venera_woo_placeholder_img_src');

  function venera_woo_placeholder_img_src( $src ) {
  $src = get_template_directory_uri().'/images/placeholder-camera-green.png';

  return $src;
  }
}


/*

 Change default loop wrapper

*/
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

/* hook in venera own functions to display the wrappers */
add_action('woocommerce_before_main_content', 'venera_woo_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'venera_woo_wrapper_end', 10);

// Figure out the layout for the shop page - if it has an active sidebar - make room for sidebar
function venera_woo_wrapper_start() {
  if(is_active_sidebar('sidebar-shop')){
    echo '<div class="container"><div class="row-fluid"><div class="span9"><section id="main">';
  }else{
    echo '<div class="container"><section id="main">';
  }
}

function venera_woo_wrapper_end() {
  echo '</section></div>';
}

/*

Before Loop

*/
add_action( 'woocommerce_before_main_content', 'venera_woo_highlighted_header', 9 );

function venera_woo_highlighted_header() {
  get_template_part( 'woocommerce/partials/shop', 'highlighted-header' );
}


// Change the priority of the ordering select box so we can put the list/grid view buttons after it
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
add_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 31 );


/*

Before Loop wrap ordering

*/
add_action( 'woocommerce_before_shop_loop', 'venera_woo_before_ordering', 19 );
add_action( 'woocommerce_before_shop_loop', 'venera_woo_after_ordering', 31 );

function venera_woo_before_ordering(){
  echo '<div class="shop-loop-ordering-wrapper">';
}

function venera_woo_after_ordering(){
  echo '</div>';
}

/*

Wrap price and rating on a product loop

*/

remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );

add_action( 'woocommerce_after_shop_loop_item', 'venera_woo_template_start_product_meta', 9 );
add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_price', 11 );
add_action( 'woocommerce_after_shop_loop_item', 'venera_woo_template_end_product_meta', 12 );

function venera_woo_template_start_product_meta() {
  echo '<div class="product-meta">';
}

function venera_woo_template_end_product_meta() {
  echo '</div>';
}


/*

Breadcrumbs

*/
add_filter( 'woocommerce_breadcrumb_defaults', 'venera_woo_change_breadcrumb_delimiter' );
function venera_woo_change_breadcrumb_delimiter( $defaults ) {
  // Change the breadcrumb delimiter from '/' to '>'
  $defaults['delimiter'] = '';
  return $defaults;
}





/****************************
    CHECKOUT
****************************/

add_action( 'woocommerce_before_checkout_form', 'venera_woo_before_checkout_wrapper', 9 );
function venera_woo_before_checkout_wrapper() {
  echo '<div class="container">';
}

add_action( 'woocommerce_after_checkout_form', 'venera_woo_after_checkout_wrapper', 9 );
function venera_woo_after_checkout_wrapper() {
  echo '</div>';
}


/****************************
    CART
****************************/


add_action( 'woocommerce_before_cart', 'venera_woo_before_cart_wrapper' );
function venera_woo_before_cart_wrapper() {
  echo '<div class="container">';
}
add_action( 'woocommerce_before_cart', 'venera_woo_before_cart_header', 11 );
function venera_woo_before_cart_header() {
  echo '<h1 class="header-lined">'.__('Shopping Cart', 'venera').'</h1>';
}

add_action( 'woocommerce_after_cart', 'venera_woo_after_cart_wrapper' );
function venera_woo_after_cart_wrapper() {
  echo '</div>';
}



/****************************
    ACCOUNT
****************************/


/****************************
    REGISTER SHOP SIDEBAR
****************************/

function venera_woo_shop_sidebar_init() {
  register_sidebar( array(
      'name'          => __( 'Shop Sidebar', 'venera' ),
      'id'            => 'sidebar-shop',
      'description' => 'Sidebar for products index page for WooCommerce',
      'before_widget' => '<aside id="%1$s" class="widget %2$s">',
      'after_widget'  => '</aside>',
      'before_title'  => '<h3 class="widget-title">',
      'after_title'   => '</h3>',
  ) );
}
add_action( 'widgets_init', 'venera_woo_shop_sidebar_init' );



if(is_active_sidebar('sidebar-shop')){
  // Wrap shop sidebar only if it is active
  add_action( 'woocommerce_sidebar', 'venera_woo_before_sidebar', 9 );
  function venera_woo_before_sidebar(){
    echo '<div class="span3">';
  }
  add_action( 'woocommerce_sidebar', 'venera_woo_after_sidebar', 11 );
  function venera_woo_after_sidebar(){
    echo '</div></div></div>';
  }
}

/* PLUGINS */

/* GRID/LIST PLUGIN */