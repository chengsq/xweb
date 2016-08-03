<?php
function corporate_prime_get_social_block(){
    global $corporate_prime_theme_data; $theme_data = $corporate_prime_theme_data;
    $open_new_tab = ($theme_data['social_link_open_in_new_tab'])?'target="_blank"':'';
    ?>
        <ul class="social">
        	<?php if(!empty($theme_data['social_link_facebook'])): ?>
            <li><a href="<?php echo esc_url($theme_data['social_link_facebook']); ?>"  <?php echo esc_attr($open_new_tab); ?>><i class="fa fa-facebook icon"></i></a></li>
            <?php endif; ?>
            <?php if(!empty($theme_data['social_link_google'])): ?>
            <li><a href="<?php echo esc_url($theme_data['social_link_google']); ?>"  <?php echo esc_attr($open_new_tab); ?>><i class="fa fa-google-plus icon"></i></a></li>
            <?php endif; ?>
            <?php if(!empty($theme_data['social_link_twitter'])): ?>
            <li><a href="<?php echo esc_url($theme_data['social_link_twitter']); ?>"  <?php echo esc_attr($open_new_tab); ?>><i class="fa fa-twitter icon"></i></a></li>
            <?php endif; ?>
            <?php if(!empty($theme_data['social_link_youtube'])): ?>
            <li><a href="<?php echo esc_url($theme_data['social_link_youtube']); ?>"  <?php echo esc_attr($open_new_tab); ?>><i class="fa fa-youtube icon"></i></a></li>
            <?php endif; ?>
            <?php if(!empty($theme_data['social_link_linkedin'])): ?>
            <li><a href="<?php echo esc_url($theme_data['social_link_linkedin']); ?>"  <?php echo esc_attr($open_new_tab); ?>><i class="fa fa-linkedin icon"></i></a></li>
            <?php endif; ?>
        </ul>    
    <?php
}

function corporate_prime_excerpt_more($more) {
    return '';
}
add_filter('excerpt_more', 'corporate_prime_excerpt_more');

?>