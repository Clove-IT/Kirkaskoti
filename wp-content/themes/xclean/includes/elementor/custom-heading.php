<?php
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)
/**
 * Widget Name: Section Heading 
 */
class PBMIT_Custom_Heading extends Widget_Base{
 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'pbmit_custom_heading';
	}
	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return esc_attr__( 'Xclean Custom Heading Element', 'xclean' );
	}
	// The get_icon() method, is an optional but recommended method, it lets you set the widget icon. you can use any of the eicon or font-awesome icons, simply return the class name as a string.
	public function get_icon() {
		return 'fas fa-heading';
	}
	// The get_categories method, lets you set the category of the widget, return the category name as a string.
	public function get_categories() {
		return [ 'xclean_category' ];
	}
	protected function register_controls() {
		//Content Service box
		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_attr__( 'Content', 'xclean' ),
			]
		);
		$this->add_control(
			'title_animation',
			[
				'label'			=> esc_attr__( 'Heading Animation', 'xclean' ),
				'description'	=> esc_attr__( 'Select Heading Text Animation View style.', 'xclean' ) . ' ' . pbmit_esc_kses('<br><a target="_blank" href="' . esc_url('https://xclean-demo.pbminfotech.com/demo1/element/#heading-animations') . '">' . esc_attr__( 'See all anmiation demo here.', 'xclean' ) . '</a>' ),
				'type'			=> Controls_Manager::SELECT,
				'default'		=> '4',
				'options'		=> [
					'4'				=> esc_attr__( 'No animation', 'xclean' ),
					'1'				=> esc_attr__( 'Animation Style 1', 'xclean' ),
					'2'				=> esc_attr__( 'Animation Style 2', 'xclean' ),
					'3'				=> esc_attr__( 'Animation Style 3', 'xclean' ),
				],
				'separator'		=> 'before',
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
				'default'		=> esc_attr__( 'Welcome to our site', 'xclean' ),
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
			]
		);
		$this->add_responsive_control(
			'text_align',
			[
				'label'			=> esc_attr__( 'Alignment', 'xclean' ),
				'type'			=> Controls_Manager::CHOOSE,
				'options'		=> [
					'left'			=> [
						'title'			=> esc_attr__( 'Left', 'xclean' ),
						'icon'			=> 'fa fa-align-left',
					],
					'center'		=> [
						'title'			=> esc_attr__( 'Center', 'xclean' ),
						'icon'			=> 'fa fa-align-center',
					],
					'right'			=> [
						'title'			=> esc_attr__( 'Right', 'xclean' ),
						'icon'			=> 'fa fa-align-right',
					],
				],
				'prefix_class'	=> 'pbmit-align-',
				'selectors'		=> [
					'{{WRAPPER}} .pbmit-custom-heading'	=> 'text-align: {{VALUE}};',
				],
				'dynamic'		=> [
					'active'		=> true,
				],
			]
		);
		$this->end_controls_section();
		// HTML Tags
		$this->start_controls_section(
			'advanced_section',
			[
				'label'	=> pbmit_esc_kses('<img class="pbmit-tab-small-logo" src="'.get_template_directory_uri() . '/includes/images/pbm-small-logo.png" /> ') . esc_attr__( 'Tag Settings', 'xclean' ),
				'tab'	=> Controls_Manager::TAB_ADVANCED,
			]
		);
		$this->add_control(
			'tag_options',
			[
				'label'			=> esc_attr__( 'Tag for SEO', 'xclean' ),
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
				'default'	=> esc_attr( 'h2' ),
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
					'{{WRAPPER}} .pbmit-element-title'		=> 'color: {{VALUE}};',
					'{{WRAPPER}} .pbmit-element-title > a'	=> 'color: {{VALUE}};',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'		=> 'title_typography',
				'selector'	=> '{{WRAPPER}} .pbmit-element-title',
			]
		);
		$this->end_controls_section();
	}
	protected function render() {
		$settings = $this->get_settings_for_display();
		pbmit_custom_heading($settings, true);
	}
	protected function content_template() {}
}
// After the Schedule class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register( new PBMIT_Custom_Heading() );