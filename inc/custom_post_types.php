<?php
/**
 * PRICING PACKAGES CUSTOM POST
 */

add_action( 'init', 'venera_register_cpt_pricing_package' );
function venera_register_cpt_pricing_package() {

    $labels = array(
        'name' => __( 'Pricing Packages', 'venera' ),
        'singular_name' => __( 'Pricing Package', 'venera' ),
        'add_new' => __( 'Add New', 'venera' ),
        'add_new_item' => __( 'Add New Pricing Package', 'venera' ),
        'edit_item' => __( 'Edit Pricing Package', 'venera' ),
        'new_item' => __( 'New Pricing Package', 'venera' ),
        'view_item' => __( 'View Pricing Package', 'venera' ),
        'search_items' => __( 'Search Pricing Packages', 'venera' ),
        'not_found' => __( 'No Pricing Packages found', 'venera' ),
        'not_found_in_trash' => __( 'No Pricing Packages found in Trash', 'venera' ),
        'parent_item_colon' => __( 'Parent Pricing Package:', 'venera' ),
        'menu_name' => __( 'Pricing Packages', 'venera' ),
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => false,
        'description' => __( 'Pricing Packages', 'venera' ),
        'supports' => array( 'title', 'editor' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => true,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'menu_icon' => get_template_directory_uri() . '/images/icon-money-coin.png',
        'exclude_from_search' => true,
    );

    register_post_type( 'venera_pricing', $args );
}


/**
 * TESTIMONIALS CUSTOM POST TYPE
 */

add_action( 'init', 'venera_register_cpt_testimonials' );
function venera_register_cpt_testimonials() {

    $labels = array(
        'name' => __( 'Testimonials', 'venera' ),
        'singular_name' => __( 'Testimonials', 'venera' ),
        'add_new' => __( 'Add New', 'venera' ),
        'add_new_item' => __( 'Add New Testimonial', 'venera' ),
        'edit_item' => __( 'Edit Testimonial', 'venera' ),
        'new_item' => __( 'New Testimonial', 'venera' ),
        'view_item' => __( 'View Testimonial', 'venera' ),
        'search_items' => __( 'Search Testimonials', 'venera' ),
        'not_found' => __( 'No Testimonials found', 'venera' ),
        'not_found_in_trash' => __( 'No Testimonials found in Trash', 'venera' ),
        'parent_item_colon' => __( 'Parent Testimonial:', 'venera' ),
        'menu_name' => __( 'Testimonials', 'venera' ),
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => false,
        'description' => __( 'Testimonials', 'venera' ),
        'supports' => array( 'title', 'editor', 'thumbnail' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => true,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'menu_icon' => get_template_directory_uri() . '/images/card-address.png',
        'exclude_from_search' => true,
    );

    register_post_type( 'venera_testimonial', $args );
}


/**
* PORTFOLIO ITEMS CUSOM POST
*/

add_action( 'init', 'venera_register_cpt_portfolio_item' );
function venera_register_cpt_portfolio_item() {

    $labels = array(
        'name' => __( 'Portfolio Item', 'venera' ),
        'singular_name' => __( 'Portfolio Item', 'venera' ),
        'add_new' => __( 'Add New', 'venera' ),
        'add_new_item' => __( 'Add New Portfolio Item', 'venera' ),
        'edit_item' => __( 'Edit Portfolio Item', 'venera' ),
        'new_item' => __( 'New Portfolio Item', 'venera' ),
        'view_item' => __( 'View Portfolio Item', 'venera' ),
        'search_items' => __( 'Search Portfolio Items', 'venera' ),
        'not_found' => __( 'No Portfolio Items found', 'venera' ),
        'not_found_in_trash' => __( 'No Portfolio Items found in Trash', 'venera' ),
        'parent_item_colon' => __( 'Parent Portfolio Item:', 'venera' ),
        'menu_name' => __( 'Portfolio', 'venera' ),
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => false,
        'description' => __( 'Portfolio Item', 'venera' ),
        'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => array('slug' => 'portfolio-item'),
        'capability_type' => 'post',
        'menu_icon' => get_template_directory_uri() . '/images/icon-portfolio-item.png',
        'exclude_from_search' => false,
    );

    register_post_type( 'venera_portfolio', $args );
}

add_action( 'init', 'venera_register_portfolio_item_txm' );
function venera_register_portfolio_item_txm()
{
  // Add new taxonomy, NOT hierarchical (like tags)
  $labels = array(
    'name'                         => _x( 'Portfolio Category', 'taxonomy general name' ),
    'singular_name'                => _x( 'Portfolio Categories', 'taxonomy singular name' ),
    'search_items'                 => __( 'Search Portfolio Categories' ),
    'popular_items'                => __( 'Popular Portfolio Categories' ),
    'all_items'                    => __( 'All Portfolio Categories' ),
    'parent_item'                  => null,
    'parent_item_colon'            => null,
    'edit_item'                    => __( 'Edit Portfolio Category' ),
    'update_item'                  => __( 'Update Portfolio Category' ),
    'add_new_item'                 => __( 'Add New Portfolio Category' ),
    'new_item_name'                => __( 'New Portfolio Category Name' ),
    'separate_items_with_commas'   => __( 'Separate portfolio categories with commas' ),
    'add_or_remove_items'          => __( 'Add or remove portfolio category' ),
    'choose_from_most_used'        => __( 'Choose from the most used portfolio categories' ),
    'not_found'                    => __( 'No portfolio categories found.' ),
    'menu_name'                    => __( 'Portfolio Categories' )
  );

  $args = array(
    'hierarchical'            => false,
    'labels'                  => $labels,
    'show_ui'                 => true,
    'show_admin_column'       => true,
    'update_count_callback'   => '_update_post_term_count',
    'query_var'               => true,
    'rewrite'                 => array( 'slug' => 'portfolio-category' )
  );

  register_taxonomy( 'portfolio-category', 'venera_portfolio', $args );
}



/**
* TEAM MEMBERS CUSOM POST
*/

add_action( 'init', 'venera_register_cpt_team_member' );
function venera_register_cpt_team_member() {

    $labels = array(
        'name' => __( 'Team Member', 'venera' ),
        'singular_name' => __( 'Team Member', 'venera' ),
        'add_new' => __( 'Add New', 'venera' ),
        'add_new_item' => __( 'Add Team Member', 'venera' ),
        'edit_item' => __( 'Edit Team Member', 'venera' ),
        'new_item' => __( 'New Team Member', 'venera' ),
        'view_item' => __( 'View Team Member', 'venera' ),
        'search_items' => __( 'Search Team Members', 'venera' ),
        'not_found' => __( 'No Team Members found', 'venera' ),
        'not_found_in_trash' => __( 'No Team Members found in Trash', 'venera' ),
        'parent_item_colon' => __( 'Parent Team Member:', 'venera' ),
        'menu_name' => __( 'Team Members', 'venera' ),
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => false,
        'description' => __( 'Team Member', 'venera' ),
        'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'menu_icon' => get_template_directory_uri() . '/images/icon-user-gray.png',
        'exclude_from_search' => true,
    );

    register_post_type( 'venera_team_member', $args );
}

/**
* SLIDES POST TYPE
*/

add_action( 'init', 'venera_register_cpt_slide' );
function venera_register_cpt_slide() {

    $labels = array(
        'name' => __( 'Slide', 'venera' ),
        'singular_name' => __( 'Slide', 'venera' ),
        'add_new' => __( 'Add New', 'venera' ),
        'add_new_item' => __( 'Add New Slide', 'venera' ),
        'edit_item' => __( 'Edit Slide', 'venera' ),
        'new_item' => __( 'New Slide', 'venera' ),
        'view_item' => __( 'View Slide', 'venera' ),
        'search_items' => __( 'Search Slides', 'venera' ),
        'not_found' => __( 'No Slides found', 'venera' ),
        'not_found_in_trash' => __( 'No Slides found in Trash', 'venera' ),
        'parent_item_colon' => __( 'Parent Slide:', 'venera' ),
        'menu_name' => __( 'Slides', 'venera' ),
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => false,
        'description' => __( 'Slide', 'venera' ),
        'supports' => array( 'title', 'editor' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'menu_icon' => get_template_directory_uri() . '/images/icon-portfolio-item.png',
        'exclude_from_search' => true,
    );

    register_post_type( 'venera_slide', $args );
}
