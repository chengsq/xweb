<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Corporate_Prime
 */

get_header(); ?>
<!-- Breadcum Start -->
<?php corporate_prime_title_trail(); ?>
<!-- Breadcum End -->	
<div class="container-fluid c_space c_blog">
	<!-- Left Sidebar Start -->
	<div class="container">
		<div class="col-md-9 right_side port-gallery">
				<?php
				while ( have_posts() ) : the_post();
		
					get_template_part( 'template-parts/content', 'single' );
		
					?>	
						<div class="clearfix"></div>
						<div id="single-nav" class="row pagination">
							<ul class="pager">
								<li class="single-nav-prev previous"><?php previous_post_link('%link', '<i class="fa fa-arrow-left"></i>'.__('Previous Post','corporate-prime'), TRUE); ?></li>
								<li class="single-nav-next next"><?php next_post_link('%link', __('Next Post', 'corporate-prime').'<i class="fa fa-arrow-right"></i>', TRUE); ?> </li>
							</ul>
				        </div>
				        
					<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
		
				endwhile; // End of the loop.
				?>
		</div><!-- #primary -->
		<?php get_sidebar(); ?>
	</div>
</div>
<?php
get_footer();
