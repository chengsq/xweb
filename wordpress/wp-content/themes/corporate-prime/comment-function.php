<?php 

// code for comment

if ( ! function_exists( 'corporate_prime_comment' ) ) :

function corporate_prime_comment( $comment, $args, $depth ){

	$GLOBALS['comment'] = $comment;

	//get theme data

	global $comment_data;

	//translations

	$leave_reply = $comment_data['translation_reply_to_coment'] ? $comment_data['translation_reply_to_coment'] :__('Reply','corporate-prime'); ?>

	<div class="col-xs-12 comment-detail">

		<div class="col-xs-2 comments-pics">

		<?php echo get_avatar($comment,$size = '80'); ?>

		</div>

		<div class="col-xs-10 comments-text">

			<h3>
				<?php comment_author();?> 
				<span> 
					<?php 
						if ( ('d M  y') == get_option( 'date_format' ) ) : ?>

					<?php comment_date('F j, Y');?>

					<?php else : ?>

					<?php comment_date(); ?>

					<?php endif; ?>

					<?php _e('at','corporate-prime');?>&nbsp;<?php comment_time('g:i a'); ?>
				 </span>
			 </h3>	
			 <p><?php comment_text() ; ?></p>

			<?php comment_reply_link(array_merge( $args, array('reply_text' => $leave_reply,'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>

			<?php if ( $comment->comment_approved == '0' ) : ?>

			<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'corporate-prime' ); ?></em>

			<br/>

			<?php endif; ?>

		</div>

	</div>								

	<?php

}

endif;

?>