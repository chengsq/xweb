<?php
/**
/* Template Name: Contact Us
* @package WordPress
* @subpackage VSS-THEME
* @since VSS-THEME 1.0
*/
get_header();
?>
<div class="about-ban">
  <div class="container">
    <div class="col-xs-7">
      <h2 class="about-head"><?php the_title(); ?> </h2>
    </div>
    <div class="col-xs-5">
      <div class="breadcmp-web"> <a href="<?php echo esc_url( home_url() ); ?>" class="about-bread"> <?php _e( 'Home / ', 'vssgroup_theme' ); ?> </a><?php the_title(); ?> </div>
    </div>
  </div>
</div>
<div class="con-map">
 <?php 
  if (have_posts()) : 
	  while (have_posts()) : the_post();
			the_content();
	  endwhile; 
  endif;   
 ?>
</div>
<!-- Iframe end -->
<div class="container">
  <div class="row">
    <div class="col-sm-4">
      <div class="con-adds">  <?php   if ( get_theme_mod('cont_add') != NULL )	{  ?>  
        <p class="contact-add"><?php _e( 'Our contact details', 'vssgroup_theme' ); ?></p>
        <p class="contact-ref"><strong><?php _e( 'Branch Address', 'vssgroup_theme' ); ?></strong></p>
        <p class="contact-ref">
		<?php echo esc_html(get_theme_mod('cont_add')); ?>
		 
		</p>
        <p class="contact-ref"><?php echo esc_html(get_theme_mod('cont_phone')); ?></p>		<?php  		}		?> 
      </div>
      <div class="con-adds">	<?php	if ( get_theme_mod('cont_add') != NULL )	{	?>
        <p class="contact-ref"><strong><?php _e( 'Head Office', 'vssgroup_theme' ); ?></strong></p>
        <p class="contact-ref">
		<?php echo esc_html(get_theme_mod('cont_head_add')); ?>
		</p>
        <p class="contact-ref">
		<?php echo esc_html(get_theme_mod('cont_head_phone')); ?>
		</p>	<?php 	}	?>
      </div>
    </div>	<?php 		include_once( ABSPATH . 'wp-admin/includes/plugin.php' );		if ( is_plugin_active( 'contact-form-7/wp-contact-form-7.php' ) ) 		{	?>
    <div class="col-sm-5 col-sm-offset-3 con-form">
     <?php 
	 echo do_shortcode(get_option('cont_form_phone')) ; 	 ?>
  </div>	<?php 		}	?>
</div>
</div>
<!-- Content coding end -->
<?php 
get_footer(); 
?>