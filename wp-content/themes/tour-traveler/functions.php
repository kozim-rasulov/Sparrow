<?php
/**
 * Child Theme functions and definitions.
 *
 * @subpackage Tour Traveler
 * @author  ThemesEye
 * @license http://www.gnu.org/licenses/gpl-3.0.html GNU Public License
 *
 */

/**
 * Theme functions and definitions.
 */
 
add_action( 'wp_enqueue_scripts', 'tour_traveler_child_css',25);
function tour_traveler_child_css() {
	wp_enqueue_style( 'tour-traveler-parent-theme-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'tour-traveler-child-style',get_stylesheet_directory_uri() . '/css/child.css');
}

add_action( 'init', 'tour_traveler_remove_my_action');
function tour_traveler_remove_my_action() {
    remove_action( 'admin_notices','tafri_travel_notice');
    remove_action( 'admin_menu','tafri_travel_gettingstarted');
}

add_action( 'after_setup_theme', 'tour_traveler_setup' );
function tour_traveler_setup() {    
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'align-wide' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'wp-block-styles' );
    add_theme_support( 'html5', array(
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ) );
    add_theme_support('responsive-embeds');    
    add_theme_support( 'custom-logo', array(
        'width'       => 250,
        'height'      => 250,
        'flex-width'  => true,
    ) );
    add_theme_support( 'custom-background', array(
        'default-color' => 'f1f1f1'
    ) );
    add_editor_style( array( 'assets/css/editor-style.css' ) );
}

// Theme Widgets Setup
function tour_traveler_widgets_init() {
    register_sidebar(array(
        'name'          => __('Blog Sidebar', 'tour-traveler'),
        'description'   => __('Appears on blog page sidebar', 'tour-traveler'),
        'id'            => 'sidebar-1',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));

    register_sidebar(array(
        'name'          => __('Page Sidebar', 'tour-traveler'),
        'description'   => __('Appears on page sidebar', 'tour-traveler'),
        'id'            => 'sidebar-2',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));

    register_sidebar(array(
        'name'          => __('Third Column Sidebar', 'tour-traveler'),
        'description'   => __('Appears on page sidebar', 'tour-traveler'),
        'id'            => 'sidebar-3',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));

    //Footer widget areas
    $tafri_travel_widget_areas = get_theme_mod('tafri_travel_footer_widget', '4');
    for ($i=1; $i<=$tafri_travel_widget_areas; $i++) {
        register_sidebar( array(
            'name'          => __( 'Footer ', 'tour-traveler' ) . $i,
            'id'            => 'footer-' . $i,
            'description'   => '',
            'before_widget' => '<aside id="%1$s" class="widget %2$s py-4">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        ) );
    }

    register_sidebar( array(
        'name'          => __( 'Shop Page Sidebar', 'tour-traveler' ),
        'description'   => __( 'Appears on shop page', 'tour-traveler' ),
        'id'            => 'woocommerce-shop-page-sidebar',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Single Product Page Sidebar', 'tour-traveler' ),
        'description'   => __( 'Appears on Single Product Page', 'tour-traveler' ),
        'id'            => 'single-product-page-sidebar',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}

add_action('widgets_init', 'tour_traveler_widgets_init');

add_action( 'customize_register', 'tour_traveler_customize_register', 11 ); 
function tour_traveler_customize_register() {
	global $wp_customize;
	$wp_customize->remove_section( 'tafri_travel_theme_color_option' );
    $wp_customize->remove_setting( 'tafri_travel_title' );
    $wp_customize->remove_control( 'tafri_travel_title' );
    $wp_customize->remove_setting( 'tafri_travel_desc' );
    $wp_customize->remove_control( 'tafri_travel_desc' );
}

if ( ! defined( 'TAFRI_TRAVEL_THEME_URL' ) ) {
    define( 'TAFRI_TRAVEL_THEME_URL',__('https://www.themeseye.com/wordpress/traveler-wordpress-theme/','tour-traveler'));
}
if ( ! defined( 'TAFRI_TRAVEL_THEME_NAME' ) ) {
    define( 'TAFRI_TRAVEL_THEME_NAME', __('Tour Traveler Pro','tour-traveler') );
}

define('TOUR_TRAVELER_LIVE_DEMO',__('https://www.themeseye.com/demo/tour-traveler-pro/','tour-traveler'));
define('TOUR_TRAVELER_BUY_PRO',__('https://www.themeseye.com/wordpress/traveler-wordpress-theme/','tour-traveler'));
define('TOUR_TRAVELER_PRO_DOC',__('https://www.themeseye.com/theme-demo/docs/tour-traveler-pro/','tour-traveler'));
define('TOUR_TRAVELER_FREE_DOC',__('https://themeseye.com/theme-demo/docs/free-tour-traveler/','tour-traveler'));
define('TOUR_TRAVELER_PRO_SUPPORT',__('https://www.themeseye.com/forums/forum/themeseye-support/','tour-traveler'));
define('TOUR_TRAVELER_FREE_SUPPORT',__('https://wordpress.org/support/theme/tour-traveler/','tour-traveler'));
//footer Link
define('TOUR_TRAVELER_CREDIT',__('https://www.themeseye.com/wordpress/free-traveler-wordpress-theme/','tour-traveler'));

if ( ! function_exists( 'tour_traveler_credit' ) ) {
    function tour_traveler_credit(){
        echo "<a href=".esc_url(TOUR_TRAVELER_CREDIT)." target='_blank'>".esc_html__('Traveler WordPress Theme','tour-traveler')."</a>";
    }
}

require get_theme_file_path( '/inc/dashboard/get_started_info.php' );