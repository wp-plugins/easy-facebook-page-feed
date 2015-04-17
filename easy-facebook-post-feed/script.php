<?php
function EasyFacebookPostFeed_init()
{
	global $EasyFacebookPostFeed;
	wp_enqueue_style('EasyFacebookPostFeed_style', WP_PLUGIN_URL.'/'.$EasyFacebookPostFeed->get_name().'/css/EasyFacebookPostFeed.css');
	load_plugin_textdomain('easy-facebook-post-feed', false, basename( dirname( __FILE__ ) ) . '/languages' );
	/*
	wp_enqueue_script('distinct_controlli', WP_PLUGIN_URL.'/'.$DistinctNewsletter->get_name().'/scripts/controlli.js', array('jquery'));
	wp_enqueue_style('thickbox');
	wp_enqueue_script('thickbox');
    wp_enqueue_script('my-upload');
    */
}
?>