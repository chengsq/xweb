<?php
/**
 * Ultimate functions and definitions
 *
 * This file contains all the functions and it's defination that particularly can't be
 * in other files.
 *
 * @package Theme Horse
 * @subpackage Ultimate
 * @since Ultimate 1.0
 */
/****************************************************************************************/
add_action('wp_enqueue_scripts', 'ultimate_scripts_styles_method');
/**
 * Register jquery scripts
 */
function ultimate_scripts_styles_method() {
	global $options, $array_of_default_settings;
	$options = wp_parse_args( get_option( 'ultimate_theme_options', array() ), ultimate_get_option_defaults());
	/**
	 * Loads our main stylesheet.
	 */
	// Load our main stylesheet.
	wp_enqueue_style('ultimate_style', get_stylesheet_uri());
	wp_style_add_data('ultimate-ie', 'conditional', 'lt IE 9');
	if ('on' == $options['site_design']) {
		//Css for responsive design
		wp_enqueue_style('ultimate-responsive', get_template_directory_uri().'/css/responsive.css');
	}
	/**
	 * Adds JavaScript to pages with the comment form to support
	 * sites with threaded comments (when in use).
	 */
	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
	/**
	 * Register JQuery cycle js file for slider.
	 * Register Jquery fancybox js and css file for fancybox effect.
	 */
	wp_register_script('jquery_cycle', ULTIMATE_JS_URL.'/jquery.cycle.all.min.js', array('jquery'), '2.9999.5', true);
	 wp_register_style( 'google_fonts', '//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic' ); 
	/**
	 * Enqueue Slider setup js file.
	 * Enqueue Fancy Box setup js and css file.
	 */
	if ((is_home() || is_front_page()) && 1 != $options['disable_slider']) {
		wp_enqueue_script('ultimate_slider', ULTIMATE_JS_URL.'/ultimate-slider-setting.js', array('jquery_cycle'), false, true);
	}
	wp_enqueue_script('backtotop', ULTIMATE_JS_URL.'/backtotop.js', array('jquery'));
	wp_enqueue_script('scripts', ULTIMATE_JS_URL.'/scripts.js', array('jquery'));
	wp_enqueue_style( 'google_fonts' );
}
/****************************************************************************************/
function ultimate_add_editor_styles() {
	$font_url = str_replace( ',', '%2C', '//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic' );
	add_editor_style( $font_url );
}
add_action( 'after_setup_theme', 'ultimate_add_editor_styles' );
/****************************************************************************************/
add_action('admin_print_scripts', 'ultimate_media_js', 10);
/**
 * Register scripts for image upload
 *
 * @uses wp_register_script
 * Hooked to admin_print_scripts action hook
 */
function ultimate_media_js() {
	wp_enqueue_media();
	wp_enqueue_script('ultimate_meta_upload_widget', ULTIMATE_ADMIN_JS_URL.'/add-image-script-widget.js', array('jquery', 'media-upload', 'thickbox'));
	wp_enqueue_style('thickbox');
}
/****************************************************************************************/
add_filter('wp_page_menu', 'ultimate_wp_page_menu');
/**
 * Remove div from wp_page_menu() and replace with ul.
 * @uses wp_page_menu filter
 */
function ultimate_wp_page_menu($page_markup) {
	preg_match('/^<div class=\"([a-z0-9-_]+)\">/i', $page_markup, $matches);
	$divclass   = $matches[1];
	$replace    = array('<div class="'.$divclass.'">', '</div>');
	$new_markup = str_replace($replace, '', $page_markup);
	$new_markup = preg_replace('/^<ul>/i', '<ul class="'.$divclass.'">', $new_markup);
	return $new_markup;
}
/****************************************************************************************/
if (!function_exists('ultimate_pass_slider_effect_cycle_parameters')):
/**
 *Functions that Passes slider effect  parameters from php files to jquery file.
 */
function ultimate_pass_slider_effect_cycle_parameters() {
	global $options, $array_of_default_settings;
	$options = wp_parse_args( get_option( 'ultimate_theme_options', array() ), ultimate_get_option_defaults());
	$transition_effect   = $options['transition_effect'];
	$transition_delay    = $options['transition_delay']*1000;
	$transition_duration = $options['transition_duration']*1000;
	wp_localize_script(
		'ultimate_slider',
		'ultimate_slider_value',
		array(
			'transition_effect'   => $transition_effect,
			'transition_delay'    => $transition_delay,
			'transition_duration' => $transition_duration,
		)
	);
}
endif;
/****************************************************************************************/
add_filter('excerpt_length', 'ultimate_excerpt_length');
/**
 * Sets the post excerpt length to 50 words.
 *
 * function tied to the excerpt_length filter hook.
 *
 * @uses filter excerpt_length
 */
