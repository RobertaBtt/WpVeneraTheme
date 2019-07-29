<?php
/**
 * Custom functions to access db posts and custom post types
 *
 * @package venera
 */

if ( ! function_exists( 'venera_get_pricing_packages' ) ) :
/**
 * Display navigation to next/previous pages when applicable
 */
function venera_get_pricing_packages() {
  $args = array(
    'post_type' => 'venera_pricing',
    'posts_per_page' => -1,
    'orderby' => 'position',
    'order' => 'ASC'
  );
  $loop = new WP_Query( $args );
  return $loop;
}
endif;


if ( ! function_exists( 'venera_get_portfolio_items' ) ) :
/**
 * Display navigation to next/previous pages when applicable
 */
function venera_get_portfolio_items( $limit = -1 ) {
  $args = array(
    'post_type' => 'venera_portfolio',
    'posts_per_page' => $limit,
    'orderby' => 'date',
    'order' => 'ASC'
  );
  $loop = new WP_Query( $args );
  return $loop;
}
endif;

if ( ! function_exists( 'venera_get_slides' ) ) :
/**
 * Display navigation to next/previous pages when applicable
 */
function venera_get_slides( $slide_ids = false ) {
  $args = array(
    'post_type' => 'venera_slide',
    'orderby' => 'date',
    'order' => 'ASC'
  );
  # Search for specific slides
  if($slide_ids) $args['post__in'] = $ids;
  $loop = new WP_Query( $args );
  return $loop;
}
endif;

if ( ! function_exists( 'venera_get_team_members' ) ) :
/**
 * Get Team members custom post type
 */
function venera_get_team_members( $limit = -1 ) {
  $args = array(
    'post_type' => 'venera_team_member',
    'posts_per_page' => $limit,
    'orderby' => 'date',
    'order' => 'ASC'
  );
  $loop = new WP_Query( $args );
  return $loop;
}
endif;

if ( ! function_exists( 'venera_get_testimonials' ) ) :
  // Get testimonials
function venera_get_testimonials( $limit = -1 ) {
  $args = array(
    'post_type' => 'venera_testimonial',
    'posts_per_page' => $limit,
    'orderby' => 'date',
    'order' => 'ASC'
  );
  $loop = new WP_Query( $args );
  return $loop;
}
endif;


if ( ! function_exists( 'venera_get_recent_posts' ) ) :
/**
 * Display navigation to next/previous pages when applicable
 */
function venera_get_recent_posts( $limit = -1 ) {
  $args = array(
            'orderby'             => 'date',
            'order'               => 'DESC',
            'posts_per_page'      => $limit,
            'ignore_sticky_posts' => 1,
          );
  $loop = new WP_Query( $args );
  return $loop;
}
endif;

if ( ! function_exists( 'venera_get_related_portfolio_items' ) ) :
/**
 * Display navigation to next/previous pages when applicable
 */
function venera_get_related_portfolio_items( $portfolio_category = FALSE, $limit = -1 ) {
  $args = array(
            'post_type'           => 'venera_portfolio',
            'orderby'             => 'date',
            'order'               => 'DESC',
            'posts_per_page'      => $limit,
            'ignore_sticky_posts' => 1,
          );
  if($portfolio_category) $args['portfolio-category'] = $portfolio_category;
  $loop = new WP_Query( $args );
  return $loop;
}
endif;