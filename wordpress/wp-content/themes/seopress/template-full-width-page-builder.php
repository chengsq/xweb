<?php
/**
 * Template Name: Full Width for Page Builder
 *
 */
?>

<?php get_header( 'full-width-page-builder' ); ?>
<div class="col-md-12">
	<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
		
		<div <?php post_class(); ?>>
			
			<?php
			if( class_exists( 'RWMB_Loader' ) )
			{
				if( rwmb_meta( 'seopress_hide_title' ) != 1 )
				{
				?>
					<div class="content-second">
						<h1 class="the-title entry-title" id="post-<?php the_ID(); ?>" ><?php the_title(); ?></h1>
					</div>
				<?php
				}
			}
			else
			{
			?>
			<div class="content-second">
				<h1 class="the-title entry-title" id="post-<?php the_ID(); ?>" ><?php the_title(); ?></h1>
			</div>
			<?php
			}
			?>
				

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
<?php get_footer(); ?>