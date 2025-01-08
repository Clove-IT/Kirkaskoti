<?php

// [pbmit-social-links tooltip="left|right|top|bottom|up|down" colorful="yes|no" style="list" order="twitter,facebook,linkedin"]
if( !function_exists('pbm_addons_sc_pbmit_social_links') ){
function pbm_addons_sc_pbmit_social_links( $atts, $content = "" ) {

	$return = '';

	//
	//$atts['tooltip'] = array('left-right-top-bottom-up-down');
	$data = '';
	if( !empty($atts['tooltip']) && $atts['tooltip'] == 'bottom' ){
		$atts['tooltip'] = 'down';
	}
	if( !empty($atts['tooltip']) && $atts['tooltip'] == 'top' ){
		$atts['tooltip'] = 'up';
	}
	if( !empty($atts['tooltip']) && in_array( $atts['tooltip'], array( 'left', 'right', 'top', 'bottom', 'down', 'up' ) ) ){
		$data .= 'data-balloon-pos="'.$atts['tooltip'].'"';
	}

	$style = '';
	if( !empty($atts['style']) && in_array( $atts['style'], array( 'list' ) ) ){
		$style .= ' pbmit-style-'.$atts['style'];
	}

	$colorful = '';
	if( !empty($atts['colorful']) && $atts['colorful']=='yes' ){
		$colorful = ' pbmit-colorful';
	}

	if( function_exists('pbmit_social_links_list') ){
		$social_list = pbmit_social_links_list();

		// Order
		if( !empty($atts['order']) ){
			$order = explode( ',', $atts['order'] );
			if( is_array($order) && count($order)>0 ){
				$social_list2 = array();
				foreach( $order as $social ){
					foreach( $social_list as $social_data ){
						if( $social_data['id'] == $social ){
							$social_list2[] = $social_data;
						}
					}
				}
			}

			foreach( $social_list as $social_data ){  // merge missing in order
				$found = false;
				foreach( $social_list2 as $social_data2 ){
					if( $social_data['id'] == $social_data2['id'] ){
						$found = true;
					}
				}
				if( $found == false ){
					$social_list2[] = $social_data;
				}
			}

			if( !empty($social_list2) && is_array($social_list2) && count($social_list2) == count($social_list) ){ // final merge
				$social_list = $social_list2;
			}

		}
		

		if( is_array($social_list) ){
			foreach( $social_list as $social ){

				$data_balloon = '';

				// Tooltip
				if( !empty($data) ){ $data_balloon = ' data-balloon="'.$social['label'].'"'; }

				// Label
				$label = '';
				if( !empty($atts['style']) && $atts['style'] == 'list' ){
					$label = ' <span class="pbmit-social-label">'.$social['label'].'</span>';
				}

				$link = pbmit_get_base_option( $social['id'] );
				if( !empty($link) ){
					$return .= '<li class="pbmit-social-li pbmit-social-'.$social['id'].$colorful.'"><a title="'.$social['label'].'" '.$data.' '.$data_balloon.' href="'.esc_url($link).'" target="_blank"><span><i class="'.$social['icon_class'].'"></i></span>'.$label.'</a></li>';
				}
			}
		}
	}

	if( !empty($return) ){
		$return = '<ul class="pbmit-social-links'.$style.'">'.$return.'</ul>';
	}

	return $return;

}
}
add_shortcode( 'pbmit-social-links', 'pbm_addons_sc_pbmit_social_links' );
