<?php
// Default titles
$portfolio_cpt_singular_title	= esc_attr__('Portfolio','xclean');
$portfolio_cat_singular_title	= esc_attr__('Portfolio Category','xclean');
$service_cpt_singular_title	= esc_attr__('Service','xclean');
$service_cat_singular_title	= esc_attr__('Service Category','xclean');
$team_cpt_singular_title	= esc_attr__('Team Member','xclean');
$team_group_singular_title	= esc_attr__('Team Group','xclean');
$testimonial_cpt_singular_title		= esc_attr__('Testimonial','xclean');
$testimonial_cat_singular_title	= esc_attr__('Testimonial Category','xclean');
if( class_exists('Kirki') ){
	// Portfolio
	$portfolio_cpt_singular_title2	= Kirki::get_option( 'portfolio-cpt-singular-title' );
	$portfolio_cpt_singular_title	= ( !empty($portfolio_cpt_singular_title2) ) ? $portfolio_cpt_singular_title2 : $portfolio_cpt_singular_title ;
	// Portfolio Category
	$portfolio_cat_singular_title2	= Kirki::get_option( 'portfolio-cat-singular-title' );
	$portfolio_cat_singular_title	= ( !empty($portfolio_cat_singular_title2) ) ? $portfolio_cat_singular_title2 : $portfolio_cat_singular_title ;
	// Service
	$service_cpt_singular_title2	= Kirki::get_option( 'service-cpt-singular-title' );
	$service_cpt_singular_title	= ( !empty($service_cpt_singular_title2) ) ? $service_cpt_singular_title2 : $service_cpt_singular_title ;
	// Service Category
	$service_cat_singular_title2	= Kirki::get_option( 'service-cat-singular-title' );
	$service_cat_singular_title	= ( !empty($service_cat_singular_title2) ) ? $service_cat_singular_title2 : $service_cat_singular_title ;
	// Team
	$team_cpt_singular_title2	= Kirki::get_option( 'team-cpt-singular-title' );
	$team_cpt_singular_title	= ( !empty($team_cpt_singular_title2) ) ? $team_cpt_singular_title2 : $team_cpt_singular_title ;
	// Team Group
	$team_group_singular_title2	= Kirki::get_option( 'team-group-singular-title' );
	$team_group_singular_title	= ( !empty($team_group_singular_title2) ) ? $team_group_singular_title2 : $team_group_singular_title ;
	// Testimonial
	$testimonial_cpt_singular_title2	= Kirki::get_option( 'testimonial-cpt-singular-title' );
	$testimonial_cpt_singular_title	= ( !empty($testimonial_cpt_singular_title2) ) ? $testimonial_cpt_singular_title2 : $testimonial_cpt_singular_title ;
	// Testimonial Category
	$testimonial_cat_singular_title2	= Kirki::get_option( 'testimonial-cat-singular-title' );
	$testimonial_cat_singular_title	= ( !empty($testimonial_cat_singular_title2) ) ? $testimonial_cat_singular_title2 : $testimonial_cat_singular_title ;
}
$pre_color_list = array(
	'globalcolor'		=> get_template_directory_uri() . '/includes/images/precolor-globalcolor.png',
	'secondarycolor'	=> get_template_directory_uri() . '/includes/images/precolor-secondarycolor.png',
	'transparent'		=> get_template_directory_uri() . '/includes/images/precolor-transparent.png',
	'white'				=> get_template_directory_uri() . '/includes/images/precolor-white.png',
	'light'				=> get_template_directory_uri() . '/includes/images/precolor-light.png',
	'blackish'			=> get_template_directory_uri() . '/includes/images/precolor-blackish.png',
	'custom'			=> get_template_directory_uri() . '/includes/images/precolor-custom.png',
);
$pre_color_with_gradient_list = array(
	'globalcolor'		=> get_template_directory_uri() . '/includes/images/precolor-globalcolor.png',
	'secondarycolor'	=> get_template_directory_uri() . '/includes/images/precolor-secondarycolor.png',
	'gradientcolor'		=> get_template_directory_uri() . '/includes/images/precolor-gradientcolor.png',
	'transparent'		=> get_template_directory_uri() . '/includes/images/precolor-transparent.png',
	'white'				=> get_template_directory_uri() . '/includes/images/precolor-white.png',
	'light'				=> get_template_directory_uri() . '/includes/images/precolor-light.png',
	'blackish'			=> get_template_directory_uri() . '/includes/images/precolor-blackish.png',
	'custom'			=> get_template_directory_uri() . '/includes/images/precolor-custom.png',
);
$pre_two_color_list = array(
	''					=> get_template_directory_uri() . '/includes/images/precolor-default.png',
	'white'				=> get_template_directory_uri() . '/includes/images/precolor-white.png',
	'blackish'			=> get_template_directory_uri() . '/includes/images/precolor-blackish.png',
	'globalcolor'		=> get_template_directory_uri() . '/includes/images/precolor-globalcolor.png',
);
$pre_text_color_list = array(
	'white'				=> get_template_directory_uri() . '/includes/images/precolor-white.png',
	'blackish'			=> get_template_directory_uri() . '/includes/images/precolor-blackish.png',
	'globalcolor'		=> get_template_directory_uri() . '/includes/images/precolor-globalcolor.png',
	'secondarycolor'	=> get_template_directory_uri() . '/includes/images/precolor-secondarycolor.png',
);
$pre_text_color_2_list = array(
	'white'				=> get_template_directory_uri() . '/includes/images/precolor-white.png',
	'blackish'			=> get_template_directory_uri() . '/includes/images/precolor-blackish.png',
);
$column_list = array(
	'1'	=> get_template_directory_uri() . '/includes/images/column-1.png',
	'2'	=> get_template_directory_uri() . '/includes/images/column-2.png',
	'3'	=> get_template_directory_uri() . '/includes/images/column-3.png',
);
// Total Header Styles
$header_style_array = array(
	'1'	=> get_template_directory_uri() . '/includes/images/header-style-1.jpg',
	'2'	=> get_template_directory_uri() . '/includes/images/header-style-2.jpg',
	'3'	=> get_template_directory_uri() . '/includes/images/header-style-3.jpg',
	'4'	=> get_template_directory_uri() . '/includes/images/header-style-4.jpg',
	'5'	=> get_template_directory_uri() . '/includes/images/header-style-5.jpg',
	'6'	=> get_template_directory_uri() . '/includes/images/header-style-6.jpg',
);
// Total Single Portfolio Styles
$portfolio_single_style_array = array(
	'1'	=> get_template_directory_uri() . '/includes/images/portfolio-single-style-1.jpg',
	'2'	=> get_template_directory_uri() . '/includes/images/portfolio-single-style-2.jpg',
);
// Total Single Service Styles
$service_single_style_array = array(
	'1'	=> get_template_directory_uri() . '/includes/images/service-single-style-1.jpg',
	'2'	=> get_template_directory_uri() . '/includes/images/service-single-style-2.jpg',
);
// Total Single Team Styles
$team_single_style_array = array(
	'1'	=> get_template_directory_uri() . '/includes/images/team-single-style-1.jpg',
	'2'	=> get_template_directory_uri() . '/includes/images/team-single-style-2.jpg',
);
// Social links
$social_options_array = array();
if( function_exists('pbmit_social_links_list') ){
	$social_list = pbmit_social_links_list();
	foreach( $social_list as $social ){
		$social_options_array[] = array(
			'type'			=> 'text',
			'settings'		=> esc_attr( $social['id'] ),
			'label'			=> esc_attr( $social['label'] ),
			'description'	=> esc_attr__( 'Write Social URL.', 'xclean' ),
			'default'		=> '',
		);
	}
}
$footer_col_width_array = array(
	'hide'	=> esc_attr__( 'Hide this column', 'xclean' ),
	'1'		=> esc_attr__( '1%', 'xclean' ),
	'2'		=> esc_attr__( '2%', 'xclean' ),
	'3'		=> esc_attr__( '3%', 'xclean' ),
	'4'		=> esc_attr__( '4%', 'xclean' ),
	'5'		=> esc_attr__( '5%', 'xclean' ),
	'6'		=> esc_attr__( '6%', 'xclean' ),
	'7'		=> esc_attr__( '7%', 'xclean' ),
	'8'		=> esc_attr__( '8%', 'xclean' ),
	'9'		=> esc_attr__( '9%', 'xclean' ),
	'10'	=> esc_attr__( '10%', 'xclean' ),
	'11'	=> esc_attr__( '11%', 'xclean' ),
	'12'	=> esc_attr__( '12%', 'xclean' ),
	'13'	=> esc_attr__( '13%', 'xclean' ),
	'14'	=> esc_attr__( '14%', 'xclean' ),
	'15'	=> esc_attr__( '15%', 'xclean' ),
	'16'	=> esc_attr__( '16%', 'xclean' ),
	'17'	=> esc_attr__( '17%', 'xclean' ),
	'18'	=> esc_attr__( '18%', 'xclean' ),
	'19'	=> esc_attr__( '19%', 'xclean' ),
	'20'	=> esc_attr__( '20%', 'xclean' ),
	'21'	=> esc_attr__( '21%', 'xclean' ),
	'22'	=> esc_attr__( '22%', 'xclean' ),
	'23'	=> esc_attr__( '23%', 'xclean' ),
	'24'	=> esc_attr__( '24%', 'xclean' ),
	'25'	=> esc_attr__( '25%', 'xclean' ),
	'26'	=> esc_attr__( '26%', 'xclean' ),
	'27'	=> esc_attr__( '27%', 'xclean' ),
	'28'	=> esc_attr__( '28%', 'xclean' ),
	'29'	=> esc_attr__( '29%', 'xclean' ),
	'30'	=> esc_attr__( '30%', 'xclean' ),
	'31'	=> esc_attr__( '31%', 'xclean' ),
	'32'	=> esc_attr__( '32%', 'xclean' ),
	'33'	=> esc_attr__( '33%', 'xclean' ),
	'34'	=> esc_attr__( '34%', 'xclean' ),
	'35'	=> esc_attr__( '35%', 'xclean' ),
	'36'	=> esc_attr__( '36%', 'xclean' ),
	'37'	=> esc_attr__( '37%', 'xclean' ),
	'38'	=> esc_attr__( '38%', 'xclean' ),
	'39'	=> esc_attr__( '39%', 'xclean' ),
	'40'	=> esc_attr__( '40%', 'xclean' ),
	'41'	=> esc_attr__( '41%', 'xclean' ),
	'42'	=> esc_attr__( '42%', 'xclean' ),
	'43'	=> esc_attr__( '43%', 'xclean' ),
	'44'	=> esc_attr__( '44%', 'xclean' ),
	'45'	=> esc_attr__( '45%', 'xclean' ),
	'46'	=> esc_attr__( '46%', 'xclean' ),
	'47'	=> esc_attr__( '47%', 'xclean' ),
	'48'	=> esc_attr__( '48%', 'xclean' ),
	'49'	=> esc_attr__( '49%', 'xclean' ),
	'50'	=> esc_attr__( '50%', 'xclean' ),
	'51'	=> esc_attr__( '51%', 'xclean' ),
	'52'	=> esc_attr__( '52%', 'xclean' ),
	'53'	=> esc_attr__( '53%', 'xclean' ),
	'54'	=> esc_attr__( '54%', 'xclean' ),
	'55'	=> esc_attr__( '55%', 'xclean' ),
	'56'	=> esc_attr__( '56%', 'xclean' ),
	'57'	=> esc_attr__( '57%', 'xclean' ),
	'58'	=> esc_attr__( '58%', 'xclean' ),
	'59'	=> esc_attr__( '59%', 'xclean' ),
	'60'	=> esc_attr__( '60%', 'xclean' ),
	'61'	=> esc_attr__( '61%', 'xclean' ),
	'62'	=> esc_attr__( '62%', 'xclean' ),
	'63'	=> esc_attr__( '63%', 'xclean' ),
	'64'	=> esc_attr__( '64%', 'xclean' ),
	'65'	=> esc_attr__( '65%', 'xclean' ),
	'66'	=> esc_attr__( '66%', 'xclean' ),
	'67'	=> esc_attr__( '67%', 'xclean' ),
	'68'	=> esc_attr__( '68%', 'xclean' ),
	'69'	=> esc_attr__( '69%', 'xclean' ),
	'70'	=> esc_attr__( '70%', 'xclean' ),
	'71'	=> esc_attr__( '71%', 'xclean' ),
	'72'	=> esc_attr__( '72%', 'xclean' ),
	'73'	=> esc_attr__( '73%', 'xclean' ),
	'74'	=> esc_attr__( '74%', 'xclean' ),
	'75'	=> esc_attr__( '75%', 'xclean' ),
	'76'	=> esc_attr__( '76%', 'xclean' ),
	'77'	=> esc_attr__( '77%', 'xclean' ),
	'78'	=> esc_attr__( '78%', 'xclean' ),
	'79'	=> esc_attr__( '79%', 'xclean' ),
	'80'	=> esc_attr__( '80%', 'xclean' ),
	'81'	=> esc_attr__( '81%', 'xclean' ),
	'82'	=> esc_attr__( '82%', 'xclean' ),
	'83'	=> esc_attr__( '83%', 'xclean' ),
	'84'	=> esc_attr__( '84%', 'xclean' ),
	'85'	=> esc_attr__( '85%', 'xclean' ),
	'86'	=> esc_attr__( '86%', 'xclean' ),
	'87'	=> esc_attr__( '87%', 'xclean' ),
	'88'	=> esc_attr__( '88%', 'xclean' ),
	'89'	=> esc_attr__( '89%', 'xclean' ),
	'90'	=> esc_attr__( '90%', 'xclean' ),
	'91'	=> esc_attr__( '91%', 'xclean' ),
	'92'	=> esc_attr__( '92%', 'xclean' ),
	'93'	=> esc_attr__( '93%', 'xclean' ),
	'94'	=> esc_attr__( '94%', 'xclean' ),
	'95'	=> esc_attr__( '95%', 'xclean' ),
	'96'	=> esc_attr__( '96%', 'xclean' ),
	'97'	=> esc_attr__( '97%', 'xclean' ),
	'98'	=> esc_attr__( '98%', 'xclean' ),
	'99'	=> esc_attr__( '99%', 'xclean' ),
	'100'	=> esc_attr__( '100%', 'xclean' ),
);
$blog_styles = pbmit_element_template_list('blog', 'customizer');
unset($blog_styles['classic'], $blog_styles['2']);
/*** Options array ***/
$kirki_options_array = array(
	// General Settings
	'general_options' => array(
		'section_settings' => array(
			'title'			=> esc_attr__( 'General Options', 'xclean' ),
			'panel'			=> 'xclean_base_options',
			'priority'		=> 160,
		),
		'section_fields' => array(
			array(
				'type'			=> 'color',
				'settings'		=> 'global-color',
				'label'			=> esc_attr__( 'Global Color', 'xclean' ),
				'description'	=> esc_attr__( 'This color will be globally applied to most of elements parts and special texts', 'xclean' ),
				'default'		=> '#fba311',
			),
			array(
				'type'			=> 'color',
				'settings'		=> 'secondary-color',
				'label'			=> esc_attr__( 'Secondary Color', 'xclean' ),
				'description'	=> esc_attr__( 'This color will be used on some elements. Sometimes with Global Color. This should match with Global Color to look good.', 'xclean' ),
				'default'		=> '#09042d',
			),
			array(
				'type'		=> 'multicolor',
				'settings'	=> 'gradient-color',
				'label'		=> esc_attr__( 'Gradient Color', 'xclean' ),
				'choices'		=> array(
					'first'		=> esc_attr__( 'Starting Color', 'xclean' ),
					'last'		=> esc_attr__( 'Ending Color', 'xclean' ),
				),
				'default'	=> array(
				'first'		=> '#fba311',
				'last'		=> '#f2b210',
				),
			),
			array(
				'type'				=> 'image',
				'settings'			=> 'logo',
				'label'				=> esc_attr__( 'Logo', 'xclean' ),
				'description'		=> esc_attr__( 'Main logo', 'xclean' ),
				'default'			=> get_template_directory_uri() . '/images/logo.svg',
				'partial_refresh'	=> array(
					'logo'				=> array(
						'selector'			=> '.site-title',
						'render_callback'	=> function() {
							return pbmit_logo( 'yes' );
						},
					)
				),
			),
			array(
				'type'			=> 'number',
				'settings'		=> 'logo-height',
				'label'			=> esc_attr__( 'Logo Max Height', 'xclean' ),
				'default'		=> 50,
				'choices'		=> array(
					'min'			=> 1,
					'max'			=> 1000,
					'step'			=> 1,
				),
			),
			array(
				'type'			=> 'image',
				'settings'		=> 'sticky-logo',
				'label'			=> esc_attr__( 'Sticky Logo', 'xclean' ),
				'description'	=> esc_attr__( 'Sticky logo', 'xclean' ),
				'default'		=> '',
				'active_callback'=> array( array(
					'setting' => 'sticky-header',
					'operator' => '==',
					'value' => '1',
				) ),
			),
			array(
				'type'			=> 'number',
				'settings'		=> 'sticky-logo-height',
				'label'			=> esc_attr__( 'Sticky Logo Max Height', 'xclean' ),
				'default'		=> 50,
				'choices'		=> array(
					'min'			=> 1,
					'max'			=> 1000,
					'step'			=> 1,
				),
				'active_callback'=> array( array(
					'setting' => 'sticky-header',
					'operator' => '==',
					'value' => '1',
				) ),
			),
			array(
				'type'			=> 'image',
				'settings'		=> 'responsive-logo',
				'label'			=> esc_attr__( 'Responsive Logo', 'xclean' ),
				'description'	=> esc_attr__( 'This logo appear in small devices like mobile/tablet etc', 'xclean' ),
				'default'		=> '',
			),
			array(
				'type'			=> 'number',
				'settings'		=> 'responsive-logo-height',
				'label'			=> esc_attr__( 'Responsive Logo Max Height', 'xclean' ),
				'default'		=> 50,
				'choices'		=> array(
					'min'			=> 1,
					'max'			=> 1000,
					'step'			=> 1,
				),
			),
			array(
				'type'		=> 'multicolor',
				'settings'	=> 'link-color',
				'label'		=> esc_attr__( 'Link Color', 'xclean' ),
				'choices'		=> array(
					'normal'	=> esc_attr__( 'Normal Color', 'xclean' ),
					'hover'		=> esc_attr__( 'Mouse-Over (Hover) Color', 'xclean' ),
				),
				'default'	=> array(
					'normal'	=> '#001837',
					'hover'		=> '#fba311',
				),
			),
			array(
				'type'			=> 'switch',
				'settings'		=> 'preloader',
				'label'			=> esc_attr__( 'Show Preloader?', 'xclean' ),
				'description'	=> esc_attr__( 'Show or hide preloader', 'xclean' ),
				'default'		=> '0',
				'choices'		=> array(
					'on'  => esc_attr__( 'Yes', 'xclean' ),
					'off' => esc_attr__( 'No', 'xclean' ),
				),
			),
			array(
				'type'			=> 'radio-image',
				'settings'		=> 'preloader-image',
				'label'			=> esc_html__( 'Select preloader image', 'xclean' ),
				'default'		=> '1',
				'choices'		=> array(
					'1'   => get_template_directory_uri() . '/images/loader1.svg',
					'2'   => get_template_directory_uri() . '/images/loader2.svg',
					'3'   => get_template_directory_uri() . '/images/loader3.svg',
					'4'   => get_template_directory_uri() . '/images/loader4.svg',
					'5'   => get_template_directory_uri() . '/images/loader5.svg',
					'6'   => get_template_directory_uri() . '/images/loader6.svg',
					'7'   => get_template_directory_uri() . '/images/loader7.svg',
					'8'   => get_template_directory_uri() . '/images/loader8.svg',
					'9'   => get_template_directory_uri() . '/images/loader9.svg',
				),
				'active_callback'=> array( array(
					'setting' => 'preloader',
					'operator' => '==',
					'value' => '1',
				) ),
			),
			array(
				'type'		=> 'radio-image',
				'settings'	=> 'sidebar-page',
				'label'		=> esc_html__( 'Page Sidebar', 'xclean' ),
				'default'	=> 'no',
				'choices'		=> array(
					'left'		=> get_template_directory_uri() . '/includes/images/sidebar-left.png',
					'right'		=> get_template_directory_uri() . '/includes/images/sidebar-right.png',
					'no'		=> get_template_directory_uri() . '/includes/images/sidebar-no.png',
				),
			),
			// Advanced Settings
			array(
				'type'			=> 'custom',
				'settings'		=> 'custom-advanced-options',
				'default'		=> '<div class="pbminfotech-option-heading"><h2>' . esc_html__( 'Advanced Settings', 'xclean' ) . '</h2> <span>' . esc_html__( 'Special advanced options', 'xclean' ) . '</span></div>',
			),
			array(
				'type'			=> 'color',
				'settings'		=> 'body-bg-color',
				'label'			=> esc_attr__( 'Body Background Color', 'xclean' ),
				'description'	=> esc_attr__( 'This is default Body background color.', 'xclean' ),
				'default'		=> '#ffffff',
			),
			array(
				'type'		=> 'switch',
				'settings'	=> 'min',
				'label'	   => esc_attr__( 'Load Minified CSS and JS Files?', 'xclean' ),
				'description' => esc_attr__( 'Load minified files for CSS and JS code files. Select YES to reduce page load time.', 'xclean' ),
				'default'	 => '1',
				'choices'	 => array(
					'on'  => esc_attr__( 'Yes', 'xclean' ),
					'off' => esc_attr__( 'No', 'xclean' ),
				),
			),
			array(
				'type'			=> 'switch',
				'settings'		=> 'hide_totop_button',
				'label'			=> esc_attr__( 'Hide Scroll to Top Button', 'xclean' ),
				'description'	=> esc_attr__( 'Show or hide Scroll to Top ( Totop ) Button.', 'xclean' ),
				'default'		=> '0',
				'choices'		=> array(
					'on'			=> esc_attr__( 'Yes', 'xclean' ),
					'off'			=> esc_attr__( 'No', 'xclean' ),
				),
			),
			array(
				'type'			=> 'color',
				'settings'		=> 'white-color',
				'label'			=> esc_attr__( 'White Color', 'xclean' ),
				'description'	=> esc_attr__( 'This is default white background color.', 'xclean' ),
				'default'		=> '#ffffff',
			),
			array(
				'type'			=> 'color',
				'settings'		=> 'light-bg-color',
				'label'			=> esc_attr__( 'Light Background Color', 'xclean' ),
				'description'	=> esc_attr__( 'This is default grey background color.', 'xclean' ),
				'default'		=> '#f0f2f4',
			),
			array(
				'type'			=> 'color',
				'settings'		=> 'blackish-color',
				'label'			=> esc_attr__( 'Blackish Text Color', 'xclean' ),
				'description'	=> esc_attr__( 'This is default blackish color for text.', 'xclean' ),
				'default'		=> '#001837',
			),
			array(
				'type'			=> 'color',
				'settings'		=> 'blackish-bg-color',
				'label'			=> esc_attr__( 'Blackish Background Color', 'xclean' ),
				'description'	=> esc_attr__( 'This is default blackish background color.', 'xclean' ),
				'default'		=> '#001837',
			),
			// Global image quality
			array(
				'type'			=> 'custom',
				'settings'		=> 'custom-image-qualityc-options',
				'default'		=> '<div class="pbminfotech-option-heading"><h2>' . esc_html__( 'Image quality Settings', 'xclean' ) . '</h2></div>',
			),
			array(
				'type'			=> 'select',
				'settings'		=> 'image-quality',
				'label'			=> esc_attr__( 'Image quality', 'xclean' ),
				'description'	=> esc_attr__( 'Select image quality level. Default is "82%". This will effect JPG and JPEG images only.', 'xclean' ),
				'default'		=> esc_attr('82'),
				'choices'		=>  array(
					'75'			=> esc_attr__( '75', 'xclean' ),
					'80'			=> esc_attr__( '80', 'xclean' ),
					'82'			=> esc_attr__( '82 (default)', 'xclean' ),
					'85'			=> esc_attr__( '85', 'xclean' ),
					'90'			=> esc_attr__( '90', 'xclean' ),
					'95'			=> esc_attr__( '95', 'xclean' ),
					'100'			=> esc_attr__( '100', 'xclean' ),
				),
			),
		)
	),
	// Typography Settings
	'typography_options' => array(
		'section_settings' => array(
			'title'			=> esc_attr__( 'Typography Options', 'xclean' ),
			'panel'			=> 'xclean_base_options',
			'priority'		=> 160,
		),
		'section_fields' => array(
			array(
				'type'			=> 'typography',
				'settings'		=> 'global-typography',
				'label'			=> esc_attr__( 'Global Typography', 'xclean' ),
				'choices'		=> [ 'fonts' => [ 'google' => [ 'popularity', 1000 ], ], ],
				'default'		=> array (
					'font-family'		=> 'Open Sans',
					'variant'			=> '400',
					'font-size'			=> '15px',
					'line-height'		=> '1.6',
					'letter-spacing'	=> '0px',
					'color'				=> '#565656',
					'text-transform'	=> 'none',
					'font-backup'		=> '',
					'font-style'		=> 'normal',
				),
				'priority'			=> 10,
				'pbmit-output'		=> 'body',
				'pbmit-all-variants'	=> true,
			),
			array(
				'type'			=> 'typography',
				'settings'		=> 'h1-typography',
				'label'			=> esc_attr__( 'H1 Typography', 'xclean' ),
				'tooltip'	 => esc_attr__( 'This is tooltip', 'xclean' ),
				'choices'		=> [ 'fonts' => [ 'google' => [ 'popularity', 1000 ], ], ],
				'default'		=> array(
					'font-family'		=> 'Quicksand',
					'variant'			=> '700',
					'font-size'			=> '46px',
					'line-height'		=> '56px',
					'letter-spacing'	=> '0',
					'color'				=> '#001837',
					'text-transform'	=> 'none',
					'font-backup'		=> '',
					'font-style'		=> 'normal',
				),
				'priority'		=> 10,
				'pbmit-output'	=> 'h1',
			),
			array(
				'type'			=> 'typography',
				'settings'		=> 'h2-typography',
				'label'			=> esc_attr__( 'H2 Typography', 'xclean' ),
				'choices'		=> [ 'fonts' => [ 'google' => [ 'popularity', 1000 ], ], ],
				'default'		=> array(
					'font-family'		=> 'Quicksand',
					'variant'			=> '700',
					'font-size'			=> '40px',
					'line-height'		=> '50px',
					'letter-spacing'	=> '0',
					'color'				=> '#001837',
					'text-transform'	=> 'none',
					'font-backup'		=> '',
					'font-style'		=> 'normal',
				),
				'priority'		=> 10,
				'pbmit-output'	=> 'h2',
			),
			array(
				'type'			=> 'typography',
				'settings'		=> 'h3-typography',
				'label'			=> esc_attr__( 'H3 Typography', 'xclean' ),
				'choices'		=> [ 'fonts' => [ 'google' => [ 'popularity', 1000 ], ], ],
				'default'		=> array(
					'font-family'		=> 'Quicksand',
					'variant'			=> '700',
					'font-size'			=> '36px',
					'line-height'		=> '46px',
					'letter-spacing'	=> '0',
					'color'				=> '#001837',
					'text-transform'	=> 'none',
					'font-backup'		=> '',
					'font-style'		=> 'normal',
				),
				'priority'		=> 10,
				'pbmit-output'	=> 'h3',
			),
			array(
				'type'			=> 'typography',
				'settings'		=> 'h4-typography',
				'label'			=> esc_attr__( 'H4 Typography', 'xclean' ),
				'choices'		=> [ 'fonts' => [ 'google' => [ 'popularity', 1000 ], ], ],
				'default'		=> array(
					'font-family'		=> 'Quicksand',
					'variant'			=> '700',
					'font-size'			=> '30px',
					'line-height'		=> '40px',
					'letter-spacing'	=> '0',
					'color'				=> '#001837',
					'text-transform'	=> 'none',
					'font-backup'		=> '',
					'font-style'		=> 'normal',
				),
				'priority'		=> 10,
				'pbmit-output'	=> 'h4',
			),
			array(
				'type'			=> 'typography',
				'settings'		=> 'h5-typography',
				'label'			=> esc_attr__( 'H5 Typography', 'xclean' ),
				'choices'		=> [ 'fonts' => [ 'google' => [ 'popularity', 1000 ], ], ],
				'default'		=> array(
					'font-family'		=> 'Quicksand',
					'variant'			=> '700',
					'font-size'			=> '24px',
					'line-height'		=> '34px',
					'letter-spacing'	=> '0',
					'color'				=> '#001837',
					'text-transform'	=> 'none',
					'font-backup'		=> '',
					'font-style'		=> 'normal',
				),
				'priority'		=> 10,
				'pbmit-output'	=> 'h5',
			),
			array(
				'type'			=> 'typography',
				'settings'		=> 'h6-typography',
				'label'			=> esc_attr__( 'H6 Typography', 'xclean' ),
				'choices'		=> [ 'fonts' => [ 'google' => [ 'popularity', 1000 ], ], ],
				'default'		=> array(
					'font-family'		=> 'Quicksand',
					'variant'			=> '700',
					'font-size'			=> '20px',
					'line-height'		=> '30px',
					'letter-spacing'	=> '0',
					'color'				=> '#001837',
					'text-transform'	=> 'none',
					'font-backup'		=> '',
					'font-style'		=> 'normal',
				),
				'priority'		=> 10,
				'pbmit-output'	=> 'h6',
			),
			// Heading Options
			array(
				'type'			=> 'custom',
				'settings'		=> 'custom-heading',
				'default'		=> '<div class="pbminfotech-option-heading"><h2>' . esc_html__( 'Special Heading Typography', 'xclean' ) . '</h2> <span>' . esc_html__( 'Heading typography options', 'xclean' ) . '</span></div>',
			),
			array(
				'type'			=> 'typography',
				'settings'		=> 'heading-typography',
				'label'			=> esc_attr__( 'Heading Typography', 'xclean' ),
				'choices'		=> [ 'fonts' => [ 'google' => [ 'popularity', 1000 ], ], ],
				'default'		=> array(
					'font-family'		=> 'Quicksand',
					'variant'			=> '700',
					'font-size'			=> '55px',
					'line-height'		=> '60px',
					'letter-spacing'	=> '0.25px',
					'color'				=> '#001837',
					'text-transform'	=> 'none',
					'font-backup'		=> '',
					'font-style'		=> 'normal',
				),
				'priority'		=> 10,
				'pbmit-output'	=> '.pbmit-heading-subheading .pbmit-element-title',
			),
			array(
				'type'			=> 'typography',
				'settings'		=> 'subheading-typography',
				'label'			=> esc_attr__( 'Sub-heading Typography', 'xclean' ),
				'choices'		=> [ 'fonts' => [ 'google' => [ 'popularity', 1000 ], ], ],
				'default'		=> array(
					'font-family'		=> 'Quicksand',
					'variant'			=> '700',
					'font-size'			=> '13px',
					'line-height'		=> '24px',
					'letter-spacing'	=> '0.5px',
					'color'				=> '#001837',
					'text-transform'	=> 'uppercase',
					'font-backup'		=> '',
					'font-style'		=> 'normal',
				),
				'priority'		=> 10,
				'pbmit-output'	=> '.pbmit-heading-subheading .pbmit-element-subtitle,.pbmit-element-subtitle-new',
			),
			array(
				'type'			=> 'typography',
				'settings'		=> 'content-typography',
				'label'			=> esc_attr__( 'Content Typography', 'xclean' ),
				'choices'		=> [ 'fonts' => [ 'google' => [ 'popularity', 1000 ], ], ],
				'default'		=> array(
					'font-family'		=> 'Open Sans',
					'variant'			=> '400',
					'font-size'			=> '16px',
					'line-height'		=> '26px',
					'letter-spacing'	=> '0px',
					'color'				=> '#565656',
					'text-transform'	=> 'none',
					'font-backup'		=> '',
					'font-style'		=> 'normal',
				),
				'priority'		=> 10,
				'pbmit-output'	=> '.pbmit-heading-subheading .pbmit-heading-desc',
			),
			array(
				'type'			=> 'typography',
				'settings'		=> 'widget-heading-typography',
				'label'			=> esc_attr__( 'Widget Heading Typography', 'xclean' ),
				'choices'		=> [ 'fonts' => [ 'google' => [ 'popularity', 1000 ], ], ],
				'default'		=> array(
					'font-family'		=> 'Quicksand',
					'variant'			=> '700',
					'font-size'			=> '24px',
					'line-height'		=> '30px',
					'letter-spacing'	=> '0px',
					'color'				=> '#001837',
					'text-transform'	=> 'capitalize',
					'font-backup'		=> '',
					'font-style'		=> 'normal',
				),
				'priority'		=> 10,
				'pbmit-output'	=> '			
				.pbminfotech-sidebar .widget_search .wp-block-search__label, .pbminfotech-sidebar .widget_block .wp-block-group h2, 
				.widget-title, .pbmit-footer-copyright-box h3',
			),
			array(
				'type'			=> 'typography',
				'settings'		=> 'footer-widget-heading-typography',
				'label'			=> esc_attr__( 'Footer Widget Heading Typography', 'xclean' ),
				'choices'		=> [ 'fonts' => [ 'google' => [ 'popularity', 1000 ], ], ],
				'default'		=> array(
					'font-family'		=> 'Quicksand',
					'variant'			=> '700',
					'font-size'			=> '18px',
					'line-height'		=> '26px',
					'letter-spacing'	=> '0px',
					'color'				=> '#ffffff',
					'text-transform'	=> 'capitalize',
					'font-backup'		=> '',
					'font-style'		=> 'normal',
				),
				'priority'		=> 10,
				'pbmit-output'	=> '.pbmit-footer-widget .widget .widget-title',
			),
			array(
				'type'			=> 'typography',
				'settings'		=> 'buttons-typography',
				'label'			=> esc_attr__( 'Button Typography', 'xclean' ),
				'choices'		=> [ 'fonts' => [ 'google' => [ 'popularity', 1000 ], ], ],
				'default'		=> array(
					'font-family'		=> 'Quicksand',
					'variant'			=> '600',
					'font-size'			=> '15px',
					'line-height'		=> '24px',
					'letter-spacing'	=> '0px',
					'text-transform'	=> 'capitalize',					
					'font-style'		=> 'normal',
				),
				'pbmit-output'	=> '.pbmit-search-results-back-global-btn a, .pbmit-search-results-load-btn a, .pbmit-read-more-link a, .pbmit-service-btn, .pbmit-blog-btn, .pbmit-price-btn a, .woocommerce ul.products li.product .onsale, .woocommerce div.product .woocommerce-tabs ul.tabs li a, .elementor-widget-button .elementor-button, .pbmit-ihbox-btn a, .woocommerce .woocommerce-message .button, .woocommerce div.product form.cart .button, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, button, html input[type=button], input[type=reset], input[type=submit], .pbmit-ajax-load-more-btn a, .pbmit-header-button2 a, .pbmit-form .wpcf7-submit, .woocommerce-cart .wc-block-grid__product-add-to-cart.wp-block-button .add_to_cart_button, .wc-block-components-button:not(.is-link),.wc-block-grid .wc-block-grid__products .wc-block-grid__product-onsale, .woocommerce span.onsale, .pbminfotech-ele-product-menu .pbmit-product-contents .price, .pbmit-header-button, .pbmit-ads-btn a, .error-404 .pbmit-home-back',
			),
			// Extra Load Fonts Options
			array(
				'type'			=> 'custom',
				'settings'		=> 'css-only-custom-heading',
				'default'		=> '<div class="pbminfotech-option-heading"><h2>' . esc_html__( 'CSS only Typography', 'xclean' ) . '</h2> <span>' . esc_html__( 'This will not apply to any font style but this font will be loaded so we can use anywhere.', 'xclean' ) . '</span></div>',
			),
			array(
				'type'			=> 'typography',
				'settings'		=> 'css-only-1-typography',
				'label'			=> esc_attr__( 'First Typography', 'xclean' ),
				'choices'		=> [ 'fonts' => [ 'google' => [ 'popularity', 1000 ], ], ],
				'default'		=> array(
					'font-family'		=> 'Quicksand',
					'variant'			=> 'normal',
					'font-style'		=> 'normal',
					'font-backup'		=> '',
				),
				'pbmit-output'	=> '.single-post .pbmit-blog-list-ele li',
			),
			array(
				'type'			=> 'typography',
				'settings'		=> 'css-only-2-typography',
				'label'			=> esc_attr__( 'Second Typography', 'xclean' ),
				'choices'		=> [ 'fonts' => [ 'google' => [ 'popularity', 1000 ], ], ],
				'default'		=> array(
					'font-family'		=> 'Quicksand',
					'variant'			=> '500',
					'font-style'		=> 'normal',
					'font-backup'		=> '',
				),
				'pbmit-output'	=> '.elementor-widget .elementor-icon-list-items .elementor-icon-list-icon+.elementor-icon-list-text,.pbmit-tabs .pbmit-tab-list ul li,.site .elementor-accordion .elementor-tab-title, .site-content .widget.widget_categories ul li .pbmit-brackets,ul.wp-block-categories li .pbmit-cat-li a, ul.wp-block-archives li .pbmit-arc-li a, .site-content .widget.widget_categories ul li a, .site-content .widget.widget_archive ul li .pbmit-arc-li>a, .reply a, .site-content .widget_product_categories ul li a,.wc-block-components-totals-item__value,.woocommerce ul.order_details li strong,.pbmit-subheading-color .pbmit-heading-subheading h4.pbmit-element-subtitle,.pbmit-text-design,.pbmit-search-results-main-wrapper.skltbs-theme-light .skltbs-tab,.elementor-tabs .elementor-tabs-content-wrapper .pbmit-tab-list ul li,.elementor-widget-tabs .elementor-tab-desktop-title, .pbmit-ihbox-style-4 .pbmit-element-subtitle, .pbmit-comment-date, .pbm_addons_recent_posts_widget .pbmit-rpw-content .pbmit-rpw-date a',
			),
			array(
				'type'			=> 'typography',
				'settings'		=> 'css-only-3-typography',
				'label'			=> esc_attr__( 'Third Typography', 'xclean' ),
				'choices'		=> [ 'fonts' => [ 'google' => [ 'popularity', 1000 ], ], ],
				'default'		=> array(
					'font-family'		=> 'Quicksand',
					'variant'			=> '700',
					'font-style'		=> 'normal',
					'font-backup'		=> '',
				),
				'pbmit-output'	=> 'blockquote, .pbmit-tab-content-title, .pbmit-tab-link, .elementor-tabs .elementor-tabs-content-wrapper .pbmit-tab-number, .pbmit-ihbox-icon-type-text, .pbminfotech-ele-fid-style-1 .pbmit-fid-inner, .pbmit-ihbox .pbmit-ihbox-box-number, .pbmit-ptable-price-w, .pbmit-ptablebox-featured-w, .pbminfotech-ptable-frequency, .pbmit-element-timeline-style-1 .pbmit-timeline-year, .pbmit-element-timeline-style-2 .pbmit-ourhistory-type2 .label, .elementor-widget-progress .elementor-title, body .elementor-progress-percentage, .post-navigation .nav-links .nav-title, .pbmit-author-content .pbmit-author-name, .pbmit-comment-content .pbmit-comment-author, .pbm_addons_recent_posts_widget .pbmit-rpw-content .pbmit-rpw-title a, .pbmit-portfolio-lines-wrapper .pbmit-portfolio-line-title, .pbmit-team-single .pbmit-single-team-info li label',
			),
			array(
				'type'			=> 'typography',
				'settings'		=> 'css-only-4-typography',
				'label'			=> esc_attr__( 'Fourth Typography', 'xclean' ),
				'choices'		=> [ 'fonts' => [ 'google' => [ 'popularity', 1000 ], ], ],
				'default'		=> array(
					'font-family'		=> 'Open Sans',
					'variant'			=> 'regular',
					'font-style'		=> 'normal',
					'font-backup'		=> '',
				),
				'pbmit-output'	=> '.comment-respond input[type="number"],.comment-respond input[type="text"],.comment-respond input[type="email"],.comment-respond input[type="password"],.comment-respond input[type="tel"],.comment-respond input[type="url"],.comment-respond input[type="search"],.comment-respond textarea,.pbmit-comment-content p, .pbmit-ihbox-style-12 .pbmit-element-subtitle, .pbminfotech-ele-fid-style-4 .pbmit-fid-inner',
			),
			array(
				'type'			=> 'typography',
				'settings'		=> 'css-only-5-typography',
				'label'			=> esc_attr__( 'Fifth Typography', 'xclean' ),
				'choices'		=> [ 'fonts' => [ 'google' => [ 'popularity', 1000 ], ], ],
				'default'		=> array(
					'font-family'		=> 'Open Sans',
					'variant'			=> '700',
					'font-style'		=> 'normal',
					'font-backup'		=> '',
				),
				'pbmit-output'	=> '.pbmit-marquee-effect-style-1 .pbmit-element-title',
			),
			array(
				'type'			=> 'typography',
				'settings'		=> 'css-only-6-typography',
				'label'			=> esc_attr__( 'Sixth Typography', 'xclean' ),
				'choices'		=> [ 'fonts' => [ 'google' => [ 'popularity', 1000 ], ], ],
				'default'		=> array(
					'font-family'		=> 'Open Sans',
					'variant'			=> '800',
					'font-style'		=> 'normal',
					'font-backup'		=> '',
				),
				'pbmit-output'	=> '.pbminfotech-ele-fid-style-2 .pbmit-fid-inner, .pbminfotech-ele-fid-style-3 .pbmit-fid-inner, .pbmit-ihbox-style-12 .pbmit-ihbox-box-number, .pbmit-ihbox-style-14.pbmit-ihbox .pbmit-ihbox-box-number',
			),
		)
	),
	// Pre-Header Options
	'preheader_options'	=> array(
		'section_settings'	=> array(
			'title'				=> esc_attr__( 'Pre-Header Options', 'xclean' ),
			'panel'				=> 'xclean_base_options',
			'priority'			=> 160,
		),
		'section_fields' => array(
			array(
				'type'			=> 'switch',
				'settings'		=> 'preheader-enable',
				'label'			=> esc_attr__( 'Show or hide Pre-header', 'xclean' ),
				'default'		=> '0',
				'choices'		=> array(
					'on'			=> esc_attr__( 'Show', 'xclean' ),
					'off'			=> esc_attr__( 'Hide', 'xclean' ),
				),
			),
			array(
				'type'				=> 'radio-image',
				'settings'			=> 'preheader-text-color',
				'label'				=> esc_attr__( 'Select pre-header text color', 'xclean' ),
				'default'			=> 'blackish',
				'choices'			=> $pre_text_color_list,
				'active_callback'	=> array(
					array(
						'setting'		=> 'preheader-enable',
						'operator'		=> '==',
						'value'			=> '1',
					)
				),
			),
			array(
				'type'				=> 'radio-image',
				'settings'			=> 'preheader-bgcolor',
				'label'				=> esc_html__( 'Select pre-header background color', 'xclean' ),
				'default'			=> 'transparent',
				'choices'			=> $pre_color_list,
				'active_callback'	=> array( array(
					'setting'			=> 'preheader-enable',
					'operator'			=> '==',
					'value'				=> '1',
				) ),
			),
			array(
				'type'			=> 'color',
				'settings'		=> 'preheader-bgcolor-custom',
				'label'			=> esc_attr__( 'Select pre-header background custom color', 'xclean' ),
				'description'	=> esc_attr__( 'Select custom color for pre-header background', 'xclean' ),
				'default'		=> '#001837',
				'active_callback'=> array(
					array(
						'setting'	=> 'preheader-bgcolor',
						'operator'	=> '==',
						'value'		=> 'custom',
					),
					array(
						'setting'			=> 'preheader-enable',
						'operator'			=> '==',
						'value'				=> '1',
					)
				),
			),
			array(
				'type'			=> 'custom',
				'settings'		=> 'preheader-content-heading',
				'default'		=> '<div class="pbminfotech-option-heading"><h2>' . esc_html__( 'Preheader content', 'xclean' ) . '</h2> <span>' . esc_attr__( 'Manage preheader content from here', 'xclean' ) . '</span></div>',
				'active_callback'	=> array( array(
					'setting'			=> 'preheader-enable',
					'operator'			=> '==',
					'value'				=> '1',
				) ),
			),
			array(
				'type'			=> 'textarea',
				'settings'		=> 'preheader-left',
				'label'			=> esc_attr__( 'Pre-header Left Content', 'xclean' ),
				'default'		=> pbmit_esc_kses('<ul class="pbmit-contact-info"><li><i class="pbmit-base-icon-placeholder"></i>Los Angeles Gournadi, 1230 Bariasl</li><li><i class="pbmit-base-icon-mail-inbox"></i>noreply@pbminfotech.com</li><li><i class="pbmit-base-icon-phone-call"></i>+(123) 1234-567-8901</li></ul>'),
				'active_callback'	=> array( array(
					'setting'			=> 'preheader-enable',
					'operator'			=> '==',
					'value'				=> '1',
				) ),
				'partial_refresh'	=> array(
					'preheader-left'		=> array(
						'selector'			=> '.pbmit-pre-header-left',
						'render_callback'	=> function() {
							return get_theme_mod('preheader-left');
						},
					)
				),
			),
			array(
				'type'			=> 'textarea',
				'settings'		=> 'preheader-right',
				'label'			=> esc_attr__( 'Pre-header Right Content', 'xclean' ),
				'default'		=> pbmit_esc_kses('[pbmit-social-links]'),
				'active_callback'	=> array( array(
					'setting'			=> 'preheader-enable',
					'operator'			=> '==',
					'value'				=> '1',
				) ),
				'partial_refresh'	=> array(
					'preheader-right'		=> array(
						'selector'			=> '.pbmit-pre-header-right',
						'render_callback'	=> function() {
							return get_theme_mod('preheader-right');
						},
					)
				),
			),
			array(
				'type'			=> 'switch',
				'settings'		=> 'preheader-search',
				'label'			=> esc_attr__( 'Show Search Icon in Pre-header Right Area?', 'xclean' ),
				'description'	=> esc_attr__( 'Select YES to show search icon in pre-header right side.', 'xclean' ),
				'default'		=> '0',
				'choices'		=> array(
					'on'  => esc_attr__( 'Yes', 'xclean' ),
					'off' => esc_attr__( 'No', 'xclean' ),
				),
				'active_callback'	=> array( array(
					'setting'			=> 'preheader-enable',
					'operator'			=> '==',
					'value'				=> '1',
				) ),
			),
		),
	),
	// Header Options
    'header_options'    => array(
        'section_settings'  => array(
            'title'             => esc_attr__( 'Header Options', 'xclean' ),
            'panel'             => 'xclean_base_options',
            'priority'          => 160,
        ),
        'section_fields' => array(
            array(
                'type'          => 'radio-image',
                'settings'      => 'header-style',
                'label'         => esc_html__( 'Header Style', 'xclean' ),
                'description'   => '<div class="pbmit-alert-message">'.esc_html__( 'NOTE: This will also change other options (like background color, menu color, logo etc) to set it with this header.', 'xclean' ).'</div>',
                'default'       => '1',
                'choices'       => $header_style_array,
            ),
            // Header button
            array(
                'type'              => 'custom',
                'settings'          => 'custom-header-button-options',
                'default'           => '<div class="pbminfotech-option-heading"><h2>' . esc_html__( 'Header Button', 'xclean' ) . '</h2> <span>' . esc_html__( 'Set header button title and link', 'xclean' ) . '</span></div>',
                'active_callback'   => array(
                    array(
						array(
							'setting'   => 'header-style',
							'operator'  => '==',
							'value'     => '2',
						),
						array(
							'setting'   => 'header-style',
							'operator'  => '==',
							'value'     => '3',
						),
						array(
							'setting'   => 'header-style',
							'operator'  => '==',
							'value'     => '5',
						),
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '6',
						),
                    )
                ),
            ),
            array(
                'type'              => 'text',
                'settings'          => 'header-btn-text',
                'label'             => esc_attr__( 'Header Button Text (1st line)', 'xclean' ),
                'default'           => esc_attr__( '+1(212)255-511', 'xclean' ),
                'active_callback'   => array(
                    array(
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '2',
						),
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '3',
						),
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '5',
						),
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '6',
						),
                    )
                ),
				'partial_refresh'   => array(
					'header-btn-text'  => array(
						'selector'          => '.pbmit-header-button',
						'render_callback'   => function() {
							return pbmit_header_button( array('inneronly'=>'yes') );
						},
					)
				),
            ),
			array(
                'type'              => 'text',
                'settings'          => 'header-btn-text2',
                'label'             => esc_attr__( 'Header Button Text (2nd line)', 'xclean' ),
                'default'           => esc_attr__( 'Call Us Now', 'xclean' ),
                'active_callback'   => array(
                    array(
                        array(
                            'setting'   => 'header-style',
                            'operator'  => '==',
                            'value'     => '',
                        ),
                    )
                ),             
            ),
            array(
                'type'              => 'text',
                'settings'          => 'header-btn-url',
                'label'             => esc_attr__( 'Header Button Link (URL)', 'xclean' ),
                'default'           => esc_url('tel:+1(212)255-511'),
                'active_callback'   => array(
                    array(
						array(
							'setting'   => 'header-style',
							'operator'  => '==',
							'value'     => '2',
						),
						array(
							'setting'   => 'header-style',
							'operator'  => '==',
							'value'     => '3',
						),
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '5',
						),
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '6',
						),
                    )
                ),
            ),
			// Header Second button
			array(
				'type'				=> 'custom',
				'settings'			=> 'custom-header-button2-options',
				'default'			=> '<div class="pbminfotech-option-heading"><h2>' . esc_html__( 'Header Button Second', 'xclean' ) . '</h2> <span>' . esc_html__( 'Set header button title and link', 'xclean' ) . '</span></div>',
				'active_callback'	=> array(
					array(
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '2',
						),
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '3',
						),
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '4',
						),
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '5',
						),
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '6',
						),
					)
				),
			),
			array(
				'type'				=> 'text',
				'settings'			=> 'header-btn2-text',
				'label'				=> esc_attr__( 'Header Button Text', 'xclean' ),
				'default'			=> esc_attr__( 'Get a Quote', 'xclean' ),
				'active_callback'	=> array(
					array(
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '2',
						),
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '3',
						),
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '4',
						),
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '5',
						),
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '6',
						),
					)
				),
				'partial_refresh'	=> array(
					'header-btn2-text'	=> array(
						'selector'			=> '.pbmit-header-button2',
						'render_callback'	=> function() {
							return pbmit_header_button_second( array('inneronly'=>'yes') );
						},
					)
				),
			),
			array(
				'type'				=> 'text',
				'settings'			=> 'header-btn2-url',
				'label'				=> esc_attr__( 'Header Button Link (URL)', 'xclean' ),
				'default'			=> '',
				'active_callback'	=> array(
					array(
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '2',
						),
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '3',
						),
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '4',
						),
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '5',
						),
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '6',
						),
					)
				),
			),
			array(
				'type'			=> 'custom',
				'settings'		=> 'custom-header-options',
				'default'		=> '<div class="pbminfotech-option-heading"><h2>' . esc_html__( 'General Options', 'xclean' ) . '</h2> <span>' . esc_html__( 'Common options that apply to all header styles', 'xclean' ) . '</span></div>',
			),
			array(
				'type'			=> 'number',
				'settings'		=> 'header-height',
				'label'			=> esc_attr__( 'Header Height (in pixel)', 'xclean' ),
				'description'	=> esc_attr__( 'Select header height', 'xclean' ),
				'default'		=> 100,
				'choices'		=> array(
					'min'			=> 1,
					'max'			=> 900,
					'step'			=> 1,
				),
			),
			array(
				'type'				=> 'radio-image',
				'settings'			=> 'header-bgcolor',
				'label'				=> esc_html__( 'Select header background color', 'xclean' ),
				'default'			=> 'transparent',
				'choices'			=> $pre_color_list,
			),
			array(
				'type'			=> 'color',
				'settings'		=> 'header-background-color',
				'label'			=> esc_attr__( 'Header Background Color', 'xclean' ),
				'description'	=> esc_attr__( 'Select custom color for header background', 'xclean' ),
				'default'		=> '#ffffff',
				'active_callback'=> array(
					array(
						'setting'	=> 'header-bgcolor',
						'operator'	=> '==',
						'value'		=> 'custom',
					)
				),
			),
			// Search in Header
			array(
				'type'			=> 'custom',
				'settings'		=> 'custom-search-header-options',
				'default'		=> '<div class="pbminfotech-option-heading"><h2>' . esc_html__( 'Search in Header', 'xclean' ) . '</h2> <span>' . esc_html__( 'Options for search in header area', 'xclean' ) . '</span></div>',
			),
			array(
				'type'			=> 'switch',
				'settings'		=> 'header-search',
				'label'			=> esc_attr__( 'Show Search Icon in Header Area?', 'xclean' ),
				'description'	=> esc_attr__( 'Select YES to show search icon in header area.', 'xclean' ),
				'default'		=> 0,
				'choices'		=> array(
					'on'  => esc_attr__( 'Yes', 'xclean' ),
					'off' => esc_attr__( 'No', 'xclean' ),
				),
			),
			// Sticky Header
			array(
				'type'			=> 'custom',
				'settings'		=> 'custom-sticky-header-options',
				'default'		=> '<div class="pbminfotech-option-heading"><h2>' . esc_html__( 'Sticky Header Options', 'xclean' ) . '</h2> <span>' . esc_html__( 'Options for sticky header area', 'xclean' ) . '</span></div>',
			),
			array(
				'type'			=> 'switch',
				'settings'		=> 'sticky-header',
				'label'			=> esc_attr__( 'Sticky Header on Scroll?', 'xclean' ),
				'description'	=> esc_attr__( 'Select YES to make header sticky on scroll.', 'xclean' ),
				'default'		=> '0',
				'choices'		=> array(
					'on'  => esc_attr__( 'Yes', 'xclean' ),
					'off' => esc_attr__( 'No', 'xclean' ),
				),
			),
			array(
				'type'			=> 'number',
				'settings'		=> 'sticky-header-height',
				'label'			=> esc_attr__( 'Sticky Area Height (in pixel)', 'xclean' ),
				'description'	=> esc_attr__( 'Select Area height for sticky header', 'xclean' ),
				'default'		=> 90,
				'choices'		=> array(
					'min'			=> 1,
					'max'			=> 300,
					'step'			=> 1,
				),
				'active_callback'=> array(
					array(
						array(
							'setting'	=> 'sticky-header',
							'operator'	=> '==',
							'value'		=> '1',
						),
					)
				),
			),
			array(
				'type'				=> 'radio-image',
				'settings'			=> 'sticky-header-bgcolor',
				'label'				=> esc_html__( 'Sticky Area Background Color', 'xclean' ),
				'default'			=> 'white',
				'choices'			=> $pre_color_list,
				'active_callback'	=> array(
					array(
						'setting'	=> 'sticky-header',
						'operator'	=> '==',
						'value'		=> '1',
					)
				),
			),
			array(
				'type'			=> 'color',
				'settings'		=> 'sticky-header-background-color',
				'label'			=> esc_attr__( 'Sticky Header Background Custom Color', 'xclean' ),
				'description'	=> esc_attr__( 'Select custom color for sticky header background', 'xclean' ),
				'default'		=> '#ffffff',
				'active_callback'=> array(
					array(
						'setting'	=> 'sticky-header',
						'operator'	=> '==',
						'value'		=> '1',
					),
					array(
						'setting'	=> 'sticky-header-bgcolor',
						'operator'	=> '==',
						'value'		=> 'custom',
					)
				),
			),
			// Responsive Header
			array(
				'type'			=> 'custom',
				'settings'		=> 'responsive-header-options',
				'default'		=> '<div class="pbminfotech-option-heading"><h2>' . esc_html__( 'Responsive Header Options', 'xclean' ) . '</h2> <span>' . esc_html__( 'Options for responsive (mobile or tablet mode) header area', 'xclean' ) . '</span></div>',
			),
			array(
				'type'				=> 'radio-image',
				'settings'			=> 'responsive-header-bgcolor',
				'label'				=> esc_html__( 'Select header background color', 'xclean' ),
				'default'			=> '',
				'choices'			=> $pre_two_color_list,
			),
		),
	),
	// Menu Options
	'menu_options' => array(
		'section_settings' => array(
			'title'			=> esc_attr__( 'Menu Options', 'xclean' ),
			'panel'			=> 'xclean_base_options',
			'priority'		=> 160,
		),
		'section_fields' => array(
			// Main Menu Options
			array(
				'type'			=> 'custom',
				'settings'		=> 'main-menu-heading',
				'default'		=> '<div class="pbminfotech-option-heading"><h2>' . esc_html__( 'Main Menu Options', 'xclean' ) . '</h2> <span>' . esc_html__( 'Set Main Menu font settings', 'xclean' ) . '</span></div>',
			),
			array(
				'type'			=> 'typography',
				'settings'		=> 'main-menu-typography',
				'label'			=> esc_attr__( 'Main Menu Typography', 'xclean' ),
				'choices'		=> [ 'fonts' => [ 'google' => [ 'popularity', 600 ], ], ],
				'default'		=> array(
					'font-family'		=> 'Quicksand',
					'variant'			=> '700',
					'font-size'			=> '14px',
					'line-height'		=> '24px',
					'letter-spacing'	=> '0.5px',
					'color'				=> '#001837',
					'text-transform'	=> 'uppercase',
					'font-backup'		=> '',
					'font-style'		=> 'normal',
				),
				'priority'		=> 10,
				'pbmit-output'	=> 'body:not(.mega-menu-pbminfotech-top) .pbmit-navbar div > ul > li > a, .pbmit-max-mega-menu-override #page #site-navigation .max-mega-menu > li.mega-menu-item > a.mega-menu-link, .pbmit-burger-menu-area .menu-main-menu-container ul > li > a',
			),
			array(
				'type'			=> 'Color',
				'settings'		=> 'main-menu-active-color',
				'label'			=> esc_attr__( 'Main Menu Active Link Color', 'xclean' ),
				'description'	=> esc_attr__( 'This color will be applied to main menu when the menu link is active', 'xclean' ),
				'default'		=> '#fba311',
			),
			array(
				'type'			=> 'color',
				'settings'		=> 'main-menu-sticky-color',
				'label'			=> esc_attr__( 'Main Menu Text Color for Sticky Header', 'xclean' ),
				'description'	=> esc_attr__( 'This color will be applied to main menu text when header is sticky', 'xclean' ),
				'default'		=> '#001837',
			),
			array(
				'type'			=> 'color',
				'settings'		=> 'main-menu-sticky-active-color',
				'label'			=> esc_attr__( 'Main Menu Active Link Color for Sticky Header', 'xclean' ),
				'description'	=> esc_attr__( 'This color will be applied to main menu when the menu link is active in sticky header', 'xclean' ),
				'default'		=> '#fba311',
			),
			// Dropdown Menu Options
			array(
				'type'			=> 'custom',
				'settings'		=> 'drop-down-menu-heading',
				'default'		=> '<div class="pbminfotech-option-heading"><h2>' . esc_html__( 'Dropdown Menu Options', 'xclean' ) . '</h2> <span>' . esc_html__( 'Set Dropdown font settings', 'xclean' ) . '</span></div>',
			),
			array(
				'type'			=> 'typography',
				'settings'		=> 'dropdown-menu-typography',
				'label'			=> esc_attr__( 'Dropdown Menu Typography', 'xclean' ),
				'choices'		=> [ 'fonts' => [ 'google' => [ 'popularity', 600 ], ], ],
				'default'		=> array(
					'font-family'		=> 'Open Sans',
					'variant'			=> '600',
					'font-size'			=> '14px',
					'line-height'		=> '24px',
					'letter-spacing'	=> '0px',
					'color'				=> '#001837',
					'text-transform'	=> 'none',
					'font-backup'		=> '',
					'font-style'		=> 'normal',
				),
				'priority'		=> 10,
				'pbmit-output'	=> '.pbmit-navbar ul ul a, 
				.pbmit-max-mega-menu-override #page #site-navigation .mega-menu-wrap > ul > li.mega-menu-flyout > ul.mega-sub-menu li.mega-menu-item a.mega-menu-link,
				.pbmit-max-mega-menu-override #page #site-navigation .mega-menu-wrap > ul > li > ul.mega-sub-menu li.mega-menu-item > a:hover, 
				.pbmit-max-mega-menu-override #page #site-navigation .mega-menu-wrap > ul > li > ul.mega-sub-menu li.mega-menu-item > a:focus,
				.pbmit-max-mega-menu-override #page #site-navigation .mega-menu-wrap > ul > li.mega-menu-megamenu > ul.mega-sub-menu ul:not(.menu) > li.mega-menu-item > a.mega-menu-link,
				.pbmit-max-mega-menu-override #page #site-navigation .mega-menu-wrap > ul > li.mega-menu-megamenu > ul.mega-sub-menu li .widget_nav_menu ul.menu > li.mega-menu-item > a.mega-menu-link, .pbmit-burger-menu-area .menu-main-menu-container ul ul a',
			),
			array(
				'type'			=> 'background',
				'settings'		=> 'dropdown_background',
				'label'			=> esc_attr__( 'Dropdown Menu Background', 'xclean' ),
				'description'	=> esc_attr__( 'Background settings for Dropdown Menu', 'xclean' ),
				'default'		=> array(
					'background-color'		=> '#ffffff',
					'background-image'		=> '',
					'background-repeat'		=> 'repeat',
					'background-position'	=> 'center center',
					'background-size'		=> 'cover',
					'background-attachment'	=> 'scroll',
				),
				'pbmit-output'	=> '.pbmit-max-mega-menu-override #page #site-navigation .mega-menu-wrap > ul > li.mega-menu-flyout > ul.mega-sub-menu,.pbmit-navbar ul ul, .pbmit-navbar ul ul:before,.pbmit-navbar ul.sub-menu:before',
			),
			array(
				'type'				=> 'color',
				'settings'			=> 'drop-down-menu-active-color',
				'label'				=> esc_html__( 'Dropdown Menu Active Color', 'xclean' ),
				'default'			=> '#fba311',
			),
			// Max Mega Menu Option
			array(
				'type'			=> 'custom',
				'settings'		=> 'max-mega-menu-override-heading',
				'default'		=> '<div class="pbminfotech-option-heading"><h2>' . esc_html__( 'Max Mega Menu Plugin Option', 'xclean' ) . '</h2> <span>' . esc_html__( 'Option for Max Mega Menu plugin', 'xclean' ) . '</span></div>',
			),
			array(
				'type'			=> 'switch',
				'settings'		=> 'max-mega-menu-override',
				'label'			=> esc_attr__( 'Override Max Mega Menu design?', 'xclean' ),
				'description'	=> esc_attr__( 'Select YES to override Max Mega Menu design. Make sure you are using "Max Mega Menu" plugin for mega menu', 'xclean' ),
				'default'		=> '1',
				'choices'		=> array(
					'on'  => esc_attr__( 'Yes', 'xclean' ),
					'off' => esc_attr__( 'No', 'xclean' ),
				),
			),
			array(
				'type'			=> 'typography',
				'settings'		=> 'mmm-title-typography',
				'label'			=> esc_attr__( 'Max Mega Menu - Widget Title Typography', 'xclean' ),
				'choices'		=> [ 'fonts' => [ 'google' => [ 'popularity', 600 ], ], ],
				'default'		=> array(
					'font-family'		=> 'Quicksand',
					'variant'			=> '700',
					'font-size'			=> '18px',
					'line-height'		=> '24px',
					'letter-spacing'	=> '0px',
					'color'				=> '#fba311',
					'text-transform'	=> 'none',
					'font-backup'		=> '',
					'font-style'		=> 'normal',
				),
				'priority'		=> 10,
				'pbmit-output'	=> '.pbmit-max-mega-menu-override #page #site-navigation .mega-menu-wrap > ul > li.mega-menu-megamenu > ul.mega-sub-menu > li.mega-menu-item h4.mega-block-title, .pbmit-max-mega-menu-override #page #site-navigation .mega-menu-wrap > ul > li.mega-menu-megamenu > ul.mega-sub-menu li.mega-menu-column > ul.mega-sub-menu > li.mega-menu-item h4.mega-block-title',
			),
			array( // 1st dropdown mega menu
				'type'			=> 'background',
				'settings'		=> 'mmm-1-dropdown',
				'label'			=> esc_attr__( 'Max Mega Menu - 1st Dropdown Menu Background Option', 'xclean' ),
				'description'	=> esc_attr__( 'Background settings for first Dropdown Menu in Max Mega Menu', 'xclean' ),
				'default'		=> array(
					'background-color'		=> '#ffffff',
					'background-image'		=> '',
					'background-repeat'		=> 'repeat',
					'background-position'	=> 'center center',
					'background-size'		=> 'cover',
					'background-attachment'	=> 'scroll',
				),
				'pbmit-output'	=> '.pbmit-max-mega-menu-override #page #site-navigation .mega-menu-wrap > ul > li:nth-child(1) > ul.mega-sub-menu,.pbmit-max-mega-menu-override #page #site-navigation .mega-menu-wrap > ul > li:nth-child(1) > ul.mega-sub-menu:before',
			),
			array( // 2nd dropdown mega menu
				'type'			=> 'background',
				'settings'		=> 'mmm-2-dropdown',
				'label'			=> esc_attr__( 'Max Mega Menu - 2nd Dropdown Menu Background Option', 'xclean' ),
				'description'	=> esc_attr__( 'Background settings for second Dropdown Menu in Max Mega Menu', 'xclean' ),
				'default'		=> array(
					'background-color'		=> '#ffffff',
					'background-image'		=> '',
					'background-repeat'		=> 'repeat',
					'background-position'	=> 'center center',
					'background-size'		=> 'cover',
					'background-attachment'	=> 'scroll',
				),
				'pbmit-output'	=> '.pbmit-max-mega-menu-override #page #site-navigation .mega-menu-wrap > ul > li:nth-child(2) > ul.mega-sub-menu,.pbmit-max-mega-menu-override #page #site-navigation .mega-menu-wrap > ul > li:nth-child(2) > ul.mega-sub-menu:before',
			),
			array( // 3rd dropdown mega menu
				'type'			=> 'background',
				'settings'		=> 'mmm-3-dropdown',
				'label'			=> esc_attr__( 'Max Mega Menu - 3rd Dropdown Menu Background Option', 'xclean' ),
				'description'	=> esc_attr__( 'Background settings for third Dropdown Menu in Max Mega Menu', 'xclean' ),
				'default'		=> array(
					'background-color'		=> '#ffffff',
					'background-image'		=> '',
					'background-repeat'		=> 'repeat',
					'background-position'	=> 'center center',
					'background-size'		=> 'cover',
					'background-attachment'	=> 'scroll',
				),
				'pbmit-output'	=> '.pbmit-max-mega-menu-override #page #site-navigation .mega-menu-wrap > ul > li:nth-child(3) > ul.mega-sub-menu,.pbmit-max-mega-menu-override #page #site-navigation .mega-menu-wrap > ul > li:nth-child(3) > ul.mega-sub-menu:before',
			),
			array( // 4th dropdown mega menu
				'type'			=> 'background',
				'settings'		=> 'mmm-4-dropdown',
				'label'			=> esc_attr__( 'Max Mega Menu - 4th Dropdown Menu Background Option', 'xclean' ),
				'description'	=> esc_attr__( 'Background settings for fourth Dropdown Menu in Max Mega Menu', 'xclean' ),
				'default'		=> array(
					'background-color'		=> '#ffffff',
					'background-image'		=> '',
					'background-repeat'		=> 'repeat',
					'background-position'	=> 'center center',
					'background-size'		=> 'cover',
					'background-attachment'	=> 'scroll',
				),
				'pbmit-output'	=> '.pbmit-max-mega-menu-override #page #site-navigation .mega-menu-wrap > ul > li:nth-child(4) > ul.mega-sub-menu,.pbmit-max-mega-menu-override #page #site-navigation .mega-menu-wrap > ul > li:nth-child(4) > ul.mega-sub-menu:before',
			),
			array( // 5th dropdown mega menu
				'type'			=> 'background',
				'settings'		=> 'mmm-5-dropdown',
				'label'			=> esc_attr__( 'Max Mega Menu - 5th Dropdown Menu Background Option', 'xclean' ),
				'description'	=> esc_attr__( 'Background settings for fifth Dropdown Menu in Max Mega Menu', 'xclean' ),
				'default'		=> array(
					'background-color'		=> '#ffffff',
					'background-image'		=> '',
					'background-repeat'		=> 'repeat',
					'background-position'	=> 'center center',
					'background-size'		=> 'cover',
					'background-attachment'	=> 'scroll',
				),
				'pbmit-output'	=> '.pbmit-max-mega-menu-override #page #site-navigation .mega-menu-wrap > ul > li:nth-child(5) > ul.mega-sub-menu,.pbmit-max-mega-menu-override #page #site-navigation .mega-menu-wrap > ul > li:nth-child(5) > ul.mega-sub-menu:before',
			),
			array( // 6th dropdown mega menu
				'type'			=> 'background',
				'settings'		=> 'mmm-6-dropdown',
				'label'			=> esc_attr__( 'Max Mega Menu - 6th Dropdown Menu Background Option', 'xclean' ),
				'description'	=> esc_attr__( 'Background settings for sixth Dropdown Menu in Max Mega Menu', 'xclean' ),
				'default'		=> array(
					'background-color'		=> '#ffffff',
					'background-image'		=> '',
					'background-repeat'		=> 'repeat',
					'background-position'	=> 'center center',
					'background-size'		=> 'cover',
					'background-attachment'	=> 'scroll',
				),
				'pbmit-output'	=> '.pbmit-max-mega-menu-override #page #site-navigation .mega-menu-wrap > ul > li:nth-child(6) > ul.mega-sub-menu,.pbmit-max-mega-menu-override #page #site-navigation .mega-menu-wrap > ul > li:nth-child(6) > ul.mega-sub-menu:before',
			),
		)
	),
	// Titlebar Options
	'titlebar_options' => array(
		'section_settings' => array(
			'title'			=> esc_attr__( 'Titlebar Options', 'xclean' ),
			'panel'			=> 'xclean_base_options',
			'priority'		=> 160,
		),
		'section_fields' => array(
			array(
				'type'			=> 'switch',
				'settings'		=> 'titlebar-enable',
				'label'			=> esc_attr__( 'Show Titlebar?', 'xclean' ),
				'description'	=> esc_attr__( 'Show or hide Titlebar', 'xclean' ),
				'default'		=> '1',
				'choices'		=> array(
					'on'  => esc_attr__( 'Yes', 'xclean' ),
					'off' => esc_attr__( 'No', 'xclean' ),
				),
			),
			array(
				'type'			=> 'number',
				'settings'		=> 'titlebar-height',
				'label'			=> esc_attr__( 'Titlebar Height', 'xclean' ),
				'default'		=> 300,
				'choices'		=> array(
					'min'			=> 1,
					'max'			=> 1000,
					'step'			=> 1,
				),
				'active_callback'	=> array( array(
					'setting'			=> 'titlebar-enable',
					'operator'			=> '==',
					'value'				=> '1',
				) ),
			),
			array(
				'type'			=> 'select',
				'settings'		=> 'titlebar-style',
				'label'			=> esc_attr__( 'Titlebar Style', 'xclean' ),
				'description'	=> esc_attr__( 'Select style for Titlebar', 'xclean' ),
				'default'		=> 'left',
				'choices'		=>  array(
					'left'			=> esc_attr__( 'All Left Aligned', 'xclean' ),
					'center'		=> esc_attr__( 'All Center Aligned', 'xclean' )
				),
				'active_callback'	=> array( array(
					'setting'			=> 'titlebar-enable',
					'operator'			=> '==',
					'value'				=> '1',
				) ),
			),
			array(
				'type'			=> 'switch',
				'settings'		=> 'titlebar-hide-breadcrumb',
				'label'			=> esc_attr__( 'Hide Breadcrumb?', 'xclean' ),
				'description'	=> esc_attr__( 'Show or hide breadcrumb in Titlebar', 'xclean' ),
				'default'		=> '0',
				'choices'		=> array(
					'on'  => esc_attr__( 'Yes', 'xclean' ),
					'off' => esc_attr__( 'No', 'xclean' ),
				),
				'active_callback'	=> array( array(
					'setting'			=> 'titlebar-enable',
					'operator'			=> '==',
					'value'				=> '1',
				) ),
			),
			array(
				'type'			=> 'multicheck',
				'settings'		=> 'titlebar-bg-featured',
				'label'			=> esc_attr__( 'Featured Image as Titlebar Background', 'xclean' ),
				'description'	=> esc_attr__( 'Select which section (CPT) will show featured image as background image in Titlebar. NOTE: This will work for Single view only.', 'xclean' ),
				'default'		=> array(),
				'choices'		=> array(
					'post'				=> sprintf( esc_attr__('For %1$s', 'xclean') , '"Post"' ),
					'page'				=> sprintf( esc_attr__('For %1$s', 'xclean') , '"Page"' ),
					'pbmit-portfolio'	=> sprintf( esc_attr__('For %1$s', 'xclean') , '"'.$portfolio_cpt_singular_title.'"' ),
					'pbmit-team-member'	=> sprintf( esc_attr__('For %1$s', 'xclean') , '"'.$team_cpt_singular_title.'"' ),
				),
				'active_callback'	=> array( array(
					'setting'			=> 'titlebar-enable',
					'operator'			=> '==',
					'value'				=> '1',
				) ),
			),
			array(
				'type'				=> 'radio-image',
				'settings'			=> 'titlebar-bgcolor',
				'label'				=> esc_html__( 'Select Titlebar background color', 'xclean' ),
				'default'			=> 'blackish',
				'choices'			=> $pre_color_with_gradient_list,
				'active_callback'	=> array( array(
					'setting'			=> 'titlebar-enable',
					'operator'			=> '==',
					'value'				=> '1',
				) ),
			),
			array(
				'type'			=> 'background',
				'settings'		=> 'titlebar-background',
				'label'			=> esc_attr__( 'Background', 'xclean' ),
				'description'	=> esc_attr__( 'Background Settings', 'xclean' ),
				'default'		=> array(
					'background-color'		=> 'rgba(0,0,0,0.2)',
					'background-repeat'		=> 'no-repeat',
					'background-position'	=> 'center center',
					'background-size'		=> 'cover',
					'background-attachment'	=> 'scroll',
				),
				'pbmit-output'	=> '.pbmit-title-bar-wrapper, .pbmit-title-bar-wrapper.pbmit-bg-color-custom:before',
				'active_callback' => array( array(
					'setting'		=> 'titlebar-enable',
					'operator'		=> '==',
					'value'			=> '1',
				) ),
			),
			array(
				'type'		=> 'typography',
				'settings'	=> 'titlebar-heading-typography',
				'label'		=> esc_attr__( 'Titlebar Heading Typography', 'xclean' ),
				'choices'		=> [ 'fonts' => [ 'google' => [ 'popularity', 600 ], ], ],
				'default'		=> array(
					'font-family'		=> 'Quicksand',
					'variant'			=> '700',
					'font-size'			=> '60px',
					'line-height'		=> '60px',
					'letter-spacing'	=> '0px',
					'color'				=> '#ffffff',
					'text-transform'	=> 'none',
					'font-backup'		=> '',
					'font-style'		=> 'normal',
				),
				'priority'		=> 10,
				'pbmit-output'	=> '.pbmit-tbar-title',
				'active_callback'	=> array( array(
					'setting'			=> 'titlebar-enable',
					'operator'			=> '==',
					'value'				=> '1',
				) ),
			),
			array(
				'type'			=> 'typography',
				'settings'		=> 'titlebar-subheading-typography',
				'label'			=> esc_attr__( 'Titlebar Sub-heading Typography', 'xclean' ),
				'choices'		=> [ 'fonts' => [ 'google' => [ 'popularity', 600 ], ], ],
				'default'		=> array(
					'font-family'		=> 'Quicksand',
					'variant'			=> '700',
					'font-size'			=> '18px',
					'line-height'		=> '24px',
					'letter-spacing'	=> '0px',
					'color'				=> '#ffffff',
					'text-transform'	=> 'capitalize',
					'font-backup'		=> '',
					'font-style'		=> 'normal',
				),
				'priority'		=> 10,
				'pbmit-output'	=> '.pbmit-tbar-subtitle',
				'active_callback'	=> array( array(
					'setting'			=> 'titlebar-enable',
					'operator'			=> '==',
					'value'				=> '1',
				) ),
			),
			array(
				'type'			=> 'typography',
				'settings'		=> 'titlebar-breadcrumb-typography',
				'label'			=> esc_attr__( 'Titlebar Breadcrumb Typography', 'xclean' ),
				'choices'		=> [ 'fonts' => [ 'google' => [ 'popularity', 600 ], ], ],
				'default'		=> array(
					'font-family'		=> 'Open Sans',
					'variant'			=> '500',
					'font-size'			=> '15px',
					'line-height'		=> '25px',
					'letter-spacing'	=> '0.5px',
					'color'				=> '#ffffff',
					'text-transform'	=> 'uppercase',
					'font-backup'		=> '',
					'font-style'		=> 'normal',
				),
			'priority'				=> 10,
				'pbmit-output'		=> '.pbmit-breadcrumb, .pbmit-breadcrumb a',
				'active_callback'	=> array(
					array(
						'setting'			=> 'titlebar-enable',
						'operator'			=> '==',
						'value'				=> '1',
					),
					array(
						'setting'			=> 'titlebar-hide-breadcrumb',
						'operator'			=> '==',
						'value'				=> '0',
					)
				),
			),
		),
	),
	// Footer Options
		'footer_options' => array(
			'section_settings' => array(
				'title'			=> esc_attr__( 'Footer Options', 'xclean' ),
				'panel'			=> 'xclean_base_options',
				'priority'		=> 160,
			),
			'section_fields' => array(
			array(
				'type'			=> 'switch',
				'settings'		=> 'footer-enable',
				'label'			=> esc_attr__( 'Show footer?', 'xclean' ),
				'description'	=> esc_attr__( 'Show or hide footer', 'xclean' ),
				'default'		=> '1',
				'choices'		=> array(
					'on'  => esc_attr__( 'Yes', 'xclean' ),
					'off' => esc_attr__( 'No', 'xclean' ),
				),
			),
			// Footer Background settings
			array(
				'type'			=> 'custom',
				'settings'		=> 'footer-background-settings-heading',
				'default'		=> '<div class="pbminfotech-option-heading"><h2>' . esc_html__( 'Footer Background Settings', 'xclean' ) . '</h2> <span>' . esc_attr__( 'Manage footer background settings from here', 'xclean' ) . '</span></div>',
				'active_callback'	=> array( array(
					'setting'			=> 'footer-enable',
					'operator'			=> '==',
					'value'				=> '1',
				) ),
			),
			array(
				'type'			=> 'radio-image',
				'settings'		=> 'footer-style',
				'label'			=> esc_html__( 'Select Footer Style', 'xclean' ),
				'default'		=> '1',
				'choices'		=> array(
					'1'				=> get_template_directory_uri() . '/includes/images/footer-style-1.jpg',
					'2'				=> get_template_directory_uri() . '/includes/images/footer-style-2.jpg',
				),
				'active_callback'	=> array( array(
					'setting'			=> 'footer-enable',
					'operator'			=> '==',
					'value'				=> '1',
				) ),
			),
			array(
				'type'			=> 'radio-image',
				'settings'		=> 'footer-bgcolor',
				'label'			=> esc_html__( 'Select Full Footer background color', 'xclean' ),
				'description'	=> esc_attr__( 'This will be applied to full footer area including footer widget area and footer copyright area.', 'xclean' ),
				'default'		=> 'blackish',
				'choices'		=> array_merge( array('gradientcolor'	=> get_template_directory_uri() . '/includes/images/precolor-gradientcolor.png',), $pre_color_list),
				'active_callback'	=> array( array(
					'setting'			=> 'footer-enable',
					'operator'			=> '==',
					'value'				=> '1',
				) ),
			),
			array(
				'type'			=> 'background',
				'settings'		=> 'footer-background',
				'label'			=> esc_attr__( 'Full Footer Background', 'xclean' ),
				'description'	=> esc_attr__( 'This will be applied to full footer area including footer widget area and footer copyright area.', 'xclean' ),
				'default'		=> array(
					'background-color'		=> '#001837',
					'background-image'		=> '',
					'background-repeat'		=> 'no-repeat',
					'background-position'	=> 'center top',
					'background-size'		=> 'contain',
					'background-attachment'	=> 'scroll',
				),
				'active_callback'	=> array( array(
					'setting'			=> 'footer-enable',
					'operator'			=> '==',
					'value'				=> '1',
				) ),
				'pbmit-output'	=> '.site-footer, .site-footer.pbmit-bg-color-custom:before',
			),
			array(
				'type'				=> 'radio-image',
				'settings'			=> 'footer-text-color',
				'label'				=> esc_attr__( 'Select Footer Text Color', 'xclean' ),
				'default'			=> 'white',
				'choices'			=> $pre_text_color_list,
				'active_callback'	=> array( array(
					'setting'			=> 'footer-enable',
					'operator'			=> '==',
					'value'				=> '1',
				) ),
			),
			// Footer Boxes Area
			array(
				'type'			=> 'custom',
				'settings'		=> 'footer-boxes-area-heading',
				'default'		=> '<div class="xclean-option-heading"><h2>' . esc_html__( 'Footer Boxes Area', 'xclean' ) . '</h2> <span>' . esc_attr__( 'Manage footer boxes from here', 'xclean' ) . '</span></div>',
				'active_callback'=> array(	
					array(
						'setting'	=> 'footer-enable',
						'operator'	=> '==',
						'value'		=> '1',
					),	
					array(
						array(
							'setting'	=> 'footer-style',
							'operator' 	=> '==',
							'value' 	=> '2',
						),
					),
				),
			),
			// Show Footer Boxes
			array(
				'type'			=> 'switch',
				'settings'		=> 'footer-boxes-area',
				'label'			=> esc_attr__( 'Show footer boxes?', 'xclean' ),
				'default'		=> '0',
				'choices'		=> array(
					'on'  => esc_attr__( 'Yes', 'xclean' ),
					'off' => esc_attr__( 'No', 'xclean' ),
				),
				'active_callback'=> array(	
					array(
						'setting'	=> 'footer-enable',
						'operator'	=> '==',
						'value'		=> '1',
					),
					array(
						array(
							'setting'	=> 'footer-style',
							'operator' 	=> '==',
							'value' 	=> '2',
						),
					),
				),
			),
			array(
				'type'				=> 'image',
				'settings'			=> 'footer-logo',
				'label'				=> esc_attr__( 'Foorer Logo', 'xclean' ),
				'default'			=> get_template_directory_uri() . '/images/logo-white.svg',
				'active_callback'	=> array(
					array(
					'setting'	=> 'footer-boxes-area',
					'operator'	=> '==',
					'value'		=> '1',
					),
					array(
						'setting'	=> 'footer-enable',
						'operator'	=> '==',
						'value'		=> '1',
					),
					array(
						array(
							'setting'	=> 'footer-style',
							'operator'	=> '==',
							'value'		=> '2',
						),
					),
				),
			),
			array(
				'type'				=> 'textarea',
				'settings'			=> 'footer-right-area',
				'label'				=> esc_attr__( 'Footer Right Area', 'xclean' ),
				'default'			=> pbmit_esc_kses('[mc4wp_form id=3353]'),
				'active_callback'	=> array(
					array(
					'setting'	=> 'footer-boxes-area',
					'operator' 	=> '==',
					'value' 		=> '1',
					),
					array(
						'setting'	=> 'footer-enable',
						'operator'	=> '==',
						'value'		=> '1',
					),
					array(
						array(
							'setting'	=> 'footer-style',
							'operator' 	=> '==',
							'value' 	=> '2',
						),
					),
				),
			),
			// Footer Widget Area
			array(
				'type'			=> 'custom',
				'settings'		=> 'footer-widget-heading',
				'default'		=> '<div class="pbminfotech-option-heading"><h2>' . esc_html__( 'Footer Widget Area', 'xclean' ) . '</h2> <span>' . esc_attr__( 'Manage widget area settings', 'xclean' ) . '</span></div>',
				'active_callback'	=> array( array(
					'setting'			=> 'footer-enable',
					'operator'			=> '==',
					'value'				=> '1',
				) ),
			),
			array(
				'type'		=> 'radio-image',
				'settings'	=> 'footer-column',
				'label'		=> esc_html__( 'Footer Widget Column Type', 'xclean' ),
				'description'	=> esc_html__( 'This will show widgets. You can manage it from "Admin > Appearance > Widgets" section.', 'xclean' ),
				'default'	=> '3-3-3-3',
				'choices'		=> array(
					'12'		=> get_template_directory_uri() . '/includes/images/footer-12.png',
					'6-6'		=> get_template_directory_uri() . '/includes/images/footer-6-6.png',
					'4-4-4'		=> get_template_directory_uri() . '/includes/images/footer-4-4-4.png',
					'3-3-3-3'	=> get_template_directory_uri() . '/includes/images/footer-3-3-3-3.png',
					'2-2-2-6'	=> get_template_directory_uri() . '/includes/images/footer-2-2-2-6.png',
					'6-2-2-2'	=> get_template_directory_uri() . '/includes/images/footer-6-2-2-2.png',
					'8-4'		=> get_template_directory_uri() . '/includes/images/footer-8-4.png',
					'4-8'		=> get_template_directory_uri() . '/includes/images/footer-4-8.png',
					'custom'	=> get_template_directory_uri() . '/includes/images/footer-col-custom.png',
				),
				'active_callback'	=> array( array(
					'setting'			=> 'footer-enable',
					'operator'			=> '==',
					'value'				=> '1',
				) ),
			),
			array(
				'type'			=> 'select',
				'settings'		=> 'footer-1-col-width',
				'label'			=> esc_attr__( 'Footer Widget Width - 1st Column', 'xclean' ),
				'description'	=> esc_attr__( 'Set custom width of the 1st column in footer widget area', 'xclean' ),
				'default'		=> '25',
				'choices'		=> $footer_col_width_array,
				'active_callback'	=> array(
					array(
						'setting'			=> 'footer-enable',
						'operator'			=> '==',
						'value'				=> '1',
					),
					array(
						'setting'			=> 'footer-column',
						'operator'			=> '==',
						'value'				=> 'custom',
					)
				),
			),
			array(
				'type'			=> 'select',
				'settings'		=> 'footer-2-col-width',
				'label'			=> esc_attr__( 'Footer Widget Width - 2nd Column', 'xclean' ),
				'description'	=> esc_attr__( 'Set custom width of the 2nd column in footer widget area', 'xclean' ),
				'default'		=> '25',
				'choices'		=> $footer_col_width_array,
				'active_callback'	=> array(
					array(
						'setting'			=> 'footer-enable',
						'operator'			=> '==',
						'value'				=> '1',
					),
					array(
						'setting'			=> 'footer-column',
						'operator'			=> '==',
						'value'				=> 'custom',
					)
				),
			),
			array(
				'type'			=> 'select',
				'settings'		=> 'footer-3-col-width',
				'label'			=> esc_attr__( 'Footer Widget Width - 3rd Column', 'xclean' ),
				'description'	=> esc_attr__( 'Set custom width of the 3rd column in footer widget area', 'xclean' ),
				'default'		=> '25',
				'choices'		=> $footer_col_width_array,
				'active_callback'	=> array(
					array(
						'setting'			=> 'footer-enable',
						'operator'			=> '==',
						'value'				=> '1',
					),
					array(
						'setting'			=> 'footer-column',
						'operator'			=> '==',
						'value'				=> 'custom',
					)
				),
			),
			array(
				'type'			=> 'select',
				'settings'		=> 'footer-4-col-width',
				'label'			=> esc_attr__( 'Footer Widget Width - 4th Column', 'xclean' ),
				'description'	=> esc_attr__( 'Set custom width of the 4th column in footer widget area', 'xclean' ),
				'default'		=> '25',
				'choices'		=> $footer_col_width_array,
				'active_callback'	=> array(
					array(
						'setting'			=> 'footer-enable',
						'operator'			=> '==',
						'value'				=> '1',
					),
					array(
						'setting'			=> 'footer-column',
						'operator'			=> '==',
						'value'				=> 'custom',
					)
				),
			),	
			array(
				'type'			=> 'editor',
				'settings'		=> 'copyright-text',
				'label'			=> esc_attr__( 'Footer Copyright Text', 'xclean' ),
				'default'		=> sprintf( esc_attr__( 'Copyright &copy; %1$s %2$s, All Rights Reserved.', 'xclean' ), date('Y'), '<a href="' . esc_url( home_url( '/' ) ) . '">' . get_bloginfo('name') . '</a>' ),
				'priority'		=> 10,
				'partial_refresh'	=> array(
					'copyright-text'		=> array(
						'selector'			=> '.pbmit-footer-copyright-text',
						'render_callback'	=> function() {
							return get_theme_mod('copyright-text');
						},
					)
				),
				'active_callback'	=> array( array(
					'setting'			=> 'footer-enable',
					'operator'			=> '==',
					'value'				=> '1',
				) ),
			),
			array(
				'type'			=> 'select',
				'settings'		=> 'footer-copyright-right-content',
				'label'			=> esc_attr__( 'Footer Right Area', 'xclean' ),
				'description'	=> esc_attr__( 'What you like to show at right side or copyright text', 'xclean' ),
				'default'		=> 'none',
				'choices'		=> array(
					'social'		=> esc_attr__( 'Show Social Links', 'xclean' ),
					'menu'			=> esc_attr__( 'Show Footer Menu', 'xclean' ),
					'none'			=> esc_attr__( 'None', 'xclean' ),
				),
				'active_callback'	=> array( array(
					'setting'			=> 'footer-enable',
					'operator'			=> '==',
					'value'				=> '1',
				) ),	
			),
		)
	),
	// Social Links Options
	'social_links_options' => array(
		'section_settings' => array(
			'title'			=> esc_attr__( 'Social Links Options', 'xclean' ),
			'description'	=> esc_attr__( 'You can use [pbmit-social-links] shortcode for social list with icon.', 'xclean' ),
			'panel'			=> 'xclean_base_options',
			'priority'		=> 160,
		),
		'section_fields' => $social_options_array
	),
	// Blog Settings
	'blog_options' => array(
		'section_settings' => array(
			'title'			=> esc_attr__( 'Blog Options', 'xclean' ),
			'panel'			=> 'xclean_base_options',
			'priority'		=> 160,
		),
		'section_fields' => array(
			array(
				'type'			=> 'custom',
				'settings'		=> 'custom-blog-options',
				'default'		=> '<div class="pbminfotech-option-heading"><h2>' . esc_html__( 'Blog Settings', 'xclean' ) . '</h2> <span>' . esc_html__( 'Settings for Blogroll, Category, Tag, Archives etc section.', 'xclean' ) . '</span></div>',
			),
			array(
				'type'			=> 'radio',
				'settings'		=> 'blogroll-view-select',
				'label'			=> esc_html__( 'Select Blogroll view', 'xclean' ),
				'default'		=> 'classic',
				'choices'	 	=> [
					'classic'   	=> esc_html__( 'Classic View', 'xclean' ),
					'grid' 			=> esc_html__( 'Grid View', 'xclean' ),
				],
			),
			array(
				'type'			=> 'radio-image',
				'settings'		=> 'blogroll-view',
				'label'			=> esc_html__( 'Blogroll view', 'xclean' ),
				'default'		=> '1',
				'choices'		=> pbmit_element_template_list('blog', 'customizer'),
				'active_callback'	=> array(
					array(
						'setting'		=> 'blogroll-view-select',
						'operator'		=> '==',
						'value'			=> 'grid',
					)
				),
			),
			array(
				'type'			=> 'radio-image',
				'settings'		=> 'blogroll-column',
				'label'			=> esc_html__( 'Blogroll column', 'xclean' ),
				'default'		=> '2',
				'choices'		=> $column_list,
				'active_callback'	=> array(
					array(
						'setting'		=> 'blogroll-view-select',
						'operator'		=> '==',
						'value'			=> 'grid',
					)
				),
			),
			array(
			'type'			=> 'switch',
			'settings'		=> 'blog-show-related',
			'label'			=> esc_attr__( 'Show Related Post?', 'xclean' ),
			'default'		=> '0',
			'choices'	 => array(
				'on'  => esc_attr__( 'Yes', 'xclean' ),
				'off' => esc_attr__( 'No', 'xclean' ),
			),
			),
			array(
				'type'			=> 'text',
				'settings'		=> 'blog-related-title',
				'label'			=> esc_attr__( 'Related Post Section Title', 'xclean' ), 
				'description'	=> esc_attr__( 'Related Area Title', 'xclean' ),
				'default'		=> esc_attr__( 'Related Post', 'xclean' ),
				'active_callback' => array(
					array(
						'setting'	=> 'blog-show-related',
						'operator'	=> '==',
						'value'		=> '1',
					),
				),
			),
			array(
				'type'			=> 'number',
				'settings'		=> 'blog-related-count',
				'label'			=> esc_attr__( 'How many post you like to show', 'xclean' ),
				'default'		=> 3,
				'choices'		=> array(
					'min'			=> 1,
					'max'			=> 50,
					'step'			=> 1,
				),
				'active_callback' => array(
					array(
						'setting'	=> 'blog-show-related',
						'operator'	=> '==',
						'value'		=> '1',
					),
				),
			),
			array(
				'type'			=> 'radio-image',
				'settings'		=> 'blog-related-column',
				'label'			=>  esc_html__('Related Post Column', 'xclean' ),
				'default'		=> '2',
				'choices'	 => $column_list,
				'active_callback' => array(
					array(
						'setting'	=> 'blog-show-related',
						'operator'	=> '==',
						'value'		=> '1',
					),
				),
			),
			array(
				'type'			=> 'radio-image',
				'settings'		=> 'blog-related-style',
				'label'			=> esc_html__( 'Related Post View', 'xclean' ),
				'default'		=> '1',
				'choices'	 => $blog_styles,
				'active_callback' => array(
					array(
						'setting'	=> 'blog-show-related',
						'operator'	=> '==',
						'value'		=> '1',
					),
				),
			),
			array(
				'type'			=> 'custom',
				'settings'		=> 'custom-blog-classic-options',
				'default'		=> '<div class="pbminfotech-option-heading"><h2>' . esc_html__( 'Blog Classic Settings', 'xclean' ) . '</h2> <span>' . esc_html__( 'Settings for Blog Classic view.', 'xclean' ) . '</span></div>',
			),
			array(
				'type'			=> 'switch',
				'settings'		=> 'blog-classic-limit-switch',
				'label'			=> esc_attr__( 'Limit Content Words for Blog Classic view?', 'xclean' ),
				'default'		=> '0',
				'choices'		=> array(
					'on'  => esc_attr__( 'Yes', 'xclean' ),
					'off' => esc_attr__( 'No', 'xclean' ),
				),
			),
			array(
				'type'			=> 'number',
				'settings'		=> 'blog-classic-limit',
				'label'			=> esc_attr__( 'Set Word Limit for Blog Classic view', 'xclean' ),
				'description'	=> esc_attr__( 'This will add limited words before "Read More" link. This is useful if you didn\'t added Read More link in posts.', 'xclean' ),
				'default'		=> 30,
				'choices'		=> array(
					'min'			=> 1,
					'max'			=> 900,
					'step'			=> 1,
				),
				'active_callback' => array(
					array(
						'setting'	=> 'blog-classic-limit-switch',
						'operator'	=> '==',
						'value'		=> '1',
					),
				),
			),
			array(
				'type'			=> 'custom',
				'settings'		=> 'custom-blog-element-options',
				'default'		=> '<div class="pbminfotech-option-heading"><h2>' . esc_html__( 'Blog Style Elements (boxes) Settings', 'xclean' ) . '</h2> <span>' . esc_html__( 'Settings for Blog Style Elements.', 'xclean' ) . '</span></div>',
			),
			array(
				'type'			=> 'switch',
				'settings'		=> 'blog-element-limit-switch',
				'label'			=> esc_attr__( 'Limit Content Words for Blog Element view?', 'xclean' ),
				'default'		=> '1',
				'choices'		=> array(
					'on'  => esc_attr__( 'Yes', 'xclean' ),
					'off' => esc_attr__( 'No', 'xclean' ),
				),
			),
			array(
				'type'			=> 'number',
				'settings'		=> 'blog-element-limit',
				'label'			=> esc_attr__( 'Limit Words for Blog Element view', 'xclean' ),
				'description'	=> esc_attr__( 'This will add limited words before "Read More" link.', 'xclean' ),
				'default'		=> 15,
				'choices'		=> array(
					'min'			=> 1,
					'max'			=> 900,
					'step'			=> 1,
				),
				'active_callback' => array(
					array(
						'setting'	=> 'blog-element-limit-switch',
						'operator'	=> '==',
						'value'		=> '1',
					),
				),
			),
			array(
				'type'			=> 'custom',
				'settings'		=> 'custom-blog-sidebar-options',
				'default'		=> '<div class="pbminfotech-option-heading"><h2>' . esc_html__( 'Sidebar Settings', 'xclean' ) . '</h2> <span>' . esc_html__( 'Select sidebar position Page and Blog section.', 'xclean' ) . '</span></div>',
			),
			array(
				'type'		=> 'radio-image',
				'settings'	=> 'sidebar-post',
				'label'		=> esc_html__( 'Blog Sidebar', 'xclean' ),
				'default'	=> 'right',
				'choices'		=> array(
					'left'		=> get_template_directory_uri() . '/includes/images/sidebar-left.png',
					'right'		=> get_template_directory_uri() . '/includes/images/sidebar-right.png',
					'no'		=> get_template_directory_uri() . '/includes/images/sidebar-no.png',
				),
			),
		)
	),
	// Portfolio Settings
	'portfolio_options' => array(
		'section_settings' => array(
			'title'			=> sprintf( esc_attr__( '%1$s options', 'xclean' ) , $portfolio_cpt_singular_title ) ,
			'panel'			=> 'xclean_base_options',
			'priority'		=> 160,
		),
		'section_fields' => array(
			array(
				'type'			=> 'custom',
				'settings'		=> 'custom-single-portfolio-settings',
				'default'		=> '<div class="pbminfotech-option-heading"><h2>' . sprintf( esc_html__( 'Single %1$s Options', 'xclean' ), $portfolio_cpt_singular_title ) . '</h2> <span>' . sprintf( esc_attr__( 'Options for Single %1$s Section', 'xclean' ), $portfolio_cpt_singular_title ) . '</span></div>',
			),
			array(
				'type'		=> 'radio-image',
				'settings'	=> 'portfolio-single-style',
				'label'		=> sprintf( esc_html__( '%1$s Single View Style', 'xclean' ), $portfolio_cpt_singular_title ),
				'default'	=> '1',
				'choices'		=> $portfolio_single_style_array,
			),
			array(
				'type'			=> 'custom',
				'settings'		=> 'custom-single-portfolio-detailsbox-settings',
				'default'		=> '<div class="pbminfotech-option-heading"><h2>' . sprintf( esc_html__( 'Single %1$s Details Box Options', 'xclean' ), $portfolio_cpt_singular_title ) . '</h2> <span>' . esc_attr__( 'Details Box Settings', 'xclean' ) . '</span></div>',
			),
			array(
				'type'			=> 'text',
				'settings'		=> 'portfolio-details-title',
				'label'			=> sprintf( esc_attr__( 'Single %1$s Details Box Title', 'xclean' ), $portfolio_cpt_singular_title ),
				'description'	=> esc_attr__( 'Details Box Title', 'xclean' ),
				'default'		=> esc_attr__( 'Project info', 'xclean' ),
			),
			array(
				'type'			=> 'repeater',
				'label'			=> sprintf( esc_attr__( 'Single %1$s Details Box', 'xclean' ), $portfolio_cpt_singular_title ),
				'row_label'		=> array(
					'type'			=> 'field',
					'value'			=> esc_attr__('Line', 'xclean' ),
					'field'			=> 'line_title',
				),
				'button_label'	=> esc_attr__('Add New Line', 'xclean' ),
				'settings'		=> 'portfolio-details',
				'fields'		=> array(
					'line_title'	=> array(
						'type'			=> 'text',
						'label'			=> esc_attr__( 'Line Title', 'xclean' ),
						'description'	=> esc_attr__( 'This will be the label for the line', 'xclean' ),
						'default'		=> '',
					),
					'line_type'		=> array(
						'type'			=> 'select',
						'label'			=> esc_attr__( 'Line Type', 'xclean' ),
						'description'	=> esc_attr__( 'This will be type for the line', 'xclean' ),
						'default'		=> 'text',
						'choices'		=> array(
							'text'			=> esc_attr__( 'Normal Text', 'xclean' ),
							'category'		=> esc_attr__( 'Category List (without link)', 'xclean' ),
							'category-link'	=> esc_attr__( 'Category List (with link)', 'xclean' ),
						)
					),
				),
				'default'		=> array(
					array(
						'line_title'	=> esc_attr__('Client', 'xclean'),
						'line_type'		=> 'text',
					),								
					array(
						'line_title'	=> esc_attr__('Team', 'xclean'),
						'line_type'		=> 'text',
					),
					array(
						'line_title'	=> esc_attr__('Service', 'xclean'),
						'line_type'		=> 'text',
					),
					array(
						'line_title'	=> esc_attr__('Category', 'xclean'),
						'line_type'		=> 'category',
					),
				),
			),
			array(
				'type'			=> 'custom',
				'settings'		=> 'custom-single-portfolio-related-settings',
				'default'		=> '<div class="pbminfotech-option-heading"><h2>' . sprintf( esc_html__( 'Related %1$s Options', 'xclean' ), $portfolio_cpt_singular_title ) . '</h2> <span>' . sprintf( esc_html__( 'Options for Related %1$s', 'xclean' ), $portfolio_cpt_singular_title ) . '</span></div>',
			),
			array(
				'type'			=> 'switch',
				'settings'		=> 'portfolio-show-related',
				'label'			=> sprintf( esc_attr__( 'Show Related %1$s?', 'xclean' ), $portfolio_cpt_singular_title ),
				'default'		=> '0',
				'choices'		=> array(
					'on'  => esc_attr__( 'Yes', 'xclean' ),
					'off' => esc_attr__( 'No', 'xclean' ),
				),
			),
			array(
				'type'			=> 'text',
				'settings'		=> 'portfolio-related-title',
				'label'			=> sprintf( esc_attr__( 'Related %1$s Section Title', 'xclean' ), $portfolio_cpt_singular_title ),
				'description'	=> esc_attr__( 'Related Area Title', 'xclean' ),
				'default'		=> sprintf( esc_attr__( 'Related %1$s', 'xclean' ), $portfolio_cpt_singular_title ),
				'active_callback' => array(
					array(
						'setting'	=> 'portfolio-show-related',
						'operator'	=> '==',
						'value'		=> '1',
					),
				),
			),
			array(
				'type'			=> 'number',
				'settings'		=> 'portfolio-related-count',
				'label'			=> sprintf( esc_attr__( 'How many %1$s you like to show', 'xclean' ), $portfolio_cpt_singular_title ),
				'default'		=> 3,
				'choices'		=> array(
					'min'			=> 1,
					'max'			=> 50,
					'step'			=> 1,
				),
				'active_callback' => array(
					array(
						'setting'	=> 'portfolio-show-related',
						'operator'	=> '==',
						'value'		=> '1',
					),
				),
			),
			array(
				'type'			=> 'radio-image',
				'settings'		=> 'portfolio-related-column',
				'label'			=> sprintf( esc_html__( 'Related %1$s Column', 'xclean' ), $portfolio_cpt_singular_title ),
				'default'		=> '3',
				'choices'		=> $column_list,
				'active_callback' => array(
					array(
						'setting'	=> 'portfolio-show-related',
						'operator'	=> '==',
						'value'		=> '1',
					),
				),
			),
			array(
				'type'			=> 'radio-image',
				'settings'		=> 'portfolio-related-style',
				'label'			=> sprintf( esc_html__( 'Related %1$s View', 'xclean' ), $portfolio_cpt_singular_title ),
				'default'		=> '1',
				'choices'		=> pbmit_element_template_list('portfolio', 'customizer'),
				'active_callback' => array(
					array(
						'setting'	=> 'portfolio-show-related',
						'operator'	=> '==',
						'value'		=> '1',
					),
				),
			),
			array(
				'type'			=> 'custom',
				'settings'		=> 'custom-portfolio-cat-view',
				'default'		=> '<div class="pbminfotech-option-heading"><h2>' . sprintf( esc_html__( 'Element View Style for %1$s', 'xclean' ), $portfolio_cat_singular_title ) . '</h2> <span>' . sprintf( esc_attr__( 'Select view style for elements on %1$s', 'xclean' ) , $portfolio_cat_singular_title ) . '</span></div>',
			),
			array(
				'type'			=> 'radio-image',
				'settings'		=> 'portfolio-cat-style',
				'label'			=> sprintf( esc_html__( 'Element View on %1$s', 'xclean' ), $portfolio_cat_singular_title ),
				'default'		=> '1',
				'choices'		=> pbmit_element_template_list('portfolio', 'customizer'),
			),
			array(
				'type'			=> 'radio-image',
				'settings'		=> 'portfolio-cat-column',
				'label'			=> sprintf( esc_html__( '%1$s View Column', 'xclean' ), $portfolio_cat_singular_title ),
				'default'		=> '3',
				'choices'		=> $column_list,
			),
			array(
				'type'			=> 'number',
				'settings'		=> 'portfolio-cat-count',
				'label'			=> sprintf( esc_attr__( 'How many %1$s you like to show on single %2$s page', 'xclean' ), $portfolio_cpt_singular_title, $portfolio_cat_singular_title ),
				'default'		=> 9,
				'choices'		=> array(
					'min'			=> 1,
					'max'			=> 50,
					'step'			=> 1,
				),
				'active_callback' => array(
					array(
						'setting'	=> 'portfolio-show-related',
						'operator'	=> '==',
						'value'		=> '1',
					),
				),
			),
			array(
				'type'			=> 'custom',
				'settings'		=> 'custom-portfolio-sidebar-settings',
				'default'		=> '<div class="pbminfotech-option-heading"><h2>' . esc_html__( 'Sidebar Options', 'xclean' ) . '</h2> <span>' . sprintf( esc_attr__( 'Sidebar options for %1$s Section', 'xclean' ) , $portfolio_cpt_singular_title ) . '</span></div>',
			),
			array(
				'type'		=> 'radio-image',
				'settings'	=> 'sidebar-portfolio',
				'label'		=> sprintf( esc_html__( '%1$s Sidebar', 'xclean' ), $portfolio_cpt_singular_title ),
				'default'	=> 'no',
				'choices'		=> array(
					'left'		=> get_template_directory_uri() . '/includes/images/sidebar-left.png',
					'right'		=> get_template_directory_uri() . '/includes/images/sidebar-right.png',
					'no'		=> get_template_directory_uri() . '/includes/images/sidebar-no.png',
				),
			),
			array(
				'type'		=> 'radio-image',
				'settings'	=> 'sidebar-portfolio-category',
				'label'		=> sprintf( esc_html__( '%1$s Sidebar', 'xclean' ), $portfolio_cat_singular_title ),
				'default'	=> 'no',
				'choices'		=> array(
					'left'		=> get_template_directory_uri() . '/includes/images/sidebar-left.png',
					'right'		=> get_template_directory_uri() . '/includes/images/sidebar-right.png',
					'no'		=> get_template_directory_uri() . '/includes/images/sidebar-no.png',
				),
			),
			// Advanced Options
			array(
				'type'			=> 'custom',
				'settings'		=> 'portfolio-advanced-heading',
				'default'		=> '<div class="pbminfotech-option-heading"><h2>' . esc_html__( 'Advanced Options', 'xclean' ) . '</h2> <span>' . sprintf( esc_attr__( 'Advanced Options for %1$s Section', 'xclean' ) , $portfolio_cpt_singular_title ) . '</span></div>',
			),
			array(
				'type'			=> 'text',
				'settings'		=> 'portfolio-cpt-title',
				'label'			=> sprintf( esc_attr__( '%1$s Section Title', 'xclean' ) , $portfolio_cpt_singular_title ) ,
				'description'	=> esc_attr__( 'CPT Title', 'xclean' ),
				'default'		=> esc_attr__( 'Portfolio', 'xclean' ),
				'priority'		=> 10,
			),
			array(
				'type'			=> 'text',
				'settings'		=> 'portfolio-cpt-singular-title',
				'label'			=> sprintf( esc_attr__( '%1$s Section Title (Singular)', 'xclean' ) , $portfolio_cpt_singular_title ) ,
				'description'	=> esc_attr__( 'CPT Singular Title', 'xclean' ),
				'default'		=> esc_attr__( 'Portfolio', 'xclean' ),
				'priority'		=> 10,
			),
			array(
				'type'			=> 'text',
				'settings'		=> 'portfolio-cpt-slug',
				'label'			=> sprintf( esc_attr__( '%1$s Section URl Slug', 'xclean' ) , $portfolio_cpt_singular_title ) ,
				'description'	=> esc_attr__( 'CPT URL slug.', 'xclean' ) . '<br />' . '<strong>' . esc_attr__( 'NOTE:', 'xclean' ) . '</strong> ' . sprintf( esc_attr__( 'After changing this, please go to %1$s section and save it once.', 'xclean' ), pbmit_esc_kses('<a href="' . esc_url( get_admin_url().'options-permalink.php' ) . '" target="_blank"><strong>Settings > Permalinks</strong></a>') ) . '<br /><br />',
				'default'		=> esc_attr( 'portfolio' ),
				'priority'		=> 10,
			),
			// Portfolio Category
			array(
				'type'			=> 'text',
				'settings'		=> 'portfolio-cat-title',
				'label'			=> sprintf( esc_attr__( '%1$s Title', 'xclean' ) , $portfolio_cat_singular_title ) ,
				'description'	=> esc_attr__( 'Taxonomy Title', 'xclean' ),
				'default'		=> esc_attr__( 'Portfolio Categories', 'xclean' ),
				'priority'		=> 10,
			),
			array(
				'type'			=> 'text',
				'settings'		=> 'portfolio-cat-singular-title',
				'label'			=> sprintf( esc_attr__( '%1$s Title (Singular)', 'xclean' ) , $portfolio_cat_singular_title ) ,
				'description'	=> esc_attr__( 'Taxonomy Singular Title', 'xclean' ),
				'default'		=> esc_attr__( 'Portfolio Category', 'xclean' ),
				'priority'		=> 10,
			),
			array(
				'type'			=> 'text',
				'settings'		=> 'portfolio-cat-slug',
				'label'			=> sprintf( esc_attr__( '%1$s URl Slug', 'xclean' ) , $portfolio_cat_singular_title ) ,
				'description'	=> esc_attr__( 'Taxonomy URL slug', 'xclean' ),
				'description'	=> esc_attr__( 'Taxonomy URL slug.', 'xclean' ) . '<br />' . '<strong>' . esc_attr__( 'NOTE:', 'xclean' ) . '</strong> ' . sprintf( esc_attr__( 'After changing this, please go to %1$s section and save it once.', 'xclean' ), pbmit_esc_kses('<a href="' . esc_url( get_admin_url().'options-permalink.php' ) . '" target="_blank"><strong>Settings > Permalinks</strong></a>') ) . '<br /><br />',
				'priority'		=> 10,
			),
		)
	),
	// Service Settings
	'service_options' => array(
		'section_settings' => array(
			'title'			=> sprintf( esc_attr__( '%1$s options', 'xclean' ) , $service_cpt_singular_title ) ,
			'panel'			=> 'xclean_base_options',
			'priority'		=> 160,
		),
		'section_fields' => array(
			array(
				'type'			=> 'custom',
				'settings'		=> 'custom-single-service-settings',
				'default'		=> '<div class="pbminfotech-option-heading"><h2>' . sprintf( esc_html__( 'Single %1$s Options', 'xclean' ), $service_cpt_singular_title ) . '</h2> <span>' . sprintf( esc_attr__( 'Sidebar options for %1$s Section', 'xclean' ), $service_cpt_singular_title ) . '</span></div>',
			),
			array(
				'type'		=> 'radio-image',
				'settings'	=> 'service-single-style',
				'label'		=> sprintf( esc_html__( '%1$s Single View Style', 'xclean' ), $service_cpt_singular_title ),
				'default'	=> '1',
				'choices'		=> $service_single_style_array,
			),
			array(
				'type'			=> 'switch',
				'settings'		=> 'service-show-related',
				'label'			=> sprintf( esc_attr__( 'Show Related %1$s', 'xclean' ), $service_cpt_singular_title ),
				'default'		=> '0',
				'choices'	 => array(
					'on'  => esc_attr__( 'Yes', 'xclean' ),
					'off' => esc_attr__( 'No', 'xclean' ),
				),
			),
			array(
			'type'			=> 'text',
			'settings'		=> 'service-related-title',
			'label'			=> sprintf( esc_attr__( 'Related %1$s Section Title', 'xclean' ), $service_cpt_singular_title ),
			'description'	=> esc_attr__( 'Related Area Title', 'xclean' ),
			'default'		=> sprintf( esc_attr__( 'Related %1$s', 'xclean' ), $service_cpt_singular_title ),
			'active_callback' => array(
				array(
					'setting'	=> 'service-show-related',
					'operator'	=> '==',
					'value'		=> '1',
				),
			),
			),
			array(
				'type'			=> 'number',
				'settings'		=> 'service-related-count',
				'label'			=> sprintf( esc_attr__( 'How many %1$s you like to show', 'xclean' ), $service_cpt_singular_title ),
				'default'		=> 3,
				'choices'		=> array(
					'min'			=> 1,
					'max'			=> 50,
					'step'			=> 1,
				),
				'active_callback' => array(
					array(
						'setting'	=> 'service-show-related',
						'operator'	=> '==',
						'value'		=> '1',
					),
				),
			),
			array(
				'type'			=> 'radio-image',
				'settings'		=> 'service-related-column',
				'label'			=> sprintf( esc_html__( 'Related %1$s Column', 'xclean' ), $service_cpt_singular_title ),
				'default'		=> '3',
				'choices'	 => $column_list,
				'active_callback' => array(
					array(
						'setting'	=> 'service-show-related',
						'operator'	=> '==',
						'value'		=> '1',
					),
				),
			),
			array(
				'type'			=> 'radio-image',
				'settings'		=> 'service-related-style',
				'label'			=> sprintf( esc_html__( 'Related %1$s View', 'xclean' ), $service_cpt_singular_title ),
				'default'		=> '1',
				'choices'	 => pbmit_element_template_list('service', 'customizer'),
				'active_callback' => array(
					array(
						'setting'	=> 'service-show-related',
						'operator'	=> '==',
						'value'		=> '1',
					),
				),
			),
			array(
				'type'			=> 'custom',
				'settings'		=> 'custom-service-cat-view',
				'default'		=> '<div class="pbminfotech-option-heading"><h2>' . sprintf( esc_html__( 'Element View Style for %1$s', 'xclean' ), $service_cat_singular_title ) . '</h2> <span>' . sprintf( esc_attr__( 'Select view style for elements on %1$s', 'xclean' ) , $service_cat_singular_title ) . '</span></div>',
			),
			array(
				'type'			=> 'radio-image',
				'settings'		=> 'service-cat-style',
				'label'			=> sprintf( esc_html__( 'Element View on %1$s', 'xclean' ), $service_cat_singular_title ),
				'default'		=> '1',
				'choices'		=> pbmit_element_template_list('service', 'customizer'),
			),
			array(
				'type'			=> 'radio-image',
				'settings'		=> 'service-cat-column',
				'label'			=> sprintf( esc_html__( '%1$s View Column', 'xclean' ), $service_cat_singular_title ),
				'default'		=> '3',
				'choices'		=> $column_list,
			),
			array(
				'type'			=> 'number',
				'settings'		=> 'service-cat-count',
				'label'			=> sprintf( esc_attr__( 'How many %1$s you like to show on single %2$s page', 'xclean' ), $service_cpt_singular_title, $service_cat_singular_title ),
				'default'		=> 9,
				'choices'		=> array(
					'min'			=> 1,
					'max'			=> 50,
					'step'			=> 1,
				),
			),
			array(
				'type'			=> 'custom',
				'settings'		=> 'custom-service-sidebar-settings',
				'default'		=> '<div class="pbminfotech-option-heading"><h2>' . esc_html__( 'Sidebar Options', 'xclean' ) . '</h2> <span>' . sprintf( esc_attr__( 'Sidebar options for %1$s Section', 'xclean' ) , $service_cpt_singular_title ) . '</span></div>',
			),
			array(
				'type'		=> 'radio-image',
				'settings'	=> 'sidebar-service',
				'label'		=> sprintf( esc_html__( '%1$s Sidebar', 'xclean' ), $service_cpt_singular_title ),
				'default'	=> 'left',
				'choices'		=> array(
					'left'		=> get_template_directory_uri() . '/includes/images/sidebar-left.png',
					'right'		=> get_template_directory_uri() . '/includes/images/sidebar-right.png',
					'no'		=> get_template_directory_uri() . '/includes/images/sidebar-no.png',
				),	
			),
			array(
				'type'		=> 'radio-image',
				'settings'	=> 'sidebar-service-category',
				'label'		=> sprintf( esc_html__( '%1$s Sidebar', 'xclean' ), $service_cat_singular_title ),
				'default'	=> 'no',
				'choices'		=> array(
					'left'		=> get_template_directory_uri() . '/includes/images/sidebar-left.png',
					'right'		=> get_template_directory_uri() . '/includes/images/sidebar-right.png',
					'no'		=> get_template_directory_uri() . '/includes/images/sidebar-no.png',
				),
			),
			// Advanced - Heading Options
			array(
				'type'			=> 'custom',
				'settings'		=> 'service-advanced-heading',
				'default'		=> '<div class="pbminfotech-option-heading"><h2>' . esc_html__( 'Advanced Options', 'xclean' ) . '</h2> <span>' . sprintf( esc_attr__( 'Advanced Options for %1$s Section', 'xclean' ) , $service_cpt_singular_title ) . '</span></div>',
			),
			array(	
				'type'			=> 'text',
				'settings'		=> 'service-cpt-title',
				'label'			=> sprintf( esc_attr__( '%1$s Section Title', 'xclean' ) , $service_cpt_singular_title ) ,
				'description'	=> esc_attr__( 'CPT Title', 'xclean' ),
				'default'		=> esc_attr__( 'Service', 'xclean' ),
				'priority'		=> 10,
			),
			array(
				'type'			=> 'text',
				'settings'		=> 'service-cpt-singular-title',
				'label'			=> sprintf( esc_attr__( '%1$s Section Title (Singular)', 'xclean' ) , $service_cpt_singular_title ) ,
				'description'	=> esc_attr__( 'CPT Singular Title', 'xclean' ),
				'default'		=> esc_attr__( 'Service', 'xclean' ),
				'priority'		=> 10,
			),
			array(
				'type'			=> 'text',
				'settings'		=> 'service-cpt-slug',
				'label'			=> sprintf( esc_attr__( '%1$s Section URl Slug', 'xclean' ) , $service_cpt_singular_title ) ,
				'description'	=> esc_attr__( 'CPT URL slug.', 'xclean' ) . '<br />' . '<strong>' . esc_attr__( 'NOTE:', 'xclean' ) . '</strong> ' . sprintf( esc_attr__( 'After changing this, please go to %1$s section and save it once.', 'xclean' ), pbmit_esc_kses('<a href="' . esc_url( get_admin_url().'options-permalink.php' ) . '" target="_blank"><strong>Settings > Permalinks</strong></a>') ) . '<br /><br />',
				'default'		=> esc_attr( 'service' ),
				'priority'		=> 10,
			),
			// Service Category
			array(
				'type'			=> 'text',
				'settings'		=> 'service-cat-title',
				'label'			=> sprintf( esc_attr__( '%1$s Title', 'xclean' ) , $service_cat_singular_title ) ,
				'description'	=> esc_attr__( 'Taxonomy Title', 'xclean' ),
				'default'		=> esc_attr__( 'Service Categories', 'xclean' ),
				'priority'		=> 10,
			),
			array(
				'type'			=> 'text',
				'settings'		=> 'service-cat-singular-title',
				'label'			=> sprintf( esc_attr__( '%1$s Title (Singular)', 'xclean' ) , $service_cat_singular_title ) ,
				'description'	=> esc_attr__( 'Taxonomy Singular Title', 'xclean' ),
				'default'		=> esc_attr__( 'Service Category', 'xclean' ),
				'priority'		=> 10,
			),
			array(
				'type'			=> 'text',
				'settings'		=> 'service-cat-slug',
				'label'			=> sprintf( esc_attr__( '%1$s URl Slug', 'xclean' ) , $service_cat_singular_title ) ,
				'description'	=> esc_attr__( 'Taxonomy URL slug.', 'xclean' ) . '<br />' . '<strong>' . esc_attr__( 'NOTE:', 'xclean' ) . '</strong> ' . sprintf( esc_attr__( 'After changing this, please go to %1$s section and save it once.', 'xclean' ), pbmit_esc_kses('<a href="' . esc_url( get_admin_url().'options-permalink.php' ) . '" target="_blank"><strong>Settings > Permalinks</strong></a>') ) . '<br /><br />',
				'default'		=> esc_attr( 'service-category' ),
				'priority'		=> 10,
			),
		)
	),
	// Team Member Settings
	'team_options' => array(
			'section_settings' => array(
			'title'			=> sprintf( esc_attr__( '%1$s options', 'xclean' ) , $team_cpt_singular_title ) ,
			'panel'			=> 'xclean_base_options',
			'priority'		=> 160,
		),
		'section_fields' => array(
			array(
				'type'			=> 'custom',
				'settings'		=> 'custom-single-team-settings',
				'default'		=> '<div class="pbminfotech-option-heading"><h2>' . sprintf( esc_html__( 'Single %1$s Options', 'xclean' ), $team_cpt_singular_title ) . '</h2> <span>' . sprintf( esc_attr__( 'Sidebar options for %1$s Section', 'xclean' ), $team_cpt_singular_title ) . '</span></div>',
			),
			array(
				'type'		=> 'radio-image',
				'settings'	=> 'team-single-style',
				'label'		=> sprintf( esc_html__( '%1$s Single View Style', 'xclean' ), $team_cpt_singular_title ),
				'default'	=> '1',
				'choices'		=> $team_single_style_array,
			),
			array(
				'type'			=> 'custom',
				'settings'		=> 'custom-team-group-view',
				'default'		=> '<div class="pbminfotech-option-heading"><h2>' . sprintf( esc_html__( 'Element View Style for %1$s', 'xclean' ), $team_group_singular_title ) . '</h2> <span>' . sprintf( esc_attr__( 'Select view style for elements on %1$s', 'xclean' ) , $team_group_singular_title ) . '</span></div>',
			),
			array(
				'type'			=> 'radio-image',
				'settings'		=> 'team-group-style',
				'label'			=> sprintf( esc_html__( 'Element View on %1$s', 'xclean' ), $team_group_singular_title ),
				'default'		=> '1',
				'choices'		=> pbmit_element_template_list('team', 'customizer'),
			),
			array(
				'type'			=> 'radio-image',
				'settings'		=> 'team-group-column',
				'label'			=> sprintf( esc_html__( '%1$s View Column', 'xclean' ), $team_group_singular_title ),
				'default'		=> '3',
				'choices'		=> $column_list,
			),
			array(
				'type'			=> 'number',
				'settings'		=> 'team-group-count',
				'label'			=> sprintf( esc_attr__( 'How many %1$s you like to show on single %2$s page', 'xclean' ), $team_cpt_singular_title, $team_group_singular_title ),
				'default'		=> 9,
				'choices'		=> array(
					'min'			=> 1,
					'max'			=> 50,
					'step'			=> 1,
				),
				'active_callback' => array(
					array(
						'setting'	=> 'portfolio-show-related',
						'operator'	=> '==',
						'value'		=> '1',
					),
				),
			),
			array(
				'type'			=> 'custom',
				'settings'		=> 'custom-team-member-sidebar-settings',
				'default'		=> '<div class="pbminfotech-option-heading"><h2>' . esc_html__( 'Sidebar Options', 'xclean' ) . '</h2> <span>' . sprintf( esc_attr__( 'Sidebar options for %1$s Section', 'xclean' ) , $team_cpt_singular_title ) . '</span></div>',
			),
			array(
				'type'		=> 'radio-image',
				'settings'	=> 'sidebar-team-member',
				'label'		=> sprintf( esc_html__( '%1$s Sidebar', 'xclean' ), $team_cpt_singular_title ),
				'default'	=> 'no',
				'choices'		=> array(
					'left'		=> get_template_directory_uri() . '/includes/images/sidebar-left.png',
					'right'		=> get_template_directory_uri() . '/includes/images/sidebar-right.png',
					'no'		=> get_template_directory_uri() . '/includes/images/sidebar-no.png',
				),
			),
			array(
				'type'		=> 'radio-image',
				'settings'	=> 'sidebar-team-group',
				'label'		=> sprintf( esc_html__( '%1$s Sidebar', 'xclean' ), $team_group_singular_title ),
				'default'	=> 'no',
				'choices'		=> array(
					'left'		=> get_template_directory_uri() . '/includes/images/sidebar-left.png',
					'right'		=> get_template_directory_uri() . '/includes/images/sidebar-right.png',
					'no'		=> get_template_directory_uri() . '/includes/images/sidebar-no.png',
				),
			),
			// Heading Options
			array(
				'type'			=> 'custom',
				'settings'		=> 'team_advanced_heading',
				'default'		=> '<div class="pbminfotech-option-heading"><h2>' . esc_html__( 'Advanced Options', 'xclean' ) . '</h2> <span>' . sprintf( esc_attr__( 'Advanced Options for %1$s Section', 'xclean' ) , $team_cpt_singular_title ) . '</span></div>',
			),
			array(
				'type'			=> 'text',
				'settings'		=> 'team-cpt-title',
				'label'			=> sprintf( esc_attr__( '%1$s Section Title', 'xclean' ) , $team_cpt_singular_title ) ,
				'description'	=> esc_attr__( 'CPT Title', 'xclean' ),
				'default'		=> esc_attr__( 'Team Members', 'xclean' ),
				'priority'		=> 10,
			),
			array(
				'type'			=> 'text',
				'settings'		=> 'team-cpt-singular-title',
				'label'			=> sprintf( esc_attr__( '%1$s Section Title (Singular)', 'xclean' ) , $team_cpt_singular_title ) ,
				'description'	=> esc_attr__( 'CPT Singular Title', 'xclean' ),
				'default'		=> esc_attr__( 'Team Member', 'xclean' ),
				'priority'		=> 10,
			),
			array(
				'type'			=> 'text',
				'settings'		=> 'team-cpt-slug',
				'label'			=> sprintf( esc_attr__( '%1$s Section URl Slug', 'xclean' ) , $team_cpt_singular_title ) ,
				'description'	=> esc_attr__( 'CPT URL slug.', 'xclean' ) . '<br />' . '<strong>' . esc_attr__( 'NOTE:', 'xclean' ) . '</strong> ' . sprintf( esc_attr__( 'After changing this, please go to %1$s section and save it once.', 'xclean' ), pbmit_esc_kses('<a href="' . esc_url( get_admin_url().'options-permalink.php' ) . '" target="_blank"><strong>Settings > Permalinks</strong></a>') ) . '<br /><br />',
				'default'		=> esc_attr( 'team' ),
				'priority'		=> 10,
			),
			// Team Member group
			array(
				'type'			=> 'text',
				'settings'		=> 'team-group-title',
				'label'			=> sprintf( esc_attr__( '%1$s Title', 'xclean' ) , $team_group_singular_title ) ,
				'description'	=> esc_attr__( 'Taxonomy Title', 'xclean' ),
				'default'		=> esc_attr__( 'Team Groups', 'xclean' ),
				'priority'		=> 10,
			),
			array(
				'type'			=> 'text',
				'settings'		=> 'team-group-singular-title',
				'label'			=> sprintf( esc_attr__( '%1$s Title (Singular)', 'xclean' ) , $team_group_singular_title ) ,
				'description'	=> esc_attr__( 'Taxonomy Singular Title', 'xclean' ),
				'default'		=> esc_attr__( 'Team Group', 'xclean' ),
				'priority'		=> 10,
			),
			array(
				'type'			=> 'text',
				'settings'		=> 'team-group-slug',
				'label'			=> sprintf( esc_attr__( '%1$s URl Slug', 'xclean' ) , $team_group_singular_title ) ,
				'description'	=> esc_attr__( 'Taxonomy URL slug.', 'xclean' ) . '<br />' . '<strong>' . esc_attr__( 'NOTE:', 'xclean' ) . '</strong> ' . sprintf( esc_attr__( 'After changing this, please go to %1$s section and save it once.', 'xclean' ), pbmit_esc_kses('<a href="' . esc_url( get_admin_url().'options-permalink.php' ) . '" target="_blank"><strong>Settings > Permalinks</strong></a>') ) . '<br /><br />',
				'default'		=> esc_attr( 'team-group' ),
				'priority'		=> 10,
			),
		)
	),
	// Testimonial Settings
	'testimonial_options' => array(
		'section_settings' => array(
			'title'			=> sprintf( esc_attr__( '%1$s options', 'xclean' ) , $testimonial_cpt_singular_title ) ,
			'panel'			=> 'xclean_base_options',
			'priority'		=> 160,
		),
		'section_fields' => array(
			// Heading Options
			array(
				'type'			=> 'custom',
				'settings'		=> 'testimonial_advanced_heading',
				'default'		=> '<div class="pbminfotech-option-heading"><h2>' . esc_html__( 'Advanced Options', 'xclean' ) . '</h2> <span>' . sprintf( esc_attr__( 'Advanced Options for %1$s Section', 'xclean' ) , $testimonial_cpt_singular_title ) . '</span></div>',
			),
			array(
				'type'			=> 'text',
				'settings'		=> 'testimonial-cpt-title',
				'label'			=> sprintf( esc_attr__( '%1$s Section Title', 'xclean' ) , $testimonial_cpt_singular_title ) ,
				'description'	=> esc_attr__( 'CPT Title', 'xclean' ),
				'default'		=> esc_attr__( 'Testimonials', 'xclean' ),
				'priority'		=> 10,
			),
			array(
				'type'			=> 'text',
				'settings'		=> 'testimonial-cpt-singular-title',
				'label'			=> sprintf( esc_attr__( '%1$s Section Title (Singular)', 'xclean' ) , $testimonial_cpt_singular_title ) ,
				'description'	=> esc_attr__( 'CPT Singular Title', 'xclean' ),
				'default'		=> esc_attr__( 'Testimonial', 'xclean' ),
				'priority'		=> 10,
			),
			array(
				'type'			=> 'text',
				'settings'		=> 'testimonial-cat-title',
				'label'			=> sprintf( esc_attr__( '%1$s Title', 'xclean' ) , $testimonial_cat_singular_title ) ,
				'description'	=> esc_attr__( 'Taxonomy Title', 'xclean' ),
				'default'		=> esc_attr__( 'Testimonial Categories', 'xclean' ),
				'priority'		=> 10,
			),
			array(
				'type'			=> 'text',
				'settings'		=> 'testimonial-cat-singular-title',
				'label'			=> sprintf( esc_attr__( '%1$s Title (Singular)', 'xclean' ) , $testimonial_cat_singular_title ) ,
				'description'	=> esc_attr__( 'Taxonomy Singular Title', 'xclean' ),
				'default'		=> esc_attr__( 'Testimonial Category', 'xclean' ),
				'priority'		=> 10,
			),
		)
	),
	// Search Settings
	'search_results_options' => array(
		'section_settings' => array(
			'title'			=> esc_attr__( 'Search Results options', 'xclean' ),
			'panel'			=> 'xclean_base_options',
			'priority'		=> 160,
		),
		'section_fields' => array(
			// Heading Options
			array(
				'type'			=> 'custom',
				'settings'		=> 'search_results_heading',
				'default'		=> '<div class="pbminfotech-option-heading"><h2>' . esc_html__( 'Search Results Settings', 'xclean' ) . '</h2> <span>' . esc_attr__( 'Settings for Search Results page', 'xclean' ) . '</span></div>',
			),
			array(
				'type'			=> 'text',
				'settings'		=> 'no-results-title',
				'label'			=> esc_attr__( 'Title for "No Search Results" page', 'xclean' ),
				'description'	=> esc_attr__( 'Title to show when there is no search results', 'xclean' ),
				'default'		=> esc_attr__( 'No Results Found', 'xclean' ),
			),
			array(
				'type'			=> 'textarea',
				'settings'		=> 'no-results-text',
				'label'			=> esc_attr__( 'Text for "No Search Results" page', 'xclean' ),
				'description'	=> esc_attr__( 'Text to show when there is no search results', 'xclean' ),
				'default'		=> esc_attr__('Sorry, but nothing matched your search terms. Please try again with some different keywords.','xclean'),
			),
			array(
				'type'			=> 'custom',
				'settings'		=> 'search-sidebar-options',
				'default'		=> '<div class="pbminfotech-option-heading"><h2>' . esc_html__( 'Sidebar Settings', 'xclean' ) . '</h2> <span>' . esc_html__( 'Select sidebar position for search results page.', 'xclean' ) . '</span></div>',
			),
			array(
				'type'		=> 'radio-image',
				'settings'	=> 'sidebar-search',
				'label'		=> esc_html__( 'Search Results Sidebar', 'xclean' ),
				'default'	=> 'no',
				'choices'		=> array(
					'left'		=> get_template_directory_uri() . '/includes/images/sidebar-left.png',
					'right'		=> get_template_directory_uri() . '/includes/images/sidebar-right.png',
					'no'		=> get_template_directory_uri() . '/includes/images/sidebar-no.png',
				),
			),
		)
	),
	// Error 404 Settings
	'error_404_options' => array(
		'section_settings' => array(
			'title'			=> esc_attr__( 'Error 404 options', 'xclean' ),
			'panel'			=> 'xclean_base_options',
			'priority'		=> 160,
		),
		'section_fields' => array(
			// Heading Options
			array(
				'type'			=> 'custom',
				'settings'		=> 'error_404_heading',
				'default'		=> '<div class="pbminfotech-option-heading"><h2>' . esc_html__( 'Error 404 Settings', 'xclean' ) . '</h2> <span>' . esc_attr__( 'Settings for error 404 page', 'xclean' ) . '</span></div>',
			),
			array(
				'type'			=> 'text',
				'settings'		=> 'error-404-heading',
				'label'			=> esc_attr__( 'Error 404 Heading', 'xclean' ),
				'description'	=> esc_attr__( 'This is heading for 404 page', 'xclean' ),
				'default'		=> esc_attr__( '404', 'xclean' ),
			),
			array(
				'type'			=> 'textarea',
				'settings'		=> 'error-404-text',
				'label'			=> esc_attr__( 'Error 404 Text', 'xclean' ),
				'description'	=> esc_attr__( 'This is text for 404 page', 'xclean' ),
				'default'		=> esc_attr__( 'Whoops! Whatever you are looking for cannot be found.', 'xclean' ),
			),
			array(
				'type'			=> 'switch',
				'settings'		=> 'error-404-show-search',
				'label'			=> esc_attr__( 'Show search form on 404 page', 'xclean' ),
				'default'		=> '1',
				'priority'		=> 10,
				'choices'		=> array(
					'on'			=> esc_attr__( 'Yes', 'xclean' ),
					'off'			=> esc_attr__( 'No', 'xclean' ),
				),
			),
			array(
				'type'			=> 'custom',
				'settings'		=> 'error_404_text_custom',
				'default'		=> '<div class="pbminfotech-option-heading"><h2>' . esc_html__( 'Error 404 Text Color', 'xclean' ) . '</h2> <span>' . esc_attr__( 'Settings for text color for 404 error page', 'xclean' ) . '</span></div>',
			),
			array(
				'type'				=> 'radio-image',
				'settings'			=> 'e404-text-color',
				'label'				=> esc_attr__( 'Select 404 page text color', 'xclean' ),
				'default'			=> 'white',
				'choices'			=> $pre_text_color_2_list,
			),
			array(
				'type'			=> 'custom',
				'settings'		=> 'error_404_bg_custom',
				'default'		=> '<div class="pbminfotech-option-heading"><h2>' . esc_html__( 'Error 404 Background Option', 'xclean' ) . '</h2> <span>' . esc_attr__( 'Settings for background color/image for 404 error page', 'xclean' ) . '</span></div>',
			),
			array(
				'type'				=> 'radio-image',
				'settings'			=> 'e404-bgcolor',
				'label'				=> esc_html__( 'Select 404 page background color', 'xclean' ),
				'default'			=> 'custom',
				'choices'			=> $pre_color_list,
			),
			array(
				'type'			=> 'background',
				'settings'		=> 'e404-background',
				'label'			=> esc_attr__( 'Background', 'xclean' ),
				'description'	=> esc_attr__( 'Background Settings', 'xclean' ),
				'default'		=> array(				
					'background-color'		=> 'rgba(0,24,55,0.50)',
					'background-repeat'		=> 'no-repeat',
					'background-position'	=> 'center center',
					'background-size'		=> 'cover',
					'background-attachment'	=> 'scroll',
				),
				'pbmit-output'	=> '.error404 .site-content-wrap, .error404 .pbmit-bg-color-custom > .site-content-wrap:before',
			),
		)
	),
	// Login Page Settings
	'login_page_options' => array(
		'section_settings' => array(
			'title'			=> esc_attr__( 'Login Page options', 'xclean' ),
			'panel'			=> 'xclean_base_options',
			'priority'		=> 160,
		),
		'section_fields' => array(
			array(
				'type'			=> 'custom',
				'settings'		=> 'login_page_heading',
				'default'		=> '<div class="pbminfotech-option-heading"><h2>' . esc_html__( 'Login Page Settings', 'xclean' ) . '</h2> <span>' . esc_attr__( 'Settings for Login Page page', 'xclean' ) . '</span></div>',
			),
			array(
				'type'			=> 'switch',
				'settings'		=> 'custom-login-logo',
				'label'			=> esc_attr__( 'Show different logo?', 'xclean' ),
				'description'	=> esc_attr__( 'Show different logo then the default logo you selected for your site.', 'xclean' ),
				'default'		=> '1',
				'choices'		=> array(
					'on'  => esc_attr__( 'Yes', 'xclean' ),
					'off' => esc_attr__( 'No', 'xclean' ),
				),
			),
			array(
				'type'				=> 'image',
				'settings'			=> 'login-logo',
				'label'				=> esc_attr__( 'Login Page Custom Logo', 'xclean' ),
				'description'		=> esc_attr__( 'Select logo for the login page', 'xclean' ),
				'default'			=> get_template_directory_uri() . '/images/logo.svg',
				'active_callback'	=> array( array(
					'setting'			=> 'custom-login-logo',
					'operator'			=> '==',
					'value'				=> '1',
				) ),
			),
			array(
				'type'			=> 'background',
				'settings'		=> 'login-page-background',
				'label'			=> esc_attr__( 'Login Page Background', 'xclean' ),
				'description'	=> esc_attr__( 'Background Settings for the login page', 'xclean' ),
				'default'		=> array(				
					'background-color'	  => '#666666',
					'background-repeat'	 => 'no-repeat',
					'background-position'   => 'center top',
					'background-size'	   => 'cover',
					'background-attachment' => 'scroll',
				),
			),
		)
	),
	// Custom CSS/JS Options
	'custom_code_options' => array(
		'section_settings' => array(
			'title'			=> esc_attr__( 'CSS/JS Code', 'xclean' ),
			'panel'			=> 'xclean_base_options',
			'priority'		=> 160,
		),
		'section_fields' => array(
			// Heading Options
			array(
				'type'			=> 'custom',
				'settings'		=> 'tracking_js_heading',
				'default'		=> '<div class="pbminfotech-option-heading"><h2>' . esc_html__( 'Tracking Code', 'xclean' ) . '</h2> <span>' . esc_attr__( 'Code for Google Tracking or other ', 'xclean' ) . '</span></div>',
			),
			array(
				'type'			=> 'textarea',
				'settings'		=> 'tracking-code',
				'label'			=> esc_attr__( 'Tracking Code', 'xclean' ),
				'description'	=> esc_attr__( 'This code will be added to HEAD element on your all pages.', 'xclean' ),
				'default'		=> '',
			),
			array(
				'type'			=> 'custom',
				'settings'		=> 'cust_css_heading',
				'default'		=> '<div class="pbminfotech-option-heading"><h2>' . esc_html__( 'Custom CSS Code', 'xclean' ) . '</h2> <span>' . esc_attr__( 'Custom CSS Code', 'xclean' ) . '</span></div>',
			),
			array(
				'type'			=> 'textarea',
				'settings'		=> 'css-code',
				'label'			=> esc_attr__( 'Custom CSS Code', 'xclean' ),
				'description'	=> esc_attr__( 'Add your custom CSS code here.', 'xclean' ),
				'default'		=> '',
			),
			array(
				'type'			=> 'textarea',
				'settings'		=> 'js-code',
				'label'			=> esc_attr__( 'Custom JS Code', 'xclean' ),
				'description'	=> esc_attr__( 'Add your custom JS code here.', 'xclean' ),
				'default'		=> '',
			),
		)
	),
);
// adding WooCommerce options
if( function_exists('is_woocommerce') ){
	$kirki_options_array2 = array();
	foreach( $kirki_options_array as $sections=>$settings ){
		$kirki_options_array2[$sections] = $settings;
		if( $sections == 'portfolio_options' ){
			$kirki_options_array2['woocommerce_options'] = array(
				'section_settings' => array(
					'title'			=> esc_attr__( 'WooCommerce Options', 'xclean' ),
					'panel'			=> 'xclean_base_options',
					'priority'		=> 160,
				),
				'section_fields' => array(
					// Heading Options
					array(
						'type'		=> 'radio-image',
						'settings'	=> 'sidebar-wc-shop',
						'label'		=> esc_html__( 'WooCommerce Shop Sidebar', 'xclean' ),
						'default'	=> 'right',
						'choices'		=> array(
							'left'		=> get_template_directory_uri() . '/includes/images/sidebar-left.png',
							'right'		=> get_template_directory_uri() . '/includes/images/sidebar-right.png',
							'no'		=> get_template_directory_uri() . '/includes/images/sidebar-no.png',
						),
					),
					array(
						'type'		=> 'radio-image',
						'settings'	=> 'sidebar-wc-single',
						'label'		=> esc_html__( 'WooCommerce Single Product Sidebar', 'xclean' ),
						'default'	=> 'right',
						'choices'		=> array(
							'left'		=> get_template_directory_uri() . '/includes/images/sidebar-left.png',
							'right'		=> get_template_directory_uri() . '/includes/images/sidebar-right.png',
							'no'		=> get_template_directory_uri() . '/includes/images/sidebar-no.png',
						),
					),
					array(
						'type'		=> 'text',
						'settings'	=> 'wc-title',
						'label'		=> esc_attr__( 'WooCommerce Shop Page Title', 'xclean' ),
						'description'	=> esc_attr__( 'This will appear in Titlebar on Shop page.', 'xclean' ),
						'default'	=> esc_attr('Shop'),
					),
					array(
						'type'			=> 'select',
						'settings'		=> 'wc-related-count',
						'label'			=> esc_attr__( 'How many related products will be shown?', 'xclean' ),
						'description'	=> esc_attr__( 'How many related products will be shown on single product page?', 'xclean' ),
						'default'		=> '3',
						'choices'		=> array(
							'1'		=> esc_attr__( '1 product', 'xclean' ),
							'2'		=> esc_attr__( '2 products', 'xclean' ),
							'3'		=> esc_attr__( '3 products', 'xclean' ),
							'4'		=> esc_attr__( '4 products', 'xclean' ),
						),
					),
					array(
						'type'			=> 'switch',
						'settings'		=> 'wc-show-cart-icon',
						'label'			=> esc_attr__( 'Show Cart Icon in Header?', 'xclean' ),
						'description'	=> esc_attr__( 'Show or hide cart icon in header area. The icon will appear only if WooCommerce plugin is active.', 'xclean' ),
						'default'		=> '0',
						'choices'		=> array(
							'on'		=> esc_attr__( 'Yes', 'xclean' ),
							'off'		=> esc_attr__( 'No', 'xclean' ),
						),
					),
					array(
						'type'			=> 'switch',
						'settings'		=> 'wc-show-cart-amount',
						'label'			=> esc_attr__( 'Show Amount with Cart Icon in Header?', 'xclean' ),
						'description'	=> esc_attr__( 'Show or hide cart amount with cart icon in header area. The icon will appear only if WooCommerce plugin is active.', 'xclean' ),
						'default'		=> '0',
						'choices'		=> array(
							'on'		=> esc_attr__( 'Yes', 'xclean' ),
							'off'		=> esc_attr__( 'No', 'xclean' ),
						),
						'active_callback' => array( array(
							'setting'		=> 'wc-show-cart-icon',
							'operator'		=> '==',
							'value'			=> '1',
						) ),
					),
				)
			);
		}
	} // foreach
	$kirki_options_array = $kirki_options_array2;
}
// adding Event options
if( class_exists('WP_Event_Manager') ){
	$kirki_options_array3 = array();
	foreach( $kirki_options_array as $sections=>$settings ){
		$kirki_options_array3[$sections] = $settings;
		if( $sections == 'portfolio_options' ){
			$kirki_options_array3['event_options'] = array(
				'section_settings' => array(
					'title'			=> esc_attr__( 'Event Options', 'xclean' ),
					'panel'			=> 'xclean_base_options',
					'priority'		=> 160,
				),
				'section_fields' => array(
					// Heading Options
					array(
						'type'			=> 'custom',
						'settings'		=> 'custom-event-column-options',
						'default'		=> '<div class="pbminfotech-option-heading"><h2>' . esc_html__( 'Column Settings', 'xclean' ) . '</h2> <span>' . esc_html__( 'Select column for the Event listing.', 'xclean' ) . '</span></div>',
					),
					array(
						'type'		=> 'radio-image',
						'settings'	=> 'event-column',
						'label'		=> esc_html__( 'Event Column', 'xclean' ),
						'description'	=> esc_html__( 'Select column structure for Event', 'xclean' ),
						'default'	=> '3-3-3-3',
						'choices'		=> array(
							'12'		=> get_template_directory_uri() . '/includes/images/footer-12.png',
							'6-6'		=> get_template_directory_uri() . '/includes/images/footer-6-6.png',
							'4-4-4'		=> get_template_directory_uri() . '/includes/images/footer-4-4-4.png',
							'3-3-3-3'	=> get_template_directory_uri() . '/includes/images/footer-3-3-3-3.png',
						),
					),
					// Heading Options
					array(
						'type'			=> 'custom',
						'settings'		=> 'custom-event-sidebar-options',
						'default'		=> '<div class="pbminfotech-option-heading"><h2>' . esc_html__( 'Sidebar Settings', 'xclean' ) . '</h2> <span>' . esc_html__( 'Select sidebar position for Event section.', 'xclean' ) . '</span></div>',
					),
					array(
						'type'		=> 'radio-image',
						'settings'	=> 'sidebar-event',
						'label'		=> esc_html__( 'Event Sidebar', 'xclean' ),
						'default'	=> 'right',
						'choices'		=> array(
							'left'		=> get_template_directory_uri() . '/includes/images/sidebar-left.png',
							'right'		=> get_template_directory_uri() . '/includes/images/sidebar-right.png',
							'no'		=> get_template_directory_uri() . '/includes/images/sidebar-no.png',
						),
					),
					array(
						'type'		=> 'radio-image',
						'settings'	=> 'sidebar-event-single',
						'label'		=> esc_html__( 'Event Single Sidebar', 'xclean' ),
						'default'	=> 'no',
						'choices'		=> array(
							'left'		=> get_template_directory_uri() . '/includes/images/sidebar-left.png',
							'right'		=> get_template_directory_uri() . '/includes/images/sidebar-right.png',
							'no'		=> get_template_directory_uri() . '/includes/images/sidebar-no.png',
						),
					),
				)
			);
		}
	} // foreach
	$kirki_options_array = $kirki_options_array3;
}