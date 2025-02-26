<?php
/**
 * Xclean functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Xclean
 * @since 1.0
 */
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
if( !function_exists('pbmit_theme_setup') ){
function pbmit_theme_setup() {
	// Enable floating bar widget area
	define( 'PBMIT_FLOATING_WIDGET_ACTIVE', 'yes' );
	/*
	 * Theme translation textdomain
	 * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/xclean
	 */
	load_theme_textdomain( 'xclean', get_template_directory() . '/languages' );
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );
	/*
	 * Add WooCommerce support
	 */
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	/*
	 *  Image size 
	 */
	add_image_size( 'pbmit-img-650x620', 650, 620, true ); // Team style 1
	add_image_size( 'pbmit-img-325x330', 325, 330, true ); // Team style 2
	add_image_size( 'pbmit-img-880x620', 880, 620, true ); // Service style 1 & Blog Style 1
	add_image_size( 'pbmit-img-840x1040', 840, 1040, true ); // Service style 2
	add_image_size( 'pbmit-img-630x630', 630, 630, true ); // Service style 3
	add_image_size(	'pbmit-img-770x890', 770, 890, true ); // For Portfolio Style 1
	add_image_size(	'pbmit-img-1000x1000', 1000, 1000, true ); // For Portfolio Style 3
	add_image_size(	'pbmit-img-530x400', 530, 400, true ); // For Blog Style 2
	// Portfolio Style-2 Carasoul
	add_image_size('pbmit-img-610x405',	610, 405, true ); // For masonry 1st box For Portfolio Style2
	add_image_size('pbmit-img-610x830',	610, 830, true ); // For masonry 2st box For Portfolio Style2
	// Portfolio Detail
	add_image_size( 'pbmit-img-1200x650', 1200, 650, true ); // For portfolio detail
	// Service Detail
	add_image_size( 'pbmit-img-1000x615', 1000, 615, true ); // For Service detail
	// Masonry view
	add_image_size( 'pbmit-img-770x492', 770, 492, true ); // For masonry 1st and 3rd box
	add_image_size( 'pbmit-img-770x762', 770, 762, true ); // For masonry 2nd box
	add_image_size( 'pbmit-img-770x745', 770, 745, true ); // For masonry 4th box
	add_image_size( 'pbmit-img-770x745', 770, 1099, true ); // For masonry 5th box
	add_image_size( 'pbmit-img-770x872', 770, 872, true ); // For masonry 6th box
	add_image_size( 'pbmit-img-770x447', 770, 447, true ); // For masonry 7th box
	add_image_size( 'pbmit-img-770x485', 770, 485, true ); // For masonry 8th box
	add_image_size( 'pbmit-img-770x974', 770, 974, true ); // For masonry 9th box
	/*
	 *  Editor style
	 */
	add_editor_style();
	// Set the default content width.
	$GLOBALS['content_width'] = 847;
	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'pbminfotech-top'		=> esc_attr__( 'Top Menu', 'xclean' ),
		'pbminfotech-footer'	=> esc_attr__( 'Footer Menu', 'xclean' ),
	) );
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'script',
			'style',
		)
	);
	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'audio',
		'status',
		'chat',
	) );
	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
}
add_action( 'after_setup_theme', 'pbmit_theme_setup' );
/**
 * Favorites
 */
