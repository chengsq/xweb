<?php
/**
/* Template Name: About
* @package WordPress
* @subpackage VSS-THEME
* @since VSS-THEME 1.0
*/
get_header();
?>
<div class="about-ban">
  <div class="container">
    <div class="row">
      <div class="col-xs-7">
        <h2 class="about-head"> <?php _e( 'About us', 'vssgroup_theme' ); ?> </h2>
      </div>
      <div class="col-xs-5">
        <div class="breadcmp-web"> <a href="<?php echo esc_url( home_url() ); ?>" class="about-bread"> <?php _e( 'Home ', 'vssgroup_theme' ); ?></a><?php _e( ' / About ', 'vssgroup_theme' ); ?></div>
      </div>
    </div>
  </div>
</div>
<div class="container">
  <div class="col-sm-12">
  <?php 
  if (have_posts()) : 
	  while (have_posts()) : the_post();
			the_content();
	  endwhile; 
  endif;   
 ?>
  </div>
</div>
<!-- Content coding end -->
<?php 
get_footer(); 
?>