<?php
/**
/* Template Name: Portfolio
* @package WordPress
* @subpackage VSS-THEME
* @since VSS-THEME 1.0
*/
get_header();
?>
<div class="about-ban">
  <div class="container">
    <div class="col-xs-7">
      <h2 class="about-head"><?php the_title();?></h2>
    </div>
    <div class="col-xs-5">
      <div class="breadcmp-web"> <a href="<?php echo esc_url( home_url() ); ?>" class="about-bread"> <?php _e( 'Home / ', 'vssgroup_theme' ); ?> </a><?php the_title();?></div>
    </div>
  </div>
</div>
<!-- banner end -->
<div class="container">
<div class="row">

<div class="port-tab">
    <!-- Nav tabs -->
	 <?php
		$orderby = 'name';
		$show_count = 0; // 1 for yes, 0 for no
		$pad_counts = 0; // 1 for yes, 0 for no
		$hierarchical = 1; // 1 for yes, 0 for no
		$title = '';
		echo '<ul class="nav nav-tabs" role="tablist">';

		 $args = array(
		  'orderby' => $orderby,
		  'show_count' => $show_count,
		  'pad_counts' => $pad_counts,
		  'hierarchical' => $hierarchical,
		  'taxonomy' => 'portfolio category',
		  'title_li' => $title 
		  );
		echo '<li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">All</a></li>';
		$categories = get_categories($args);
		  foreach($categories as $category) 
			{ 
				$categoryfinal = isset($category->name)? $category->name : '';
				echo '<li role="presentation"><a href="#'.$categoryfinal.'" aria-controls="'.$categoryfinal.'" role="tab" data-toggle="tab">'.
				$categoryfinal.'</a></li>';
				$cat_name = $categoryfinal;
			} 
			echo '</ul>'; 
		    echo '<div class="tab-content">';
		    foreach($categories as $category) { 
			 $categoryfinal = isset($category->name)? $category->name : '';
		     $categoryslug = isset($category->slug)? $category->slug : '';
			echo '<div role="tabpanel" class="tab-pane" id="' .$categoryfinal.'">';
			
		   $port = new WP_Query(array('post_type' => 'portfolio','portfolio category'=> $categoryslug  ,'post_status' => 'publish','posts_per_page' => 10));  
			while($port->have_posts()) : $port->the_post(); 
           ?>
			 <div class="col-sm-12">
			  <div class="port-item">
				<div class="port-img">
				
									<div class="post-image vss-port-images">
										<?php
						if ( has_post_thumbnail() ) :
							?>							<?php the_post_thumbnail('post-thumbnail', array( 'class'	=> "img-responsive")); ?>
							   <?php endif; ?>
									</div>
							<?php
								$clientname = get_post_meta( get_the_ID(), 'clients_name', 'vssgroup_theme' ); 
									$skills = get_post_meta( get_the_ID(), 'skills', 'vssgroup_theme' ); 
									$plinks = get_post_meta( get_the_ID(), 'plinks' , 'vssgroup_theme'); 
								?></div>
				<div class="port-content-blog">
				  <p class=" port-blog-head"><?php the_title(); ?></p>
				  <div class="pro-menu">
					<ul>
					  <li class="port-cli"><span class="port-des"><?php _e( 'Clients:', 'vssgroup_theme' ); ?></span> <?php echo $clientname[0]; ?></li>
					  <li class="port-cli"><span class="port-des"><?php _e( 'Date:', 'vssgroup_theme' ); ?></span><a href="#"> <?php echo get_the_time('M') ?> <?php echo get_the_time('d') ?>, <?php echo get_the_time('Y') ?> </a></li>
					  <li class="port-cli"><span class="port-des"><?php _e( 'Skills:', 'vssgroup_theme' ); ?></span> <?php echo $skills[0]; ?> </li>
					</ul>
					<?php the_excerpt(30); ?>
					<a href="<?php echo $plinks[0]; ?>" class="port-button"><?php _e( 'View Project', 'vssgroup_theme' ); ?>  </a></div>
				</div>
			  </div>
			</div>
			<?php 
			endwhile; 
			 wp_reset_postdata();
		
			echo '</div>';     ?> 
			<?php } 
			echo '<div role="tabpanel" class="tab-pane active" id="home">';
					  $categoryslug = isset($category->slug)? $category->slug : '';
					  $cat_name = $categoryslug;
				?>

 <?php   
    $page = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $args = array(
					'post_type' => 'portfolio',
					'post_status'      => 'publish',
					'paged'			   => $page,
					); 
				$query = new WP_Query($args); 
				if ( $query -> have_posts() ) : while ( $query -> have_posts() ) : $query -> the_post();
     ?>
     <div class="col-sm-12">
      <div class="port-item">
        <div class="port-img">
							<div class="post-image vss-port-images">
							<?php
						if ( has_post_thumbnail() ) :
							?>							<?php the_post_thumbnail('post-thumbnail', array( 'class'	=> "img-responsive")); ?>
							   <?php endif; ?>
							</div>
					<?php
							$clientname = get_post_meta( get_the_ID(), 'clients_name', 'vssgroup_theme' ); 
							$skills = get_post_meta( get_the_ID(), 'skills', 'vssgroup_theme' ); 
							$plinks = get_post_meta( get_the_ID(), 'plinks', 'vssgroup_theme' );
												
						?></div>
        <div class="port-content-blog">
          <p class=" port-blog-head"><?php the_title(); ?></p>
          <div class="pro-menu">
            <ul>
              <li class="port-cli"><span class="port-des"><?php _e( 'Clients:', 'vssgroup_theme' ); ?></span> <?php echo $clientname[0]; ?></li>
              <li class="port-cli"><span class="port-des"><?php _e( 'Date:', 'vssgroup_theme' ); ?></span><a href="#"> <?php echo get_the_time('M') ?> <?php echo get_the_time('d') ?>, <?php echo get_the_time('Y') ?> </a></li>
              <li class="port-cli"><span class="port-des"><?php _e( 'Skills:', 'vssgroup_theme' ); ?></span> <?php echo $skills[0]; ?> </li>
            </ul>
            <?php the_excerpt(30);  ?>           
            <a href="<?php echo $plinks[0]; ?>" class="port-button"> <?php _e( 'View Project', 'vssgroup_theme' ); ?> </a> </div>
        </div>
      </div>
    </div>
    <?php 
    endwhile; 
    wp_reset_postdata();
	endif;

    echo '</div>';   
    echo '</div>';
     ?>
    </div>
</div>
</div>

<!-- Content coding end -->
<?php 
get_footer();
?>