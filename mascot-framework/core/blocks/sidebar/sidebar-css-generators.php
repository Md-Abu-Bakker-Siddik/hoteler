<?php

if (!function_exists('hoteler_sidebar_padding')) {
	/**
	 * Generate CSS codes for Sidebar Padding
	 */
	function hoteler_sidebar_padding() {
		global $hoteler_redux_theme_opt;
		$var_name = 'sidebar-settings-sidebar-padding';
		$declaration = array();
		$selector = array(
			'.sidebar-area'
		);

		//if empty then return
		if( !array_key_exists( $var_name, $hoteler_redux_theme_opt ) ) {
			return;
		}

		//added padding into the container.
		if( $hoteler_redux_theme_opt[$var_name] == '' ) {
			return;
		}

		if( $hoteler_redux_theme_opt[$var_name]['padding-top'] != "" ) {
			$declaration['padding-top'] = $hoteler_redux_theme_opt[$var_name]['padding-top'];
		}
		if( $hoteler_redux_theme_opt[$var_name]['padding-right'] != "" ) {
			$declaration['padding-right'] = $hoteler_redux_theme_opt[$var_name]['padding-right'];
		}
		if( $hoteler_redux_theme_opt[$var_name]['padding-bottom'] != "" ) {
			$declaration['padding-bottom'] = $hoteler_redux_theme_opt[$var_name]['padding-bottom'];
		}
		if( $hoteler_redux_theme_opt[$var_name]['padding-left'] != "" ) {
			$declaration['padding-left'] = $hoteler_redux_theme_opt[$var_name]['padding-left'];
		}
		hoteler_dynamic_css_generator($selector, $declaration);
	}
	add_action('hoteler_dynamic_css_generator_action', 'hoteler_sidebar_padding');
}


if (!function_exists('hoteler_sidebar_bg_color')) {
	/**
	 * Generate CSS codes for Sidebar Background Color
	 */
	function hoteler_sidebar_bg_color() {
		global $hoteler_redux_theme_opt;
		$var_name = 'sidebar-settings-sidebar-bg-color';
		$declaration = array();
		$selector = array(
			'.sidebar-area'
		);

		//if empty then return
		if( !array_key_exists( $var_name, $hoteler_redux_theme_opt ) ) {
			return;
		}

		if( $hoteler_redux_theme_opt[$var_name] == '' ) {
			return;
		}

		$declaration['background-color'] = $hoteler_redux_theme_opt[$var_name];
		hoteler_dynamic_css_generator($selector, $declaration);
	}
	add_action('hoteler_dynamic_css_generator_action', 'hoteler_sidebar_bg_color');
}


if (!function_exists('hoteler_sidebar_text_align')) {
	/**
	 * Generate CSS codes for Sidebar Text Alignment
	 */
	function hoteler_sidebar_text_align() {
		global $hoteler_redux_theme_opt;
		$var_name = 'sidebar-settings-sidebar-text-align';
		$declaration = array();
		$selector = array(
			'.sidebar-area'
		);

		//if empty then return
		if( !array_key_exists( $var_name, $hoteler_redux_theme_opt ) ) {
			return;
		}

		if( $hoteler_redux_theme_opt[$var_name] == '' ) {
			return;
		}

		$declaration['text-align'] = $hoteler_redux_theme_opt[$var_name];
		hoteler_dynamic_css_generator($selector, $declaration);
	}
	add_action('hoteler_dynamic_css_generator_action', 'hoteler_sidebar_text_align');
}





if (!function_exists('hoteler_sidebar_title_padding')) {
	/**
	 * Generate CSS codes for Sidebar Widget Title Padding
	 */
	function hoteler_sidebar_title_padding() {
		global $hoteler_redux_theme_opt;
		$var_name = 'sidebar-settings-sidebar-title-padding';
		$declaration = array();
		$selector = array(
			'.sidebar-area .widget .widget-title'
		);

		//if empty then return
		if( !array_key_exists( $var_name, $hoteler_redux_theme_opt ) ) {
			return;
		}

		//added padding into the container.
		if( $hoteler_redux_theme_opt[$var_name] == '' ) {
			return;
		}

		if( $hoteler_redux_theme_opt[$var_name]['padding-top'] != "" ) {
			$declaration['padding-top'] = $hoteler_redux_theme_opt[$var_name]['padding-top'];
		}
		if( $hoteler_redux_theme_opt[$var_name]['padding-right'] != "" ) {
			$declaration['padding-right'] = $hoteler_redux_theme_opt[$var_name]['padding-right'];
		}
		if( $hoteler_redux_theme_opt[$var_name]['padding-bottom'] != "" ) {
			$declaration['padding-bottom'] = $hoteler_redux_theme_opt[$var_name]['padding-bottom'];
		}
		if( $hoteler_redux_theme_opt[$var_name]['padding-left'] != "" ) {
			$declaration['padding-left'] = $hoteler_redux_theme_opt[$var_name]['padding-left'];
		}
		hoteler_dynamic_css_generator($selector, $declaration);
	}
	add_action('hoteler_dynamic_css_generator_action', 'hoteler_sidebar_title_padding');
}


