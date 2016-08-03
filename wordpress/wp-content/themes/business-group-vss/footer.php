<!-- Footer Areas Start -->
<?php 
wp_footer();
?>
<div class="home-fot">
  <div class="container">
    <div class="row">
      <div class="col-sm-8">
       
      </div>
	  
      <div class="col-sm-2 col-sm-offset-2">
	  <?php 
		if ( get_theme_mod('vssgroup_facebook_url') != NULL || get_theme_mod('vssgroup_twitter_url') != NULL || get_theme_mod('vssgroup_linkedin_url') != NULL )
		{
		?>
        <p class="home-fot-sos"><?php _e( 'CONNECT WITH US', 'vssgroup_theme' ); ?> </p>
		<?php
		  }
		  ?>
        <div class="fot-sos">
          <ul>
		  <?php
		if ( get_theme_mod('vssgroup_facebook_url') != NULL )
		{
		  ?>
            <li> <a href="<?php echo esc_url(get_theme_mod('vssgroup_facebook_url')); ?>" target="_blank"> <img src="<?php echo get_template_directory_uri(); ?>/img/h-f-fb.png" /></a> </li>
			<?php
			}
		if ( get_theme_mod('vssgroup_twitter_url') != NULL )
		{
			?>
            <li> <a href="<?php echo esc_url(get_theme_mod('vssgroup_twitter_url')); ?>"  target="_blank"> <img src="<?php echo get_template_directory_uri(); ?>/img/h-f-in.png" /> </a> </li>
			<?php 
			}
		if ( get_theme_mod('vssgroup_linkedin_url') != NULL )
		{
			?>
            <li> <a href="<?php echo esc_url(get_theme_mod('vssgroup_linkedin_url')); ?>" target="_blank"> <img src="<?php echo get_template_directory_uri(); ?>/img/h-f-twt.png" /> </a> </li>
			<?php 
			}
			?>
          </ul>
		  
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-12 fotter-rights">
    <div class="container">
      <div class="row">
	  <?php 
	  if ( get_theme_mod('vssgroup_copy_name') != NULL)
	  {
	  ?>
        <div class="col-sm-6 fot-rights-con1">&copy; <?php _e( 'Copyright', 'vssgroup_theme' ); ?>  <?php echo esc_html(date("Y")); ?> <?php echo esc_html(get_theme_mod('vssgroup_copy_name')); ?>.<?php _e( 'All right reserverd.', 'vssgroup_theme' ); ?> </div>
		<?php 
		}
		else
		{
		?>
		<div class="col-sm-6 fot-rights-con1">&copy; <?php _e( 'Copyright', 'vssgroup_theme' ); ?> <?php echo esc_html(date("Y")); ?>.</div>
		<?php
		}
		?>
        <div class="col-sm-6">
		  <p class="fot-rights-con"> 
		<?php
		if (get_theme_mod('vssgroup_design_url')!= Null )
		{
		?>
        <?php _e( 'Powered by', 'vssgroup_theme' ); ?> <span class="fot-all">  <a href="<?php echo esc_url(get_theme_mod('vssgroup_design_url')); ?>" class="home-vss" target="_blank"><?php echo esc_html(get_theme_mod('vssgroup_design_name')); ?> </a></span> 
		  <?php 
		  }
		  ?>
		  </p>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>
