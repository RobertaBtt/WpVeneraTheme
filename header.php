<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package venera
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>" />
        <meta name="viewport" content="width=device-width" />
        <title><?php wp_title('|', true, 'right'); ?></title>
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
        <link href="<?php echo get_template_directory_uri(); ?>/css/theme_venera.css" media="all" rel="stylesheet" type="text/css" />
        <link href="http://fonts.googleapis.com/css?family=Abel:400|Oswald:300,400,700" media="all" rel="stylesheet" type="text/css" />

        <!--[if lt IE 9]>
        <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
        <![endif]-->

        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>
        <?php
        if (get_field('google_analytics_id', 'option')) {
            include_once( get_template_directory() . '/inc/google_analytics.php' );
        }
        ?>
<?php do_action('before'); ?>
        <header>
            <div class="navbar <?php if (get_field('top_bar_fixed_to_top', 'option') == 'yes') echo "navbar-fixed-top"; ?> <?php if (get_field('inversed_top_bar') == 'yes') echo "navbar-inverse"; ?>">
                <div class="navbar-inner">
                    <div class="container">
                        <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home" class="brand">
                            <?php if (get_field('logo_type', 'option') == 'image') { ?>
                                <img src="<?php the_field('logo_image', 'option'); ?>" alt="" width="<?php the_field('logo_image_width', 'option'); ?>">
                                <?php
                            }
                            if (get_field('logo_type', 'option') == 'text') {
                                the_field('logo_text', 'option');
                            }
                            ?>
                        </a>
                        <div class="nav-collapse collapse top-nav-w">
                            <?php
                            if (has_nav_menu('header-menu')) {
                                wp_nav_menu(array(
                                    'theme_location' => 'header-menu',
                                    'depth' => 2,
                                    'container' => false,
                                    'menu_class' => 'nav',
                                    'fallback_cb' => 'wp_page_menu',
                                    //Process nav menu using our custom nav walker
                                    'walker' => new wp_bootstrap_navwalker())
                                );
                            }
                            ?>
                            <?php
                            if (get_field('hide_search_box_from_top_bar', 'option') != 'yes') {
                                get_search_form(true);
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </header>