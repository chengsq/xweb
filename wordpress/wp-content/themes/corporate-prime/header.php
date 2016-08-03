<?php  
global $corporate_prime_theme_data; 
$theme_data = $corporate_prime_theme_data;

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>" charset="<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div  class="wrapper site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'corporate-prime' ); ?></a>
	
	<header id="masthead" class="site-header nav-down" role="banner">
		<!-- top nav  -->
		<div class="container-fluid c_top">
			<div class="container">
				<div class="col-md-4 col-sm-4 c_social">
					<ul class="social">
						<?php corporate_prime_get_social_block(); ?>
					</ul>
				</div>
				<div class="col-md-8 col-sm-8 c_contact">
					<ul class="c_address">
						<?php if(!empty($theme_data['top_email'])): ?>
						<li class="c_add"><a href="mailto:<?php echo esc_attr($theme_data['top_email']); ?>"><i class="fa fa-envelope"></i><?php echo esc_html($theme_data['top_email']); ?> </a></li>
						<?php endif; ?>
						<?php if(!empty($theme_data['top_phone'])): ?>
						<li class="c_phone"><a href="callto:<?php echo esc_attr($theme_data['top_phone']); ?>"><i class="fa fa-phone"></i><?php echo esc_html($theme_data['top_phone']); ?> </a></li>
						<?php endif; ?>
					</ul>
				</div>
			</div>
		</div>
    	<!-- top nav  -->
    	
	    <!-- Primary Nav Start-->
		<nav class="navbar navbar-default c_menu">
			<div class="container-fluid">
				<div class="container">
					<div class="navbar-header">
					  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>                        
					  </button>
					  <div class="site-branding">
						<?php
						if ( function_exists( 'the_custom_logo' ) && function_exists( 'has_custom_logo' ) && has_custom_logo()) :
							
							if ( is_front_page() && is_home() ) : ?>
								<h1 class="site-title"><?php the_custom_logo();?></h1>
							<?php else : ?>
								<p class="site-title"><?php the_custom_logo();?></a></p>
							<?php
							endif;
						else :
							if ( is_front_page() && is_home() ) : ?>
								<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							<?php else : ?>
								<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
							<?php
							endif;
							$description = get_bloginfo( 'description', 'display' );
							if ( $description || is_customize_preview() ) : ?>
								<p class="site-description"><?php echo $description; ?></p>
							<?php
							endif; 
						endif;
						?>	
					  </div><!-- .site-branding -->
			
					</div>
					<?php 
						$args = array(
						                'theme_location'    => 'primary',
						                'depth'             =>  0,
						                'container'         => 'div',
						                'container_class'   => 'collapse navbar-collapse',
						        		'container_id'      => 'myNavbar',
						                'menu_class'        => 'nav navbar-nav navbar-right',
						                'fallback_cb'       => 'corporate_prime_fallback_page_menu',
						                'walker'            => new corporate_prime_nav_walker()
						      );
						wp_nav_menu($args);
					?>
				</div>
			</div>
		</nav>
		<!-- Primary Nav End-->
	
	</header><!-- #masthead -->

	<div id="content" class="site-content">
