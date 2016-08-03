<?php 
function vssgroup_theme_features()  {
	global $wp_version;
    /*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on VSSGroup Theme, use a find and replace
	 * to change 'vssgroup_theme' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'vssgroup_theme', get_template_directory() . '/languages' );
	
	// Add theme support for Custom Background
	$background_args = array(
		'default-color'          => '#cccccc',
		'default-image' 		 => get_template_directory_uri() . '/img/bk-new.png',
		'wp-head-callback'       => '_custom_background_cb',
		'admin-head-callback'    => '',
		'admin-preview-callback' => '',
	);
	add_theme_support( 'custom-background', $background_args );

	// Add theme support for Custom Header
	$header_args = array(
		'default-image'          => '',
        'random-default'         => false,
        'width'                  => '',
        'height'                 => '',
        'flex-height'            => true,
        'flex-width'             => true,
        'default-text-color'     => '',
        'header-text'            => true,
        'uploads'                => true,
        'wp-head-callback'       => '',
        'admin-head-callback'    => '',
        'admin-preview-callback' => ''
	);
		add_theme_support( 'custom-header', $header_args );

    // Register nav menu locations
    register_nav_menus( array(
        'header' => 'Header Menu',
        'footer' => 'Footer Menu'
    ) );

	// post thumbnail support 
	add_theme_support( "post-thumbnails" ); 

	add_theme_support( "title-tag" );

	add_theme_support( "automatic-feed-links" );

	}
	
// Hook into the 'after_setup_theme' action
add_action( 'after_setup_theme', 'vssgroup_theme_features' ); 

add_action( 'widgets_init', 'vssgroup_theme_widgets_init' );
	function vssgroup_theme_widgets_init() {
		register_sidebar( array(
			'name' => __( 'Sidebar', 'vssgroup_theme' ),
			'id' => 'sidebar-1',
			'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'vssgroup_theme' ),
			'before_widget' => '<li id="%1$s" class="widget %2$s">',
			'after_widget'  => '</li>',
			'before_title'  => '<h2 class="widgettitle">',
			'after_title'   => '</h2>',
		) );
	}

// pagination code
require_once('functions/vss-pagination.php');
// Register and load the widget
require_once('widgets/vss-recent-project.php');
// Customizer Setting Page
require_once('functions/customizer.php');

function vssgroup_wpb_load_widget() {
	register_widget( 'vssgroup_wpb_widget' );
}
add_action( 'widgets_init', 'vssgroup_wpb_load_widget' );

// Content width code 
	if ( ! isset( $content_width ) ) 
		{
			$content_width = 900;
		}

// jquery enqueue
function vssgroup_wp_enqueue_scripts() {
		wp_enqueue_script('vssgroup-bootstrap-min', get_template_directory_uri() . "/js/bootstrap.min.js", array('jquery'), '', false);
		wp_enqueue_script('vssgroup-bxslider', get_template_directory_uri() . "/js/jquery.bxslider.js", array('jquery'), '', false);
		wp_enqueue_script('vssgroup-carousel', get_template_directory_uri() . "/js/owl.carousel.js", array('jquery'), '', false);
		wp_enqueue_script('vssgroup-carousel-min', get_template_directory_uri() . "/js/owl.carousel.min.js", array('jquery'), '', false);
		wp_enqueue_script('vssgroup-script', get_template_directory_uri() . "/js/script.js", array('jquery'), '', false);
		wp_enqueue_script('vssgroup-theme', get_template_directory_uri() . "/js/vssgroup-theme.js", array('jquery'), '', false);
		wp_enqueue_script('vssgroup-animation', get_template_directory_uri() . "/js/vssgroup-animation-code.js", array('jquery'), '', false);
		wp_enqueue_script( 'comment-reply' );
}
add_action('wp_enqueue_scripts', 'vssgroup_wp_enqueue_scripts');

// css enqueue
function vssgroup_wp_enqueue_style() {
   wp_enqueue_style( 'vssgroup-style', get_template_directory_uri() .'/css/style.css', false, '1.0.0' );
   wp_enqueue_style( 'vssgroup-bootstrap', get_template_directory_uri() .'/css/bootstrap.min.css', false, '1.0.0' );
   wp_enqueue_style( 'vssgroup-bootstrap-theme', get_template_directory_uri() .'/css/bootstrap-theme.min.css', false, '1.0.0' );
   wp_enqueue_style( 'vssgroup-bxslider', get_template_directory_uri() .'/css/jquery.bxslider.css', false, '1.0.0' );
   wp_enqueue_style( 'vssgroup-carousel', get_template_directory_uri() .'/css/owl.carousel.css', false, '1.0.0' );
   wp_enqueue_style( 'vssgroup-theme', get_template_directory_uri() .'/css/owl.theme.default.min.css', false, '1.0.0' );
   wp_enqueue_style( 'vssgroup-googlefont', 'https://fonts.googleapis.com/css?family=EB+Garamond', false, '1.0.0' );
   wp_enqueue_style( 'vssgroup-animate', get_template_directory_uri() .'/css/vssgroup-animate.css', false, '1.0.0' );
}
add_action('wp_enqueue_scripts', 'vssgroup_wp_enqueue_style');


require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'vssgroup_theme_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register two plugins - one included with the TGMPA library
 * and one from the .org repo.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function vssgroup_theme_register_required_plugins() {

    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(

       
        array(
            'name'      => 'Custom Post Type UI',
            'slug'      => 'custom-post-type-ui',
            'required'  => false,
        ) ,
		array(
            'name'      => 'Meta Slider',
            'slug'      => 'ml-slider',
            'required'  => false,
        ) ,
		array(
            'name'      => 'Easy Logo Slider',
            'slug'      => 'easy-logo-slider',
            'required'  => false,
        ),
		array(
            'name'      => 'Contact Form 7',
            'slug'      => 'contact-form-7',
            'required'  => false,
        )
		
    );

    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
   $config = array(
		'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.

		/*
		'strings'      => array(
			'page_title'                      => __( 'Install Required Plugins', 'theme-slug' ),
			'menu_title'                      => __( 'Install Plugins', 'theme-slug' ),
			'installing'                      => __( 'Installing Plugin: %s', 'theme-slug' ), // %s = plugin name.
			'oops'                            => __( 'Something went wrong with the plugin API.', 'theme-slug' ),
			'notice_can_install_required'     => _n_noop(
				'This theme requires the following plugin: %1$s.',
				'This theme requires the following plugins: %1$s.',
				'theme-slug'
			), // %1$s = plugin name(s).
			'notice_can_install_recommended'  => _n_noop(
				'This theme recommends the following plugin: %1$s.',
				'This theme recommends the following plugins: %1$s.',
				'theme-slug'
			), // %1$s = plugin name(s).
			'notice_cannot_install'           => _n_noop(
				'Sorry, but you do not have the correct permissions to install the %1$s plugin.',
				'Sorry, but you do not have the correct permissions to install the %1$s plugins.',
				'theme-slug'
			), // %1$s = plugin name(s).
			'notice_ask_to_update'            => _n_noop(
				'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
				'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
				'theme-slug'
			), // %1$s = plugin name(s).
			'notice_ask_to_update_maybe'      => _n_noop(
				'There is an update available for: %1$s.',
				'There are updates available for the following plugins: %1$s.',
				'theme-slug'
			), // %1$s = plugin name(s).
			'notice_cannot_update'            => _n_noop(
				'Sorry, but you do not have the correct permissions to update the %1$s plugin.',
				'Sorry, but you do not have the correct permissions to update the %1$s plugins.',
				'theme-slug'
			), // %1$s = plugin name(s).
			'notice_can_activate_required'    => _n_noop(
				'The following required plugin is currently inactive: %1$s.',
				'The following required plugins are currently inactive: %1$s.',
				'theme-slug'
			), // %1$s = plugin name(s).
			'notice_can_activate_recommended' => _n_noop(
				'The following recommended plugin is currently inactive: %1$s.',
				'The following recommended plugins are currently inactive: %1$s.',
				'theme-slug'
			), // %1$s = plugin name(s).
			'notice_cannot_activate'          => _n_noop(
				'Sorry, but you do not have the correct permissions to activate the %1$s plugin.',
				'Sorry, but you do not have the correct permissions to activate the %1$s plugins.',
				'theme-slug'
			), // %1$s = plugin name(s).
			'install_link'                    => _n_noop(
				'Begin installing plugin',
				'Begin installing plugins',
				'theme-slug'
			),
			'update_link' 					  => _n_noop(
				'Begin updating plugin',
				'Begin updating plugins',
				'theme-slug'
			),
			'activate_link'                   => _n_noop(
				'Begin activating plugin',
				'Begin activating plugins',
				'theme-slug'
			),
			'return'                          => __( 'Return to Required Plugins Installer', 'theme-slug' ),
			'plugin_activated'                => __( 'Plugin activated successfully.', 'theme-slug' ),
			'activated_successfully'          => __( 'The following plugin was activated successfully:', 'theme-slug' ),
			'plugin_already_active'           => __( 'No action taken. Plugin %1$s was already active.', 'theme-slug' ),  // %1$s = plugin name(s).
			'plugin_needs_higher_version'     => __( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'theme-slug' ),  // %1$s = plugin name(s).
			'complete'                        => __( 'All plugins installed and activated successfully. %1$s', 'theme-slug' ), // %s = dashboard link.
			'contact_admin'                   => __( 'Please contact the administrator of this site for help.', 'tgmpa' ),

			'nag_type'                        => 'updated', // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
		),
		*/
	);

	tgmpa( $plugins, $config );
}

	function vssgroup_custom_excerpt_length( $length ) {
	return 25;
	}
	add_filter( 'excerpt_length', 'vssgroup_custom_excerpt_length', 999 );
	
	add_filter( "the_excerpt", "vssgroup_add_class_to_excerpt" );
	function vssgroup_add_class_to_excerpt( $excerpt ) {
		return str_replace('<p', '<p class="home-blog-text"', $excerpt);
	}

