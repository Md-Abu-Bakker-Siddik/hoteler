<?php

if (!function_exists('hoteler_footer_top_callout_text_font_size')) {
	/**
	 * Generate CSS codes for Footer Top Callout Font Size
	 */
	function hoteler_footer_top_callout_text_font_size() {
		global $hoteler_redux_theme_opt;
		$var_name = 'footer-top-call-out-area-text-font-size';
		$declaration = array();
		$selector = array(
			'#footer-top-callout-wrap .callout-content, #footer-top-callout-wrap .callout-content *'
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
	add_action('hoteler_dynamic_css_generator_action', 'hoteler_footer_top_callout_text_font_size');
}

if (!function_exists('hoteler_footer_top_callout_text_color')) {
	/**
	 * Generate CSS codes for Footer Top Callout Font Size
	 */
	function hoteler_footer_top_callout_text_color() {
		global $hoteler_redux_theme_opt;
		$var_name = 'footer-top-call-out-area-text-color';
		$declaration = array();
		$selector = array(
			'#footer-top-callout-wrap .callout-content, #footer-top-callout-wrap .callout-content *'
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
	add_action('hoteler_dynamic_css_generator_action', 'hoteler_footer_top_callout_text_color');
}



if (!function_exists('hoteler_footer_top_callout_icon_font_size')) {
	/**
	 * Generate CSS codes for Footer Top Callout Icon Size
	 */
	function hoteler_footer_top_callout_icon_font_size() {
		global $hoteler_redux_theme_opt;
		$var_name = 'footer-top-call-out-area-left-font-icon-fontsize';
		$declaration = array();
		$selector = array(
			'#footer-top-callout-wrap .callout-icon i'
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
	add_action('hoteler_dynamic_css_generator_action', 'hoteler_footer_top_callout_icon_font_size');
}


if (!function_exists('hoteler_footer_top_callout_icon_color')) {
	/**
	 * Generate CSS codes for Footer Top Callout Icon Color
	 */
	function hoteler_footer_top_callout_icon_color() {
		global $hoteler_redux_theme_opt;
		$var_name = 'footer-top-call-out-area-left-font-icon-color';
		$declaration = array();
		$selector = array(
			'#footer-top-callout-wrap .callout-icon i'
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
	add_action('hoteler_dynamic_css_generator_action', 'hoteler_footer_top_callout_icon_color');
}


if (!function_exists('hoteler_footer_top_callout_area_bg_color')) {
	/**
	 * Generate CSS codes for Footer Top Callout Area Background Color
	 */
	function hoteler_footer_top_callout_area_bg_color() {
		global $hoteler_redux_theme_opt;
		$var_name = 'footer-top-call-out-area-bgcolor';
		$declaration = array();
		$selector = array(
			'#footer-top-callout-wrap'
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
	add_action('hoteler_dynamic_css_generator_action', 'hoteler_footer_top_callout_area_bg_color');
}


if (!function_exists('hoteler_footer_top_callout_area_border_top_color')) {
	/**
	 * Generate CSS codes for Footer Top Callout Area Border Top Color
	 */
	function hoteler_footer_top_callout_area_border_top_color() {
		global $hoteler_redux_theme_opt;
		$var_name = 'footer-top-call-out-area-border-top-color';
		$declaration = array();
		$selector = array(
			'#footer-top-callout-wrap'
		);

		//if empty then return
		if( !array_key_exists( $var_name, $hoteler_redux_theme_opt ) ) {
			return;
		}

		if( $hoteler_redux_theme_opt[$var_name] == '' ) {
			return;
		}

		$declaration['border-top'] = '3px solid ' . $hoteler_redux_theme_opt[$var_name];
		hoteler_dynamic_css_generator($selector, $declaration);
	}
	add_action('hoteler_dynamic_css_generator_action', 'hoteler_footer_top_callout_area_border_top_color');
}


if (!function_exists('hoteler_footer_top_callout_area_border_bottom_color')) {
	/**
	 * Generate CSS codes for Footer Top Callout Area Border Bottom Color
	 */
	function hoteler_footer_top_callout_area_border_bottom_color() {
		global $hoteler_redux_theme_opt;
		$var_name = 'footer-top-call-out-area-border-bottom-color';
		$declaration = array();
		$selector = array(
			'#footer-top-callout-wrap'
		);

		//if empty then return
		if( !array_key_exists( $var_name, $hoteler_redux_theme_opt ) ) {
			return;
		}

		if( $hoteler_redux_theme_opt[$var_name] == '' ) {
			return;
		}

		$declaration['border-bottom'] = '3px solid ' . $hoteler_redux_theme_opt[$var_name];
		hoteler_dynamic_css_generator($selector, $declaration);
	}
	add_action('hoteler_dynamic_css_generator_action', 'hoteler_footer_top_callout_area_border_bottom_color');
}