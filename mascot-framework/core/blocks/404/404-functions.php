<?php


if(!function_exists('hoteler_get_404_parts')) {
	/**
	 * Function that Renders Coming Soon Page HTML Codes
	 * @return HTML
	 */
	function hoteler_get_404_parts() {
		$params = array();
		$section_classes_array = array();
		$params['section_classes'] = '';
		$layout = hoteler_get_redux_option( '404-page-settings-layout', 'simple' );
		$section_classes_array[] = 'page-404-layout-' . $layout;

		//Text Alignment
		$params['text_align'] = hoteler_get_redux_option( '404-page-settings-text-align', 'text-center' );

		//Add Background Overlay
		if( hoteler_get_redux_option( '404-page-settings-bg-layer-overlay-status' ) ) {
			$section_classes_array[] = 'layer-overlay overlay-'.hoteler_get_redux_option( '404-page-settings-bg-layer-overlay-color' ) .'-'.hoteler_get_redux_option( '404-page-settings-bg-layer-overlay' );
		}

		//make array into string
		if( is_array( $section_classes_array ) && count( $section_classes_array ) ) {
			$params['section_classes'] = esc_attr(implode(' ', $section_classes_array));
		}

		$params['page_title'] = hoteler_get_redux_option( '404-page-settings-title', hoteler_redux_fallback_text_collection('404') );
		$params['page_subtitle'] = hoteler_get_redux_option( '404-page-settings-subtitle', hoteler_redux_fallback_text_collection('404_oops') );
		$params['page_content'] = hoteler_get_redux_option( '404-page-settings-content', hoteler_redux_fallback_text_collection('404_notexist') );


		//fullscreen if not show header footer
		if( hoteler_get_redux_option( '404-page-settings-show-header', true ) == true || hoteler_get_redux_option( '404-page-settings-show-footer', true ) == true ) {
			$params['fullscreen'] = 'page-404-wrapper-padding';
		} else {
			$params['fullscreen'] = 'section-fullscreen';
		}

		//Search Box
		$params['show_search_box'] = hoteler_get_redux_option( '404-page-settings-show-search-box', false );
		$params['search_box_heading'] = hoteler_get_redux_option( '404-page-settings-search-box-heading' );
		$params['search_box_paragraph'] = hoteler_get_redux_option( '404-page-settings-search-box-paragraph' );

		//Helpful Links
		$params['show_helpful_links'] = hoteler_get_redux_option( '404-page-settings-show-helpful-links', 0 );
		$params['helpful_links_heading'] = hoteler_get_redux_option( '404-page-settings-helpful-links-heading' );
		$params['helpful_links_nav'] = 'page-404-helpful-links';

		//Show Social Links
		$params['show_social_links'] = hoteler_get_redux_option( '404-page-settings-show-social-links', false );

		//Back Button Label
		$params['show_back_to_home_button'] = hoteler_get_redux_option( '404-page-settings-show-back-to-home-button', true );
		$params['back_to_home_button_label'] = hoteler_get_redux_option( '404-page-settings-back-to-home-button-label', hoteler_redux_fallback_text_collection('404_btn') );

		//Produce HTML version by using the parameters (filename, variation, folder name, parameters)
		$html = hoteler_get_blocks_template_part( 'template', hoteler_get_redux_option( '404-page-settings-layout', 'simple' ), '404/tpl', $params );

		return $html;
	}
}