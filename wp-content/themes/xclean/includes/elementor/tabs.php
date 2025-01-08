<?php
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)
/**
 * Widget Name: Section Heading 
 */
class PBMIT_TabsElement extends Widget_Base{
 	/**
	 * Get widget name.
	 *
	 * Retrieve tabs widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'pbmit_tabs_element';
	}
	/**
	 * Get widget title.
	 *
	 * Retrieve tabs widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Xclean Tabs Element', 'xclean' );
	}
	/**
	 * Get widget icon.
	 *
	 * Retrieve tabs widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'fas fa-box';
	}
	// The get_categories method, lets you set the category of the widget, return the category name as a string.
	public function get_categories() {
		return [ 'xclean_category' ];
	}
	/**
	 * Get widget keywords.
	 *
	 * Retrieve the list of keywords the widget belongs to.
	 *
	 * @since 2.1.0
	 * @access public
	 *
	 * @return array Widget keywords.
	 */
	public function get_keywords() {
		return [ 'tabs', 'accordion', 'toggle' ];
	}
	protected function register_controls() {
		//Content Service box
		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_attr( 'Tabs', 'xclean' ),
			]
		);
		$repeater = new Repeater();
		$repeater->add_control(
			'tab_title',
			[
				'label'			=> esc_attr( 'Title & Description', 'xclean' ),
				'type'			=> Controls_Manager::TEXT,
				'default'		=> esc_attr( 'Tab Title', 'xclean' ),
				'placeholder'	=> esc_attr( 'Tab Title', 'xclean' ),
				'label_block'	=> true,
			]
		);
		$repeater->add_control(
			'tab_content',
			[
				'label'			=> esc_attr( 'Content', 'xclean' ),
				'default'		=> esc_attr( 'Tab Content', 'xclean' ),
				'placeholder'	=> esc_attr( 'Tab Content', 'xclean' ),
				'type'			=> Controls_Manager::WYSIWYG,
				'show_label'	=> false,
			]
		);
		$this->add_control(
			'tabs',
			[
				'label'			=> esc_attr( 'Tabs Items', 'xclean' ),
				'type'			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default'		=> [
					[
						'tab_title'		=> esc_attr( 'Experienced Staff', 'xclean' ),
						'tab_content'	=> esc_attr( 'We help ambitious businesses like yours generate more profits by building awareness, driving web traffic, connecting with customers, and growing overall sales. Give us a call.', 'xclean' ),
					],
					[
						'tab_title'		=> esc_attr( 'Natural Products', 'xclean' ),
						'tab_content'	=> esc_attr( 'There are many variations of passages of Lorem Ipsumbut the majority have suffered alteration in some form, by injected humour, or words which dont look even.', 'xclean' ),
					],
					[
						'tab_title'		=> esc_attr( 'Fast Service', 'xclean' ),
						'tab_content'	=> esc_attr( 'We help ambitious businesses like yours generate more profits by building awareness, driving web traffic, connecting with customers, and growing overall sales. Give us a call.', 'xclean' ),
					],
					[
						'tab_title'		=> esc_attr( 'Best Equipment', 'xclean' ),
						'tab_content'	=> esc_attr( 'There are many variations of passages of Lorem Ipsumbut the majority have suffered alteration in some form, by injected humour, or words which dont look even.', 'xclean' ),
					],
					[
						'tab_title'		=> esc_attr( 'Residential Cleaning', 'xclean' ),
						'tab_content'	=> esc_attr( 'We help ambitious businesses like yours generate more profits by building awareness, driving web traffic, connecting with customers, and growing overall sales. Give us a call.', 'xclean' ),
					],
				],
				'title_field'	=> '{{{ tab_title }}}',
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
				'default'		=> esc_attr__( 'Our Tabs', 'xclean' ),
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
					'{{WRAPPER}} .pbmit-heading-subheading' => 'text-align: {{VALUE}};',
				],
				'condition'		=> [
					'hs_style!'		=> ['2'],
				]
			]
		);
		$this->end_controls_section();
	}
	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<div class="pbmit-ele-header-area">
			<?php pbmit_heading_subheading($settings, true); ?>
		</div>
		<div class="pbmit-tabs">
			<?php if ( $settings['tabs'] ) : ?>
			<ul class="pbmit-tabs-heading">
				<?php $i = 1; foreach ( $settings['tabs'] as $tabs ) { ?>
					<?php $active_li_class = ( $i==1 ) ? 'pbmit-tab-li-active' : '' ; ?>
				<li class="pbmit-tab-link <?php echo esc_attr($active_li_class); ?>" data-pbmit-tab="<?php echo esc_attr($i); ?>"><span><?php echo esc_html($tabs['tab_title']); ?></span><i class="pbmit-base-icon-black-arrow-1"></i></li>
				<?php $i++; } ?>
			</ul>
			<div class="pbmit-tab-content-wrapper">
				<?php $j = 1; foreach ( $settings['tabs'] as $tabs ) { ?>
					<?php $active_class = ( $j==1 ) ? 'pbmit-tab-active' : '' ; ?>
					<div class="pbmit-tab-content pbmit-tab-content-<?php echo esc_attr($j); ?> <?php echo esc_attr($active_class); ?>">
						<div class="pbmit-tab-content-title" data-pbmit-tab="<?php echo esc_attr($j); ?>"><?php echo esc_html($tabs['tab_title']); ?><i class="pbmit-base-icon-black-arrow-1"></i></div>
						<div class="pbmit-tab-content-inner">
							<?php echo pbmit_esc_kses($tabs['tab_content']); ?>
						</div>
					</div>
				<?php $j++; } ?>
			</div>
			<?php endif; ?>
		</div>
		<?php
	}
	protected function content_template() {}
}
// After the Schedule class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register( new PBMIT_TabsElement() );