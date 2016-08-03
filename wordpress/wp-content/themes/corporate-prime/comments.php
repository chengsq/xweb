<?php if ( post_password_required() ) : ?>
	<p><?php _e( 'This post is password protected. Enter the password to view any comments.', 'corporate-prime' ); ?></p>
<?php return;
endif; ?>
<?php if ( have_comments() ) : ?>
<div class="row c_comment">
	
		<h2><i class="fa fa-comments"></i><?php echo comments_number(__('0 Comment','corporate-prime'), __('1 Comment','corporate-prime'), __('% Comments','corporate-prime')); ?></h2>
		<?php wp_list_comments( array( 'callback' => 'corporate_prime_comment' ) ); ?>		
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
		<nav id="comment-nav-below row pagination">
			<ul class="pager">
				<li class="nav-previous previous"><?php previous_comments_link( '<i class="fa fa-arrow-left"></i> '.__( 'Previous Comments', 'corporate-prime' ) ); ?>
				</li>
				<li class="nav-next next"><?php next_comments_link( __( 'Next Comments', 'corporate-prime' ).' <i class="fa fa-arrow-right"></i>' ); ?>
				</li>
			</ul>
		</nav>
	<?php endif;  ?>
	</div>		
<?php endif; ?>
<?php if ( comments_open() ) : ?>
	<div class="row c_comment_form">
		<?php $fields=array(
			'author' => '<div class="form-group col-md-4"><label  for="name">'.__( 'NAME', 'corporate-prime' ).':</label><input type="text" class="form-control" id="name" name="author" placeholder="'.__( 'Full Name', 'corporate-prime' ).'"></div>',
			'email' => '<div class="form-group col-md-4"><label for="email">'.__( 'EMAIL', 'corporate-prime' ).':</label><input type="email" class="form-control" id="email" name="email" placeholder="'.__( 'Your Email Address', 'corporate-prime' ).'"></div>',
			'website' => '<div class="form-group col-md-4"><label  for="web">'.__( 'WEBSITE', 'corporate-prime' ).':</label><input type="text" class="form-control" id="web" placeholder="'.__( 'Website', 'corporate-prime' ).'"></div>',
		);
		function corporate_prime_fields($fields) {
			return $fields;
		}
		add_filter('wl_comment_form_default_fields','corporate_prime_fields');
			$defaults = array(
				'fields'=> apply_filters( 'wl_comment_form_default_fields', $fields ),
				'comment_field'=> '<div class="form-group col-md-12"><label  for="message">'.__('COMMENT', 'corporate-prime').':</label><textarea class="form-control" rows="5" id="comment" name="comment" placeholder="'.esc_html__('Message', 'corporate-prime').'"></textarea></div>',
				'submit_field' => '<div class="form-group col-md-4">%1$s %2$s</div>',
				'logged_in_as' => '<p class="logged-in-as">'. __( "Logged in as ",'corporate-prime' ).'<a href="'.admin_url( 'profile.php' ).'">'.$user_identity.'</a>'.'<a href="'. wp_logout_url( esc_url(get_permalink()) ).'" title="'.esc_html__('Log out of this account', 'corporate-prime').'">'.__(" Log out?",'corporate-prime').'</a>' . '</p>',
				'title_reply_to' => __( 'Leave a Reply to %s','corporate-prime'),
				'class_submit' => 'btn',
				'label_submit'=>__( 'SUBMIT COMMENT','corporate-prime'),
				'comment_notes_before'=> '',
				'comment_notes_after'=>'',
				'title_reply'=> '<h2>'.__('Leave Your Comment Here','corporate-prime').'</h2>',
				'role_form'=> 'form',
			);
		comment_form($defaults); ?>		
	</div>
<?php endif; // If registration required and not logged in ?>