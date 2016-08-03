<?php
get_header();
?>
<div class="about-ban">
  <div class="container">
    <div class="row">
      <div class="col-xs-7">
        <h2 class="about-head"><?php printf( __( 'Search Results for: %s', 'vssgroup_theme' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
      </div>
      <div class="col-xs-5">
        <div class="breadcmp-web"> <a href="<?php echo esc_url( home_url() ); ?>" class="about-bread"> <?php _e( 'Home', 'vssgroup_theme' ); ?> </a></div>
      </div>
    </div>
  </div>
</div>
<!-- menu end -->
<div class="container">
 <div class="row">
 <div class="col-sm-9">
			    <div class="row">
				<?php  
			    get_template_part('loop', 'search'); 
				?>	</div>
				<div style="text-align:center"> <?php vssgroup_numeric_posts_nav(); ?></div>  
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