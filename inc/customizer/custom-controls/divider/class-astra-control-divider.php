<?php
/**
 * Customizer Control: divider
 *
 * @package     Astra
 * @author      Astra
 * @copyright   Copyright (c) 2020, Astra
 * @link        https://wpastra.com/
 * @since       1.0.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * A text control with validation for CSS units.
 */
class Astra_Control_Divider extends WP_Customize_Control {

	/**
	 * The control type.
	 *
	 * @access public
	 * @var string
	 */
	public $type = 'ast-divider';

	/**
	 * The control type.
	 *
	 * @access public
	 * @var string
	 */
	public $caption = '';

	/**
	 * The control type.
	 *
	 * @access public
	 * @var string
	 */
	public $separator = true;

	/**
	 * Refresh the parameters passed to the JavaScript via JSON.
	 *
	 * @see WP_Customize_Control::to_json()
	 */
	public function to_json() {
		parent::to_json();
		$this->json['label']       = esc_html( $this->label );
		$this->json['caption']     = $this->caption;
		$this->json['description'] = $this->description;
		$this->json['separator']   = $this->separator;
	}

	/**
	 * Render the control's content.
	 *
	 * @see WP_Customize_Control::render_content()
	 */
	protected function render_content() {}

}
