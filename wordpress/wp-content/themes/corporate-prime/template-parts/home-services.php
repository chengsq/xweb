<?php
/**
* @Theme Name	:	Corporate Prime
* @file         :	home-services.php
* @package      :	corporate-prime
* @author       :	Theme Farmer
* @license      :	readme.txt
* @filesource   :	wp-content/themes/corporate-prime/templates/home-services.php
*/
global $corporate_prime_theme_data; 
$theme_data = $corporate_prime_theme_data;
?>
<!-- Services Start -->
<div class="container-fluid c_space c_services">
    <div class="row section_heading">
		<h1 class="section_title"><?php echo esc_html($theme_data['services_header_text']); ?></h1>
		<p class="section_title_description"><?php echo esc_html($theme_data['services_desc_text']); ?></p>
	</div>
	<div class="container">
			<div class="row c_servc gallery1">
				<div class="col-md-4 col-sm-6 corporate-ser wl-gallery">
					<div class="col-md-12 ser-icon">
						<a href="#"><i class="fa fa-desktop icon"></i></a>
					</div>
					<div class="col-md-12 ser-text">
						<h2><a href="#"><?php echo esc_html($theme_data['services_1_title']); ?></a></h2>
						<p><?php echo esc_html($theme_data['services_1_desc']); ?></p>
					</div>
				</div>
				<div class="col-md-4 col-sm-6 corporate-ser wl-gallery">
					<div class="col-md-12 ser-icon">
						<a href="#"><i class="fa fa-desktop icon"></i></a>
					</div>
					<div class="col-md-12 ser-text">
						<h2><a href="#"><?php echo esc_html($theme_data['services_2_title']); ?></a></h2>
						<p><?php echo esc_html($theme_data['services_2_desc']); ?></p>
					</div>
				</div>
				<div class="col-md-4 col-sm-6 corporate-ser wl-gallery">
					<div class="col-md-12 ser-icon">
						<a href="#"><i class="fa fa-desktop icon"></i></a>
					</div>
					<div class="col-md-12 ser-text">
						<h2><a href="#"><?php echo esc_html($theme_data['services_3_title']); ?></a></h2>
						<p><?php echo esc_html($theme_data['services_3_desc']); ?></p>
					</div>
				</div>
			</div>	
	</div>
</div>
<!-- Services End -->
    