<?php
/*
Plugin Name: PBM Theme Addons
Plugin URI: https://pbminfotech.com/
Description: Addons for PBM Infotech Themes
Version: 2.1
Author: PBM Infotech Team
Author URI: https://pbminfotech.com/
Text Domain: pbm-addons
Domain Path: /language
*/

// security
if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

define( 'PBM_ADDON_VERSION', '2.1' );
define( 'PBM_ADDON_PATH', plugin_dir_path( __FILE__ ) ); // with trailing slash
define( 'PBM_ADDON_URL',  plugin_dir_url( __FILE__ )  ); // with trailing slash

$current_theme	= wp_get_theme();
$parent_template	= trim($current_theme->get( 'Template' ));
if( !empty($parent_template) ){
	$current_theme	= wp_get_theme( get_template() );
}
$theme_author = trim($current_theme->get( 'Author' ));

if( $theme_author=='PBM Infotech' || $theme_author=='themeStek' || $theme_author=='themestek' || $theme_author=='creativesplanet' || $theme_author=='creatives_planet' || $theme_author=='Creatives_Planet' || $theme_author=='Creatives Planet' || $theme_author=='themesion' || $theme_author=='Themesion' || $theme_author=='designervily' || $theme_author == 'Designervily' || $theme_author == 'DesignerVily' ){
	define( 'PBM_ADDON_THEME_BY_PBM', get_option('stylesheet') );
} else {
	define( 'PBM_ADDON_THEME_BY_PBM', '' );
}

// increasing memory
if( !function_exists('pbm_addons_memory_limit') ){
function pbm_addons_memory_limit(){
	$memory_limit		= ini_get('memory_limit');
	$required_memory	= 256;
	if( substr($memory_limit,-1)=='M' || substr($memory_limit,-1)=='K' ){
		$memory_number = substr($memory_limit, 0, -1);
		if( $memory_number < $required_memory || substr($memory_limit,-1)=='K' ){
			@ini_set('memory_limit', $required_memory.'M');
		}
	}
}
}

/**
 *  All Shortcodes
 */
if( file_exists( PBM_ADDON_PATH . 'shortcodes' . DIRECTORY_SEPARATOR . 'pbmit-social-links.php' ) ){
	include( PBM_ADDON_PATH . 'shortcodes' . DIRECTORY_SEPARATOR . 'pbmit-social-links.php' );
}
if( file_exists( PBM_ADDON_PATH . 'shortcodes' . DIRECTORY_SEPARATOR . 'pbmit-current-year.php' ) ){
	include( PBM_ADDON_PATH . 'shortcodes' . DIRECTORY_SEPARATOR . 'pbmit-current-year.php' );
}
if( file_exists( PBM_ADDON_PATH . 'shortcodes' . DIRECTORY_SEPARATOR . 'pbmit-site-url.php' ) ){
	include( PBM_ADDON_PATH . 'shortcodes' . DIRECTORY_SEPARATOR . 'pbmit-site-url.php' );
}
if( file_exists( PBM_ADDON_PATH . 'shortcodes' . DIRECTORY_SEPARATOR . 'pbmit-site-title.php' ) ){
	include( PBM_ADDON_PATH . 'shortcodes' . DIRECTORY_SEPARATOR . 'pbmit-site-title.php' );
}
if( file_exists( PBM_ADDON_PATH . 'shortcodes' . DIRECTORY_SEPARATOR . 'pbmit-site-tagline.php' ) ){
	include( PBM_ADDON_PATH . 'shortcodes' . DIRECTORY_SEPARATOR . 'pbmit-site-tagline.php' );
}
if( file_exists( PBM_ADDON_PATH . 'shortcodes' . DIRECTORY_SEPARATOR . 'pbmit-portfolio-detail-list.php' ) ){
	include( PBM_ADDON_PATH . 'shortcodes' . DIRECTORY_SEPARATOR . 'pbmit-portfolio-detail-list.php' );
}

if( file_exists( PBM_ADDON_PATH . 'shortcodes' . DIRECTORY_SEPARATOR . 'pbmit-footer-logo.php' ) ){
	include( PBM_ADDON_PATH . 'shortcodes' . DIRECTORY_SEPARATOR . 'pbmit-footer-logo.php' );
}

/**
 *  All Widgets
 */
include( PBM_ADDON_PATH . 'widgets' . DIRECTORY_SEPARATOR . 'list-all-posts-widget.php' );
include( PBM_ADDON_PATH . 'widgets' . DIRECTORY_SEPARATOR . 'category-list-widget.php' );
include( PBM_ADDON_PATH . 'widgets' . DIRECTORY_SEPARATOR . 'recent-post-widget.php' );
include( PBM_ADDON_PATH . 'widgets' . DIRECTORY_SEPARATOR . 'contact-widget.php' );


/**
 * Login Page Settings
 */
include( PBM_ADDON_PATH . 'includes' . DIRECTORY_SEPARATOR . 'login-functions.php' );


/**
 * WooCommerce functions
 */
include( PBM_ADDON_PATH . 'includes' . DIRECTORY_SEPARATOR . 'woocommerce-functions.php' );


/**
 *  W3 Validator warning "The type attribute is unnecessary..."
 */
add_action( 'template_redirect', function(){
    ob_start( function( $buffer ){
        $buffer = str_replace( array( '<script type="text/javascript"', "<script type='text/javascript'" ), '<script', $buffer );

        // Also works with other attributes...
        $buffer = str_replace( array( '<style type="text/css"', "<style type='text/css'" ), '<style', $buffer );
        $buffer = str_replace( array( ' type="text/css">', " type='text/css'>" ), '>', $buffer );
        $buffer = str_replace( array( 'frameborder="0"', "frameborder='0'" ), '', $buffer );
        $buffer = str_replace( array( 'scrolling="no"', "scrolling='no'" ), '', $buffer );

        return $buffer;
    });
});


if( !function_exists('pbm_addons_init') ){
function pbm_addons_init(){
	// Kirki - disable the telemetry module
	add_filter( 'kirki_telemetry', '__return_false' );
}
}
add_action( 'init', 'pbm_addons_init' );


/**
 * Enqueue scripts and styles.
 */
if( !function_exists('pbm_addons_admin_scripts_styles') ){
function pbm_addons_admin_scripts_styles() {
	wp_enqueue_style( 'wp-editor-classic-layout-styles' );
	wp_enqueue_style( 'balloon', PBM_ADDON_URL . 'libraries/balloon/balloon.min.css' );
}
}
add_action( 'admin_enqueue_scripts', 'pbm_addons_admin_scripts_styles' );


/**
 * Dynamic CSS file checker
 */
if( !function_exists('pbm_addons_check_dynamic_css') ){
function pbm_addons_check_dynamic_css(){
	if( !empty(PBM_ADDON_THEME_BY_PBM) ){
		$pbmit_theme_version		= get_option('pbmit-' . PBM_ADDON_THEME_BY_PBM . '-theme-version');
		$current_theme			= wp_get_theme();
		$current_theme_version	= $current_theme->Version;
		if( $pbmit_theme_version != $current_theme_version ){
			pbm_addons_create_css();
			update_option( 'pbmit-' . PBM_ADDON_THEME_BY_PBM . '-theme-version', $current_theme_version );
		}
	}
}
}
add_action( 'wp', 'pbm_addons_check_dynamic_css', 26 );


/**
 * Dynamic CSS static file generator
 */
add_action( 'customize_save_after', 'pbm_addons_create_css', 10, 2 );
if( !function_exists('pbm_addons_create_css') ){
function pbm_addons_create_css( $data=array() ) {

	if( file_exists( get_template_directory() . '/css/theme-style.php' ) && !empty(PBM_ADDON_THEME_BY_PBM) ){
		$content = '';
		ob_start();
		include( get_template_directory() . '/css/theme-style.php' );
		$content = ob_get_contents();
		ob_end_clean();

		// get site ID if multisite
		$blog_id = '';

		// CSS Folder name with trailing slashes
		$css_folder =  DIRECTORY_SEPARATOR .'pbmit-' . PBM_ADDON_THEME_BY_PBM . '-css' . DIRECTORY_SEPARATOR;

		// All different paths
		$css_dir_path	= ( is_multisite() ) ? WP_CONTENT_DIR . $css_folder . get_current_blog_id() . '/' : WP_CONTENT_DIR . $css_folder ;
		$css_path		= ( is_multisite() ) ? WP_CONTENT_DIR . $css_folder . get_current_blog_id() . '/theme-style.css' : WP_CONTENT_DIR . $css_folder . 'theme-style.css' ;
		$css_min_path	= ( is_multisite() ) ? WP_CONTENT_DIR . $css_folder . get_current_blog_id() . '/theme-style.min.css' : WP_CONTENT_DIR . $css_folder . 'theme-style.min.css' ;

		// create directory if not exists
		wp_mkdir_p( $css_dir_path );

		if( !function_exists('WP_Filesystem') ){
			require_once(ABSPATH . 'wp-admin/includes' . DIRECTORY_SEPARATOR . 'file.php');
		}

		WP_Filesystem();
		global $wp_filesystem;
		$wp_filesystem->put_contents( $css_path, $content );
		$wp_filesystem->put_contents( $css_min_path, pbm_addons_minify_css($content) );

		// add unique version code for this css file
		$version = rand(100,999) . rand(100,999);
		update_option( 'pbmit-theme-style-version', $version );

	}
	return $data;
}
}


/**
 * Auto generate dynamic style css file
 */
