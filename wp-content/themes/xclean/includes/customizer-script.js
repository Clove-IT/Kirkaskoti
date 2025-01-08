"use strict";
jQuery(window).on('load', function($) {
	wp.customize(
		'header-style',
		function(header_style) {
			var header_height		    = '100';
			var sticky_header_height    = '90';
			var header_bgcolor		    = 'transparent';
			var global_color		    = '#fba311';
			var secondary_color		    = '#09042d';
			var light_bg_color		    = '#f0f2f4';
			var blackish_bg_color	    = '#001837';
			var main_menu_typography    = {
				'font-family'	: 'Quicksand',
				'variant'		: '700',
				'font-size'		: '14px',
				'line-height'	: '24px',
				'letter-spacing': '0.5px',
				'color'			: '#001837',
				'text-transform': 'uppercase',
				'font-backup'	: '',
				'font-style'	: 'normal',
			};
			var sticky_header_bgcolor			= 'white';
			var main_menu_active_color			= '#fba311';
			var main_menu_sticky_color			= '#001837';
			var main_menu_sticky_active_color   = '#fba311';
			var preheader_enable				= false;
			var logo_height						= '50';
			var titlebar_height					= '450';
			var titlebar_bgcolor				= 'transparent';
			var titlebar_heading_typography     = {
				'font-family'	: 'Quicksand',
				'variant'		: '700',
				'font-size'		: '60px',
				'line-height'	: '60px',
				'letter-spacing': '0px',
				'color'			: '#09042d',
				'text-transform': 'none',
				'font-backup'	: '',
				'font-style'	:'normal',
			};
			var titlebar_subheading_typography = {
				'font-family'	: 'Quicksand',
				'variant'		: '700',
				'font-size'		: '18px',
				'line-height'	: '24px',
				'letter-spacing': '0px',
				'color'			: '#09042d',
				'text-transform': 'capitalize',
				'font-backup'	: '',
				'font-style'	: 'normal',
			};
			var titlebar_breadcrumb_typography = {
				'font-family'	: 'Open Sans',
				'variant'		: '500',
				'font-size'		: '15px',
				'line-height'	: '25px',
				'letter-spacing': '0.5px',
				'color'			: '#565656',
				'text-transform': 'uppercase',
				'font-backup'	: '',
				'font-style'	: 'normal',
			};
			var logo = pbmit_admin_js_variables.theme_path + '/images/logo.svg';
			var logo_white = pbmit_admin_js_variables.theme_path + '/images/logo-white.svg';
			header_style.bind(function(value) {

			if (value == '1') { // Default header style
				wp.customize('global-color').set(global_color);
				wp.customize('light-bg-color').set(light_bg_color);
				wp.customize('blackish-bg-color').set(blackish_bg_color);
				wp.customize('secondary-color').set(secondary_color);
				wp.customize('header-height').set(header_height);
				wp.customize('sticky-header-height').set(sticky_header_height);
				wp.customize('header-bgcolor').set(header_bgcolor);
				wp.customize('main-menu-typography').set(main_menu_typography);
				wp.customize('header-search').set(false);
				wp.customize('wc-show-cart-icon').set(false);
				wp.customize('sticky-header').set(false);
				wp.customize('sticky-header-height').set(header_height);
				wp.customize('sticky-header-bgcolor').set(sticky_header_bgcolor);
				wp.customize('main-menu-active-color').set(main_menu_active_color);
				wp.customize('main-menu-sticky-color').set(main_menu_sticky_color);
				wp.customize('main-menu-sticky-active-color').set(main_menu_sticky_active_color);
				wp.customize('preheader-enable').set(false);
				wp.customize('logo-height').set(logo_height);
				wp.customize('titlebar-height').set('300');
				wp.customize('titlebar-bgcolor').set('blackish');
				wp.customize('titlebar-heading-typography').set({
					'font-family'	: 'Quicksand',
					'variant'		: '700',
					'font-size'		: '60px',
					'line-height'	: '60px',
					'letter-spacing': '0px',
					'color'			: '#ffffff',
					'text-transform': 'none',
					'font-backup'	: '',
					'font-style'	:'normal',
				});
				wp.customize('titlebar-subheading-typography').set({
					'font-family'	: 'Quicksand',
					'variant'		: '700',
					'font-size'		: '18px',
					'line-height'	: '24px',
					'letter-spacing': '0px',
					'color'			: '#ffffff',
					'text-transform': 'capitalize',
					'font-backup'	: '',
					'font-style'	: 'normal',
				});
				wp.customize('titlebar-breadcrumb-typography').set({
					'font-family'	: 'Open Sans',
					'variant'		: '500',
					'font-size'		: '15px',
					'line-height'	: '25px',
					'letter-spacing': '0.5px',
					'color'			: '#ffffff',
					'text-transform': 'uppercase',
					'font-backup'	: '',
					'font-style'	: 'normal',
				});
				wp.customize('logo').set(logo);
				wp.customize('sticky-logo').set(logo);

			}   else if (value == '2') { // Header style 2
				wp.customize('global-color').set(global_color);
				wp.customize('light-bg-color').set(light_bg_color);
				wp.customize('blackish-bg-color').set(blackish_bg_color);
				wp.customize('secondary-color').set(secondary_color);
				wp.customize('header-height').set(header_height);
				wp.customize('sticky-header-height').set(sticky_header_height);
				wp.customize('logo-height').set(logo_height);
				wp.customize('header-bgcolor').set('white');
				wp.customize('main-menu-typography').set(main_menu_typography);
				wp.customize('main-menu-active-color').set(main_menu_active_color);
				wp.customize('main-menu-sticky-color').set(main_menu_sticky_color);
				wp.customize('main-menu-sticky-active-color').set(main_menu_sticky_active_color);
				wp.customize('header-search').set(true);
				wp.customize('wc-show-cart-icon').set(true);
				wp.customize('sticky-header').set(true);
				wp.customize('preheader-enable').set(preheader_enable);
				wp.customize('header-btn-text').set('+1(212)255-511');
				wp.customize('header-btn-url').set('tel:+1-(212)-255-511');
				wp.customize('header-btn2-text').set('Get a Quote');
				wp.customize('header-btn2-url').set('#');
				wp.customize('titlebar-height').set(titlebar_height);
				wp.customize('titlebar-bgcolor').set('f0f2f4');
				wp.customize('titlebar-heading-typography').set(titlebar_heading_typography);
				wp.customize('titlebar-subheading-typography').set(titlebar_subheading_typography);
				wp.customize('titlebar-breadcrumb-typography').set(titlebar_breadcrumb_typography);
				wp.customize('logo').set(logo);
				wp.customize('sticky-logo').set(logo);
			}  else if (value == '3') { // Header style 3
				wp.customize('global-color').set(global_color);
				wp.customize('light-bg-color').set(light_bg_color);
				wp.customize('blackish-bg-color').set(blackish_bg_color);
				wp.customize('secondary-color').set(secondary_color);
				wp.customize('header-height').set('80');
				wp.customize('sticky-header-height').set('90');
				wp.customize('logo-height').set(logo_height);
				wp.customize('header-bgcolor').set(header_bgcolor);
				wp.customize('main-menu-typography').set(main_menu_typography);
				wp.customize('main-menu-active-color').set(main_menu_active_color);
				wp.customize('main-menu-sticky-color').set(main_menu_sticky_color);
				wp.customize('main-menu-sticky-active-color').set(main_menu_sticky_active_color);
				wp.customize('header-search').set(true);
				wp.customize('wc-show-cart-icon').set(true);
				wp.customize('sticky-header').set(true);
				wp.customize('preheader-enable').set(preheader_enable);
				wp.customize('header-btn-text').set('+1(212)255-511');
				wp.customize('header-btn-url').set('tel:+1-(212)-255-511');
				wp.customize('header-btn2-text').set('Get a Quote');
				wp.customize('header-btn2-url').set('#');
				wp.customize('titlebar-height').set(titlebar_height);
				wp.customize('titlebar-bgcolor').set('f0f2f4');
				wp.customize('titlebar-heading-typography').set(titlebar_heading_typography);
				wp.customize('titlebar-subheading-typography').set(titlebar_subheading_typography);
				wp.customize('titlebar-breadcrumb-typography').set(titlebar_breadcrumb_typography);
				wp.customize('logo').set(logo_white);
				wp.customize('sticky-logo').set(logo);
			}
			else if (value == '4') { // Header style 4
				wp.customize('global-color').set(global_color);
				wp.customize('light-bg-color').set(light_bg_color);
				wp.customize('blackish-bg-color').set(blackish_bg_color);
				wp.customize('secondary-color').set(secondary_color);
				wp.customize('header-height').set(header_height);
				wp.customize('sticky-header-height').set(sticky_header_height);
				wp.customize('logo-height').set(logo_height);
				wp.customize('header-bgcolor').set(header_bgcolor);
				wp.customize('main-menu-typography').set(main_menu_typography);
				wp.customize('main-menu-active-color').set(main_menu_active_color);
				wp.customize('main-menu-sticky-color').set(main_menu_sticky_color);
				wp.customize('main-menu-sticky-active-color').set(main_menu_sticky_active_color);
				wp.customize('header-search').set(true);
				wp.customize('wc-show-cart-icon').set(true);
				wp.customize('sticky-header').set(true);
				wp.customize('preheader-enable').set(true);
				wp.customize('preheader-left').set('<ul class="pbmit-contact-info"><li><i class="pbmit-base-icon-placeholder"></i>Los Angeles Gournadi, 1230 Bariasl</li><li><i class="pbmit-base-icon-mail-inbox"></i>noreply@pbminfotech.com</li><li><i class="pbmit-base-icon-phone-call"></i>+(123) 1234-567-8901</li></ul>');
				wp.customize('preheader-right').set('[pbmit-social-links]');
				wp.customize('header-btn-text').set(false);
				wp.customize('header-btn-url').set(false);
				wp.customize('header-btn2-text').set('Get a Quote');
				wp.customize('header-btn2-url').set('#');
				wp.customize('titlebar-height').set(titlebar_height);
				wp.customize('titlebar-bgcolor').set('f0f2f4');
				wp.customize('titlebar-heading-typography').set(titlebar_heading_typography);
				wp.customize('titlebar-subheading-typography').set(titlebar_subheading_typography);
				wp.customize('titlebar-breadcrumb-typography').set(titlebar_breadcrumb_typography);
				wp.customize('logo').set(logo);
				wp.customize('sticky-logo').set(logo);
			}	else if (value == '5') { // Header style 5
				wp.customize('global-color').set(global_color);
				wp.customize('light-bg-color').set(light_bg_color);
				wp.customize('blackish-bg-color').set(blackish_bg_color);
				wp.customize('secondary-color').set(secondary_color);
				wp.customize('header-height').set(header_height);
				wp.customize('sticky-header-height').set(sticky_header_height);
				wp.customize('logo-height').set(logo_height);
				wp.customize('header-bgcolor').set(header_bgcolor);
				wp.customize('main-menu-typography').set({
					'font-family'	: 'Quicksand',
					'variant'		: '700',
					'font-size'		: '14px',
					'line-height'	: '24px',
					'letter-spacing': '0.5px',
					'color'			: '#ffffff',
					'text-transform': 'uppercase',
					'font-backup'	: '',
					'font-style'	: 'normal',
				});
				wp.customize('main-menu-active-color').set(main_menu_active_color);
				wp.customize('main-menu-sticky-color').set(main_menu_sticky_color);
				wp.customize('main-menu-sticky-active-color').set(main_menu_sticky_active_color);
				wp.customize('header-search').set(true);
				wp.customize('wc-show-cart-icon').set(true);
				wp.customize('sticky-header').set(true);
				wp.customize('preheader-enable').set(preheader_enable);
				wp.customize('header-btn-text').set('+1(212)255-511');
				wp.customize('header-btn-url').set('tel:+1-(212)-255-511');
				wp.customize('header-btn2-text').set('Get a Quote');
				wp.customize('header-btn2-url').set('#');
				wp.customize('titlebar-height').set(titlebar_height);
				wp.customize('titlebar-bgcolor').set('f0f2f4');
				wp.customize('titlebar-heading-typography').set(titlebar_heading_typography);
				wp.customize('titlebar-subheading-typography').set(titlebar_subheading_typography);
				wp.customize('titlebar-breadcrumb-typography').set(titlebar_breadcrumb_typography);
				wp.customize('logo').set(logo_white);
				wp.customize('sticky-logo').set(logo);
			}	else if (value == '6') { // Header style 6
				wp.customize('global-color').set(global_color);
				wp.customize('light-bg-color').set(light_bg_color);
				wp.customize('blackish-bg-color').set(blackish_bg_color);
				wp.customize('secondary-color').set(secondary_color);
				wp.customize('header-height').set(header_height);
				wp.customize('sticky-header-height').set(sticky_header_height);
				wp.customize('logo-height').set(logo_height);
				wp.customize('header-bgcolor').set('white');
				wp.customize('main-menu-typography').set(main_menu_typography);
				wp.customize('main-menu-active-color').set(main_menu_active_color);
				wp.customize('main-menu-sticky-color').set(main_menu_sticky_color);
				wp.customize('main-menu-sticky-active-color').set(main_menu_sticky_active_color);
				wp.customize('header-search').set(true);
				wp.customize('wc-show-cart-icon').set(true);
				wp.customize('sticky-header').set(true);
				wp.customize('preheader-enable').set(preheader_enable);
				wp.customize('header-btn-text').set('+1(212)255-511');
				wp.customize('header-btn-url').set('tel:+1-(212)-255-511');
				wp.customize('header-btn2-text').set('Get a Quote');
				wp.customize('header-btn2-url').set('#');
				wp.customize('titlebar-height').set(titlebar_height);
				wp.customize('titlebar-bgcolor').set('f0f2f4');
				wp.customize('titlebar-heading-typography').set(titlebar_heading_typography);
				wp.customize('titlebar-subheading-typography').set(titlebar_subheading_typography);
				wp.customize('titlebar-breadcrumb-typography').set(titlebar_breadcrumb_typography);
				wp.customize('logo').set(logo);
				wp.customize('sticky-logo').set(logo);
			} 
		});
	});
    wp.customize(
		'footer-style',
		function(footer_style) {
			var global_color		= '#fba311';
			var secondary_color		= '#09042d';
			var light_bg_color		= '#f0f2f4';
			var white_color			= '#ffffff';
			var footer_bgcolor		= 'blackish';
			var footer_text_color	= 'white';
			var h3_typography		= {
				'font-family'			: 'Quicksand',
				'variant'				: '600',
				'font-size'				: '40px',
				'line-height'			: '50px',
				'letter-spacing'		: '0px',
				'color'					: '#ffffff',
				'text-transform'		: 'none',
				'font-backup'			: '',
				'font-style'			: 'normal',
			};
			var footer_column	= '3-3-3-3';
			var footer_widget_heading_typography	= {
                'font-family'			: 'Quicksand',
				'variant'				: '700',
				'font-size'				: '18px',
				'line-height'			: '26px',
				'letter-spacing'		: '0px',
				'color'					: '#ffffff',
				'text-transform'		: 'capitalize',
				'font-backup'			: '',
				'font-style'			: 'normal',
			};
			var footer_enable = true;

			footer_style.bind(function(value) {
				if (value == '1') { // Default footer style 1
					wp.customize('global-color').set(global_color);
					wp.customize('footer-bgcolor').set(footer_bgcolor);
					wp.customize('footer-background').set({
						'background-repeat'		: 'no-repeat',
						'background-position'	: 'left bottom',
						'background-size'		: 'auto',
						'background-attachment' : 'scroll',
						'background-image'		: '',
					});
					wp.customize('footer-text-color').set(footer_text_color);
					wp.customize('h3-typography').set(h3_typography);
					wp.customize('footer-enable').set(footer_enable);
					wp.customize('footer-column').set(footer_column);
					wp.customize('footer-widget-heading-typography').set(footer_widget_heading_typography);
					wp.customize('copyright-text').set('© 2024<a href="#">PBM Infotech</a>');
					wp.customize('footer-copyright-right-content').set('none');

				}   else if (value == '2') { // footer style 2
					wp.customize('global-color').set(global_color);
					wp.customize('footer-bgcolor').set(footer_bgcolor);
					wp.customize('footer-background').set({
						'background-repeat'		: 'no-repeat',
						'background-position'	: 'left bottom',
						'background-size'		: 'auto',
						'background-attachment' : 'scroll',
						'background-image'		: pbmit_admin_js_variables.theme_path + '/images/footer-bg-img.png',
					});
					wp.customize('footer-text-color').set(footer_text_color);
					wp.customize('h3-typography').set(h3_typography);
					wp.customize('footer-enable').set(footer_enable);
                    wp.customize('footer-column').set('custom');
					var $footer_1_col_width_ele = jQuery("select[data-id='footer-1-col-width']").select2();
					$footer_1_col_width_ele.val("34").trigger("change");
					var $footer_2_col_width_ele = jQuery("select[data-id='footer-2-col-width']").select2();
					$footer_2_col_width_ele.val("21").trigger("change");
					var $footer_3_col_width_ele = jQuery("select[data-id='footer-3-col-width']").select2();
					$footer_3_col_width_ele.val("22").trigger("change");
					var $footer_4_col_width_ele = jQuery("select[data-id='footer-4-col-width']").select2();
					$footer_4_col_width_ele.val("23").trigger("change");
					wp.customize('footer-widget-heading-typography').set(footer_widget_heading_typography);
					wp.customize('copyright-text').set('Copyright © 2024 <a href="#">PBM Infotech</a> All Rights Reserved.');
					wp.customize('footer-copyright-right-content').set('none');
				}
			});
		}
	);
}); // window.load