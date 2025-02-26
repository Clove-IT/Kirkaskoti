<?php
/**
 * Customizer Control: kirki-select.
 *
 * @package	 Kirki
 * @subpackage  Controls
 * @copyright   Copyright (c) 2020, David Vongries
 * @license	 https://opensource.org/licenses/MIT
 * @since	   1.0
 */
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
/**
 * Select control.
 */
class Kirki_Control_Select extends Kirki_Control_Base {
	/**
	 * The control type.
	 *
	 * @access public
	 * @var string
	 */
	public $type = 'kirki-select';
	/**
	 * Placeholder text.
	 *
	 * @access public
	 * @since 3.0.21
	 * @var string|false
	 */
	public $placeholder = false;
	/**
	 * Maximum number of options the user will be able to select.
	 * Set to 1 for single-select.
	 *
	 * @access public
	 * @var int
	 */
	public $multiple = 1;
	/**
	 * Refresh the parameters passed to the JavaScript via JSON.
	 *
	 * @see WP_Customize_Control::to_json()
	 */
	public function to_json() {
		parent::to_json();
		$this->json['multiple']	= $this->multiple;
		$this->json['placeholder'] = $this->placeholder;
	}
}
