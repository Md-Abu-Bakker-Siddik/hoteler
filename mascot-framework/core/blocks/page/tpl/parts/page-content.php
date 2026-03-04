<div id="page-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">
		<div class="page-content">
			<?php
				hoteler_get_blog_single_post_thumbnail();
			?>
			<?php
				/**
				* hoteler_before_page_content hook.
				*
				*/
				do_action( 'hoteler_before_page_content' );
			?>
			<?php
				the_content();
			?>
			<?php
				/**
				* hoteler_after_page_content hook.
				*
				*/
				do_action( 'hoteler_after_page_content' );
			?>

			<?php hoteler_get_post_wp_link_pages(); ?>

			<?php
				if( hoteler_get_redux_option( 'page-settings-show-share' ) ) {
					hoteler_get_social_share_links();
				}
			?>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<?php
	if( $page_show_comments ) {
		hoteler_show_comments();
	}
?>
