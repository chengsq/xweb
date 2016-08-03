<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	
	<style type="text/css">
	.seopress-load-icon
	{
		position: fixed;
		left: 0px;
		top: 0px;
		width: 100%;
		height: 100%;
		z-index: 9999;
		background: url( "<?php echo esc_url( get_theme_mod( 'seopress_loading_icon_img', get_template_directory_uri() . '/images/Preloader_2.gif' ) ); ?>" ) center no-repeat #fff;
	}
	</style>
	
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<!-- Loader icon -->
<?php if( get_theme_mod( 'seopress_loading_icon', '0' ) == 1 ) { ?>
	<div class="seopress-load-icon"></div>
<?php } ?>
<!-- Loader icon Ends -->

<?php
if( get_theme_mod( 'seopress_display_top_bar', '1' ) == 1 )
{
?>
<div class="container-fluid bgtoph">
	<div class="container">
		<div class="row pdt10">
		
			<div class="col-md-6 topbar_ctmzr">
				<?php
				echo wp_kses_post( get_theme_mod( 'seopress_top_bar_left_content', '<p><span class="fa fa-phone"></span> ' . __( 'Call:', 'seopress' ) . ' <a href="tel:0123456789">0123456789</a> | <span class="fa fa-at"></span> ' . __( 'Email:', 'seopress' ) . ' <a href="mailto:info@example.com">info@example.com</a></p>' ) );
				?>
			</div>
			
			<div class="col-md-6">
				<p class="fr-spsl iconouter">
				
					<?php
					if( class_exists( 'WooCommerce' ) )
					{
					?>
						<?php
						if( get_theme_mod( 'seopress_display_shop_link_top_bar', '1' ) == 1 )
						{
						?>
						<a title="<?php _e( 'Shop', 'seopress' ); ?>" href="<?php echo get_permalink( get_option('woocommerce_shop_page_id') ); ?>"><span class="fa fa-shopping-bag bgtoph-icon-clr"></span></a>
						<?php
						}
						?>
						
						<?php
						if( get_theme_mod( 'seopress_display_cart_link_top_bar', '1' ) == 1 )
						{
						?>
						<a title="<?php _e( 'Cart', 'seopress' ); ?>" href="<?php echo get_permalink( get_option('woocommerce_cart_page_id') ); ?>"><span class="fa fa-shopping-cart bgtoph-icon-clr"></span></a>
						<?php
						}
						?>
						
						<?php
						if( get_theme_mod( 'seopress_display_myaccount_link_top_bar', '1' ) == 1 )
						{
						?>
						<a title="<?php _e( 'My Account ', 'seopress' ); ?>" href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>"><span class="fa fa-user bgtoph-icon-clr"></span></a>
						<?php
						}
						?>
					
					<?php
					}
					?>
					
					<?php
					if( get_theme_mod( 'seopress_social_profile_link_facebook', 'http://facebook.com' ) )
					{
					?>
						<a title="<?php _e( 'Facebook', 'seopress' ); ?>" target="_blank" href="<?php echo esc_url( get_theme_mod( 'seopress_social_profile_link_facebook', 'http://facebook.com' ) ); ?>"><span class="fa fa-facebook bgtoph-icon-clr"></span></a>
					<?php
					}
					?>
					
					<?php
					if( get_theme_mod( 'seopress_social_profile_link_twitter', 'http://twitter.com' ) )
					{
					?>
						<a title="<?php _e( 'Twitter', 'seopress' ); ?>" target="_blank" href="<?php echo esc_url( get_theme_mod( 'seopress_social_profile_link_twitter', 'http://twitter.com' ) ); ?>"><span class="fa fa-twitter bgtoph-icon-clr"></span></a>
					<?php
					}
					?>
					
					<?php
					if( get_theme_mod( 'seopress_social_profile_link_youtube', 'http://youtube.com' ) )
					{
					?>
						<a title="<?php _e( 'YouTube', 'seopress' ); ?>" target="_blank" href="<?php echo esc_url( get_theme_mod( 'seopress_social_profile_link_youtube', 'http://youtube.com' ) ); ?>"><span class="fa fa-youtube bgtoph-icon-clr"></span></a>
					<?php
					}
					?>
					
					<?php
					if( get_theme_mod( 'seopress_social_profile_link_googleplus' ) )
					{
					?>
						<a title="<?php _e( 'Google Plus', 'seopress' ); ?>" target="_blank" href="<?php echo esc_url( get_theme_mod( 'seopress_social_profile_link_googleplus' ) ); ?>"><span class="fa fa-google bgtoph-icon-clr"></span></a>
					<?php
					}
					?>
					
					<?php
					if( get_theme_mod( 'seopress_social_profile_link_linkedin' ) )
					{
					?>
						<a title="<?php _e( 'Linkedin', 'seopress' ); ?>" target="_blank" href="<?php echo esc_url( get_theme_mod( 'seopress_social_profile_link_linkedin' ) ); ?>"><span class="fa fa-linkedin bgtoph-icon-clr"></span></a>
					<?php
					}
					?>
					
					<?php
					if( get_theme_mod( 'seopress_social_profile_link_pinterest' ) )
					{
					?>
						<a title="<?php _e( 'Pinterest', 'seopress' ); ?>" target="_blank" href="<?php echo esc_url( get_theme_mod( 'seopress_social_profile_link_pinterest' ) ); ?>"><span class="fa fa-pinterest-p bgtoph-icon-clr"></span></a>
					<?php
					}
					?>
					
					<?php
					if( get_theme_mod( 'seopress_social_profile_link_skype' ) )
					{
					?>
						<a title="<?php _e( 'Skype', 'seopress' ); ?>" href="skype:<?php echo esc_attr( get_theme_mod( 'seopress_social_profile_link_skype' ) ); ?>?add"><span class="fa fa-skype bgtoph-icon-clr"></span></a>
					<?php
					}
					?>
					
					
				</p>
			</div>
			
		</div>
	</div>
</div>
<?php
}
?>

