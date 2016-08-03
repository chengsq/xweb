<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Corporate_Prime
 */

get_header(); ?>
<!-- Breadcum Start -->
<?php corporate_prime_title_trail(); ?>
<!-- Breadcum End -->
<div class="container-fluid c_space c_blog">
	<div class="container">
		<div class="col-md-9 left_side port-gallery">			
			<?php 
				if ( have_posts() ) :
					if ( is_home() && ! is_front_page() ) : ?>
						<header>
							<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
						</header>
					<?php
					endif;
		
					/* Start the Loop */
					while ( have_posts() ) : the_post();
		
						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'template-parts/content', get_post_format() );
		
					endwhile;
				?>
					<div class="clearfix"></div>
					<div class="row pagination">
						<ul class="pager">
						  <li class="previous"> <?php previous_posts_link( '<i class="fa fa-arrow-left"></i>'.__('Previous Posts', 'corporate-prime') ); ?></a></li>
						  <li class="next"> <?php next_posts_link( __('Next Posts', 'corporate-prime').'<i class="fa fa-arrow-right"></i>' ); ?> </a></li>
						</ul>
					</div>	
					<div class="clearfix"></div>
				<?php
				else :
					
					get_template_part( 'template-parts/content', 'none' );
		
				endif; ?>
		</div>
		<!-- Sidebar -->
		<?php get_sidebar(); ?>
	</div>
</div>
<?php
get_footer();