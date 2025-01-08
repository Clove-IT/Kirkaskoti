<?php
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)
/**
 * Widget Name: Projects Carousel
 */
class pbmit_TimelineElement extends Widget_Base{
 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'pbmit_timeline_element';
	}
	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return esc_attr__( 'Xclean Timeline Element', 'xclean' );
	}
	// The get_icon() method, is an optional but recommended method, it lets you set the widget icon. you can use any of the eicon or font-awesome icons, simply return the class name as a string.
	public function get_icon() {
		return 'fas fa-history';
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
	}
	public function get_style_depends() {
		return [ 'pbmit-timeline' ];
	}
	protected function register_controls() {
		// Style
		$this->start_controls_section(
			'style_section',
			[
				'label'	=> esc_attr__( 'Style Options', 'xclean' ),
				'tab'	=> Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'style',
			[
				'label'			=> esc_attr__( 'Select Timeline View Style', 'xclean' ),
				'description'	=> esc_attr__( 'Select Timeline View style.', 'xclean' ),
				'type'			=> 'pbmit_imgselect',
				'label_block'	=> true,
				'thumb_width'	=> '110px',
				'default'		=> '1',
				'options'		=> pbmit_element_template_list( 'timeline', true ),
			]
		);
		$this->end_controls_section();
		// Content
		$this->start_controls_section(
			'data_section',
			[
				'label'	=> esc_attr__( 'Content Options', 'xclean' ),
				'tab'	=> Controls_Manager::TAB_CONTENT,
			]
		);
		$repeater = new Repeater();
		$repeater->add_control(
			'image',
			[
				'label'		=> esc_attr__( 'Choose Image', 'xclean' ),
				'type'		=> Controls_Manager::MEDIA,
				'dynamic'	=> [
					'active'	=> true,
				],
				'default'	=> [
					'url'	=> get_template_directory_uri() . '/images/history-img.jpg',
				],
			]
		);
		$repeater->add_control(
			'year_text',
			[
				'label'			=> esc_attr__( 'Small text like Label', 'xclean' ),
				'type'			=> Controls_Manager::TEXT,
				'description'	=> esc_attr__( 'Small text like Label.', 'xclean' ),
				'label_block'	=> true,
			]
		);
		$repeater->add_control(
			'small_text',
			[
				'label'			=> esc_attr__( 'Number of year', 'xclean' ),
				'type'			=> Controls_Manager::TEXT,
				'description'	=> esc_attr__( 'Number of year.', 'xclean' ),
				'label_block'	=> true,
			]
		);
		$repeater->add_control(
			'desc_text',
			[
				'label'			=> esc_attr__( 'Description', 'xclean' ),
				'type'			=> Controls_Manager::TEXTAREA,
				'description'	=> esc_attr__( 'Description Text.', 'xclean' ),
				'show_label'	=> true,
			]
		);
		$this->add_control(
			'values',
			[
				'label'			=> esc_attr__( 'Values', 'xclean' ),
				'description'	=> esc_attr__( 'Enter values for graph - value, title and color.', 'xclean' ),
				'type'			=> Controls_Manager::REPEATER,
				'fields'		=> $repeater->get_controls(),
				'default'		=> [
					[
						'image'			=> get_template_directory_uri() . '/images/history-img.jpg',
						'year_text'		=> esc_attr__( 'Starts With Expert', 'xclean' ),
						'small_text'	=> esc_attr__( '2015', 'xclean' ),
						'desc_text'		=> esc_attr__( 'Starting a commercial cleaning business might be simple for many small business owners', 'xclean' ),
					],
					[
						'image'			=> get_template_directory_uri() . '/images/history-img.jpg',
						'year_text'		=> esc_attr__( 'Connect for Estimate', 'xclean' ),
						'small_text'	=> esc_attr__( '2017', 'xclean' ),
						'desc_text'		=> esc_attr__( 'In today’s world, we go online to find pretty much anything we need services are no exception', 'xclean' ),
					],
					[
						'image'			=> get_template_directory_uri() . '/images/history-img.jpg',
						'year_text'		=> esc_attr__( 'Modern System Solutions', 'xclean' ),
						'small_text'	=> esc_attr__( '2019', 'xclean' ),
						'desc_text'		=> esc_attr__( 'Modern Cleaning Solutions is the right choice in improving the overall appearance of your premises', 'xclean' ),
					],
					[
						'image'			=> get_template_directory_uri() . '/images/history-img.jpg',
						'year_text'		=> esc_attr__( '5 branches Across World', 'xclean' ),
						'small_text'	=> esc_attr__( '2021', 'xclean' ),
						'desc_text'		=> esc_attr__( 'People have always had expectation that the places they visit and work in are clean, safe, and hygienic', 'xclean' ),
					],
					[
						'image'			=> get_template_directory_uri() . '/images/history-img.jpg',
						'year_text'		=> esc_attr__( 'SMCF Actuarial Certificate', 'xclean' ),
						'small_text'	=> esc_attr__( '2022', 'xclean' ),
						'desc_text'		=> esc_attr__( 'We do all types of the interior designing, decoration & furnishing.', 'xclean' ),
					],
					[
						'image'			=> get_template_directory_uri() . '/images/history-img.jpg',
						'year_text'		=> esc_attr__( 'Make Future Continuous', 'xclean' ),
						'small_text'	=> esc_attr__( '2023', 'xclean' ),
						'desc_text'		=> esc_attr__( 'Our creative 3D artists are always ready to translate your designs', 'xclean' ),
					],
				],
				'title_field' => '{{{ small_text }}}',
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
				'default'		=> esc_attr__( 'Company History', 'xclean' ),
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
				'dynamic'		=> [
					'active'		=> true,
				],
				'condition'		=> [
					'hs_style!'		=> ['2'],
				]
			]
		);
		$this->end_controls_section();
		// Data Options
		$this->start_controls_section(
			'row_col_options_heading',
			[
				'label'		=> esc_attr__( 'Column and Carousel Options', 'xclean' ),
				'type'		=> Controls_Manager::HEADING,
				'condition'	=> [
					'style'		=> ['1'],
				],
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
				'default'		=> 'carousel',
				'options'		=> [
					'carousel'		=> esc_url( get_template_directory_uri() . '/includes/images/carousel.png' ),
				]
			]
		);
		// Carousel: Heading
		$this->add_control(
			'carousel_options',
			[
				'label'			=> esc_attr__( 'Carousel Options', 'xclean' ),
				'type'			=> Controls_Manager::HEADING,
				'separator'		=> 'before',
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
				'default'		=> '4000',
				'condition'		=> [
					'view-type'		=> 'carousel',
				]
			]
		);
		// Columns
		$this->add_control(
			'view-column-section-heading',
			[
				'label'		=> esc_attr__( 'Column Settings', 'xclean' ),
				'type'		=> Controls_Manager::HEADING,
				'separator'	=> 'before',
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
					'5'				=> esc_url( get_template_directory_uri() . '/includes/images/column-5.png' ),
					'6'				=> esc_url( get_template_directory_uri() . '/includes/images/column-6.png' ),
				],
			]
		);
		$this->end_controls_section();
		// HTML Tags
		$this->start_controls_section(
			'advanced_section',
			[
				'label'	=> pbmit_esc_kses('<img class="pbmit-tab-small-logo" src="'.get_template_directory_uri() . '/includes/images/pbm-small-logo.png" /> ') . esc_attr__( 'Tag & Gap Settings', 'xclean' ),
				'tab'	=> Controls_Manager::TAB_ADVANCED,
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
		$this->end_controls_section();
	}
	protected function render() {
		$settings	= $this->get_settings_for_display();
		extract($settings);
		// Starting container
		pbmit_element_container( array(
			'position'	=> 'start',
			'cpt'		=> 'timeline',
			'data'		=> $settings
		) );
		?>
		<div class="pbmit-timeline">
			<?php if($style == '1'){?> <div class="container"> <?php } ?>
				<div class="pbmit-ele-header-area">
					<?php pbmit_heading_subheading($settings, true); ?>
				</div>
			<?php if($style == '1'){ ?> </div> <?php }
			if ( $style == '1' ) { ?>
				<div class="pbmit-element-posts-wrapper row multi-columns-row <?php if( !empty($settings['view-type']) && trim($settings['view-type'])=='carousel' ){ ?>swiper-container<?php } ?>">
					<?php if( !empty($settings['values']) && count($settings['values'])>0 ) {
						$return = '';
						foreach($settings['values'] as $value){
							$small_text	= ( !empty($value['small_text']) ) ? $value['small_text'] : '' ;
							$year_text	= ( !empty($value['year_text']) ) ? $value['year_text'] : '' ;
							$desc_text	= ( !empty($value['desc_text']) ) ? $value['desc_text'] : '' ;
							$image		= ( !empty($value['image']['url']) ) ? '<img src="'.esc_url($value['image']['url']).'" alt="'.esc_attr($year_text).'" />' : '' ;
							?>	
							<div class="pbmit-timeline-wrapper swiper-slide ">
								<?php if( !empty($image) ){ ?>
									<div class="pbmit-same-height steps-media pbmit-feature-image">
										<?php echo pbmit_esc_kses($image); ?>
									</div>
								<?php } ?>
								<div class="steps-dot"><i class="steps-dot-line"></i><span class="dot"></span></div>
								<div class="pbmit-same-height steps-content_wrap">
									<p class="pbmit-timeline-year"><?php echo esc_html($small_text); ?></p>
									<h3 class="pbmit-timeline-title"><?php echo esc_html($year_text); ?></h3>
									<p class="pbmit-timeline-desc"><?php echo pbmit_esc_kses($desc_text); ?></p>
								</div>
							</div>		
						<?php } //foreach 
						echo pbmit_esc_kses($return);
					} ?>					
				</div>
			<?php } else { ?>
			<div class="pbmit-first-timeline"></div>
			<div class="pbmit-timeline-post-items">
				<?php if( !empty($settings['values']) && count($settings['values'])>0 ) {
					foreach($settings['values'] as $value){								
						$year_text	= ( !empty($value['year_text']) ) ? $value['year_text'] : '' ;
						$small_text	= ( !empty($value['small_text']) ) ? $value['small_text'] : '' ;
						$desc_text	= ( !empty($value['desc_text']) ) ? $value['desc_text'] : '' ;
						$image		= ( !empty($value['image']['url']) ) ? '<img src="'.esc_url($value['image']['url']).'" alt="'.esc_attr($year_text).'" />' : '' ;
						?>		
						<div class="pbmit-timeline-inner">
							<div class=" col-sm-12 pbmit-ourhistory-type2">
								<div class="row pbmit-ourhistory-row">
									<div class="col-md-5 col-sm-12 col-xs-5 pbmit-ourhistory-right">
										<span class="label"><?php echo esc_html($small_text); ?></span>
										<div class="content">
											<h4 class="pbmit-title"><?php echo esc_html($year_text); ?></h4>
											<div class="simple-text">
												<p><?php echo pbmit_esc_kses($desc_text); ?></p>
											</div>
										</div>
									</div>
									<div class="col-md-2 pbmit-ourhistory-center">
										<span class="label"><?php echo esc_html($small_text); ?></span>
									</div>
									<div class="col-md-5 pbmit-ourhistory-left">
										<span class="pbmit-timeline-image"><?php echo pbmit_esc_kses($image); ?></span>
									</div>
								</div>
							</div>
						</div>
						<?php } ?>
				<?php } ?>
			</div>
			<div class="pbmit-last-timeline"></div>
		<?php } ?>
	</div>
		<?php
	// Ending wrapper of the whole arear
	pbmit_element_container( array(
		'position'	=> 'end',
		'cpt'		=> 'timeline',
		'data'		=> $settings
	) );
	?>
	<?php }
	protected function content_template() {}
	protected function select_category() {
		$category = get_terms( array( 'taxonomy' => 'pbmit-timeline-category', 'hide_empty' => false ) );
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
Plugin::instance()->widgets_manager->register( new pbmit_TimelineElement() );