function pbmit_elementor_add_to_fav(){
	$fav_added = get_user_meta( get_current_user_id(), 'pbmit_add_to_fav', true );
	if( function_exists('is_user_logged_in') && is_user_logged_in() && $fav_added != 'yes' ){
		$data = get_user_meta( get_current_user_id(), 'wp_elementor_editor_user_favorites', true);
		if( is_string($data) ){
			$data = array();
		}
		if( !isset($data['widgets']) ){
			$data['widgets'] = array();
		}
		$existing_widgets = $data['widgets'];
		if( is_array($existing_widgets) ){
			$new_widgets = array(
				'pbmit_custom_heading',
				'pbmit_heading',
				'pbmit_icon_heading',
				'pbmit_multiple_icon_heading',
				'pbmit_tabs_element',
				'pbmit_blog_element',
				'pbmit_portfolio_element',
				'pbmit_service_element',
				'pbmit_team_element',
				'pbmit_testimonial_element',
				'pbmit_client_element',
				'pbmit_fid_element',
				'pbmit_timeline_element',
				'pbmit_ptable_element',
				'pbmit_marquee_effect_element',
				'pbmit_static_box_element',
			);
			if( !empty($existing_widgets) ){
				// Favorites is not empty
				$existing_widgets = array_merge($new_widgets, $existing_widgets );
			} else {
				// Favorites is empty
				$existing_widgets = $new_widgets;
			}
			$data['widgets'] = $existing_widgets;
			update_user_meta( get_current_user_id(), 'wp_elementor_editor_user_favorites', $data);
		}
		update_user_meta( get_current_user_id(), 'pbmit_add_to_fav', 'yes' );
	}
}
add_action( 'init', 'pbmit_elementor_add_to_fav' );
add_action( 'admin_init', 'pbmit_elementor_add_to_fav' );
/* *** Kirki **** */
require_once get_template_directory().'/includes/kirki/kirki.php';
// Xclean Template Kits
if ( did_action( 'elementor/loaded' ) ) {
	require_once ( get_template_directory() . '/includes/xclean-template-kits/class-xclean-template-kits.php' );
}
if( !function_exists('pbmit_init_calls') ){
function pbmit_init_calls() {
	include( get_template_directory() . '/includes/core.php' );
	// Meta boxes
	include( get_template_directory() . '/includes/meta-boxes.php' );
}
}
add_action( 'init', 'pbmit_init_calls' );
// actions
include( get_template_directory() . '/includes/actions.php' );
// Advanced Custom Fields - Fonts Icon Picker
include( get_template_directory() . '/includes/acf/pbminfotech-acf-iconpicker/acf-pbmit_fonticonpicker.php' );
/*
 *  Plugins
 */
require_once get_parent_theme_file_path( '/includes/class-tgm-plugin-activation.php' );
add_action( 'tgmpa_register', 'pbmit_register_required_plugins' );
if( !function_exists('pbmit_register_required_plugins') ){
function pbmit_register_required_plugins() {
	$xclean_tsw_activated_once	= get_option( 'xclean_tsw_activated_once' );
	$xclean_tsw_all_done 			= get_option('xclean_tsw_all_done');
	if( !empty($xclean_tsw_activated_once) && $xclean_tsw_activated_once == 'yes' ){
		$plugins = array(
			array(
				'name'		=> esc_attr('Slider Revolution'),
				'slug'		=> esc_attr('revslider'),
				'source'	=> get_template_directory() . '/includes/plugins/revslider.zip',
			'version'				=> esc_attr('6.7.21'),
			),
			array(
				'name'		=> esc_attr('PBM Theme Addons'),
				'slug'		=> esc_attr('pbm-theme-addons'),
				'source'	=> get_template_directory() . '/includes/plugins/pbm-theme-addons.zip',
			'version'				=> esc_attr('2.1'),
			),
			array(
				'name'		=> esc_attr('Envato Market'),
				'slug'		=> esc_attr('envato-market'),
				'source'	=> get_template_directory() . '/includes/plugins/envato-market.zip',
			),
			array(
				'name'		=> esc_attr('Elementor Page Builder'),
				'slug'		=> esc_attr('elementor'),
			),
			array(
				'name'		=> esc_attr('Advanced Custom Fields'),
				'slug'		=> esc_attr('advanced-custom-fields'),
			),
			array(
				'name'		=> esc_attr('ACF Photo Gallery Field'),
				'slug'		=> esc_attr('navz-photo-gallery'),
			),
			array(
				'name'		=> esc_attr('Breadcrumb NavXT'),
				'slug'		=> esc_attr('breadcrumb-navxt'),
			),
			array(
				'name'		=> esc_attr('MailChimp for WordPress'),
				'slug'		=> esc_attr('mailchimp-for-wp'),
			),
			array(
				'name'		=> esc_attr('Contact Form 7'),
				'slug'		=> esc_attr('contact-form-7'),
			),		
			array(
				'name'		=> esc_attr('Svg Support'),
				'slug'		=> esc_attr('svg-support'),
			),
			array(
				'name'		=> esc_attr('WooCommerce'),
				'slug'		=> esc_attr('woocommerce'),
			),
		);
	} else {
		$plugins = array(
			array(
				'name'		=> esc_attr('Xclean Theme Setup Wizard'),
				'slug'		=> esc_attr('xclean-theme-setup-wizard'),
				'source'	=> esc_url( 'https://pbminfotech.com/plugins/xclean-theme-setup-wizard.zip' ),
			'version'				=> esc_attr('3.0'),
			),
		);
	}
	$config = array(
		'id'			=> 'xclean',				 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path'	=> '',					  // Default absolute path to bundled plugins.
		'menu'			=> 'tgmpa-install-plugins', // Menu slug.
		'has_notices'	=> true,					// Show admin notices or not.
		'dismissable'	=> true,					// If false, a user cannot dismiss the nag message.
		'dismiss_msg'	=> '',					  // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic'	=> false,				   // Automatically activate plugins after installation or not.
		'message'		=> '',					  // Message to output right before the plugins table.
	);
	tgmpa( $plugins, $config );
}
}
/**
 *  Merlin message disable ajax call
 */
