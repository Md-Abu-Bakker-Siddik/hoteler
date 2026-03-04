<?php
/**
 * ThemeMascot functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 */

if (!function_exists('mascot_core_hoteler_plugin_installed')) {
	/**
	 * Core Plugin installed?*/
	function mascot_core_hoteler_plugin_installed() {
		return defined( 'MASCOT_CORE_HOTELER_VERSION' );
	}
}

/* VARIABLE DEFINITIONS
================================================== */
define( 'MASCOT_THEME_ACTIVE', 'TRUE' );
define( 'HOTELER_AUTHOR', 'ThemeMascot' );
define( 'HOTELER_FRAMEWORK_VERSION', '1.0' );
define( 'HOTELER_TEMPLATE_URI', get_template_directory_uri() );
define( 'HOTELER_TEMPLATE_DIR', get_template_directory() );

define( 'HOTELER_ASSETS_URI', HOTELER_TEMPLATE_URI . '/assets' );
define( 'HOTELER_ASSETS_DIR', HOTELER_TEMPLATE_DIR . '/assets' );

define( 'HOTELER_ADMIN_ASSETS_URI', HOTELER_TEMPLATE_URI . '/admin/assets' );
define( 'HOTELER_ADMIN_ASSETS_DIR', HOTELER_TEMPLATE_DIR . '/admin/assets' );

define( 'HOTELER_FRAMEWORK_FOLDER', 'mascot-framework' );
define( 'HOTELER_FRAMEWORK_DIR', HOTELER_TEMPLATE_DIR . '/'. HOTELER_FRAMEWORK_FOLDER );

define( 'HOTELER_POST_EXCERPT_LENGTH', 25 );
define( 'HOTELER_MENUZORD_MEGAMENU_BREAKPOINT_BW', '1024px' );
define( 'HOTELER_MENUZORD_MEGAMENU_BREAKPOINT_FW', '1025px' );

get_template_part( HOTELER_FRAMEWORK_FOLDER . '/mascot-theme-info' );
define( 'HOTELER_THEME_VERSION', HotelerThemeInfo::get_instance()->get_version() );


/* Initial Actions
================================================== */
add_action( 'after_setup_theme', 		'hoteler_action_after_setup_theme' );
add_action( 'after_setup_theme', 		'hoteler_action_load_tgm', 1 );
add_action( 'after_setup_theme', 		'hoteler_action_load_demo_import', 2 );
add_action( 'init', 					'hoteler_action_load_framework', 10 );
add_action( 'wp_enqueue_scripts', 		'hoteler_action_wp_enqueue_scripts',12 );

//admin actions
add_action( 'admin_enqueue_scripts',	'hoteler_action_theme_admin_enqueue_scripts' );


/* TGM PLUGINS LOADER
================================================== */
if(!function_exists('hoteler_action_load_tgm')) {
	/**
	 * Load TGM Plugin Activation
	 * Loaded early on after_setup_theme to ensure it registers before tgmpa_register fires
	 */
	function hoteler_action_load_tgm() {
		get_template_part( HOTELER_FRAMEWORK_FOLDER . '/tgm/tgm-plugins-register' );
	}
}

/* DEMO CONTENT IMPORT LOADER
================================================== */
if(!function_exists('hoteler_action_load_demo_import')) {
	/**
	 * Load One Click Demo Import configuration
	 * Loaded early on after_setup_theme to ensure filters register before OCDI plugin initializes
	 */
	function hoteler_action_load_demo_import() {
		get_template_part( HOTELER_FRAMEWORK_FOLDER . '/tgm/demo-content-import' );
	}
}

