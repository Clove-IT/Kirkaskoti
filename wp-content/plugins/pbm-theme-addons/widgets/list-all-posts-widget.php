<?php

add_action( 'widgets_init', 'pbm_addons_list_all_posts_widget' );
function pbm_addons_list_all_posts_widget() {
	register_widget( 'pbm_addons_list_all_posts' );
}

class pbm_addons_list_all_posts extends WP_Widget {

	function __construct() {
		$widget_ops = array('classname' => 'pbmit_widget_list_all_posts', 'description' => esc_attr__( "Show all posts for current CPT.", 'pbm-addons') );
		parent::__construct('pbmit-list-all-posts', esc_attr__('PBM: List All Posts', 'pbm-addons'), $widget_ops);
	}

	function widget($args, $instance) {

		if ( ! isset( $args['widget_id'] ) ){
			$args['widget_id'] = $this->id;
		}
		extract($args);

		$title			= ( !empty($instance['title']) ) ? $instance['title'] : esc_attr__( 'Posts', 'pbm-addons' );
		$title			= apply_filters( 'widget_title', $title, $instance, $this->id_base );
		$number			= ( !empty($instance['number']) ) ? absint( $instance['number'] ) : '-1';
		$orderby		= ( !empty($instance['orderby']) ) ? esc_attr($instance['orderby']) : '';
		$order			= ( !empty($instance['order']) && in_array( $instance['order'], array( 'ASC', 'DESC') ) ) ? esc_attr($instance['order']) : 'DESC';
		$custom_class	= ( !empty($instance['custom_class']) ) ? $instance['custom_class'] : '';

		// Adding class in $before_widget variable
		if( !empty($custom_class) ){
			if( strpos($before_widget, 'class') === false ) {
				// include closing tag in replace string
				$before_widget = str_replace('>', 'class="'. $custom_class . '">', $before_widget);
			} else {
				// there is 'class' attribute - append width value to it
				$before_widget = str_replace('class="', 'class="'. $custom_class . ' ', $before_widget);
			}
		}

		$post_type = 'post';
		if( is_singular() ){
			$post_type = get_post_type();
			$post_type = (empty($post_type)) ? 'post' : $post_type ;
		}

		$orderby_val = '';
		if( !empty($orderby) ){
			$orderby_val = $orderby;
		}

		$order_val = '';
		if( !empty($order) ){
			$order_val = $order;
		}

		$r = new WP_Query( array(
			'posts_per_page'		=> $number,
			'no_found_rows'			=> true,
			'post_status'			=> 'publish',
			'ignore_sticky_posts'	=> true,
			'post_type'				=> $post_type,
			'orderby'				=> $orderby_val,
			'order'					=> $order_val,
		));

		?>

		<?php
		if ($r->have_posts()) :
?>

		<?php

		echo wp_kses( /* html Filter */
			$before_widget,
			array(
				'aside' => array(
					'id'    => array(),
					'class' => array(),
				),
				'div' => array(
					'id'    => array(),
					'class' => array(),
				),
				'span' => array(
					'class' => array(),
				),
				'h2' => array(
					'class' => array(),
					'id'    => array(),
				),
				'h3' => array(
					'class' => array(),
					'id'    => array(),
				),
				'h4' => array(
					'class' => array(),
					'id'    => array(),
				),

			)
		); 
		?>

		<?php
		if ( !empty($title) ){
			$recentposts_widget_title = $before_title . $title . $after_title;
			echo wp_kses( /* html Filter */
				$recentposts_widget_title,
				array(
					'aside' => array(
						'id'    => array(),
						'class' => array(),
					),
					'div' => array(
						'id'    => array(),
						'class' => array(),
					),
					'span' => array(
						'class' => array(),
					),
					'h2' => array(
						'class' => array(),
						'id'    => array(),
					),
					'h3' => array(
						'class' => array(),
						'id'    => array(),
					),
					'h4' => array(
						'class' => array(),
						'id'    => array(),
					),

				)
			);
		}
		?>

		<div class="pbmit-all-post-list-w">
			<ul class="pbmit-all-post-list">
			<?php

			$current_id = ( is_singular() ) ? get_the_ID() : '' ;

			if ($r->have_posts()){
				while ( $r->have_posts() ) :
					$r->the_post();
					$current_class = ( get_the_ID() == $current_id ) ? 'pbmit-post-active' : '' ;
					?>
					<li class="<?php echo esc_attr($current_class); ?>"><a href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a></li>
					<?php
				endwhile;
			}
			?>
			</ul>
		</div>

		<?php
		echo wp_kses( /* html Filter */
			$after_widget,
			array(
				'aside' => array(
					'id'    => array(),
					'class' => array(),
				),
				'div' => array(
					'id'    => array(),
					'class' => array(),
				),
				'span' => array(
					'class' => array(),
				),
				'h2' => array(
					'class' => array(),
					'id'    => array(),
				),
				'h3' => array(
					'class' => array(),
					'id'    => array(),
				),
				'h4' => array(
					'class' => array(),
					'id'    => array(),
				),

			)
		);
		?>

		<?php
		// Reset the global $the_post as this query will have stomped on it
		wp_reset_postdata();
		endif;

	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title']			= esc_attr($new_instance['title']);
		$instance['number']			= (int) $new_instance['number'];
		$instance['orderby']		= esc_attr($new_instance['orderby']);
		$instance['order']			= esc_attr($new_instance['order']);
		$instance['custom_class']	= esc_attr($new_instance['custom_class']);

		return $instance;
	}

