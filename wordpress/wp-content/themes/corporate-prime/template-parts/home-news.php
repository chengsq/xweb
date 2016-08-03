<?php
/**
* @Theme Name	:	Corporate Prime
* @file         :	home-news.php
* @package      :	corporate-prime
* @author       :	Theme Farmer
* @license      :	readme.txt
* @filesource   :	wp-content/themes/corporate-prime/templates/home-news.php
*/

global $corporate_prime_theme_data; 
$theme_data = $corporate_prime_theme_data;
?>
<!-- Latest Blogs Start-->
<div class="container-fluid c_space c_blogs">
	<div class="row section_heading">
		<h1 class="section_title"><?php echo esc_html($theme_data['home_latest_news_title']); ?></h1>
		<p class="section_title_description"><?php echo esc_html($theme_data['home_latest_news_desc']); ?></p>
	</div>
	<div class="container">
		<div class="row c-blog-section gallery1">
			<?php
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				$args = array( 'post_type' => 'post', 'paged'=>$paged, 'posts_per_page' => 3, 'ignore_sticky_posts' => 1, );	
				$post_type_data = new WP_Query( $args );
				while($post_type_data->have_posts()){
					$post_type_data->the_post();
					get_template_part('template-parts/content','home'); 
				}
				wp_reset_postdata();
			?>
		</div>
	</div>		
</div>