/* MASCOT FRAMEWORK LOADER
================================================== */
if(!function_exists('hoteler_action_load_framework')) {
	/**
	 * Load Mascot Framework
	 * Loaded on init action to comply with WordPress 6.7.0+ translation requirements
	 * Priority 10 ensures it loads after the plugin (which loads at priority 5)
	 */
	function hoteler_action_load_framework() {
		get_template_part( HOTELER_FRAMEWORK_FOLDER . '/mascot-framework' );

		// Register framework-dependent hooks after framework is loaded
		add_action( 'widgets_init', 			'hoteler_action_widgets_init' );
		add_action( 'wp_head', 					'hoteler_action_wp_head',1 );
		add_action( 'wp_head', 					'hoteler_action_wp_head_at_the_end', 100 );
		add_action( 'wp_footer', 				'hoteler_action_wp_footer' );
	}
}



if(!function_exists('hoteler_action_after_setup_theme')) {
	/**
	 * After Setup Theme
	 */
	function hoteler_action_after_setup_theme() {
		//Theme Support
		global $supported_post_formats;
		$supported_post_formats = array( 'gallery', 'link', 'quote', 'audio', 'video' );

		//This feature enables Post Formats support for this theme
		add_theme_support( 'post-formats', $supported_post_formats );

		//This feature enables Automatic Feed Links for post and comment in the head
		add_theme_support( 'automatic-feed-links' );

		//This feature enables Post Thumbnails support for this theme
		add_theme_support( 'post-thumbnails' );

		//Woocommerce theme suport
		add_theme_support( 'woocommerce' );

		// WooCommerce Product Gallery Theme Support
		// Must be added here on after_setup_theme for WooCommerce to recognize it
		// Access Redux options directly via get_option() since global might not be set yet
		if ( class_exists( 'WooCommerce' ) ) {
			$redux_options = get_option( 'hoteler_redux_theme_opt', array() );

			$single_product_catalog_layout = isset( $redux_options['shop-single-product-settings-select-single-catalog-layout'] )
				? $redux_options['shop-single-product-settings-select-single-catalog-layout']
				: '';

			// Add slider support if layout is image-with-thumb and option is enabled
			if( $single_product_catalog_layout == 'image-with-thumb' ) {
				$enable_slider = isset( $redux_options['shop-single-product-settings-enable-gallery-slider'] )
					? $redux_options['shop-single-product-settings-enable-gallery-slider']
					: false;
				if( $enable_slider ) {
					add_theme_support( 'wc-product-gallery-slider' );
				}
			}

			// Add lightbox support if option is enabled
			$enable_lightbox = isset( $redux_options['shop-single-product-settings-enable-gallery-lightbox'] )
				? $redux_options['shop-single-product-settings-enable-gallery-lightbox']
				: false;
			if( $enable_lightbox ) {
				add_theme_support( 'wc-product-gallery-lightbox' );
			}

			// Add zoom support if option is enabled
			$enable_zoom = isset( $redux_options['shop-single-product-settings-enable-gallery-zoom'] )
				? $redux_options['shop-single-product-settings-enable-gallery-zoom']
				: false;
			if( $enable_zoom ) {
				add_theme_support( 'wc-product-gallery-zoom' );
			}
		}

		// Custom Backgrounds
		add_theme_support( 'custom-background', array(
			'default-color' => 'fff',
		) );

		//This feature enables plugins and themes to manage the document title tag. This should be used in place of wp_title() function
		add_theme_support( 'title-tag' );

		//This feature allows the use of HTML5 markup for the search forms, comment forms, comment lists, gallery, and caption
		add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );


		// add excerpt support for pages
		add_post_type_support( 'page', 'excerpt' );

		//Thumbnail Sizes
		set_post_thumbnail_size( 672, 448, true );
		add_image_size( 'hoteler_thumbnail_height', 600, 800, true );
		add_image_size( 'hoteler_thumbnail_height_400', 400, 532, true );

		add_image_size( 'hoteler_square', 550, 550, true );
		add_image_size( 'hoteler_landscape', 1100, 550, true );
		add_image_size( 'hoteler_portrait', 550, 1100, true );
		add_image_size( 'hoteler_huge_square', 1100, 1100, true );
		add_image_size( 'hoteler_square_150', 150, 150, true );

		add_image_size( 'hoteler_small_height', 150, 180, true );

		//Content Width
		if ( ! isset( $content_width ) ) $content_width = 1170;

		//Theme Textdomain
		load_theme_textdomain( 'hoteler', get_template_directory() . '/languages' );

		//Register Nav Menus
		$register_nav_menus_array = array(
			'primary' 					=> esc_html__( 'Primary Navigation Menu', 'hoteler' ),
			'page-404-helpful-links' 	=> esc_html__( 'Page 404 Helpful Links', 'hoteler' )
		);

		register_nav_menus( $register_nav_menus_array );
	}
}


