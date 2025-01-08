<?php
defined( 'ABSPATH' ) || exit('restricted access');
return array(
	'title' 		=> esc_html__( 'Service', 'xclean' ), // Required
	'demo_url'		=> '',
	'type'			=> 'block', // Required
	'category'		=> array(   // Required
		esc_html__( 'Sections', 'xclean' ),
	),
	'tags'			 => array(
		esc_html__( 'Demo 01', 'xclean' ),
		esc_html__( 'Demo 01', 'xclean' ),
		esc_html__( 'Homepage', 'xclean' ),
	),
);