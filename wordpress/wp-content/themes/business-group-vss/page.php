<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the wordpress construct of pages
 * and that other 'pages' on your wordpress site will use a
 * different template.
 *
 */
?>
<?php get_header(); ?>  
<div class="about-ban">
  <div class="container">
    <div class="row">
      <div class="col-xs-7">
        <h2 class="about-head"><?php the_title();?> </h2>
      </div>
      <div class="col-xs-5">
        <div class="breadcmp-web"> <a href="<?php echo esc_url( home_url() ); ?>" class="about-bread"><?php _e( 'Home / ', 'vssgroup_theme' ); ?> </a><?php the_title();?> </div>
      </div>
    </div>
  </div>
</div>
<!-- menu end -->
<div class="container">
	<div class="row">
		<div class="col-sm-9">
			    <div class="row">
				<div class="page-layout"> 
			      <?php 
					  if (have_posts()) : 
						  while (have_posts()) : the_post();
								the_content();
						  endwhile; 
					  endif;   
					 ?>
					 </div>
				</div>
		
		</div>
		

    <div class="col-sm-3">
	<?php
	get_sidebar(); 
	?>
    </div>
	</div>
</div>
<!-- Content coding end -->
<?php 
get_footer(); 
?>