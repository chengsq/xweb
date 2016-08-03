<?php

function corporate_prime_upgrade_control($wp_customize) {

	class Corporate_Prime_Page_Dropdown_Control extends WP_Customize_Control {

		public function render_content() {
			$pages = get_pages(array('hide_empty' => false));
			if (!empty($pages)): ?>
            <label>
              	<span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
              	<select <?php $this->link();?>>
                <option value="0"><?php esc_html_e('Select Page', 'corporate-prime');?></option>
              	<?php
					foreach ($pages as $page):
						if(has_post_thumbnail($page)):
						printf('<option value="%s" %s>%s</option>',
							$page->ID,
							selected($this->value(), $page->ID, false),
							$page->post_title
						);
						endif;
					endforeach;
				?>
              	</select>
            </label>
          	<?php
			endif;
		}
	}

	class Corporate_Prime_Pro_Customize_Control extends WP_Customize_Control {

		public function render_content() {
			?>
            <div class="theme-farmer-pro">
              <div class="pro-vesrion">
                <div class="">
                  <img src="<?php echo get_template_directory_uri() . '/screenshot.png'; ?>" />
                </div>
                <?php _e('The Pro Version gives you more opportunities to enhance your site and business. In order to create effective online presence one have to showcase their wide range of products, have to use contact us enquiry form, have to make effective about us page, have to introduce team members, etc etc . The pro version will give it all. Buy the pro version and give us a chance to serve you better. ', 'corporate-prime');?>
              </div>
              <a href="<?php echo esc_url('https://www.themefarmer.com/corporate-prime/'); ?>" target="_blank" class="cdns-upgrade" id="cdns-upgrade-pro"><?php _e('UPGRADE  TO PRO ', 'corporate-prime');?></a>
            </div>
          <?php
		}

	}

	class Corporate_Prime_Slider_Note_Customize_Control extends WP_Customize_Control {

		public function render_content() {
			?>
			<div class="slider-notes">
					<?php _e('Please create page with featured image to show in select slide dropdown', 'corporate-prime');?>
			</div>
			<?php
		}

	}

	class Corporate_Prime_Sevice_Pro_Customize_Control extends WP_Customize_Control {

		public function render_content() {
			?>
            <div class="theme-farmer-pro">
              <a href="<?php echo esc_url('https://www.themefarmer.com/corporate-prime/'); ?>" target="_blank" class="cdns-upgrade" id="cdns-upgrade-sevice"><?php _e('Add More Services Get Pro', 'corporate-prime');?></a>
            </div>
          <?php
		}

	}

	class Corporate_Prime_Slider_Pro_Customize_Control extends WP_Customize_Control {

		public function render_content() {
			?>
            <div class="theme-farmer-pro">
              <a href="<?php echo esc_url('https://www.themefarmer.com/corporate-prime/'); ?>" target="_blank" class="cdns-upgrade" id="cdns-upgrade-sevice"><?php _e('Add More Slides Get Pro', 'corporate-prime');?></a>
            </div>
          <?php
}

	}

	$wp_customize->add_section('corporate_prime_upgarde_pro_section', array(
		'title'    => __('UPGRADE TO PRO VERSION', 'corporate-prime'),
		'priority' => 1000,
		'panel'    => 'corporate_prime_theme_options',
	));

	$wp_customize->add_setting('upgrade_to_pro', array(
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'corporate_prime_sanitize_html',
	));
	$wp_customize->add_control(new Corporate_Prime_Pro_Customize_Control($wp_customize, 'upgrade_to_pro', array(
		'label'   => __('Discover Corporate Prime Pro', 'corporate-prime'),
		'section' => 'corporate_prime_upgarde_pro_section',
		'setting' => 'upgrade_to_pro',
	)));

	$wp_customize->add_setting('corporate_prime_upgrade_service', array(
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'corporate_prime_sanitize_html',
	));
	$wp_customize->add_control(new Corporate_Prime_Sevice_Pro_Customize_Control($wp_customize, 'corporate_prime_upgrade_service', array(
		'label'   => __('Add More Services Get Pro', 'corporate-prime'),
		'section' => 'corporate_prime_servces_section',
		'setting' => 'corporate_prime_upgrade_service',
	)));

	$wp_customize->add_setting('corporate_prime_upgrade_slider', array(
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'corporate_prime_sanitize_html',
	));
	$wp_customize->add_control(new Corporate_Prime_Slider_Pro_Customize_Control($wp_customize, 'corporate_prime_upgrade_slider', array(
		'label'   => __('Add More Slides Get Pro', 'corporate-prime'),
		'section' => 'corporate_prime_slider_section',
		'setting' => 'corporate_prime_upgrade_slider',
	)));

}

