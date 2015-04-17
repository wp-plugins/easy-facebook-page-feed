<?php
ob_start();
/*
Plugin Name: Easy Facebook Post Feed
Plugin URI: http://www.marioconcina.it/blog/easy-facebook-post-feed-plugin-for-wordpress
Description: Easy way to display a customizable Facebook feed of any public Facebook page, on your website.
Author: Mario Concina
Version: 1.0
Author URI: http://www.marioconcina.it/blog
*/

require_once(dirname (__FILE__). '/hooks.php');
require_once(dirname (__FILE__). '/script.php');
require_once(dirname (__FILE__). '/menu.php');
require_once(dirname (__FILE__). '/widget.php');
//require_once(dirname (__FILE__). '/common.php');
//require_once(dirname (__FILE__). '/functions.php');

if (!class_exists('EasyFacebookPostFeed')){
	class EasyFacebookPostFeed {			
			function EasyFacebookPostFeed(){
			}
			
			public function init()
			{
				add_option('EasyFacebookPostFeed_app_id', '');
				add_option('EasyFacebookPostFeed_app_secret', '');
				add_option('EasyFacebookPostFeed_page_id', '');
				add_option('EasyFacebookPostFeed_limit', '5');
				add_option('EasyFacebookPostFeed_width', '250px');
				add_option('EasyFacebookPostFeed_height', '600px');
				add_option('EasyFacebookPostFeed_color', '#e0e0e0');
				add_option('EasyFacebookPostFeed_display_images', 'yes');
				add_option('EasyFacebookPostFeed_footer', 'Follow us on Facebook');
				add_option('EasyFacebookPostFeed_length', '140');
				add_option('EasyFacebookPostFeed_title', get_option('blogname'));
			}

			public function get_name(){
				return 'easy-facebook-page-feed';
			}

			public function displayFeed()
			{
				$app_id 	= get_option('EasyFacebookPostFeed_app_id');
				$app_secret	= get_option('EasyFacebookPostFeed_app_secret');
				$page_id 	= get_option('EasyFacebookPostFeed_page_id');
				$limit 		= get_option('EasyFacebookPostFeed_limit');
				$width      = get_option('EasyFacebookPostFeed_width');
				$height     = get_option('EasyFacebookPostFeed_height');
				$color      = get_option('EasyFacebookPostFeed_color');
				$background = get_option('EasyFacebookPostFeed_background');
				$images     = get_option('EasyFacebookPostFeed_display_images');
				$footer     = get_option('EasyFacebookPostFeed_footer');
				$length     = get_option('EasyFacebookPostFeed_length');
				$title 		= get_option('EasyFacebookPostFeed_title');
				$length = ($length == 0) ? 1000000 : $length;
				require_once 'inc/facebook.php';
				$err = '';
				if($app_id == '') 	  $err .= __('- Enter a valid app id<br />', 'easy-facebook-post-feed');
				if($app_secret == '') $err .= __('- Enter a valid app secret<br />', 'easy-facebook-post-feed');
				if($page_id == '') 	  $err .= __('- Enter a valid page id', 'easy-facebook-post-feed');
				if($err == '')
				{
					$facebook = new Facebook(array(
					    'appId' => $app_id,
					    'secret' => $app_secret,
					));
					$fields = "id,message,picture,link,name,description,type,icon,created_time,from,object_id";
					$fbApiGetPosts = $facebook->api('/' . $page_id . '/posts?limit=' . $limit . '&fields=' . $fields);
					$getFb = array();

					if (isset($fbApiGetPosts["data"]) && !empty($fbApiGetPosts["data"])) {
					    echo '<p style="height:1px; padding:0; margin:0; text-indent:-9999999px;">' . __('developed by', 'easy-facebook-post-feed') . ': <a href="http://www.marioconcina.it/blog">Mario Concina</a>';
						echo '<div id="EasyFacebookPostFeed" style="border:' . $color . ' 1px solid; width:' . $width . '; height:' . $height . '; background:' . $background . '">';
						echo '<h5 style="background-color:' . $color . '">' . $title . '</h5>';
						echo '<ul>';
					    foreach($fbApiGetPosts["data"] as $data)
					    {
					    	if($data['message'] != '')
					    	{
						    	echo '<li><p>';
						    	if($data['picture'] != '' && $images == 'yes') echo '<img src="' . $data['picture'] . '" alt="" /><br style="clear:both;" />';
						    	echo '' . substr($data['message'], 0, $length);
						    	echo '<a class="readmore" href="' . $data['link'] . '" target="_blank">' . __("read more &raquo;", "easy-facebook-post-feed") . '</a>';
						    	echo '</p></li>';
					    	}
					    }
					    echo '</ul>';
					    echo '<h5 style="background:' . $color . '"><a href="https://www.facebook.com/' . $page_id . '" target="_blank" style="text-decoration:none; color:' . $background . '">' . $footer . '</a></h5>';
					    echo '</div>';
					    echo '<p>' . __('developed by', 'easy-facebook-post-feed') . ': <a href="http://www.marioconcina.it/blog">Mario Concina</a>';
					}
				}
				else
					{
						echo __('<strong>Please, fix this errors</strong>', 'easy-facebook-post-feed') . ':<br />';
						echo $err;
					}
			}
	}
}

if (class_exists('EasyFacebookPostFeed'))
	$EasyFacebookPostFeed = new EasyFacebookPostFeed();
		else
			die("Classe EasyFacebookPostFeed non registrata.");
		
$EasyFacebookPostFeed->init();
?>