<?php
/**
* @Theme Name	:	Corporate Prime
* @file         :	home-client.php
* @package      :	corporate-prime
* @author       :	Theme Farmer
* @license      :	readme.txt
* @filesource   :	wp-content/themes/corporate-prime/templates/home-client.php
*/
global $corporate_prime_theme_data; 
$theme_data = $corporate_prime_theme_data;
?>
	<!-- Clients Start -->
	<div class="container-fluid c_space c_client">
		<div class="row section_heading">
			<h1 class="section_title"><?php echo esc_html($theme_data['home_client_title']); ?></h1>
			<p class="section_title_description"><?php echo esc_html($theme_data['home_client_desc']); ?></p>
		</div>
		<div class="container">
			<div class="swiper-container swiper3">
				<div class="swiper-wrapper">
					<div class="swiper-slide">
						<div class="img-thumbnail">
							<img src="<?php echo esc_url($theme_data['client_image_one']); ?>" class="img-responsive" alt=""/>
						</div>
					</div>
					<div class="swiper-slide">
						<div class="img-thumbnail">
							<img src="<?php echo esc_url($theme_data['client_image_two']); ?>" class="img-responsive" alt=""/>
						</div>
					</div>
					<div class="swiper-slide">
						<div class="img-thumbnail">
							<img src="<?php echo esc_url($theme_data['client_image_three']); ?>" class="img-responsive" alt=""/>
						</div>
					</div>
				</div>
				<div class="swiper-pagination swiper-pagination3"></div>
				<div class="swiper-button-prev swiper-button-prev3 "></div>
				<div class="swiper-button-next swiper-button-next3 "></div>
			</div>
		</div>
	</div>
	<!-- Clients End -->