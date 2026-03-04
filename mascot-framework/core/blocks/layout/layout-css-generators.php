<?php

if (!function_exists('hoteler_layout_settings_boxed_layout_padding_top_bottom')) {
	/**
	 * Generate CSS codes for Boxed Layout - Padding Top & Bottom
	 */
	function hoteler_layout_settings_boxed_layout_padding_top_bottom() {
		global $hoteler_redux_theme_opt;
		$var_name = 'layout-settings-boxed-layout-padding-top-bottom';
		$declaration = array();
		$selector = array(
			'body.tm-boxed-layout',
		);

		//if empty then return
		if( !array_key_exists( $var_name, $hoteler_redux_theme_opt ) ) {
			return;
		}

		//if Page Layout boxed
		if( hoteler_get_redux_option( 'layout-settings-page-layout' ) == 'boxed' ) {
			$padding_top = $hoteler_redux_theme_opt[$var_name]['padding-top'];
			$padding_bottom = $hoteler_redux_theme_opt[$var_name]['padding-bottom'];

			if( !empty( $padding_top ) && $padding_top != "" ) {
				$padding_top = hoteler_remove_suffix( $padding_top, 'px');
				$declaration['padding-top'] = $padding_top . 'px';
			}
			if( !empty( $padding_bottom ) && $padding_bottom != "" ) {
				$padding_bottom = hoteler_remove_suffix( $padding_bottom, 'px');
				$declaration['padding-bottom'] = $padding_bottom . 'px';
			}
		}

		hoteler_dynamic_css_generator($selector, $declaration);
	}
	add_action('hoteler_dynamic_css_generator_action', 'hoteler_layout_settings_boxed_layout_padding_top_bottom');
}


if (!function_exists('hoteler_stretched_layout_background_color')) {
	/**
	 * Generate CSS codes for Stretched Layout - Background Color
	 */
	function hoteler_stretched_layout_background_color() {
		global $hoteler_redux_theme_opt;
		$var_name = 'layout-settings-stretched-layout-bg-bgcolor';
		$declaration = array();
		$selector = array(
			'body.tm-stretched-layout',
		);

		//if empty then return
		if( hoteler_get_redux_option( 'layout-settings-page-layout' ) != 'stretched' ) {
			return;
		}
		if( !array_key_exists( $var_name, $hoteler_redux_theme_opt ) ) {
			return;
		}

		if( hoteler_get_redux_option( 'layout-settings-boxed-layout-bg-type' ) == 'bg-color' ) {
			if( $hoteler_redux_theme_opt[$var_name] != "" ) {
				$declaration['background-color'] = $hoteler_redux_theme_opt[$var_name];
			}
			hoteler_dynamic_css_generator($selector, $declaration);
		}
	}
	add_action('hoteler_dynamic_css_generator_action', 'hoteler_stretched_layout_background_color');
}


if (!function_exists('hoteler_boxed_layout_background_color')) {
	/**
	 * Generate CSS codes for Boxed Layout - Background Color
	 */
	function hoteler_boxed_layout_background_color() {
		global $hoteler_redux_theme_opt;
		$var_name = 'layout-settings-boxed-layout-bg-type-bgcolor';
		$declaration = array();
		$selector = array(
			'body.tm-boxed-layout',
		);

		//if empty then return
		if( !array_key_exists( $var_name, $hoteler_redux_theme_opt ) ) {
			return;
		}

		if( hoteler_get_redux_option( 'layout-settings-boxed-layout-bg-type' ) == 'bg-color' ) {
			if( $hoteler_redux_theme_opt[$var_name] != "" ) {
				$declaration['background-color'] = $hoteler_redux_theme_opt[$var_name];
			}
			hoteler_dynamic_css_generator($selector, $declaration);
		}
	}
	add_action('hoteler_dynamic_css_generator_action', 'hoteler_boxed_layout_background_color');
}




if (!function_exists('hoteler_boxed_layout_background_pattern')) {
	/**
	 * Generate CSS codes for Boxed Layout - Background Pattern
	 */
	function hoteler_boxed_layout_background_pattern() {
		global $hoteler_redux_theme_opt;
		$var_name = 'layout-settings-boxed-layout-bg-type-pattern';
		$declaration = array();
		$selector = array(
			'body.tm-boxed-layout',
		);

		//if empty then return
		if( !array_key_exists( $var_name, $hoteler_redux_theme_opt ) ) {
			return;
		}

		if( hoteler_get_redux_option( 'layout-settings-boxed-layout-bg-type' ) == 'bg-patter' ) {
			if( $hoteler_redux_theme_opt[$var_name] != "" ) {
				$declaration['background-image'] = 'url('.$hoteler_redux_theme_opt[$var_name].')';
			}
			hoteler_dynamic_css_generator($selector, $declaration);
		}
	}
	add_action('hoteler_dynamic_css_generator_action', 'hoteler_boxed_layout_background_pattern');
}


if (!function_exists('hoteler_boxed_layout_bg')) {
	/**
	 * Generate CSS codes for Widget Footer Background
	 */
	function hoteler_boxed_layout_bg() {
		global $hoteler_redux_theme_opt;
		$var_name = 'layout-settings-boxed-layout-bg-type-bgimg';
		$declaration = array();
		$selector = array(
			'body.tm-boxed-layout',
		);

		//if empty then return
		if( !array_key_exists( $var_name, $hoteler_redux_theme_opt ) ) {
			return;
		}

		if( hoteler_get_redux_option( 'layout-settings-boxed-layout-bg-type' ) == 'bg-image' ) {
			$declaration = hoteler_redux_option_field_background( $var_name );
			hoteler_dynamic_css_generator($selector, $declaration);
		}
	}
	add_action('hoteler_dynamic_css_generator_action', 'hoteler_boxed_layout_bg');
}





if (!function_exists('hoteler_dark_layout_background_color')) {
	/**
	 * Generate CSS codes for dark Layout - Background Color
	 */
	function hoteler_dark_layout_background_color() {
		global $hoteler_redux_theme_opt;
		$var_name = 'general-settings-dark-mode-custom-bgcolor';
		$declaration = array();
		$selector = array(
			'[data-tm-layout="dark"]'
		);

		//if empty then return
		if( hoteler_get_redux_option( 'general-settings-enable-dark-mode' ) != '1' ) {
			return;
		}

		if( $hoteler_redux_theme_opt[$var_name] != "" ) {
			$declaration['--body-bg'] = $hoteler_redux_theme_opt[$var_name] . '!important';
			hoteler_dynamic_css_generator($selector, $declaration);
		}
	}
	add_action('hoteler_dynamic_css_generator_action', 'hoteler_dark_layout_background_color');
}