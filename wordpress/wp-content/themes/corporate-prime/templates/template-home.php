<?php
/**
Template Name: Home Page 
*/
get_header(); 
?>
<div class="wrappper">
<?php 

    /****** Home Slider ******/
    get_template_part('template-parts/home','slider');
    
    /****** Home Services ******/
    get_template_part('template-parts/home','services');
    
    /****** Home News ******/
    get_template_part('template-parts/home','news');
    
    /****** Home Clients ******/
    get_template_part('template-parts/home','clients');
?>
</div>
<?php
get_footer();