if(!function_exists('hoteler_action_wp_enqueue_scripts')) {
	/**
	 * Enqueue Script/Style
	 */
	function hoteler_action_wp_enqueue_scripts() {
		wp_enqueue_script( 'jquery-ui-core');
		wp_enqueue_script( 'jquery-ui-tabs');
		wp_enqueue_script( 'jquery-ui-accordion');

		if( !is_admin() ){

			/**
			 * Enqueue Style
			 */

			if( is_rtl() ) {
				wp_enqueue_style( 'bootstrap-rtl', HOTELER_TEMPLATE_URI . '/assets/css/bootstrap-rtl.min.css' );
			} else {
				wp_enqueue_style( 'bootstrap', HOTELER_TEMPLATE_URI . '/assets/css/bootstrap.min.css' );
			}
			wp_enqueue_style( 'animate', HOTELER_TEMPLATE_URI . '/assets/css/animate.min.css' );

			//enable preloader
			wp_register_style( 'hoteler-preloader', HOTELER_TEMPLATE_URI . '/assets/css/preloader.css' );
			$page_preloader = hoteler_get_redux_option( 'general-settings-enable-page-preloader' );
			if( $page_preloader ) {
				wp_enqueue_style( 'hoteler-preloader' );
			}

			/**
			 * Enqueue Fonts
			 */
			//font-awesome icons
			wp_deregister_style( 'font-awesome' );
			wp_deregister_style( 'font-awesome-v4-shims' );
			wp_enqueue_style( 'font-awesome-5-all', HOTELER_TEMPLATE_URI . '/assets/css/font-awesome5.min.css' );
			wp_enqueue_style( 'font-awesome-4-shim', HOTELER_TEMPLATE_URI . '/assets/css/font-awesome-v4-shims.css' );
			//linear icons
			wp_enqueue_style( 'font-linear-icons', HOTELER_TEMPLATE_URI . '/assets/fonts/linear-icons/style.css' );
			//mascot arrow
			wp_enqueue_style( 'mascot-arrow', HOTELER_TEMPLATE_URI . '/assets/fonts/mascot-arrow/style.css' );


			//google fonts
			wp_enqueue_style( 'hoteler-google-fonts', hoteler_google_fonts_url(), [], null );

			/**
			 * Enqueue Script
			 */
			wp_enqueue_script( 'bootstrap', HOTELER_TEMPLATE_URI . '/assets/js/plugins/bootstrap.min.js', array('jquery'), false, true );
			wp_enqueue_script( 'menuzord', HOTELER_TEMPLATE_URI . '/assets/js/plugins/menuzord/js/menuzord.js', array('jquery'), false, true );

			//external plugins single file:
			wp_enqueue_script( 'jquery-appear', HOTELER_TEMPLATE_URI . '/assets/js/plugins/jquery.appear.js', array('jquery'), false, true );
			wp_enqueue_script( 'isotope', HOTELER_TEMPLATE_URI . '/assets/js/plugins/isotope.pkgd.min.js', array('jquery'), false, true );
			wp_enqueue_script( 'imagesloaded' );
			wp_enqueue_script( 'jquery-scrolltofixed', HOTELER_TEMPLATE_URI . '/assets/js/plugins/jquery-scrolltofixed-min.js', array('jquery'), false, true );
			wp_enqueue_script( 'jquery-easing', HOTELER_TEMPLATE_URI . '/assets/js/plugins/jquery.easing.min.js', array('jquery'), false, true );
			wp_enqueue_script( 'jquery-fitvids', HOTELER_TEMPLATE_URI . '/assets/js/plugins/jquery.fitvids.js', array('jquery'), false, true );
			wp_enqueue_script( 'jquery-lettering', HOTELER_TEMPLATE_URI . '/assets/js/plugins/jquery.lettering.js', array('jquery'), false, true );
			wp_enqueue_script( 'jquery-textillate', HOTELER_TEMPLATE_URI . '/assets/js/plugins/jquery.textillate.js', array('jquery'), false, true );
			wp_enqueue_script( 'jquery-nice-select', HOTELER_TEMPLATE_URI . '/assets/js/plugins/jquery-nice-select/jquery.nice-select.min.js', array('jquery'), false, true );
			wp_enqueue_style( 'nice-select', HOTELER_TEMPLATE_URI . '/assets/js/plugins/jquery-nice-select/nice-select.css' );
			wp_enqueue_script( 'wow', HOTELER_TEMPLATE_URI . '/assets/js/plugins/wow.min.js', null, false, true );


			//gsap
			wp_register_script( 'gsap', HOTELER_TEMPLATE_URI . '/assets/js/gsap/gsap.min.js', array( 'jquery' ), '3.5.0', true );
			wp_register_script( 'gsap-scrolltrigger', HOTELER_TEMPLATE_URI . '/assets/js/gsap/ScrollTrigger.min.js', array( 'jquery', 'gsap' ), '3.10.5', true );
			wp_register_script( 'gsap-splittext', HOTELER_TEMPLATE_URI . '/assets/js/gsap/SplitText.min.js', array( 'jquery' ), '3.6.1', true );
			wp_register_script( 'tm-gsap-bg-animation', HOTELER_TEMPLATE_URI . '/assets/js/gsap/gsap-bg-animation.js', array( 'jquery' ), '3.6.1', true );
			wp_register_script( 'tm-bundled-lenis', HOTELER_TEMPLATE_URI . '/assets/js/gsap/typography/bundled-lenis.min.js', array( 'jquery' ), '1.0.0', true );
			wp_register_script( 'tm-gsap-parallax', HOTELER_TEMPLATE_URI . '/assets/js/gsap/gsap-parallax.js', array( 'jquery' ), false, true );
			wp_register_script( 'tm-gsap-pin-anim', HOTELER_TEMPLATE_URI . '/assets/js/gsap/gsap-pin-anim.js', array( 'jquery', 'gsap', 'gsap-scrolltrigger' ), false, true );


			if( hoteler_get_redux_option( 'general-settings-enable-gsap-animation-by-default' ) ) {
				wp_enqueue_script( 'gsap' );
				wp_enqueue_script( 'gsap-scrolltrigger' );
				wp_enqueue_script( 'gsap-splittext' );
				wp_enqueue_script( 'tm-gsap-pin-anim' );
				wp_enqueue_script( 'mascot-custom-gsap', HOTELER_TEMPLATE_URI . '/assets/js/gsap/gsap-custom.js', array('jquery'), false, true );
			}


			//Theme Custom JS
			wp_enqueue_script( 'mascot-custom', HOTELER_TEMPLATE_URI . '/assets/js/custom.js', array('jquery'), false, true );

			//Enqueue comment-reply.js
			if ( is_singular() && comments_open() && get_option('thread_comments') ) {
				wp_enqueue_script( 'comment-reply' );
			}

			if(defined('ELEMENTOR_VERSION')) {
				//enqued elementor frontend in all pages due to FOUC
				wp_enqueue_style( 'elementor-frontend' );
			}

			//style main for this theme
			$direction_suffix = is_rtl() ? '-rtl' : '';
			wp_enqueue_style( 'hoteler-style-main', HOTELER_TEMPLATE_URI . '/assets/css/style-main' . $direction_suffix . '.css', array(), HOTELER_THEME_VERSION );

			//woo
			$direction_suffix = is_rtl() ? '.rtl' : '';
			wp_register_style( 'hoteler-woo-shop', HOTELER_TEMPLATE_URI . '/assets/css/shop/woo-shop' . $direction_suffix . '.css', array('hoteler-style-main') );
			if ( hoteler_is_woocommerce_page() ) {
				wp_enqueue_style( 'hoteler-woo-shop');
				wp_enqueue_style( 'hoteler-woo-shop-single', HOTELER_TEMPLATE_URI . '/assets/css/shop/shop-single' . $direction_suffix . '.css', array('hoteler-style-main') );
			}
			if ( hoteler_exists_woocommerce() ) {
				wp_register_style( 'hoteler-woo-shop-mini-cart', HOTELER_TEMPLATE_URI . '/assets/css/shop/shop-mini-cart' . $direction_suffix . '.css', array('hoteler-style-main') );
			}

			//kodelisting
			wp_enqueue_style( 'hoteler-kodelisting', HOTELER_TEMPLATE_URI . '/assets/css/listing-folder/kodelisting' . $direction_suffix . '.css', array('hoteler-style-main') );





			//Theme Color
			$mascot_primary_theme_color = '';
			$page_metabox_change_primary_theme_color = hoteler_get_rwmb_group( 'hoteler_' . "page_mb_theme_color_settings", 'change_primary_theme_color', hoteler_get_page_id() );

			if( $page_metabox_change_primary_theme_color ) {
				//Theme Color from page meta box
				$mascot_primary_theme_color = hoteler_get_rwmb_group( 'hoteler_' . "page_mb_theme_color_settings", 'primary_theme_color', hoteler_get_page_id() );

			} else if ( !_empty( hoteler_get_redux_option( 'theme-color-settings-theme-color-type' ) ) ) {
				//Theme Color from Theme Options
				if( hoteler_get_redux_option( 'theme-color-settings-theme-color-type' ) == 'predefined' ) {
					//Primary Theme Color
					$mascot_primary_theme_color = !_empty( hoteler_get_redux_option( 'theme-color-settings-primary-theme-color' ) ) ? hoteler_get_redux_option( 'theme-color-settings-primary-theme-color' ) : '';
				} else if ( hoteler_get_redux_option( 'theme-color-settings-theme-color-type' ) == 'custom' ) {
					//Custom Theme Color
					$redux_css_file_name = hoteler_get_redux_option( 'theme-color-settings-custom-theme-color-filename' );
					if( !empty( $redux_css_file_name ) ) {
						$mascot_primary_theme_color = $redux_css_file_name . '.css';
					} else if ( !is_multisite() ) {
						if ( file_exists( HOTELER_ASSETS_DIR . '/css/colors/custom-theme-color.css' ) ) {
							$mascot_primary_theme_color = 'custom-theme-color.css';
						}
					} else {
						if ( file_exists( HOTELER_ASSETS_DIR . '/css/colors/custom-theme-color-msid-' . hoteler_get_multisite_blog_id() . '.css' ) ) {
							$mascot_primary_theme_color = 'custom-theme-color-msid-' . hoteler_get_multisite_blog_id() . '.css';
						}
					}
				}
			} else {
				$mascot_primary_theme_color = 'theme-skin-color-set1.css';
			}

			wp_enqueue_style( 'hoteler-primary-theme-color', HOTELER_TEMPLATE_URI . '/assets/css/colors/' . $mascot_primary_theme_color );


			//Attach Premade CSS File into the header
			$mascot_premade_sitewise_css_file = hoteler_get_redux_option( 'theme-color-settings-premade-sitewise-css-file' );
			if( !empty($mascot_premade_sitewise_css_file) ) {
				wp_enqueue_style( 'hoteler-premade-sitewise-css-file', HOTELER_TEMPLATE_URI . '/assets/css/sites/' . $mascot_premade_sitewise_css_file );
			}


			if( is_rtl() ) {
				wp_enqueue_style( 'hoteler-style-main-rtl-extra', HOTELER_TEMPLATE_URI . '/assets/css/style-main-rtl-extra.css' );
			}

			//Dark mode
			$enable_dark_layout_mode = hoteler_get_rwmb_group( 'hoteler_' . "page_mb_dark_layouts_settings", 'enable_dark_layout_mode', hoteler_get_page_id() );
			if( $enable_dark_layout_mode ) {
				wp_enqueue_style( 'hoteler-style-main-dark', HOTELER_TEMPLATE_URI . '/assets/css/style-main-dark.css' );
			} else if( hoteler_get_redux_option( 'general-settings-enable-dark-mode', true ) ) {
				wp_enqueue_style( 'hoteler-style-main-dark', HOTELER_TEMPLATE_URI . '/assets/css/style-main-dark.css' );
			}

			//Dynamic Style
			if ( !is_multisite() ) {
				if ( mascot_core_hoteler_plugin_installed() && file_exists( HOTELER_ASSETS_DIR . '/css/dynamic-style.css' ) ) {
					wp_enqueue_style( 'hoteler-dynamic-style', HOTELER_TEMPLATE_URI . '/assets/css/dynamic-style.css' );
				}
			} else {
				if ( mascot_core_hoteler_plugin_installed() && file_exists( HOTELER_ASSETS_DIR . '/css/dynamic-style-msid-' . hoteler_get_multisite_blog_id() . '.css' ) ) {
					wp_enqueue_style( 'hoteler-dynamic-style', HOTELER_TEMPLATE_URI . '/assets/css/dynamic-style-msid-' . hoteler_get_multisite_blog_id() . '.css' );
				}
			}


			//Custom Typography
			$mascot_custom_typography = hoteler_mascot_custom_typography();
			if ( !empty($mascot_custom_typography)) {
				wp_enqueue_style( 'hoteler-custom-typography', HOTELER_TEMPLATE_URI . '/assets/css/typography/' . $mascot_custom_typography );
			}

		}
	}
}


