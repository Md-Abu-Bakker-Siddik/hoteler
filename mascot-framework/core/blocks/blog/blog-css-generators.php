<?php

if (!function_exists('hoteler_sidebar_widget_title_line_bottom_color')) {
	/**
	 * Generate CSS codes for Sidebar Widget Title Custom Line Bottom Color
	 */
	function hoteler_sidebar_widget_title_line_bottom_color() {
		global $hoteler_redux_theme_opt;
		$var_name = 'sidebar-settings-sidebar-title-line-bottom-custom-color';
		//If Make Line Bottom Theme Colored?
		if( $hoteler_redux_theme_opt['sidebar-settings-sidebar-title-line-bottom-theme-colored'] != '' ) {
			return;
		}

		$declaration = array();
		$selector = array(
			'.widget .widget-title.widget-title-line-bottom:after'
		);

		$declaration['background-color'] = $hoteler_redux_theme_opt[$var_name];
		hoteler_dynamic_css_generator($selector, $declaration);
	}
	add_action('hoteler_dynamic_css_generator_action', 'hoteler_sidebar_widget_title_line_bottom_color');
}