<div class="container-fluid headermain pdt15 pdb15 clearfix">
	<div class="container">
		<div class="row">
			<div class="col-md-4" >
				<?php
				if( has_custom_logo() )
				{
				?>
					<div itemscope itemtype="http://schema.org/Organization" >
						<?php the_custom_logo(); ?>
					</div>
				<?php
				}
				else
				{
					echo "<a href='" . esc_url( home_url( '/' ) ) . "' rel='home' >";
					
					echo "<h3>";
					echo esc_attr( get_bloginfo( 'name' ) );
					echo "</h3>";
					
					echo "<p>";
					echo esc_attr( get_bloginfo( 'description' ) );
					echo "</p>";
					
					echo "</a>";
				}
				?>
			</div>
			
			<div class="col-md-8">
				<?php
				if ( is_active_sidebar( 'seopress_sidebar_header' ) )
				{
					dynamic_sidebar( 'seopress_sidebar_header' );
				}
				?>
			</div>

		</div>
	</div>
</div>


<div id="navbarouter">
<?php
if( class_exists( 'Mega_Menu' ) && max_mega_menu_is_enabled( 'primary' ) )
{
	wp_nav_menu( array( 'theme_location' => 'primary' ) );
}
else
{
?>
	<nav id="navbar" class="navbar navbar-default">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only"><?php esc_attr_e( 'Toggle navigation', 'seopress' ); ?></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
					
			<?php
			wp_nav_menu( array(
				'theme_location'    => 'primary',
				'depth'             =>  2,
				'container'         => 'div',
				'container_id'      => 'bs-example-navbar-collapse-1',
				'container_class'   => 'collapse navbar-collapse',
				'menu_id' 			=> 'primary-menu',
				'menu_class'        => 'nav navbar-nav',
				'fallback_cb'       => 'seopress_nav_fallback',
				'walker'            => new seopress_bootstrap_navwalker()
				));
			?>

		</div>
	</nav>
<?php
}
?>
</div>

<?php
if( get_the_ID() )
{
	if( class_exists( 'RWMB_Loader' ) && rwmb_meta( 'seopress_slider_scode', '', $post->ID ) )
	{
		echo do_shortcode( rwmb_meta( 'seopress_slider_scode', '', $post->ID ) );
	}
}
?>


<?php if( get_header_image() ) { ?>
<div class="container-fluid">
	<div class="row">
		<div class="alignc">
			<img class="headerimg" src="<?php esc_url( header_image() ); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="<?php echo esc_attr( get_bloginfo( 'description' ) ); ?>" />
		</div>
	</div>
</div>
<?php } ?>


<div class="container-fluid mrt20 mrb20 clearfix"> <!-- start header div 1, will end in footer -->
	<div class="container"> <!-- start header div 2, will end in footer -->
		<div class="row"> <!-- start header div 3, will end in footer -->
		