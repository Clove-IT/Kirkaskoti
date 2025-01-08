<?php
/**
 *  Common Meta Boxes for all CPT
 */
if( !function_exists('pbmit_set_metabox') ){
function pbmit_set_metabox(){
	//  Check if ACF is enabled
	if( function_exists('acf_add_local_field_group') ){
		if (class_exists('RevSlider')) {
			$rev_slider_list_array = array();
			$slider			= new RevSlider();
			$allArrSliders	= $slider->get_sliders();
			if( is_array($allArrSliders) && count($allArrSliders)>0 ){
				foreach ($allArrSliders as $revSlider) {
					// Getting thumb of slider
					$params = $revSlider->get_overview_data();
					$first_slide_image_thumb = ( !empty($params['bg']['src']) ) ? $params['bg']['src'] : get_template_directory_uri() . '/includes/images/sr-no-thumb.png' ;
					$rev_slider_list_array[ $revSlider->getAlias() ] = '<div data-balloon="' . esc_attr( $revSlider->getTitle() ) . ' (' . esc_attr( $revSlider->getAlias() ) . ')" data-balloon-pos="down"><img class="pbmit-revslider-thumb" src="'.esc_url($first_slide_image_thumb).'" /></div>';
				}
				$rev_slider_option_array = array(
					'key'				=> 'pbmit-revolution-slider',
					'label'				=> esc_attr__('Select Revolution Slider', 'xclean'),
					'name'				=> 'pbmit-revolution-slider',
					'type'				=> 'radio',
					'instructions'		=> esc_attr__('Select that appear in header area', 'xclean'),
					'required'			=> 0,
					'conditional_logic' => array(
						array(
							array(
								'field'		=> 'pbmit-slider-type',
								'operator'	=> '==',
								'value'		=> 'revolution-slider',
							),
						),
					),
					'wrapper'			=> array(
						'width'				=> '60',
						'class'				=> 'pbmit-radio-image-selector',
						'id'				=> '',
					),
					'choices'			=> $rev_slider_list_array,
					'allow_null'		=> 0,
					'other_choice'		=> 0,
					'default_value'		=> '',
					'layout'			=> 'horizontal',
					'return_format'		=> 'value',
					'save_other_choice' => 0,
				);
			} else {
				$rev_slider_option_array = array(
					'key'				=> 'pbmit-message-no-slider-in-revslider',
					'label'				=> esc_attr__('No Slider Found', 'xclean'),
					'name'				=> 'pbmit-message-no-slider-in-revslider',
					'type'				=> 'message',
					'instructions'		=> '',
					'required'			=> 0,
					'conditional_logic' => array(
						array(
							array(
								'field'		=> 'pbmit-slider-type',
								'operator'	=> '==',
								'value'		=> 'revolution-slider',
							),
						),
					),
					'wrapper'			=> array(
						'width'				=> '60',
						'class'				=> '',
						'id'				=> '',
					),
					'message'			=> esc_attr__('No slider found in Revolution Slider. Please create some slider from Admin > Slider Revolution section.', 'xclean'),
					'new_lines'			=> '',
					'esc_html'			=> 0,
				);
			}
		} else {
			$rev_slider_option_array = array(
				'key'				=> 'pbmit-message-no-revslider-plugin',
				'label'				=> esc_attr__('Revolution Slider plugin not installed', 'xclean'),
				'name'				=> 'pbmit-message-no-revslider-plugin',
				'type'				=> 'message',
				'instructions'		=> '',
				'required'			=> 0,
				'conditional_logic' => array(
					array(
						array(
							'field'		=> 'pbmit-slider-type',
							'operator'	=> '==',
							'value'		=> 'revolution-slider',
						),
					),
				),
				'wrapper'			=> array(
					'width'				=> '60',
					'class'				=> '',
					'id'				=> '',
				),
				'message'			=> esc_attr__('Revolution Slider plugin not installed. Please install it from Admin > Appearance > Install Plugins section.', 'xclean'),
				'new_lines'			=> '',
				'esc_html'			=> 0,
			);
		}
		acf_add_local_field_group(array(
			'key'		=> 'pbmit-general-settings',
			'title'		=> esc_attr__('Xclean - General Settings', 'xclean'),
			'fields'	=> array_merge(
				array(
					array(  // Tab - Slider Options
						'key'				=> 'pbmit-tab-slider-options',
						'label'				=> esc_attr__('Header Slider Options', 'xclean'),
						'name'				=> 'pbmit-tab-slider-options',
						'type'				=> 'tab',
						'instructions'		=> '',
						'required'			=> 0,
						'conditional_logic' => 0,
						'wrapper'			=> array(
							'width'				=> '',
							'class'				=> '',
							'id'				=> '',
						),
						'placement'			=> 'top',
						'endpoint'			=> 0,
					),
					array(
						'key'				=> 'pbmit-slider-type',
						'label'				=> esc_attr__('Slider', 'xclean'),
						'name'				=> 'pbmit-slider-type',
						'type'				=> 'radio',
						'instructions'		=> esc_attr__('Select Slider which appear in header area', 'xclean'),
						'required'			=> 0,
						'conditional_logic' => 0,
						'wrapper'			=> array(
							'width'				=> '20',
							'class'				=> '',
							'id'				=> '',
						),
						'choices'			=> array(
							''					=> esc_attr__('No Slider', 'xclean'),
							'revolution-slider' => esc_attr__('Revolution Slider', 'xclean'),
							'custom-code'		=> esc_attr__('Custom Code for Slider', 'xclean'),
						),
						'allow_null'		=> 0,
						'other_choice'		=> 0,
						'default_value'		=> '',
						'layout'			=> 'vertical',
						'return_format'		=> 'value',
						'save_other_choice' => 0,
					),
				),
				array($rev_slider_option_array),
				array(
					array(
						'key'				=> 'pbmit-custom-slider-code',
						'label'				=> esc_attr__('Custom Slider Code', 'xclean'),
						'name'				=> 'pbmit-custom-slider-code',
						'type'				=> 'textarea',
						'instructions'		=> '',
						'required'			=> 0,
						'conditional_logic'	=> array(
							array(
								array(
									'field'		=> 'pbmit-slider-type',
									'operator'	=> '==',
									'value'		=> 'custom-code',
								),
							),
						),
						'wrapper'			=> array(
							'width'				=> '60',
							'class'				=> '',
							'id'				=> '',
						),
						'default_value'		=> '',
						'placeholder'		=> '',
						'maxlength'			=> '',
						'rows'				=> '',
						'new_lines'			=> '',
					),
				),
				array(
					array(
						'key'				=> 'pbmit-slider-curved-style',
						'label'				=> esc_attr__('Add Curved style at slider bottom', 'xclean'),
						'name'				=> 'pbmit-slider-curved-style',
						'type'				=> 'true_false',
						'instructions'		=> esc_attr__('Select YES to to show curved effect at slider bottom.', 'xclean'),
						'required'			=> 0,
						'conditional_logic'	=> array(
							array(
								array(
									'field'		=> 'pbmit-slider-type',
									'operator'	=> '!=',
									'value'		=> '',
								),
							),
						),
						'wrapper'			=> array(
							'width'				=> '20',
							'class'				=> '',
							'id'				=> '',
						),
						'default_value'		=> 0,
						'ui'				=> 1,
						'ui_on_text'		=> '',
						'ui_off_text'		=> '',
					),
				),
				array(
					array(
						'key'				=> 'pbmit-slider-below-content',
						'label'				=> esc_attr__('Content below slider', 'xclean'),
						'name'				=> 'pbmit-slider-below-content',
						'type'				=> 'textarea',
						'instructions'		=> esc_attr__('This content will appear below slider. HTML allowed.', 'xclean'),
						'required'			=> 0,
						'conditional_logic'	=> array(
							array(
								array(
									'field'		=> 'pbmit-slider-type',
									'operator'	=> '!=',
									'value'		=> '',
								),
							),
						),
						'wrapper'			=> array(
							'width'				=> '100',
							'class'				=> '',
							'id'				=> '',
						),
						'default_value'		=> '',
						'placeholder'		=> '',
						'maxlength'			=> '',
						'rows'				=> '',
						'new_lines'			=> '',
					),
				),
				// TAB - Titlebar Options
				array(
					array(
						'key'				=> 'pbmit-tab-titlebar-options',
						'label'				=> esc_attr__('Titlebar Options', 'xclean'),
						'name'				=> 'pbmit-tab-titlebar-options',
						'type'				=> 'tab',
						'instructions'		=> '',
						'required'			=> 0,
						'conditional_logic'	=> 0,
						'wrapper'			=> array(
							'width'				=> '',
							'class'				=> '',
							'id'				=> '',
						),
						'placement'			=> 'top',
						'endpoint'			=> 0,
					),
					array(
						'key'				=> 'pbmit-titlebar-hide',
						'label'				=> esc_attr__('Hide Titlebar?', 'xclean'),
						'name'				=> 'pbmit-titlebar-hide',
						'type'				=> 'true_false',
						'instructions'		=> esc_attr__('Select YES to hide Titlebar.', 'xclean'),
						'required'			=> 0,
						'conditional_logic'	=> 0,
						'wrapper'			=> array(
							'width'				=> '20',
							'class'				=> '',
							'id'				=> '',
						),
						'default_value'		=> 0,
						'ui'				=> 1,
						'ui_on_text'		=> '',
						'ui_off_text'		=> '',
					),
					array(
						'key'				=> 'pbmit-titlebar-title',
						'label'				=> esc_attr__('Custom title to show in Titlebar', 'xclean'),
						'name'				=> 'pbmit-titlebar-title',
						'type'				=> 'text',
						'instructions'		=> esc_attr__('(Optional) This text will be available as Title in Titlebar. Leave blank for default title', 'xclean'),
						'required'			=> 0,
						'conditional_logic'	=> array(
							array(
								array(
									'field'		=> 'pbmit-titlebar-hide',
									'operator'	=> '!=',
									'value'		=> '1',
								),
							),
						),
						'wrapper'			=> array(
							'width'				=> '40',
							'class'				=> '',
							'id'				=> '',
						),
						'default_value'		=> '',
						'maxlength'			=> '',
					),
					array(
						'key'				=> 'pbmit-titlebar-subtitle',
						'label'				=> esc_attr__('Custom Sub-title to show in Titlebar', 'xclean'),
						'name'				=> 'pbmit-titlebar-subtitle',
						'type'				=> 'text',
						'instructions'		=> esc_attr__('(Optional) This text will be available as Sub-title in Titlebar. Leave blank for default title', 'xclean'),
						'required'			=> 0,
						'conditional_logic'	=> array(
							array(
								array(
									'field'		=> 'pbmit-titlebar-hide',
									'operator'	=> '!=',
									'value'		=> '1',
								),
							),
						),
						'wrapper'			=> array(
							'width'				=> '40',
							'class'				=> '',
							'id'				=> '',
						),
						'default_value'		=> '',
						'maxlength'			=> '',
					),
					array(
						'key'				=> 'pbmit-titlebar-bg-img',
						'label'				=> esc_attr__('Titlebar BG image', 'xclean'),
						'name'				=> 'pbmit-titlebar-bg-img',
						'type'				=> 'image',
						'instructions'		=> esc_attr__('(Optional) Set titlebar background image for this page/post only.', 'xclean'),
						'required'			=> 0,
						'conditional_logic'	=> array(
							array(
								array(
									'field'		=> 'pbmit-titlebar-hide',
									'operator'	=> '!=',
									'value'		=> '1',
								),
							),
						),
						'wrapper'			=> array(
							'width'				=> '33',
							'class'				=> '',
							'id'				=> '',
						),
						'return_format'		=> 'url',
						'preview_size'		=> 'thumbnail',
						'library'			=> 'all',
						'min_width'			=> '',
						'min_height'		=> '',
						'min_size'			=> '',
						'max_width'			=> '',
						'max_height'		=> '',
						'max_size'			=> '',
						'mime_types'		=> '',
					),
					array(
						'key'				=> 'pbmit-titlebar-bg-color',
						'label'				=> esc_attr__('Titlebar BG Color', 'xclean'),
						'name'				=> 'pbmit-titlebar-bg-color',
						'type'				=> 'color_picker',
						'instructions'		=> esc_attr__('(Optional) Set background color for Titlebar.', 'xclean'),
						'required'			=> 0,
						'conditional_logic'	=> 0,
						'conditional_logic'	=> array(
							array(
								array(
									'field'		=> 'pbmit-titlebar-hide',
									'operator'	=> '!=',
									'value'		=> '1',
								),
							),
						),
						'wrapper'			=> array(
							'width'				=> '33',
							'class'				=> '',
							'id'				=> '',
						),
						'default_value'		=> '',
					),
					array(
						'key'				=> 'pbmit-titlebar-bg-color-opacity',
						'label'				=> esc_attr__('Titlebar BG Color Opacity', 'xclean'),
						'name'				=> 'pbmit-titlebar-bg-color-opacity',
						'type'				=> 'range',
						'instructions'		=> esc_attr__('(Optional) Set opacity for background color set for Titlebar.', 'xclean'),
						'required'			=> 0,
						'conditional_logic'	=> 0,
						'conditional_logic'	=> array(
							array(
								array(
									'field'		=> 'pbmit-titlebar-hide',
									'operator'	=> '!=',
									'value'		=> '1',
								),
							),
						),
						'wrapper'			=> array(
							'width'				=> '33',
							'class'				=> '',
							'id'				=> '',
						),
						'default_value'		=> '0.5',
						'min'				=> 0,
						'max'				=> 1,
						'step'				=> '0.01',
						'prepend'			=> '',
						'append'			=> '',
					),
				),
				// TAB - Background Options
				array(
					array(
						'key'				=> 'pbmit-tab-background-options',
						'label'				=> esc_attr__('Background Options', 'xclean'),
						'name'				=> 'pbmit-tab-background-options',
						'type'				=> 'tab',
						'instructions'		=> '',
						'required'			=> 0,
						'conditional_logic'	=> 0,
						'wrapper'			=> array(
							'width'				=> '',
							'class'				=> '',
							'id'				=> '',
						),
						'placement'			=> 'top',
						'endpoint'			=> 0,
					),
					array(
						'key'				=> 'pbmit-bg-img',
						'label'				=> esc_attr__('BG image', 'xclean'),
						'name'				=> 'pbmit-bg-img',
						'type'				=> 'image',
						'instructions'		=> esc_attr__('(Optional) Set background image for this page/post only.', 'xclean'),
						'required'			=> 0,
						'wrapper'			=> array(
							'width'				=> '33',
							'class'				=> '',
							'id'				=> '',
						),
						'return_format'		=> 'url',
						'preview_size'		=> 'thumbnail',
						'library'			=> 'all',
						'min_width'			=> '',
						'min_height'		=> '',
						'min_size'			=> '',
						'max_width'			=> '',
						'max_height'		=> '',
						'max_size'			=> '',
						'mime_types'		=> '',
					),
					array(
						'key'				=> 'pbmit-bg-color',
						'label'				=> esc_attr__('BG Color', 'xclean'),
						'name'				=> 'pbmit-bg-color',
						'type'				=> 'color_picker',
						'instructions'		=> esc_attr__('(Optional) Set background color.', 'xclean'),
						'required'			=> 0,
						'conditional_logic'	=> 0,
						'wrapper'			=> array(
							'width'				=> '33',
							'class'				=> '',
							'id'				=> '',
						),
						'default_value'		=> '',
					),
					array(
						'key'				=> 'pbmit-bg-color-opacity',
						'label'				=> esc_attr__('BG Color Opacity', 'xclean'),
						'name'				=> 'pbmit-bg-color-opacity',
						'type'				=> 'range',
						'instructions'		=> esc_attr__('(Optional) Set opacity for background color.', 'xclean'),
						'required'			=> 0,
						'conditional_logic'	=> 0,
						'wrapper'			=> array(
							'width'				=> '33',
							'class'				=> '',
							'id'				=> '',
						),
						'default_value'		=> '0.5',
						'min'				=> 0,
						'max'				=> 1,
						'step'				=> '0.01',
						'prepend'			=> '',
						'append'			=> '',
					),
				),
				// Footer Hide Options
				array(
					array(
						'key'				=> 'pbmit-tab-footer-options',
						'label'				=> esc_attr__('Footer Options', 'xclean'),
						'name'				=> 'pbmit-tab-footer-options',
						'type'				=> 'tab',
						'instructions'		=> '',
						'required'			=> 0,
						'conditional_logic'	=> 0,
						'wrapper'			=> array(
							'width'				=> '',
							'class'				=> '',
							'id'				=> '',
						),
						'placement'			=> 'top',
						'endpoint'			=> 0,
					),
					array(
						'key'				=> 'pbmit-footer-hide',
						'label'				=> esc_attr__('Hide footer?', 'xclean'),
						'name'				=> 'pbmit-footer-hide',
						'type'				=> 'true_false',
						'instructions'		=> esc_attr__('Select YES to hide footer.', 'xclean'),
						'required'			=> 0,
						'conditional_logic'	=> 0,
						'wrapper'			=> array(
							'width'				=> '20',
							'class'				=> '',
							'id'				=> '',
						),
						'default_value'		=> 0,
						'ui'				=> 1,
						'ui_on_text'		=> '',
						'ui_off_text'		=> '',
					),
				)
			),
			'location' => array(
				array(
					array(
						'param'		=> 'post_type',
						'operator'	=> '==',
						'value'		=> 'post',
					),
				),
				array(
					array(
						'param'		=> 'post_type',
						'operator'	=> '==',
						'value'		=> 'page',
					),
				),
				array(
					array(
						'param'		=> 'post_type',
						'operator'	=> '==',
						'value'		=> 'pbmit-team-member',
					),
				),
				array(
					array(
						'param'		=> 'post_type',
						'operator'	=> '==',
						'value'		=> 'pbmit-portfolio',
					),
				),
				array(
					array(
						'param'		=> 'post_type',
						'operator'	=> '==',
						'value'		=> 'pbmit-service',
					),
				),
			),
			'menu_order'		=> 0,
			'position'			=> 'normal',
			'style'				=> 'default',
			'label_placement'	=> 'top',
			'instruction_placement'	=> 'label',
		));
		// Common Metabox - Sidebar
		acf_add_local_field_group(array(
			'key'		=> 'pbmit-sidebar-settings',
			'title'		=> 'Xclean - Sidebar Settings',
			'fields'	=> array(
				array(
					'key'				=> 'pbmit-sidebar',
					'label'				=> esc_attr__('Select Sidebar', 'xclean'),
					'name'				=> 'pbmit-sidebar',
					'type'				=> 'radio',
					'instructions'		=> esc_attr__('Select sidebar for this page/post only', 'xclean'),
					'required'			=> 0,
					'conditional_logic'	=> 0,
					'wrapper'		   => array(
						'width'				=> '',
						'class'				=> 'pbmit-radio-image-selector',
						'id'				=> '',
					),
					'choices'		  => array(
						'global'			=> pbmit_esc_kses('<img src="' . get_template_directory_uri() . '/includes/images/sidebar-global.png" />'),
						'left'				=> pbmit_esc_kses('<img src="' . get_template_directory_uri() . '/includes/images/sidebar-left.png" />'),
						'right'				=> pbmit_esc_kses('<img src="' . get_template_directory_uri() . '/includes/images/sidebar-right.png" />'),
						'no'				=> pbmit_esc_kses('<img src="' . get_template_directory_uri() . '/includes/images/sidebar-no.png" />'),
					),
					'allow_null'		=> 0,
					'other_choice'		=> 0,
					'default_value'		=> '',
					'layout'			=> 'horizontal',
					'return_format'		=> 'value',
					'save_other_choice' => 0,
				),
			),
			'location' => array(
				array(
					array(
						'param'		=> 'post_type',
						'operator'	=> '==',
						'value'		=> 'post',
					),
				),
				array(
					array(
						'param'		=> 'post_type',
						'operator'	=> '==',
						'value'		=> 'page',
					),
				),
				array(
					array(
						'param'		=> 'post_type',
						'operator'	=> '==',
						'value'		=> 'pbmit-team-member',
					),
				),
				array(
					array(
						'param'		=> 'post_type',
						'operator'	=> '==',
						'value'		=> 'pbmit-portfolio',
					),
				),
				array(
					array(
						'param'		=> 'post_type',
						'operator'	=> '==',
						'value'		=> 'pbmit-service',
					),
				),
			),
			'menu_order'		=> 0,
			'position'			=> 'side',
			'style'				=> 'default',
			'label_placement'	=> 'top',
			'instruction_placement' => 'label',
			'hide_on_screen'	=> '',
			'active'			=> 1,
			'description'		=> '',
		));
	};
}
}
add_action( 'init', 'pbmit_set_metabox', 21 );
/**
 *  Team Member Meta Box
 */
