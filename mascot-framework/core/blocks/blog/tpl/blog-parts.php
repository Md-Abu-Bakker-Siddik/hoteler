<?php
	/**
	* hoteler_before_blog_section hook.
	*
	*/
	do_action( 'hoteler_before_blog_section' );
?>
<section>
	<div class="<?php echo esc_attr( $container_type ); ?>">
		<?php
			/**
			* hoteler_blog_container_start hook.
			*
			*/
			do_action( 'hoteler_blog_container_start' );
		?>

		<div class="blog-posts">
			<?php
				hoteler_get_blog_sidebar_layout();
			?>
		</div>

	<?php
		/**
		* hoteler_blog_container_end hook.
		*
		*/
		do_action( 'hoteler_blog_container_end' );
	?>
	</div>
</section>
<?php
	/**
	* hoteler_after_blog_section hook.
	*
	*/
	do_action( 'hoteler_after_blog_section' );
?>