function corporate_prime_devider_control($wp_customize) {
	class Corporate_Prime_Pro_Devider extends WP_Customize_Control {

		public function render_content() {
			?>
		        <div class="theme-farmer-saprator">
		        	<?php echo esc_html($this->label); ?>
		        </div>
		      <?php
}

	}

	function print_devider($wp_customize, $section, $id, $title) {

		$wp_customize->add_setting('corporate_prime_devider' . $id, array(
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'corporate_prime_sanitize_html',
		));
		$wp_customize->add_control(new Corporate_Prime_Pro_Devider($wp_customize, 'corporate_prime_devider' . $id, array(
			'label'    => $title,
			'section'  => $section,
			'priority' => 1,
			'setting'  => 'corporate_prime_devider' . $id,
		)));
	}

	$wp_customize->add_panel('corporate_prime_theme_options', array(
		'priority'    => 1,
		'capability'  => 'edit_theme_options',
		'title'       => __('Theme Options', 'corporate-prime'),
		'description' => __('Here you can customize theme data', 'corporate-prime'),
	));

	/** Top Bar **/

	$wp_customize->add_section('corporate_prime_top_bar_section', array(
		'title'      => __('Top Bar Settings', 'corporate-prime'),
		'priority'   => 1,
		'capability' => 'edit_theme_options',
		'panel'      => 'corporate_prime_theme_options',
	));

	$wp_customize->add_setting('corporate_prime_social_link_open_in_new_tab',
		array(
			'default'           => true,
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'sanitize_callback' => 'corporate_prime_sanitize_checkbox',
		));

	$wp_customize->add_control('corporate_prime_social_link_open_in_new_tab', array(
		'type'     => 'checkbox',
		'priority' => 200,
		'section'  => 'corporate_prime_top_bar_section',
		'label'    => __('Open social links in new tab', 'corporate-prime'),
	));

	$wp_customize->add_setting('corporate_prime_social_link_facebook',
		array(
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'sanitize_callback' => 'corporate_prime_sanitize_url',
		)
	);

	$wp_customize->add_control('corporate_prime_social_link_facebook', array(
		'type'     => 'url',
		'priority' => 200,
		'section'  => 'corporate_prime_top_bar_section',
		'label'    => __('Facebook Page URL', 'corporate-prime'),
	));

	$wp_customize->add_setting('corporate_prime_social_link_google',
		array(
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'sanitize_callback' => 'corporate_prime_sanitize_url',
		)
	);

	$wp_customize->add_control('corporate_prime_social_link_google', array(
		'type'     => 'url',
		'priority' => 200,
		'section'  => 'corporate_prime_top_bar_section',
		'label'    => __('Google Page URL', 'corporate-prime'),
	));

	$wp_customize->add_setting('corporate_prime_social_link_youtube',
		array(
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'sanitize_callback' => 'corporate_prime_sanitize_url',
		)
	);

	$wp_customize->add_control('corporate_prime_social_link_youtube', array(
		'type'     => 'url',
		'priority' => 200,
		'section'  => 'corporate_prime_top_bar_section',
		'label'    => __('Youtube Page URL', 'corporate-prime'),
	));

	$wp_customize->add_setting('corporate_prime_social_link_twitter',
		array(
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'sanitize_callback' => 'corporate_prime_sanitize_url',
		)
	);
	$wp_customize->add_control('corporate_prime_social_link_twitter', array(
		'type'     => 'url',
		'priority' => 200,
		'section'  => 'corporate_prime_top_bar_section',
		'label'    => __('Twitter Page URL', 'corporate-prime'),
	));

	$wp_customize->add_setting('corporate_prime_social_link_linkedin',
		array(
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'sanitize_callback' => 'corporate_prime_sanitize_url',
		)
	);
	$wp_customize->add_control('corporate_prime_social_link_linkedin', array(
		'type'     => 'url',
		'priority' => 200,
		'section'  => 'corporate_prime_top_bar_section',
		'label'    => __('Linkedin Page URL', 'corporate-prime'),
	));

	$wp_customize->add_setting('corporate_prime_top_email',
		array(
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'sanitize_callback' => 'corporate_prime_sanitize_nohtml',
		)
	);
	$wp_customize->add_control('corporate_prime_top_email', array(
		'type'     => 'email',
		'priority' => 200,
		'section'  => 'corporate_prime_top_bar_section',
		'label'    => __('Email', 'corporate-prime'),
	));

	$wp_customize->add_setting('corporate_prime_top_phone',
		array(
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'sanitize_callback' => 'corporate_prime_sanitize_nohtml',
		)
	);
	$wp_customize->add_control('corporate_prime_top_phone', array(
		'type'     => 'text',
		'priority' => 200,
		'section'  => 'corporate_prime_top_bar_section',
		'label'    => __('Linkedin Page URL', 'corporate-prime'),
	));

	/** Top Bar **/

	/** Slider **/

	$wp_customize->add_section('corporate_prime_slider_section', array(
		'title'      => __('Slider Settings', 'corporate-prime'),
		'priority'   => 1,
		'capability' => 'edit_theme_options',
		'panel'      => 'corporate_prime_theme_options',
	));

	$wp_customize->add_setting('corporate_prime_hide_demo_slider',
		array(
			'default'           => false,
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'sanitize_callback' => 'corporate_prime_sanitize_checkbox',
		)
	);

	$wp_customize->add_control('corporate_prime_hide_demo_slider', array(
		'type'     => 'checkbox',
		'priority' => 1,
		'section'  => 'corporate_prime_slider_section',
		'label'    => __('Hide Home Slider ', 'corporate-prime'),
	));

	$wp_customize->add_setting('corporate_prime_slider_note', array(
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'corporate_prime_sanitize_html',
	));
	$wp_customize->add_control(new Corporate_Prime_Slider_Note_Customize_Control($wp_customize, 'corporate_prime_slider_note', array(
		'label'    => __('Slider Documentation', 'corporate-prime'),
		'priority' => 1,
		'section' => 'corporate_prime_slider_section',
		'setting' => 'corporate_prime_slider_note',
	)));

	print_devider($wp_customize, 'corporate_prime_slider_section', '1', __('Slider One Settings', 'corporate-prime'));

	$wp_customize->add_setting('corporate_prime_slider_one', array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'absint',

	));
	$wp_customize->add_control(new Corporate_Prime_Page_Dropdown_Control($wp_customize, 'corporate_prime_slider_one',
		array(
			'label'    => __('Slide One Page', 'corporate-prime'),
			'section'  => 'corporate_prime_slider_section',
			'priority' => 1,
		)));
	

	print_devider($wp_customize, 'corporate_prime_slider_section', '2', __('Slider Two Settings', 'corporate-prime'));

	$wp_customize->add_setting('corporate_prime_slider_two', array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'absint',

	));
	$wp_customize->add_control(new Corporate_Prime_Page_Dropdown_Control($wp_customize, 'corporate_prime_slider_two',
		array(
			'label'    => __('Slide Two Page', 'corporate-prime'),
			'section'  => 'corporate_prime_slider_section',
			'priority' => 1,
		)));

	print_devider($wp_customize, 'corporate_prime_slider_section', '4', __('Slider Three Settings', 'corporate-prime'));

	$wp_customize->add_setting('corporate_prime_slider_three', array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'absint',

	));
	$wp_customize->add_control(new Corporate_Prime_Page_Dropdown_Control($wp_customize, 'corporate_prime_slider_three',
		array(
			'label'    => __('Slide Three Page', 'corporate-prime'),
			'section'  => 'corporate_prime_slider_section',
			'priority' => 1,
		)));

	print_devider($wp_customize, 'corporate_prime_slider_section', '2_a', __('Slider Button', 'corporate-prime'));

	$wp_customize->add_setting('corporate_prime_slide_button_text',
		array(
			'default'           => __('Click To Begin', 'corporate-prime'),
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'sanitize_callback' => 'corporate_prime_sanitize_nohtml',
		));

	$wp_customize->add_control('corporate_prime_slide_button_text', array(
		'type'     => 'text',
		'priority' => 1,
		'section'  => 'corporate_prime_slider_section',
		'label'    => __('Button Text', 'corporate-prime'),
	));

	$wp_customize->add_setting('corporate_prime_slide_button_link',
		array(
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'sanitize_callback' => 'corporate_prime_sanitize_url',
		));

	$wp_customize->add_control('corporate_prime_slide_button_link', array(
		'type'     => 'url',
		'priority' => 1,
		'section'  => 'corporate_prime_slider_section',
		'label'    => __('Button Link', 'corporate-prime'),
	));

	/** Slider **/

	/** servces **/

	$wp_customize->add_section('corporate_prime_servces_section', array(
		'title'      => __('Services Settings', 'corporate-prime'),
		'priority'   => 1,
		'capability' => 'edit_theme_options',
		'panel'      => 'corporate_prime_theme_options',
	));

	$wp_customize->add_setting('corporate_prime_services_header_text',
		array(
			'default'           => __('Service Heading Text', 'corporate-prime'),
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control('corporate_prime_services_header_text', array(
		'type'     => 'text',
		'priority' => 1,
		'section'  => 'corporate_prime_servces_section',
		'label'    => __('Title Text', 'corporate-prime'),
	));

	$wp_customize->add_setting('corporate_prime_services_desc_text',
		array(
			'default'           => __('Service description text', 'corporate-prime'),
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		));

	$wp_customize->add_control('corporate_prime_services_desc_text', array(
		'type'     => 'text',
		'priority' => 1,
		'section'  => 'corporate_prime_servces_section',
		'label'    => __('Description Text', 'corporate-prime'),
	));

	print_devider($wp_customize, 'corporate_prime_servces_section', '5', __('Services One', 'corporate-prime'));

	$wp_customize->add_setting('corporate_prime_services_1_title',
		array(
			'default'           => __('Service One Title', 'corporate-prime'),
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control('corporate_prime_services_1_title', array(
		'type'     => 'text',
		'priority' => 1,
		'section'  => 'corporate_prime_servces_section',
		'label'    => __('Title', 'corporate-prime'),
	));

	$wp_customize->add_setting('corporate_prime_services_1_desc',
		array(
			'default'           => __('', 'corporate-prime'),
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		));

	$wp_customize->add_control('corporate_prime_services_1_desc', array(
		'type'     => 'text',
		'priority' => 1,
		'section'  => 'corporate_prime_servces_section',
		'label'    => __('Description', 'corporate-prime'),
	));

	print_devider($wp_customize, 'corporate_prime_servces_section', '6', __('Services Two', 'corporate-prime'));

	$wp_customize->add_setting('corporate_prime_services_2_title',
		array(
			'default'           => __('Service Two Title', 'corporate-prime'),
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control('corporate_prime_services_2_title', array(
		'type'     => 'text',
		'priority' => 1,
		'section'  => 'corporate_prime_servces_section',
		'label'    => __('Title', 'corporate-prime'),
	));

	$wp_customize->add_setting('corporate_prime_services_2_desc',
		array(
			'default'           => __('', 'corporate-prime'),
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		));

	$wp_customize->add_control('corporate_prime_services_2_desc', array(
		'type'     => 'text',
		'priority' => 1,
		'section'  => 'corporate_prime_servces_section',
		'label'    => __('Description', 'corporate-prime'),
	));

	print_devider($wp_customize, 'corporate_prime_servces_section', '7', __('Services Three', 'corporate-prime'));

	$wp_customize->add_setting('corporate_prime_services_3_title',
		array(
			'default'           => __('Service Three Title', 'corporate-prime'),
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control('corporate_prime_services_3_title', array(
		'type'     => 'text',
		'priority' => 1,
		'section'  => 'corporate_prime_servces_section',
		'label'    => __('Title', 'corporate-prime'),
	));

	$wp_customize->add_setting('corporate_prime_services_3_desc',
		array(
			'default'           => __('', 'corporate-prime'),
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		));

	$wp_customize->add_control('corporate_prime_services_3_desc', array(
		'type'     => 'text',
		'priority' => 1,
		'section'  => 'corporate_prime_servces_section',
		'label'    => __('Description', 'corporate-prime'),
	));

	/** servces **/

	/* Latest Posts*/

	$wp_customize->add_section('corporate_prime_home_latest_news_section', array(
		'title'      => __('Latest News Settings', 'corporate-prime'),
		'priority'   => 1,
		'capability' => 'edit_theme_options',
		'panel'      => 'corporate_prime_theme_options',
	));

	$wp_customize->add_setting('corporate_prime_home_latest_news_title',
		array(
			'default'           => __('Latest News', 'corporate-prime'),
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		));

	$wp_customize->add_control('corporate_prime_home_latest_news_title', array(
		'type'     => 'text',
		'priority' => 1,
		'section'  => 'corporate_prime_home_latest_news_section',
		'label'    => __('Heading', 'corporate-prime'),
	));

	$wp_customize->add_setting('corporate_prime_home_latest_news_desc',
		array(
			'default'           => __('Be updated with latest news', 'corporate-prime'),
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		));

	$wp_customize->add_control('corporate_prime_home_latest_news_desc', array(
		'type'     => 'textarea',
		'priority' => 1,
		'section'  => 'corporate_prime_home_latest_news_section',
		'label'    => __('Description', 'corporate-prime'),
	));

	/* Latest Posts*/

	/* Clients */
	$wp_customize->add_section('corporate_prime_home_client_section', array(
		'title'      => __('Clients Settings', 'corporate-prime'),
		'priority'   => 1,
		'capability' => 'edit_theme_options',
		'panel'      => 'corporate_prime_theme_options',
	));

	$wp_customize->add_setting('corporate_prime_home_client_title',
		array(
			'default'           => __('Our Clients', 'corporate-prime'),
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		));

	$wp_customize->add_control('corporate_prime_home_client_title', array(
		'type'     => 'text',
		'priority' => 1,
		'section'  => 'corporate_prime_home_client_section',
		'label'    => __('Heading', 'corporate-prime'),
	));

	$wp_customize->add_setting('corporate_prime_home_client_desc',
		array(
			'default'           => __('We have awesome client list', 'corporate-prime'),
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		));

	$wp_customize->add_control('corporate_prime_home_client_desc', array(
		'type'     => 'textarea',
		'priority' => 1,
		'section'  => 'corporate_prime_home_client_section',
		'label'    => __('Description', 'corporate-prime'),
	));

	$wp_customize->add_setting('corporate_prime_client_image_one', array(
		'default'           => get_template_directory_uri() . '/images/c2.png',
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'corporate_prime_sanitize_url',

	));
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'corporate_prime_client_image_one',
		array(
			'label'    => __('Upload Client Image One', 'corporate-prime'),
			'section'  => 'corporate_prime_home_client_section',
			'priority' => 1,
		)));

	$wp_customize->add_setting('corporate_prime_client_image_two', array(
		'default'           => get_template_directory_uri() . '/images/c2.png',
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'corporate_prime_sanitize_url',

	));
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'corporate_prime_client_image_two',
		array(
			'label'    => __('Upload Client Image Two', 'corporate-prime'),
			'section'  => 'corporate_prime_home_client_section',
			'priority' => 1,
		)));

	$wp_customize->add_setting('corporate_prime_client_image_three', array(
		'default'           => get_template_directory_uri() . '/images/c2.png',
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'corporate_prime_sanitize_url',

	));
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'corporate_prime_client_image_three',
		array(
			'label'    => __('Upload Client Image Three', 'corporate-prime'),
			'section'  => 'corporate_prime_home_client_section',
			'priority' => 1,
		)));

	/* Clients */

	$wp_customize->get_section('title_tagline')->priority     = 10;
	$wp_customize->get_section('static_front_page')->priority = 30;
	$wp_customize->get_section('header_image')->priority      = 50;
}

add_action('customize_register', 'corporate_prime_upgrade_control');
add_action('customize_register', 'corporate_prime_devider_control');

?>
