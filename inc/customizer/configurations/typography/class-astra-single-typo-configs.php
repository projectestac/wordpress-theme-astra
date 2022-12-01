<?php
/**
 * Styling Options for Astra Theme.
 *
 * @package     Astra
 * @author      Astra
 * @copyright   Copyright (c) 2020, Astra
 * @link        https://wpastra.com/
 * @since       Astra 1.0.15
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Astra_Single_Typo_Configs' ) ) {

	/**
	 * Customizer Single Typography Configurations.
	 *
	 * @since 1.4.3
	 */
	class Astra_Single_Typo_Configs extends Astra_Customizer_Config_Base {

		/**
		 * Register Single Typography configurations.
		 *
		 * @param Array                $configurations Astra Customizer Configurations.
		 * @param WP_Customize_Manager $wp_customize instance of WP_Customize_Manager.
		 * @since 1.4.3
		 * @return Array Astra Customizer Configurations with updated configurations.
		 */
		public function register_configuration( $configurations, $wp_customize ) {

			$_configs = array();

			// Learn More link if Astra Pro is not activated.
			if ( astra_showcase_upgrade_notices() ) {

				$_configs = array(

					/**
					 * Option: Astra Pro blog single post's options.
					 */
					array(
						'name'     => ASTRA_THEME_SETTINGS . '[ast-single-post-items]',
						'type'     => 'control',
						'control'  => 'ast-upgrade',
						'renderAs' => 'list',
						'choices'  => array(
							'one'   => array(
								'title' => __( 'Author info', 'astra' ),
							),
							'two'   => array(
								'title' => __( 'Auto load previous posts', 'astra' ),
							),
							'three' => array(
								'title' => __( 'Single post navigation control', 'astra' ),
							),
							'four'  => array(
								'title' => __( 'Custom featured images size', 'astra' ),
							),
							'seven' => array(
								'title' => __( 'Single post read time', 'astra' ),
							),
							'five'  => array(
								'title' => __( 'Extended typography options', 'astra' ),
							),
							'six'   => array(
								'title' => __( 'Extended spacing options', 'astra' ),
							),
						),
						'section'  => 'section-blog-single',
						'default'  => '',
						'priority' => 999,
						'context'  => array(),
						'title'    => __( 'Extensive range of tools to help blog pages stand out', 'astra' ),
						'divider'  => array( 'ast_class' => 'ast-top-section-divider' ),
					),
				);
			}

			if ( defined( 'ASTRA_EXT_VER' ) && Astra_Ext_Extension::is_active( 'typography' ) ) {

				$new_configs = array(

					array(
						'name'      => ASTRA_THEME_SETTINGS . '[blog-single-title-typo]',
						'type'      => 'control',
						'priority'  => Astra_Builder_Helper::$is_header_footer_builder_active ?
						13 : 20,
						'control'   => 'ast-settings-group',
						'title'     => __( 'Title Font', 'astra' ),
						'section'   => 'section-blog-single',
						'transport' => 'postMessage',
						'context'   => Astra_Builder_Helper::$is_header_footer_builder_active ?
							Astra_Builder_Helper::$design_tab : Astra_Builder_Helper::$general_tab,
					),

					/**
					 * Option: Single Post / Page Title Font Size
					 */

					array(
						'name'              => 'font-size-entry-title',
						'parent'            => ASTRA_THEME_SETTINGS . '[blog-single-title-typo]',
						'type'              => 'sub-control',
						'control'           => 'ast-responsive-slider',
						'sanitize_callback' => array( 'Astra_Customizer_Sanitizes', 'sanitize_responsive_slider' ),
						'section'           => 'section-blog-single',
						'transport'         => 'postMessage',
						'title'             => __( 'Size', 'astra' ),
						'priority'          => 8,
						'default'           => astra_get_option( 'font-size-entry-title' ),
						'suffix'            => array( 'px', 'em' ),
						'input_attrs'       => array(
							'px' => array(
								'min'  => 0,
								'step' => 1,
								'max'  => 100,
							),
							'em' => array(
								'min'  => 0,
								'step' => 0.01,
								'max'  => 20,
							),
						),
					),
				);
			} else {

				$new_configs = array();

				/**
				 * Option: Single Post / Page Title Font Size
				 */

				$new_configs[] = array(
					'name'              => ASTRA_THEME_SETTINGS . '[font-size-entry-title]',
					'type'              => 'control',
					'control'           => 'ast-responsive-slider',
					'sanitize_callback' => array( 'Astra_Customizer_Sanitizes', 'sanitize_responsive_slider' ),
					'section'           => 'section-blog-single',
					'transport'         => 'postMessage',
					'title'             => __( 'Post / Page Title Font', 'astra' ),
					'priority'          => 13,
					'default'           => astra_get_option( 'font-size-entry-title' ),
					'suffix'            => array( 'px', 'em' ),
					'input_attrs'       => array(
						'px' => array(
							'min'  => 0,
							'step' => 1,
							'max'  => 100,
						),
						'em' => array(
							'min'  => 0,
							'step' => 0.01,
							'max'  => 20,
						),
					),
					'context'           => ( true === Astra_Builder_Helper::$is_header_footer_builder_active ) ?
					Astra_Builder_Helper::$design_tab : Astra_Builder_Helper::$general_tab,
					'divider'           => array( 'ast_class' => 'ast-section-spacing' ),
				);
			}

			$_configs = array_merge( $_configs, $new_configs );

			$configurations = array_merge( $configurations, $_configs );

			return $configurations;
		}
	}
}

new Astra_Single_Typo_Configs();
