<?php
// [pbmit-current-year]
if( !function_exists('pbm_addons_sc_pbmit_current_year') ){
function pbm_addons_sc_pbmit_current_year( $atts, $content=NULL ){
	return date("Y");
}
}
add_shortcode( 'pbmit-current-year', 'pbm_addons_sc_pbmit_current_year' );