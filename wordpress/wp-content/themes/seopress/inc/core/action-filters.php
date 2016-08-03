<?php

/* Display a notice that can be dismissed */

// display notice and link for dismiss, if not pressed dismiss
if( !function_exists( 'seopress_admin_notice' ) )
{
	function seopress_admin_notice() {
		global $current_user ;
		$user_id = $current_user->ID;
		
		/* Check that the user hasn't already clicked to ignore the message */
		if( !get_user_meta( $user_id, 'seopress_ignore_notice' ) )
		{
			echo '<div class="updated"><p>';
			
		printf( __( 'Thank you for activating SEOPress theme. Let start form <a target="_blank" href="%1$s">Online Documentation</a> | <a target="_blank" href="%2$s">Visit Demo</a> | <a href="%3$s">Hide This Notice</a>', 'seopress' ), 'http://rinkuyadav.com/category/seopress-free/', 'http://seopress.rinkuyadav.com/', '?seopress_notics_ignore=0' );
			
			echo "</p></div>";
		}
	}
}
add_action( 'admin_notices', 'seopress_admin_notice' );


// if link of ignore notice clicked, store user meta
if( !function_exists( 'seopress_handle_notic' ) )
{
	function seopress_handle_notic()
	{
		global $current_user;
		$user_id = $current_user->ID;
		if( isset( $_GET['seopress_notics_ignore']) && '0' == $_GET['seopress_notics_ignore'] )
		{
			add_user_meta( $user_id, 'seopress_ignore_notice', 'true', true );
		}
	}
}
add_action( 'admin_init', 'seopress_handle_notic' );

//delete seopress_handle_notic user meta data on theme switch
if( !function_exists( 'seopress_delete_user_meta_ignore_notice' ) )
{
	function seopress_delete_user_meta_ignore_notice()
	{
		global $current_user;
		$user_id = $current_user->ID;
		if( get_user_meta( $user_id, 'seopress_ignore_notice' ) )
		{
			delete_user_meta( $user_id, 'seopress_ignore_notice' );
		}
	}
}
add_action('switch_theme', 'seopress_delete_user_meta_ignore_notice');


/* Display a notice that can be dismissed END */

//custom excerpt length
if( !function_exists( 'seopress_custom_excerpt_length' ) )
{
	function seopress_custom_excerpt_length( $length )
	{
		return absint( get_theme_mod( 'seopress_excerpt_length', '40' ) );
	}
}
add_filter( 'excerpt_length', 'seopress_custom_excerpt_length', 999 );


//custom excerpt last ...... replace
if( !function_exists( 'seopress_excerpt_more' ) )
{
	function seopress_excerpt_more( $more )
	{
		global $post;
		return ' <a href="' . get_permalink( $post->ID ) . '"> ' . __( 'Read more', 'seopress' ) . '&#8230;</a>';
	}
}
add_filter( 'excerpt_more', 'seopress_excerpt_more', 1001 );


//add filter to next link
if( !function_exists( 'seopress_next_post_attr' ) )
{
	function seopress_next_post_attr()
	{
		return 'rel="prev"';
	}
}
add_filter( 'next_posts_link_attributes', 'seopress_next_post_attr' );


//add filter to prev link
if( !function_exists( 'seopress_prev_post_attr' ) )
{
	function seopress_prev_post_attr()
	{
		return 'rel="next"';
	}
}
add_filter( 'previous_posts_link_attributes', 'seopress_prev_post_attr' );


//add class="table table-bordered" to default calendar
if( !function_exists( 'seopress_calendar_modify' ) )
{
	function seopress_calendar_modify( $html )
	{
		return str_replace( 'id="wp-calendar"', 'id="wp-calendar" class="table table-bordered"', $html );
	}
}
add_filter( 'get_calendar', 'seopress_calendar_modify' );



if( !function_exists( 'seopress_comment_form_fields' ) )
{
	function seopress_comment_form_fields( $fields )
	{
		$commenter = wp_get_current_commenter();
		$req      = get_option( 'require_name_email' );
		$aria_req = ( $req ? " aria-required='true'" : '' );
		$html5    = current_theme_supports( 'html5', 'comment-form' ) ? 1 : 0;
			
		$fields   =  array(

			'author' => '<div class="form-group comment-form-author">' . '<label for="author">' . __( 'Name', 'seopress' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
			'<input class="form-control" placeholder="' . __( 'Your name', 'seopress' ) . '" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></div>',
			
			'email'  => '<div class="form-group comment-form-email"><label for="email">' . __( 'Email', 'seopress' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
			'<input class="form-control" placeholder="' . __( 'Your email', 'seopress' ) . '" id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></div>',
			
			'url'    => '<div class="form-group comment-form-url"><label for="url">' . __( 'Website', 'seopress' ) . '</label> ' .
			'<input class="form-control" placeholder="' . __( 'Your website', 'seopress' ) . '" id="url" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></div>'   
			
			);
	return $fields;
	}
}
add_filter( 'comment_form_default_fields', 'seopress_comment_form_fields' );


if( !function_exists( 'seopress_comment_form' ) )
{
	function seopress_comment_form( $args )
	{
		$args['comment_field'] = '<div class="form-group comment-form-comment">
		<label for="comment">' . _x( 'Comment', 'noun' , 'seopress' ) . '<span class="required"> *</span></label> 
		<textarea class="form-control" placeholder="' . __( 'Your comment', 'seopress' ) . '" id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>
		</div>';
		
		$args['class_submit'] = 'seopressbtn'; // since WP 4.1
		
		return $args;
	}
}
add_filter( 'comment_form_defaults', 'seopress_comment_form' );
	

/*
* Add SEO Press Options menu
* @ add_theme_page( $page_title, $menu_title, $capability, $menu_slug, $function );
*/
if( !function_exists ( 'seopress_theme_options' ) )
{
	function seopress_theme_options()
	{
		add_theme_page( __( 'SEOPRESS Options', 'seopress') , __( 'SEOPRESS Options', 'seopress') , 'edit_theme_options', 'customize.php?autofocus[panel]=seopress_options', '' );
	}
}
add_action( 'admin_menu', 'seopress_theme_options' );


/*
* Add Custom Shortcut Links to WordPress Toolbar
*/
if( !function_exists( 'seopress_toolbar_link' ) )
{
	function seopress_toolbar_link( $wp_admin_bar )
	{
		// Don't display menu in admin bar if the current user isn't an administrator
		if( !is_admin() )
		{
			return;
		}
		
		// Add main link 
		$args = array(
			'id' => 'seopress_toolbar_link_main',
			'title' => 'SEOPress Options', 
			'href' => get_dashboard_url() . 'customize.php?autofocus[panel]=seopress_options', 
		);
		$wp_admin_bar->add_node($args);
		
		// Add the first child link 
		$args = array(
			'id' => 'seopress_toolbar_link_pro',
			'title' => 'Try SEOPress Pro', 
			'href' => 'http://rinkuyadav.com/product/seopress-pro-wordpress-theme/',
			'parent' => 'seopress_toolbar_link_main', 
			'meta' => array(
				'target' => '_blank'
				)
		);
		$wp_admin_bar->add_node($args);
		
		// Add the second child link 
		$args = array(
			'id' => 'seopress_toolbar_link_dnt',
			'title' => 'Donate to Theme Developer', 
			'href' => 'https://www.paypal.me/RinkuYadav',
			'parent' => 'seopress_toolbar_link_main', 
			'meta' => array(
				'target' => '_blank'
				)
		);
		$wp_admin_bar->add_node($args);
	}
}
add_action( 'admin_bar_menu', 'seopress_toolbar_link', 999 );
