<?php
function corporate_prime_set_theme_var() {
	global $corporate_prime_theme_data;
	$slide_one_id   = get_theme_mod('corporate_prime_slider_one', 0);
	$slide_two_id   = get_theme_mod('corporate_prime_slider_two', 0);
	$slide_three_id = get_theme_mod('corporate_prime_slider_three', 0);

	$corporate_prime_theme_data = array(

		'social_link_open_in_new_tab' => get_theme_mod('corporate_prime_social_link_open_in_new_tab', true),
		'social_link_facebook'        => get_theme_mod('corporate_prime_social_link_facebook', ''),
		'social_link_google'          => get_theme_mod('corporate_prime_social_link_google', ''),
		'social_link_youtube'         => get_theme_mod('corporate_prime_social_link_youtube', ''),
		'social_link_twitter'         => get_theme_mod('corporate_prime_social_link_twitter', ''),
		'social_link_linkedin'        => get_theme_mod('corporate_prime_social_link_linkedin', ''),
		'top_email'                   => get_theme_mod('corporate_prime_top_email', ''),
		'top_phone'                   => get_theme_mod('corporate_prime_top_phone', ''),

		'hide_demo_slider'            => get_theme_mod('corporate_prime_hide_demo_slider', false),
		'slide_1'                     => ($slide_one_id) ? get_post($slide_one_id) : (object) array('post_title' => __('Slide One Title', 'corporate-prime'), 'post_content' => __('Slide One Description', 'corporate-prime')),
		'slide_2'                     => ($slide_two_id) ? get_post($slide_two_id) : (object) array('post_title' => __('Slide Two Title', 'corporate-prime'), 'post_content' => __('Slide Two Description', 'corporate-prime')),
		'slide_3'                     => ($slide_three_id) ? get_post($slide_three_id) : (object) array('post_title' => __('Slide Three Title', 'corporate-prime'), 'post_content' => __('Slide Three Description', 'corporate-prime')),

		'slider_image_one'            => ($slide_one_id)?wp_get_attachment_image_src(get_post_thumbnail_id($slide_one_id), 'full')[0]:get_template_directory_uri() . '/images/slider1.jpg',
		'slider_image_two'            => ($slide_two_id)?wp_get_attachment_image_src(get_post_thumbnail_id($slide_two_id), 'full')[0]:get_template_directory_uri() . '/images/slider2.jpg',
		'slider_image_three'          => ($slide_three_id)?wp_get_attachment_image_src(get_post_thumbnail_id($slide_three_id), 'full')[0]:get_template_directory_uri() . '/images/slider3.jpg',

		'slide_button_text'           => get_theme_mod('corporate_prime_slide_button_text', __('Click To Begin', 'corporate-prime')),
		'slide_button_link'           => get_theme_mod('corporate_prime_slide_button_link', ''),

		'services_header_text'        => get_theme_mod('corporate_prime_services_header_text', __('Our Service', 'corporate-prime')),
		'services_desc_text'          => get_theme_mod('corporate_prime_services_desc_text', __('Service description text. Service description text. Service description text. Service description text.', 'corporate-prime')),
		'services_1_title'            => get_theme_mod('corporate_prime_services_1_title', __('Service One', 'corporate-prime')),
		'services_1_desc'             => get_theme_mod('corporate_prime_services_1_desc', __('Service description text. Service description text. Service description text. Service description text.', 'corporate-prime')),
		'services_2_title'            => get_theme_mod('corporate_prime_services_2_title', __('Service Two', 'corporate-prime')),
		'services_2_desc'             => get_theme_mod('corporate_prime_services_2_desc', __('Service description text. Service description text. Service description text. Service description text.', 'corporate-prime')),
		'services_3_title'            => get_theme_mod('corporate_prime_services_3_title', __('Service Three', 'corporate-prime')),
		'services_3_desc'             => get_theme_mod('corporate_prime_services_3_desc', __('Service description text. Service description text. Service description text. Service description text.', 'corporate-prime')),

		'home_latest_news_title'      => get_theme_mod('corporate_prime_home_latest_news_title', __('Latest News', 'corporate-prime')),
		'home_latest_news_desc'       => get_theme_mod('corporate_prime_home_latest_news_desc', __('Be updated with latest news', 'corporate-prime')),

		'home_client_title'           => get_theme_mod('corporate_prime_home_client_title', __('Our Clients', 'corporate-prime')),
		'home_client_desc'            => get_theme_mod('corporate_prime_home_client_desc', __('We have awesome client list', 'corporate-prime')),
		'client_image_one'            => get_theme_mod('corporate_prime_client_image_one', esc_url(get_template_directory_uri() . '/images/c2.png')),
		'client_image_two'            => get_theme_mod('corporate_prime_client_image_two', esc_url(get_template_directory_uri() . '/images/c2.png')),
		'client_image_three'          => get_theme_mod('corporate_prime_client_image_three', esc_url(get_template_directory_uri() . '/images/c2.png')),
	);
}

?>