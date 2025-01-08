<?php
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)
/**
 * Widget Name: Projects Carousel
 */
class PBMIT_ClientElement extends Widget_Base{
 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'pbmit_client_element';
	}
	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return esc_attr__( 'Xclean Client Logo Element', 'xclean' );
	}
	// The get_icon() method, is an optional but recommended method, it lets you set the widget icon. you can use any of the eicon or font-awesome icons, simply return the class name as a string.
	public function get_icon() {
		return 'fas fa-th';
	}
	// The get_categories method, lets you set the category of the widget, return the category name as a string.
	public function get_categories() {
		return [ 'xclean_category' ];
	}
	public function __construct($data = [], $args = null) {
		parent::__construct($data, $args);
		if( !empty($data['settings']["view-type"]) && $data['settings']["view-type"]=='carousel' ){
			wp_enqueue_script( 'swiper' );
			wp_enqueue_style( 'swiper' );
		}
		if( !empty($data['settings']["sortable"]) && $data['settings']["sortable"]=='yes' ){
			wp_enqueue_script( 'isotope' );
		}
		if( !empty($data['settings']["view-type"]) && $data['settings']["view-type"]=='masonry' ){		
			wp_enqueue_script( 'masonry' );
			wp_enqueue_script( 'isotope' );
		}
		if( ( !empty($data['settings']["view-type"]) && $data['settings']["view-type"]=='masonry' ) &&
		( !empty($data['settings']["infinite-scroll"]) && $data['settings']["infinite-scroll"]=='yes' )
		){
			wp_enqueue_script( 'infinite-scroll' );
		}
	}
	protected function register_controls() {
		// Client
		$client_cpt_singular_title	= esc_attr__('Client','xclean');
		$client_cpt_singular_title2	= get_theme_mod( 'client-cpt-singular-title' );
		$client_cpt_singular_title	= ( !empty($client_cpt_singular_title2) ) ? $client_cpt_singular_title2 : $client_cpt_singular_title ;
		// Style
		$this->start_controls_section(
			'style_section',
			[
				'label'	=> sprintf(esc_attr__( '%1$s Logo Style Options', 'xclean' ),$client_cpt_singular_title  ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'style',
			[
				'label'			=> esc_attr__( 'Select Client Logo View Style', 'xclean' ),
				'description'	=> esc_attr__( 'Select Client Logo View Style', 'xclean' ),
				'type'			=> 'pbmit_imgselect',
				'label_block'	=> true,
				'thumb_width'	=> '110px',
				'default'		=> '1',
				'options'		=> pbmit_element_template_list( 'client', true ),
			]
		);
		$this->end_controls_section();
		// Column and Carousel Options
		$this->start_controls_section(
			'row_column_section',
			[
				'label' => esc_attr__( 'Column and Carousel Options', 'xclean' ),
			]
		);
		$this->add_control(
			'view-type',
			[
				'label'			=> esc_attr__( 'How you like to view each Logo box?', 'xclean' ),
				'description'	=> esc_attr__( 'Show as carousel view or simple row-column view.', 'xclean' ),
				'type'			=> 'pbmit_imgselect',
				'label_block'	=> true,
				'thumb_width'	=> '110px',
				'default'		=> 'row-column',
				'options'		=> [
					'row-column'	=> esc_url( get_template_directory_uri() . '/includes/images/row-column.png' ),
					'carousel'		=> esc_url( get_template_directory_uri() . '/includes/images/carousel.png' ),
				],
			]
		);
		// Carousel: Heading
		$this->add_control(
			'carousel_options',
			[
				'label'		=> esc_attr__( 'Carousel Options', 'xclean' ),
				'type'		=> Controls_Manager::HEADING,
				'separator'	=> 'before',
				'condition'	=> [
					'view-type'	=> 'carousel',
				]
			]
		);
		// Carousel : Autoplay
		$this->add_control(
			'carousel-autoplay',
			[
				'label'			=> esc_attr__( 'Carousel: Autoplay', 'xclean' ),
				'description'	=> esc_attr__( 'Autoplay of carousel.', 'xclean' ),
				'type'			=> Controls_Manager::SELECT,
				'default'		=> '1',
				'options'		=> [
					'1'				=> esc_attr__( 'Yes', 'xclean' ),
					'0'				=> esc_attr__( 'No', 'xclean' ),
				],
				'condition'		=> [
					'view-type'		=> 'carousel',
				]
			]
		);
		// Carousel : delay
		$this->add_control(
			'carousel-delay',
			[
				'label'			=> esc_attr__( 'Carousel: delay', 'xclean' ),
				'description'	=> esc_attr__( 'Slide hold time (in ms).', 'xclean' ),
				'type'			=> Controls_Manager::TEXT,
				'default'		=> '4000',
				'condition'		=> [
					'view-type'			=> 'carousel',
					'carousel-autoplay'	=> '1',
				]
			]
		);
		// Carousel : Loop
		$this->add_control(
			'carousel-loop',
			[
				'label'			=> esc_attr__( 'Carousel: Loop', 'xclean' ),
				'description'	=> esc_attr__( 'Infinity loop. Duplicate last and first items to get loop illusion.', 'xclean' ),
				'type'			=> Controls_Manager::SELECT,
				'default'		=> '1',
				'options'		=> [
					'1'				=> esc_attr__( 'Yes', 'xclean' ),
					'0'				=> esc_attr__( 'No', 'xclean' ),
				],
				'condition'		=> [
					'view-type'		=> 'carousel',
				]
			]
		);
		// Carousel : Center
		$this->add_control(
			'carousel-center',
			[
				'label'			=> esc_attr__( 'Carousel: Center', 'xclean' ),
				'description'	=> esc_attr__( 'Center item. Works well with even an odd number of items.', 'xclean' ),
				'type'			=> Controls_Manager::SELECT,
				'default'		=> '0',
				'options'		=> [
					'1'				=> esc_attr__( 'Yes', 'xclean' ),
					'0'				=> esc_attr__( 'No', 'xclean' ),
				],
				'condition'		=> [
					'view-type'		=> 'carousel',
				]
			]
		);
		// Carousel : Nav
		$this->add_control(
			'carousel-nav',
			[
				'label'			=> esc_attr__( 'Carousel: Nav', 'xclean' ),
				'description'	=> esc_attr__( 'Show next/prev buttons.', 'xclean' ),
				'type'			=> Controls_Manager::SELECT,
				'default'		=> '0',
				'options'		=> [
					'1'				=> esc_attr__( 'Yes', 'xclean' ),
					'0'				=> esc_attr__( 'No', 'xclean' ),
					'above'			=> esc_attr__( 'Yes, near heading area', 'xclean' ),
				],
				'condition'		=> [
					'view-type'		=> 'carousel',
				]
			]
		);
		// Carousel : Dots
		$this->add_control(
			'carousel-dots',
			[
				'label'			=> esc_attr__( 'Carousel: Dots', 'xclean' ),
				'description'	=> esc_attr__( 'Show dots navigation.', 'xclean' ),
				'type'			=> Controls_Manager::SELECT,
				'default'		=> '0',
				'options'		=> [
					'1'				=> esc_attr__( 'Yes', 'xclean' ),
					'0'				=> esc_attr__( 'No', 'xclean' ),
				],
				'condition'		=> [
					'view-type'		=> 'carousel',
				]
			]
		);
		// Carousel : Speed
		$this->add_control(
			'carousel-speed',
			[
				'label'			=> esc_attr__( 'Carousel:Speed', 'xclean' ),
				'description'	=> esc_attr__( 'Slider animation time (in ms.)', 'xclean' ),
				'type'			=> Controls_Manager::TEXT,
				'default'		=> '3000',
				'condition'		=> [
					'view-type'		=> 'carousel',
				]
			]
		);
		$this->add_control(
			'infinite-scroll',
			[
				'label'			=> esc_attr__( 'Enable infinite scroll ?', 'xclean' ),
				'description'	=> esc_attr__( 'Select YES to dynamically load more posts', 'xclean' ),
				'type'			=> Controls_Manager::SWITCHER,
				'label_on'		=> esc_attr__( 'Yes', 'xclean' ),
				'label_off'		=> esc_attr__( 'No', 'xclean' ),
				'return_value'	=> 'yes',
				'default'		=> '',
				'condition'		=> [
					'view-type'		=> 'masonry',
					'sortable'		=> '',
				],
			]
		);
		$this->add_control(
			'infinite-scroll-show-loadmore-type',
			[
				'label'		=> esc_attr__( 'Load new boxes', 'xclean' ),
				'type'		=> Controls_Manager::SELECT,
				'options'	=> [
					'auto'		=> esc_attr( 'On page scroll (auto)' ),
					'button'	=> esc_attr( 'On button click' ),
				],
				'condition'	=> [
					'view-type'			=> 'masonry',
					'sortable'			=> '',
					'infinite-scroll'	=> 'yes',
				],
				'default' => esc_attr( 'auto' ),
			]
		);
		$this->add_control(
			'infinite-scroll-loadmore-btn-title',
			[
				'label'			=> esc_attr__( 'Button text', 'xclean' ),
				'description'	=> esc_attr__( 'Button title for the "Load More" button.', 'xclean' ),
				'type'			=> Controls_Manager::TEXTAREA,
				'dynamic'		=> [
					'active'		=> true,
				],
				'condition'		=> [
					'infinite-scroll-show-loadmore-type'	=> 'button',
					'infinite-scroll'						=> 'yes',
					'view-type'								=> 'masonry',
					'sortable'								=> '',
				],
				'default'		=> esc_attr__( 'Load More', 'xclean' ),
				'placeholder'	=> esc_attr__( 'Enter button title', 'xclean' ),
				'label_block'	=> true,
			]
		);
		// Columns
		$this->add_control(
			'view-column-section-heading',
			[
				'label'			=> esc_attr__( 'Column Settings', 'xclean' ),
				'type'			=> Controls_Manager::HEADING,
				'separator'		=> 'before',
			]
		);
		$this->add_control(
			'columns',
			[
				'label'			=> esc_attr__( 'View in Column', 'xclean' ),
				'description'	=> esc_attr__( 'Select how many column to show.', 'xclean' ),
				'type'			=> 'pbmit_imgselect',
				'label_block'	=> true,
				'thumb_width'	=> '110px',
				'default'		=> '5',
				'options'		=> [
					'1'				=> esc_url( get_template_directory_uri() . '/includes/images/column-1.png' ),
					'2'				=> esc_url( get_template_directory_uri() . '/includes/images/column-2.png' ),
					'3'				=> esc_url( get_template_directory_uri() . '/includes/images/column-3.png' ),
					'4'				=> esc_url( get_template_directory_uri() . '/includes/images/column-4.png' ),
					'5'				=> esc_url( get_template_directory_uri() . '/includes/images/column-5.png' ),
					'6'				=> esc_url( get_template_directory_uri() . '/includes/images/column-6.png' ),
				],
			]
		);
		$this->end_controls_section();
		// Heading and Subheading
		$this->start_controls_section(
			'heading_section',
			[
				'label' => esc_attr__( 'Heading and Subheading', 'xclean' ),
			]
		);
		$this->add_control(
			'hs_style',
			[
				'label'			=> esc_attr__( 'Select Heading/Subheading Style', 'xclean' ),
				'description'	=> esc_attr__( 'Select Heading/Subheading Style', 'xclean' ),
				'type'			=> 'pbmit_imgselect',
				'label_block'	=> true,
				'thumb_width'	=> '110px',
				'default'		=> '1',
				'options'		=> array(
					'1'				=> get_template_directory_uri() . '/includes/images/heading-subheading-style-1.jpg',
					'2'				=> get_template_directory_uri() . '/includes/images/heading-subheading-style-2.jpg',
				),
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
				'default'		=> esc_attr__( 'Our Clients', 'xclean' ),
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
			]
		);
		$this->add_control(
			'subtitle_link',
			[
				'label'			=> esc_attr__( 'Subheading Link', 'xclean' ),
				'type'			=> Controls_Manager::URL,
				'label_block'	=> true,
			]
		);
		$this->add_control(
			'desc',
			[
				'label'			=> esc_attr__( 'Description', 'xclean' ),
				'type'			=> Controls_Manager::TEXTAREA,
				'placeholder'	=> esc_attr__( 'Type your description here', 'xclean' ),
			]
		);
		$this->add_control(
			'reverse_title',
			[
				'label'			=> esc_attr__( 'Reverse Heading', 'xclean' ),
				'description'	=> esc_attr__( 'Show Subheading before Heading', 'xclean' ),
				'type'			=> Controls_Manager::SWITCHER,
				'label_on'		=> esc_attr__( 'Yes', 'xclean' ),
				'label_off'		=> esc_attr__( 'No', 'xclean' ),
				'return_value'	=> 'yes',
				'default'		=> '',
				'condition'		=> [
					'hs_style!'		=> ['2'],
				]
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
				'prefix_class'	=> 'pbmit-ele-header-align-',
				'selectors'		=> [
					'{{WRAPPER}} .pbmit-heading-subheading'	=> 'text-align: {{VALUE}};',
				],
				'condition'		=> [
					'hs_style!'		=> ['2'],
				]
			]
		);
		$this->end_controls_section();
		// Heading and Subheading
		$this->start_controls_section(
			'data_section',
			[
				'label'	=> esc_attr__( 'Client Logo Content Options', 'xclean' ),
			]
		);
		$this->add_control(
			'from_category',
			[
				'label'			=> esc_attr__( 'Show Logo from selected Client Group?', 'xclean' ),
				'type'			=> Controls_Manager::SELECT2,
				'options'		=> $this->select_category(),
				'multiple'		=> true,
				'label_block'	=> true,
				'placeholder'	=> esc_attr__( 'All Categories', 'xclean' ),
			]
		);
		$this->add_control(
			'show',
			[
				'label'			=> esc_attr__( 'Logos to show', 'xclean' ),
				'description'	=> esc_attr__( 'How many Logo you want to show.', 'xclean' ),
				'separator'		=> 'before',
				'type'			=> Controls_Manager::NUMBER,
				'default'		=> '6',
			]
		);
		$this->add_control(
			'sortable',
			[
				'label'			=> esc_attr__( 'Show Sortable Client Group?', 'xclean' ),
				'description'	=> esc_attr__( 'Select YES to show sortable Group.', 'xclean' ),
				'type'			=> Controls_Manager::SWITCHER,
				'label_on'		=> esc_attr__( 'Yes', 'xclean' ),
				'label_off'		=> esc_attr__( 'No', 'xclean' ),
				'return_value'	=> 'yes',
				'default'		=> '',
				'condition'		=> [
					'view-type'		=> 'row-column',
				]
			]
		);
		$this->add_control(
			'ajax_sortable',
			[
				'label'			=> esc_attr__( 'Ajax based sortable Category?', 'xclean' ),
				'description'	=> sprintf( esc_attr__( 'Select YES to load %1$s using Ajax on click on the category.', 'xclean' ), $client_cpt_singular_title ),
				'type'			=> Controls_Manager::SWITCHER,
				'label_on'		=> esc_attr__( 'Yes', 'xclean' ),
				'label_off'		=> esc_attr__( 'No', 'xclean' ),
				'return_value'	=> 'yes',
				'default'		=> '',
				'condition'		=> [
					'view-type'		=> 'row-column',
					'sortable'		=> 'yes',
					'offset!'		=> 'yes',
				],
			]
		);
		$this->add_control(
			'order',
			[
				'label'			=> esc_attr__( 'Order', 'xclean' ),
				'description'	=> esc_attr__( 'Designates the ascending or descending order.', 'xclean' ),
				'type'			=> Controls_Manager::SELECT,
				'separator'		=> 'before',
				'default'		=> 'DESC',
				'options'		=> [
					'ASC'			=> esc_attr__( 'Ascending order (1, 2, 3; a, b, c)', 'xclean' ),
					'DESC'			=> esc_attr__( 'Descending order (3, 2, 1; c, b, a)', 'xclean' ),
				]
			]
		);
		$this->add_control(
			'orderby',
			[
				'label'			=> esc_attr__( 'Order By', 'xclean' ),
				'description'	=> esc_attr__( ' Sort retrieved posts by parameter.', 'xclean' ),
				'type'			=> Controls_Manager::SELECT,
				'default'		=> 'none',
				'options'		=> [
					'none'			=> esc_attr__( 'No order', 'xclean' ),
					'ID'			=> esc_attr__( 'ID', 'xclean' ),
					'title'			=> esc_attr__( 'Title', 'xclean' ),
					'date'			=> esc_attr__( 'Date', 'xclean' ),
					'rand'			=> esc_attr__( 'Random', 'xclean' ),
				]
			]
		);
		$this->add_control(
			'offset',
			[
				'label'			=> esc_attr__( 'Skip Logos (offset)', 'xclean' ),
				'description'	=> esc_attr__( 'How many Logo you like to skip.', 'xclean' ),
				'type'			=> Controls_Manager::SELECT,
				'label_block'	=> true,
				'default'		=> '',
				'options'		=> [
					''			=> esc_attr__( 'Show All Client Logo (No skip)', 'xclean' ),
					'1'			=> esc_attr__( 'Skip first Logo', 'xclean' ),
					'2'			=> esc_attr__( 'Skip two Logos', 'xclean' ),
					'3'			=> esc_attr__( 'Skip three Logos', 'xclean' ),
					'4'			=> esc_attr__( 'Skip four Logos', 'xclean' ),
					'5'			=> esc_attr__( 'Skip five Logos', 'xclean' ),
				],
				'condition'	=> [
					'ajax_sortable!' => 'yes',
				]
			]
		);
		$this->end_controls_section();
		// HTML Tags
		$this->start_controls_section(
			'advanced_section',
			[
				'label' => pbmit_esc_kses('<img class="pbmit-tab-small-logo" src="'.get_template_directory_uri() . '/includes/images/pbm-small-logo.png" /> ') . esc_attr__( 'Tag & Gap Settings', 'xclean' ),
				'tab'   => Controls_Manager::TAB_ADVANCED,
			]
		);
		$this->add_control(
			'tag_options',
			[
				'label'		=> esc_attr__( 'Tags for SEO', 'xclean' ),
				'type'		=> Controls_Manager::HEADING,
				'separator'	=> 'before',
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
		$this->add_control(
			'gap_options',
			[
				'label'		=> esc_attr__( 'Gap between Logo boxes', 'xclean' ),
				'type'		=> Controls_Manager::HEADING,
				'separator'	=> 'before',
				'condition'	=>	[
					'style!'		=>	'2',
				]
			]
		);
		$this->add_control(
			'gap',
			[
				'label'			=> esc_attr__( 'Box Gap', 'xclean' ),
				'description'	=> esc_attr__( 'Gap between each box.', 'xclean' ),
				'type'			=> Controls_Manager::SELECT,
				'default'		=> 'default',
				'options'		=> [
					'default'		=> esc_attr__( 'Default Gap', 'xclean' ),
					'0px'			=> esc_attr__( 'No Gap (0px)', 'xclean' ),
					'5px'			=> esc_attr__( '5px', 'xclean' ),
					'10px'			=> esc_attr__( '10px', 'xclean' ),
					'15px'			=> esc_attr__( '15px', 'xclean' ),
					'20px'			=> esc_attr__( '20px', 'xclean' ),
					'25px'			=> esc_attr__( '25px', 'xclean' ),
					'30px'			=> esc_attr__( '30px', 'xclean' ),
					'35px'			=> esc_attr__( '35px', 'xclean' ),
					'40px'			=> esc_attr__( '40px', 'xclean' ),
					'45px'			=> esc_attr__( '45px', 'xclean' ),
					'50px'			=> esc_attr__( '50px', 'xclean' ),
				],
				'condition'	=>	[
					'style!'		=>	'2',
				]
			]
		);
		$this->end_controls_section();
	}
	protected function render() {
		$settings	= $this->get_settings_for_display();
		extract($settings);
		$swiper_class = '';
		if( isset($data['settings']["view-type"]) && !empty($data['settings']["view-type"]) && $data['settings']["view-type"]=='carousel' ){
			$swiper_class = ' swiper-wrapper';
		}
		$infinite_scroll_enabled = ( isset($settings['infinite-scroll']) && !empty($settings['infinite-scroll']) ) ? $settings['infinite-scroll'] : 'no' ;
		$loadmore_btn = ( isset($settings['infinite-scroll-show-loadmore-type']) && !empty($settings['infinite-scroll-show-loadmore-type']) ) ? $settings['infinite-scroll-show-loadmore-type'] : 'no' ;
		$loadmore_btn_title = ( isset($settings['infinite-scroll-loadmore-btn-title']) && !empty($settings['infinite-scroll-loadmore-btn-title']) ) ? $settings['infinite-scroll-loadmore-btn-title'] : '' ;
		// Starting container
		pbmit_element_container( array(
			'position'	=> 'start',
			'cpt'		=> 'client',
			'data'		=> $settings
		) );
		?>
		<div class="pbmit-ele-header-area">
			<?php pbmit_heading_subheading($settings, true); ?>
			<?php
			/* Sortable Category  */
			if( function_exists('pbmit_sortable_category') ){
				$sortable_html = pbmit_sortable_category( $settings, 'pbmit-client-group' );
				echo pbmit_esc_kses($sortable_html);
			}
			?>
		</div>
		<?php
		// Infinite scroll data
		$infinite_scroll_data = array();
		$infinite_scroll_data['cpt'] = 'client';
		$infinite_scroll_data['style'] = $style;
		if( !empty($settings['columns']) ){
			$infinite_scroll_data['columns'] = $settings['columns'];
		}
		if( !empty($settings['show']) ){
			$infinite_scroll_data['show'] = $settings['show'];
		}
		if( !empty($settings['offset']) ){
			$infinite_scroll_data['offset'] = $settings['offset'];
		}
		if( !empty($settings['from_category']) ){
			$infinite_scroll_data['from_category'] = $settings['from_category'];
		}
		if( !empty($settings['show']) ){
			$infinite_scroll_data['show'] = $settings['show'];
		}
		if( !empty($settings['order']) ){
			$infinite_scroll_data['order'] = $settings['order'];
		}
		if( !empty($settings['orderby']) ){
			$infinite_scroll_data['orderby'] = $settings['orderby'];
		}
		echo pbmit_esc_kses('<div class="pbmit-infinite-scroll-data">'.json_encode($infinite_scroll_data).'</div>');
		// Preparing $args
		$args = array(
			'post_type'				=> 'pbmit-client',
			'status'				=> 'publish',
			'posts_per_page'		=> $show,
			'ignore_sticky_posts'	=> true,
		);
		if( !empty($offset) ){
			$args['offset'] = $offset;
		}
		if( !empty($orderby) && $orderby!='none' ){
			$args['orderby'] = $orderby;
			if( !empty($order) ){
				$args['order'] = $order;
			}
		}
		// From selected category/group
		if( !empty($from_category) ){
			$args['tax_query'] = array(
				array(
					'taxonomy'	=> 'pbmit-client-group',
					'field'		=> 'slug',
					'terms'		=> $from_category,
				),
			);
		};
		// Wp query to fetch posts
		$posts = new \WP_Query( $args );
		if ( $posts->have_posts() ) {
			?>
			<div class="pbmit-element-posts-wrapper row multi-columns-row <?php if( !empty($settings['view-type']) && trim($settings['view-type'])=='carousel' ){ ?>swiper-container<?php } ?>">
				<?php
				$odd_even = 'odd';
				while ( $posts->have_posts() ) {
					$return = '';
					$posts->the_post();
					// Template
					if( file_exists( locate_template( '/theme-parts/client/client-style-'.esc_attr($style).'.php', false, false ) ) ){
						$return .= pbmit_element_block_container( array(
							'position'	=> 'start',
							'column'	=> $columns,
							'cpt'		=> 'client',
							'taxonomy'	=> 'pbmit-client-group',
							'style'		=> $style,
						) );
						ob_start();
						include( locate_template( '/theme-parts/client/client-style-'.esc_attr($style).'.php', false, false ) );
						$return .= ob_get_contents();
						ob_end_clean();
						$return .= pbmit_element_block_container( array(
							'position'	=> 'end',
						) );
					}
					echo pbmit_esc_kses($return);
					// odd or even
					if( $odd_even == 'odd' ){ $odd_even = 'even'; } else { $odd_even = 'odd'; }
				}
				?>
			</div> <!-- .pbmit-element-posts-wrapper -->
			<?php } else { ?>
				<div class="pbmit-no-data-message"><?php esc_html_e('No data available.', 'xclean'); ?></div>
			<?php } ?>
		<?php wp_reset_postdata(); ?>
		<?php
		// infinite scroll
		if( $infinite_scroll_enabled=='yes' ){
			// Load More button
			if( $loadmore_btn == 'button' ){
				if( empty($loadmore_btn_title) ){
					$loadmore_btn_title = esc_attr__( 'Load More', 'xclean' );
				}
				echo pbmit_esc_kses( '<div class="pbmit-ajax-load-more-btn"><a href="#">' . esc_attr($loadmore_btn_title) . '</a></div>' );
			}
			echo pbmit_esc_kses( '<div class="pbmit-infinite-loader">
				<img src="' . get_template_directory_uri() . '/images/three-dots.svg" width="60" alt="' . esc_attr__( 'Loader', 'xclean' ) . '">
			</div>
			<div class="pbmit-infinite-scroll-last">' . esc_attr__( 'All content loaded', 'xclean' ) . '</div>' );
		}
		?>
		<?php
		// Ending wrapper of the whole arear
		pbmit_element_container( array(
			'position'	=> 'end',
			'cpt'		=> 'client',
			'data'		=> $settings
		) );
		?>
		<?php
	}
	protected function content_template() {}
	protected function select_category() {
		$category = get_terms( array( 'taxonomy' => 'pbmit-client-group', 'hide_empty' => false ) );
		$cat = array();
		foreach( $category as $item ) {
			$cat_count = get_category( $item );
			if( $item ) {
				$cat[$item->slug] = $item->name . ' ('.$cat_count->count.')';
			}
		}
		return $cat;
	}
	}
// After the Schedule class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register( new PBMIT_ClientElement() );
