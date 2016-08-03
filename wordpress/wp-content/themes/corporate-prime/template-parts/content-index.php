<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Corporate_Prime
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class("row c-blog-section"); ?>>
	<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
	<?php if(has_post_thumbnail()): ?>
	<div class="img-thumbnail">
		<?php the_post_thumbnail('825x350-crop'); ?>
		<div class="overlay">
			<a class="c_port p_left" href="<?php echo $image[0]; ?>"><i class="fa fa-search"></i></a>
			<a class="p_right" href="<?php echo esc_url( get_permalink() ); ?>"><i class="fa fa-chain"></i></a>
		</div>
	</div>
	<?php endif; ?>
	<div class="row post-data">
		<header class="entry-header col-md-12">
			<?php	
				if ( is_single() ) {
					the_title( '<h1 class="entry-title">', '</h1>' );
				} else {
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				}

				if ( 'post' === get_post_type() ) : ?>
				<div class="entry-meta">
					<?php corporate_prime_posted_on(); ?>
				</div><!-- .entry-meta -->
				<?php
				endif; 
			?>
		</header><!-- .entry-header -->
	
		<div class="entry-summary col-md-12">
			<?php
				the_excerpt('');
			
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'corporate-prime' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-summary -->
	
		<footer class="entry-footer col-md-12">
			<?php if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<?php corporate_prime_entry_footer(); ?>
			</div><!-- .entry-meta -->
			<?php
			endif; 
			?>
			<a class="btn bg" href="<?php echo esc_url( get_permalink() ); ?>"> <?php _e('READ MORE', 'corporate-prime'); ?> </a>
		</footer><!-- .entry-footer -->

	</div>
</article><!-- #post-## -->
<div class="clearfix"></div>