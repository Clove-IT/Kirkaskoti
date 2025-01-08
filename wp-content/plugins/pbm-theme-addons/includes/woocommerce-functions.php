<?php


if( !function_exists('pbm_addons_woocommerce_init') ){
function pbm_addons_woocommerce_init(){

	if( function_exists('is_woocommerce') ){
		// Remove breadcrumb from WooCommerce
		remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);

		// First remove default wrapper
		remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
		remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

		// Then add new wrappers
		add_action('woocommerce_before_main_content', 'pbm_addons_wc_content_wrapper_start', 10);
		add_action('woocommerce_after_main_content', 'pbm_addons_wc_content_wrapper_end', 10);

	}

}
}
add_action( 'init', 'pbm_addons_woocommerce_init' );


if( !function_exists('pbm_addons_wc_content_wrapper_start') ){
function pbm_addons_wc_content_wrapper_start() {

	$pbmit_check_sidebar = true;
	if( function_exists('pbmit_check_sidebar') ){
		$pbmit_check_sidebar = pbmit_check_sidebar();
	}

	?>
	<div id="primary" class="content-area <?php if( $pbmit_check_sidebar ) { ?>col-md-9 col-lg-9<?php } ?>">
	<?php
}
}


if( !function_exists('pbm_addons_wc_content_wrapper_end') ){
function pbm_addons_wc_content_wrapper_end() {
	?>
	</div>
	<?php
}
}


add_filter( 'woocommerce_output_related_products_args', 'pbm_addons_wc_related_products_args', 20 );
function pbm_addons_wc_related_products_args( $args ) {
	$show = 4;
	if( function_exists('pbmit_get_base_option') ){
		$show = pbmit_get_base_option('wc-related-count');
	}
	$args['posts_per_page']	= $show;
	$args['columns']		= $show;
	return $args;
}


add_action( 'woocommerce_before_shop_loop_item_title', 'pbm_addons_wc_show_yith_wishlist_btn', 20, 0 );
function pbm_addons_wc_show_yith_wishlist_btn(){
	if( shortcode_exists('yith_wcwl_add_to_wishlist') ){
		echo do_shortcode('[yith_wcwl_add_to_wishlist]');
	}
}
	
