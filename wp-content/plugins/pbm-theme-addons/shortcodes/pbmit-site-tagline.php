<?php
// [pbmit-site-tagline]
if( !function_exists('pbm_addons_sc_pbmit_site_tagline') ){
function pbm_addons_sc_pbmit_site_tagline( $atts, $content=NULL ){
	return get_bloginfo('description');
}
}
add_shortcode( 'pbmit-site-tagline', 'pbm_addons_sc_pbmit_site_tagline' );