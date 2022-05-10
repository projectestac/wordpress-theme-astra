<?php
/**
 * WordPress Block Editor CSS
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package     Astra
 * @author      Astra
 * @copyright   Copyright (c) 2022, Astra
 * @link        http://wpastra.com/
 * @since       Astra 3.8.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * New modern WP-Block editor experience.
 */
class Astra_WP_Editor_CSS {

	/**
	 * Get dynamic CSS  required for the block editor to make editing experience similar to how it looks on frontend.
	 *
	 * @return String CSS to be loaded in the editor interface.
	 */
	public static function get_css() {

		$post_id     = astra_get_post_id();
		$is_site_rtl = is_rtl();

		$site_content_width          = astra_get_option( 'site-content-width', 1200 );
		$headings_font_family        = astra_get_option( 'headings-font-family' );
		$headings_font_weight        = astra_get_option( 'headings-font-weight' );
		$headings_text_transform     = astra_get_option( 'headings-text-transform' );
		$headings_line_height        = astra_get_option( 'headings-line-height' );
		$single_post_title_font_size = astra_get_option( 'font-size-entry-title' );
		$body_font_family            = astra_body_font_family();
		$para_margin_bottom          = astra_get_option( 'para-margin-bottom', '1.6' );
		$theme_color                 = astra_get_option( 'theme-color' );
		$heading_base_color          = astra_get_option( 'heading-base-color' );

		$highlight_theme_color = astra_get_foreground_color( $theme_color );

		$body_font_weight    = astra_get_option( 'body-font-weight' );
		$body_font_size      = astra_get_option( 'font-size-body' );
		$body_line_height    = astra_get_option( 'body-line-height' );
		$body_text_transform = astra_get_option( 'body-text-transform' );
		$text_color          = astra_get_option( 'text-color' );

		$heading_h1_font_size = astra_get_option( 'font-size-h1' );
		$heading_h2_font_size = astra_get_option( 'font-size-h2' );
		$heading_h3_font_size = astra_get_option( 'font-size-h3' );
		$heading_h4_font_size = astra_get_option( 'font-size-h4' );
		$heading_h5_font_size = astra_get_option( 'font-size-h5' );
		$heading_h6_font_size = astra_get_option( 'font-size-h6' );

		$link_color   = astra_get_option( 'link-color', $theme_color );
		$link_h_color = astra_get_option( 'link-h-color' );

		/**
		 * Button theme compatibility.
		 */
		$btn_color                = astra_get_option( 'button-color' );
		$btn_bg_color             = astra_get_option( 'button-bg-color', '', $theme_color );
		$btn_h_color              = astra_get_option( 'button-h-color' );
		$btn_bg_h_color           = astra_get_option( 'button-bg-h-color', '', $link_h_color );
		$btn_border_radius        = astra_get_option( 'button-radius' );
		$theme_btn_padding        = astra_get_option( 'theme-button-padding' );
		$btn_border_size          = astra_get_option( 'theme-button-border-group-border-size' );
		$btn_border_color         = astra_get_option( 'theme-button-border-group-border-color' );
		$btn_border_h_color       = astra_get_option( 'theme-button-border-group-border-h-color' );
		$theme_btn_font_family    = astra_get_option( 'font-family-button' );
		$theme_btn_font_size      = astra_get_option( 'font-size-button' );
		$theme_btn_font_weight    = astra_get_option( 'font-weight-button' );
		$theme_btn_text_transform = astra_get_option( 'text-transform-button' );
		$theme_btn_line_height    = astra_get_option( 'theme-btn-line-height' );
		$theme_btn_letter_spacing = astra_get_option( 'theme-btn-letter-spacing' );
		$theme_btn_top_border     = ( isset( $btn_border_size['top'] ) && ( '' !== $btn_border_size['top'] && '0' !== $btn_border_size['top'] ) ) ? astra_get_css_value( $btn_border_size['top'], 'px' ) : '';
		$theme_btn_right_border   = ( isset( $btn_border_size['right'] ) && ( '' !== $btn_border_size['right'] && '0' !== $btn_border_size['right'] ) ) ? astra_get_css_value( $btn_border_size['right'], 'px' ) : '';
		$theme_btn_left_border    = ( isset( $btn_border_size['left'] ) && ( '' !== $btn_border_size['left'] && '0' !== $btn_border_size['left'] ) ) ? astra_get_css_value( $btn_border_size['left'], 'px' ) : '';
		$theme_btn_bottom_border  = ( isset( $btn_border_size['bottom'] ) && ( '' !== $btn_border_size['bottom'] && '0' !== $btn_border_size['bottom'] ) ) ? astra_get_css_value( $btn_border_size['bottom'], 'px' ) : '';

		/**
		 * Headings typography.
		 */
		$h1_font_family    = astra_get_option( 'font-family-h1' );
		$h1_font_weight    = astra_get_option( 'font-weight-h1' );
		$h1_line_height    = astra_get_option( 'line-height-h1' );
		$h1_text_transform = astra_get_option( 'text-transform-h1' );

		$h2_font_family    = astra_get_option( 'font-family-h2' );
		$h2_font_weight    = astra_get_option( 'font-weight-h2' );
		$h2_line_height    = astra_get_option( 'line-height-h2' );
		$h2_text_transform = astra_get_option( 'text-transform-h2' );

		$h3_font_family    = astra_get_option( 'font-family-h3' );
		$h3_font_weight    = astra_get_option( 'font-weight-h3' );
		$h3_line_height    = astra_get_option( 'line-height-h3' );
		$h3_text_transform = astra_get_option( 'text-transform-h3' );

		$h4_font_family    = astra_get_option( 'font-family-h4' );
		$h4_font_weight    = astra_get_option( 'font-weight-h4' );
		$h4_line_height    = astra_get_option( 'line-height-h4' );
		$h4_text_transform = astra_get_option( 'text-transform-h4' );

		$h5_font_family    = astra_get_option( 'font-family-h5' );
		$h5_font_weight    = astra_get_option( 'font-weight-h5' );
		$h5_line_height    = astra_get_option( 'line-height-h5' );
		$h5_text_transform = astra_get_option( 'text-transform-h5' );

		$h6_font_family    = astra_get_option( 'font-family-h6' );
		$h6_font_weight    = astra_get_option( 'font-weight-h6' );
		$h6_line_height    = astra_get_option( 'line-height-h6' );
		$h6_text_transform = astra_get_option( 'text-transform-h6' );

		// Fallback for H1 - headings typography.
		if ( 'inherit' === $h1_font_family ) {
			$h1_font_family = $headings_font_family;
		}
		if ( 'inherit' === $h1_font_weight && 'inherit' === $headings_font_weight ) {
			$h1_font_weight = 'normal';
		}
		if ( '' == $h1_text_transform ) {
			$h1_text_transform = $headings_text_transform;
		}
		if ( '' == $h1_line_height ) {
			$h1_line_height = $headings_line_height;
		}

		// Fallback for H2 - headings typography.
		if ( 'inherit' === $h2_font_family ) {
			$h2_font_family = $headings_font_family;
		}
		if ( 'inherit' === $h2_font_weight && 'inherit' === $headings_font_weight ) {
			$h2_font_weight = 'normal';
		}
		if ( '' == $h2_text_transform ) {
			$h2_text_transform = $headings_text_transform;
		}
		if ( '' == $h2_line_height ) {
			$h2_line_height = $headings_line_height;
		}

		// Fallback for H3 - headings typography.
		if ( 'inherit' === $h3_font_family ) {
			$h3_font_family = $headings_font_family;
		}
		if ( 'inherit' === $h3_font_weight && 'inherit' === $headings_font_weight ) {
			$h3_font_weight = 'normal';
		}
		if ( '' == $h3_text_transform ) {
			$h3_text_transform = $headings_text_transform;
		}
		if ( '' == $h3_line_height ) {
			$h3_line_height = $headings_line_height;
		}

		// Fallback for H4 - headings typography.
		if ( 'inherit' === $h4_font_family ) {
			$h4_font_family = $headings_font_family;
		}
		if ( 'inherit' === $h4_font_weight && 'inherit' === $headings_font_weight ) {
			$h4_font_weight = 'normal';
		}
		if ( '' == $h4_text_transform ) {
			$h4_text_transform = $headings_text_transform;
		}
		if ( '' == $h4_line_height ) {
			$h4_line_height = $headings_line_height;
		}

		// Fallback for H5 - headings typography.
		if ( 'inherit' === $h5_font_family ) {
			$h5_font_family = $headings_font_family;
		}
		if ( 'inherit' === $h5_font_weight && 'inherit' === $headings_font_weight ) {
			$h5_font_weight = 'normal';
		}
		if ( '' == $h5_text_transform ) {
			$h5_text_transform = $headings_text_transform;
		}
		if ( '' == $h5_line_height ) {
			$h5_line_height = $headings_line_height;
		}

		// Fallback for H6 - headings typography.
		if ( 'inherit' === $h6_font_family ) {
			$h6_font_family = $headings_font_family;
		}
		if ( 'inherit' === $h6_font_weight && 'inherit' === $headings_font_weight ) {
			$h6_font_weight = 'normal';
		}
		if ( '' == $h6_text_transform ) {
			$h6_text_transform = $headings_text_transform;
		}
		if ( '' == $h6_line_height ) {
			$h6_line_height = $headings_line_height;
		}

		// Fallback for button settings.
		if ( empty( $btn_color ) ) {
			$btn_color = astra_get_foreground_color( $theme_color );
		}
		if ( empty( $btn_h_color ) ) {
			$btn_h_color = astra_get_foreground_color( $link_h_color );
		}

		if ( is_array( $body_font_size ) ) {
			$body_font_size_desktop = ( isset( $body_font_size['desktop'] ) && '' != $body_font_size['desktop'] ) ? $body_font_size['desktop'] : 15;
		} else {
			$body_font_size_desktop = ( '' != $body_font_size ) ? $body_font_size : 15;
		}

		$site_background    = astra_get_option( 'site-layout-outside-bg-obj-responsive' );
		$content_background = astra_get_option( 'content-bg-obj-responsive' );

		$background_style_data = astra_get_responsive_background_obj( $site_background, 'desktop' );
		if (
			empty( $background_style_data ) ||
			(
				( empty( $background_style_data['background-color'] ) || ';' === $background_style_data['background-color'] ) &&
				( empty( $background_style_data['background-image'] ) && 'none;' === $background_style_data['background-image'] )
			)
		) {
			$background_style_data = array(
				'background-color' => '#f5f5f5',
			);
		}

		// check the selection color in-case of empty/no theme color.
		$selection_text_color = ( 'transparent' === $highlight_theme_color ) ? '' : $highlight_theme_color;

		$ast_content_width = apply_filters( 'astra_block_content_width', '910px' );
		$ast_wide_width    = apply_filters( 'astra_block_wide_width', astra_get_option( 'site-content-width', 1200 ) . 'px' );

		$blocks_spacings = astra_get_option( 'wp-blocks-global-padding' );

		$css = ':root, body .editor-styles-wrapper {
			--wp--custom--ast-content-width-size: ' . $ast_content_width . ';
			--wp--custom--ast-wide-width-size: ' . $ast_wide_width . ';
			--wp--custom--ast-default-block-top-padding: ' . astra_responsive_spacing( $blocks_spacings, 'top', 'desktop' ) . ';
			--wp--custom--ast-default-block-right-padding: ' . astra_responsive_spacing( $blocks_spacings, 'right', 'desktop' ) . ';
			--wp--custom--ast-default-block-bottom-padding: ' . astra_responsive_spacing( $blocks_spacings, 'bottom', 'desktop' ) . ';
			--wp--custom--ast-default-block-left-padding: ' . astra_responsive_spacing( $blocks_spacings, 'left', 'desktop' ) . ';
		}';