if(!function_exists('hoteler_mascot_custom_typography')) {
	/**
	 * mascot_custom_typography
	 */
	function hoteler_mascot_custom_typography() {
			$mascot_custom_typography = '';
			$page_metabox_change_typography = hoteler_get_rwmb_group( 'hoteler_' . "page_mb_typography_settings", 'change_typography', hoteler_get_page_id() );

			if( $page_metabox_change_typography ) {
				//Theme Color from page meta box
				$mascot_custom_typography = hoteler_get_rwmb_group( 'hoteler_' . "page_mb_typography_settings", 'primary_typography_set', hoteler_get_page_id() );

			} else if ( !_empty( hoteler_get_redux_option( 'typography-settings-predefined-typography' ) ) ) {
				//Custom Theme Color
				$mascot_custom_typography = hoteler_get_redux_option( 'typography-settings-predefined-typography' );
			} else {
			}
			return $mascot_custom_typography;
	}
}



if(!function_exists('hoteler_action_theme_admin_enqueue_scripts')) {
	/**
	 * Add Admin Scripts
	 */
	function hoteler_action_theme_admin_enqueue_scripts() {
		wp_enqueue_style( 'font-awesome', HOTELER_TEMPLATE_URI . '/assets/css/font-awesome5.min.css' );
		wp_enqueue_style( 'hoteler-custom-admin', HOTELER_TEMPLATE_URI . '/admin/assets/css/custom-admin.css' );
		wp_enqueue_script( 'hoteler-admin', HOTELER_TEMPLATE_URI . '/admin/assets/js/admin.js', array('jquery'), null, true );
	}
}



