<?php
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)
/**
 * Widget Name: Projects Carousel
 */
class PBMIT_PTableElement extends Widget_Base{
 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'pbmit_ptable_element';
	}
	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return esc_attr__( 'Xclean Pricing Table Element', 'xclean' );
	}
	// The get_icon() method, is an optional but recommended method, it lets you set the widget icon. you can use any of the eicon or font-awesome icons, simply return the class name as a string.
	public function get_icon() {
		return 'fas fa-dollar-sign';
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
			'style_section',
			[
				'label'	=> esc_attr__( 'Select Style', 'xclean' ),
				'tab'	=> Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'style',
			[
				'label'			=> esc_attr__( 'Select Pricing Table View Style', 'xclean' ),
				'description'	=> esc_attr__( 'Select Pricing Table View style.', 'xclean' ),
				'type'			=> 'pbmit_imgselect',
				'label_block'	=> true,
				'thumb_width'	=> '110px',
				'default'		=> '1',
				'options'		=> pbmit_element_template_list( 'pricing-table', true ),
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
		// Highlight Column
		$this->start_controls_section(
			'highlight_col_section',
			[
				'label'	=> esc_attr__( 'Highlight Column', 'xclean' ),
			]
		);
		$this->add_control(
			'highlight_col',
			[
				'label'			=> esc_attr__( 'Highlight Column', 'xclean' ),
				'description'	=> esc_attr__( 'Select column which is highlighted in pricing table', 'xclean' ),
				'type'			=> Controls_Manager::SELECT,
				'options'		=> [
					'1'				=> esc_attr__( 'First Column', 'xclean' ),
					'2'				=> esc_attr__( 'Second Column', 'xclean' ),
					'3'				=> esc_attr__( 'Third Column', 'xclean' ),
					'4'				=> esc_attr__( 'Fourth Column', 'xclean' ),
					'5'				=> esc_attr__( 'Fifth Column', 'xclean' ),
				],
				'default'		=> esc_attr( '2' ),
			]
		);
		$this->add_control(
			'highlight_text',
			[
				'label'			=> esc_attr__( 'Highlight Text', 'xclean' ),
				'type'			=> Controls_Manager::TEXT,
				'dynamic'		=> [
					'active' 		=> true,
				],
				'placeholder'	=> esc_attr__( 'This will appear as special text', 'xclean' ),
				'default'		=> esc_attr( 'popular', 'xclean' ),				
				'label_block'	=> true,
			]
		);
		$this->end_controls_section();
		for( $x=1; $x<=5; $x++ ){
			$default_heading	= '';
			$default_price		= '';
			if( $x == 1 ){
				$default_heading = esc_attr__( 'Small Business', 'xclean' );
				$default_price	 = esc_attr__( '299', 'xclean' );
			} else if( $x == 2 ){
				$default_heading = esc_attr__( 'Large Business', 'xclean' );
				$default_price	 = esc_attr__( '350', 'xclean' );
			} else if( $x == 3 ){
				$default_heading = esc_attr__( 'Big Business', 'xclean' );
				$default_price	 = esc_attr__( '499', 'xclean' );
			}
			//Content
			$this->start_controls_section(
				$x.'_col_section',
				[
					'label' => sprintf( esc_attr__( '%1$s Column in Pricing Table', 'xclean' ) , pbmit_ordinal($x) ) ,
				]
				);
			$this->add_control(
				$x.'_heading',
				[
					'label'			=> esc_attr__( 'Heading', 'xclean' ),
					'type'			=> Controls_Manager::TEXT,
					'default'		=> esc_attr( $default_heading ),
					'description'	=> esc_attr__( 'Enter text used as main heading. This will be plan title like "Basic", "Pro" etc.', 'xclean' ),
					'label_block'	=> true,
				]
			);
			$this->add_control(
				$x.'_price',
				[
					'label'			=> esc_attr__( 'Price', 'xclean' ),
					'type'			=> Controls_Manager::TEXT,
					'default'		=> esc_attr( $default_price ),
					'description'	=> esc_attr__( 'Enter Price.', 'xclean' ),
				]
			);
			$this->add_control(
				$x.'_cur_symbol',
				[
					'label'			=> esc_attr__( 'Currency symbol', 'xclean' ),
					'type'			=> Controls_Manager::TEXT,
					'default'		=> esc_attr( '$' ),
					'description'	=> esc_attr__( 'Enter currency symbol', 'xclean' ),
				]
			);
			$this->add_control(
				$x.'_cur_symbol_position',
				[
					'label'			=> esc_html__( 'Currency Symbol position', 'xclean' ),
					'description'	=> esc_html__( 'Select currency position.', 'xclean' ),
					'type'			=> Controls_Manager::SELECT,
					'default'		=> esc_attr('before'),
					'options'		=> [
						'after'			=> esc_attr__( 'After Price', 'xclean' ),
						'before'		=> esc_attr__( 'Before Price', 'xclean' ),
					],
				]
			);
			$this->add_control(
				$x.'_price_frequency',
				[
					'label'			=> esc_attr__( 'Price Frequency', 'xclean' ),
					'type'			=> Controls_Manager::TEXT,
					'default'		=> esc_attr__( 'Per Month', 'xclean' ),
					'description'	=> esc_attr__( 'Enter currency frequency like "Monthly", "Yearly" or "Weekly" etc.', 'xclean' ),
					'separator'		=> 'after',
				]
			);
			$this->add_control(
				$x.'_btn_text',
				[
					'label'			=> esc_attr__( 'Button Text', 'xclean' ),
					'type'			=> Controls_Manager::TEXT,
					'default'		=> esc_attr__( 'Purchase Now', 'xclean' ),
					'description'	=> esc_attr__( 'Like "Read More" or "Buy Now".', 'xclean' ),
				]
			);
			$this->add_control(
				$x.'_btn_link',
				[
					'label'			=> esc_attr__( 'Button Link', 'xclean' ),
					'type'			=> Controls_Manager::URL,
					'default'		=> array (
						'url'				=> '#',
						'is_external'		=> '',
						'nofollow'			=> '',
						'custom_attributes'	=> '',
					),
					'description'	=> esc_attr__( 'Set link for button', 'xclean' ),
					'separator'		=> 'after',
				]
			);
			$repeater = new Repeater();
			$repeater->add_control(
				'text',
				[
					'label'			=> esc_attr__( 'Line Label', 'xclean' ),
					'type'			=> Controls_Manager::TEXT,
					'label_block'	=> true,
				]
			);
			$repeater->add_control(
				'icon',
				[
					'label'	 => esc_attr__( 'Icon', 'xclean' ),
					'type'	  => Controls_Manager::ICONS,
					'default'   => [
						'value'		=> 'fas fa-check',
						'library'	=> 'fa-solid',
					],
				]
			);
			$this->add_control(
				$x.'_lines',
				[
					'label'			=> esc_attr__( 'Each Line (Features)', 'xclean' ),
					'description'	=> esc_attr__( 'Enter features that will be shown in spearate lines.', 'xclean' ),
					'type'			=> Controls_Manager::REPEATER,
					'fields'		=> $repeater->get_controls(),
					'default'		=> [
						[
							'text'		=> esc_attr__( 'Custom schedules everyday', 'xclean' ),
							'icon'		=> [
								'value'		=> 'fas fa-check',
								'library'	=> 'fa-solid',
							]
						],
						[
							'text'		=> esc_attr__( 'Desks and workstations cleaning', 'xclean' ),
							'icon'		=> [
								'value'		=> 'fas fa-check',
								'library'	=> 'fa-solid',
							]
						],
						[
							'text'		=> esc_attr__( 'Washrooms cleaning', 'xclean' ),
							'icon'		=> [
								'value'		=> 'fas fa-check',
								'library'	=> 'fa-solid',
							]
						],
						[
							'text'		=> esc_attr__( 'Floor cleaning', 'xclean' ),
							'icon'		=> [
								'value'		=> 'fas fa-check',
								'library'	=> 'fa-solid',
							]
						],
						[
							'text'		=> esc_attr__( 'Waiting area cleaning', 'xclean' ),
							'icon'		=> [
								'value'		=> 'fas fa-check',
								'library'	=> 'fa-solid',
							]
						],
					],
					'title_field'	=> '{{{ text }}}',
				]
			);
			$this->end_controls_section();
		} // end for loop
		// Heading and Subheading
		$this->start_controls_section(
			'heading_section',
			[
				'label' 	=> esc_attr__( 'Heading and Subheading', 'xclean' ),
				'condition'		=> [
					'style!'		=> ['2','3'],
				]
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
				'default'		=> esc_attr__( 'Our Plans', 'xclean' ),
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
				'label'		=> esc_attr__( 'Alignment', 'xclean' ),
				'type'		=> Controls_Manager::CHOOSE,
				'options'	=> [
					'left'		=> [
						'title'		=> esc_attr__( 'Left', 'xclean' ),
						'icon'		=> 'fa fa-align-left',
					],
					'center'	=> [
						'title'		=> esc_attr__( 'Center', 'xclean' ),
						'icon'		=> 'fa fa-align-center',
					],
					'right'		=> [
						'title'		=> esc_attr__( 'Right', 'xclean' ),
						'icon'		=> 'fa fa-align-right',
					],
				],
				'selectors'		=> [
					'{{WRAPPER}} .pbmit-heading-subheading' => 'text-align: {{VALUE}};',
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
	}
	protected function render() {
		$settings	= $this->get_settings_for_display();
		extract($settings);
		$return = '';
		?>
		<div class="pbminfotech-ele pbminfotech-ele-pricing-table pbminfotech-ele-ptable-style-<?php echo esc_attr($style); ?>">
			<?php pbmit_heading_subheading($settings, true); ?>
			<?php
			$columns = array();
			for ($x = 0; $x <= 5; $x++) {
				if( !empty( $settings[$x.'_heading'] ) ){
					$columns[$x] = $x;
				}
			}
			$col_start_div	= '';
			$col_end_div	= '';
				if( !empty($columns) ){
					switch( count($columns) ){
						case 1:
							$col_start_div	= '<div class="pbmit-ptable-col col-md-12">';
							$col_end_div	= '</div>';
							break;
						case 2:
							$col_start_div	= '<div class="pbmit-ptable-col col-md-6">';
							$col_end_div	= '</div>';
							break;
						case 3:
							$col_start_div	= '<div class="pbmit-ptable-col col-lg-4 col-md-6 col-sm-12">';
							$col_end_div	= '</div>';
							break;
						case 4:
							$col_start_div	= '<div class="pbmit-ptable-col col-md-3">';
							$col_end_div	= '</div>';
							break;
						case 5:
							$col_start_div	= '<div class="pbmit-ptable-col col-md-20percent">';
							$col_end_div	= '</div>';
							break;
					}
				}
			if( !empty($columns) ){
				$return .= '<div class="pbmit-ptable-cols row multi-columns-row">';
				foreach( $columns as $col => $highlight_col ){
					// add highlighted class
					$featured = '';
					if( $settings['highlight_col'] == $col ){
						$col_start_div = str_replace( 'class="', 'class="pbmit-pricing-table-featured-col ', $col_start_div );
						$highlight_text = ( !empty($settings['highlight_text']) ) ? '<div class="pbmit-ptablebox-highlight-text">'.$settings['highlight_text'].'</div>' : '' ;
						$featured = ( !empty($settings['highlight_col']) ) ? '<div class="pbmit-ptablebox-featured-w">'.$highlight_text.'</div>' : '' ;
					} else {
						$col_start_div = str_replace( 'class="pbmit-pricing-table-featured-col ', 'class="', $col_start_div );
					}
					// Heading
					$heading = ( !empty($settings[$col.'_heading']) ) ? '<h3 class="pbminfotech-ptable-heading">'.$settings[$col.'_heading'].'</h3>' : '' ;
					// Currency Symbol
					$currency_symbol = ( !empty($settings[$col.'_cur_symbol']) ) ? '<div class="pbminfotech-ptable-symbol">'.$settings[$col.'_cur_symbol'].'</div>' : '' ;
					// Price Frequency
					$frequency = ( !empty($settings[$col.'_price_frequency']) ) ? '<div class="pbminfotech-ptable-frequency">'.$settings[$col.'_price_frequency'].'</div>' : '' ;
					// Price				
					$price = ( !empty($settings[$col.'_price']) ) ? '<div class="pbminfotech-ptable-price">'.$settings[$col.'_price'].'</div>' : '' ;
					// Add currently symbol in price
					$price = ( !empty($settings[$col.'_cur_symbol_position']) && $settings[$col.'_cur_symbol_position']=='before' ) ? $currency_symbol.' '.$price : $price.' '.$currency_symbol ;
					// list of features
					$lines_html = '';
					$values  = (array) $settings[$col.'_lines'];
					if( is_array($values) && count($values)>0 ){
						foreach ( $values as $data ) {
						  if($data['icon']['library']=='svg'){
								ob_start();
								Icons_Manager::render_icon( $data['icon'] , [ 'aria-hidden' => 'true' ] );
								$list_icon = ob_get_contents();
								ob_end_clean();
								$list_icon	   = '<div class="pbmit-ptable-line-svg">' . $list_icon . '</div>';
								$icon_type_class = 'icon';
							} else {
								ob_start();
								Icons_Manager::render_icon( $data['icon'] , [ 'aria-hidden' => 'true' ] );
								$list_icon = ob_get_contents();
								ob_end_clean();
								wp_enqueue_style( 'elementor-icons-'.$data['icon']['library']);
							}
							$lines_html .= isset( $data['text'] ) ? '<div class="pbmit-ptable-line">'.$list_icon.$data['text'].'</div>' : '';
						}
					}
					// Button
					$button = '';
					if( !empty($settings[$col.'_btn_text']) && !empty($settings[$col.'_btn_link']['url']) ){
						$button = '<div class="pbmit-price-btn">' . pbmit_link_render($settings[$col.'_btn_link'], 'start' ) . pbmit_esc_kses($settings[$col.'_btn_text']) . pbmit_link_render($settings[$col.'_btn_link'], 'end' ) . '</div>';
					}
					// Template output
					$return .= $col_start_div;
					ob_start();
					include( get_template_directory() . '/theme-parts/pricing-table/pricing-table-style-'.esc_attr($style).'.php' );
					$return .= ob_get_contents();
					ob_end_clean();
					$return .= $col_end_div;
				}
				$return .= '</div>';
			}
			echo pbmit_esc_kses($return);
			?>
		</div><!-- pbminfotech-ele pbminfotech-ele-pricing-table -->
		<?php
	}
	protected function content_template() {}
	protected function select_category() {
		$category = get_terms( array( 'taxonomy' => 'pbmit-ptable-category', 'hide_empty' => false ) );
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
Plugin::instance()->widgets_manager->register( new PBMIT_PTableElement() );