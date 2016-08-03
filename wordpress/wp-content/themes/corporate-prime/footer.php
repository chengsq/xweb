<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Corporate_Prime
 */

?>
			</div>
		</div>
	</div><!-- #content -->
	
	<!-- Footer Start -->
	<?php 
	    $footer_widget  = array(
    		'name' => __( 'Footer Widget Area', 'corporate-prime' ),
    		'id' => 'footer-widget-area',
    		'description' => __( 'footer widget area', 'corporate-prime' ),
    		'before_widget' => '<div class="col-md-3 col-sm-6 footer-widget clearfix">',
    		'after_widget'  =>  '</div>',
    		'before_title'  =>  '<div class="row widget-heading"><h3>',
    		'after_title'   =>  '</h3></div>', 
		);
	?>
	<footer>
		<div class="container-fluid c_footer">
			<div class="container">
				<div class="row c_foot">
				    <?php	if ( is_active_sidebar( 'footer-widget-area' ) ) { ?>
            			<?php dynamic_sidebar( 'footer-widget-area'); ?>
				    <?php }else{ 
				        the_widget('WP_Widget_Calendar', 'title='.__('Calendar', 'corporate-prime'), $footer_widget);
                		the_widget('WP_Widget_Categories', null, $footer_widget);
                		the_widget('WP_Widget_Pages', null, $footer_widget);
                		the_widget('WP_Widget_Archives', null, $footer_widget);
				    } ?>
				</div>
			</div>
		</div>
		<div class="container-fluid c_footercopy">
			<div class="container">
				<div class="row c_foots">
					<div class="site-info">
                		&copy; <?php echo date('Y').' '; bloginfo( 'name' ); ?>
                		<span class="sep"> | </span>
                		<?php printf( esc_html__( 'Theme by %1$s', 'corporate-prime' ),  '<a href="'.esc_url('http://themefarmer.com').'" rel="designer">Theme Farmer</a>' ); ?>
					</div><!-- .site-info -->
				</div>
			</div>
		</div>
	</footer>
	<a href="#" class="scroll_up" title="<?php esc_attr_e('Go Top','corporate-prime');?>"><i class="fa fa-angle-up"></i></a>
	<!-- Footer End -->
	
	
</div><!-- #page -->
<?php wp_footer(); ?>

</body>
</html>
