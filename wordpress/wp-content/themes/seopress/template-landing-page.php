<?php
/**
 * Template Name: Landing Page for Page Builder
 *
 */
?>

<?php get_header( 'landing-page' ); ?>
<div class="col-md-12">
	<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
		
		<div <?php post_class(); ?>>
			
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
					
			<?php
			wp_link_pages( array(
				'before'           => '<p class="pagelinks">' . __( 'Pages:', 'seopress' ),
				'after'            => '</p>',
				'link_before'      => '<span class="pagelinksa">',
				'link_after'       => '</span>',
			));
			?>
			
		</div>
		
		<?php if( get_theme_mod( 'seopress_cmnts_on_page', '1' ) == 1 ) { comments_template(); } ?> 
		
	<?php endwhile; endif; ?>

</div>
<?php get_footer( 'landing-page' ); ?>