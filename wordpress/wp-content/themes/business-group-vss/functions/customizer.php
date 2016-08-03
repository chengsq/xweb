<?php
/**
 * vssgroup_theme Theme Customizer
 *
 * @package vssgroup_theme 
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function vssgroup_customize_register( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	$wp_customize->get_setting( 'background_color' )->transport = 'postMessage';
	
	$wp_customize->get_control( 'display_header_text' )->label = __( 'Display Site Tagline', 'vssgroup_theme' );
	
	/* Add the logo section. */
	$wp_customize->add_section( 'vssgroup_logo_upload_ses', array(
		'title'      => esc_html__( 'Logo', 'vssgroup_theme' ),
		'priority'   => 30,
	) );

	/* Add the 'logo' setting. */
	$wp_customize->add_setting( 'vssgroup_logo_upload', array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw'
	) );


	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize, 'vssgroup_logo_upload', array(
				'label'    => esc_html__( 'Upload custom logo.', 'vssgroup_theme' ),
				'section'  => 'vssgroup_logo_upload_ses',
				'settings' => 'vssgroup_logo_upload',
			)
		)
	);
	

	/* Add the 'Slider Shortcode' setting. */
	$wp_customize->add_section( 'vssgroup_slider_options', array(
		'title'      => esc_html__( 'Homepage Slider Option', 'vssgroup_theme' ),
		'priority'   => 30,
	) );

	/* Add the 'Slider Shortcode' setting. */
	$wp_customize->add_setting( 'vssgroup_slider_add', array(
		'default'           => '',
		'sanitize_callback' => 'vssgroup_footer_sanitize_text'
	) );


	$wp_customize->add_control(
			 'vssgroup_slider_add', array(
				'label'    => esc_html__( 'Paste Slider Shortcode Here', 'vssgroup_theme' ),
				'section'  => 'vssgroup_slider_options',
				'settings' => 'vssgroup_slider_add',
				'type' => 'textarea',
			)
	);
	
	/* Add the 'Brand Logo Shortcode' setting. */
	$wp_customize->add_section( 'vssgroup_brandlogo_options', array(
		'title'      => esc_html__( 'Homepage Brand Logo Option', 'vssgroup_theme' ),
		'priority'   => 30,
	) );

	/* Add the 'Brand Logo Shortcode' setting. */
	$wp_customize->add_setting( 'vssgroup_brandlogo_add', array(
		'default'           => '',
		'sanitize_callback' => 'vssgroup_footer_sanitize_text'
	) );


	$wp_customize->add_control(
			 'vssgroup_brandlogo_add', array(
				'label'    => esc_html__( 'Paste Brand Logo Shortcode Here', 'vssgroup_theme' ),
				'section'  => 'vssgroup_brandlogo_options',
				'settings' => 'vssgroup_brandlogo_add',
				'type' => 'textarea',
			)
	);

	
		/* Add the Social Connect Section. */
	$wp_customize->add_section( 'vssgroup_social_connect_url', array(
		'title'      => esc_html__( 'Social Connect Url', 'vssgroup_theme' ),
		'priority'   => 30,
	) );

	/* Add the 'Facebook Url' setting. */
	$wp_customize->add_setting( 'vssgroup_facebook_url', array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw'
	) );


	$wp_customize->add_control(
			 'vssgroup_facebook_url', array(
				'label'    => esc_html__( 'Give Your Facebook Url.', 'vssgroup_theme' ),
				'section'  => 'vssgroup_social_connect_url',
				'settings' => 'vssgroup_facebook_url',
				'type' => 'text',
			)
	);
	
	/* Add the 'twitter_url' setting. */
	$wp_customize->add_setting( 'vssgroup_twitter_url', array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw'
	) );


	$wp_customize->add_control(
			 'vssgroup_twitter_url', array(
				'label'    => esc_html__( 'Give Your Twiiter Url.', 'vssgroup_theme' ),
				'section'  => 'vssgroup_social_connect_url',
				'settings' => 'vssgroup_twitter_url',
				'type' => 'text',
			)
	);
	
	
	/* Add the 'Linkedin_url' setting. */
	$wp_customize->add_setting( 'vssgroup_linkedin_url', array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw'
	) );


	$wp_customize->add_control(
			 'vssgroup_linkedin_url', array(
				'label'    => esc_html__( 'Give Your Linkedin Url.', 'vssgroup_theme' ),
				'section'  => 'vssgroup_social_connect_url',
				'settings' => 'vssgroup_linkedin_url',
				'type' => 'text',
			)
	);
	
	
	/* Add the Copyright Text  Section. */
	$wp_customize->add_section( 'vssgroup_footer_options', array(
		'title'      => esc_html__( 'Footer Options', 'vssgroup_theme' ),
		'priority'   => 30,
	) );

	/* Add the 'Copyright Text' setting. */
	$wp_customize->add_setting( 'vssgroup_copy_name', array(
		'default'           => '',
		'sanitize_callback' => 'vssgroup_footer_sanitize_text'
	) );


	$wp_customize->add_control(
			 'vssgroup_copy_name', array(
				'label'    => esc_html__( 'Copyright Text.', 'vssgroup_theme' ),
				'section'  => 'vssgroup_footer_options',
				'settings' => 'vssgroup_copy_name',
				'type' => 'text',
			)
	);
	
	/* Add the 'Designed Company Url' setting. */
	$wp_customize->add_setting( 'vssgroup_design_url', array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw'
	) );


	$wp_customize->add_control(
			 'vssgroup_design_url', array(
				'label'    => esc_html__( 'Designed Company Url', 'vssgroup_theme' ),
				'section'  => 'vssgroup_footer_options',
				'settings' => 'vssgroup_design_url',
				'type' => 'text',
			)
	);
	
	/* Add the 'Designed Company Url' setting. */
	$wp_customize->add_setting( 'vssgroup_design_name', array(
		'default'           => '',
		'sanitize_callback' => 'vssgroup_footer_sanitize_text'
	) );


	$wp_customize->add_control(
			 'vssgroup_design_name', array(
				'label'    => esc_html__( 'Designed Company Name', 'vssgroup_theme' ),
				'section'  => 'vssgroup_footer_options',
				'settings' => 'vssgroup_design_name',
				'type' => 'text',
			)
	);
	
	/* Add the 'Contact Page' setting. */
	$wp_customize->add_section( 'vssgroup_contact_options', array(
		'title'      => esc_html__( 'Contact Page Options', 'vssgroup_theme' ),
		'priority'   => 30,
	) );

	/* Add the 'Copyright Branch Text' setting. */
	$wp_customize->add_setting( 'vssgroup_cont_add', array(
		'default'           => '',
		'sanitize_callback' => 'vssgroup_footer_sanitize_text'
	) );


	$wp_customize->add_control(
			 'vssgroup_cont_add', array(
				'label'    => esc_html__( 'Branch Address.', 'vssgroup_theme' ),
				'section'  => 'vssgroup_contact_options',
				'settings' => 'vssgroup_cont_add',
				'type' => 'textarea',
			)
	);
	
		/* Add the 'Copyright Branch Phoneno' setting. */
	$wp_customize->add_setting( 'vssgroup_cont_phone', array(
		'default'           => '',
		'sanitize_callback' => 'vssgroup_footer_sanitize_text'
	) );


	$wp_customize->add_control(
			 'vssgroup_cont_phone', array(
				'label'    => esc_html__( 'Branch Phone No.', 'vssgroup_theme' ),
				'section'  => 'vssgroup_contact_options',
				'settings' => 'vssgroup_cont_phone',
				'type' => 'text',
			)
	);
	
	/* Add the 'Copyright Head Office Text' setting. */
	$wp_customize->add_setting( 'vssgroup_cont_head_add', array(
		'default'           => '',
		'sanitize_callback' => 'vssgroup_footer_sanitize_text'
	) );


	$wp_customize->add_control(
			 'vssgroup_cont_head_add', array(
				'label'    => esc_html__( 'Head Office Address.', 'vssgroup_theme' ),
				'section'  => 'vssgroup_contact_options',
				'settings' => 'vssgroup_cont_head_add',
				'type' => 'textarea',
			)
	);
	
		/* Add the 'Copyright Branch Phoneno' setting. */
	$wp_customize->add_setting( 'vssgroup_cont_head_phone', array(
		'default'           => '',
		'sanitize_callback' => 'vssgroup_footer_sanitize_text'
	) );


	$wp_customize->add_control(
			 'vssgroup_cont_head_phone', array(
				'label'    => esc_html__( 'Head Office Phone No.', 'vssgroup_theme' ),
				'section'  => 'vssgroup_contact_options',
				'settings' => 'vssgroup_cont_head_phone',
				'type' => 'text',
			)
	);
	
	
		/* Add the 'Contact Form Shortcode Phoneno' setting. */
	$wp_customize->add_setting( 'vssgroup_cont_form_phone', array(
		'default'           => '',
		'sanitize_callback' => 'vssgroup_footer_sanitize_text'
	) );


	$wp_customize->add_control(
			 'vssgroup_cont_form_phone', array(
				'label'    => esc_html__( 'Paste Your Contact Form 7 Shortcode', 'vssgroup_theme' ),
				'section'  => 'vssgroup_contact_options',
				'settings' => 'vssgroup_cont_form_phone',
				'type' => 'textarea',
			)
	);
}
add_action( 'customize_register', 'vssgroup_customize_register' );

// sanitize function 

function vssgroup_footer_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}

function vssgroup_customize_preview_js() {
	wp_enqueue_script( 'vssgroup_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'vssgroup_customize_preview_js' );