add_action( 'wp_ajax_pbmit_remove_merlin_message', 'pbmit_remove_merlin_message' );
if( !function_exists('pbmit_remove_merlin_message') ){
function pbmit_remove_merlin_message() {
	update_option( 'xclean_tsw_all_done', 'yes' );
	echo 'ok';
	wp_die(); // this is required to terminate immediately and return a proper response
}
}
/* Ratings and reviews */
/**
 *  Merlin Message
 */
if( !function_exists('pbmit_ratings_message') ){
function pbmit_ratings_message() {
	?>
	<div class="pbmit-ratings-message-box notice is-dismissible pbmit-ratings-box">
		<div class="pbmit-ratings-box-back-link" style="display:none;"><a href="#"><i class="fa fa-chevron-circle-left"></i> <?php esc_html_e('Back','xclean') ?> </a></div>
		<div class="pbmit-ratings-message">
			<!-- Ratings Main Box -->
			<div class="pbmit-ratings-message-inner pbmit-ratings-box-main" style="display:block;">
				<div class="pbmit-ratings-message-logo">
					<img src="<?php echo esc_url( get_template_directory_uri() );?>/includes/images/logo.svg" />
				</div>
				<div class="pbmit-ratings-message-text">
					<h2><?php esc_html_e('Happy with our theme?', 'xclean'); ?></h2>
					<p><?php esc_html_e('We like to know how is your experiance with our theme. If you have any question than you can create ticket on our support site', 'xclean'); ?></p>
					<div class="pbmit-ratings-message-btn">
						<div class="pbmit-ratings-message-btn-1">
							<a href="#" class="button button-primary button-hero load-customize hide-if-no-customize pbmit-question-btn"> <i class="fa fa-question-circle"></i> <?php esc_html_e('I have a question or problem', 'xclean'); ?></a>
						</div>
						<div class="pbmit-ratings-message-btn-2 pbmit-happy-btn-container">
							<a href="#" class="button button-primary button-hero load-customize pbmit-happy-btn"> <i class="fa fa-thumbs-o-up"></i> <?php esc_html_e('I am happy with the theme', 'xclean'); ?></a>
						</div>
						<div class="clearfix clear"></div>
						<div class="pbmit-ratings-message-small"><a href="#"><?php esc_html_e('Permanently disable this message', 'xclean'); ?></a></div>
					</div>
				</div>
				<div class="clear clearfix clr"></div>
			</div><!-- .pbmit-ratings-message-inner -->
			<!-- Ratings Close Permenetly message -->
			<div class="pbmit-ratings-message-conform">
				<div class="pbmit-ratings-message-conform-inner">
					<div class="pbmit-ratings-message-conform-i">
						<div class="pbmit-ratings-message-conform-col pbmit-ratings-message-conform-text">
							<h3><?php esc_html_e('Are you sure you want to permenently close this box?', 'xclean'); ?></h3>
							<div class="pbmit-ratings-message-conform-btn">
								<a href="#" class="button button-primary pbmit-disable-ratings-message"><?php esc_html_e('Yes close this message', 'xclean'); ?></a>
								&nbsp; &nbsp;
								<a href="#" class="button pbmit-disable-ratings-message-cancel"><?php esc_html_e('No, keep this message', 'xclean'); ?></a>
							</div>
						</div>
					</div>
				</div>
			</div><!-- .pbmit-ratings-message-conform -->
			<!-- Questions or problem box -->
			<div class="pbmit-ratings-message-inner pbmit-ratings-box-questions" style="display:none;">
				<div class="pbmit-ratings-message-text">
					<h2><?php esc_html_e('Have any question or problem?', 'xclean'); ?></h2>
					<p><?php printf( esc_html__('You can read our theme documents to get how to work with the theme. Still not solved, than feel free to contact us via our support site at %1$s', 'xclean'), pbmit_esc_kses('<a href="' . esc_url('https://pbminfotech.support') . '" target="_blank">' . esc_url('https://pbminfotech.support') . '</a>') ); ?></p>
					<div class="pbmit-ratings-message-btn">
						<div class="pbmit-ratings-message-btn-2 pbmit-happy-btn-container pbmit-pright-15">
							<a href="<?php echo esc_url('http://xclean-demo.pbminfotech.com/docs/'); ?>" target="_blank" class="button button-primary button-hero load-customize pbmit-ratings-doc-btn"> <i class="fa fa-book"></i> <?php esc_html_e('Xclean Theme Documents', 'xclean'); ?></a>
						</div>
						<div class="pbmit-ratings-message-btn-2 pbmit-happy-btn-container">
							<a href="<?php echo esc_url('https://pbminfotech.support/'); ?>" target="_blank" class="button button-primary button-hero load-customize pbmit-ratings-support-btn"> <i class="fa fa-question-circle"></i> <?php esc_html_e('Go to PBMInfotech support site', 'xclean'); ?></a>
						</div>
						<div class="clearfix clear"></div>
					</div>
				</div>
				<div class="clear clearfix clr"></div>
			</div><!-- .pbmit-ratings-message-inner -->
			<!-- 5-star ratings box -->
			<div class="pbmit-ratings-message-inner pbmit-ratings-box-ratings" style="display:none;">
				<div class="pbmit-ratings-message-text">
					<div class="pbmit-ratings-message-arrow-area">
						<h2><?php esc_html_e('Glad to hear you like our theme', 'xclean'); ?></h2>
						<p><?php printf( esc_html__('Thanks for your support. Please provide us 5-star ratings. This will help us a lot.
It just take 1 minute. %1$s', 'xclean'), pbmit_esc_kses('<a href="' . esc_url('https://themeforest.net/downloads') . '" target="_blank">'.esc_html__('Click here to go for review now','xclean').'</a>') ); ?></p>
					</div>
				</div>
				<div class="pbmit-ratings-5star-right-area">
					<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/includes/images/ratings-steps.png" alt="<?php esc_attr_e( 'Ratings Steps', 'xclean' ); ?>" />
				</div>
				<div class="clear clearfix clr"></div>
			</div><!-- .pbmit-ratings-message-inner -->
		</div><!-- .pbmit-ratings-message -->
	</div><!-- .notice.is-dismissible -->
	<?php
}
}
if( !function_exists('pbmit_ratings_call') ){
function pbmit_ratings_call(){
	$show_date				= get_option('pbmit-ratingsbox-show-date');
	$pbmit_merlin_all_done 	= get_option('xclean_tsw_all_done');
	if( empty($show_date) ){
		$nextWeek = time() + (7 * 24 * 60 * 60); // One week..
		$nextWeek = strval( $nextWeek );
		update_option('pbmit-ratingsbox-show-date', $nextWeek);
	} else {
		$pbmit_ratings_done	= get_option('pbmit-ratings-done');
		$nextWeek			= get_option('pbmit-ratingsbox-show-date');
		$curr_date			= time();
		if( $nextWeek < $curr_date && empty($pbmit_ratings_done) && $pbmit_merlin_all_done=='yes' ){
			add_action( 'admin_notices', 'pbmit_ratings_message' );
		}
	}
}
}
add_action( 'init', 'pbmit_ratings_call' );
/**
 *  Ratings message disable ajax call
 */
add_action( 'wp_ajax_pbmit_remove_ratings_message', 'pbmit_remove_ratings_message' );
if( !function_exists('pbmit_remove_ratings_message') ){
function pbmit_remove_ratings_message() {
	update_option( 'pbmit-ratings-done', 'yes' );
	echo 'ok';
	wp_die(); // this is required to terminate immediately and return a proper response
}
}
/**
 * Kirki changes
 */
if( !function_exists('pbmit_kirki_changes') ){
function pbmit_kirki_changes(){
	if (!is_customize_preview() ) {
		add_filter( 'kirki_output_inline_styles', '__return_false' );
	}
	add_filter( 'kirki/config', function( $config = array() ) {
		$config['styles_priority'] = 10;
		return $config;
	} );
}
}
add_action( 'init', 'pbmit_kirki_changes' );
//Infinite Scroll
if( !function_exists('pbmit_infinite_scroll') ){
function pbmit_infinite_scroll(){
	if ( ! wp_verify_nonce( sanitize_text_field($_GET['nonce']), 'pbmit_infinite_scroll_ajax_validation' ) ) {
		return '';
		exit();
	}
	$paged = '1';
	if( isset($_GET['page_no']) && !empty($_GET['page_no']) ){
		$paged = sanitize_text_field($_GET['page_no']);
	}
	$nonce = '';
	if( isset($_GET['nonce']) && !empty($_GET['nonce']) ){
		$nonce = sanitize_text_field($_GET['nonce']);
	}
	$show = '3';
	if( isset($_GET['show']) && !empty($_GET['show']) ){
		$show = sanitize_text_field($_GET['show']);
	}
	$cpt = 'post';
	if( isset($_GET['cpt']) && !empty($_GET['cpt']) ){
		$cpt_name = $cpt = sanitize_text_field($_GET['cpt']);
		if( $cpt == 'blog' ){
			$cpt_name = 'post';
		} else if($cpt == 'team'){
			$cpt_name = 'pbmit-team-member';
		} else {
			$cpt_name = 'pbmit-'.$cpt;
		}
	}
	$columns = '3';
	if( isset($_GET['columns']) && !empty($_GET['columns']) ){
		$columns = sanitize_text_field($_GET['columns']);
	}
	$style = '1';
	if( isset($_GET['style']) && !empty($_GET['style']) ){
		$style = sanitize_text_field($_GET['style']);
	}
	$orderby = '';
	if( isset($_GET['orderby']) && !empty($_GET['orderby']) ){
		$orderby = sanitize_text_field($_GET['orderby']);
	}
	$order = '';
	if( isset($_GET['order']) && !empty($_GET['order']) ){
		$order = sanitize_text_field($_GET['order']);
	}
	$from_category = '';
	if( isset($_POST['sortby']) && !empty($_POST['sortby']) ){
		$sortby = sanitize_text_field($_POST['sortby']);
		if( !empty($sortby) && $sortby != '*' && (strpos($sortby, 'pbmit-term-') !== false) ){
			$from_category = str_replace('pbmit-term-','', $sortby);
		}
	}
	$offset = 0;
	if( isset($_GET['offset']) && !empty($_GET['offset']) ){
		$offset = sanitize_text_field($_GET['offset']);
	}
	if( $paged>1 ){
		$offset = $offset + ( ($paged-1) * $show);
	}
	// Preparing $args
	$args = array(
		'post_type'				=> $cpt_name,
		'status'				=> 'publish',
		'posts_per_page'		=> $show,
		'ignore_sticky_posts'	=> true,
		'offset'				=> $offset,
	);
	// From selected category/group
	if( !empty($from_category) ){
		$from_category = explode(',', $from_category);
		$args['tax_query'] = array(
			array(
				'taxonomy' => pbmit_get_category_of_cpt($cpt),
				'field'	=> 'slug',
				'terms'	=> $from_category,
			),
		);
	};
	if( !empty($orderby) && $orderby!='none' ){
		$args['orderby'] = $orderby;
		if( !empty($order) ){
			$args['order'] = $order;
		}
	}
	// Wp query to fetch posts
	$posts = new \WP_Query( $args );
	if ( $posts->have_posts() ) {
		$odd_even		= 'odd';
		$col_odd_even	= 'odd';
		$x				= 1;
		while ( $posts->have_posts() ) {
			$return = '';
			$posts->the_post();
			// Template
			if( file_exists( locate_template( '/theme-parts/'.esc_attr($cpt).'/'.esc_attr($cpt).'-style-'.esc_attr($style).'.php', false, false ) ) ){
				$return .= pbmit_element_block_container( array(
					'position'		=> 'start',
					'column'		=> $columns,
					'cpt'			=> $cpt,
					'taxonomy'		=> pbmit_get_category_of_cpt($cpt),
					'style'			=> $style,
					'odd_even'		=> $odd_even,
					'col_odd_even'	=> $col_odd_even,
				) );
				ob_start();
				$r = include( locate_template( '/theme-parts/'.esc_attr($cpt).'/'.esc_attr($cpt).'-style-'.esc_attr($style).'.php', false, false ) );
				$return .= ob_get_contents();
				ob_end_clean();
				$return .= pbmit_element_block_container( array(
					'position'	=> 'end',
				) );
			}
			echo pbmit_esc_kses($return);
			// odd or even
			if( $odd_even == 'odd' ){ $odd_even = 'even'; } else { $odd_even = 'odd'; }
			if( !empty($columns) ){
				if( $x % $columns == 0 ){
					if( $col_odd_even == 'odd' ){ $col_odd_even = 'even'; } else { $col_odd_even = 'odd'; }
				}
			}
			$x++;
		}
		?>
		<?php
	}
	wp_reset_postdata();
	wp_die(); // this is required to terminate immediately and return a proper response
}
}
add_action('wp_ajax_pbmit_infinite_scroll', 'pbmit_infinite_scroll'); // for logged in user
add_action('wp_ajax_nopriv_pbmit_infinite_scroll', 'pbmit_infinite_scroll'); // if user not logged in
add_filter('event_manager_event_wpem_column','pbmit_change_wpem_column_listing');
if( !function_exists('pbmit_change_wpem_column_listing') ){
function pbmit_change_wpem_column_listing($number){
	$column = pbmit_get_base_option('event-column');
	if( empty($column) ){
		$column = '3';
	}
	if( $column != '12' ){
		$column = substr($column, 0, 1);
	}
	if( !in_array( $column, array('3','4','6','12') ) ){
		$column = '3';
	}
	return $column;
}
}

//Infinite Scroll
if( !function_exists('pbmit_ajax_sortable_category') ){
	function pbmit_ajax_sortable_category(){
	
		if ( ! wp_verify_nonce( sanitize_text_field($_POST['nonce']), 'pbmit_ajax_sortable_category_ajax_validation' ) ) {
			return '';
			exit();
		}
	
		$paged = '1';
		$nonce = '';
		if( isset($_POST['nonce']) && !empty($_POST['nonce']) ){
			$nonce = sanitize_text_field($_POST['nonce']);
		}
		$show = '3';
		if( isset($_POST['show']) && !empty($_POST['show']) ){
			$show = sanitize_text_field($_POST['show']);
		}
		$cpt = 'post';
		if( isset($_POST['cpt']) && !empty($_POST['cpt']) ){
			$cpt_name = $cpt = sanitize_text_field($_POST['cpt']);
			if( $cpt == 'blog' ){
				$cpt_name = 'post'; 
			} else if($cpt == 'team'){
				$cpt_name = 'pbmit-team-member';
			} else {
				$cpt_name = 'pbmit-'.$cpt;
			}
		}
		$columns = '3';
		if( isset($_POST['columns']) && !empty($_POST['columns']) ){
			$columns = sanitize_text_field($_POST['columns']);
		}
		$style = '1';
		if( isset($_POST['style']) && !empty($_POST['style']) ){
			$style = sanitize_text_field($_POST['style']);
		}
		$orderby = '';
		if( isset($_POST['orderby']) && !empty($_POST['orderby']) ){
			$orderby = sanitize_text_field($_POST['orderby']);
		}
		$order = '';
		if( isset($_POST['order']) && !empty($_POST['order']) ){
			$order = sanitize_text_field($_POST['order']);
		}
		$from_category = '';
		if( isset($_POST['sortby']) && !empty($_POST['sortby']) ){
			$sortby = sanitize_text_field($_POST['sortby']);
			if( !empty($sortby) && $sortby != '*' && (strpos($sortby, 'pbmit-term-') !== false) ){
				$from_category = str_replace('pbmit-term-','', $sortby);
			}
		}
		$offset = 0;
		if( isset($_POST['offset']) && !empty($_POST['offset']) ){
			$offset = sanitize_text_field($_POST['offset']);
		}
	
		if( $paged>1 ){
			$offset = $offset + ( ($paged-1) * $show);
		}
	
		// Preparing $args
		$args = array(
			'post_type'				=> $cpt_name,
			'status'				=> 'publish',
			'posts_per_page'		=> $show,
			'ignore_sticky_posts'	=> true,
			'offset'				=> $offset,
		);
	
		// From selected category/group
		if( !empty($from_category) ){
			$from_category = explode(',', $from_category);
			$args['tax_query'] = array(
				array(
					'taxonomy' => pbmit_get_category_of_cpt($cpt),
					'field'	=> 'id',
					'terms'	=> $from_category,
				),
			);
		};
	
		if( !empty($orderby) && $orderby!='none' ){
			$args['orderby'] = $orderby;
			if( !empty($order) ){
				$args['order'] = $order;
			}
		}
	
		// Wp query to fetch posts
		$posts = new \WP_Query( $args );
	
		if ( $posts->have_posts() ) {
	
			$odd_even		= 'odd';
			$col_odd_even	= 'odd';
			$x				= 1;
			while ( $posts->have_posts() ) {
				$return = '';
				$posts->the_post();
	
				// Template
				if( file_exists( locate_template( '/theme-parts/'.esc_attr($cpt).'/'.esc_attr($cpt).'-style-'.esc_attr($style).'.php', false, false ) ) ){
	
					$return .= pbmit_element_block_container( array(
						'position'		=> 'start',
						'column'		=> $columns,
						'cpt'			=> $cpt,
						'taxonomy'		=> pbmit_get_category_of_cpt($cpt),
						'style'			=> $style,
						'odd_even'		=> $odd_even,
						'col_odd_even'	=> $col_odd_even,
					) );
	
					ob_start();
					$r = include( locate_template( '/theme-parts/'.esc_attr($cpt).'/'.esc_attr($cpt).'-style-'.esc_attr($style).'.php', false, false ) );
					$return .= ob_get_contents();
					ob_end_clean();
	
					$return .= pbmit_element_block_container( array(
						'position'	=> 'end',
					) );
	
				}
	
				echo pbmit_esc_kses($return);
	
				// odd or even
				if( $odd_even == 'odd' ){ $odd_even = 'even'; } else { $odd_even = 'odd'; }
				if( $x % $columns == 0 ){
					if( $col_odd_even == 'odd' ){ $col_odd_even = 'even'; } else { $col_odd_even = 'odd'; }
				}
				$x++;
	
			}
			?>
	
			<?php
	
		}
		wp_reset_postdata();
	
		// ajax loader for ajax sortable category
		echo pbmit_esc_kses('<div class="pbmit-ajax-loader"><div class="pbmit-ajax-loader-inner"></div></div>');
	
	
		wp_die(); // this is required to terminate immediately and return a proper response
	}
	}
	add_action('wp_ajax_pbmit_ajax_sortable_category', 'pbmit_ajax_sortable_category'); // for logged in user
	add_action('wp_ajax_nopriv_pbmit_ajax_sortable_category', 'pbmit_ajax_sortable_category'); // if user not logged in

	
/**
 * Hook to modify address class in the contact widget
 */
if( !function_exists('pbmit_contact_widget_address_modified_class') ) {
	function pbmit_contact_widget_address_modified_class($class) {
		return 'pbmit-contact-widget-address';
	}
	}
	add_filter('pbmit_contact_widget_address_class', 'pbmit_contact_widget_address_modified_class');
		
	/**
	 * Hook to modify phone class in the contact widget
	 */
	if( !function_exists('pbmit_contact_widget_phone_modified_class') ) {
	function pbmit_contact_widget_phone_modified_class($class) {
		return 'pbmit-contact-widget-phone';
	}
	}
	add_filter('pbmit_contact_widget_phone_class', 'pbmit_contact_widget_phone_modified_class');
		
		
	/**
	 * Hook to modify email class in the contact widget
	 */
	if( !function_exists('pbmit_contact_widget_email_modified_class') ) {
	function pbmit_contact_widget_email_modified_class($class) {
		return 'pbmit-contact-widget-email';
	}
	}
	add_filter('pbmit_contact_widget_email_class', 'pbmit_contact_widget_email_modified_class');