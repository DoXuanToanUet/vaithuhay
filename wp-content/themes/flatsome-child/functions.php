<?php //Add Style and Script
function add_theme_scripts()
{
    $version = '1.0';
//	wp_enqueue_style( 'FontAwesome', get_template_directory_uri() . '/assets/plugins/linearIcon/linearIcon.css', array(), $version, 'all' );
    wp_enqueue_style('devFontAwe', get_stylesheet_directory_uri() . '/assets/plugins/fontAwesome/font-awesome.min.css', array(), $version, 'all');
    wp_enqueue_style('devMainCss', get_stylesheet_directory_uri() . '/assets/css/custom.css', array(), $version, 'all');
    wp_enqueue_style('devSwiperCss', get_stylesheet_directory_uri() . '/assets/plugins/swiper/swiper.min.css', array(), $version, 'all');

    wp_enqueue_script('devSwiperJs', get_stylesheet_directory_uri() . '/assets/plugins/swiper/swiper.min.js', array(), $version, true);
    wp_enqueue_script('devMainJS', get_stylesheet_directory_uri() . '/assets/js/main.js', array(), $version, true);

    wp_enqueue_style('FancyboxCss', get_stylesheet_directory_uri() . '/assets/plugins/fancybox/fancybox.css', array(), $version, 'all');
    wp_enqueue_script('FancyboxJs', get_stylesheet_directory_uri() . '/assets/plugins/fancybox/fancybox.min.js', array(), $version, true);
}

add_action('wp_enqueue_scripts', 'add_theme_scripts');


//Theme Options
if (function_exists('acf_add_options_page')) {

    acf_add_options_page(array(
        'page_title' => 'Theme General Settings',
        'menu_title' => 'Theme Settings',
        'menu_slug'  => 'theme-general-settings',
        'capability' => 'administrator',
        'redirect'   => false
    ));

    acf_add_options_sub_page(array(
        'page_title'  => 'Home Settings',
        'menu_title'  => 'Home Settings',
        'parent_slug' => 'theme-general-settings',
        'capability' => 'administrator',
    ));

}


//* Clean WordPress header
function wps_deregister_styles()
{
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
}

add_action('wp_print_styles', 'wps_deregister_styles', 100);
function stop_loading_wp_embed()
{
    if (!is_admin()) {
        wp_deregister_script('wp-embed');
    }
}

add_action('init', 'stop_loading_wp_embed');
remove_action('rest_api_init', 'wp_oembed_register_route');
add_filter('embed_oembed_discover', '__return_false');
remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10);
remove_action('wp_head', 'wp_oembed_add_discovery_links');
remove_action('wp_head', 'wp_oembed_add_host_js');
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head, 10, 0');

function ww_load_dashicons(){
    wp_enqueue_style('dashicons');
}
add_action('wp_enqueue_scripts', 'ww_load_dashicons');

// Autoload file 
function auto_load_files($path) {

    $files = glob($path);

    foreach ($files as $file) {
        require_once($file); 
    }
}
auto_load_files(get_stylesheet_directory() . '/shortcode/*.php');


// function wpdocs_custom_excerpt_length( $length ) {
//     return 5;
// }
// add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );
