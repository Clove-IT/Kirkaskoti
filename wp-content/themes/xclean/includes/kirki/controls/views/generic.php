<?php
/**
 * Customizer controls underscore.js template.
 *
 * @package	 Kirki
 * @subpackage  Controls
 * @copyright   Copyright (c) 2020, David Vongries
 * @license	 https://opensource.org/licenses/MIT
 * @since	   3.0.17
 */
?>
<#
element = ( data.choices.element ) ? data.choices.element : 'input';
data = _.defaults( data, {
	label: '',
	description: '',
	inputAttrs: '',
	value: '',
	'data-id': '',
	choices: {}
} );
#>
<div class="kirki-input-container" data-id="{{ data.id }}">
	<label>
		<# if ( data.label ) { #>
			<span class="customize-control-title">{{{ data.label }}}</span>
		<# } #>
		<# if ( data.description ) { #>
			<span class="description customize-control-description">{{{ data.description }}}</span>
		<# } #>
		<div class="customize-control-content">
			<{{ element }}
				data-id="{{ data['data-id'] }}"
				{{{ data.inputAttrs }}}
				value="{{ data.value }}"
				<# _.each( data.choices, function( val, key ) { #>
					{{ key }}="{{ val }}"
				<# } ); #>
			<# if ( data.choices.content ) { #>>{{{ data.choices.content }}}</{{ element }}><# } else { #>/><# } #>
		</div>
	</label>
</div>