function ultimate_excerpt_length($length) {
	return 30;// this will return 50 words in the excerpt
}
add_filter('excerpt_more', 'ultimate_continue_reading');
/**
 * Returns a "Continue Reading" link for excerpts
 */
function ultimate_continue_reading() {
	return '&hellip; ';
}
add_filter('body_class', 'ultimate_body_class');
/**
 * Filter the body_class
 *
 * Throwing different body class for the different layouts in the body tag
 */
function ultimate_body_class($classes) {
	global $post;
	global $options, $array_of_default_settings;
	$options = wp_parse_args( get_option( 'ultimate_theme_options', array() ), ultimate_get_option_defaults());
	if ($post) {
		$layout = get_post_meta($post->ID, 'ultimate_sidebarlayout', true);
	}
	if (empty($layout) || is_archive() || is_search() || is_home()) {
		$layout = 'default';
	}
	if ('default' == $layout) {
		$themeoption_layout = $options['default_layout'];
		if ('left-sidebar' == $themeoption_layout) {
			$classes[] = 'left-sidebar-template';
		} elseif ('right-sidebar' == $themeoption_layout) {
			$classes[] = '';
		} elseif ('no-sidebar-full-width' == $themeoption_layout) {
			$classes[] = 'full-width-template';
		} elseif ('no-sidebar' == $themeoption_layout) {
			$classes[] = 'no-sidebar-template';
		}
	} elseif ('left-sidebar' == $layout) {
		$classes[] = 'left-sidebar-template';
	} elseif ('right-sidebar' == $layout) {
		$classes[] = '';//css blank
	} elseif ('no-sidebar-full-width' == $layout) {
		$classes[] = 'full-width-template';
	} elseif ('no-sidebar' == $layout) {
		$classes[] = 'no-sidebar-template';//css for no-sidebar-template from <body >
	}
	if (is_page_template('page-templates/page-template-business.php')) {
		$classes[] = 'business-layout';
	}
	if (is_page_template('page-templates/page-template-blog-image-medium.php')) {
		$classes[] = 'blog-medium';
	}
	if (is_page_template('page-templates/page-template-contact.php')) {
			$classes[] = 'contact';
	}
	if ('narrow-layout' == $options['site_layout']) {
		$classes[] = 'narrow-layout';
	}
	return $classes;
}
/****************************************************************************************/
add_action('wp_head', 'ultimate_internal_css');
/**
 * Hooks the Custom Internal CSS to head section
 */
function ultimate_internal_css() {
	global $options, $array_of_default_settings;
	$options = wp_parse_args( get_option( 'ultimate_theme_options', array() ), ultimate_get_option_defaults());
	if (!empty($options['custom_css'])) {
		$ultimate_internal_css = '<!-- '.get_bloginfo('name').' Custom CSS Styles -->'."\n";
		$ultimate_internal_css .= '<style type="text/css" media="screen">'."\n";
		$ultimate_internal_css .= $options['custom_css']."\n";
		$ultimate_internal_css .= '</style>'."\n";
	}
	if (isset($ultimate_internal_css)) {
		echo $ultimate_internal_css;
	}
}
/****************************************************************************************/
add_action('pre_get_posts', 'ultimate_alter_home');
/**
 * Alter the query for the main loop in home page
 *
 * @uses pre_get_posts hook
 */
function ultimate_alter_home($query) {
	global $options, $array_of_default_settings;
	$options = wp_parse_args( get_option( 'ultimate_theme_options', array() ), ultimate_get_option_defaults());
	$cats    = $options['front_page_category'];
	if ($options['exclude_slider_post'] != 0 && !empty($options['featured_post_slider'])) {
		if ($query->is_main_query() && $query->is_home()) {
			$query->query_vars['post__not_in'] = $options['featured_post_slider'];
		}
	}
	if (!in_array('0', $cats)) {
		if ($query->is_main_query() && $query->is_home()) {
			$query->query_vars['category__in'] = $options['front_page_category'];
		}
	}
}
/****************************************************************************************/
add_filter('wp_page_menu', 'ultimate_wp_page_menu_filter');
/**
 * @uses wp_page_menu filter hook
 */
if (!function_exists('ultimate_wp_page_menu_filter')) {
	function ultimate_wp_page_menu_filter($text) {
		$replace = array(
			'current_page_item' => 'current-menu-item',
		);
		$text = str_replace(array_keys($replace), $replace, $text);
		return $text;
	}
}
/**************************************************************************************/
function ultimate_font_url() {
	$font_url = '';
	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Lato, translate this to 'off'. Do not translate into your own language.
	 */
	if ('off' !== _x('on', 'Lato font: on or off', 'ultimate')) {
		$font_url = add_query_arg('family', urlencode('Lato:300,400,700,900,300italic,400italic,700italic'), "//fonts.googleapis.com/css");
	}
	return $font_url;
}
/**************************************************************************************/
?>