if(!function_exists('hoteler_detect_elementor_and_add_class')) {
	/**
	 * Detect Elementor Enabled in Page Content and then add class to body
	 */
	function hoteler_detect_elementor_and_add_class( $classes ) {
		$elementor_enabled = false;
		if ( did_action( 'elementor/loaded' ) ) {
			$elementor_enabled = true;
		}
		if (  is_archive() ) {
			$classes[] = 'tm_elementor_page_status_false';
		} else if (  is_search() ) {
			$classes[] = 'tm_elementor_page_status_false';
		} else if ( is_singular( 'portfolio-items' ) ) {
			$classes[] = 'tm_elementor_page_status_false';
		} else if ( $elementor_enabled != 'false' && $elementor_enabled == true ) {
			$classes[] = 'tm_elementor_page_status_true';
		} else {
			$classes[] = 'tm_elementor_page_status_false';
		}
		return $classes;
	}
	add_filter( 'body_class','hoteler_detect_elementor_and_add_class' );
}



if(!function_exists('hoteler_google_fonts_url')) {
	/**
	 * @return string Google fonts URL
	 */
	function hoteler_google_fonts_url() {
		$fonts_url = '';
		$fonts     = array();
		$subsets   = 'latin,latin-ext';

		//fonts
		$fonts = apply_filters( 'hoteler_google_web_fonts', $fonts );

		//font subsets
		$subsets = apply_filters('hoteler_google_font_subset', 'latin,latin-ext');

		if ( !empty( $fonts ) ) {
			foreach ($fonts as $key => $value) {
				$fonts[$key] = "family=" . $value;
			}
		}
		$fonts_url = implode( '&', $fonts );
		$fonts_url = '//fonts.googleapis.com/css2?' . $fonts_url. '&display=swap';

		return $fonts_url;
	}
}


