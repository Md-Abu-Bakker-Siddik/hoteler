<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the .main-content div and #wrapper
 *
 */
?>


	<?php hoteler_get_footer_top_callout(); ?>


	<?php
		/**
		 * hoteler_main_content_end hook.
		 *
		 */
		do_action( 'hoteler_main_content_end' );
	?>
	</div>
	<!-- main-content end -->
	<?php
		/**
		 * hoteler_after_main_content hook.
		 *
		 */
		do_action( 'hoteler_after_main_content' );
	?>


	<?php if( apply_filters('hoteler_filter_show_footer', true) ): ?>
	<?php hoteler_get_footer_parts(); ?>
	<?php endif; ?>

	<?php
		/**
		 * hoteler_wrapper_end hook.
		 *
		 */
		do_action( 'hoteler_wrapper_end' );
	?>
</div>
<!-- wrapper end -->
<?php
	/**
	 * hoteler_body_tag_end hook.
	 *
	 */
	do_action( 'hoteler_body_tag_end' );
?>
<?php
	/**
	 * nav_search_icon_popup_html hook.
	 *
	 */
	do_action( 'hoteler_nav_search_icon_popup_html');
	hoteler_floating_cart_sidebar();
?>
<?php wp_footer(); ?>
</body>
</html>
