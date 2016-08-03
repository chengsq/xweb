<?php
/**
* @Theme Name	:	Corporate Prime
* @file         :	home-slider.php
* @package      :	corporate-prime
* @author       :	Theme Farmer
* @license      :	readme.txt
* @filesource   :	wp-content/themes/corporate-prime/templates/home-slider.php
*/
global $corporate_prime_theme_data; 
$theme_data = $corporate_prime_theme_data;
?>
	<!-- Slider Start -->
	<?php if(!$theme_data['hide_demo_slider']):?>
	<div class="row c_slider">
		<div class="swiper-container swiper1">
			<div class="swiper-wrapper">
				<div class="swiper-slide">
					<img src="<?php echo esc_url($theme_data['slider_image_one']); ?>" class="img-responsive" alt="" />
					<div class="overlay"></div>
					<div class="carousel-caption">
						<h1 class="animation animated-item-1"><?php echo esc_html($theme_data['slide_1']->post_title); ?></h1>
						<p class="animation animated-item-2"><?php echo esc_html($theme_data['slide_1']->post_content); ?></p>
						<a href="<?php echo esc_url($theme_data['slide_button_link']); ?>" class="btn s_link animation animated-item-3"> <?php echo esc_html($theme_data['slide_button_text']); ?> </a>
					</div>
				</div>
				<div class="swiper-slide">
					<img src="<?php echo esc_url($theme_data['slider_image_two']); ?>" class="img-responsive" alt="" />
					<div class="overlay"></div>
					<div class="carousel-caption">
						<h1 class="animation animated-item-1"><?php echo esc_html($theme_data['slide_2']->post_title); ?></h1>
						<p class="animation animated-item-2"><?php echo esc_html($theme_data['slide_2']->post_content); ?></p>
						<a href="<?php echo esc_url($theme_data['slide_button_link']); ?>" class="btn s_link animation animated-item-3"> <?php echo esc_html($theme_data['slide_button_text']); ?> </a>
					</div>
				</div>
				<div class="swiper-slide">
					<img src="<?php echo esc_url($theme_data['slider_image_three']); ?>" class="img-responsive" alt="" />
					<div class="overlay"></div>
					<div class="carousel-caption">
						<h1 class="animation animated-item-1"><?php echo esc_html($theme_data['slide_3']->post_title); ?></h1>
						<p class="animation animated-item-2"><?php echo esc_html($theme_data['slide_3']->post_content); ?></p>
						<a href="<?php echo esc_url($theme_data['slide_button_link']); ?>" class="btn s_link animation animated-item-3"> <?php echo esc_html($theme_data['slide_button_text']); ?> </a>
					</div>
				</div>
			</div>
			 <!-- Add Pagination -->
			<div class="swiper-pagination swiper-pagination1"></div>
			<!-- Add Arrows -->
			<div class="swiper-button-prev swiper-button-prev1"></div>
			<div class="swiper-button-next swiper-button-next1"></div>
		</div>
	</div>
	<!-- Slider End -->
    <?php endif; ?>
    