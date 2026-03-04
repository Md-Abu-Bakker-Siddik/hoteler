<?php
// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Cannot access pages directly.' );
}
?>

<style>
	.mascot-docs-three-col ul {
		list-style-type: disc !important;
		list-style-position: outside !important;
	}
	.mascot-docs-three-col ol {
		list-style-type: decimal !important;
		list-style-position: outside !important;
	}
	@media (max-width: 768px) {
		.mascot-docs-two-col {
			flex-direction: column !important;
		}
		.mascot-docs-two-col .col {
			width: 100% !important;
			margin-bottom: 20px;
		}
		.mascot-docs-three-col {
			flex-direction: column !important;
		}
		.mascot-docs-three-col .col {
			margin-bottom: 20px;
		}
	}
</style>

<div class="wrap about-wrap mascot-admin-tpl-wrapper">
	<?php echo hoteler_get_template_part( 'admin/admin-tpl/mascot-header' ); ?>
	<?php echo hoteler_get_template_part( 'admin/admin-tpl/mascot-tabs' ); ?>

	<div class="feature-section mascot-docs-two-col" style="display: flex; gap: 20px;">
		<div class="col" style="flex: 1;">
			<div class="mascot-faq-tab">
				<div class="heading"><?php esc_html_e( 'Documentation', 'hoteler' ); ?></div>
				<div class="content">
					<?php esc_html_e( 'Goto the following link to get documentation on this theme.', 'hoteler' ); ?> <br><br>
					<a class="button button-default" target="_blank" href="https://docs.kodesolution.com/<?php $theme_name = get_template(); echo str_replace("-wp", "", $theme_name);?>"><?php esc_html_e( 'Online Documentation', 'hoteler' ); ?> >></a>
				</div>
			</div>
		</div>

		<div class="col" style="flex: 1;">
			<div class="mascot-faq-tab">
				<div class="heading"><?php esc_html_e( 'Need help? Contact us via WhatsApp or email for quick support', 'hoteler' ); ?></div>
				<div class="content">
					<strong><?php esc_html_e( 'WhatsApp Support:', 'hoteler' ); ?></strong><br>
					<a href="https://wa.me/8801750050088" target="_blank" class="button button-primary" style="margin-top: 10px; margin-right: 10px;">
						<?php esc_html_e( 'Contact: +8801750-050088', 'hoteler' ); ?>
					<a href="https://wa.me/8801998900100" target="_blank" class="button button-primary" style="margin-top: 10px;">
						<?php esc_html_e( 'Contact: +8801998-900100', 'hoteler' ); ?>
					</a>
					<br><br>
					<strong><?php esc_html_e( 'Email Support:', 'hoteler' ); ?></strong><br>
					<a href="mailto:help.thememascot@gmail.com" class="button button-primary" style="margin-top: 10px;">
						<?php esc_html_e( 'Contact: help.thememascot@gmail.com', 'hoteler' ); ?>
					</a>
				</div>
			</div>
		</div>

	</div>

	<div class="feature-section" style="margin-top: 40px;">
		<h2 style="text-align: center; margin-bottom: 30px;"><?php esc_html_e( 'Hire Us for Custom Development', 'hoteler' ); ?></h2>

		<div class="three-col mascot-docs-three-col" style="display: flex; gap: 20px;">
			<div class="col" style="flex: 1; border: 1px solid #ddd; padding: 20px; border-radius: 5px; background: #fff;">
				<div style="text-align: center;">
					<h3 style="margin-top: 0; color: #222;"><?php esc_html_e( '1 Hour Web Development Service', 'hoteler' ); ?></h3>
					<div style="font-size: 32px; font-weight: bold; color: #2271b1; margin: 20px 0;">$50</div>
				</div>
				<div style="text-align: left; margin-top: 20px;">
					<h4 style="color: #222; margin-top: 0;"><?php esc_html_e( 'Service Description', 'hoteler' ); ?></h4>
					<p style="color: #666; line-height: 1.6; margin-bottom: 15px;">
						<strong><?php esc_html_e( '1-Hour Web Development Service. Quick Fixes. Fast Results.', 'hoteler' ); ?></strong>
					</p>
					<p style="color: #666; line-height: 1.6; margin-bottom: 15px;">
						<?php esc_html_e( 'Need a fast, expert solution for a small website issue or quick update? Our 1-Hour Web Development Service is perfect for tackling those minor tasks that don\'t require a full project scope.', 'hoteler' ); ?>
					</p>
					<p style="color: #666; line-height: 1.6; margin-bottom: 20px;">
						<?php esc_html_e( 'Whether it\'s a layout adjustment, bug fix, plugin setup, styling tweak, or other small development job for a WordPress site, we\'ll get it done efficiently within 1 business day.', 'hoteler' ); ?>
					</p>

					<h4 style="color: #2271b1; margin-top: 20px;"><?php esc_html_e( '✔️ Ideal For:', 'hoteler' ); ?></h4>
					<ul style="color: #666; line-height: 1.8; margin-bottom: 20px; padding-left: 20px;">
						<li><?php esc_html_e( 'Fixing display or layout issues', 'hoteler' ); ?></li>
						<li><?php esc_html_e( 'Adjusting mobile responsiveness', 'hoteler' ); ?></li>
						<li><?php esc_html_e( 'Styling tweaks (CSS changes)', 'hoteler' ); ?></li>
						<li><?php esc_html_e( 'Installing or configuring plugins', 'hoteler' ); ?></li>
						<li><?php esc_html_e( 'Adding or modifying content', 'hoteler' ); ?></li>
						<li><?php esc_html_e( 'Small WooCommerce adjustments', 'hoteler' ); ?></li>
						<li><?php esc_html_e( 'Debugging and resolving minor errors', 'hoteler' ); ?></li>
					</ul>

					<h4 style="color: #2271b1; margin-top: 20px;"><?php esc_html_e( '📦 What\'s Included:', 'hoteler' ); ?></h4>
					<ul style="color: #666; line-height: 1.8; margin-bottom: 20px; padding-left: 20px;">
						<li><?php esc_html_e( 'Up to 60 minutes of hands-on web development', 'hoteler' ); ?></li>
						<li><?php esc_html_e( 'Work by experienced developers', 'hoteler' ); ?></li>
						<li><?php esc_html_e( 'Fast turnaround, clear communication', 'hoteler' ); ?></li>
					</ul>

					<h4 style="color: #2271b1; margin-top: 20px;"><?php esc_html_e( '⚙️ How It Works:', 'hoteler' ); ?></h4>
					<ol style="color: #666; line-height: 1.8; margin-bottom: 20px; padding-left: 20px;">
						<li><?php esc_html_e( 'Purchase the service', 'hoteler' ); ?></li>
						<li><?php echo sprintf( esc_html__( 'Tell us what you need done and send the briefing details (email us at %s or at %s)', 'hoteler' ), '<a href="mailto:help.thememascot@gmail.com">help.thememascot@gmail.com</a>', 'whatsapp number <br><a href="https://wa.me/8801998900100" target="_blank">+8801998-900100</a>' ); ?></li>
						<li><?php esc_html_e( 'Get a confirmation of your request from a project manager', 'hoteler' ); ?></li>
						<li><?php esc_html_e( 'Get the work done within 1 business day', 'hoteler' ); ?></li>
					</ol>

					<p style="color: #666; line-height: 1.6; margin-bottom: 20px; font-style: italic;">
						<?php esc_html_e( 'If the job turns out to be larger than expected, we\'ll let you know before starting — no surprises.', 'hoteler' ); ?>
					</p>

					<h4 style="color: #2271b1; margin-top: 20px;"><?php esc_html_e( 'Briefing details:', 'hoteler' ); ?></h4>
					<ul style="color: #666; line-height: 1.8; margin-bottom: 20px; padding-left: 20px;">
						<li><?php esc_html_e( 'Site\'s WordPress dashboard details (login link, username, and password)', 'hoteler' ); ?></li>
						<li><?php esc_html_e( 'FTP', 'hoteler' ); ?></li>
					</ul>

					<p style="color: #666; line-height: 1.6; margin-bottom: 20px;">
						<?php esc_html_e( 'For more information or any questions, please submit a ticket here, and our specialist will guide you.', 'hoteler' ); ?>
					</p>

					<div style="text-align: center; margin-top: 25px;">
					<a href="https://wa.me/8801998900100?text=Hi, I'm interested in the 1 Hour Web Development Service ($50)" target="_blank" class="button button-primary" style="width: 100%;">
						<?php esc_html_e( 'Buy', 'hoteler' ); ?>
					</a>
					</div>
				</div>
			</div>

			<div class="col" style="flex: 1; border: 1px solid #ddd; padding: 20px; border-radius: 5px; background: #fff;">
				<div style="text-align: center;">
					<h3 style="margin-top: 0; color: #222;"><?php esc_html_e( 'Ready-To-Use Website', 'hoteler' ); ?></h3>
					<div style="font-size: 32px; font-weight: bold; color: #2271b1; margin: 20px 0;">$250</div>
				</div>
				<div style="text-align: left; margin-top: 20px;">
					<h4 style="color: #222; margin-top: 0;"><?php esc_html_e( 'Service Description', 'hoteler' ); ?></h4>
					<p style="color: #666; line-height: 1.6; margin-bottom: 20px;">
						<strong><?php esc_html_e( 'This service includes:', 'hoteler' ); ?></strong>
					</p>
					<ul style="color: #666; line-height: 1.8; margin-bottom: 20px; padding-left: 20px;">
						<li><?php esc_html_e( 'Theme installation on your server', 'hoteler' ); ?></li>
						<li><?php esc_html_e( 'Logo and website name replacement', 'hoteler' ); ?></li>
						<li><?php esc_html_e( 'Google map setup with your address', 'hoteler' ); ?></li>
						<li><?php esc_html_e( 'Replacing content and images up to 6 pages (without changes in layout and theme functionality)', 'hoteler' ); ?></li>
						<li><?php esc_html_e( 'Adding 6 posts with your content and images', 'hoteler' ); ?></li>
						<li><?php esc_html_e( 'Replacing images and text of Revolution slider', 'hoteler' ); ?></li>
						<li><?php esc_html_e( 'Removal of some elements that you do not need on your website', 'hoteler' ); ?></li>
						<li><?php esc_html_e( 'Social icons setup (without changes in theme layout)', 'hoteler' ); ?></li>
						<li><?php esc_html_e( 'Color scheme customization', 'hoteler' ); ?></li>
						<li><?php esc_html_e( 'Yoast SEO plugin installation.', 'hoteler' ); ?></li>
					</ul>

					<p style="color: #666; line-height: 1.6; margin-bottom: 15px;">
						<?php esc_html_e( 'The theme is not included into this offer. You will need to buy the theme and provide us with the purchase code. The service includes 2 free revisions ( minor changes for content and images).', 'hoteler' ); ?>
					</p>

					<p style="color: #666; line-height: 1.6; margin-bottom: 15px;">
						<?php esc_html_e( 'We recommend that you use Siteground hosting. It has proper server settings, that positively affect your website speed and functionality.', 'hoteler' ); ?>
					</p>

					<p style="color: #666; line-height: 1.6; margin-bottom: 15px;">
						<strong><?php esc_html_e( 'Estimated time is 5-7 business days.', 'hoteler' ); ?></strong>
					</p>

					<p style="color: #666; line-height: 1.6; margin-bottom: 20px;">
						<?php esc_html_e( 'For more information, please submit a ticket here. Your personal developer will guide you. We offer a feature-rich and highly functional WordPress product that will provide you with an opportunity to stand out.', 'hoteler' ); ?>
					</p>

					<div style="text-align: center; margin-top: 25px;">
					<a href="https://wa.me/8801998900100?text=Hi, I'm interested in the Ready-To-Use Website Package ($250)" target="_blank" class="button button-primary" style="width: 100%;">
						<?php esc_html_e( 'Buy', 'hoteler' ); ?>
					</a>
					</div>
				</div>
			</div>

			<div class="col" style="flex: 1; border: 1px solid #ddd; padding: 20px; border-radius: 5px; background: #fff;">
				<div style="text-align: center;">
					<h3 style="margin-top: 0; color: #222;"><?php esc_html_e( 'Full Website Package', 'hoteler' ); ?></h3>
					<div style="font-size: 32px; font-weight: bold; color: #2271b1; margin: 20px 0;">$400</div>
				</div>
				<div style="text-align: left; margin-top: 20px;">
					<h4 style="color: #222; margin-top: 0;"><?php esc_html_e( 'Service Description', 'hoteler' ); ?></h4>
					<p style="color: #666; line-height: 1.6; margin-bottom: 20px;">
						<?php esc_html_e( 'Get your website ready in 14 days. Complete website and content setup including SEO, images, and website speed optimization.', 'hoteler' ); ?>
					</p>

					<h4 style="color: #2271b1; margin-top: 20px;"><?php esc_html_e( 'Full Website Package includes:', 'hoteler' ); ?></h4>
					<ul style="color: #666; line-height: 1.8; margin-bottom: 20px; padding-left: 20px;">
						<li><?php esc_html_e( 'WordPress and theme installation (with plugins and demo data)', 'hoteler' ); ?></li>
						<li><?php esc_html_e( 'Customization of website branding (logo, website name, color scheme customization, replacing fonts, Google map setup, Social icons) based on the theme and its demo content.', 'hoteler' ); ?></li>
						<li><?php esc_html_e( 'Images (up to 15 royalty-free images)', 'hoteler' ); ?></li>
						<li><?php esc_html_e( 'Content setup (replacing content and images up to 6 pages, adding 6 posts with your content and images, replacing images and text of Revolution slider, if it\'s available in the theme) based on the theme and its demo content', 'hoteler' ); ?></li>
						<li><?php esc_html_e( 'SEO Essentials (Yoast Plugin Installation, Sitemap Generation, SEO Settings Setup, Meta Data Settings Setup, Taxonomy Rules Setup)', 'hoteler' ); ?></li>
						<li><?php esc_html_e( 'Website speed optimization', 'hoteler' ); ?></li>
					</ul>

					<p style="color: #d63638; line-height: 1.6; margin-bottom: 20px; font-weight: bold;">
						<?php esc_html_e( 'Important! The service includes content and image replacement according to the already pre-made demo pages. If pages configuration from scratch is required ( ie, configuring pages using sections from multiple theme demos/skins, or building pages according to the custom mockups), an extra fee will be required and can be calculated based on the complexity of the design requirements.', 'hoteler' ); ?>
					</p>

					<h4 style="color: #2271b1; margin-top: 20px;"><?php esc_html_e( 'Briefing Details', 'hoteler' ); ?></h4>
					<p style="color: #666; line-height: 1.6; margin-bottom: 10px;">
						<strong><?php esc_html_e( 'What we need to get started:', 'hoteler' ); ?></strong>
					</p>
					<ul style="color: #666; line-height: 1.8; margin-bottom: 20px; padding-left: 20px;">
						<li><?php esc_html_e( 'Admin access to WordPress Dashboard', 'hoteler' ); ?></li>
					</ul>
					<p style="color: #666; line-height: 1.6; margin-bottom: 20px;">
						<?php esc_html_e( '* The theme is not included in this offer. You will need to buy the theme and provide us with the purchase code. The service includes 2 free revisions ( minor changes for content and images).', 'hoteler' ); ?>
					</p>

					<div style="text-align: center; margin-top: 25px;">
					<a href="https://wa.me/8801998900100?text=Hi, I'm interested in the Full Website Package ($400)" target="_blank" class="button button-primary" style="width: 100%;">
						<?php esc_html_e( 'Buy', 'hoteler' ); ?>
					</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>