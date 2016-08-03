<?php 
/**
/* Template Name: Home
* @package WordPress
* @subpackage VSS-THEME
* @since VSS-THEME 1.0
*/
get_header(); 
?>
 
<div class="vss-slider"> 

	 <?php 
	 include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	 if ( is_plugin_active( 'ml-slider/ml-slider.php' ) ) {
	 echo do_shortcode(get_theme_mod('slider_add')) ; 
	 }
	 ?>
</div>
 <!-- Content blog post -->
<div class="container"> 
	<div class="row"> 
		<div class="container">
			   <?php 				 $search_blog_args = array(
												'post_type' => 'portfolio',
												'posts_per_page' => $posts_per_page,
											);
				   $search_blog_query = new WP_Query( $search_blog_args );
			   ?>
				   <?php 
				    while ( $search_blog_query ->have_posts() ) : $search_blog_query ->the_post(); ?>
					<div class="row">
					 <div class="home-blogs">      
					   <div class="col-sm-4"> 
						<h3 class="home-title"><?php _e( 'A FEW OF OUR RECENT PROJECTS', 'vssgroup_theme' ); ?></h3>
					   </div>
					   <div class="col-sm-2">
					   </div>  
					   <div class="col-sm-6">
					   </div>  
				</div>
					</div>
					<div class="row">
					   <div class="col-sm-3">
					   <div class="recentpostdesign">
						<div class="post-image">								<?php							if ( has_post_thumbnail() ) :							?>							<?php the_post_thumbnail('post-thumbnail', array( 'class'	=> "img-responsive h-img1 thumbnail")); ?>							   <?php endif; ?>
							   </div>    
						   <p class="home-content1"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>   
						   <hr/>
						   <span class="home-blog-sub"><?php echo get_the_time('M') ?> <?php echo get_the_time('d') ?>, <?php echo get_the_time('Y') ?></span>
						   <hr/>
						   <?php 
						   the_excerpt();
						   ?>
						   <span class="home-more">
							   <a href="<?php the_permalink(); ?>">
							   <span class="home-read1"><?php _e( 'Read More', 'vssgroup_theme' ); ?></span>
							   </a> 
						   </span>
</div>						   
					   </div>
				   <?php
				   endwhile;
				   ?> 
			   </div>  
	   </div>
   </div>
</div>
<div class="container-fluid home-brand">  
   <div class="container" >  
	   <div class="row">
		   <div class="home-blogs">      
			   <div class="col-sm-4">
			   <h3 class="home-title"><?php _e( 'LATEST NEWS FROM OUR BLOG', 'vssgroup_theme' ); ?></h3> 
			   </div> 
			   <div class="col-sm-2"> </div>     
			   <div class="col-sm-6"></div>  
		   </div> 
	   </div>
	   <div class="row">
		   <?php 
		   $search_blog_args = array(
										'post_type' => 'post',
										'posts_per_page' => $posts_per_page,
									);
		   $search_blog_query = new WP_Query( $search_blog_args );
		   while ( $search_blog_query ->have_posts() ) : $search_blog_query ->the_post(); 
			   ?>
			   <div class="col-sm-3">
			   <div class="recentpostdesign">
				   <div class="post-image"><?php							if ( has_post_thumbnail() ) :							?>							<?php the_post_thumbnail('post-thumbnail', array( 'class'	=> "img-responsive h-img1 thumbnail")); ?>							   <?php endif; ?>
				   </div> 
				   <p class="home-content1"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
				   <hr/>
				   <span class="home-blog-sub"><?php echo get_the_time('M') ?> <?php echo get_the_time('d') ?>, <?php echo get_the_time('Y') ?></span>
				   <hr/>
					   <?php
					   the_excerpt();
					   ?>
					   <span class="home-more"> 
						   <a href="<?php the_permalink(); ?>"> 
						   <span class="home-read1"><?php _e( 'Read More', 'vssgroup_theme' ); ?></span>
						   </a>
					   </span>
			   </div>
			   </div>
			   <?php
		   endwhile;
		   ?>  
	   </div>
   </div>
</div>
<div class="container">
	<div class="row">
		<div class="col-sm-12">   
			<div class="home-brlogos">
<?php
if ( is_plugin_active( 'easy-logo-slider/init.php' ) ) {
   echo do_shortcode(get_theme_mod('brandlogo_add')) ; 
 }
 ?>
			</div>
		</div>
	</div>
</div> 
  <!-- Content blog post images End -->
<?php 
get_footer();
?>