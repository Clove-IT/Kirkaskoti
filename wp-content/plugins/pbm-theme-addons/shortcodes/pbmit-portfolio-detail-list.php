<?php

// [pbmit-portfolio-detail-list]

if( !function_exists('pbm_addons_sc_pbmit_portfolio_details_list') ){
	function pbm_addons_sc_pbmit_portfolio_details_list( $atts, $content=NULL ) {
		$return = '';
		$lines = pbmit_get_base_option('portfolio-details');
		$title = pbmit_get_base_option('portfolio-details-title');
		if( !empty($lines) ){
			foreach( $lines as $line ){
				$line_id = trim($line['line_title']);
				$line_id = str_replace( ' ', '_', $line_id );
				$line_id = sanitize_html_class( strtolower( $line_id ) ) ;
				// Data
				if( $line['line_type']=='category-link' ){
					$line_data = get_the_term_list( get_the_ID(), 'pbmit-portfolio-category', '', ', ' );
				} else if( $line['line_type']=='category' ){
					$line_data = strip_tags( get_the_term_list( get_the_ID(), 'pbmit-portfolio-category', '', ', ' ) );
				} else if( $line['line_type']=='social-share' ){
					$line_data = pbmit_esc_kses('<div class="addthis_inline_share_toolbox"></div>');
				} else {
					$line_data = get_post_meta( get_the_ID(), 'pbmit-portfolio-details_'.$line_id, true );
				}
				if( !empty($line_data) ){
					$return .= '<li class="pbmit-portfolio-line-li"> <span class="pbmit-portfolio-line-title">' . esc_attr($line['line_title']) . ': </span> <span class="pbmit-portfolio-line-value">' . pbmit_esc_kses($line_data) . '</span></li>';
				}
			}
		}
		if( !empty($return) ){
			$return = '<div class="pbmit-portfolio-lines-wrapper"><ul class="pbmit-portfolio-lines-ul">' . $return . '</ul></div>';
		}
		if( !empty($title) ){
			$return = '<h3>' . esc_html($title) . '</h3> ' . $return;
		}
		return $return;
	}
}
add_shortcode( 'pbmit-portfolio-detail-list', 'pbm_addons_sc_pbmit_portfolio_details_list' );