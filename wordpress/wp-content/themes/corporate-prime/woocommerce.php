<?php get_header(); ?>

<!-- Breadcum Start -->
<?php corporate_prime_title_trail(); ?>
<!-- Breadcum End -->

<!-- WooCommrerce -->
<div class="container-fluid cp-woocommerce c_space">
	<div class="container">
		<div class="col-md-12 cp-woocommerce-product">
			<?php if ( have_posts() ) : ?>
				<?php woocommerce_content(); ?>
			<?php endif; ?>	
		</div>
	</div>
</div>
<!-- WooCommrerce -->
<?php get_footer(); ?>