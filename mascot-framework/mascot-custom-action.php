<?php

// Custom Action for this theme
add_action('after_setup_theme', 'hoteler_custom_action_init', 0);

function hoteler_custom_action_init() {

	do_action('hoteler_before_custom_action');

	do_action('hoteler_custom_action');

	do_action('hoteler_after_custom_action');
}