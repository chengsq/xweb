<?php 
// Creating the widget 
class vssgroup_wpb_widget extends WP_Widget {

function __construct() {
parent::__construct(
// Base ID of your widget
'vssgroup_wpb_widget', 

// Widget name will appear in UI
__('Latest Project', 'vssgroup_theme'), 

// Widget description
array( 'description' => __( 'select this widget to display the latest project', 'vssgroup_theme' ), ) 
);
}

// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ) {
$vssgroup_title_text = sanitize_text_field( $instance['vssgroup_title'] );
$vssgroup_pcount_text = sanitize_text_field(  $instance['vssgroup_pcount'] );
$vssgroup_title = apply_filters( 'widget_title', $vssgroup_title_text );
$vssgroup_pcount = apply_filters( 'portfolio_count', $vssgroup_pcount_text );
// before and after widget arguments are defined by themes
echo $args['before_widget'];
if ( ! empty( $vssgroup_title ) )
echo $args['before_title'] . $vssgroup_title . $args['after_title'];

// This is where you run the code and display the output

?> 
<div class="row latest-portfolio-start">
<div class="col-sm-12">
  <div class="row">
				<?php  
				$page = (get_query_var('paged')) ? get_query_var('paged') : 1;
				$args = array(
					'paged'			   => $page,
					'orderby'          => 'date',
					'order'            => 'DESC',
					'post_type'        => 'portfolio',
					'posts_per_page'   => $vssgroup_pcount,
					'post_status'      => 'publish'); 

				$query = new WP_Query($args); 
				 if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>	
                    <div class="row latest-single-portfolio">				 
				
					<div class="col-sm-4"> 
				   
							<div class="post-image">
							<?php
						if ( has_post_thumbnail() ) :
							?>
							<?php the_post_thumbnail('post-thumbnail', array( 'class'	=> "img-responsive thumbnail")); ?>
							   <?php endif; ?> 
							</div>
                    </div>
					<div class="col-sm-8">
				
						  <p class="latest-portfolio-head"> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
						  <p class="latest-portfolio-content"><?php 	echo substr(get_the_excerpt(), 0,50);  ?> 	</p>
						   </div>  </div>
						  
						   <?php 
						   endwhile;
						   wp_reset_postdata();
						   ?>
							 <?php 
							 if (function_exists("pagination")) 
							 {
								pagination($additional_loop->max_num_pages);
							 } 
							 ?>
							<?php 
							else:
							?>
							<div class="post">
								<p>
							<?php _e( 'No Latest Project', 'vssgroup_theme' ); ?>
								</p>
							</div>
				<?php 
				endif;
				?> 
		</div>
		</div>
</div>
			
				<?php 
// echo $args['after_widget'];
}
		
// Widget Backend 
public function form( $instance ) {
if ( isset( $instance[ 'vssgroup_title' ] ) ) {
$vssgroup_title = sanitize_text_field($instance[ 'vssgroup_title' ]);
}
else {
$vssgroup_title = __( 'New title', 'vssgroup_theme' );
}
if ( isset( $instance[ 'vssgroup_pcount' ] ) ) {
$vssgroup_pcount = sanitize_text_field($instance[ 'vssgroup_pcount' ]);
}
else {
$vssgroup_pcount = __( '3', 'vssgroup_theme' );
}
// Widget admin form
?>
<p>
<label for="<?php echo esc_html($this->get_field_id( 'vssgroup_title' )); ?>"><?php _e( 'Title:' , 'vssgroup_theme' ); ?></label> 
<input class="widefat" id="<?php echo esc_html($this->get_field_id( 'vssgroup_title' )); ?>" name="<?php echo esc_html($this->get_field_name( 'vssgroup_title' )); ?>" type="text" value="<?php echo esc_attr( $vssgroup_title ); ?>" />
</p>
<p>
<label for="<?php echo esc_html($this->get_field_id( 'vssgroup_pcount' )); ?>"><?php _e( 'Portfolio Count:','vssgroup_theme' ); ?></label> 
<input class="widefat" id="<?php echo esc_html($this->get_field_id( 'vssgroup_pcount' )); ?>" name="<?php echo esc_html($this->get_field_name( 'vssgroup_pcount' )); ?>" type="text" value="<?php echo esc_attr( $vssgroup_pcount ); ?>" />
</p>
<?php 
}
	
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['vssgroup_title'] = ( ! empty( $new_instance['vssgroup_title'] ) ) ? strip_tags( $new_instance['vssgroup_title'] ) : '';
$instance['vssgroup_pcount'] = ( ! empty( $new_instance['vssgroup_pcount'] ) ) ? strip_tags( $new_instance['vssgroup_pcount'] ) : '';
return $instance;
}
} // Class wpb_widget ends here
