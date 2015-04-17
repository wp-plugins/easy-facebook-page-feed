<?php
add_action('admin_menu', 'EasyFacebookPostFeed_menu');
add_action('init', 'EasyFacebookPostFeed_init');
add_shortcode("easy-facebook-post-feed", "EasyFacebookPostFeed_shortcode");

function EasyFacebookPostFeed_shortcode()
{
	$EasyFacebookPostFeed = new EasyFacebookPostFeed();
	return $EasyFacebookPostFeed->displayFeed(); 
}
/*
add_action('admin_footer', 'add_media_upload');
add_filter('mce_buttons', 'modify_mce_buttons', 1);
*/
?>