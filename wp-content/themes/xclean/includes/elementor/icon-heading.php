<?php
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)
/**
 * Widget Name: Section Heading 
 */
class PBMIT_IconHeading extends Widget_Base{
 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'pbmit_icon_heading';
	}
	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return esc_attr__( 'Xclean Icon Heading Element', 'xclean' );
	}
	// The get_icon() method, is an optional but recommended method, it lets you set the widget icon. you can use any of the eicon or font-awesome icons, simply return the class name as a string.
	public function get_icon() {
		return 'fas fa-star';
	}
	// The get_categories method, lets you set the category of the widget, return the category name as a string.
	public function get_categories() {
		return [ 'xclean_category' ];
	}
	public function __construct($data = [], $args = null) {
		parent::__construct($data, $args);
	}
	protected function register_controls() {
		// Style
		$this->start_controls_section(
			'select_style_section',
			[
				'label' => esc_attr__( 'Select Style', 'xclean' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'style',
			[
				'label'			=> esc_attr__( 'Select Icon Heading View Style', 'xclean' ),
				'description'	=> esc_attr__( 'Select Icon Heading View style.', 'xclean' ),
				'type'			=> 'pbmit_imgselect',
				'label_block'	=> true,
				'thumb_width'	=> '110px',
				'default'		=> '1',
				'prefix'		=> 'pbmit-ihbox pbmit-ihbox-style-',
				'options'		=> pbmit_element_template_list( 'icon-heading', true ),
			]
		);
		$this->end_controls_section();
		//Content Service box
		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_attr__( 'Icon and Heading', 'xclean' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'icon_type',
			[
				'label'		=> esc_attr__( 'Icon Type', 'xclean' ),
				'type'		=> Controls_Manager::SELECT,
				'options'	=> [
					'icon'		=> esc_attr__( 'Icon', 'xclean' ),
					'image'		=> esc_attr__( 'Image', 'xclean' ),
					'text'		=> esc_attr__( 'Text', 'xclean' ),
					'none'		=> esc_attr__( 'None', 'xclean' ),
				],
				'default'	=> esc_attr( 'icon' ),
				'condition'		=> [
					'style!'		=>  [],
				]
			]
		);
		$this->add_control(
			'icon',
			[
				'label'		=> esc_attr__( 'Icon', 'xclean' ),
				'type'		=> \Elementor\Controls_Manager::ICONS,
				'default'	=> [
					'value'		=> 'pbmit-xclean-icon pbmit-xclean-icon-dusting',
					'library'	=> 'pbmit-xclean-icon',
				],
				'condition'	=> [
					'icon_type'	=> 'icon',
					'style!'	=>	[],
				]
			]
		);
		$this->add_control(
			'icon_image',
			[
				'label'			=> esc_attr__( 'Select Image for Icon', 'xclean' ),
				'description'	=> esc_attr__( 'This image will appear at icon position. Recommended size is 300x300 px transparent PNG file.', 'xclean' ),
				'type'			=> \Elementor\Controls_Manager::MEDIA,
				'default'		=> [
					'url'			=> get_template_directory_uri() . '/images/icon-img.png',
				],
				'condition'		=> [
					'icon_type'		=> 'image',
				]
			]
		);
		$this->add_control(
			'icon_image2',
			[
				'label'			=> esc_attr__( 'Select Image for Icon', 'xclean' ),
				'description' 	=> esc_attr__( 'This image will appear at icon position. Recommended size is 300x300 px transparent PNG file.', 'xclean' ),
				'type'			=> \Elementor\Controls_Manager::MEDIA,
				'default' 		=> [
					'url' 			=> get_template_directory_uri() . '/images/icon-img.png',
				],
				'condition'		=> [
					'style'			=>	['16'],
				],
			]
		);
		$this->add_control(
			'icon_text',
			[
				'label'			=> esc_attr__( 'Text for Icon', 'xclean' ),
				'description'	=> esc_attr__( 'The text will appear at icon position. This should be small text like "01" or "PX"', 'xclean' ),
				'type'			=> Controls_Manager::TEXT,
				'dynamic'		=> [
					'active'		=> true,
				],
				'default'		=> esc_attr__( '01', 'xclean' ),
				'placeholder'	=> esc_attr__( 'Enter text here', 'xclean' ),
				'label_block'	=> true,
				'condition'		=> [
					'icon_type'		=> 'text',
				]
			]
		);
		$this->add_control(
			'box_number',
			[
				'label'			=> esc_attr__( 'Box Number', 'xclean' ),
				'description'	=> esc_attr__( '(Optional) Add box number like "01". This will be shown as steps.', 'xclean' ),
				'type'			=> Controls_Manager::TEXT,
				'dynamic'		=> [
					'active'		=> true,
				],
				'default'		=> '',
				'placeholder'	=> esc_attr__( 'Enter number', 'xclean' ),
				'label_block'	=> true,
				'condition'		=> [
					'style'			=> ['6','12','14'],
				]
			]
		);
		$this->add_control(
			'title',
			[
				'label'			=> esc_attr__( 'Heading', 'xclean' ),
				'type'			=> Controls_Manager::TEXTAREA,
				'dynamic'		=> [
					'active'		=> true,
				],
				'default'		=> esc_attr__( 'Experienced Staff', 'xclean' ),
				'placeholder'	=> esc_attr__( 'Enter your heading', 'xclean' ),
				'label_block'	=> true,
			]
		);
		$this->add_control(
			'title_link',
			[
				'label'			=> esc_attr__( 'Heading Link', 'xclean' ),
				'type'			=> Controls_Manager::URL,
				'label_block'	=> true,
				'condition'		=> [
					'style'			=> ['4','7','15'],
				]
			]
		);
		$this->add_control(
			'subtitle',
			[
				'label'			=> esc_attr__( 'Subheading', 'xclean' ),
				'type'			=> Controls_Manager::TEXTAREA,
				'dynamic'		=> [
					'active'		=> true,
				],
				'placeholder'	=> esc_attr__( 'Enter your subtitle', 'xclean' ),
				'label_block'	=> true,
				'condition'		=> [
					'style'			=> ['4','5','8','12','16'],
				]
			]
		);
		$this->add_control(
			'subtitle_link',
			[
				'label'			=> esc_attr__( 'Subheading Link', 'xclean' ),
				'type'			=> Controls_Manager::URL,
				'label_block'	=> true,
				'condition'		=> [
					'style'			=> [],
				]
			]
		);
		$this->add_control(
			'desc',
			[
				'label'			=> esc_attr__( 'Description', 'xclean' ),
				'type'			=> Controls_Manager::TEXTAREA,
				'dynamic'		=> [
					'active'		=> true,
				],
				'placeholder'	=> esc_attr__( 'Type your description here', 'xclean' ),
				'default'		=> esc_attr__( 'Office Services Sweeping Mopping Kitchen Cleaning, Cleaning Emergency Clean up want this.', 'xclean' ),
				'condition'		=>	[
					'style!'		=>	['3','4','5','7','13','15','16'],
				],
			]
		);
		// Button
		$this->add_control(
			'button_options',
			[
				'label'			=> esc_attr__( 'Button Options', 'xclean' ),
				'type'			=> Controls_Manager::HEADING,
				'separator'		=> 'before',
				'condition'		=> [
					'style'			=> ['5','10','11'],
				],
			]
		);
		$this->add_control(
			'btn_title',
			[
				'label'			=> esc_attr__( 'Button Title', 'xclean' ),
				'type'			=> Controls_Manager::TEXT,
				'dynamic'		=> [
					'active'		=> true,
				],
				'default'		=> esc_attr__( 'Read More', 'xclean' ),
				'placeholder'	=> esc_attr__( 'Enter button title here', 'xclean' ),
				'label_block'	=> true,
				'condition'		=> [
					'style'			=> ['5','10','11','13'],
				],
			]
		);
		$this->add_control(
			'btn_link',
			[
				'label'			=> esc_attr__( 'Button Link', 'xclean' ),
				'type'			=> Controls_Manager::URL,
				'label_block'	=> true,
				'condition'		=> [
					'style'			=> ['5','10','11','13'],
				],
				'default'		=> array (
					'url'				=> '#',
					'is_external'		=> '',
					'nofollow'			=> '',
					'custom_attributes'	=> '',
				),
			]
		);
		$this->end_controls_section();
		//Style
		$this->start_controls_section(
			'advanced_section',
			[
				'label'	=> pbmit_esc_kses('<img class="pbmit-tab-small-logo" src="'.get_template_directory_uri() . '/includes/images/pbm-small-logo.png" /> ') . esc_attr__( 'Tag Settings', 'xclean' ),
				'tab'	=> Controls_Manager::TAB_ADVANCED,
			]
		);
		// HTML Tags
		$this->add_control(
			'tag_options',
			[
				'label'			=> esc_attr__( 'Tags for SEO', 'xclean' ),
				'type'			=> Controls_Manager::HEADING,
				'separator'		=> 'before',
			]
		);
		$this->add_control(
			'title_tag',
			[
				'label'		=> esc_attr__( 'Heading Tag', 'xclean' ),
				'type'		=> Controls_Manager::SELECT,
				'options'	=> [
					'h1'		=> esc_attr( 'H1' ),
					'h2'		=> esc_attr( 'H2' ),
					'h3'		=> esc_attr( 'H3' ),
					'h4'		=> esc_attr( 'H4' ),
					'h5'		=> esc_attr( 'H5' ),
					'h6'		=> esc_attr( 'H6' ),
					'div'		=> esc_attr( 'DIV' ),
				],
				'default' => esc_attr( 'h2' ),
			]
		);
		$this->add_control(
			'subtitle_tag',
			[
				'label'		=> esc_attr__( 'Subheading Tag', 'xclean' ),
				'type'		=> Controls_Manager::SELECT,
				'options'	=> [
					'h1'		=> esc_attr( 'H1' ),
					'h2'		=> esc_attr( 'H2' ),
					'h3'		=> esc_attr( 'H3' ),
					'h4'		=> esc_attr( 'H4' ),
					'h5'		=> esc_attr( 'H5' ),
					'h6'		=> esc_attr( 'H6' ),
					'div'		=> esc_attr( 'DIV' ),
				],
				'default'	=> esc_attr( 'h4' ),
			]
		);
		$this->end_controls_section();
		// Typo
		$this->start_controls_section(
			'style_section',
			[
				'label'	=> pbmit_esc_kses('<img class="pbmit-tab-small-logo" src="'.get_template_directory_uri() . '/includes/images/pbm-small-logo.png" /> ') . esc_attr__( 'Typo Settings', 'xclean' ),
				'tab'	=> Controls_Manager::TAB_ADVANCED,
			]
		);
		//Heading
		$this->add_control(
			'heading_title',
			[
				'label'		=> esc_attr__( 'Heading', 'xclean' ),
				'type'		=> Controls_Manager::HEADING,
				'separator'	=> 'before',
			]
		);
		$this->add_control(
			'title_color',
			[
				'label'		=> esc_attr__( 'Color', 'xclean' ),
				'type'		=> Controls_Manager::COLOR,
				'default'	=> '',
				'selectors'	=> [
					'{{WRAPPER}} .pbmit-element-heading'		=> 'color: {{VALUE}};',
					'{{WRAPPER}} .pbmit-element-heading > a'	=> 'color: {{VALUE}};',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'		=> 'title_typography',
				'selector'	=> '{{WRAPPER}} .pbmit-element-heading',
			]
		);
		$this->add_responsive_control(
			'title_bottom_space',
			[
				'label'		=> esc_attr__( 'Spacing', 'xclean' ),
				'type'		=> Controls_Manager::SLIDER,
				'range'		=> [
					'px'		=> [
						'min'		=> 0,
						'max'		=> 100,
					],
				],
				'selectors'	=> [
					'{{WRAPPER}} .pbmit-element-heading'	=> 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		//Subheading
		$this->add_control(
			'heading_stitle',
			[
				'label'		=> esc_attr__( 'Subheading', 'xclean' ),
				'type'		=> Controls_Manager::HEADING,
				'separator'	=> 'before',
			]
		);
		$this->add_control(
			'stitle_color',
			[
				'label'		=> esc_attr__( 'Color', 'xclean' ),
				'type'		=> Controls_Manager::COLOR,
				'default'	=> '',
				'selectors'	=> [
					'{{WRAPPER}} .pbmit-element-subheading'		=> 'color: {{VALUE}};',
					'{{WRAPPER}} .pbmit-element-subheading > a'	=> 'color: {{VALUE}};',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'		=> 'stitle_typography',
				'selector'	=> '{{WRAPPER}} .pbmit-element-subheading',
			]
		);
		$this->add_responsive_control(
			'stitle_bottom_space',
			[
				'label'		=> esc_attr__( 'Spacing', 'xclean' ),
				'type'		=> Controls_Manager::SLIDER,
				'range'		=> [
					'px'		=> [
						'min'		=> 0,
						'max'		=> 100,
					],
				],
				'selectors'	=> [
					'{{WRAPPER}} .pbmit-element-subheading'	=> 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		// Description
		$this->add_control(
			'heading_desc',
			[
				'label'		=> esc_attr__( 'Description', 'xclean' ),
				'type'		=> Controls_Manager::HEADING,
				'separator'	=> 'before',
			]
		);
		$this->add_control(
			'desc_color',
			[
				'label'		=> esc_attr__( 'Color', 'xclean' ),
				'type'		=> Controls_Manager::COLOR,
				'default'	=> '',
				'selectors'	=> [
					'{{WRAPPER}} .pbmit-heading-desc'	=> 'color: {{VALUE}};',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'		=> 'desc_typography',
				'selector'	=> '{{WRAPPER}} .pbmit-heading-desc',
			]
		);
		$this->add_responsive_control(
			'desc_bottom_space',
			[
				'label'		=> esc_attr__( 'Spacing', 'xclean' ),
				'type'		=> Controls_Manager::SLIDER,
				'range'		=> [
					'px'		=> [
						'min'		=> 0,
						'max'		=> 100,
					],
				],
				'selectors'	=> [
					'{{WRAPPER}} .pbmit-heading-desc'	=> 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();
	}
	protected function render() {
		$settings = $this->get_settings_for_display();
		extract($settings);
		$icon_html = $title_html = $subtitle_html = $desc_html = $button_html = $btn_link = $box_number_html = $icon_image2 = '';
		if( !empty($box_number) ){
			$box_number_html = '<div class="pbmit-content-number"><div class="pbmit-wrap-number"><div class="pbmit-ihbox-box-number">'.esc_attr($box_number).'</div></div></div>';
		}
		if( file_exists( locate_template( '/theme-parts/icon-heading/icon-heading-style-'.esc_attr($style).'.php', false, false ) ) ){
			$icon_type_class = '';
			if( !empty($settings['icon_type']) ){
				if( $settings['icon_type']=='icon' ){
				// This is real icon html code
					if($icon['library']=='svg'){
						ob_start();
						Icons_Manager::render_icon( $icon , [ 'aria-hidden' => 'true' ] );
						$icon_html = ob_get_contents();
						ob_end_clean();
						$icon_html	   = '<div class="pbmit-ihbox-svg"><div class="pbmit-ihbox-svg-wrapper">' . $icon_html . '</div></div>';
						$icon_type_class = 'icon';
					} else {
						if(!empty($settings['icon'])){
							ob_start();
							Icons_Manager::render_icon( $icon , [ 'aria-hidden' => 'true' ] );
							$icon_html_code = ob_get_contents();
							ob_end_clean();
							$icon_html	   = '<div class="pbmit-ihbox-icon"><div class="pbmit-ihbox-icon-wrapper pbmit-icon-type-icon">' . pbmit_esc_kses( $icon_html_code ) . '</div></div>';
							$icon_type_class = 'icon';
						}
					}
				} else if( $settings['icon_type']=='text' ){
					$icon_html = '<div class="pbmit-ihbox-icon"><div class="pbmit-ihbox-icon-wrapper pbmit-ihbox-icon-type-text">' . $settings['icon_text'] . '</div></div>';
					$icon_type_class = 'text';
				} else if( $settings['icon_type']=='image' ){
					$icon_alt	= (!empty($settings['title'])) ? trim($settings['title']) : esc_attr__('Icon', 'xclean') ;
					$icon_image = '<img src="'.esc_url($settings['icon_image']['url']).'" alt="'.esc_attr($icon_alt).'" />';
					$icon_html	= '<div class="pbmit-ihbox-icon"><div class="pbmit-ihbox-icon-wrapper pbmit-ihbox-icon-type-image">' . $icon_image . '</div></div>';
					$icon_type_class = 'image';
				} else {
					$icon_html = '';
					$icon_type_class = 'none';
				}
			}
			// Heading			
			if( !empty($settings['title']) ) {
				$title_tag	= ( !empty($settings['title_tag']) ) ? $settings['title_tag'] : 'h2' ;
				$title_html	= '<'. pbmit_esc_kses($title_tag) . ' class="pbmit-element-title">'.pbmit_link_render($settings['title_link'], 'start' ).''.pbmit_esc_kses($settings['title']).''.pbmit_link_render($settings['title_link'], 'end' ).'</'. pbmit_esc_kses($title_tag) . '>';
			}
			// Subheading
			if( !empty($settings['subtitle']) ) {
				$subtitle_tag	= ( !empty($settings['subtitle_tag']) ) ? $settings['subtitle_tag'] : 'h4' ;
				$subtitle_html	= '<'. pbmit_esc_kses($subtitle_tag) . ' class="pbmit-element-subtitle">
					'.pbmit_link_render($settings['subtitle_link'], 'start' ).'
						'.pbmit_esc_kses($settings['subtitle']).'
					'.pbmit_link_render($settings['subtitle_link'], 'end' ).'
					</'. pbmit_esc_kses($subtitle_tag) . '>
				';
			}
			// Description text
			if( !empty($settings['desc']) ){
				$desc_html = '<div class="pbmit-heading-desc">'.pbmit_esc_kses($settings['desc']).'</div>';
			}
			if( !empty($settings['btn_link']['url']) ){
				$btn_link = $settings['btn_link']['url'];
			}
			// image for style16
			if( !empty($settings['icon_image2']['url']) ){
				$icon_alt	= (!empty($settings['title'])) ? trim($settings['title']) : esc_attr__('image', 'xclean') ;
				$image_html2 = '<img src="'.esc_url($settings['icon_image2']['url']).'" alt="'.esc_attr($icon_alt).'" />';
				$image_html	= '<div class="pbmit-ihbox-wrapper"><div class="pbmit-ihbox-icon-type-image">' . $image_html2 . '</div></div>';
			}
			// Button
			if( !empty($settings['btn_title']) && !empty($settings['btn_link']['url']) ){
				$button_html = '<div class="pbmit-ihbox-btn">' . pbmit_link_render($settings['btn_link'], 'start' ) . pbmit_esc_kses($settings['btn_title']) . pbmit_link_render($settings['btn_link'], 'end' ) . '</div>';
			}
			echo '<div class="pbmit-ihbox pbmit-ihbox-style-'.esc_attr($style).'">';
				include( locate_template( '/theme-parts/icon-heading/icon-heading-style-'.esc_attr($style).'.php', false, false ) );
			echo '</div>';
		}
	}
	protected function content_template() {}
}
// After the Schedule class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register( new PBMIT_IconHeading() );