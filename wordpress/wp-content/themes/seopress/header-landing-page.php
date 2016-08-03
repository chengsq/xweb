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

<div class="container-fluid clearfix"> <!-- start header div 1, will end in footer -->
	<div class="container"> <!-- start header div 2, will end in footer -->
		<div class="row"> <!-- start header div 3, will end in footer -->
		