		/** @psalm-suppress InvalidScalarArgument */ // phpcs:ignore Generic.Commenting.DocComment.MissingShort
		$html_font_size = astra_get_font_css_value( (int) $body_font_size_desktop * 6.25, '%' );
		/** @psalm-suppress InvalidScalarArgument */ // phpcs:ignore Generic.Commenting.DocComment.MissingShort

		$desktop_css = array(
			':root'                            => Astra_Global_Palette::generate_global_palette_style(),
			'html'                             => array(
				'font-size' => $html_font_size,
			),
			'.editor-styles-wrapper .block-editor-block-list__layout.is-root-container > p, .editor-styles-wrapper .block-editor-block-list__layout.is-root-container .block-list-appender' => array(
				'max-width' => 'var(--wp--custom--ast-wide-width-size)',
				'margin'    => '0 auto',
			),
			'.editor-styles-wrapper a'         => array(
				'color' => esc_attr( $link_color ),
			),
			'.block-editor-block-list__block'  => array(
				'color' => esc_attr( $text_color ),
			),
			'.block-editor-block-list__layout.is-root-container > .wp-block-group, .block-editor-block-list__layout.is-root-container > [data-align="wide"] > .wp-block-group, .block-editor-block-list__layout.is-root-container > [data-align="full"] > .wp-block-group, .block-editor-block-list__layout.is-root-container > .wp-block-cover, .block-editor-block-list__layout.is-root-container > [data-align="wide"] > .wp-block-cover, .block-editor-block-list__layout.is-root-container > [data-align="full"] > .wp-block-cover, .block-editor-block-list__layout.is-root-container > .wp-block-columns, .block-editor-block-list__layout.is-root-container > [data-align="wide"] > .wp-block-columns, .block-editor-block-list__layout.is-root-container > [data-align="full"] > .wp-block-columns' => array(
				'padding-top'    => 'var(--wp--custom--ast-default-block-top-padding)',
				'padding-right'  => 'var(--wp--custom--ast-default-block-right-padding)',
				'padding-bottom' => 'var(--wp--custom--ast-default-block-bottom-padding)',
				'padding-left'   => 'var(--wp--custom--ast-default-block-left-padding)',
			),
			// Global selection CSS.
			'.block-editor-block-list__layout .block-editor-block-list__block ::selection,.block-editor-block-list__layout .block-editor-block-list__block.is-multi-selected .editor-block-list__block-edit:before' => array(
				'background-color' => esc_attr( $theme_color ),
			),
			'.block-editor-block-list__layout .block-editor-block-list__block ::selection, .block-editor-block-list__layout .block-editor-block-list__block.is-multi-selected .editor-block-list__block-edit' => array(
				'color' => esc_attr( $selection_text_color ),
			),

			'#editor .edit-post-visual-editor' => $background_style_data,
			'.edit-post-visual-editor .editor-styles-wrapper' => astra_get_responsive_background_obj( $content_background, 'desktop' ),

			'.editor-styles-wrapper'           => array(
				'font-family'    => astra_get_font_family( $body_font_family ),
				'font-weight'    => esc_attr( $body_font_weight ),
				'font-size'      => astra_responsive_font( $body_font_size, 'desktop' ),
				'line-height'    => esc_attr( $body_line_height ),
				'text-transform' => esc_attr( $body_text_transform ),
			),
			'.editor-styles-wrapper .editor-post-title__input' => array(
				'font-size' => astra_responsive_font( $single_post_title_font_size, 'desktop', '30' ),
			),
			'.editor-styles-wrapper h1, .editor-styles-wrapper h2, .editor-styles-wrapper h3, .editor-styles-wrapper h4, .editor-styles-wrapper h5, .editor-styles-wrapper h6' => array(
				'font-family'    => astra_get_css_value( $headings_font_family, 'font' ),
				'font-weight'    => astra_get_css_value( $headings_font_weight, 'font' ),
				'text-transform' => esc_attr( $headings_text_transform ),
				'line-height'    => esc_attr( $headings_line_height ),
				'color'          => esc_attr( $heading_base_color ),
			),
			'.editor-styles-wrapper .wp-block-latest-posts > li > a' => array(
				'text-decoration' => 'none',
				'color'           => esc_attr( $heading_base_color ),
			),

			// Headings H1 - H6 typography.
			'.editor-styles-wrapper h1'        => array(
				'font-size'      => astra_responsive_font( $heading_h1_font_size, 'desktop' ),
				'font-family'    => astra_get_css_value( $h1_font_family, 'font' ),
				'font-weight'    => astra_get_css_value( $h1_font_weight, 'font' ),
				'line-height'    => esc_attr( $h1_line_height ),
				'text-transform' => esc_attr( $h1_text_transform ),
			),
			'.editor-styles-wrapper h2'        => array(
				'font-size'      => astra_responsive_font( $heading_h2_font_size, 'desktop' ),
				'font-family'    => astra_get_css_value( $h2_font_family, 'font' ),
				'font-weight'    => astra_get_css_value( $h2_font_weight, 'font' ),
				'line-height'    => esc_attr( $h2_line_height ),
				'text-transform' => esc_attr( $h2_text_transform ),
			),
			'.editor-styles-wrapper h3'        => array(
				'font-size'      => astra_responsive_font( $heading_h3_font_size, 'desktop' ),
				'font-family'    => astra_get_css_value( $h3_font_family, 'font' ),
				'font-weight'    => astra_get_css_value( $h3_font_weight, 'font' ),
				'line-height'    => esc_attr( $h3_line_height ),
				'text-transform' => esc_attr( $h3_text_transform ),
			),
			'.editor-styles-wrapper h4'        => array(
				'font-size'      => astra_responsive_font( $heading_h4_font_size, 'desktop' ),
				'font-family'    => astra_get_css_value( $h4_font_family, 'font' ),
				'font-weight'    => astra_get_css_value( $h4_font_weight, 'font' ),
				'line-height'    => esc_attr( $h4_line_height ),
				'text-transform' => esc_attr( $h4_text_transform ),
			),
			'.editor-styles-wrapper h5'        => array(
				'font-size'      => astra_responsive_font( $heading_h5_font_size, 'desktop' ),
				'font-family'    => astra_get_css_value( $h5_font_family, 'font' ),
				'font-weight'    => astra_get_css_value( $h5_font_weight, 'font' ),
				'line-height'    => esc_attr( $h5_line_height ),
				'text-transform' => esc_attr( $h5_text_transform ),
			),
			'.editor-styles-wrapper h6'        => array(
				'font-size'      => astra_responsive_font( $heading_h6_font_size, 'desktop' ),
				'font-family'    => astra_get_css_value( $h6_font_family, 'font' ),
				'font-weight'    => astra_get_css_value( $h6_font_weight, 'font' ),
				'line-height'    => esc_attr( $h6_line_height ),
				'text-transform' => esc_attr( $h6_text_transform ),
			),

			// Gutenberg button compatibility for default styling.
			'.wp-block-button .wp-block-button__link, .block-editor-writing-flow .wp-block-search .wp-block-search__inside-wrapper .wp-block-search__button, .block-editor-writing-flow .wp-block-file .wp-block-file__button' => array(
				'border-style'        => ( $theme_btn_top_border || $theme_btn_right_border || $theme_btn_left_border || $theme_btn_bottom_border ) ? 'solid' : '',
				'border-top-width'    => $theme_btn_top_border,
				'border-right-width'  => $theme_btn_right_border,
				'border-left-width'   => $theme_btn_left_border,
				'border-bottom-width' => $theme_btn_bottom_border,
				'color'               => esc_attr( $btn_color ),
				'border-color'        => empty( $btn_border_color ) ? esc_attr( $btn_bg_color ) : esc_attr( $btn_border_color ),
				'background-color'    => esc_attr( $btn_bg_color ),
				'font-family'         => astra_get_font_family( $theme_btn_font_family ),
				'font-weight'         => esc_attr( $theme_btn_font_weight ),
				'line-height'         => esc_attr( $theme_btn_line_height ),
				'text-transform'      => esc_attr( $theme_btn_text_transform ),
				'letter-spacing'      => astra_get_css_value( $theme_btn_letter_spacing, 'px' ),
				'font-size'           => astra_responsive_font( $theme_btn_font_size, 'desktop' ),
				'border-radius'       => astra_get_css_value( $btn_border_radius, 'px' ),
				'padding-top'         => astra_responsive_spacing( $theme_btn_padding, 'top', 'desktop' ),
				'padding-right'       => astra_responsive_spacing( $theme_btn_padding, 'right', 'desktop' ),
				'padding-bottom'      => astra_responsive_spacing( $theme_btn_padding, 'bottom', 'desktop' ),
				'padding-left'        => astra_responsive_spacing( $theme_btn_padding, 'left', 'desktop' ),
			),
			'.wp-block-button .wp-block-button__link:hover, .wp-block-button .wp-block-button__link:focus, .block-editor-writing-flow .wp-block-search .wp-block-search__inside-wrapper .wp-block-search__button:hover, .block-editor-writing-flow .wp-block-search .wp-block-search__inside-wrapper .wp-block-search__button:focus, .block-editor-writing-flow .wp-block-file .wp-block-file__button:hover, .block-editor-writing-flow .wp-block-file .wp-block-file__button:focus' => array(
				'color'            => esc_attr( $btn_h_color ),
				'background-color' => esc_attr( $btn_bg_h_color ),
				'border-color'     => empty( $btn_border_h_color ) ? esc_attr( $btn_bg_h_color ) : esc_attr( $btn_border_h_color ),
			),
		);

