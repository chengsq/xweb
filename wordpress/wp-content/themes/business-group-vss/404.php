<?php
get_header(); 
?>
<div class="about-ban">
  <div class="container">
    <div class="col-xs-7">
      <h2 class="about-head"><?php _e( 'Page Not Found', 'vssgroup_theme' ); ?> </h2>
    </div>
    <div class="col-xs-5">
      <div class="breadcmp-web"> <a href="<?php echo esc_url( home_url() ); ?>" class="about-bread"> <?php _e( 'Home', 'vssgroup_theme' ); ?> </a><?php _e( ' / Page Not Found', 'vssgroup_theme' ); ?> </div>
    </div>
  </div>
</div>
<!-- banner end -->
<div class="er-box">
  <div class="container">
    <div class="row">
      <div class="col-sm-offset-4 col-sm-8"> <img src="<?php echo get_template_directory_uri(); ?>/img/404.jpg"  class="img-responsive"/ alt="404-img"></div>
      <div class="col-sm-offset-3 col-sm-9">
        <p class="er-content"><span class="er-content1"><?php _e( 'We are sorry but the page you are looking for does not exist.', 'vssgroup_theme' ); ?></span><br>
         <?php _e( 'You could', 'vssgroup_theme' ); ?> <a href="<?php echo esc_url( home_url() ); ?>"><?php _e( 'return to the home page', 'vssgroup_theme' ); ?></a><?php _e( 'or search using the search box below.', 'vssgroup_theme' ); ?> </p>
      </div>
      <div class="col-sm-offset-4 col-sm-8">
        <div id="search">
          <div class="form-group-404">
            <form class="form-inline" action="<?php echo esc_url( home_url() ); ?>/">
              <input type="text" class="form-control"  name="s" placeholder="<?php _e( 'Search for....', 'vssgroup_theme' ); ?>">
              <button class="er-but btn"><?php _e( 'Search', 'vssgroup_theme' ); ?> </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Content coding end -->
<?php 
get_footer();
?>