if( !function_exists('pbm_addons_auto_generate_dynamic_css') ){
function pbm_addons_auto_generate_dynamic_css(){
	if( !empty(PBM_ADDON_THEME_BY_PBM) ){
		$min				= ( defined('WP_DEBUG') && true === WP_DEBUG ) ?  '' : '.min' ;
		$version			= get_option('pbmit-theme-style-version', '111111');
		$theme				= PBM_ADDON_THEME_BY_PBM;
		$css_folder			=  DIRECTORY_SEPARATOR .'pbmit-' . PBM_ADDON_THEME_BY_PBM . '-css' . DIRECTORY_SEPARATOR;

		$css_path		= ( is_multisite() ) ? WP_CONTENT_DIR . $css_folder . get_current_blog_id() . '/theme-style.css' : WP_CONTENT_DIR . $css_folder . 'theme-style.css' ;
		$css_min_path	= ( is_multisite() ) ? WP_CONTENT_DIR . $css_folder . get_current_blog_id() . '/theme-style.min.css' : WP_CONTENT_DIR . 'theme-style.min.css' ;
		$css_url		= ( is_multisite() ) ? content_url() . '/pbmit-' . PBM_ADDON_THEME_BY_PBM . '-css/' . get_current_blog_id() . '/theme-style' . $min . '.css' : content_url() . '/pbmit-' . PBM_ADDON_THEME_BY_PBM . '-css/theme-style' . $min . '.css' ;

		if( function_exists('pbm_addons_create_css') && ( !file_exists($css_path) || !file_exists($css_min_path) ) ){
			pbm_addons_create_css();
		}
		if( function_exists('is_customize_preview') && !is_customize_preview() ){
			wp_deregister_style( 'pbmit-dynamic-style' );
			wp_enqueue_style('pbmit-dynamic-style', esc_url($css_url), '', $version );
		}

		// For inline css
		global $pbmit_inline_css;
		if( !empty($pbmit_inline_css) ){
			if( function_exists('pbm_addons_minify_css') ){
				$pbmit_inline_css = pbm_addons_minify_css( $pbmit_inline_css );
			}
			wp_add_inline_style( 'pbmit-dynamic-style', trim( $pbmit_inline_css ) );
		}

		// Disable this in Logistbiz theme only
		$disable_in_theme = array(
			'logistbiz'
		);
		$current_theme = strtolower(wp_get_theme()->name);
		if( !in_array( $current_theme, $disable_in_theme ) ){
			if( wp_style_is( 'elementor-global', 'enqueued' ) ){
				wp_deregister_style( 'elementor-global' );
			}
        }

	}
}
}
add_action( 'wp_enqueue_scripts', 'pbm_addons_auto_generate_dynamic_css', 26 );