		$content_links_underline = astra_get_option( 'underline-content-links' );

		if ( $content_links_underline ) {
			$desktop_css['.edit-post-visual-editor a'] = array(
				'text-decoration' => 'underline',
			);

			$reset_underline_from_anchors = Astra_Dynamic_CSS::unset_builder_elements_underline();

			$excluding_anchor_selectors = $reset_underline_from_anchors ? '.edit-post-visual-editor a.uagb-tabs-list, .edit-post-visual-editor .uagb-ifb-cta a, .edit-post-visual-editor a.uagb-marketing-btn__link, .edit-post-visual-editor .uagb-post-grid a, .edit-post-visual-editor .uagb-toc__wrap a, .edit-post-visual-editor .uagb-taxomony-box a, .edit-post-visual-editor .uagb_review_block a' : '';

			$desktop_css[ $excluding_anchor_selectors ] = array(
				'text-decoration' => 'none',
			);
		}

		$tablet_css = array(
			':root, body .editor-styles-wrapper' => array(
				'--wp--custom--ast-default-block-top-padding' => astra_responsive_spacing( $blocks_spacings, 'top', 'tablet' ),
				'--wp--custom--ast-default-block-right-padding' => astra_responsive_spacing( $blocks_spacings, 'right', 'tablet' ),
				'--wp--custom--ast-default-block-bottom-padding' => astra_responsive_spacing( $blocks_spacings, 'bottom', 'tablet' ),
				'--wp--custom--ast-default-block-left-padding' => astra_responsive_spacing( $blocks_spacings, 'left', 'tablet' ),
			),
			'.editor-styles-wrapper .editor-post-title__input' => array(
				'font-size' => astra_responsive_font( $single_post_title_font_size, 'tablet', '30' ),
			),
			// Heading H1 - H6 font size.
			'.editor-styles-wrapper h1'          => array(
				'font-size' => astra_responsive_font( $heading_h1_font_size, 'tablet', '30' ),
			),
			'.editor-styles-wrapper h2'          => array(
				'font-size' => astra_responsive_font( $heading_h2_font_size, 'tablet', '25' ),
			),
			'.editor-styles-wrapper h3'          => array(
				'font-size' => astra_responsive_font( $heading_h3_font_size, 'tablet', '20' ),
			),
			'.editor-styles-wrapper h4'          => array(
				'font-size' => astra_responsive_font( $heading_h4_font_size, 'tablet' ),
			),
			'.editor-styles-wrapper h5'          => array(
				'font-size' => astra_responsive_font( $heading_h5_font_size, 'tablet' ),
			),
			'.editor-styles-wrapper h6'          => array(
				'font-size' => astra_responsive_font( $heading_h6_font_size, 'tablet' ),
			),
			'#editor .edit-post-visual-editor'   => astra_get_responsive_background_obj( $site_background, 'tablet' ),
			'.edit-post-visual-editor .editor-styles-wrapper' => astra_get_responsive_background_obj( $content_background, 'tablet' ),
		);

