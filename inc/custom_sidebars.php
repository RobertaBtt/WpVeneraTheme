<?php
/**
 * Register widgetized area and update sidebar with default widgets
 */
function venera_custom_sidebars_init() {
    register_sidebar( array(
        'name'          => __( 'Default Sidebar', 'venera' ),
        'id'            => 'sidebar-default',
        'description' => __( 'Deafault sidebar that appears on right or left of the posts', 'venera' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
    register_sidebar( array(
        'name'          => __( 'Under Portfolio', 'venera' ),
        'id'            => 'sidebar-under-portfolio',
        'description'   => 'Sidebar for section under portfolio item',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );

    $total_widgets_in_footer = venera_get_widgets_count('sidebar-footer');
    $span_class = venera_calc_span_class($total_widgets_in_footer);
    register_sidebar( array(
        'name'          => __( 'Footer Area', 'venera' ),
        'id'            => 'sidebar-footer',
        'description' => __( 'Sidebar for pre footer section', 'venera' ),
        'before_widget' => '<div class="'.$span_class.'"><aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside></div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'venera_custom_sidebars_init' );