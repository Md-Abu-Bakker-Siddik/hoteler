<?php
/**
 * The template for displaying 404 pages (not found)
 *
 */
$header_return_true_false = ( hoteler_get_redux_option( '404-page-settings-show-header', true ) == true ) ? 'hoteler_return_true' : 'hoteler_return_false';
add_filter( 'hoteler_filter_show_header', $header_return_true_false );

$footer_return_true_false = ( hoteler_get_redux_option( '404-page-settings-show-footer', true ) == true ) ? 'hoteler_return_true' : 'hoteler_return_false';
add_filter( 'hoteler_filter_show_footer', $footer_return_true_false );

get_header();

hoteler_get_title_area_parts();

hoteler_get_404_parts();

get_footer();
