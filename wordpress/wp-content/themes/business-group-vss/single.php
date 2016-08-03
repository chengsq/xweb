<?php 
	get_header(); 
?>
<div class="about-ban">
  <div class="container">
    <div class="row">
      <div class="col-xs-7">
        <h2 class="about-head"><?php _e( 'Blog', 'vssgroup_theme' ); ?></h2>
      </div>
      <div class="col-xs-5">
        <div class="breadcmp-web"> <a href="<?php echo esc_url( home_url() ); ?>" class="about-bread"> <?php _e( 'Home / ', 'vssgroup_theme' ); ?></a><?php the_title(); ?> </div>
      </div>
    </div>
  </div>
</div>
<div class="container">
	<div class="row">
	    <?php if(have_posts()): ?>
		<?php while ( have_posts() ) : the_post(); ?>
		<div <?php post_class(); ?> >
		<div class="col-sm-8 blog-box" id="post-<?php the_ID(); ?>" >
		    <h3 class="vss-blog-head"> <?php the_title(); ?> </h3>
			<span class="blog-post"><?php _e( 'Date :', 'vssgroup_theme' ); ?> <?php echo get_the_time('M') ?> <?php echo get_the_time('d') ?>, <?php echo get_the_time('Y') ?> </span>
			<span class="blog-post-right" ><?php _e( 'Category : ', 'vssgroup_theme' ); ?> <?php the_category(', ');  ?> </span> 			
			<br/>
			<span class="blog-post"><?php _e( 'Author: ', 'vssgroup_theme' ); ?><?php the_author_posts_link(); ?> </span>
			<span class="blog-post-right"> <?php the_tags( 'Tags: ', ', ', '<br />' ); ?> </span>
			<hr/>
			<div class="vss-post-img">
		    <?php 
					if ( has_post_thumbnail() )
				{
					the_post_thumbnail();
					} 
				?>
				</div>
		 <?php the_content(); ?> 
		  <?php wp_link_pages( array(
			'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'vssgroup_theme' ) . '</span>',
			'after'       => '</div>',
			'link_before' => '<span>',
			'link_after'  => '</span>',
			) );
		  ?>
		  <hr/>
		  	 <?php comments_template(); ?>
		</div>
		</div>
		<?php 
		endwhile;
		endif;
		?>
		
		<div class="col-sm-1"></div>
	
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