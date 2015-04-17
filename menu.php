<?php
function EasyFacebookPostFeed_menu(){
    add_menu_page('EasyFacebookPostFeed', 'Facebook Feed', 10, 'EasyFacebookPostFeed', 'EasyFacebookPostFeed_settings');
    add_submenu_page('EasyFacebookPostFeed', 'Documentation', 'Documentation', 10, 'Documentation', 'EasyFacebookPostFeed_docs');
    /*
    add_submenu_page('DistinctNewsletter', 'Impostazioni', 'Impostazioni', 'administrator', 'distinct_settings', 'distinct_settings');
	add_submenu_page('DistinctNewsletter', 'Gruppi', 'Gruppi', 'administrator', 'distinct_group', 'distinct_group');
	*/
}
	
function EasyFacebookPostFeed_settings(){
	$EasyFacebookPostFeed = new EasyFacebookPostFeed();

    if(isset($_POST['btn']))
    {
    	update_option('EasyFacebookPostFeed_app_id', $_POST['EasyFacebookPostFeed_app_id']);
		update_option('EasyFacebookPostFeed_app_secret', $_POST['EasyFacebookPostFeed_app_secret']);
		update_option('EasyFacebookPostFeed_page_id', $_POST['EasyFacebookPostFeed_page_id']);
		update_option('EasyFacebookPostFeed_limit', $_POST['EasyFacebookPostFeed_limit']);
		update_option('EasyFacebookPostFeed_width', $_POST['EasyFacebookPostFeed_width']);
		update_option('EasyFacebookPostFeed_height', $_POST['EasyFacebookPostFeed_height']);
		update_option('EasyFacebookPostFeed_footer', $_POST['EasyFacebookPostFeed_footer']);
		update_option('EasyFacebookPostFeed_length', $_POST['EasyFacebookPostFeed_length']);
		update_option('EasyFacebookPostFeed_title', $_POST['EasyFacebookPostFeed_title']);

		if($_POST['EasyFacebookPostFeed_display_images'] == 'on')
			update_option('EasyFacebookPostFeed_display_images', 'yes');
		else
			update_option('EasyFacebookPostFeed_display_images', '');

		$color = str_replace('#', '', $_POST['EasyFacebookPostFeed_color']);
		update_option('EasyFacebookPostFeed_color', '#' . $color);
		$background = str_replace('#', '', $_POST['EasyFacebookPostFeed_background']);
		update_option('EasyFacebookPostFeed_background', '#' . $background);
    }
    wp_enqueue_script('EasyFacebookPostFeed_colorpicker', WP_PLUGIN_URL.'/'.$EasyFacebookPostFeed->get_name().'/js/colorpicker.js', array('jquery'));
    wp_enqueue_script('EasyFacebookPostFeed_eye', WP_PLUGIN_URL.'/'.$EasyFacebookPostFeed->get_name().'/js/eye.js');
    wp_enqueue_script('EasyFacebookPostFeed_utils', WP_PLUGIN_URL.'/'.$EasyFacebookPostFeed->get_name().'/js/utils.js');
    wp_enqueue_script('EasyFacebookPostFeed_layout', WP_PLUGIN_URL.'/'.$EasyFacebookPostFeed->get_name().'/js/layout.js');
    wp_enqueue_style('EasyFacebookPostFeed_colorpicker', WP_PLUGIN_URL.'/'.$EasyFacebookPostFeed->get_name().'/css/colorpicker.css');

    require_once (dirname (__FILE__) . '/pages/settings.php');
}

function EasyFacebookPostFeed_docs()
{
	require_once (dirname (__FILE__) . '/pages/docs.php');
}
?>