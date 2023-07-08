<?php
/**
 * Tafri Travel functions and definitions
 *
 * @package tafri-travel
 */
/**
 * Set the content width based on the theme's design and stylesheet.
 */

/* Breadcrumb Begin */
function tafri_travel_the_breadcrumb() {
	if (!is_home()) {
		echo '<a href="';
			echo esc_url( home_url() );
		echo '">';
			bloginfo('name');
		echo "</a> ";
		if (is_category() || is_single()) {
			the_category(',');
			if (is_single()) {
				echo "<span> ";
					the_title();
				echo "</span> ";
			}
		} elseif (is_page()) {
			the_title();
		}
	}
}

/* Theme Setup */
if (!function_exists('tafri_travel_setup')):

function tafri_travel_setup() {

	$GLOBALS['content_width'] = apply_filters('tafri_travel_content_width', 640);

	load_theme_textdomain( 'tafri-travel', get_template_directory() . '/languages' );
	add_theme_support('automatic-feed-links');
	add_theme_support('post-thumbnails');
	add_theme_support( 'align-wide' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support('woocommerce');
	add_theme_support('title-tag');
	add_theme_support('custom-logo', array(
		'height'      => 250,
		'width'       => 250,
		'flex-width'  => true,
		'flex-height' => true,
	));
	add_image_size('tafri-travel-homepage-thumb', 250, 145, true);
	register_nav_menus( array(
		'left-primary' => __( 'Left Menu', 'tafri-travel' ),
		'right-primary' => __( 'Right Menu', 'tafri-travel' ),
		'responsive-menu' => __( 'Responsive Menu', 'tafri-travel' ),
	) );
	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array('image','video','gallery','audio',) );


	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	add_theme_support('responsive-embeds');

	add_theme_support('custom-background', array(
		'default-color' => 'f1f1f1',
	));

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style(array('assets/css/editor-style.css', tafri_travel_fonts_url()));
}

endif;
add_action('after_setup_theme', 'tafri_travel_setup');

/* Theme Font URL */
function tafri_travel_fonts_url(){
	$font_family   = array(
    'ABeeZee:ital@0;1',
	'Abril+Fatfac',
	'Acme',
	'Anton',
	'Architects+Daughter',
	'Arimo:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700',
	'Arsenal:ital,wght@0,400;0,700;1,400;1,700',
	'Arvo:ital,wght@0,400;0,700;1,400;1,700',
	'Alegreya:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900',
	'Alfa+Slab+One',
	'Averia+Serif+Libre:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700',
	'Bangers',
	'Boogaloo',
	'Bad+Script',
	'Bitter:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
	'Bree+Serif',
	'BenchNine:wght@300;400;700',
	'Cabin:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700',
	'Cardo:ital,wght@0,400;0,700;1,400',
	'Courgette',
	'Cherry+Swash:wght@400;700',
	'Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700',
	'Crimson+Text:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700',
	'Cuprum:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700',
	'Cookie',
	'Coming+Soon',
	'Chewy',
	'Days+One',
	'Dosis:wght@200;300;400;500;600;700;800',
	'Economica:ital,wght@0,400;0,700;1,400;1,700',
	'Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
	'Fredoka+One',
	'Fjalla+One',
	'Francois+One',
	'Frank+Ruhl+Libre:wght@300;400;500;700;900',
	'Gloria+Hallelujah',
	'Great+Vibes',
	'Handlee',
	'Hammersmith+One',
	'Heebo:wght@100;200;300;400;500;600;700;800;900',
	'Inconsolata:wght@200;300;400;500;600;700;800;900',
	'Indie+Flower',
	'IM+Fell+English+SC',
	'Julius+Sans+One',
	'Josefin+Slab:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700',
	'Josefin+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700',
	'Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
	'Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
	'Lobster',
	'Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900',
	'Lora:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700',
	'Libre+Baskerville:ital,wght@0,400;0,700;1,400',
	'Lobster+Two:ital,wght@0,400;0,700;1,400;1,700',
	'Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900',
	'Merienda+One',
	'Monda:wght@400;700',
	'Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
	'Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
	'Marck+Script',
	'Noto+Serif:ital,wght@0,400;0,700;1,400;1,700',
	'Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800',
	'Overpass:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
	'Overpass+Mono:wght@300;400;500;600;700',
	'Oxygen:wght@300;400;700',
	'Orbitron:wght@400;500;600;700;800;900',
	'Oswald:wght@200;300;400;500;600;700',
	'Patua+One',
	'Pacifico',
	'Padauk:wght@400;700',
	'Playball',
	'Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900',
	'PT+Sans:ital,wght@0,400;0,700;1,400;1,700',
	'Philosopher:ital,wght@0,400;0,700;1,400;1,700',
	'Permanent+Marker',
	'Poiret+One',
	'Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
	'Quicksand:wght@300;400;500;600;700',
	'Quattrocento+Sans:ital,wght@0,400;0,700;1,400;1,700',
	'Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
	'Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
	'Roboto+Condensed:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700',
	'Rokkitt:wght@100;200;300;400;500;600;700;800;900',
	'Russo+One',
	'Righteous',
	'Saira:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
	'Satisfy',
	'Slabo+13px',
	'Slabo+27px',
	'Source+Sans+Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700;1,900',
	'Shadows+Into+Light+Two',
	'Shadows+Into+Light',
	'Sacramento',
	'Shrikhand',
	'Staatliches',
	'Tangerine:wght@400;700',
	'Trirong:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
	'Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700',
	'Unica+One',
	'VT323',
	'Varela+Round',
	'Vampiro+One',
	'Vollkorn:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900',
	'Volkhov:ital,wght@0,400;0,700;1,400;1,700',
	'Work+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
	'Yanone+Kaffeesatz:wght@200;300;400;500;600;700',
	'ZCOOL+XiaoWei'
	);

	$fonts_url = add_query_arg( array(
	'family' => implode( '&family=', $font_family ),
	'display' => 'swap',
	), 'https://fonts.googleapis.com/css2' );

	$contents = wptt_get_webfont_url( esc_url_raw( $fonts_url ) );
	return $contents;
}

