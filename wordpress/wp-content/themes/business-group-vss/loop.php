<!-- Start the Loop. --> 
<?php	if ( have_posts()) : while ( have_posts()) : the_post();?>
                    <div class="col-sm-12 blog-single-pagi">
                    <div class="row" style="border-bottom:1px solid #eaeaea; padding-bottom:10px;">					
					<div class="col-sm-3 blog-box"> 						<div class="post-image vss-post-image">					<?php						if ( has_post_thumbnail() ) :							?>							<?php the_post_thumbnail('post-thumbnail', array( 'class'	=> "img-responsive thumbnail")); ?>							   <?php endif; ?> 						</div> 
                    </div>
					<div class="col-sm-9">
						  <p class="blog-head"> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
						  <span class="blog-post"> <?php echo get_the_time('M') ?> <?php echo get_the_time('d') ?>, <?php echo get_the_time('Y') ?> </span> <br />
						  <span class="blog-post"><?php _e( 'Author:', 'vssgroup_theme' ); ?> <?php the_author_posts_link(); ?></span>
						  <?php  the_excerpt(); ?> 
						  <span class="blog-read">
						  <a href="<?php the_permalink(); ?>" target="_blank"> <span class="home-read1"><?php _e( 'Read more', 'vssgroup_theme' ); ?></span></a>
						  </span> </div>
				          </div>
						  </div>
						   <?php 
						   endwhile;
						   wp_reset_postdata();
						   ?>
						  
							<?php 
							else:
							?>
							<div class="post">
								<p>
							 <center><h4><?php _e( 'Sorry No Post Found...', 'vssgroup_theme' ); ?></h4></center>
								</p>
							</div>
							 
				<?php 
				endif;
				?> 
			
				