if( !function_exists('pbmit_set_team_metabox') ){
function pbmit_set_team_metabox(){
	// Social share options list
	$social_options_array = array();
	$social_list = pbmit_social_links_list();
	foreach( $social_list as $social ){
		$social_options_array[] = array(
			'key'			=> esc_attr( $social['id'] ),
			'label'			=> esc_attr( $social['label'] ),
			'name'			=> esc_attr( $social['id'] ),
			'type'			=> 'text',
			'instructions'	=> '',
			'required'		=> 0,
			'conditional_logic'	=> 0,
			'wrapper'		=> array(
				'width'			=> '',
				'class'			=> '',
				'id'			=> '',
			),
			'default_value'	=> '',
			'placeholder'	=> '',
			'prepend'		=> '',
			'append'		=> '',
			'maxlength'		=> '',
		);
	}
	if( function_exists('acf_add_local_field_group') ){
		acf_add_local_field_group(array(
			'key'				=> 'pbmit-tab-team-details',
			'title'				=> esc_attr__('Xclean - Member\'s Details', 'xclean'),
			'fields'			=> array(
				array(
					'key'				=> 'pbmit-tab-team-details',
					'label'				=> esc_attr__('General Details', 'xclean'),
					'name'				=> 'pbmit-tab-team-details',
					'type'				=> 'tab',
					'instructions'		=> '',
					'required'			=> 0,
					'conditional_logic' => 0,
					'wrapper'			=> array(
						'width'				=> '',
						'class'				=> '',
						'id'				=> '',
					),
					'placement'			=> 'top',
					'endpoint'			=> 0,
				),
				array(
					'key'				=> 'pbmit-team-details',
					'label'				=> esc_attr__('Team Member\'s details', 'xclean'),
					'name'				=> 'pbmit-team-details',
					'type'				=> 'group',
					'instructions'		=> esc_attr__('Team Member details', 'xclean'),
					'required'			=> 0,
					'conditional_logic' => 0,
					'wrapper'			=> array(
						'width'				=> '',
						'class'				=> '',
						'id'				=> '',
					),
					'layout'			=> 'row',
					'sub_fields' => array(
						array(
							'key'				=> 'designation',
							'label'				=> esc_attr__('Designation', 'xclean'),
							'name'				=> 'designation',
							'type'				=> 'text',
							'instructions'		=> '',
							'required'			=> 0,
							'conditional_logic' => 0,
							'wrapper'			=> array(
								'width'				=> '33',
								'class'				=> '',
								'id'				=> '',
							),
							'default_value'		=> '',
							'placeholder'		=> '',
							'prepend' => '',
							'append' => '',
							'maxlength' => '',
						),
						array(
							'key'				=> 'phone',
							'label'				=> esc_attr__('Phone', 'xclean'),
							'name'				=> 'phone',
							'type'				=> 'text',
							'instructions'		=> '',
							'required'			=> 0,
							'conditional_logic' => 0,
							'wrapper'			=> array(
								'width'				=> '33',
								'class'				=> '',
								'id'				=> '',
							),
							'default_value'		=> '',
							'placeholder'		=> '',
							'prepend' => '',
							'append' => '',
							'maxlength' => '',
						),
						array(
							'key'				=> 'email',
							'label'				=> esc_attr__('Email', 'xclean'),
							'name'				=> 'email',
							'type'				=> 'text',
							'instructions'		=> '',
							'required'			=> 0,
							'conditional_logic' => 0,
							'wrapper'			=> array(
								'width'				=> '33',
								'class'				=> '',
								'id'				=> '',
							),
							'default_value'		=> '',
							'placeholder'		=> '',
							'prepend'			=> '',
							'append'			=> '',
							'maxlength'			=> '',
						),
						array(
							'key'				=> 'fax',
							'label'				=> esc_attr__('Experience', 'xclean'),
							'name'				=> 'fax',
							'type'				=> 'text',
							'instructions'		=> '',
							'required'			=> 0,
							'conditional_logic' => 0,
							'wrapper'			=> array(
								'width'				=> '33',
								'class'				=> '',
								'id'				=> '',
							),
							'default_value'		=> '',
							'placeholder'		=> '',
							'prepend'			=> '',
							'append'			=> '',
							'maxlength'			=> '',
						),
						array(
							'key'		=> 'short-description',
							'label'		=> esc_attr__('Short Description', 'xclean'),
							'name'		=> 'short-description',
							'type'		=> 'wysiwyg',
							'instructions' => esc_attr__('This will appear on single view only.', 'xclean'),
						),
					),
				),
				array(
					'key'				=> 'pbmit-tab-social-links',
					'label'				=> esc_attr__('Social Links', 'xclean'),
					'name'				=> 'pbmit-tab-social-links',
					'type'				=> 'tab',
					'instructions'		=> '',
					'required'			=> 0,
					'conditional_logic' => 0,
					'wrapper'			=> array(
						'width'				=> '',
						'class'				=> '',
						'id'				=> '',
					),
					'placement'			=> 'top',
					'endpoint'			=> 0,
				),
				array(
					'key'			=> 'pbmit-social-links',
					'label'			=> esc_attr__('Social Links', 'xclean'),
					'name'			=> 'pbmit-social-links',
					'type'			=> 'group',
					'instructions'	=> esc_attr__('Select Social links for this Team Member', 'xclean'),
					'required'		=> 0,
					'conditional_logic'	=> 0,
					'wrapper'		=> array(
						'width'			=> '',
						'class'			=> '',
						'id'			=> '',
					),
					'layout'		=> 'row',
					'sub_fields'	=> $social_options_array,
				),
			),
			'location' => array(
				array(
					array(
						'param'		=> 'post_type',
						'operator'	=> '==',
						'value'		=> 'pbmit-team-member',
					),
				),
			),
			'menu_order'		=> 0,
			'position'			=> 'normal',
			'style'				=> 'default',
			'label_placement'	=> 'top',
			'instruction_placement' => 'label',
			'hide_on_screen'	=> '',
			'active'			=> 1,
			'description'		=> '',
		));
	};
}
}
add_action( 'init', 'pbmit_set_team_metabox', 22 );
if( !function_exists('pbmit_set_client_metabox') ){
function pbmit_set_client_metabox(){
	if( function_exists('acf_add_local_field_group') ){
	acf_add_local_field_group(array(
		'key'		=> 'pbmit-client-logo',
		'title'		=> esc_attr__('Client Logo Hover', 'xclean'),
		'fields'	=> array(
			array(
				'key'				=> 'pbmit-logo-image-for-hover',
				'label'				=> esc_attr__('Select Logo for Hover effect. This logo will appear on mouse over.', 'xclean'),
				'name'				=> 'pbmit-logo-image-for-hover',
				'type'				=> 'image',
				'required'			=> 0,
				'conditional_logic'	=> 0,
				'return_format'		=> 'id',
				'preview_size'		=> 'thumbnail',
				'library'			=> 'all',
			),
		),
		'location'	=> array(
			array(
				array(
					'param'		=> 'post_type',
					'operator'	=> '==',
					'value'		=> 'pbmit-client',
				),
			),
		),
		'menu_order'		=> 0,
		'position'			=> 'normal',
		'style'				=> 'default',
		'label_placement'	=> 'top',
		'instruction_placement'	=> 'label',
		'hide_on_screen'	=> '',
		'active'			=> 1,
		'description'		=> esc_attr__('Hover image of client logo', 'xclean'),
	));
	}
	if( function_exists('acf_add_local_field_group') ){
		acf_add_local_field_group(array(
			'key'		=> 'pbmit-client-logo-link',
			'title'		=> esc_attr__('Client Logo Link', 'xclean'),
			'fields'	=> array(
				array(
					'key'				=> 'pbmit-logo-link',
					'label'				=> esc_attr__('Set Link for the logo', 'xclean'),
					'name'				=> 'pbmit-logo-link',
					'type'				=> 'link',
					'return_format'		=> 'url',
				),
			),
			'location'	=> array(
				array(
					array(
						'param'		=> 'post_type',
						'operator'	=> '==',
						'value'		=> 'pbmit-client',
					),
				),
			),
			'menu_order'		=> 0,
			'position'			=> 'side',
			'style'				=> 'default',
			'label_placement'	=> 'top',
			'instruction_placement'	=> 'label',
			'hide_on_screen'	=> '',
			'active'			=> 1,
			'description'		=> esc_attr__('Hover image of client logo', 'xclean'),
		));
		}
	}
}
add_action( 'init', 'pbmit_set_client_metabox', 23 );
if( !function_exists('pbmit_post_format_metaboxes') ){
function pbmit_post_format_metaboxes(){
	if( function_exists('acf_add_local_field_group') ){
		// Post Format - Video
		acf_add_local_field_group(array(
			'key'					=> 'pbmit-pformat-video-metabox',
			'title'					=> esc_attr__('Xclean - Post Format Video Options', 'xclean'),
			'fields'				=> array(
				array(
					'key'				=> 'pbmit-pformat-video',
					'label'				=> esc_attr__('Video URL (like Youtube or Vimeo) OR Embed Code', 'xclean'),
					'name'				=> 'pbmit-pformat-video',
					'type'				=> 'textarea',
					'instructions'		=> esc_attr__('Add Youtube or Vimeo URL here. Also you can paste embed code here.', 'xclean'),
					'required'			=> 0,
					'conditional_logic' => 0,
					'wrapper'			=> array(
						'width'				=> '',
						'class'				=> '',
						'id'				=> '',
					),
					'default_value'		=> '',
					'placeholder'		=> '',
					'maxlength'			=> '',
					'rows'				=> '',
					'new_lines'			=> '',
				),
			),
			'location'				=> array(
				array(
					array(
						'param'			=> 'post_format',
						'operator'		=> '==',
						'value'			=> 'video',
					),
				),
			),
			'menu_order'			=> 0,
			'position'				=> 'acf_after_title',
			'style'					=> 'default',
			'label_placement'		=> 'left',
			'instruction_placement'	=> 'label',
			'hide_on_screen'		=> '',
			'active'				=> true,
			'description'			=> '',
		));
		// Post Format - Quote
		acf_add_local_field_group(array(
			'key'					=> 'pbmit-pformat-quote-metabox',
			'title'					=> esc_attr__('Xclean - Post Format Quote Options', 'xclean'),
			'fields'				=> array(
				array(
					'key'				=> 'pbmit-pformat-quote-source-name',
					'label'				=> esc_attr__('Source Name', 'xclean'),
					'name'				=> 'pbmit-pformat-quote-source-name',
					'type'				=> 'text',
					'instructions'		=> esc_attr__('Add source name of the quote.', 'xclean'),
					'required'			=> 0,
					'conditional_logic' => 0,
					'wrapper'			=> array(
						'width'				=> '',
						'class'				=> '',
						'id'				=> '',
					),
					'default_value'		=> '',
					'placeholder'		=> '',
					'maxlength'			=> '',
					'rows'				=> '',
					'new_lines'			=> '',
				),
				array(
					'key'				=> 'pbmit-pformat-quote-source-url',
					'label'				=> esc_attr__('Source URL', 'xclean'),
					'name'				=> 'pbmit-pformat-quote-source-url',
					'type'				=> 'text',
					'instructions'		=> esc_attr__('Add source link of the quote.', 'xclean'),
					'required'			=> 0,
					'conditional_logic' => 0,
					'wrapper'			=> array(
						'width'				=> '',
						'class'				=> '',
						'id'				=> '',
					),
					'default_value'		=> '',
					'placeholder'		=> '',
					'maxlength'			=> '',
					'rows'				=> '',
					'new_lines'			=> '',
				),
			),
			'location'				=> array(
				array(
					array(
						'param'			=> 'post_format',
						'operator'		=> '==',
						'value'			=> 'quote',
					),
				),
			),
			'menu_order'			=> 0,
			'position'				=> 'acf_after_title',
			'style'					=> 'default',
			'label_placement'		=> 'left',
			'instruction_placement'	=> 'label',
			'hide_on_screen'		=> '',
			'active'				=> true,
			'description'			=> '',
		));
		// Post Format - Link
		acf_add_local_field_group(array(
			'key'					=> 'pbmit-pformat-link-metabox',
			'title'					=> esc_attr__('Xclean - Post Format Link Options', 'xclean'),
			'fields'				=> array(
				array(
					'key'				=> 'pbmit-pformat-link-title',
					'label'				=> esc_attr__('Link Title', 'xclean'),
					'name'				=> 'pbmit-pformat-link-title',
					'type'				=> 'text',
					'instructions'		=> esc_attr__('Add link title.', 'xclean'),
					'required'			=> 0,
					'conditional_logic' => 0,
					'wrapper'			=> array(
						'width'				=> '',
						'class'				=> '',
						'id'				=> '',
					),
					'default_value'		=> '',
					'placeholder'		=> '',
					'maxlength'			=> '',
					'rows'				=> '',
					'new_lines'			=> '',
				),
				array(
					'key'				=> 'pbmit-pformat-link-url',
					'label'				=> esc_attr__('Link URL', 'xclean'),
					'name'				=> 'pbmit-pformat-link-url',
					'type'				=> 'text',
					'instructions'		=> esc_attr__('Add link URL.', 'xclean'),
					'required'			=> 0,
					'conditional_logic' => 0,
					'wrapper'			=> array(
						'width'				=> '',
						'class'				=> '',
						'id'				=> '',
					),
					'default_value'		=> '',
					'placeholder'		=> '',
					'maxlength'			=> '',
					'rows'				=> '',
					'new_lines'			=> '',
				),
			),
			'location'				=> array(
				array(
					array(
						'param'			=> 'post_format',
						'operator'		=> '==',
						'value'			=> 'link',
					),
				),
			),
			'menu_order'			=> 0,
			'position'				=> 'acf_after_title',
			'style'					=> 'default',
			'label_placement'		=> 'left',
			'instruction_placement'	=> 'label',
			'hide_on_screen'		=> '',
			'active'				=> true,
			'description'			=> '',
		));
		// Post Format - Gallery
		if( class_exists('acf_plugin_photo_gallery') ){
			acf_add_local_field_group(array(
				'key'					=> 'pbmit-pformat-gallery-metabox',
				'title'					=> esc_attr__('Image Gallery', 'xclean'),
				'fields'				=> array(
					array(
						'key'				=> 'pbmit-pformat-gallery',
						'label'				=> esc_attr__('Image Gallery', 'xclean'),
						'name'				=> 'pbmit-pformat-gallery',
						'type'				=> 'photo_gallery',
						'instructions'		=> esc_attr__('Select image for slider', 'xclean'),
						'required'			=> 0,
						'conditional_logic'	=> 0,
					),
				),
				'location'				=> array(
					array(
						array(
							'param'			=> 'post_format',
							'operator'		=> '==',
							'value'			=> 'gallery',
						),
					),
				),
				'position'				=> 'acf_after_title',
				'label_placement'		=> 'left',
				'instruction_placement' => 'label',
				'hide_on_screen'		=> '',
				'description'			=> esc_attr__('Description', 'xclean'),
			));
		}
		// Post Format - Audio
		acf_add_local_field_group(array(
			'key'					=> 'pbmit-pformat-audio-metabox',
			'title'					=> esc_attr__('Xclean - Post Format Audio Options', 'xclean'),
			'fields'				=> array(
				array(
					'key'				=> 'pbmit-pformat-audio',
					'label'				=> esc_attr__('Audio URL (like SoundCloud) OR Embed Code', 'xclean'),
					'name'				=> 'pbmit-pformat-audio',
					'type'				=> 'textarea',
					'instructions'		=> esc_attr__('Add Youtube or Vimeo URL here. Also you can paste embed code here.', 'xclean'),
					'required'			=> 0,
					'conditional_logic' => 0,
					'wrapper'			=> array(
						'width'				=> '',
						'class'				=> '',
						'id'				=> '',
					),
					'default_value'		=> '',
					'placeholder'		=> '',
					'maxlength'			=> '',
					'rows'				=> '',
					'new_lines'			=> '',
				),
			),
			'location'				=> array(
				array(
					array(
						'param'			=> 'post_format',
						'operator'		=> '==',
						'value'			=> 'audio',
					),
				),
			),
			'menu_order'			=> 0,
			'position'				=> 'acf_after_title',
			'style'					=> 'default',
			'label_placement'		=> 'left',
			'instruction_placement'	=> 'label',
			'hide_on_screen'		=> '',
			'active'				=> true,
			'description'			=> '',
		));
	};
}
}
add_action( 'init', 'pbmit_post_format_metaboxes', 24 );
if( !function_exists('pbmit_portfolio_featured_metabox') ){
function pbmit_portfolio_featured_metabox(){
	if( function_exists('acf_add_local_field_group') ):
	acf_add_local_field_group(array(
		'key'		=> 'pbmit-featured-data-type',
		'title'		=> esc_attr__('Xclean - Featured Data Type', 'xclean'),
		'fields'	=> array(
			array(
				'key'			=> 'pbmit-featured-type',
				'label'			=> esc_attr__('Featured Data Type', 'xclean'),
				'name'			=> 'pbmit-featured-type',
				'type'			=> 'radio',
				'instructions'	=> esc_attr__('Select type of featured content', 'xclean'),
				'required'		=> 0,
				'conditional_logic'	=> 0,
				'wrapper'		=> array(
					'width'			=> '25',
					'class'			=> '',
					'id'			=> '',
				),
				'choices'		=> array(
					'featured'		=> esc_attr__('Featured Image (default)', 'xclean'),
					'slider'		=> esc_attr__('Image Slider', 'xclean'),
					'video'			=> esc_attr__('Video', 'xclean'),
					'audio'			=> esc_attr__('Audio', 'xclean'),
				),
				'allow_null'	=> 0,
				'other_choice'	=> 0,
				'default_value'	=> '',
				'layout'		=> 'vertical',
				'return_format'	=> 'value',
				'save_other_choice' => 0,
			),
			array(
				'key'				=> 'pbmit-photo-gallery',
				'label'				=> esc_attr__('Slider Images', 'xclean'),
				'name'				=> 'pbmit-photo-gallery',
				'type'				=> 'photo_gallery',
				'instructions'		=> esc_attr__('Select images for slider', 'xclean'),
				'required'			=> 0,
				'conditional_logic' => array(
					array(
						array(
							'field'		=> 'pbmit-featured-type',
							'operator'	=> '==',
							'value'		=> 'slider',
						),
					),
				),
				'wrapper'			=> array(
					'width'				=> '75',
					'class'				=> '',
					'id'				=> '',
				),
				'fields[slider_images' => array(
					'edit_modal'			=> 'Default',
				),
				'edit_modal' => 'Default',
			),
			array(
				'key'				=> 'pbmit-video-url',
				'label'				=> esc_attr__('Video URL', 'xclean'),
				'name'				=> 'pbmit-video-url',
				'type'				=> 'text',
				'instructions'		=> esc_attr__('Add video URL from YouTube or Vimeo', 'xclean'),
				'required'			=> 0,
				'conditional_logic' => array(
					array(
						array(
							'field'		=> 'pbmit-featured-type',
							'operator'	=> '==',
							'value'		=> 'video',
						),
					),
				),
				'wrapper'			=> array(
					'width'				=> '75',
					'class'				=> '',
					'id'				=> '',
				),
				'default_value'		=> '',
				'placeholder'		=> '',
				'prepend'			=> '',
				'append'			=> '',
				'maxlength'			=> '',
			),
			array(
				'key'				=> 'pbmit-audio-url',
				'label'				=> esc_attr__('Audio URL', 'xclean'),
				'name'				=> 'pbmit-audio-url',
				'type'				=> 'text',
				'instructions'		=> esc_attr__('Add audio URL from SoundCloud or MP3', 'xclean'),
				'required'			=> 0,
				'conditional_logic' => array(
					array(
						array(
							'field'		=> 'pbmit-featured-type',
							'operator'	=> '==',
							'value'		=> 'audio',
						),
					),
				),
				'wrapper'			=> array(
					'width'				=> '75',
					'class'				=> '',
					'id'				=> '',
				),
				'default_value'		=> '',
				'placeholder'		=> '',
				'prepend'			=> '',
				'append'			=> '',
				'maxlength'			=> '',
			),
		),
		'location'			=> array(
			array(
				array(
					'param'		=> 'post_type',
					'operator'	=> '==',
					'value'		=> 'pbmit-portfolio',
				),
			),
		),
		'menu_order'		=> 1,
		'position'			=> 'normal',
		'style'				=> 'default',
		'label_placement'	=> 'top',
		'instruction_placement' => 'label',
		'hide_on_screen'	=> '',
		'active'			=> 1,
		'description'		=> '',
	));
	endif;
}
}
add_action( 'init', 'pbmit_portfolio_featured_metabox', 25 );
if( !function_exists('pbmit_portfolio_details_metabox') ){
function pbmit_portfolio_details_metabox(){
	$line_list = array();
	$portfolio_details = pbmit_get_base_option('portfolio-details');
	if( !empty($portfolio_details) && is_array($portfolio_details) ){
		foreach( $portfolio_details as $line ){
			if( !empty($line['line_title']) ){
				$line_id = trim($line['line_title']);
				$line_id = str_replace( ' ', '_', $line_id );
				$line_id = sanitize_html_class( strtolower( $line_id ) ) ;
				if( $line['line_type']=='text' ){
					$line_list[] = array(
						'key'			=> $line_id,
						'label'			=> sprintf( esc_attr__('%1$s ', 'xclean'), $line['line_title'] ),
						'name'			=> $line_id,
						'type'			=> 'text',
					);
				} else {
					$desc = esc_attr__('(Category with link)','xclean');
					if( $line['line_type']=='category' ){
						$desc = esc_attr__('(Category without link)','xclean');
					}
					$line_list[] = array(
						'type'		=> 'generic',
						'key'		=> $line_id,
						'label'		=> sprintf( esc_attr__('%1$s ', 'xclean'), $line['line_title'] ) . $desc,
						'default'	=> '',
						'choices'	=> array(
							'element'	=> 'input',
							'type'		=> 'text',
							'disabled'	=> 'disabled',
						),
					);
				}
			}
		}
	}
	if( function_exists('acf_add_local_field_group') ){
	acf_add_local_field_group(array(
		'key'		=> 'pbmit-portfolio-details-group',
		'title'		=> esc_attr__('Xclean - Portfolio Details', 'xclean'),
		'fields'	=> array(
			array(
				'key'			=> 'pbmit-portfolio-details',
				'label'			=> esc_attr__('Portfolio Details', 'xclean'),
				'name'			=> 'pbmit-portfolio-details',
				'type'			=> 'group',
				'instructions'	=> esc_attr__('Fill the values for each option that applies. Leave blank to hide it.', 'xclean'),
				'required'		=> 0,
				'conditional_logic'	=> 0,
				'wrapper'		=> array(
					'width'			=> '',
					'class'			=> '',
					'id'			=> '',
				),
				'layout'		=> 'block',
				'sub_fields'	=> $line_list,
			),
		),
		'location'	=> array(
			array(
				array(
					'param'		=> 'post_type',
					'operator'	=> '==',
					'value'		=> 'pbmit-portfolio',
				),
			),
		),
		'menu_order'		=> 2,
		'position'			=> 'normal',
		'style'				=> 'default',
		'label_placement'	=> 'left',
		'instruction_placement' => 'label',
		'hide_on_screen'	=> '',
		'active'			=> 1,
		'description'		=> '',
	));
	};
}
}
add_action( 'init', 'pbmit_portfolio_details_metabox', 26 );
if( !function_exists('pbmit_testimonial_details_metabox') ){
function pbmit_testimonial_details_metabox(){
	if( function_exists('acf_add_local_field_group') ):
	acf_add_local_field_group(array(
		'key'		=> 'pbmit-testimonial-details-box',
		'title'		=> esc_attr__('Xclean - Testimonial Details', 'xclean'),
		'fields'	=> array(
			array(
				'key'			=> 'pbmit-testimonial-details',
				'label'			=> esc_attr__('Details', 'xclean'),
				'name'			=> 'pbmit-testimonial-details',
				'type'			=> 'text',
				'instructions'	=> esc_attr__('(optional) Add details like Company name, designation etc', 'xclean'),
				'required'		=> 0,
				'conditional_logic'	=> 0,
				'wrapper'		=> array(
					'width'			=> '50',
					'class'			=> '',
					'id'			=> '',
				),
				'default_value'	=> '',
				'placeholder'	=> '',
				'prepend'		=> '',
				'append'		=> '',
				'maxlength'		=> '',
			),
			array(
				'key'			=> 'pbmit-star-ratings',
				'label'			=> esc_attr__('Star Ratings', 'xclean'),
				'name'			=> 'pbmit-star-ratings',
				'type'			=> 'select',
				'instructions'	=> esc_attr__('Select star ratings.', 'xclean'),
				'required'		=> 0,
				'conditional_logic' => 0,
				'wrapper'		=> array(
					'width'			=> '50',
					'class'			=> '',
					'id'			=> '',
				),
				'choices'		=> array(
					'no'			=> esc_attr__('No ratings', 'xclean'),
					'1'				=> esc_attr__('1 star', 'xclean'),
					'2'				=> esc_attr__('2 stars', 'xclean'),
					'3'				=> esc_attr__('3 stars', 'xclean'),
					'4'				=> esc_attr__('4 stars', 'xclean'),
					'5'				=> esc_attr__('5 stars', 'xclean'),
				),
				'default_value'	=> 'no',
				'allow_null'	=> 0,
				'multiple'		=> 0,
				'ui'			=> 1,
				'ajax'			=> 0,
				'return_format'	=> 'value',
				'placeholder'	=> '',
			),
		),
		'location'			=> array(
			array(
				array(
					'param'		=> 'post_type',
					'operator'	=> '==',
					'value'		=> 'pbmit-testimonial',
				),
			),
		),
		'menu_order'		=> 0,
		'position'			=> 'normal',
		'style'				=> 'default',
		'label_placement'	=> 'top',
		'instruction_placement' => 'label',
		'hide_on_screen'	=> '',
		'description'		=> '',
	));
	endif;
}
}
add_action( 'init', 'pbmit_testimonial_details_metabox', 27 );
if( !function_exists('pbmit_service_short_desc_metabox') ){
function pbmit_service_short_desc_metabox(){
	if( function_exists('acf_add_local_field_group') ):
		acf_add_local_field_group(array(
			'key'		=> 'pbmit-group-service-short-desc',
			'title'		=> esc_attr__('Xclean - Short Description', 'xclean'),
			'fields'	=> array(
				array(
					'key'		=> 'pbmit-short-description',
					'label'		=> esc_attr__('Short Description', 'xclean'),
					'name'		=> 'pbmit-short-description',
					'type'		=> 'textarea',
					'instructions' => esc_attr__('This will appear on single view', 'xclean'),
				),
			),
			'location' => array(
				array(
					array(
						'param'		=> 'post_type',
						'operator'	=> '==',
						'value'		=> 'pbmit-service',
					),
				),
				array(
					array(
						'param'		=> 'post_type',
						'operator'	=> '==',
						'value'		=> 'pbmit-portfolio',
					),
				),
			),
			'menu_order'		=> 2,
			'position'			=> 'normal',
			'style'				=> 'default',
			'label_placement'	=> 'top',
			'instruction_placement' => 'label',
			'hide_on_screen'	=> '',
			'description'		=> '',
		));
	endif;
}
}
add_action( 'init', 'pbmit_service_short_desc_metabox', 28 );
if( !function_exists('pbmit_single_icon_metabox') ){
function pbmit_single_icon_metabox(){
	if( function_exists('acf_add_local_field_group') ){
		$icon_picker_options = array();
		// Icon library
		$library = array();
		// Custom icon option
		$icon_picker_options[] = array(
			'key'				=> 'pbmit-custom-icon-enabled',
			'label'				=> esc_attr__('Select Custom Icon?', 'xclean'),
			'name'				=> 'pbmit-custom-icon-enabled',
			'type'				=> 'true_false',
			'instructions'		=> '',
			'required'			=> 0,
			'conditional_logic'	=> 0,
			'wrapper'			=> array(
				'width'				=> '',
				'class'				=> '',
				'id'				=> '',
			),
			'message'			=> '',
			'default_value'		=> 0,
			'ui'				=> 1,
			'ui_on_text'		=> '',
			'ui_off_text'		=> '',
		);
		$icon_picker_options[] = array(
			'key'				=> 'pbmit-custom-icon',
			'label'				=> esc_attr__('Select Custom Icon', 'xclean'),
			'name'				=> 'pbmit-custom-icon',
			'type'				=> 'image',
			'instructions'		=> esc_attr__('You can select SVG, JPG, PNG or GIF image here', 'xclean') . ( ( !defined('BODHI_SVGS_PLUGIN_PATH') ) ? pbmit_esc_kses('<br><strong>')  . esc_attr__('NOTE:', 'xclean') . pbmit_esc_kses('</strong>') . ' ' . sprintf( esc_attr__('For SVG selection, make sure you installed and activated the %1$s plugin.', 'xclean'), '<a href="https://wordpress.org/plugins/svg-support/" target="_blank">SVG Support</a>' ) : '' ),
			'required'			=> 0,
			'conditional_logic'	=> array(
				array(
					array(
						'field'		=> 'pbmit-custom-icon-enabled',
						'operator'	=> '==',
						'value'		=> '1',
					),
				),
			),
			'wrapper'			=> array(
				'width'				=> '',
				'class'				=> '',
				'id'				=> '',
			),
			'return_format'		=> 'array',
			'library'			=> 'all',
			'min_size'			=> '',
			'max_size'			=> '',
			'mime_types'		=> 'jpg, jpeg, png, gif, svg',
		);
		$lib_list = pbmit_icon_library_list();
		foreach( $lib_list as $lib_id=>$lib_data ){
			$library[$lib_id] = $lib_data['name'];
		}
		$icon_picker_options[] = array(
			'key'			=> 'pbmit-service-icon-library',
			'label'			=> esc_attr__('Select Icon Library', 'xclean'),
			'name'			=> 'pbmit-service-icon-library',
			'type'			=> 'select',
			'instructions'	=> esc_attr__('Select Icon Library.', 'xclean'),
			'required'		=> 0,
			'conditional_logic'	=> array(
				array(
					array(
						'field'		=> 'pbmit-custom-icon-enabled',
						'operator'	=> '==',
						'value'		=> '0',
					),
				),
			),
			'wrapper'		=> array(
				'width'			=> '33',
				'class'			=> '',
				'id'			=> '',
			),
			'choices'		=> $library,
			'default_value'	=> 'no',
			'allow_null'	=> 0,
			'multiple'		=> 0,
			'ui'			=> 1,
			'ajax'			=> 0,
			'return_format'	=> 'value',
			'placeholder'	=> '',
		);
		foreach( $lib_list as $lib_id=>$lib_data ){
			$icon_picker_options[] = array(
				'key'		=> 'pbmit-service-icon-' . $lib_id ,
				'label'		=> $lib_data['name'],
				'name'		=> 'pbmit-service-icon-' . $lib_id,
				'type'		=> 'pbmit_fonticonpicker',
				'library'	=> $lib_id,
				'instructions' => esc_attr__('Select icon from here', 'xclean'),
				'required'	=> 0,
				'conditional_logic'	=> array(
					array(
						array(
							'field'		=> 'pbmit-service-icon-library',
							'operator'	=> '==',
							'value'		=> $lib_id,
						),
					),
				),
				'wrapper'	=> array(
					'width'		=> '66',
					'class'		=> '',
					'id'		=> '',
				),
			);
		}
		acf_add_local_field_group(array(
			'key'		=> 'pbmit-service-icon',
			'title'		=> esc_attr__('Xclean - Icon for Single', 'xclean'),
			'fields'	=> $icon_picker_options,
			'location' => array(
				array(
					array(
						'param'		=> 'post_type',
						'operator'	=> '==',
						'value'		=> 'pbmit-service',
					),
				),
			),
			'menu_order'		=> 2,
			'position'			=> 'normal',
			'style'				=> 'default',
			'label_placement'	=> 'top',
			'instruction_placement' => 'label',
			'hide_on_screen'	=> '',
			'description'		=> '',
		));
	};
}
}
add_action( 'init', 'pbmit_single_icon_metabox', 28 );
if( !function_exists('pbmit_portfolio_category_icon_metabox') ){
function pbmit_portfolio_category_icon_metabox(){
	if( function_exists('acf_add_local_field_group') ){
		$icon_picker_options = array();
		// Icon library
		$library = array();
		$lib_list = pbmit_icon_library_list();
		foreach( $lib_list as $lib_id=>$lib_data ){
			$library[$lib_id] = $lib_data['name'];
		}
		$icon_picker_options[] = array(
			'key'			=> 'pbmit-category-icon-library',
			'label'			=> esc_attr__('Select Icon Library', 'xclean'),
			'name'			=> 'pbmit-category-icon-library',
			'type'			=> 'select',
			'instructions'	=> esc_attr__('Select Icon Library.', 'xclean'),
			'required'		=> 0,
			'conditional_logic' => 0,
			'wrapper'		=> array(
				'width'			=> '33',
				'class'			=> '',
				'id'			=> '',
			),
			'choices'		=> $library,
			'default_value'	=> 'no',
			'allow_null'	=> 0,
			'multiple'		=> 0,
			'ui'			=> 1,
			'ajax'			=> 0,
			'return_format'	=> 'value',
			'placeholder'	=> '',
		);
		foreach( $lib_list as $lib_id=>$lib_data ){
			$icon_picker_options[] = array(
				'key'		=> 'pbmit-category-icon-' . $lib_id ,
				'label'		=> $lib_data['name'],
				'name'		=> 'pbmit-category-icon-' . $lib_id,
				'type'		=> 'pbmit_fonticonpicker',
				'library'	=> $lib_id,
				'instructions' => esc_attr__('Select icon from here', 'xclean'),
				'required'	=> 0,
				'conditional_logic'	=> array(
					array(
						array(
							'field'		=> 'pbmit-category-icon-library',
							'operator'	=> '==',
							'value'		=> $lib_id,
						),
					),
				),
				'wrapper'	=> array(
					'width'		=> '66',
					'class'		=> '',
					'id'		=> '',
				),
			);
		}
		acf_add_local_field_group(array(
			'key'		=> 'pbmit-group-single-icon',
			'title'		=> esc_attr__('Xclean - Icon for this Category', 'xclean'),
			'fields'	=> $icon_picker_options,
			'location' => array(
				array(
					array(
						'param'		=> 'taxonomy',
						'operator'	=> '==',
						'value'		=> 'pbmit-portfolio-category',
					),
				),
				array(
					array(
						'param'		=> 'taxonomy',
						'operator'	=> '==',
						'value'		=> 'pbmit-service-category',
					),
				),
				array(
					array(
						'param'		=> 'taxonomy',
						'operator'	=> '==',
						'value'		=> 'pbmit-team-group',
					),
				),
			),
			'menu_order'		=> 2,
			'position'			=> 'normal',
			'style'				=> 'default',
			'label_placement'	=> 'top',
			'instruction_placement' => 'label',
			'hide_on_screen'	=> '',
			'description'		=> '',
		));
	};
}
}
add_action( 'init', 'pbmit_portfolio_category_icon_metabox', 20 );
if( !function_exists('pbmit_portfolio_single_view_metabox') ){
function pbmit_portfolio_single_view_metabox(){
	if( function_exists('acf_add_local_field_group') ):
	// Total Single Portfolio Styles
	$portfolio_single_style_array = array(
		'0' => '<img src="'.get_template_directory_uri() . '/includes/images/portfolio-single-style-global.jpg" />',
		'1'	=> '<img src="'.get_template_directory_uri() . '/includes/images/portfolio-single-style-1.jpg" />',
		'2'	=> '<img src="'.get_template_directory_uri() . '/includes/images/portfolio-single-style-2.jpg" />',
	);
	// Single Title
	$portfolio_cpt_singular_title	= esc_attr__('Portfolio','xclean');
	if( class_exists('Kirki') ){
		// Portfolio
		$portfolio_cpt_singular_title2	= Kirki::get_option( 'portfolio-cpt-singular-title' );
		$portfolio_cpt_singular_title	= ( !empty($portfolio_cpt_singular_title2) ) ? $portfolio_cpt_singular_title2 : $portfolio_cpt_singular_title ;
	}
	acf_add_local_field_group(array(
		'key'		=> 'pbmit-group-portfolio-single-view',
		'title'		=> sprintf( esc_attr__('Xclean - %1$s Single View Option', 'xclean'), $portfolio_cpt_singular_title ),
		'fields'	=> array(
			array(
				'key'		=> 'pbmit-portfolio-single-view',
				'label'		=> sprintf( esc_attr__('%1$s Single View', 'xclean'), $portfolio_cpt_singular_title ),
				'name'		=> 'pbmit-portfolio-single-view',
				'type'		=> 'radio',
				'instructions' => sprintf( esc_attr__('Select %1$s Single View', 'xclean'), $portfolio_cpt_singular_title ),
				'required'			=> 0,
				'choices'			=> $portfolio_single_style_array,
				'wrapper'			=> array(
					'class'				=> 'pbmit-radio-image-selector',
					'id'				=> '',
				),
				'allow_null'		=> 0,
				'other_choice'		=> 0,
				'default_value'		=> '',
				'layout'			=> 'horizontal',
				'return_format'		=> 'value',
				'save_other_choice' => 0,
			),
		),
		'location' => array(
			array(
				array(
					'param'		=> 'post_type',
					'operator'	=> '==',
					'value'		=> 'pbmit-portfolio',
				),
			),
		),
		'menu_order'		=> 3,
		'position'			=> 'normal',
		'style'				=> 'default',
		'label_placement'	=> 'top',
		'instruction_placement' => 'label',
		'hide_on_screen'	=> '',
		'description'		=> '',
	));
	endif;
}
}
add_action( 'init', 'pbmit_portfolio_single_view_metabox', 25 );
if( !function_exists('pbmit_service_single_view_metabox') ){
function pbmit_service_single_view_metabox(){
	if( function_exists('acf_add_local_field_group') ):
	// Total Single Portfolio Styles
	$service_single_style_array = array(
		'0' => '<img src="'.get_template_directory_uri() . '/includes/images/service-single-style-global.jpg" />',
		'1'	=> '<img src="'.get_template_directory_uri() . '/includes/images/service-single-style-1.jpg" />',
		'2'	=> '<img src="'.get_template_directory_uri() . '/includes/images/service-single-style-2.jpg" />',
	);
	// Single Title
	$service_cpt_singular_title	= esc_attr__('Service','xclean');
	if( class_exists('Kirki') ){
		// Portfolio
		$service_cpt_singular_title2	= Kirki::get_option( 'service-cpt-singular-title' );
		$service_cpt_singular_title	= ( !empty($service_cpt_singular_title2) ) ? $service_cpt_singular_title2 : $service_cpt_singular_title ;
	}
	acf_add_local_field_group(array(
		'key'		=> 'pbmit-group-service-single-view',
		'title'		=> sprintf( esc_attr__('Xclean - %1$s Single View Option', 'xclean'), $service_cpt_singular_title ),
		'fields'	=> array(
			array(
				'key'		=> 'pbmit-service-single-view',
				'label'		=> sprintf( esc_attr__('%1$s Single View', 'xclean'), $service_cpt_singular_title ),
				'name'		=> 'pbmit-service-single-view',
				'type'		=> 'radio',
				'instructions' => sprintf( esc_attr__('Select %1$s Single View', 'xclean'), $service_cpt_singular_title ),
				'required'			=> 0,
				'choices'			=> $service_single_style_array,
				'wrapper'			=> array(
					'class'				=> 'pbmit-radio-image-selector',
					'id'				=> '',
				),
				'allow_null'		=> 0,
				'other_choice'		=> 0,
				'default_value'		=> '',
				'layout'			=> 'horizontal',
				'return_format'		=> 'value',
				'save_other_choice' => 0,
			),
		),
		'location' => array(
			array(
				array(
					'param'		=> 'post_type',
					'operator'	=> '==',
					'value'		=> 'pbmit-service',
				),
			),
		),
		'menu_order'		=> 3,
		'position'			=> 'normal',
		'style'				=> 'default',
		'label_placement'	=> 'top',
		'instruction_placement' => 'label',
		'hide_on_screen'	=> '',
		'description'		=> '',
	));
	endif;
}
}
add_action( 'init', 'pbmit_service_single_view_metabox', 25 );