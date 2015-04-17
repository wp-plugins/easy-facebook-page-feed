<div class="wrap">
    <h2><?php _e( 'Documentation', 'easy-facebook-post-feed' ); ?></h2>
    <?php _e( 'Easy Facebook Post Feed is a quickly Wordpress Plugin that allow user to display a custom Facebook Feed in your website.<br /><br />', 'easy-facebook-post-feed' ); ?>
    
    <div class="block-form">
    	 <ul>
	    	<li><?php _e( '1. Connect at <a href="https://developers.facebook.com/" target="_blank">developers.facebook.com</a> to create your own app', 'easy-facebook-post-feed' ); ?></li>
	    	<li><?php _e( '2. Click on "My App" menu and "Add a New App"', 'easy-facebook-post-feed' ); ?></li>
	    	<li><?php _e( '3. Choose app for website (www) and give it a name', 'easy-facebook-post-feed' ); ?></li>
	    	<li><?php _e( '4. Copy App id and secret and past in <a href="?page=EasyFacebookPostFeed">App Setting</a>', 'easy-facebook-post-feed' ); ?></li>
		</ul>

    	<h2><?php _e( 'Override css rules', 'easy-facebook-post-feed' ); ?></h2>
    	<p><?php _e( 'Copy and paste in your stylesheet to override default rules (eg: font family or text align):', 'easy-facebook-post-feed' ); ?></p>
<pre>
#EasyFacebookPostFeed{ border: 1px solid #0052ae; overflow: auto; min-width: 250px; height: auto; }
#EasyFacebookPostFeed h5{ background-image:url('../images/facebook-icon.png'); background-repeat:no-repeat;
						  background-position:5px 10px; color: #FFF; margin: 0; font-size: 12px; padding: 10px 10px 10px 30px;
						  text-transform: uppercase; }
#EasyFacebookPostFeed ul{ margin: 0; list-style-type: none; }
#EasyFacebookPostFeed ul li{ border-bottom: 1px dotted #CCC; min-height: 150px; }
#EasyFacebookPostFeed ul li a{ text-decoration: none; }
#EasyFacebookPostFeed ul li p{ padding: 0 15px; }
#EasyFacebookPostFeed ul li p .readmore{ float: right; color: #000000; margin-bottom: 15px; }
</pre>
    </div>
    <div class="block-demo">
		<h2><?php _e( 'Live demo', 'easy-facebook-post-feed' ); ?></h2>
		<?php $EasyFacebookPostFeed = new EasyFacebookPostFeed(); $EasyFacebookPostFeed->displayFeed(); ?>
	</div>
</div>