if (!function_exists('hoteler_sidebar_title_bg_color')) {
	/**
	 * Generate CSS codes for Sidebar Widget Title Background Color
	 */
	function hoteler_sidebar_title_bg_color() {
		global $hoteler_redux_theme_opt;
		$var_name = 'sidebar-settings-sidebar-title-bg-color';
		$declaration = array();
		$selector = array(
			'.sidebar-area .widget .widget-title'
		);

		//if empty then return
		if( !array_key_exists( $var_name, $hoteler_redux_theme_opt ) ) {
			return;
		}

		if( $hoteler_redux_theme_opt[$var_name] == '' ) {
			return;
		}

		$declaration['background-color'] = $hoteler_redux_theme_opt[$var_name];
		hoteler_dynamic_css_generator($selector, $declaration);
	}
	add_action('hoteler_dynamic_css_generator_action', 'hoteler_sidebar_title_bg_color');
}


if (!function_exists('hoteler_sidebar_title_text_color')) {
	/**
	 * Generate CSS codes for Sidebar Widget Title Text Color
	 */
	function hoteler_sidebar_title_text_color() {
		global $hoteler_redux_theme_opt;
		$var_name = 'sidebar-settings-sidebar-title-text-color';
		$declaration = array();
		$selector = array(
			'.sidebar-area .widget .widget-title'
		);

		//if empty then return
		if( !array_key_exists( $var_name, $hoteler_redux_theme_opt ) ) {
			return;
		}

		if( $hoteler_redux_theme_opt[$var_name] == '' ) {
			return;
		}

		$declaration['color'] = $hoteler_redux_theme_opt[$var_name];
		hoteler_dynamic_css_generator($selector, $declaration);
	}
	add_action('hoteler_dynamic_css_generator_action', 'hoteler_sidebar_title_text_color');
}


if (!function_exists('hoteler_sidebar_title_font_size')) {
	/**
	 * Generate CSS codes for Sidebar Widget Title Font Size
	 */
	function hoteler_sidebar_title_font_size() {
		global $hoteler_redux_theme_opt;
		$var_name = 'sidebar-settings-sidebar-title-font-size';
		$declaration = array();
		$selector = array(
			'.sidebar-area .widget .widget-title'
		);

		//if empty then return
		if( !array_key_exists( $var_name, $hoteler_redux_theme_opt ) ) {
			return;
		}

		if( $hoteler_redux_theme_opt[$var_name] == '' ) {
			return;
		}

		$declaration['font-size'] = $hoteler_redux_theme_opt[$var_name] . 'px';
		hoteler_dynamic_css_generator($selector, $declaration);
	}
	add_action('hoteler_dynamic_css_generator_action', 'hoteler_sidebar_title_font_size');
}


if (!function_exists('hoteler_sidebar_title_line_bottom_color')) {
	/**
	 * Generate CSS codes for Sidebar Widget Title Line Bottom Color
	 */
	function hoteler_sidebar_title_line_bottom_color() {
		global $hoteler_redux_theme_opt;
		$var_name = 'sidebar-settings-sidebar-title-line-bottom-color';
		$declaration = array();
		$selector = array(
			'.sidebar-area .widget .widget-title.widget-title-line-bottom:after'
		);

		if( !hoteler_get_redux_option( 'sidebar-settings-sidebar-title-show-line-bottom' ) ) {
			return;
		}

		//if empty then return
		if( !array_key_exists( $var_name, $hoteler_redux_theme_opt ) ) {
			return;
		}

		if( $hoteler_redux_theme_opt[$var_name] == '' ) {
			return;
		}

		$declaration['background-color'] = $hoteler_redux_theme_opt[$var_name];
		hoteler_dynamic_css_generator($selector, $declaration);
	}
	add_action('hoteler_dynamic_css_generator_action', 'hoteler_sidebar_title_line_bottom_color');
}