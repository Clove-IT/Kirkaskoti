<?php
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)
/**
 * Widget Name: Projects Carousel
 */
class PBMIT_ServiceElement extends Widget_Base{
 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'pbmit_service_element';
	}
	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		// Service
		$service_cpt_singular_title	= esc_attr__('Service','xclean');
		$service_cpt_singular_title2	= get_theme_mod( 'service-cpt-singular-title' );
		$service_cpt_singular_title	= ( !empty($service_cpt_singular_title2) ) ? $service_cpt_singular_title2 : $service_cpt_singular_title ;
		return sprintf( esc_attr__( 'Xclean %1$s Element', 'xclean' ), $service_cpt_singular_title );
	}
	// The get_icon() method, is an optional but recommended method, it lets you set the widget icon. you can use any of the eicon or font-awesome icons, simply return the class name as a string.
	public function get_icon() {
		return 'fas fa-book-open';
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
			wp_localize_script(
				'infinite-scroll', // Handle
				'pbmit_infinite_scroll_vars', // Object name
				array(
					'ajaxurl'	 => admin_url( 'admin-ajax.php' ),
					'ajaxnonce'   => wp_create_nonce( 'pbmit_infinite_scroll_ajax_validation' )
			   )
		   );
		}
		if( ( !empty($data['settings']["view-type"]) && $data['settings']["view-type"]=='masonry' ) &&
		( !empty($data['settings']["infinite-scroll"]) && $data['settings']["infinite-scroll"]=='yes' )
		){
			wp_enqueue_script( 'infinite-scroll' );
		}
	}
	protected function register_controls() {
		// Service
		$service_cpt_title	= esc_attr__('Services','xclean');
		$service_cpt_title2	= get_theme_mod( 'service-cpt-title' );
		$service_cpt_title	= ( !empty($service_cpt_title2) ) ? $service_cpt_title2 : $service_cpt_title ;
		$service_cpt_singular_title		= esc_attr__('Service','xclean');
		$service_cpt_singular_title2	= get_theme_mod( 'service-cpt-singular-title' );
		$service_cpt_singular_title		= ( !empty($service_cpt_singular_title2) ) ? $service_cpt_singular_title2 : $service_cpt_singular_title;
		$service_cat_singular_title		= esc_attr__('Service Category','xclean');
		$service_cat_singular_title2	= get_theme_mod( 'service-cat-singular-title' );
		$service_cat_singular_title		= ( !empty($service_cat_singular_title2) ) ? $service_cat_singular_title2 : $service_cat_singular_title ;
		// Style
		$this->start_controls_section(
			'style_section',
			[
				'label'	=> sprintf( esc_attr__( '%1$s Style Options', 'xclean' ), $service_cpt_singular_title ),
				'tab'	=> Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'style',
			[
				'label'			=> sprintf( esc_attr__( 'Select %1$s View Style', 'xclean' ), $service_cpt_singular_title ),
				'description'	=> sprintf( esc_attr__( 'Select %1$s View Style', 'xclean' ), $service_cpt_singular_title ),
				'type'			=> 'pbmit_imgselect',
				'label_block'	=> true,
				'thumb_width'	=> '110px',
				'default'		=> '1',
				'options'		=> pbmit_element_template_list( 'service', true ),
			]
		);
		$this->end_controls_section();
		// Column and Carousel Options
		$this->start_controls_section(
			'row_column_section',
			[
				'label'		=> esc_attr__( 'Column and Carousel Options', 'xclean' ),
				'condition'		=> [
					'style!'		=> ['3'],
				]
			]
		);
		$this->add_control(
			'view-type',
			[
				'label'			=> sprintf( esc_attr__( 'How you like to view each %1$s box?', 'xclean' ), $service_cpt_singular_title ),
				'description'	=> esc_attr__( 'Show as carousel view, simple row-column view or masonry view.', 'xclean' ),
				'type'			=> 'pbmit_imgselect',
				'label_block'	=> true,
				'thumb_width'	=> '110px',
				'default'		=> 'row-column',
				'options'		=> [
					'row-column'	=> esc_url( get_template_directory_uri() . '/includes/images/row-column.png' ),
					'carousel'		=> esc_url( get_template_directory_uri() . '/includes/images/carousel.png' ),
					'masonry'		=> esc_url( get_template_directory_uri() . '/includes/images/masonry.png' ),
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
		// Infinite scroll
		$this->add_control(
			'infinite-scroll-section-heading',
			[
				'label'			=> esc_attr__( 'Infinite Scroll Options', 'xclean' ),
				'type'			=> Controls_Manager::HEADING,
				'separator'		=> 'before',
				'condition'		=> [
					'view-type'		=> 'masonry',
				],
			]
		);
		$this->add_control(
			'infinite-scroll',
			[
				'label'			=> esc_attr__( 'Enable infinite scroll ?', 'xclean' ),
				'description'	=>  sprintf( esc_attr__( 'Select YES to dynamically load more %1$s', 'xclean' ), $service_cpt_title ),
				'type'			=> Controls_Manager::SWITCHER,
				'label_on'		=> esc_attr__( 'Yes', 'xclean' ),
				'label_off'		=> esc_attr__( 'No', 'xclean' ),
				'return_value'	=> 'yes',
				'default'		=> '',
				'condition'		=> [
					'view-type'		=> 'masonry',
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
					'infinite-scroll'	=> 'yes',
				],
				'default'	=> esc_attr( 'auto' ),
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
				'default'		=> '3',
				'options'		=> [
					'1'				=> esc_url( get_template_directory_uri() . '/includes/images/column-1.png' ),
					'2'				=> esc_url( get_template_directory_uri() . '/includes/images/column-2.png' ),
					'3'				=> esc_url( get_template_directory_uri() . '/includes/images/column-3.png' ),
					'4'				=> esc_url( get_template_directory_uri() . '/includes/images/column-4.png' ),
				],
			]
		);
		$this->add_control(
			'show-portion-column',
			[
				'label'			=> esc_attr__( 'Show small portion of the next slide?', 'xclean' ),
				'description'	=> esc_attr__( 'Select YES to show a small portion of the next slide', 'xclean' ),
				'type'			=> Controls_Manager::SWITCHER,
				'label_on'		=> esc_attr__( 'Yes', 'xclean' ),
				'label_off'		=> esc_attr__( 'No', 'xclean' ),
				'return_value'	=> 'true',
				'default'		=> '',
				'condition'		=> [
					'view-type'		=> 'carousel',
				],
			]
		);
		$this->end_controls_section();
		// Heading and Subheading
		$this->start_controls_section(
			'heading_section',
			[
				'label'	=> esc_attr__( 'Heading and Subheading', 'xclean' ),
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
				'default'		=> sprintf( esc_attr__( 'Our %1$s', 'xclean' ), $service_cpt_singular_title ),
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
			'highlight_text',
			[
				'label'			=> esc_attr__( 'Highlight text', 'xclean' ),
				'type'			=> Controls_Manager::TEXTAREA,
				'dynamic'		=> [
					'active'		=> true,
				],
				'placeholder'	=> esc_attr__( 'Enter your highlight text', 'xclean' ),
				'label_block'	=> true,
				'condition'		=> [
					'style'			=>	['2','3'],
				],
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
				'label'	=> sprintf( esc_attr__( '%1$s Content Options', 'xclean' ), $service_cpt_singular_title ),
			]
		);
		$this->add_control(
			'from_category',
			[
				'label'			=> sprintf( esc_attr__( 'Show %2$s from selected %1$s?', 'xclean' ), $service_cat_singular_title, $service_cpt_singular_title ),
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
				'label'			=> sprintf( esc_attr__( '%1$s to show', 'xclean' ), $service_cpt_singular_title ),
				'description'	=> sprintf( esc_attr__( 'How many %1$s you want to show.', 'xclean' ), $service_cpt_singular_title ),
				'separator'		=> 'before',
				'type'			=> Controls_Manager::NUMBER,
				'default'		=> '6',
			]
		);
		$this->add_control(
			'sortable',
			[
				'label'			=> sprintf( esc_attr__( 'Show Sortable %1$s?', 'xclean' ), $service_cat_singular_title ),
				'description'	=> sprintf( esc_attr__( 'Select YES to show sortable %1$s.', 'xclean' ), $service_cat_singular_title ),
				'type'			=> Controls_Manager::SWITCHER,
				'label_on'		=> esc_attr__( 'Yes', 'xclean' ),
				'label_off'		=> esc_attr__( 'No', 'xclean' ),
				'return_value'	=> 'yes',
				'default'		=> '',
				'condition'		=> [
					'view-type'		=> 'row-column',
					'style!'		=> ['3'],
					'pagination!'	=> 'yes',
				],
			]
		);
		$this->add_control(
			'ajax_sortable',
			[
				'label'			=> esc_attr__( 'Ajax based sortable Category?', 'xclean' ),
				'description'	=> sprintf( esc_attr__( 'Select YES to load %1$s using Ajax on click on the category.', 'xclean' ), $service_cpt_singular_title ),
				'type'			=> Controls_Manager::SWITCHER,
				'label_on'		=> esc_attr__( 'Yes', 'xclean' ),
				'label_off'		=> esc_attr__( 'No', 'xclean' ),
				'return_value'	=> 'yes',
				'default'		=> '',
				'condition'		=> [
					'view-type'		=> 'row-column',
					'sortable'		=> 'yes',
					'offset!'		=> 'yes',
					'style!'		=> ['3'],
				],
			]
		);
		$this->add_control(
			'pagination',
			[
				'label'			=> esc_attr__( 'Show Pagination ?', 'xclean' ),
				'description'	=>  sprintf( esc_attr__( 'Select YES to Show pagination links below %1$s boxes.', 'xclean' ), $service_cpt_singular_title ),
				'type'			=> Controls_Manager::SWITCHER,
				'label_on'		=> esc_attr__( 'Yes', 'xclean' ),
				'label_off'		=> esc_attr__( 'No', 'xclean' ),
				'return_value'	=> 'yes',
				'default'		=> '',
				'condition'		=> [
					'view-type'		=> 'row-column',
					'sortable!'		=> 'yes',
					'style!'		=> ['3'],
				]
			]
		);
		$this->add_control(
			'ajax_pagination',
			[
				'label'			=> esc_attr__( 'Load post without page refresh on Pagination click ?', 'xclean' ),
				'description'	=>  sprintf( esc_attr__( 'Select YES to load Posts without page refresh (ajax based) when click on the pagination links.', 'xclean' ), $service_cpt_singular_title ),
				'type'			=> Controls_Manager::SWITCHER,
				'label_on'		=> esc_attr__( 'Yes', 'xclean' ),
				'label_off'		=> esc_attr__( 'No', 'xclean' ),
				'return_value'	=> 'yes',
				'default'		=> '',
				'condition'		=> [
					'pagination'	=> 'yes',
					'view-type'		=> 'row-column',
					'sortable!'		=> 'yes',
					'style!'		=> ['3'],
				]
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
				'description'	=> sprintf( esc_attr__( ' Sort retrieved %1$s by parameter.', 'xclean' ), $service_cat_singular_title ),
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
				'label'			=> sprintf( esc_attr__( 'Skip %1$s (offset)', 'xclean' ), $service_cpt_singular_title ),
				'description'	=> sprintf( esc_attr__( 'How many %1$s you like to skip.', 'xclean' ), $service_cpt_singular_title ),
				'type'			=> Controls_Manager::SELECT,
				'label_block'	=> true,
				'default'		=> '',
				'options'		=> [
					''			=> sprintf( esc_attr__( 'Show All %1$s (No skip)', 'xclean' ), $service_cpt_singular_title ),
					'1'			=> sprintf( esc_attr__( 'Skip first %1$s', 'xclean' ), $service_cpt_singular_title ),
					'2'			=> sprintf( esc_attr__( 'Skip two %1$s', 'xclean' ), $service_cpt_title ),
					'3'			=> sprintf( esc_attr__( 'Skip three %1$s', 'xclean' ), $service_cpt_title ),
					'4'			=> sprintf( esc_attr__( 'Skip four %1$s', 'xclean' ), $service_cpt_title ),
					'5'			=> sprintf( esc_attr__( 'Skip five %1$s', 'xclean' ), $service_cpt_title ),
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
				'label'	=> pbmit_esc_kses('<img class="pbmit-tab-small-logo" src="'.get_template_directory_uri() . '/includes/images/pbm-small-logo.png" /> ') . esc_attr__( 'Tag & Gap Settings', 'xclean' ),
				'tab'	=> Controls_Manager::TAB_ADVANCED,
				'condition'		=> [
					'style!'		=> ['3'],
				]
			]
		);
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
				'default' => esc_attr( 'h4' ),
			]
		);
		$this->add_control(
			'gap_options',
			[
				'label'		=> sprintf( esc_attr__( 'Gap between %1$s boxes', 'xclean' ), $service_cpt_singular_title ),
				'type'		=> Controls_Manager::HEADING,
				'separator'	=> 'before',
			]
		);
		$this->add_control(
			'gap',
			[
				'label'			=> esc_attr__( 'Box Gap', 'xclean' ),
				'description'	=>  sprintf( esc_attr__( 'Gap between each  %1$s box.', 'xclean' ), $service_cpt_singular_title ),
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
			]
		);
		$this->end_controls_section();
	}
	protected function render() {
		$settings	= $this->get_settings_for_display();
		extract($settings);
		$columns = ( !empty($columns) ) ? $columns : '1' ;
		// Masonry image sizes
		$masonry_image_size_array = array(
			'pbmit-img-770x492', // For masonry 1st box
			'pbmit-img-770x762', // For masonry 2nd box
			'pbmit-img-770x492', // For masonry 3rd box
			'pbmit-img-770x745', // For masonry 4th box
			'pbmit-img-770x745', // For masonry 5th box
			'pbmit-img-770x872', // For masonry 6th box
			'pbmit-img-770x447', // For masonry 7th box
			'pbmit-img-770x485', // For masonry 8th box
			'pbmit-img-770x974', // For masonry 9th box
		);
		$swiper_class = '';
		if( isset($data['settings']["view-type"]) && !empty($data['settings']["view-type"]) && $data['settings']["view-type"]=='carousel' ){
			$swiper_class = ' swiper-wrapper';
		}
		$infinite_scroll_enabled = ( isset($settings['infinite-scroll']) && !empty($settings['infinite-scroll']) ) ? $settings['infinite-scroll'] : 'no' ;
		$loadmore_btn = ( isset($settings['infinite-scroll-show-loadmore-type']) && !empty($settings['infinite-scroll-show-loadmore-type']) ) ? $settings['infinite-scroll-show-loadmore-type'] : 'no' ;
		$loadmore_btn_title = ( isset($settings['infinite-scroll-loadmore-btn-title']) && !empty($settings['infinite-scroll-loadmore-btn-title']) ) ? $settings['infinite-scroll-loadmore-btn-title'] : '' ;
		?>
		<?php
		// Starting container
		pbmit_element_container( array(
			'position'	=> 'start',
			'cpt'		=> 'service',
			'data'		=> $settings
		) );
		if($style =='4' ){?>
			<div class="row">
				<div class="pbmit-servicebox-left col-lg-3 col-md-12 pbmit-column">
					<div class="pbmit-ele-header-area">
						<?php pbmit_heading_subheading($settings, true);  ?>
					</div>
				</div>
			<?php }	else { ?>
			<div class="pbmit-ele-header-area">
				<?php pbmit_heading_subheading($settings, true); ?>
				<?php
				/* Sortable Category  */
				$sortable_html = pbmit_sortable_category( $settings, 'pbmit-service-category' );
				if( !empty($sortable_html) ){
					echo  pbmit_esc_kses( $sortable_html );
				}
				?>
			</div>
		<?php
		}
		// Infinite scroll data
		$infinite_scroll_data = array();
		$infinite_scroll_data['cpt'] = 'service';
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
		if(is_front_page()) {
			$paged = (get_query_var('page')) ? get_query_var('page') : 1;
		}else {
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		}
		$args = array(
			'post_type'				=> 'pbmit-service',
			'status'				=> 'publish',
			'posts_per_page'		=> $show,
			'ignore_sticky_posts'	=> true,
			'paged'					=> $paged,
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
					'taxonomy'	=> 'pbmit-service-category',
					'field'		=> 'slug',
					'terms'		=> $from_category,
				),
			);
		};
		// Wp query to fetch posts
		$posts = new \WP_Query( $args );
		if ( $posts->have_posts() ) {

			if( $style =='4' ){ ?>
				<div class="pbmit-servicebox-right col-lg-9 col-md-12 pbmit-column">
			<?php } ?>

				<div class="pbmit-element-posts-wrapper row multi-columns-row <?php if( !empty($settings['view-type']) && trim($settings['view-type'])=='carousel' ){ ?>swiper-container<?php } ?> ">
					<?php
					$odd_even 	= 'odd';
					$x			= 1;
					$pbmit_global_sc_loop_inner_count = 0;
					while ( $posts->have_posts() ) {
						$return = '';
						$posts->the_post();
						// masonry image size
						$imgsize = ''; // default image size variable. This should be empty.
						if( !empty($settings['view-type']) && $settings['view-type'] == 'masonry' ){
							$imgsize = $masonry_image_size_array[($pbmit_global_sc_loop_inner_count)];
						}
						// Template
						if( file_exists( locate_template( '/theme-parts/service/service-style-'.esc_attr($style).'.php', false, false ) ) ){
							$return .= pbmit_element_block_container( array(
								'position'	=> 'start',
								'column'	=> $columns,
								'cpt'		=> 'service',
								'taxonomy'	=> 'pbmit-service-category',
								'style'		=> $style,
							) );
							ob_start();
							include( locate_template( '/theme-parts/service/service-style-'.esc_attr($style).'.php', false, false ) );
							$return .= ob_get_contents();
							ob_end_clean();
							$return .= pbmit_element_block_container( array(
								'position'	=> 'end',
							) );
							// Variable to count current, for image size and other use
							$pbmit_global_sc_loop_inner_count++;
							if( !empty($masonry_image_size_array) ){
								if (($x) % (count($masonry_image_size_array)) == 0) {
									$pbmit_global_sc_loop_inner_count = 0;
								}
							}
						}
						echo pbmit_esc_kses($return);
						// odd or even
						if( $odd_even == 'odd' ){ $odd_even = 'even'; } else { $odd_even = 'odd'; }
						// number
						$x++;
					}
					?>
				</div> <!-- .pbmit-element-posts-wrapper -->
				<?php if( $style =='4' ){ ?></div> <!-- .pbmit-servicebox-right--> <?php } ?> 
			<?php
			// Pagination
			if( isset($settings['pagination']) && $settings['pagination']=='yes' && $settings['view-type']!='carousel' ){
				$return .= pbmit_pagination( $posts );
			}
			// infinite scroll
			if( $infinite_scroll_enabled=='yes' ){
				// Load More button
				if( $loadmore_btn == 'button' ){
					if( empty($loadmore_btn_title) ){
						$loadmore_btn_title = esc_attr__( 'Load More', 'xclean' );
					}
					echo pbmit_esc_kses( '<div class="pbmit-ajax-load-more-btn"><a href="#">' . esc_attr($loadmore_btn_title) . '</a></div>' );
				}
				echo pbmit_esc_kses( '<div class="pbmit-infinite-loader"><img src="' . get_template_directory_uri() . '/images/three-dots.svg" width="60" alt="' . esc_attr__( 'Loader', 'xclean' ) . '"></div><div class="pbmit-infinite-scroll-last">' . esc_attr__( 'All content loaded', 'xclean' ) . '</div>' );
			} ?>
		<?php } else { ?>
			<div class="pbmit-no-data-message"><?php esc_html_e('No data available.', 'xclean'); ?></div>
		<?php }
		wp_reset_postdata();
		// Ending wrapper of the whole arear
		pbmit_element_container( array(
			'position'	=> 'end',
			'cpt'		=> 'service',
			'data'		=> $settings
		) );
	}
	protected function content_template() {}
	
	protected function select_category() {
		$category = get_terms( array( 'taxonomy' => 'pbmit-service-category', 'hide_empty' => false ) );
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
Plugin::instance()->widgets_manager->register( new PBMIT_ServiceElement() );