// Theme Widgets Setup
function tafri_travel_widgets_init() {
	register_sidebar(array(
		'name'          => __('Blog Sidebar', 'tafri-travel'),
		'description'   => __('Appears on blog page sidebar', 'tafri-travel'),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));

	register_sidebar(array(
		'name'          => __('Page Sidebar', 'tafri-travel'),
		'description'   => __('Appears on page sidebar', 'tafri-travel'),
		'id'            => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));

	register_sidebar(array(
		'name'          => __('Third Column Sidebar', 'tafri-travel'),
		'description'   => __('Appears on page sidebar', 'tafri-travel'),
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
			'name'          => __( 'Footer ', 'tafri-travel' ) . $i,
			'id'            => 'footer-' . $i,
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s py-4">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	}

	register_sidebar( array(
		'name'          => __( 'Shop Page Sidebar', 'tafri-travel' ),
		'description'   => __( 'Appears on shop page', 'tafri-travel' ),
		'id'            => 'woocommerce-shop-page-sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Single Product Page Sidebar', 'tafri-travel' ),
		'description'   => __( 'Appears on Single Product Page', 'tafri-travel' ),
		'id'            => 'single-product-page-sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}

add_action('widgets_init', 'tafri_travel_widgets_init');



function tafri_travel_sanitize_dropdown_pages($page_id, $setting) {
	// Ensure $input is an absolute integer.
	$page_id = absint($page_id);
	// If $page_id is an ID of a published page, return it; otherwise, return the default.
	return ('publish' == get_post_status($page_id)?$page_id:$setting->default);
}

// radio button sanitization
function tafri_travel_sanitize_choices($input, $setting) {
	global $wp_customize;
	$control = $wp_customize->get_control($setting->id);
	if (array_key_exists($input, $control->choices)) {
		return $input;
	} else {
		return $setting->default;
	}
}

function tafri_travel_sanitize_checkbox( $input ) {
	return ( ( isset( $input ) && true == $input ) ? true : false );
}

function tafri_travel_sanitize_float( $input ) {
	return filter_var($input, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
}

function tafri_travel_sanitize_number_range( $number, $setting ) {
	$number = absint( $number );
	$atts = $setting->manager->get_control( $setting->id )->input_attrs;
	$min = ( isset( $atts['min'] ) ? $atts['min'] : $number );
	$max = ( isset( $atts['max'] ) ? $atts['max'] : $number );
	$step = ( isset( $atts['step'] ) ? $atts['step'] : 1 );
	return ( $min <= $number && $number <= $max && is_int( $number / $step ) ? $number : $setting->default );
}

function tafri_travel_sanitize_phone_number( $phone ) {
	return preg_replace( '/[^\d+]/', '', $phone );
}

// Excerpt Limit Begin
function tafri_travel_string_limit_words($string, $word_limit) {
	$words = explode(' ', $string, ($word_limit + 1));
	if(count($words) > $word_limit)
	array_pop($words);
	return implode(' ', $words);
}

// Change number or products per row to 3
add_filter('loop_shop_columns', 'tafri_travel_loop_columns');
if (!function_exists('tafri_travel_loop_columns')) {
	function tafri_travel_loop_columns() {
		$columns = get_theme_mod( 'tafri_travel_woocommerce_product_per_columns', 3 );
		return $columns; // 3 products per row
	}
}

//Change number of products that are displayed per page (shop page)
add_filter( 'loop_shop_per_page', 'tafri_travel_shop_per_page', 20 );
function tafri_travel_shop_per_page( $cols ) {
  	$cols = get_theme_mod( 'tafri_travel_woocommerce_product_per_page', 9 );
	return $cols;
}

// Theme enqueue scripts
function tafri_travel_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style('tafri-travel-fonts', tafri_travel_fonts_url(), array(), null);
	wp_enqueue_style( 'tafri-travel-block-style', get_theme_file_uri('/assets/css/blocks.css') );
	wp_enqueue_style('bootstrap-style', get_template_directory_uri().'/assets/css/bootstrap.css');
	wp_enqueue_style('tafri-travel-basic-style', get_stylesheet_uri());
	wp_enqueue_style('tafri-travel-customcss', get_template_directory_uri().'/assets/css/custom.css');
	wp_enqueue_style('font-awesome-style', get_template_directory_uri().'/assets/css/fontawesome-all.css');

     // Body
    $tafri_travel_body_color = get_theme_mod('tafri_travel_body_color', '');
    $tafri_travel_body_font_family = get_theme_mod('tafri_travel_body_font_family', '');
    $tafri_travel_body_font_size = get_theme_mod('tafri_travel_body_font_size', '');
	// Paragraph
    $tafri_travel_paragraph_color = get_theme_mod('tafri_travel_paragraph_color', '');
    $tafri_travel_paragraph_font_family = get_theme_mod('tafri_travel_paragraph_font_family', '');
    $tafri_travel_paragraph_font_size = get_theme_mod('tafri_travel_paragraph_font_size', '');
	// "a" tag
	$tafri_travel_atag_color = get_theme_mod('tafri_travel_atag_color', '');
    $tafri_travel_atag_font_family = get_theme_mod('tafri_travel_atag_font_family', '');
	// "li" tag
	$tafri_travel_li_color = get_theme_mod('tafri_travel_li_color', '');
    $tafri_travel_li_font_family = get_theme_mod('tafri_travel_li_font_family', '');
	// H1
	$tafri_travel_h1_color = get_theme_mod('tafri_travel_h1_color', '');
    $tafri_travel_h1_font_family = get_theme_mod('tafri_travel_h1_font_family', '');
    $tafri_travel_h1_font_size = get_theme_mod('tafri_travel_h1_font_size', '');
	// H2
	$tafri_travel_h2_color = get_theme_mod('tafri_travel_h2_color', '');
    $tafri_travel_h2_font_family = get_theme_mod('tafri_travel_h2_font_family', '');
    $tafri_travel_h2_font_size = get_theme_mod('tafri_travel_h2_font_size', '');
	// H3
	$tafri_travel_h3_color = get_theme_mod('tafri_travel_h3_color', '');
    $tafri_travel_h3_font_family = get_theme_mod('tafri_travel_h3_font_family', '');
    $tafri_travel_h3_font_size = get_theme_mod('tafri_travel_h3_font_size', '');
	// H4
	$tafri_travel_h4_color = get_theme_mod('tafri_travel_h4_color', '');
    $tafri_travel_h4_font_family = get_theme_mod('tafri_travel_h4_font_family', '');
    $tafri_travel_h4_font_size = get_theme_mod('tafri_travel_h4_font_size', '');
	// H5
	$tafri_travel_h5_color = get_theme_mod('tafri_travel_h5_color', '');
    $tafri_travel_h5_font_family = get_theme_mod('tafri_travel_h5_font_family', '');
    $tafri_travel_h5_font_size = get_theme_mod('tafri_travel_h5_font_size', '');
	// H6
	$tafri_travel_h6_color = get_theme_mod('tafri_travel_h6_color', '');
    $tafri_travel_h6_font_family = get_theme_mod('tafri_travel_h6_font_family', '');
    $tafri_travel_h6_font_size = get_theme_mod('tafri_travel_h6_font_size', '');

	$tafri_travel_custom_css ='
	    body{
		    color:'.esc_html($tafri_travel_body_color).'!important;
		    font-family: '.esc_html($tafri_travel_body_font_family).'!important;
		    font-size: '.esc_html($tafri_travel_body_font_size).'px !important;
		}
		p,span{
		    color:'.esc_html($tafri_travel_paragraph_color).'!important;
		    font-family: '.esc_html($tafri_travel_paragraph_font_family).';
		    font-size: '.esc_html($tafri_travel_paragraph_font_size).';
		}
		a{
		    color:'.esc_html($tafri_travel_atag_color).'!important;
		    font-family: '.esc_html($tafri_travel_atag_font_family).';
		}
		li{
		    color:'.esc_html($tafri_travel_li_color).'!important;
		    font-family: '.esc_html($tafri_travel_li_font_family).';
		}
		h1{
		    color:'.esc_html($tafri_travel_h1_color).'!important;
		    font-family: '.esc_html($tafri_travel_h1_font_family).'!important;
		    font-size: '.esc_html($tafri_travel_h1_font_size).'!important;
		}
		h2{
		    color:'.esc_html($tafri_travel_h2_color).'!important;
		    font-family: '.esc_html($tafri_travel_h2_font_family).'!important;
		    font-size: '.esc_html($tafri_travel_h2_font_size).'!important;
		}
		h3{
		    color:'.esc_html($tafri_travel_h3_color).'!important;
		    font-family: '.esc_html($tafri_travel_h3_font_family).'!important;
		    font-size: '.esc_html($tafri_travel_h3_font_size).'!important;
		}
		h4{
		    color:'.esc_html($tafri_travel_h4_color).'!important;
		    font-family: '.esc_html($tafri_travel_h4_font_family).'!important;
		    font-size: '.esc_html($tafri_travel_h4_font_size).'!important;
		}
		h5{
		    color:'.esc_html($tafri_travel_h5_color).'!important;
		    font-family: '.esc_html($tafri_travel_h5_font_family).'!important;
		    font-size: '.esc_html($tafri_travel_h5_font_size).'!important;
		}
		h6{
		    color:'.esc_html($tafri_travel_h6_color).'!important;
		    font-family: '.esc_html($tafri_travel_h6_font_family).'!important;
		    font-size: '.esc_html($tafri_travel_h6_font_size).'!important;
		}
	';

	wp_add_inline_style( 'tafri-travel-basic-style',$tafri_travel_custom_css );

	wp_enqueue_script('tafri-travel-customscripts-jquery', get_template_directory_uri().'/assets/js/custom.js', array('jquery'));
	wp_enqueue_script('bootstrap-jquery', get_template_directory_uri().'/assets/js/bootstrap.js', array('jquery'));
	wp_enqueue_script( 'jquery-superfish', get_template_directory_uri() . '/assets/js/jquery.superfish.js', array('jquery') ,'',true);
	require get_parent_theme_file_path( '/color-option.php' );
	wp_add_inline_style( 'tafri-travel-basic-style',$tafri_travel_custom_css );
	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'tafri_travel_scripts');

define('TAFRI_TRAVEL_LIVE_DEMO',__('https://www.themeseye.com/demo/tafri-travel-pro/','tafri-travel'));
define('TAFRI_TRAVEL_BUY_PRO',__('https://www.themeseye.com/wordpress/wordpress-travel-theme/','tafri-travel'));
define('TAFRI_TRAVEL_PRO_DOC',__('https://themeseye.com/theme-demo/docs/tafri-travel-pro/','tafri-travel'));
define('TAFRI_TRAVEL_FREE_DOC',__('https://themeseye.com/theme-demo/docs/free-tafri-travel/','tafri-travel'));
define('TAFRI_TRAVEL_PRO_SUPPORT',__('https://www.themeseye.com/forums/forum/themeseye-support/','tafri-travel'));
define('TAFRI_TRAVEL_FREE_SUPPORT',__('https://wordpress.org/support/theme/tafri-travel/','tafri-travel'));
define('TAFRI_TRAVEL_CREDIT',__('https://www.themeseye.com/wordpress/free-wordpress-travel-theme/','tafri-travel'));

if ( ! function_exists( 'tafri_travel_credit' ) ) {
	function tafri_travel_credit(){
		echo "<a href=".esc_url(TAFRI_TRAVEL_CREDIT)." target='_blank'>".esc_html__('Travel WordPress Theme','tafri-travel')."</a>";
	}
}

function tafri_travel_enable_image_dimention(){
	if(get_theme_mod('tafri_travel_post_image_dimention') == 'Custom Image Size' ) {
		return true;
	}
	return false;
}

function tafri_travel_show_post_color(){
	if(get_theme_mod('tafri_travel_blog_post_featured_option') == 'Post Color' ) {
		return true;
	}
	return false;
}

function tafri_travel_show_post_image_dimention(){
	if(get_theme_mod('tafri_travel_blog_post_featured_option') == 'Post Image' ) {
		return true;
	}
	return false;
}


/* Custom header additions. */
require get_template_directory().'/inc/custom-header.php';

/* Custom template tags for this theme. */
require get_template_directory().'/inc/template-tags.php';

/* Customizer additions. */
require get_template_directory().'/inc/customizer.php';

require get_template_directory().'/inc/dashboard/get_started_info.php';

/* Customizer additions. */
require get_template_directory() . '/inc/widget-about-us.php';

/* Customizer additions. */
require get_template_directory() . '/inc/widget-contact-us.php';

/* Webfonts */
require get_template_directory() . '/inc/wptt-webfont-loader.php';
