<?php
// [pbmit-site-url]
if( !function_exists('pbm_addons_sc_pbmit_site_url') ){
function pbm_addons_sc_pbmit_site_url( $atts, $content=NULL ){
	return site_url();
}
}
add_shortcode( 'pbmit-site-url', 'pbm_addons_sc_pbmit_site_url' );