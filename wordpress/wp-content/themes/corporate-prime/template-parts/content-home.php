<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Corporate_Prime
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class("col-md-4 col-sm-6 col-xs-12 c_blog_detail wl-gallery"); ?>>
	<div class="row cp-blog">
		<div class="col-xs-2 c_blog_date">
			<div class="c_date date1 entry-date published" datetime="<?php echo esc_html( get_the_date('c') ); ?>">
				<span class="c_dt"><?php echo esc_html( get_the_date('j') ); ?></span>
				<span class="c_mt"><?php echo esc_html( get_the_date('M Y') ); ?></span>
			</div>
			<div class="c_date">
				<i class="fa fa-comments-o"></i>
				<span class="c_mt"><?php echo get_comments_number() . __('Com', 'corporate-prime') ?></span>
			</div>
		</div>
		
		<div class="col-xs-10 c_blog_desc">
			<?php if(has_post_thumbnail()): ?>
			<div class="img-thumbnail">
				<?php the_post_thumbnail('285x230-crop'); ?>
			</div>
			<?php endif; ?>
			
			<h2 class="entry-title"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a></h2>
			<p class="entry-summary"><?php the_excerpt(''); ?></p>
			<a href="<?php echo esc_url( get_permalink() ); ?>" class="btn"> <?php _e('Read More','corporate-prime') ?> </a>
		</div>
	</div>
</article>
