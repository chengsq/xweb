<form role="search" method="get" class="search-form corporate-prime-search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div class="col-md-12 form-group">
		<label  class="search-label">
			<span class="screen-reader-text"><?php _e('Search for:','corporate-prime'); ?></span>
			<input type="search" class="search-field" placeholder="<?php esc_attr_e('Search ','corporate-prime'); ?>" value="<?php echo get_search_query(); ?>" name="s" title="<?php esc_attr_e('Search for:','corporate-prime'); ?>">
		</label>
	</div>
</form>