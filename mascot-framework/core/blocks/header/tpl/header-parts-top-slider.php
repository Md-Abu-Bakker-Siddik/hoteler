
	<?php
	/**
	* hoteler_before_top_sliders_container hook.
	*
	*/
	do_action( 'hoteler_before_top_sliders_container' );
	?>
	<div class="top-sliders-container">
		<?php
			/**
			* hoteler_top_sliders_container_start hook.
			*
			*/
			do_action( 'hoteler_top_sliders_container_start' );
		?>

		<?php
			echo hoteler_get_top_main_slider();
		?>

		<?php
			/**
			* hoteler_top_sliders_container_end hook.
			*
			*/
			do_action( 'hoteler_top_sliders_container_end' );
		?>
	</div>
	<?php
	/**
	* hoteler_after_top_sliders_container hook.
	*
	*/
	do_action( 'hoteler_after_top_sliders_container' );
	?>
