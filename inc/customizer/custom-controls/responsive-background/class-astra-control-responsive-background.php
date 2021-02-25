<?php
/**
 * Customizer Control: color.
 *
 * Creates a jQuery color control.
 *
 * @package     Astra
 * @author      Astra
 * @copyright   Copyright (c) 2020, Astra
 * @link        https://wpastra.com/
 * @since       1.4.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Field overrides.
 */
if ( ! class_exists( 'Astra_Control_Responsive_Background' ) && class_exists( 'WP_Customize_Control' ) ) :

	/**
	 * Color control (alpha).
	 */
	class Astra_Control_Responsive_Background extends WP_Customize_Control {

		/**
		 * The control type.
		 *
		 * @access public
		 * @var string
		 */
		public $type = 'ast-responsive-background';

		/**
		 * The responsive type.
		 *
		 * @access public
		 * @var string
		 */
		public $responsive = true;

		/**
		 * The control type.
		 *
		 * @access public
		 * @var string
		 */
		public $suffix = '';

		/**
		 * Refresh the parameters passed to the JavaScript via JSON.
		 *
		 * @see WP_Customize_Control::to_json()
		 */
		public function to_json() {
			parent::to_json();

			$this->json['default'] = $this->setting->default;
			if ( isset( $this->default ) ) {
				$this->json['default'] = $this->default;
			}

			$this->json['value']  = $this->value();
			$this->json['link']   = $this->get_link();
			$this->json['id']     = $this->id;
			$this->json['label']  = esc_html( $this->label );
			$this->json['suffix'] = $this->suffix;

			$this->json['inputAttrs'] = '';
			foreach ( $this->input_attrs as $attr => $value ) {
				$this->json['inputAttrs'] .= $attr . '="' . esc_attr( $value ) . '" ';
			}
		}

		/**
		 * Render the control's content.
		 *
		 * @see WP_Customize_Control::render_content()
		 */
		protected function render_content() {}
	}

endif;
