<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Corporate_Prime
 */

get_header(); ?>
<?php corporate_prime_title_trail(); ?>

<div class="container-fluid c_space c_blog">
	<!-- Left Sidebar Start -->
	<div class="container">
		<div class="col-md-9 right_side port-gallery">
				<?php
						while ( have_posts() ) : the_post();
			
							get_template_part( 'template-parts/content', 'page' );
			
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