	function form( $instance ) {
		$title			= isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$number			= isset( $instance['number'] ) ? absint( $instance['number'] ) : 9;
		$orderby		= isset( $instance['orderby'] ) ? esc_attr( $instance['orderby'] ) : '';
		$order			= isset( $instance['order'] ) ? esc_attr( $instance['order'] ) : 'DESC';
		$custom_class	= isset( $instance['custom_class'] ) ? esc_attr($instance['custom_class']) : '';

?>
		<div class="pbmit-widget-infobox">
			<?php esc_attr_e('This will show recent post,page or other post-type as list with special design.', 'pbm-addons'); ?>
		</div>

		<p><label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_attr_e( 'Title:', 'pbm-addons' ); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>

		<p><label for="<?php echo esc_attr($this->get_field_id( 'number' )); ?>"><?php esc_attr_e( 'Number of posts to show:', 'pbm-addons' ); ?></label> <br>
		<input id="<?php echo esc_attr($this->get_field_id( 'number' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'number' )); ?>" type="text" value="<?php echo esc_attr($number); ?>" size="3" /></p>

		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'orderby' )); ?>">
				<?php esc_attr_e( 'Orderby of posts to show:', 'pbm-addons' ); ?>
			</label>
			<br>
			<select id="<?php echo esc_attr($this->get_field_id( 'orderby' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'orderby' )); ?>">
				<option value="" <?php selected( $orderby, '' ); ?>><?php esc_attr_e( 'None (default)', 'pbm-addons' ) ?></option>
				<option value="title" <?php selected( $orderby, 'title' ); ?>><?php esc_attr_e( 'Post Title', 'pbm-addons' ) ?></option>
				<option value="date" <?php selected( $orderby, 'date' ); ?>><?php esc_attr_e( 'Post Date', 'pbm-addons' ) ?></option>
				<option value="modified" <?php selected( $orderby, 'modified' ); ?>><?php esc_attr_e( 'Post Modified Date', 'pbm-addons' ) ?></option>
				<option value="rand" <?php selected( $orderby, 'rand' ); ?>><?php esc_attr_e( 'Random order', 'pbm-addons' ) ?></option>
			</select>
		</p>

		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'order' )); ?>">
				<?php esc_attr_e( 'Designates the ascending or descending order:', 'pbm-addons' ); ?>
			</label>
			<br>
			<select id="<?php echo esc_attr($this->get_field_id( 'order' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'order' )); ?>">
				<option value="ASC" <?php selected( $order, 'ASC' ); ?>><?php esc_attr_e( 'Ascending order (Example - 1, 2, 3; a, b, c)', 'pbm-addons' ) ?></option>
				<option value="DESC" <?php selected( $order, 'DESC' ); ?>><?php esc_attr_e( 'Descending order ( Example - 3, 2, 1; c, b, a)', 'pbm-addons' ) ?></option>
			</select>
		</p>

		<p><label for="<?php echo esc_attr($this->get_field_id( 'custom_class' )); ?>"><?php esc_attr_e( 'Custom Class:', 'pbm-addons' ); ?></label><br>
		<input id="<?php echo esc_attr($this->get_field_id( 'custom_class' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'custom_class' )); ?>" type="text" value="<?php echo esc_attr($custom_class); ?>" /></p>

<?php
	}
}