if(!function_exists('hoteler_primary_google_fonts')) {
	/**
	 * @return array font family needed
	 */
	function hoteler_primary_google_fonts( $fonts ) {
		$mascot_custom_typography = hoteler_mascot_custom_typography();
		$fileName = str_replace(".css", "", $mascot_custom_typography);
		if( isset($fileName) && file_exists( HOTELER_ASSETS_DIR . '/scss/typography-php/'.$fileName.'.php' ) ) {
			$fonts_container = array('fonts' => &$fonts);
			get_template_part( 'assets/scss/typography-php/'.$fileName, null, $fonts_container );
		} else {
				$fonts[] = 'Gilda+Display:wght@400';
				$fonts[] = 'Barlow:wght@400;500;600;700;800;900';
				$fonts[] = 'Barlow+Condensed:wght@400;500;600;700;800;900';
		}
		return $fonts;
	}
	add_filter( 'hoteler_google_web_fonts', 'hoteler_primary_google_fonts' );
}

if(!function_exists('hoteler_wrap_embed_with_div')) {
	function hoteler_wrap_embed_with_div( $cache, $url, $attr, $post_ID ) {
		$classes = array();

		// Add these classes to all embeds.
		$classes_all = array(
			'tm-responsive-video-wrapper',
		);

		// Check for different providers and add appropriate classes.

		if ( false !== strpos( $url, 'vimeo.com' ) ) {
			$classes[] = 'tm-responsive-video';
			$classes[] = 'video-vimeo';
		}

		if ( false !== strpos( $url, 'youtube.com' ) ) {
			$classes[] = 'tm-responsive-video';
			$classes[] = 'video-youtube';
		}

		if ( false !== strpos( $url, 'wordpress.tv' ) ) {
			$classes[] = 'tm-responsive-video';
			$classes[] = 'video-videopress';
		}

		$classes = array_merge( $classes, $classes_all );

		return '<div class="' . esc_attr( implode( ' ', $classes ) ) . '">' . $cache . '</div>';
	}
	add_filter( 'embed_oembed_html', 'hoteler_wrap_embed_with_div', 99, 4 );
}

if(!function_exists('hoteler_override_mce_options')) {
	function hoteler_override_mce_options($initArray) {
		$opts = '*[*]';
		$initArray['valid_elements'] = $opts;
		$initArray['extended_valid_elements'] = $opts;
		return $initArray;
	}
	add_filter('tiny_mce_before_init', 'hoteler_override_mce_options');
}


//to hide specific fields in reservation form
add_filter( 'kodelisting_room_reservation_form_hide_fields', 'tm_check_reservation_form_hide_fields' );
function tm_check_reservation_form_hide_fields( $fields ) {
	return array(
		'room' => false,
		'adult' => false,
		'child' => false
	);
}