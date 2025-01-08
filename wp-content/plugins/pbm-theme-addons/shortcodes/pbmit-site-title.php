<?php
// [pbmit-site-title]
if( !function_exists('pbm_addons_sc_pbmit_site_title') ){
function pbm_addons_sc_pbmit_site_title( $atts, $content=NULL ){
	return get_bloginfo('name');
}
}
add_shortcode( 'pbmit-site-title', 'pbm_addons_sc_pbmit_site_title' );