<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Corporate_Prime
 */

?>
<div id="secondary" class="col-md-3 right_sidebar" role="complementary">
<?php
if (is_active_sidebar( 'sidebar-widget-area' ) ) {
	 dynamic_sidebar( 'sidebar-widget-area' ); 
}else{

	$args = array(
		'name'          => esc_html__( 'Sidebar', 'corporate-prime' ),
		'id'            => 'sidebar-widget-area',
		'description'   => __('Sidebar Widget Area', 'corporate-prime' ),
		'before_widget' => '<div id="%1$s" class="row sidebar-widget widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="cp-head"><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
	);
	the_widget('WP_Widget_Search', 'title=Search', $args);
	the_widget('WP_Widget_Archives', null, $args);
	the_widget('WP_Widget_Recent_Posts', null, $args);
	the_widget('WP_Widget_Calendar', 'title=Calendar', $args);
	the_widget('WP_Widget_Categories', null, $args);
	the_widget('WP_Widget_Tag_Cloud', null, $args);

}
?>
</div><!-- #secondary -->	
