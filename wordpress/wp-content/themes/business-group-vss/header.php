<!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>
<?php  wp_head(); ?> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="profile" href="http://gmpg.org/xfn/11" /> </head>
<body <?php body_class(); ?>>
<header>
<!-- menu start -->
<div id="header" class="container-fluid" style="background: url(<?php header_image(); ?>);background-color: #<?php header_textcolor(); ?>">
  <div class="container">
    <div class="row">
	<div class="col-sm-2">
	<?php if ( get_theme_mod('vssgroup_logo_upload') ) { ?>
	
        <a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><img src='<?php echo esc_url( get_theme_mod('vssgroup_logo_upload') ); ?>' class="logo" alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'></a>
		
	 <?php 
	  }
	  else 
	  {  
	  ?>
	  <a href="<?php echo esc_url( home_url() ); ?>"><h1 class="site-title"><?php bloginfo('name'); ?></h1></a>
	  <?php
	  }
	  ?>
	  <h4 class="site-description"><?php bloginfo('description'); ?> </h4>
	  </div>
      <div class="col-sm-10">
        <nav>
          <div class="main-menu">
            <div class="navbar navbar-default" role="navigation">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="glyphicon glyphicon-chevron-down"></span> </button>
                <a class="navbar-brand" href="#"><?php _e( 'Menu', 'vssgroup_theme' ); ?></a> </div>
              <div class="navbar-collapse collapse">
               	<?php wp_nav_menu( array('menu' => 'Header Menu', 'menu_class' => 'nav navbar-nav','container_id' => 'main-menu') );?>
              </div>
            </div>
            <div class="clearfix"></div>
          </div>
        </nav>
      </div>
    </div>
  </div>
</div>
</header>
<!-- menu end -->