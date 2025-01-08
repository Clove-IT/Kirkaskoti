<?php

/*
 * PBMInfotech Recent Posts
 */

class pbminfotech_Recent_Posts_Widget extends WP_Widget {

  // Set up the widget name and description.
  public function __construct() {
    $widget_options = array( 'classname' => 'pbm_addons_recent_posts_widget', 'description' => esc_attr__('Show recent post with thumbnail', 'pbm-addons') );
    parent::__construct( 'pbm_addons_recent_posts_widget', esc_attr__('PBM: Recent Posts Widget', 'pbm-addons'), $widget_options );
  }

  // Create the widget output.
	public function widget( $args, $instance ) {
		$return		= '';
		$title		= apply_filters( 'widget_title', $instance[ 'title' ] );
		$limit		= $instance[ 'limit' ];
		$blog_title	= get_bloginfo( 'name' );
		$tagline	= get_bloginfo( 'description' );

		// Query args
		$query_args = array(
			'post_type'			=> 'post',
			'posts_per_page'	=> $limit,
		);

		// The Query
		$the_query = new WP_Query( $query_args );

		// The Loop
		if ( $the_query->have_posts() ) {
			$return .= '<ul class="pbmit-rpw-list">';
			while ( $the_query->have_posts() ) {
				$the_query->the_post();

				$return .= '<li>';

				if( has_post_thumbnail( get_the_ID() ) ){
					$return .= '<a href="' . get_permalink() . '"><span class="pbmit-rpw-img">' . get_the_post_thumbnail( get_the_ID(), 'thumbnail' ) . '</span></a>';
				}

				$return .= '<span class="pbmit-rpw-content">						
						<span class="pbmit-rpw-title"><a href="' . get_permalink() . '">' . get_the_title() . '</a></span>
						<span class="pbmit-rpw-date"><a href="' . get_permalink() . '">' . get_the_date() . '</a></span>
					</span>';

				$return .= '</li>';

			}
			$return .= '</ul>';

			/* Restore original Post Data */
			wp_reset_postdata();

		} else {
			// no posts found
		}

    echo $args['before_widget'] . $args['before_title'] . $title . $args['after_title'];
	echo $return;
	?>
    <?php echo $args['after_widget'];
  }

  // Create the admin area widget settings form.
  public function form( $instance ) {
    $title = ! empty( $instance['title'] ) ? $instance['title'] : '';
	$limit = ! empty( $instance['limit'] ) ? $instance['limit'] : '3'; ?>
    <p>
      <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_attr_e('Title','pbm-addons'); ?>:</label>
      <input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>" />
    </p>
	<p>
      <label for="<?php echo $this->get_field_id( 'limit' ); ?>"><?php esc_attr_e('How many Posts to Show','pbm-addons'); ?>:</label>
	  <select id="<?php echo $this->get_field_id( 'limit' ); ?>" name="<?php echo $this->get_field_name( 'limit' ); ?>">
		<option value="1" <?php selected( $limit, '1' ); ?>><?php esc_attr_e('1','pbm-addons'); ?></option>
		<option value="2" <?php selected( $limit, '2' ); ?>><?php esc_attr_e('2','pbm-addons'); ?></option>
		<option value="3" <?php selected( $limit, '3' ); ?>><?php esc_attr_e('3','pbm-addons'); ?></option>
		<option value="4" <?php selected( $limit, '4' ); ?>><?php esc_attr_e('4','pbm-addons'); ?></option>
		<option value="5" <?php selected( $limit, '5' ); ?>><?php esc_attr_e('5','pbm-addons'); ?></option>
		<option value="6" <?php selected( $limit, '6' ); ?>><?php esc_attr_e('6','pbm-addons'); ?></option>
		<option value="7" <?php selected( $limit, '7' ); ?>><?php esc_attr_e('7','pbm-addons'); ?></option>
		<option value="8" <?php selected( $limit, '8' ); ?>><?php esc_attr_e('8','pbm-addons'); ?></option>
		<option value="9" <?php selected( $limit, '9' ); ?>><?php esc_attr_e('9','pbm-addons'); ?></option>
		<option value="10" <?php selected( $limit, '10' ); ?>><?php esc_attr_e('10','pbm-addons'); ?></option>
	  </select>

    </p><?php
  }

  // Apply settings to the widget instance.
  public function update( $new_instance, $old_instance ) {
    $instance = $old_instance;
    $instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );
    $instance[ 'limit' ] = strip_tags( $new_instance[ 'limit' ] );
    return $instance;
  }

}

// Register the widget.
function pbm_addons_register_recent_posts_widget() { 
  register_widget( 'pbminfotech_Recent_Posts_Widget' );
}
add_action( 'widgets_init', 'pbm_addons_register_recent_posts_widget' );

?>