"use strict";
jQuery( window ).on('load',function() {
	elementor.hooks.addAction( 'panel/open_editor/section', function( panel, model, view ) {
		jQuery(document).on('change', 'input[data-setting="pbmit-extended-column"], input[data-setting="pbmit-strech-content-left"], input[data-setting="pbmit-strech-content-right"], select[data-setting="background_position"], select[data-setting="background_attachment"], select[data-setting="background_repeat"], select[data-setting="background_size"]' , function(e){
			setTimeout(function(){
				jQuery('#elementor-preview-iframe')[0].contentWindow.pbmit_rearrange_stretched_col( model.id );
			}, 200);
		});
	});
	// image element custom size. Missing "width" and "height" attributes
	elementorFrontend.hooks.addAction( 'frontend/element_ready/image.default', function( $scope ) {
		var image_ele = jQuery( '.elementor-widget-container img', $scope);
		var ele_width	= jQuery(image_ele).attr("width");
		var ele_height	= jQuery(image_ele).attr("height");
		var ele_url		= jQuery(image_ele).attr("src");
		if ( ( typeof ele_width === 'undefined' || ele_width === false ) || ( typeof ele_height === 'undefined' || ele_height === false ) ) {
			jQuery("<img/>").attr('src', ele_url).on('load', function() {
				jQuery(image_ele).attr( 'width', this.width );
				jQuery(image_ele).attr( 'height', this.height );
			});
		}
	} );
	elementor.hooks.addAction( 'panel/open_editor/column', function( panel, model, view ) {
		setTimeout(function(){
			jQuery('.elementor-component-tab > a').on('click',function(){
				setTimeout(function(){
					jQuery(document).on('change','input[data-setting="pbmit-extended-column"], input[data-setting="pbmit-strech-content-left"], input[data-setting="pbmit-strech-content-right"], select[data-setting="background_position"], select[data-setting="background_attachment"], select[data-setting="background_repeat"], select[data-setting="background_size"], input[type=radio]', function(e){
						setTimeout(function(){
							jQuery('#elementor-preview-iframe')[0].contentWindow.pbmit_rearrange_stretched_col( model.id );
						}, 200);
					});
					jQuery('label[for="elementor-control-classic"]').on('click', function(){
						jQuery('#elementor-preview-iframe')[0].contentWindow.pbmit_rearrange_stretched_col( model.id );
					});
				}, 500);
			})
		 }, 500);
	});
	elementor.hooks.addAction( 'panel/open_editor/widget', function( panel, model, view ) {
		if ( 'widget' == model.attributes.widgetType ) {
			return;
		} else {
			panel.$el.closest( '#elementor-panel-inner' ).removeClass('pbmit-hide-style-tab');
		}
	});
	elementor.hooks.addAction( 'panel/open_editor/widget/button', function( panel, model, view ) {
		jQuery('#elementor-panel-content-wrapper').on( 'click', function() {
			var $style = panel.$el.find( 'select[data-setting="pbmit-btn-style"]' );
			if( jQuery($style).length > 0 ){
				var $styleTab = panel.$el.closest( '#elementor-panel-inner' );
				jQuery($styleTab).removeClass('pbmit-hide-style-tab');
				if( jQuery($style).val() == 'default' || jQuery($style).val() == '' ){
					jQuery($styleTab).removeClass('pbmit-hide-style-tab');
				} else {
					jQuery($styleTab).addClass('pbmit-hide-style-tab');
				}
				jQuery($style).on( 'change' , function(){
					if( jQuery($style).val() == 'default' || jQuery($style).val() == '' ){
						jQuery($styleTab).removeClass('pbmit-hide-style-tab');
					} else {
						jQuery($styleTab).addClass('pbmit-hide-style-tab');
					}
				});
			}
		});
		setTimeout(function(){
			var $style = panel.$el.find( 'select[data-setting="pbmit-btn-style"]' );
			if( jQuery($style).length > 0 ){
				var $styleTab = panel.$el.closest( '#elementor-panel-inner' );
				jQuery($styleTab).removeClass('pbmit-hide-style-tab');
				if( jQuery($style).val() == 'default' || jQuery($style).val() == '' ){
					jQuery($styleTab).removeClass('pbmit-hide-style-tab');
				} else {
					jQuery($styleTab).addClass('pbmit-hide-style-tab');
				}
				jQuery($style).on( 'change' , function(){
					if( jQuery($style).val() == 'default' || jQuery($style).val() == '' ){
						jQuery($styleTab).removeClass('pbmit-hide-style-tab');
					} else {
						jQuery($styleTab).addClass('pbmit-hide-style-tab');
					}
				});
			}
		}, 50 );
	});
});
