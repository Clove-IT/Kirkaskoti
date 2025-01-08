<?php

/*
 * PBMInfotech Contact Widget
 */

class pbminfotech_Contact_Widget extends WP_Widget {

  // Set up the widget name and description.
  public function __construct() {
    $widget_options = array( 'classname' => 'pbm_addons_contact_widget', 'description' => esc_attr__('Show contact with icons', 'pbm-addons') );
    parent::__construct( 'pbm_addons_contact_widget', esc_attr__('PBM: Contact Widget', 'pbm-addons'), $widget_options );
  }

  // Create the widget output.
	public function widget( $args, $instance ) {
		$return		= '';

		/**
		 * This is hook to modify class
		 * Example:
		 * 
		 *	if( !function_exists('pbmit_contact_widget_address_modified_class') ) {
		 *	function pbmit_contact_widget_address_modified_class($class) {
		 *		return 'custom-class-from-child-theme';
		 *	}
		 *	}
		 *	add_filter('pbmit_contact_widget_address_class', 'pbmit_contact_widget_address_modified_class');
		 *
		 */
        $address_class = apply_filters('pbmit_contact_widget_address_class', 'pbmit-base-icon-location');
        $phone_class = apply_filters('pbmit_contact_widget_phone_class', 'pbmit-base-icon-phone');
        $email_class = apply_filters('pbmit_contact_widget_email_class', 'pbmit-base-icon-email');

		$title		= apply_filters( 'widget_title', $instance[ 'title' ] );

		// Prepare list here
		if( !empty( $instance['address'] ) ){
			$return .= '<div class="pbmit-contact-widget-line '.esc_attr($address_class).'">'.nl2br($instance['address']).'</div>';
		}
		if( !empty( $instance['phone'] ) ){
			$return .= '<div class="pbmit-contact-widget-line '.esc_attr($phone_class).'">'.$instance['phone'].'</div>';
		}
		if( !empty( $instance['email'] ) ){
			$return .= '<div class="pbmit-contact-widget-line '.esc_attr($email_class).'">'.$instance['email'].'</div>';
		}	
		if( !empty( $instance['button'] ) ){
			$return .= '<div class="pbmit-contact-widget-line pbmit-contact-widget-button pbmit-svg-btn"><a class="btn-arrow" href="'.$instance['button-url'].'">'.$instance['button'].' <svg class="pbmit-svg-arrow" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="19" height="10" viewBox="0 0 19 19" xml:space="preserve"><line x1="1" y1="18" x2="17.8" y2="1.2"></line><line x1="1.2" y1="1" x2="18" y2="1"></line><line x1="18" y1="17.8" x2="18" y2="1"></line></svg></a></div>';
		}	
		if( !empty($return) ){
			$return = '<div class="pbmit-contact-widget-lines">'.$return.'</div>';
		}

		echo pbmit_esc_kses($args['before_widget']);
		if( !empty($title) ){
			echo pbmit_esc_kses($args['before_title'] . $title . $args['after_title']);
		}
		echo pbmit_esc_kses($return);
		echo pbmit_esc_kses($args['after_widget']);
	}

  // Create the admin area widget settings form.
  public function form( $instance ) {
    $title		= ! empty( $instance['title'] ) ? $instance['title'] : '';
	$address	= ! empty( $instance['address'] ) ? $instance['address'] : '3';
	$phone		= ! empty( $instance['phone'] ) ? $instance['phone'] : '';
	$email		= ! empty( $instance['email'] ) ? $instance['email'] : '';
	$button		= ! empty( $instance['button'] ) ? $instance['button'] : '';
	$button_url	= ! empty( $instance['button-url'] ) ? $instance['button-url'] : '';
	?>

	<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_attr_e('Title','pbm-addons'); ?>:</label><br>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>" />
	</p>
	<p>
		<label for="<?php echo $this->get_field_id( 'address' ); ?>"><?php esc_attr_e('Address','pbm-addons'); ?>:</label><br>
		<textarea rows="5" class="widefat" id="<?php echo $this->get_field_id( 'address' ); ?>" name="<?php echo $this->get_field_name( 'address' ); ?>"><?php echo esc_attr( $address ); ?></textarea>
	</p>

	<p>
		<label for="<?php echo $this->get_field_id( 'phone' ); ?>"><?php esc_attr_e('Phone','pbm-addons'); ?>:</label><br>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'phone' ); ?>" name="<?php echo $this->get_field_name( 'phone' ); ?>" value="<?php echo esc_attr( $phone ); ?>" />
	</p>

	<p>
		<label for="<?php echo $this->get_field_id( 'email' ); ?>"><?php esc_attr_e('Email','pbm-addons'); ?>:</label><br>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'email' ); ?>" name="<?php echo $this->get_field_name( 'email' ); ?>" value="<?php echo esc_attr( $email ); ?>" />
	</p>
	
	<p>
		<label for="<?php echo $this->get_field_id( 'button' ); ?>"><?php esc_attr_e('Button','pbm-addons'); ?>:</label><br>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'button' ); ?>" name="<?php echo $this->get_field_name( 'button' ); ?>" value="<?php echo esc_attr( $button ); ?>" />
	</p>

	<p>
		<label for="<?php echo $this->get_field_id( 'button-url' ); ?>"><?php esc_attr_e('Button URL','pbm-addons'); ?>:</label><br>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'button-url' ); ?>" name="<?php echo $this->get_field_name( 'button-url' ); ?>" value="<?php echo esc_attr( $button_url ); ?>" />
	</p>

	 <?php
  }

  // Apply settings to the widget instance.
  public function update( $new_instance, $old_instance ) {
    $instance = $old_instance;
    $instance[ 'title' ]	= strip_tags( $new_instance[ 'title' ] );
    $instance[ 'address' ]	= $new_instance[ 'address' ];
    $instance[ 'phone' ]	= $new_instance[ 'phone' ];
    $instance[ 'email' ]	= $new_instance[ 'email' ];
    $instance[ 'button' ]	= $new_instance[ 'button' ];
    $instance[ 'button-url' ]	= $new_instance[ 'button-url' ];
    return $instance;
  }

}

// Register the widget.
function pbm_addons_register_contact_widget() { 
  register_widget( 'pbminfotech_Contact_Widget' );
}
add_action( 'widgets_init', 'pbm_addons_register_contact_widget' );

?>