		$mobile_css = array(
			':root, body .editor-styles-wrapper' => array(
				'--wp--custom--ast-default-block-top-padding' => astra_responsive_spacing( $blocks_spacings, 'top', 'mobile' ),
				'--wp--custom--ast-default-block-right-padding' => astra_responsive_spacing( $blocks_spacings, 'right', 'mobile' ),
				'--wp--custom--ast-default-block-bottom-padding' => astra_responsive_spacing( $blocks_spacings, 'bottom', 'mobile' ),
				'--wp--custom--ast-default-block-left-padding' => astra_responsive_spacing( $blocks_spacings, 'left', 'mobile' ),
			),
			'.editor-styles-wrapper .editor-post-title__input' => array(
				'font-size' => astra_responsive_font( $single_post_title_font_size, 'mobile', '30' ),
			),
			// Heading H1 - H6 font size.
			'.editor-styles-wrapper h1'          => array(
				'font-size' => astra_responsive_font( $heading_h1_font_size, 'mobile', '30' ),
			),
			'.editor-styles-wrapper h2'          => array(
				'font-size' => astra_responsive_font( $heading_h2_font_size, 'mobile', '25' ),
			),
			'.editor-styles-wrapper h3'          => array(
				'font-size' => astra_responsive_font( $heading_h3_font_size, 'mobile', '20' ),
			),
			'.editor-styles-wrapper h4'          => array(
				'font-size' => astra_responsive_font( $heading_h4_font_size, 'mobile' ),
			),
			'.editor-styles-wrapper h5'          => array(
				'font-size' => astra_responsive_font( $heading_h5_font_size, 'mobile' ),
			),
			'.editor-styles-wrapper h6'          => array(
				'font-size' => astra_responsive_font( $heading_h6_font_size, 'mobile' ),
			),
			'#editor .edit-post-visual-editor'   => astra_get_responsive_background_obj( $site_background, 'mobile' ),
			'.edit-post-visual-editor .editor-styles-wrapper' => astra_get_responsive_background_obj( $content_background, 'mobile' ),
		);

		$css .= astra_parse_css( $desktop_css );
		/** @psalm-suppress InvalidArgument */ // phpcs:ignore Generic.Commenting.DocComment.MissingShort
		$css .= astra_parse_css( $tablet_css, '', astra_get_tablet_breakpoint() );
		/** @psalm-suppress InvalidArgument */ // phpcs:ignore Generic.Commenting.DocComment.MissingShort
		$css .= astra_parse_css( $mobile_css, '', astra_get_mobile_breakpoint() );
		/** @psalm-suppress InvalidArgument */ // phpcs:ignore Generic.Commenting.DocComment.MissingShort

		return $css;
	}
}
