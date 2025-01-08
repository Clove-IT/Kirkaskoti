<?php

// [pbmit-footer-logo]

if( !function_exists('pbm_addons_sc_pbmit_footer_logo') ){
	function pbm_addons_sc_pbmit_footer_logo( $atts, $content=NULL ) {

		$return = '';
		$footer_logo_shortcode = pbmit_get_base_option('footer-logo');
		if( !empty($footer_logo_shortcode) ){
			$footer_logo = '<img class="pbmit-main-logo" src="'. esc_url($footer_logo_shortcode).'" alt="'. get_bloginfo( 'name' ).'" title="'. get_bloginfo( 'name' ).'" />';			
			$return = '<div class="pbmit-footer-logo">'.$footer_logo.'</div>';
		}
		return $return;
		
	}	
}
add_shortcode( 'pbmit-footer-logo', 'pbm_addons_sc_pbmit_footer_logo' );