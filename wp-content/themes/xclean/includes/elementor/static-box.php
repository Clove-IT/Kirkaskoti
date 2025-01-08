<?php
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)
/**
 * Widget Name: Projects Carousel
 */
class PBMIT_StaticBoxElement extends Widget_Base{
 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'pbmit_static_box_element';
	}
	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return esc_attr__( 'Xclean Static Box Element', 'xclean' );
	}
	// The get_icon() method, is an optional but recommended method, it lets you set the widget icon. you can use any of the eicon or font-awesome icons, simply return the class name as a string.
	public function get_icon() {
		return 'fas fa-boxes';
	}
	// The get_categories method, lets you set the category of the widget, return the category name as a string.
	public function get_categories() {
		return [ 'xclean_category' ];
	}
	public function __construct($data = [], $args = null) {
		parent::__construct($data, $args);
		if( isset($data['settings']["view-type"]) && !empty($data['settings']["view-type"]) && $data['settings']["view-type"]=='carousel' ){
			wp_enqueue_script( 'swiper' );
			wp_enqueue_style( 'swiper' );
		}
	}
	protected function register_controls() {
		// Style
		$this->start_controls_section(
			'style_section',
			[
				'label' => esc_attr__( 'Select Style', 'xclean' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'style',
			[
				'label'			=> esc_attr__( 'Select StaticBox View Style', 'xclean' ),
				'description'	=> esc_attr__( 'Select StaticBox View style.', 'xclean' ),
				'type'			=> 'pbmit_imgselect',
				'label_block'	=> true,
				'thumb_width'	=> '110px',
				'default'		=> '1',
				'options'		=> pbmit_element_template_list( 'static-box', true ),
			]
		);
		$repeater = new Repeater();
		$repeater->add_control(
			'image',
			[
				'label'		=> esc_attr__( 'Choose Image', 'xclean' ),
				'type'		=> Controls_Manager::MEDIA,
				'description'	=> esc_attr__( 'Recommended size for this image is 450x350px jpg file.', 'xclean' ),
				'dynamic'	=> [
					'active'	=> true,
				],
				'default'	=> [
					'url'	=> get_template_directory_uri() . '/images/static-box.jpg',
				],
			]
		);
		$repeater->add_control(
			'title',
			[
				'label'			=> esc_attr__( 'Box Title', 'xclean' ),
				'type'			=> Controls_Manager::TEXT,
				'default'		=> esc_attr__( 'Box Title', 'xclean' ),
				'placeholder'	=> esc_attr__( 'Box Title', 'xclean' ),
				'label_block'	=> true,
			]
		);
		$repeater->add_control(
			'title_link',
			[
				'label'			=> esc_attr__( 'Box Title Link', 'xclean' ),
				'type'			=> Controls_Manager::URL,
				'label_block'	=> true,
			]
		);
		$repeater->add_control(
			'tag_options',
			[
				'label'			=> esc_attr__( 'Tags for SEO', 'xclean' ),
				'type'			=> Controls_Manager::HEADING,
				'separator'		=> 'before',
			]
		);
		$repeater->add_control(
			'title_tag',
			[
				'label'   => esc_attr__( 'Heading Tag', 'xclean' ),
				'type' 	  => Controls_Manager::SELECT,
				'options' => [
					'h1'	=> esc_attr( 'H1' ),
					'h2'	=> esc_attr( 'H2' ),
					'h3'	=> esc_attr( 'H3' ),
					'h4'	=> esc_attr( 'H4' ),
					'h5'	=> esc_attr( 'H5' ),
					'h6'	=> esc_attr( 'H6' ),
					'div'	=> esc_attr( 'DIV' ),
				],
				'default' => esc_attr( 'h2' ),
			]
		);
		$this->add_control(
			'boxes',
			[
				'label'		=> esc_attr__( 'Each Static Box Content', 'xclean' ),
				'type'		=> Controls_Manager::REPEATER,
				'fields'	=> $repeater->get_controls(),
				'default'	=> [
					[
						'image'		=> get_template_directory_uri() . '/images/static-box.jpg',
						'title'		=> esc_attr__( 'Experienced Staff', 'xclean' ),
					],
					[
						'image'		=> get_template_directory_uri() . '/images/static-box.jpg',
						'title'		=> esc_attr__( 'Natural Products', 'xclean' ),
					],
					[
						'image'		=> get_template_directory_uri() . '/images/static-box.jpg',
						'title'		=> esc_attr__( 'Best Equipment', 'xclean' ),
					],
				],
				'title_field' => '{{{ title }}}',
			]
		);
		$this->end_controls_section();
		// Column and Carousel Options
		$this->start_controls_section(
			'row_column_section',
			[
				'label'		=> esc_attr__( 'Column and Carousel Options', 'xclean' ),
			]
		);
		$this->add_control(
			'view-type',
			[
				'label'			=> esc_attr__( 'How you like to view each Post box?', 'xclean' ),
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
				'label' 	=> esc_attr__( 'Carousel Options', 'xclean' ),
				'type' 		=> Controls_Manager::HEADING,
				'separator' => 'before',
				'condition'		=> [
					'view-type'		=> 'carousel',
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
		// Carousel : autoplaySpeed
		$this->add_control(
			'carousel-autoplayspeed',
			[
				'label'			=> esc_attr__( 'Carousel: autoplaySpeed', 'xclean' ),
				'description'	=> esc_attr__( 'autoplay speed.', 'xclean' ),
				'type'			=> Controls_Manager::TEXT,
				'default'		=> '5000',
				'condition'		=> [
					'view-type'		=> 'carousel',
				]
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
		$this->end_controls_section();
		// Heading and Subheading
		$this->start_controls_section(
			'heading_section',
			[
				'label' => esc_attr__( 'Heading and Subheading', 'xclean' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
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
				'label' 		=> esc_attr__( 'Heading Animation', 'xclean' ),
				'description'	=> esc_attr__( 'Select Heading Text Animation View style.', 'xclean' ) . ' ' . pbmit_esc_kses('<br><a target="_blank" href="' . esc_url('https://xclean-demo.pbminfotech.com/demo1/element/#heading-animations') . '">' . esc_attr__( 'See all anmiation demo here.', 'xclean' ) . '</a>' ),
				'type' 	  		=> Controls_Manager::SELECT,
				'default'		=>	'4',
				'options' 		=> [
					'4'			=> esc_attr__( 'No animation', 'xclean' ),
					'1'			=> esc_attr__( 'Animation Style 1', 'xclean' ),
					'2'			=> esc_attr__( 'Animation Style 2', 'xclean' ),
					'3'			=> esc_attr__( 'Animation Style 3', 'xclean' ),
				],
				'separator'	=> 'before',
			]
		);
		$this->add_control(
			'title',
			[
				'label'	  => esc_attr__( 'Heading', 'xclean' ),
				'type' 	  => Controls_Manager::TEXTAREA,
				'dynamic' => [
					'active' => true,
				],
				'default' 	  => esc_attr__( 'Welcome to our site', 'xclean' ),
				'placeholder' => esc_attr__( 'Enter your heading', 'xclean' ),
				'label_block' => true,
			]
			);
		$this->add_control(
			'title_link',
			[
				'label' 	  => esc_attr__( 'Heading Link', 'xclean' ),
				'type' 		  => Controls_Manager::URL,
				'label_block' => true,
			]
		);
		$this->add_control(
			'subtitle',
			[
				'label'   => esc_attr__( 'Subheading', 'xclean' ),
				'type' 	  => Controls_Manager::TEXTAREA,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => esc_attr__( 'Enter your subtitle', 'xclean' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'subtitle_link',
			[
				'label' 	  => esc_attr__( 'Subheading Link', 'xclean' ),
				'type' 		  => Controls_Manager::URL,
				'label_block' => true,
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
				'label' 		=> esc_attr__( 'Reverse Heading', 'xclean' ),
				'description' 	=> esc_attr__( 'Show Subheading before Heading', 'xclean' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> esc_attr__( 'Yes', 'xclean' ),
				'label_off' 	=> esc_attr__( 'No', 'xclean' ),
				'return_value' 	=> 'yes',
				'default' 		=> '',
				'condition'		=> [
					'hs_style!'		=> ['2'],
				]
			]
		);
		$this->add_responsive_control(
			'text_align',
			[
				'label' 	=> esc_attr__( 'Alignment', 'xclean' ),
				'type' 		=> Controls_Manager::CHOOSE,
				'options' 	=> [
					'left'  => [
						'title' => esc_attr__( 'Left', 'xclean' ),
						'icon'  => 'fa fa-align-left',
					],
					'center' => [
						'title' => esc_attr__( 'Center', 'xclean' ),
						'icon'  => 'fa fa-align-center',
					],
					'right' => [
						'title' => esc_attr__( 'Right', 'xclean' ),
						'icon'  => 'fa fa-align-right',
					],
				],
				'prefix_class'	=> 'pbmit-ele-header-align-',
				'selectors' => [
					'{{WRAPPER}} .pbmit-heading-subheading' => 'text-align: {{VALUE}};',
				],
				'dynamic' => [
					'active' => true,
				],
				'condition'		=> [
					'hs_style!'		=> ['2'],
				]
			]
		);
		$this->end_controls_section();
		// HTML Tags
		$this->start_controls_section(
			'advanced_section',
			[
				'label' => pbmit_esc_kses('<img class="pbmit-tab-small-logo" src="'.get_template_directory_uri() . '/includes/images/pbm-small-logo.png" /> ') . esc_attr__( 'Gap Settings', 'xclean' ),
				'tab'   => Controls_Manager::TAB_ADVANCED,
			]
		);
		$this->add_control(
			'gap_options',
			[
				'label'		=> esc_attr__( 'Gap between Static boxes', 'xclean' ),
				'type'		=> Controls_Manager::HEADING,
				'separator'	=> 'before',
			]
		);
		$this->add_control(
			'gap',
			[
				'label'			=> esc_attr__( 'Box Gap', 'xclean' ),
				'description'	=> esc_attr__( 'Gap between each Static box.', 'xclean' ),
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
		?>
		<?php
		// Starting container
		pbmit_element_container( array(
			'position'	=> 'start',
			'cpt'		=> 'static-box',
			'data'		=> $settings
		) );
		?>
		<div class="pbmit-ele-header-area">
			<?php pbmit_heading_subheading($settings, true); ?>
		</div>
		<div class="pbmit-element-posts-wrapper <?php if( !empty($settings['view-type']) && trim($settings['view-type'])=='carousel' ){ ?>swiper-container<?php } ?> row multi-columns-row">
			<?php
			$return = '';
			foreach( $settings['boxes'] as $box ){
				$image_html	= $title_html = '' ;
				// Title
				if( !empty($box['title']) ) {
					$title_tag	= ( !empty($box['title_tag']) ) ? $box['title_tag'] : 'h2' ;
					$title_html	= '<div class="pbmit-staticbox-wraper"><'. pbmit_esc_kses($title_tag) . ' class="pbmit-staticbox-title"> '.pbmit_link_render($box['title_link'], 'start' ).' '.pbmit_esc_kses($box['title']).' '.pbmit_link_render($box['title_link'], 'end' ).' </'. pbmit_esc_kses($title_tag) . '></div>';
				}
				//Image
				$image_html	= ( !empty($box['image']['url']) ) ? '<img src="'.esc_url($box['image']['url']).'" alt="'.esc_attr($box['title']).'" />' : '' ;
				// Template
				if( file_exists( locate_template( '/theme-parts/static-box/static-box-style-'.esc_attr($style).'.php', false, false ) ) ){
					$return .= pbmit_element_block_container( array(
						'position'	=> 'start',
						'column'	=> $columns,
						'cpt'		=> 'static-box',
						'style'		=> $style
					) );
					ob_start();
					include( locate_template( '/theme-parts/static-box/static-box-style-'.esc_attr($style).'.php', false, false ) );
					$return .= ob_get_contents();
					ob_end_clean();
					$return .= pbmit_element_block_container( array(
						'position'	=> 'end',
					) );
				}
			} // foreach
			echo pbmit_esc_kses($return); ?>		
		</div>
		<?php
		// Ending wrapper of the whole arear
		pbmit_element_container( array(
			'position'	=> 'end',
			'cpt'		=> 'static-box',
			'data'		=> $settings
		) ); 
		?>
		<?php }
	protected function content_template() {}
}
// After the Schedule class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register( new PBMIT_StaticBoxElement() );