/**
 * Register a book post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
if( !function_exists('pbm_addons_register_post_types') ){
function pbm_addons_register_post_types() {

	// Default titles
	$portfolio_cpt_title			= esc_attr__('Portfolio','pbm-addons');
	$portfolio_cpt_singular_title	= esc_attr__('Portfolio','pbm-addons');
	$portfolio_cpt_slug				= esc_attr('portfolio');

	$portfolio_cat_title			= esc_attr__('Portfolio Categories','pbm-addons');
	$portfolio_cat_singular_title	= esc_attr__('Portfolio Category','pbm-addons');
	$portfolio_cat_slug				= esc_attr('portfolio-category');

	$service_cpt_title				= esc_attr__('Services','pbm-addons');
	$service_cpt_singular_title		= esc_attr__('Service','pbm-addons');
	$service_cpt_slug				= esc_attr('service');

	$service_cat_title				= esc_attr__('Service Categories','pbm-addons');
	$service_cat_singular_title		= esc_attr__('Service Category','pbm-addons');
	$service_cat_slug				= esc_attr__('service-category');

	$team_cpt_title					= esc_attr__('Team Members','pbm-addons');
	$team_cpt_singular_title		= esc_attr__('Team Member','pbm-addons');
	$team_cpt_slug					= esc_attr('team-member');

	$team_group_title				= esc_attr__('Team Groups','pbm-addons');
	$team_group_singular_title		= esc_attr__('Team Group','pbm-addons');
	$team_group_slug				= esc_attr('team-group');

	$testimonial_cpt_title			= esc_attr__('Testimonials','pbm-addons');
	$testimonial_cpt_singular_title	= esc_attr__('Testimonial','pbm-addons');
	$testimonial_cpt_slug			= esc_attr('testimonial');

	$testimonial_cat_title			= esc_attr__('Testimonial Categories','pbm-addons');
	$testimonial_cat_singular_title	= esc_attr__('Testimonial Category','pbm-addons');
	$testimonial_cat_slug				= esc_attr('testimonial-category');

	if( class_exists('Kirki') ){

		// Portfolio
		$portfolio_cpt_title2	= Kirki::get_option( 'portfolio-cpt-title' );
		$portfolio_cpt_title	= ( !empty($portfolio_cpt_title2) ) ? $portfolio_cpt_title2 : $portfolio_cpt_title ;

		// Portfolio - singular
		$portfolio_cpt_singular_title2	= Kirki::get_option( 'portfolio-cpt-singular-title' );
		$portfolio_cpt_singular_title	= ( !empty($portfolio_cpt_singular_title2) ) ? $portfolio_cpt_singular_title2 : $portfolio_cpt_singular_title ;

		// Portfolio Slug
		$portfolio_cpt_slug2	= Kirki::get_option( 'portfolio-cpt-slug' );
		$portfolio_cpt_slug	= ( !empty($portfolio_cpt_slug2) ) ? $portfolio_cpt_slug2 : $portfolio_cpt_slug ;

		// Portfolio Category
		$portfolio_cat_title2	= Kirki::get_option( 'portfolio-cat-title' );
		$portfolio_cat_title	= ( !empty($portfolio_cat_title2) ) ? $portfolio_cat_title2 : $portfolio_cat_title ;

		// Portfolio Category - singular
		$portfolio_cat_singular_title2	= Kirki::get_option( 'portfolio-cat-singular-title' );
		$portfolio_cat_singular_title	= ( !empty($portfolio_cat_singular_title2) ) ? $portfolio_cat_singular_title2 : $portfolio_cat_singular_title ;

		// Portfolio Category Slug
		$portfolio_cat_slug2	= Kirki::get_option( 'portfolio-cat-slug' );
		$portfolio_cat_slug	= ( !empty($portfolio_cat_slug2) ) ? $portfolio_cat_slug2 : $portfolio_cat_slug ;

		// Service
		$service_cpt_title2	= Kirki::get_option( 'service-cpt-title' );
		$service_cpt_title	= ( !empty($service_cpt_title2) ) ? $service_cpt_title2 : $service_cpt_title ;

		// Service - singular
		$service_cpt_singular_title2	= Kirki::get_option( 'service-cpt-singular-title' );
		$service_cpt_singular_title	= ( !empty($service_cpt_singular_title2) ) ? $service_cpt_singular_title2 : $service_cpt_singular_title ;

		// Service Slug
		$service_cpt_slug2	= Kirki::get_option( 'service-cpt-slug' );
		$service_cpt_slug	= ( !empty($service_cpt_slug2) ) ? $service_cpt_slug2 : $service_cpt_slug ;

		// Service Category
		$service_cat_title2	= Kirki::get_option( 'service-cat-title' );
		$service_cat_title	= ( !empty($service_cat_title2) ) ? $service_cat_title2 : $service_cat_title ;

		// Service Category - singular
		$service_cat_singular_title2	= Kirki::get_option( 'service-cat-singular-title' );
		$service_cat_singular_title	= ( !empty($service_cat_singular_title2) ) ? $service_cat_singular_title2 : $service_cat_singular_title ;

		// Service Category Slug
		$service_cat_slug2	= Kirki::get_option( 'service-cat-slug' );
		$service_cat_slug	= ( !empty($service_cat_slug2) ) ? $service_cat_slug2 : $service_cat_slug ;

		// Team
		$team_cpt_title2	= Kirki::get_option( 'team-cpt-title' );
		$team_cpt_title	= ( !empty($team_cpt_title2) ) ? $team_cpt_title2 : $team_cpt_title ;

		// Team - singular
		$team_cpt_singular_title2	= Kirki::get_option( 'team-cpt-singular-title' );
		$team_cpt_singular_title	= ( !empty($team_cpt_singular_title2) ) ? $team_cpt_singular_title2 : $team_cpt_singular_title ;

		// Team Slug
		$team_cpt_slug2	= Kirki::get_option( 'team-cpt-slug' );
		$team_cpt_slug	= ( !empty($team_cpt_slug2) ) ? $team_cpt_slug2 : $team_cpt_slug ;

		// Team Group
		$team_group_title2	= Kirki::get_option( 'team-group-title' );
		$team_group_title	= ( !empty($team_group_title2) ) ? $team_group_title2 : $team_group_title ;

		// Team Group - singular
		$team_group_singular_title2	= Kirki::get_option( 'team-group-singular-title' );
		$team_group_singular_title	= ( !empty($team_group_singular_title2) ) ? $team_group_singular_title2 : $team_group_singular_title ;

		// Team Group Slug
		$team_group_slug2	= Kirki::get_option( 'team-group-slug' );
		$team_group_slug	= ( !empty($team_group_slug2) ) ? $team_group_slug2 : $team_group_slug ;

		// Testimonial
		$testimonial_cpt_title2	= Kirki::get_option( 'testimonial-cpt-title' );
		$testimonial_cpt_title	= ( !empty($testimonial_cpt_title2) ) ? $testimonial_cpt_title2 : $testimonial_cpt_title ;

		// Testimonial - singular
		$testimonial_cpt_singular_title2	= Kirki::get_option( 'testimonial-cpt-singular-title' );
		$testimonial_cpt_singular_title	= ( !empty($testimonial_cpt_singular_title2) ) ? $testimonial_cpt_singular_title2 : $testimonial_cpt_singular_title ;

		// Testimonial Category
		$testimonial_cat_title2	= Kirki::get_option( 'testimonial-cat-title' );
		$testimonial_cat_title	= ( !empty($testimonial_cat_title2) ) ? $testimonial_cat_title2 : $testimonial_cat_title ;

		// Testimonial Category - singular
		$testimonial_cat_singular_title2	= Kirki::get_option( 'testimonial-cat-singular-title' );
		$testimonial_cat_singular_title	= ( !empty($testimonial_cat_singular_title2) ) ? $testimonial_cat_singular_title2 : $testimonial_cat_singular_title ;

	}

	/**** CPT - Portfolio ****/
	$portfolio_labels = array(
		'name'               => _x( $portfolio_cpt_title, 'post type general name', 'pbm-addons' ),
		'singular_name'      => _x( $portfolio_cpt_singular_title, 'post type singular name', 'pbm-addons' ),
		'add_new_item'       => sprintf( esc_attr__( 'Add New %1$s', 'pbm-addons' ) , $portfolio_cpt_singular_title ),
		'edit_item'          => sprintf( esc_attr__( 'Edit %1$s', 'pbm-addons' ) , $portfolio_cpt_singular_title ),
		'menu_name'          => _x( $portfolio_cpt_title, 'admin menu ', 'pbm-addons' ),
		'name_admin_bar'     => _x( $portfolio_cpt_singular_title, 'add new on admin bar', 'pbm-addons' ),
		'add_new'            => esc_attr__( 'Add New', 'pbm-addons' ),
		'new_item'           => sprintf( esc_attr__( 'New %1$s', 'pbm-addons' ) , $portfolio_cpt_singular_title ),
		'view_item'          => sprintf( esc_attr__( 'View %1$s', 'pbm-addons' ) , $portfolio_cpt_singular_title ),
		'all_items'          => sprintf( esc_attr__( 'All %1$s', 'pbm-addons' ) , $portfolio_cpt_title ),
		'search_items'       => sprintf( esc_attr__( 'Search %1$s', 'pbm-addons' ) , $portfolio_cpt_title ),
		'parent_item_colon'  => sprintf( esc_attr__( 'Parent %1$s:', 'pbm-addons' ) , $portfolio_cpt_title ),
		'not_found'          => sprintf( esc_attr__( 'No %1$s found', 'pbm-addons' ) , $portfolio_cpt_title ),
		'not_found_in_trash' => sprintf( esc_attr__( 'No %1$s found in Trash.', 'pbm-addons' ) , $portfolio_cpt_title )
	);

	$portfolio_args = array(
		'labels'             => $portfolio_labels,
		'menu_icon'			=> 'dashicons-welcome-widgets-menus',
		//'description'        => __( 'Description.', 'pbm-addons' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => esc_attr($portfolio_cpt_slug) ),  // important
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields', 'revisions'  /*'excerpt'*/ )
	);

	if( get_theme_mod( 'cpt-portfolio-disable' ) != true ){
		register_post_type( 'pbmit-portfolio', $portfolio_args );
	}


	// Add new taxonomy, make it hierarchical (like categories)
	$portfolio_category_labels = array(
		'name'              => _x( $portfolio_cat_title, 'Portfolio Category general name', 'pbm-addons' ),
		'singular_name'     => _x( $portfolio_cat_singular_title, 'Portfolio Category singular name', 'pbm-addons' ),
		'search_items'      => sprintf( esc_attr__( 'Search %1$s', 'pbm-addons' ) , $portfolio_cat_title ),
		'all_items'         => sprintf( esc_attr__( 'All %1$s', 'pbm-addons' ) , $portfolio_cat_title ),
		'parent_item'       => sprintf( esc_attr__( 'Parent %1$s', 'pbm-addons' ) , $portfolio_cat_singular_title ),
		'parent_item_colon' => sprintf( esc_attr__( 'Parent %1$s:', 'pbm-addons' ) , $portfolio_cat_singular_title ),
		'edit_item'         => sprintf( esc_attr__( 'Edit %1$s', 'pbm-addons' ) , $portfolio_cat_singular_title ),
		'update_item'       => sprintf( esc_attr__( 'Update %1$s', 'pbm-addons' ) , $portfolio_cat_singular_title ),
		'add_new_item'      => sprintf( esc_attr__( 'Add New %1$s', 'pbm-addons' ) , $portfolio_cat_singular_title ),
		'new_item_name'     => sprintf( esc_attr__( 'New %1$s Name', 'pbm-addons' ) , $portfolio_cat_singular_title ),
		'menu_name'         => $portfolio_cat_singular_title,
	);

	$portfolio_category_args = array(
		'hierarchical'      => true,
		'labels'            => $portfolio_category_labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => esc_attr($portfolio_cat_slug) ),
	);
	if( get_theme_mod( 'cpt-portfolio-disable' ) != true ){
		register_taxonomy( 'pbmit-portfolio-category', array( 'pbmit-portfolio' ), $portfolio_category_args );
	}

	/**** CPT - Service ****/
	$service_labels = array(
		'name'               => _x( $service_cpt_title, 'post type general name', 'pbm-addons' ),
		'singular_name'      => _x( $service_cpt_singular_title, 'post type singular name', 'pbm-addons' ),
		'add_new_item'       => sprintf( esc_attr__( 'Add New %1$s', 'pbm-addons' ) , $service_cpt_singular_title ),
		'edit_item'          => sprintf( esc_attr__( 'Edit %1$s', 'pbm-addons' ) , $service_cpt_singular_title ),
		'menu_name'          => _x( $service_cpt_title, 'admin menu ', 'pbm-addons' ),
		'name_admin_bar'     => _x( $service_cpt_singular_title, 'add new on admin bar', 'pbm-addons' ),
		'add_new'            => esc_attr__( 'Add New', 'pbm-addons' ),
		'new_item'           => sprintf( esc_attr__( 'New %1$s', 'pbm-addons' ) , $service_cpt_singular_title ),
		'view_item'          => sprintf( esc_attr__( 'View %1$s', 'pbm-addons' ) , $service_cpt_singular_title ),
		'all_items'          => sprintf( esc_attr__( 'All %1$s', 'pbm-addons' ) , $service_cpt_title ),
		'search_items'       => sprintf( esc_attr__( 'Search %1$s', 'pbm-addons' ) , $service_cpt_title ),
		'parent_item_colon'  => sprintf( esc_attr__( 'Parent %1$s:', 'pbm-addons' ) , $service_cpt_title ),
		'not_found'          => sprintf( esc_attr__( 'No %1$s found', 'pbm-addons' ) , $service_cpt_title ),
		'not_found_in_trash' => sprintf( esc_attr__( 'No %1$s found in Trash.', 'pbm-addons' ) , $service_cpt_title )
	);

	$service_args = array(
		'labels'             => $service_labels,
		'menu_icon'			=> 'dashicons-analytics',
		//'description'        => __( 'Description.', 'pbm-addons' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => esc_attr($service_cpt_slug) ),  // important
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields', 'revisions'  /*'excerpt'*/ )
	);
	if( get_theme_mod( 'cpt-service-disable' ) != true ){
		register_post_type( 'pbmit-service', $service_args );
	}

	// Add new taxonomy, make it hierarchical (like categories)
	$service_category_labels = array(
		'name'              => _x( $service_cat_title, 'Service Category general name', 'pbm-addons' ),
		'singular_name'     => _x( $service_cat_singular_title, 'Service Category singular name', 'pbm-addons' ),
		'search_items'      => sprintf( esc_attr__( 'Search %1$s', 'pbm-addons' ) , $service_cat_title ),
		'all_items'         => sprintf( esc_attr__( 'All %1$s', 'pbm-addons' ) , $service_cat_title ),
		'parent_item'       => sprintf( esc_attr__( 'Parent %1$s', 'pbm-addons' ) , $service_cat_singular_title ),
		'parent_item_colon' => sprintf( esc_attr__( 'Parent %1$s:', 'pbm-addons' ) , $service_cat_singular_title ),
		'edit_item'         => sprintf( esc_attr__( 'Edit %1$s', 'pbm-addons' ) , $service_cat_singular_title ),
		'update_item'       => sprintf( esc_attr__( 'Update %1$s', 'pbm-addons' ) , $service_cat_singular_title ),
		'add_new_item'      => sprintf( esc_attr__( 'Add New %1$s', 'pbm-addons' ) , $service_cat_singular_title ),
		'new_item_name'     => sprintf( esc_attr__( 'New %1$s Name', 'pbm-addons' ) , $service_cat_singular_title ),
		'menu_name'         => $service_cat_singular_title,
	);

	$service_category_args = array(
		'hierarchical'      => true,
		'labels'            => $service_category_labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => esc_attr($service_cat_slug) ),
	);
	if( get_theme_mod( 'cpt-service-disable' ) != true ){
		register_taxonomy( 'pbmit-service-category', array( 'pbmit-service' ), $service_category_args );
	}

	/**** CPT - Team Member ****/
	$team_members_labels = array(
		'name'               => _x( $team_cpt_title, 'post type general name', 'pbm-addons' ),
		'singular_name'      => _x( $team_cpt_singular_title, 'post type singular name', 'pbm-addons' ),
		'add_new_item'       => sprintf( esc_attr__( 'Add New %1$s', 'pbm-addons' ) , $team_cpt_singular_title ),
		'edit_item'          => sprintf( esc_attr__( 'Edit %1$s', 'pbm-addons' ) , $team_cpt_singular_title ),
		'menu_name'          => _x( $team_cpt_title, 'admin menu ', 'pbm-addons' ),
		'name_admin_bar'     => _x( $team_cpt_singular_title, 'add new on admin bar', 'pbm-addons' ),
		'add_new'            => esc_attr__( 'Add New', 'pbm-addons' ),
		'new_item'           => sprintf( esc_attr__( 'New %1$s', 'pbm-addons' ) , $team_cpt_singular_title ),
		'view_item'          => sprintf( esc_attr__( 'View %1$s', 'pbm-addons' ) , $team_cpt_singular_title ),
		'all_items'          => sprintf( esc_attr__( 'All %1$s', 'pbm-addons' ) , $team_cpt_title ),
		'search_items'       => sprintf( esc_attr__( 'Search %1$s', 'pbm-addons' ) , $team_cpt_title ),
		'parent_item_colon'  => sprintf( esc_attr__( 'Parent %1$s:', 'pbm-addons' ) , $team_cpt_title ),
		'not_found'          => sprintf( esc_attr__( 'No %1$s found', 'pbm-addons' ) , $team_cpt_title ),
		'not_found_in_trash' => sprintf( esc_attr__( 'No %1$s found in Trash.', 'pbm-addons' ) , $team_cpt_title )
	);

	$team_members_args = array(
		'labels'             => $team_members_labels,
		'menu_icon'			=> 'dashicons-id',
		//'description'        => __( 'Description.', 'pbm-addons' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => esc_attr($team_cpt_slug) ),  // important
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'thumbnail', /* 'excerpt' */ )
	);
	if( get_theme_mod( 'cpt-team-disable' ) != true ){
		register_post_type( 'pbmit-team-member', $team_members_args );
	}

	// Add new taxonomy, make it hierarchical (like categories)
	$team_member_group_labels = array(
		'name'              => _x( $team_group_title, 'Team Group general name', 'pbm-addons' ),
		'singular_name'     => _x( $team_group_singular_title, 'Team Group singular name', 'pbm-addons' ),
		'search_items'      => sprintf( esc_attr__( 'Search %1$s', 'pbm-addons' ) , $team_group_title ),
		'all_items'         => sprintf( esc_attr__( 'All %1$s', 'pbm-addons' ) , $team_group_title ),
		'parent_item'       => sprintf( esc_attr__( 'Parent %1$s', 'pbm-addons' ) , $team_group_singular_title ),
		'parent_item_colon' => sprintf( esc_attr__( 'Parent %1$s:', 'pbm-addons' ) , $team_group_singular_title ),
		'edit_item'         => sprintf( esc_attr__( 'Edit %1$s', 'pbm-addons' ) , $team_group_singular_title ),
		'update_item'       => sprintf( esc_attr__( 'Update %1$s', 'pbm-addons' ) , $team_group_singular_title ),
		'add_new_item'      => sprintf( esc_attr__( 'Add New %1$s', 'pbm-addons' ) , $team_group_singular_title ),
		'new_item_name'     => sprintf( esc_attr__( 'New %1$s Name', 'pbm-addons' ) , $team_group_singular_title ),
		'menu_name'         => $team_group_singular_title,
	);

	$team_member_group_args = array(
		'hierarchical'      => true,
		'labels'            => $team_member_group_labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => esc_attr($team_group_slug) ),
	);
	if( get_theme_mod( 'cpt-team-disable' ) != true ){
		register_taxonomy( 'pbmit-team-group', array( 'pbmit-team-member' ), $team_member_group_args );
	}

	/**** CPT - Testimonials ****/
	$testimonial_labels = array(
		'name'               => _x( $testimonial_cpt_title, 'post type general name', 'pbm-addons' ),
		'singular_name'      => _x( $testimonial_cpt_singular_title, 'post type singular name', 'pbm-addons' ),
		'add_new_item'       => sprintf( esc_attr__( 'Add New %1$s', 'pbm-addons' ) , $testimonial_cpt_singular_title ),
		'edit_item'          => sprintf( esc_attr__( 'Edit %1$s', 'pbm-addons' ) , $testimonial_cpt_singular_title ),
		'menu_name'          => _x( $testimonial_cpt_title, 'admin menu ', 'pbm-addons' ),
		'name_admin_bar'     => _x( $testimonial_cpt_singular_title, 'add new on admin bar', 'pbm-addons' ),
		'add_new'            => esc_attr__( 'Add New', 'pbm-addons' ),
		'new_item'           => sprintf( esc_attr__( 'New %1$s', 'pbm-addons' ) , $testimonial_cpt_singular_title ),
		'view_item'          => sprintf( esc_attr__( 'View %1$s', 'pbm-addons' ) , $testimonial_cpt_singular_title ),
		'all_items'          => sprintf( esc_attr__( 'All %1$s', 'pbm-addons' ) , $testimonial_cpt_title ),
		'search_items'       => sprintf( esc_attr__( 'Search %1$s', 'pbm-addons' ) , $testimonial_cpt_title ),
		'parent_item_colon'  => sprintf( esc_attr__( 'Parent %1$s:', 'pbm-addons' ) , $testimonial_cpt_title ),
		'not_found'          => sprintf( esc_attr__( 'No %1$s found', 'pbm-addons' ) , $testimonial_cpt_title ),
		'not_found_in_trash' => sprintf( esc_attr__( 'No %1$s found in Trash.', 'pbm-addons' ) , $testimonial_cpt_title ),
		'featured_image'		=> sprintf( esc_attr__( '%1$s writer\'s image/logo', 'pbm-addons' ) , $testimonial_cpt_singular_title ),
		'set_featured_image'	=> esc_attr__( 'Set image/logo', 'pbm-addons' ),
		'remove_featured_image'	=> esc_attr__( 'Remove image/logo', 'pbm-addons' ),
		'use_featured_image'	=> sprintf( esc_attr__( 'Use as %1$s writer\'s image/logo', 'pbm-addons' ) , $testimonial_cpt_singular_title ),

	);

	$testimonial_args = array(
		'labels'             => $testimonial_labels,
		'menu_icon'			=> 'dashicons-testimonial',
		'public'             => false,
		'publicly_queryable' => false,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => esc_attr($testimonial_cpt_slug) ),  // important
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'thumbnail' )
	);
	if( get_theme_mod( 'cpt-testimonial-disable' ) != true ){
		register_post_type( 'pbmit-testimonial', $testimonial_args );
	}

	// Add new taxonomy, make it hierarchical (like categories)
	$testimonial_cat_labels = array(
		'name'              => _x( $testimonial_cat_title, 'Team Group general name', 'pbm-addons' ),
		'singular_name'     => _x( $testimonial_cat_singular_title, 'Team Group singular name', 'pbm-addons' ),
		'search_items'      => sprintf( esc_attr__( 'Search %1$s', 'pbm-addons' ) , $testimonial_cat_title ),
		'all_items'         => sprintf( esc_attr__( 'All %1$s', 'pbm-addons' ) , $testimonial_cat_title ),
		'parent_item'       => sprintf( esc_attr__( 'Parent %1$s', 'pbm-addons' ) , $testimonial_cat_singular_title ),
		'parent_item_colon' => sprintf( esc_attr__( 'Parent %1$s:', 'pbm-addons' ) , $testimonial_cat_singular_title ),
		'edit_item'         => sprintf( esc_attr__( 'Edit %1$s', 'pbm-addons' ) , $testimonial_cat_singular_title ),
		'update_item'       => sprintf( esc_attr__( 'Update %1$s', 'pbm-addons' ) , $testimonial_cat_singular_title ),
		'add_new_item'      => sprintf( esc_attr__( 'Add New %1$s', 'pbm-addons' ) , $testimonial_cat_singular_title ),
		'new_item_name'     => sprintf( esc_attr__( 'New %1$s Name', 'pbm-addons' ) , $testimonial_cat_singular_title ),
		'menu_name'         => $testimonial_cat_singular_title,
	);

	$testimonial_cat_args = array(
		'hierarchical'      => false,
		'public'		    => false,
		'labels'            => $testimonial_cat_labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => esc_attr($testimonial_cat_slug) ),
	);
	if( get_theme_mod( 'cpt-testimonial-disable' ) != true ){
		register_taxonomy( 'pbmit-testimonial-cat', array( 'pbmit-testimonial' ), $testimonial_cat_args );
	}


	// CPT - Clients
	$clients_labels = array(
		'name'					=> _x( 'Clients', 'post type general name', 'pbm-addons' ),
		'singular_name'			=> _x( 'Client', 'post type singular name', 'pbm-addons' ),
		'add_new_item'			=> esc_attr__( 'Add New Client', 'pbm-addons' ),
		'featured_image'		=> esc_attr__( 'Client Logo', 'pbm-addons' ),
		'set_featured_image'	=> esc_attr__( 'Set Client Logo', 'pbm-addons' ),
		'remove_featured_image'	=> esc_attr__( 'Remove Client Logo', 'pbm-addons' ),
		'use_featured_image'	=> esc_attr__( 'Use as Client Logo', 'pbm-addons' ),
	);

	$clients_args = array(
		'labels'             => $clients_labels,
		'menu_icon'			=> 'dashicons-grid-view',
		'public'             => false,
		'publicly_queryable' => false,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'client' ),  // important
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'thumbnail' )
	);
	if( get_theme_mod( 'cpt-client-disable' ) != true ){
		register_post_type( 'pbmit-client', $clients_args );
	}


	// Add new taxonomy, make it hierarchical (like categories)
	$client_group_labels = array(
		'name'              => _x( 'Client Groups', 'Client Group general name', 'pbm-addons' ),
		'singular_name'     => _x( 'Client Group', 'Client Group singular name', 'pbm-addons' ),
		'search_items'      => __( 'Search Client Groups', 'pbm-addons' ),
		'all_items'         => __( 'All Client Groups', 'pbm-addons' ),
		'parent_item'       => __( 'Parent Client Group', 'pbm-addons' ),
		'parent_item_colon' => __( 'Parent Client Group:', 'pbm-addons' ),
		'edit_item'         => __( 'Edit Client Group', 'pbm-addons' ),
		'update_item'       => __( 'Update Client Group', 'pbm-addons' ),
		'add_new_item'      => __( 'Add New Client Group', 'pbm-addons' ),
		'new_item_name'     => __( 'New Client Group Name', 'pbm-addons' ),
		'menu_name'         => __( 'Client Group', 'pbm-addons' ),
	);

	$client_group_args = array(
		'hierarchical'      => false,
		'public'		    => false,
		'labels'            => $client_group_labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'pbmit-client-group' ),
	);
	if( get_theme_mod( 'cpt-client-disable' ) != true ){
		register_taxonomy( 'pbmit-client-group', array( 'pbmit-client' ), $client_group_args );
	}

	// Move feature image box below title
	add_action('do_meta_boxes', 'pbm_addons_client_image_box');
	function pbm_addons_client_image_box() {
		remove_meta_box( 'postimagediv', 'pbmit-client', 'side' );
		add_meta_box('postimagediv', esc_attr__('Select Client Logo', 'pbm-addons'), 'post_thumbnail_meta_box', 'pbmit-client', 'normal', 'high');
	}


	// Show featured image column
	add_filter( 'manage_posts_columns', 'pbm_addons_set_featured_image_column' );
	add_action( 'manage_posts_custom_column' , 'pbm_addons_set_featured_image_column_thumbnails', 10, 2 );
	if ( ! function_exists( 'pbm_addons_set_featured_image_column' ) ) {
	function pbm_addons_set_featured_image_column( $columns ) {
		$new_columns = array();
		foreach( $columns as $key=>$val ){
			$new_columns[$key] = $val;
			if( $key=='title' ){
				$new_columns['pbminfotech_featured_image'] = esc_attr__( 'Featured Image', 'pbm-addons' );
			}
		}
		return $new_columns;
	}
	}
	if ( ! function_exists( 'pbm_addons_set_featured_image_column_thumbnails' ) ) {
	function pbm_addons_set_featured_image_column_thumbnails( $column, $post_id ) {
		if( $column == 'pbminfotech_featured_image' ){
			echo '<a href="'. get_permalink($post_id) .'">';
			if ( has_post_thumbnail($post_id) ) {
				the_post_thumbnail('thumbnail');
			} else {
				echo '<img src="' . PBM_ADDON_URL . 'images/no-img-150x150.png" />';
			}
			echo '</a>';
		}

	}
	}

	// Change title input placeholder
	if( !function_exists('pbm_addons_change_title_text') ){
	function pbm_addons_change_title_text( $title ){
		$screen = get_current_screen();

		$team_cpt_singular_title		= esc_attr__('Team Member','pbm-addons');
		if( class_exists('Kirki') ){

			$team_cpt_singular_title2	= Kirki::get_option( 'team-cpt-singular-title' );
			$team_cpt_singular_title	= ( !empty($team_cpt_singular_title2) ) ? $team_cpt_singular_title2 : $team_cpt_singular_title ;
		}

		if( 'pbmit-testimonial' == $screen->post_type ){
			$title = esc_attr__('Enter writer name here', 'pbm-addons');
		} else if( 'pbmit-team-member' == $screen->post_type ){
			$title = sprintf( esc_attr__('Enter %1$s name here', 'pbm-addons') , $team_cpt_singular_title );
		} else if( 'pbmit-client' == $screen->post_type ){
			$title = esc_attr__('Enter Client/Company name here', 'pbm-addons');
		}
		return $title;
	}
	}
	add_filter( 'enter_title_here', 'pbm_addons_change_title_text' );

}
}
add_action( 'init', 'pbm_addons_register_post_types', 1 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

if( !function_exists('pbm_addons_widget_positions_init') ){
function pbm_addons_widget_positions_init() {

	if( !empty(PBM_ADDON_THEME_BY_PBM) ){

		// Default titles
		$portfolio_cpt_singular_title	= esc_attr__('Portfolio','pbm-addons');
		$portfolio_cat_singular_title	= esc_attr__('Portfolio Category','pbm-addons');
		$service_cpt_singular_title		= esc_attr__('Service','pbm-addons');
		$service_cat_singular_title		= esc_attr__('Service Category','pbm-addons');
		$team_cpt_singular_title		= esc_attr__('Team Member','pbm-addons');
		$team_group_singular_title		= esc_attr__('Team Group','pbm-addons');
		$coaching_cpt_singular_title	= esc_attr__('Coaching','pbm-addons');
		$coaching_cat_singular_title	= esc_attr__('Coaching Category','pbm-addons');
		$treatment_cpt_singular_title	= esc_attr__('Treatment','pbm-addons');
		$treatment_cat_singular_title	= esc_attr__('Treatment Category','pbm-addons');



		if( function_exists('pbmit_get_base_option') ){

			// Portfolio - singular
			$portfolio_cpt_singular_title2	= pbmit_get_base_option( 'portfolio-cpt-singular-title' );
			$portfolio_cpt_singular_title	= ( !empty($portfolio_cpt_singular_title2) ) ? $portfolio_cpt_singular_title2 : $portfolio_cpt_singular_title ;

			// Portfolio Category - singular
			$portfolio_cat_singular_title2	= pbmit_get_base_option( 'portfolio-cat-singular-title' );
			$portfolio_cat_singular_title	= ( !empty($portfolio_cat_singular_title2) ) ? $portfolio_cat_singular_title2 : $portfolio_cat_singular_title ;

			// Service - singular
			$service_cpt_singular_title2	= pbmit_get_base_option( 'service-cpt-singular-title' );
			$service_cpt_singular_title	= ( !empty($service_cpt_singular_title2) ) ? $service_cpt_singular_title2 : $service_cpt_singular_title ;

			// Portfolio Category - singular
			$service_cat_singular_title2	= pbmit_get_base_option( 'service-cat-singular-title' );
			$service_cat_singular_title	= ( !empty($service_cat_singular_title2) ) ? $service_cat_singular_title2 : $service_cat_singular_title ;

			// Team - singular
			$team_cpt_singular_title2	= pbmit_get_base_option( 'team-cpt-singular-title' );
			$team_cpt_singular_title	= ( !empty($team_cpt_singular_title2) ) ? $team_cpt_singular_title2 : $team_cpt_singular_title ;

			// Team Group - singular
			$team_group_singular_title2	= pbmit_get_base_option( 'team-group-singular-title' );
			$team_group_singular_title	= ( !empty($team_group_singular_title2) ) ? $team_group_singular_title2 : $team_group_singular_title ;

			if( defined('PBMIT_COACHING_CPT_ACTIVE') ){
				// Coaching - singular
				$coaching_cpt_singular_title2	= pbmit_get_base_option( 'coaching-cpt-singular-title' );
				$coaching_cpt_singular_title	= ( !empty($coaching_cpt_singular_title2) ) ? $coaching_cpt_singular_title2 : $coaching_cpt_singular_title ;
	
				// Coaching Category - singular
				$coaching_cat_singular_title2	= pbmit_get_base_option( 'coaching-cat-singular-title' );
				$coaching_cat_singular_title	= ( !empty($coaching_cat_singular_title2) ) ? $coaching_cat_singular_title2 : $coaching_cat_singular_title ;
			}

			if( defined('PBMIT_TREATMENT_CPT_ACTIVE') ){
				// Coaching - singular
				$treatment_cpt_singular_title2	= pbmit_get_base_option( 'treatment-cpt-singular-title' );
				$treatment_cpt_singular_title	= ( !empty($treatment_cpt_singular_title2) ) ? $treatment_cpt_singular_title2 : $treatment_cpt_singular_title ;
	
				// Coaching Category - singular
				$treatment_cat_singular_title2	= pbmit_get_base_option( 'treatment-cat-singular-title' );
				$treatment_cat_singular_title	= ( !empty($treatment_cat_singular_title2) ) ? $treatment_cat_singular_title2 : $treatment_cat_singular_title ;
			}

		}

		register_sidebar( array(
			'name'          => esc_attr__( 'Blog Sidebar', 'pbm-addons' ),
			'id'            => 'pbmit-sidebar-post',
			'description'   => esc_attr__( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'pbm-addons' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h2 class="widget-title"><span>',
			'after_title'   => '</span></h2>',
		) );
		register_sidebar( array(
			'name'          => esc_attr__( 'Page Sidebar', 'pbm-addons' ),
			'id'            => 'pbmit-sidebar-page',
			'description'   => esc_attr__( 'Add widgets here to appear in your sidebar on pages.', 'pbm-addons' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );
		register_sidebar( array(
			'name'          => esc_attr__( 'Search Results Sidebar', 'pbm-addons' ),
			'id'            => 'pbmit-sidebar-search',
			'description'   => esc_attr__( 'Add widgets here to appear on search result pages.', 'pbm-addons' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );

		register_sidebar( array(
			'name'          => sprintf( esc_attr__( '%1$s Sidebar', 'pbm-addons' ) , $portfolio_cpt_singular_title ),
			'id'            => 'pbmit-sidebar-portfolio',
			'description'   => sprintf( esc_attr__( 'Add widgets for %1$s Sidebar', 'pbm-addons' ) , $portfolio_cpt_singular_title ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );

		register_sidebar( array(
			'name'          => sprintf( esc_attr__( '%1$s Sidebar', 'pbm-addons' ) , $portfolio_cat_singular_title ),
			'id'            => 'pbmit-sidebar-portfolio-cat',
			'description'   => sprintf( esc_attr__( 'Add widgets for %1$s Sidebar', 'pbm-addons' ) , $portfolio_cat_singular_title ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );

		register_sidebar( array(
			'name'          => sprintf( esc_attr__( '%1$s Sidebar', 'pbm-addons' ) , $service_cpt_singular_title ),
			'id'            => 'pbmit-sidebar-service',
			'description'   => sprintf( esc_attr__( 'Add widgets for %1$s Sidebar', 'pbm-addons' ) , $service_cpt_singular_title ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );

		register_sidebar( array(
			'name'          => sprintf( esc_attr__( '%1$s Sidebar', 'pbm-addons' ) , $service_cat_singular_title ),
			'id'            => 'pbmit-sidebar-service-cat',
			'description'   => sprintf( esc_attr__( 'Add widgets for %1$s Sidebar', 'pbm-addons' ) , $service_cat_singular_title ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );

		register_sidebar( array(
			'name'          => __( 'Team Member Sidebar', 'pbm-addons' ),
			'name'          => sprintf( esc_attr__( '%1$s Sidebar', 'pbm-addons' ) , $team_cpt_singular_title ),
			'id'            => 'pbmit-sidebar-team',
			'description'   => sprintf( esc_attr__( 'Add widgets for %1$s Sidebar', 'pbm-addons' ) , $team_cpt_singular_title ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );

		register_sidebar( array(
			'name'          => sprintf( esc_attr__( '%1$s Sidebar', 'pbm-addons' ) , $team_group_singular_title ),
			'id'            => 'pbmit-sidebar-team-group',
			'description'   => sprintf( esc_attr__( 'Add widgets for %1$s Sidebar', 'pbm-addons' ) , $team_group_singular_title ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );

		if( defined('PBMIT_COACHING_CPT_ACTIVE') ){
			register_sidebar( array(
				'name'          => sprintf( esc_attr__( '%1$s Sidebar', 'pbm-addons' ) , $coaching_cpt_singular_title ),
				'id'            => 'pbmit-sidebar-coaching',
				'description'   => sprintf( esc_attr__( 'Add widgets for %1$s Sidebar', 'pbm-addons' ) , $coaching_cpt_singular_title ),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			) );
			register_sidebar( array(
				'name'          => sprintf( esc_attr__( '%1$s Sidebar', 'pbm-addons' ) , $coaching_cat_singular_title ),
				'id'            => 'pbmit-sidebar-coaching-cat',
				'description'   => sprintf( esc_attr__( 'Add widgets for %1$s Sidebar', 'pbm-addons' ) , $coaching_cat_singular_title ),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			) );
		}
		
		if( defined('PBMIT_TREATMENT_CPT_ACTIVE') ){
			register_sidebar( array(
				'name'          => sprintf( esc_attr__( '%1$s Sidebar', 'pbm-addons' ) , $treatment_cpt_singular_title ),
				'id'            => 'pbmit-sidebar-treatment',
				'description'   => sprintf( esc_attr__( 'Add widgets for %1$s Sidebar', 'pbm-addons' ) , $treatment_cpt_singular_title ),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			) );
			register_sidebar( array(
				'name'          => sprintf( esc_attr__( '%1$s Sidebar', 'pbm-addons' ) , $treatment_cat_singular_title ),
				'id'            => 'pbmit-sidebar-treatment-cat',
				'description'   => sprintf( esc_attr__( 'Add widgets for %1$s Sidebar', 'pbm-addons' ) , $treatment_cat_singular_title ),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			) );
		}

		if( function_exists('is_woocommerce') ){
			register_sidebar( array(
				'name'			=> esc_html__( 'WooCommerce - Shop Page', 'pbm-addons' ),
				'id'			=> 'pbmit-sidebar-wc-shop',
				'description'	=> esc_html__( 'Widgets for WooCommerce shop (product listing) page.', 'pbm-addons' ),
				'before_widget'	=> '<aside id="%1$s" class="widget %2$s">',
				'after_widget'	=> '</aside>',
				'before_title'	=> '<h3 class="widget-title">',
				'after_title'	=> '</h3>',
			) );
			register_sidebar( array(
				'name'			=> esc_html__( 'WooCommerce - Single Product Page', 'pbm-addons' ),
				'id'			=> 'pbmit-sidebar-wc-single',
				'description'	=> esc_html__( 'Widgets for WooCommerce single product page.', 'pbm-addons' ),
				'before_widget'	=> '<aside id="%1$s" class="widget %2$s">',
				'after_widget'	=> '</aside>',
				'before_title'	=> '<h3 class="widget-title">',
				'after_title'	=> '</h3>',
			) );
		}

		if( class_exists('WP_Event_Manager') ){
			register_sidebar( array(
				'name'			=> esc_html__( 'Events - Event Section Slidebar', 'pbm-addons' ),
				'id'			=> 'pbmit-sidebar-event',
				'description'	=> esc_html__( 'Widgets for Event secion pages.', 'pbm-addons' ),
				'before_widget'	=> '<aside id="%1$s" class="widget %2$s">',
				'after_widget'	=> '</aside>',
				'before_title'	=> '<h3 class="widget-title">',
				'after_title'	=> '</h3>',
			) );
			register_sidebar( array(
				'name'			=> esc_html__( 'Events - Single Event Slidebar', 'pbm-addons' ),
				'id'			=> 'pbmit-sidebar-event-single',
				'description'	=> esc_html__( 'Widgets for Event single page.', 'pbm-addons' ),
				'before_widget'	=> '<aside id="%1$s" class="widget %2$s">',
				'after_widget'	=> '</aside>',
				'before_title'	=> '<h3 class="widget-title">',
				'after_title'	=> '</h3>',
			) );
		}

		register_sidebar( array(
			'name'          => esc_attr__( 'Footer Row - 1st Column', 'pbm-addons' ),
			'id'            => 'pbmit-footer-1',
			'description'   => esc_attr__( 'Add widgets here to appear in your footer.', 'pbm-addons' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );
		register_sidebar( array(
			'name'          => esc_attr__( 'Footer Row - 2nd Column', 'pbm-addons' ),
			'id'            => 'pbmit-footer-2',
			'description'   => esc_attr__( 'Add widgets here to appear in your footer.', 'pbm-addons' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );
		register_sidebar( array(
			'name'          => esc_attr__( 'Footer Row - 3rd Column', 'pbm-addons' ),
			'id'            => 'pbmit-footer-3',
			'description'   => esc_attr__( 'Add widgets here to appear in your footer.', 'pbm-addons' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );
		register_sidebar( array(
			'name'          => esc_attr__( 'Footer Row - 4th Column', 'pbm-addons' ),
			'id'            => 'pbmit-footer-4',
			'description'   => esc_attr__( 'Add widgets here to appear in your footer.', 'pbm-addons' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );
		if( defined( 'PBMIT_FLOATING_WIDGET_ACTIVE' ) ){
			register_sidebar( array(
				'name'			=> esc_attr__( 'Floting Bar Widget Area', 'pbm-addons' ),
				'id'			=> 'pbmit-floting-bar',
				'description'	=> esc_attr__( 'Add widgets here to appear in your header floting bar.', 'pbm-addons' ),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'	=> '</aside>',
				'before_title'	=> '<h2 class="widget-title">',
				'after_title'	=> '</h2>',
			) );
		}
	}

}
}
add_action( 'widgets_init', 'pbm_addons_widget_positions_init' );

/**
 *  Add CSS / JS / Tracking code in head
 */
if( !function_exists('pbm_addons_custom_code') ){
function pbm_addons_custom_code(){
	$tracking_code	= pbmit_get_base_option('tracking-code');
	$css_code		= pbmit_get_base_option('css-code');
	$css_code		= htmlspecialchars_decode($css_code);
	$css_code		= html_entity_decode($css_code, ENT_QUOTES);

	$js_code		= pbmit_get_base_option('js-code');
	$js_code		= htmlspecialchars_decode($js_code);
	$js_code		= html_entity_decode($js_code, ENT_QUOTES);

	// Tracking code
	echo $tracking_code;

	// CSS Code
	if( !empty($css_code) ){
		echo '<style>'.$css_code.'</style>';
	}

	// JS Code
	if( !empty($js_code) ){
		echo '<script>'.$js_code.'</script>';
	}

}
}
add_action( 'wp_head', 'pbm_addons_custom_code' );

// CSS Minifier => http://ideone.com/Q5USEF + improvement(s)
if( !function_exists('pbm_addons_minify_css') ){
function pbm_addons_minify_css($input) {
    if(trim($input) === "") return $input;
    return preg_replace(
        array(
            // Remove comment(s)
            '#("(?:[^"\\\]++|\\\.)*+"|\'(?:[^\'\\\\]++|\\\.)*+\')|\/\*(?!\!)(?>.*?\*\/)|^\s*|\s*$#s',
            // Remove unused white-space(s)
            '#("(?:[^"\\\]++|\\\.)*+"|\'(?:[^\'\\\\]++|\\\.)*+\'|\/\*(?>.*?\*\/))|\s*+;\s*+(})\s*+|\s*+([*$~^|]?+=|[{};,>~+]|\s*+-(?![0-9\.])|!important\b)\s*+|([[(:])\s++|\s++([])])|\s++(:)\s*+(?!(?>[^{}"\']++|"(?:[^"\\\]++|\\\.)*+"|\'(?:[^\'\\\\]++|\\\.)*+\')*+{)|^\s++|\s++\z|(\s)\s+#si',
            // Replace `0(cm|em|ex|in|mm|pc|pt|px|vh|vw|%)` with `0`
            '#(?<=[\s:])(0)(cm|em|ex|in|mm|pc|pt|px|vh|vw|%)#si',
            // Replace `:0 0 0 0` with `:0`
            '#:(0\s+0|0\s+0\s+0\s+0)(?=[;\}]|\!important)#i',
            // Replace `background-position:0` with `background-position:0 0`
            '#(background-position):0(?=[;\}])#si',
            // Replace `0.6` with `.6`, but only when preceded by `:`, `,`, `-` or a white-space
            '#(?<=[\s:,\-])0+\.(\d+)#s',
            // Minify string value
            '#(\/\*(?>.*?\*\/))|(?<!content\:)([\'"])([a-z_][a-z0-9\-_]*?)\2(?=[\s\{\}\];,])#si',
            '#(\/\*(?>.*?\*\/))|(\burl\()([\'"])([^\s]+?)\3(\))#si',
            // Minify HEX color code
            '#(?<=[\s:,\-]\#)([a-f0-6]+)\1([a-f0-6]+)\2([a-f0-6]+)\3#i',
            // Replace `(border|outline):none` with `(border|outline):0`
            '#(?<=[\{;])(border|outline):none(?=[;\}\!])#',
            // Remove empty selector(s)
            '#(\/\*(?>.*?\*\/))|(^|[\{\}])(?:[^\s\{\}]+)\{\}#s'
        ),
        array(
            '$1',
            '$1$2$3$4$5$6$7',
            '$1',
            ':0',
            '$1:0 0',
            '.$1',
            '$1$3',
            '$1$2$4$5',
            '$1$2$3',
            '$1:0',
            '$1$2'
        ),
    $input);
}
}


if( !function_exists('pbm_addons_activation_hook') ){
function pbm_addons_activation_hook() {
	update_option('revslider-templates-check', time());
	update_option('kirki_telemetry_no_consent', '1');
}
}
register_activation_hook( __FILE__ , 'pbm_addons_activation_hook' );

/**
 * Show TGMPA plugin update message after theme update
 */
if( !function_exists('pbm_addons_tgmpa_message') ){
function pbm_addons_tgmpa_message(){
	if( defined(PBM_ADDON_THEME_BY_PBM) ){
		// Enable TGMPA update message
		$theme_name				= get_template();
		$theme_data				= wp_get_theme( $theme_name );
		$theme_version			= $theme_data->get( 'Version' );
		$stored_theme_version	= get_option('pbmit_theme_version');
		$user_id				= get_current_user_id();
		if( $theme_version != $stored_theme_version ){
			delete_user_meta( $user_id, 'tgmpa_dismissed_notice_tgmpa' );
			delete_user_meta( $user_id, 'tgmpa_dismissed_notice_' . PBM_ADDON_THEME_BY_PBM );
			update_option( 'pbmit_theme_version', $theme_version );
		}
	}
}
}
add_action( 'admin_init', 'pbm_addons_tgmpa_message', 1 );

/**
 * Clear Elementor cache
 */
if( !function_exists('pbm_addons_clear_elementor_cache') ){
function pbm_addons_clear_elementor_cache(){
	update_option( 'elementor_css_print_method', 'external' );
	$folder = WP_CONTENT_DIR. 'uploads/elementor/css';
	if( file_exists($folder) && is_dir($folder) ){
		foreach ( glob( $folder ) as $file_path ) {
			unlink( $file_path );
		}
	}
}
}




/**
 *  Dynamic Style Code
 */
if( !function_exists('pbm_addons_auto_css') ){
function pbm_addons_auto_css() {
	header("Content-Type: text/css");
	ob_start();
	include get_template_directory().'/css/theme-style.php'; // Fetching theme-style.php output and store in a variable
	$css    = ob_get_clean();

	// Minify
	if( defined('WP_DEBUG') && true === WP_DEBUG ){
		echo $css;
	} else {
		if( function_exists('pbm_addons_minify_css') ){
			echo pbm_addons_minify_css( $css );
		} else {
			echo $css;
		}
	}
	exit;
}
}
add_action('wp_ajax_pbm_addons_auto_css', 'pbm_addons_auto_css');
add_action('wp_ajax_nopriv_pbm_addons_auto_css', 'pbm_addons_auto_css');

/**
 * Disable kirki plugin if enabled
 */

if( !function_exists('pbm_disable_kirki_plugin') ){
function pbm_disable_kirki_plugin(){
	$check_status = get_option('pbm-kirki-disabled-once');
	if( $check_status != 'yes' ){
		deactivate_plugins( '/kirki/kirki.php' );
		update_option('pbm-kirki-disabled-once', 'yes');
	}
}
}
add_action( 'admin_init', 'pbm_disable_kirki_plugin' );
add_action( 'init', 'pbm_disable_kirki_plugin' );

// Remove extra inline css from page
/*
remove_filter( 'render_block', 'wp_render_layout_support_flag', 10, 2 );
add_filter( 'render_block', function( $block_content, $block ) {
	if ( $block['blockName'] === 'core/group' ) {
		return $block_content;
	}
	return wp_render_layout_support_flag( $block_content, $block );
}, 10, 2 );
*/

if( !function_exists('pbmit_get_base_option') ) {
function pbmit_get_base_option( $option='' ){
	$return = '';
	if( class_exists('Kirki') && !defined('GYIM_TPC_ACTIVATED') ){
		$return = Kirki::get_option( $option );
	} else {
		if( !function_exists('pbmit_element_template_list') && file_exists(get_template_directory() . '/includes/core.php') ){
			include_once get_template_directory() . '/includes/core.php';
		}
		if( empty($kirki_options_array) && file_exists(get_template_directory() . '/includes/customizer-options.php') ){
			include get_template_directory() . '/includes/customizer-options.php';
		}
		if( isset($kirki_options_array) && !empty($kirki_options_array) && is_array($kirki_options_array) && count($kirki_options_array)>0 ){
			foreach( $kirki_options_array as $kirki_options ){
				if( !empty($kirki_options['section_fields']) ){
					foreach( $kirki_options['section_fields'] as $field ){
						if( !empty($field['settings']) && $field['settings']==$option && isset($field['default']) ){
							$return = $field['default'];
						}
					}
				}
			}
		}
	}
	return $return;
}
}

/**
 * Coacing CPT (optional)
 */
if( !function_exists('pbm_addons_register_special_post_types') ) {
function pbm_addons_register_special_post_types(){

	if( defined('PBMIT_COACHING_CPT_ACTIVE') ){ // Specially for Immiza theme

		// Default titles
		$coaching_cpt_title			= esc_attr__('Coachings','pbm-addons');
		$coaching_cpt_singular_title	= esc_attr__('Coaching','pbm-addons');
		$coaching_cpt_slug				= esc_attr('coaching');

		$coaching_cat_title			= esc_attr__('Coaching Categories','pbm-addons');
		$coaching_cat_singular_title	= esc_attr__('Coaching Category','pbm-addons');
		$coaching_cat_slug				= esc_attr('coaching-category');

		if( class_exists('Kirki') ){

			// Coaching
			$coaching_cpt_title2	= Kirki::get_option( 'coaching-cpt-title' );
			$coaching_cpt_title	= ( !empty($coaching_cpt_title2) ) ? $coaching_cpt_title2 : $coaching_cpt_title ;

			// Coaching - singular
			$coaching_cpt_singular_title2	= Kirki::get_option( 'coaching-cpt-singular-title' );
			$coaching_cpt_singular_title	= ( !empty($coaching_cpt_singular_title2) ) ? $coaching_cpt_singular_title2 : $coaching_cpt_singular_title ;

			// Coaching Slug
			$coaching_cpt_slug2	= Kirki::get_option( 'coaching-cpt-slug' );
			$coaching_cpt_slug	= ( !empty($coaching_cpt_slug2) ) ? $coaching_cpt_slug2 : $coaching_cpt_slug ;

			// Coaching Category
			$coaching_cat_title2	= Kirki::get_option( 'coaching-cat-title' );
			$coaching_cat_title	= ( !empty($coaching_cat_title2) ) ? $coaching_cat_title2 : $coaching_cat_title ;

			// Coaching Category - singular
			$coaching_cat_singular_title2	= Kirki::get_option( 'coaching-cat-singular-title' );
			$coaching_cat_singular_title	= ( !empty($coaching_cat_singular_title2) ) ? $coaching_cat_singular_title2 : $coaching_cat_singular_title ;

			// Coaching Category Slug
			$coaching_cat_slug2	= Kirki::get_option( 'coaching-cat-slug' );
			$coaching_cat_slug	= ( !empty($coaching_cat_slug2) ) ? $coaching_cat_slug2 : $coaching_cat_slug ;


		}

		/**** CPT - Coaching ****/
		$coaching_labels = array(
			'name'               => _x( $coaching_cpt_title, 'post type general name', 'pbm-addons' ),
			'singular_name'      => _x( $coaching_cpt_singular_title, 'post type singular name', 'pbm-addons' ),
			'add_new_item'       => sprintf( esc_attr__( 'Add New %1$s', 'pbm-addons' ) , $coaching_cpt_singular_title ),
			'edit_item'          => sprintf( esc_attr__( 'Edit %1$s', 'pbm-addons' ) , $coaching_cpt_singular_title ),
			'menu_name'          => _x( $coaching_cpt_title, 'admin menu ', 'pbm-addons' ),
			'name_admin_bar'     => _x( $coaching_cpt_singular_title, 'add new on admin bar', 'pbm-addons' ),
			'add_new'            => esc_attr__( 'Add New', 'pbm-addons' ),
			'new_item'           => sprintf( esc_attr__( 'New %1$s', 'pbm-addons' ) , $coaching_cpt_singular_title ),
			'view_item'          => sprintf( esc_attr__( 'View %1$s', 'pbm-addons' ) , $coaching_cpt_singular_title ),
			'all_items'          => sprintf( esc_attr__( 'All %1$s', 'pbm-addons' ) , $coaching_cpt_title ),
			'search_items'       => sprintf( esc_attr__( 'Search %1$s', 'pbm-addons' ) , $coaching_cpt_title ),
			'parent_item_colon'  => sprintf( esc_attr__( 'Parent %1$s:', 'pbm-addons' ) , $coaching_cpt_title ),
			'not_found'          => sprintf( esc_attr__( 'No %1$s found', 'pbm-addons' ) , $coaching_cpt_title ),
			'not_found_in_trash' => sprintf( esc_attr__( 'No %1$s found in Trash.', 'pbm-addons' ) , $coaching_cpt_title )
		);

		$coaching_args = array(
			'labels'             => $coaching_labels,
			'menu_icon'			=> 'dashicons-welcome-widgets-menus',
			//'description'        => __( 'Description.', 'pbm-addons' ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => esc_attr($coaching_cpt_slug) ),  // important
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields', 'revisions'  /*'excerpt'*/ )
		);

		if( get_theme_mod( 'cpt-coaching-disable' ) != true ){
			register_post_type( 'pbmit-coaching', $coaching_args );
		}


		// Add new taxonomy, make it hierarchical (like categories)
		$coaching_category_labels = array(
			'name'              => _x( $coaching_cat_title, 'Coaching Category general name', 'pbm-addons' ),
			'singular_name'     => _x( $coaching_cat_singular_title, 'Coaching Category singular name', 'pbm-addons' ),
			'search_items'      => sprintf( esc_attr__( 'Search %1$s', 'pbm-addons' ) , $coaching_cat_title ),
			'all_items'         => sprintf( esc_attr__( 'All %1$s', 'pbm-addons' ) , $coaching_cat_title ),
			'parent_item'       => sprintf( esc_attr__( 'Parent %1$s', 'pbm-addons' ) , $coaching_cat_singular_title ),
			'parent_item_colon' => sprintf( esc_attr__( 'Parent %1$s:', 'pbm-addons' ) , $coaching_cat_singular_title ),
			'edit_item'         => sprintf( esc_attr__( 'Edit %1$s', 'pbm-addons' ) , $coaching_cat_singular_title ),
			'update_item'       => sprintf( esc_attr__( 'Update %1$s', 'pbm-addons' ) , $coaching_cat_singular_title ),
			'add_new_item'      => sprintf( esc_attr__( 'Add New %1$s', 'pbm-addons' ) , $coaching_cat_singular_title ),
			'new_item_name'     => sprintf( esc_attr__( 'New %1$s Name', 'pbm-addons' ) , $coaching_cat_singular_title ),
			'menu_name'         => $coaching_cat_singular_title,
		);

		$coaching_category_args = array(
			'hierarchical'      => true,
			'labels'            => $coaching_category_labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => esc_attr($coaching_cat_slug) ),
		);
		if( get_theme_mod( 'cpt-coaching-disable' ) != true ){
			register_taxonomy( 'pbmit-coaching-category', array( 'pbmit-coaching' ), $coaching_category_args );
		}

	}

	if( defined('PBMIT_TREATMENT_CPT_ACTIVE') ){ // Specially for Physiofy theme

		// Default titles
		$treatment_cpt_title			= esc_attr__('Treatments','pbm-addons');
		$treatment_cpt_singular_title	= esc_attr__('Treatment','pbm-addons');
		$treatment_cpt_slug				= esc_attr('treatment');

		$treatment_cat_title			= esc_attr__('Treatment Categories','pbm-addons');
		$treatment_cat_singular_title	= esc_attr__('Treatment Category','pbm-addons');
		$treatment_cat_slug				= esc_attr('treatment-category');

		if( class_exists('Kirki') ){

			// Treatment
			$treatment_cpt_title2	= Kirki::get_option( 'treatment-cpt-title' );
			$treatment_cpt_title	= ( !empty($treatment_cpt_title2) ) ? $treatment_cpt_title2 : $treatment_cpt_title ;

			// Treatment - singular
			$treatment_cpt_singular_title2	= Kirki::get_option( 'treatment-cpt-singular-title' );
			$treatment_cpt_singular_title	= ( !empty($treatment_cpt_singular_title2) ) ? $treatment_cpt_singular_title2 : $treatment_cpt_singular_title ;

			// Treatment Slug
			$treatment_cpt_slug2	= Kirki::get_option( 'treatment-cpt-slug' );
			$treatment_cpt_slug	= ( !empty($treatment_cpt_slug2) ) ? $treatment_cpt_slug2 : $treatment_cpt_slug ;

			// Treatment Category
			$treatment_cat_title2	= Kirki::get_option( 'treatment-cat-title' );
			$treatment_cat_title	= ( !empty($treatment_cat_title2) ) ? $treatment_cat_title2 : $treatment_cat_title ;

			// Treatment Category - singular
			$treatment_cat_singular_title2	= Kirki::get_option( 'treatment-cat-singular-title' );
			$treatment_cat_singular_title	= ( !empty($treatment_cat_singular_title2) ) ? $treatment_cat_singular_title2 : $treatment_cat_singular_title ;

			// Treatment Category Slug
			$treatment_cat_slug2	= Kirki::get_option( 'treatment-cat-slug' );
			$treatment_cat_slug	= ( !empty($treatment_cat_slug2) ) ? $treatment_cat_slug2 : $treatment_cat_slug ;


		}

		/**** CPT - Treatment ****/
		$treatment_labels = array(
			'name'               => _x( $treatment_cpt_title, 'post type general name', 'pbm-addons' ),
			'singular_name'      => _x( $treatment_cpt_singular_title, 'post type singular name', 'pbm-addons' ),
			'add_new_item'       => sprintf( esc_attr__( 'Add New %1$s', 'pbm-addons' ) , $treatment_cpt_singular_title ),
			'edit_item'          => sprintf( esc_attr__( 'Edit %1$s', 'pbm-addons' ) , $treatment_cpt_singular_title ),
			'menu_name'          => _x( $treatment_cpt_title, 'admin menu ', 'pbm-addons' ),
			'name_admin_bar'     => _x( $treatment_cpt_singular_title, 'add new on admin bar', 'pbm-addons' ),
			'add_new'            => esc_attr__( 'Add New', 'pbm-addons' ),
			'new_item'           => sprintf( esc_attr__( 'New %1$s', 'pbm-addons' ) , $treatment_cpt_singular_title ),
			'view_item'          => sprintf( esc_attr__( 'View %1$s', 'pbm-addons' ) , $treatment_cpt_singular_title ),
			'all_items'          => sprintf( esc_attr__( 'All %1$s', 'pbm-addons' ) , $treatment_cpt_title ),
			'search_items'       => sprintf( esc_attr__( 'Search %1$s', 'pbm-addons' ) , $treatment_cpt_title ),
			'parent_item_colon'  => sprintf( esc_attr__( 'Parent %1$s:', 'pbm-addons' ) , $treatment_cpt_title ),
			'not_found'          => sprintf( esc_attr__( 'No %1$s found', 'pbm-addons' ) , $treatment_cpt_title ),
			'not_found_in_trash' => sprintf( esc_attr__( 'No %1$s found in Trash.', 'pbm-addons' ) , $treatment_cpt_title )
		);

		$treatment_args = array(
			'labels'             => $treatment_labels,
			'menu_icon'			=> 'dashicons-welcome-widgets-menus',
			//'description'        => __( 'Description.', 'pbm-addons' ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => esc_attr($treatment_cpt_slug) ),  // important
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields', 'revisions'  /*'excerpt'*/ )
		);

		if( get_theme_mod( 'cpt-treatment-disable' ) != true ){
			register_post_type( 'pbmit-treatment', $treatment_args );
		}


		// Add new taxonomy, make it hierarchical (like categories)
		$treatment_category_labels = array(
			'name'              => _x( $treatment_cat_title, 'Treatment Category general name', 'pbm-addons' ),
			'singular_name'     => _x( $treatment_cat_singular_title, 'Treatment Category singular name', 'pbm-addons' ),
			'search_items'      => sprintf( esc_attr__( 'Search %1$s', 'pbm-addons' ) , $treatment_cat_title ),
			'all_items'         => sprintf( esc_attr__( 'All %1$s', 'pbm-addons' ) , $treatment_cat_title ),
			'parent_item'       => sprintf( esc_attr__( 'Parent %1$s', 'pbm-addons' ) , $treatment_cat_singular_title ),
			'parent_item_colon' => sprintf( esc_attr__( 'Parent %1$s:', 'pbm-addons' ) , $treatment_cat_singular_title ),
			'edit_item'         => sprintf( esc_attr__( 'Edit %1$s', 'pbm-addons' ) , $treatment_cat_singular_title ),
			'update_item'       => sprintf( esc_attr__( 'Update %1$s', 'pbm-addons' ) , $treatment_cat_singular_title ),
			'add_new_item'      => sprintf( esc_attr__( 'Add New %1$s', 'pbm-addons' ) , $treatment_cat_singular_title ),
			'new_item_name'     => sprintf( esc_attr__( 'New %1$s Name', 'pbm-addons' ) , $treatment_cat_singular_title ),
			'menu_name'         => $treatment_cat_singular_title,
		);

		$treatment_category_args = array(
			'hierarchical'      => true,
			'labels'            => $treatment_category_labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => esc_attr($treatment_cat_slug) ),
		);
		if( get_theme_mod( 'cpt-treatment-disable' ) != true ){
			register_taxonomy( 'pbmit-treatment-category', array( 'pbmit-treatment' ), $treatment_category_args );
		}

	}
	
}
}
add_action( 'init', 'pbm_addons_register_special_post_types', 20 );

/**
 * Set image quality
 */
add_filter( 'jpeg_quality', 'pbmit_wp_image_quality' );
add_filter( 'wp_editor_set_quality', 'pbmit_wp_image_quality' );
if( !function_exists('pbmit_wp_image_quality') ) {
function pbmit_wp_image_quality( $return ){
	$quality = get_theme_mod('image-quality');
	if( !empty($quality) && in_array( $quality, array( '75', '80', '82', '85', '90', '95', '100' ) ) ){
		$return = $quality;
	}
	return $return;
}
}