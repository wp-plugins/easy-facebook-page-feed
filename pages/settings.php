<div class="wrap">
    <h2><?php _e( 'Settings', 'easy-facebook-post-feed' ); ?></h2>
    <?php
    $err = '';
	if(isset($_POST['EasyFacebookPostFeed_app_id']) && $_POST['EasyFacebookPostFeed_app_id'] == '') 	  $err .= __('- Enter a valid app id<br />', 'easy-facebook-post-feed');
	if(isset($_POST['EasyFacebookPostFeed_app_secret']) && $_POST['EasyFacebookPostFeed_app_secret'] == '') $err .= __('- Enter a valid app secret<br />', 'easy-facebook-post-feed');
	if(isset($_POST['EasyFacebookPostFeed_page_id']) && $_POST['EasyFacebookPostFeed_page_id'] == '') 	  $err .= __('- Enter a valid page id', 'easy-facebook-post-feed');
    
	if($err != '') { ?>
		<div id="message" class="error fade below-h2">
			<p>
				<?php _e( '<strong>Please, fix this errors</strong>', 'easy-facebook-post-feed' ); ?><br />
				<?php echo $err; ?>
			</p>
		</div>
    <?php } ?>

    <?php if(isset($_POST['btn']) && $err == '') { ?>
		<div id="message" class="updated fade below-h2"><p><?php _e( 'Impostazioni modificate correttamente', 'easy-facebook-post-feed' ); ?></p></div>
    <?php } ?>

    <div class="block-form">
    	<script type="text/javascript">
    	jQuery(function(){
    		 jQuery('.color, .color2').ColorPicker(
    		 	{
					onSubmit: function(hsb, hex, rgb, el) {
						jQuery(el).val(hex);
						jQuery(el).ColorPickerHide();
					},
					onBeforeShow: function () {
						jQuery(this).ColorPickerSetColor(this.value);
					}
				}
    		 ).bind('keyup', function(){
				jQuery(this).ColorPickerSetColor(this.value);
			});
    	});
    	</script>
    	<form name="EasyFacebookPostFeed_settings" method="post" enctype="multipart/form-data">
    		<h2><?php _e( 'Api settings', 'easy-facebook-post-feed' ); ?></h2>
			<div class="form-wrap">
				<div class="form-field">
					App id:
					<br />
					<input type="text" name="EasyFacebookPostFeed_app_id" maxlength="150" value="<?php echo get_option('EasyFacebookPostFeed_app_id'); ?>" />
				</div>
			    
			    <div class="form-field">
					App secret:
					<br />
					<input type="text" name="EasyFacebookPostFeed_app_secret" maxlength="150" value="<?php echo get_option('EasyFacebookPostFeed_app_secret'); ?>" />
				</div>

				<div class="form-field">
					<?php _e( 'Page id', 'easy-facebook-post-feed' ); ?>:
					<br />
					<sup><?php _e( 'Insert only id or name of page. Eg: <a href="https://www.facebook.com/ConcinaMario" target="_blank">https://www.facebook.com/ConcinaMario</a> use <strong>ConcinaMario</strong> as Page id', 'easy-facebook-post-feed' ); ?>:</sup>
					<br />
					<input type="text" name="EasyFacebookPostFeed_page_id" maxlength="150" value="<?php echo get_option('EasyFacebookPostFeed_page_id'); ?>" />
				</div>

				<div class="form-field">
					<?php _e( 'Number of posts to display', 'easy-facebook-post-feed' ); ?>:
					<br />
					<input type="text" name="EasyFacebookPostFeed_limit" maxlength="2" size="2" value="<?php echo get_option('EasyFacebookPostFeed_limit'); ?>" />
				</div>
			</div>

			<h2><?php _e( 'Customize feed box', 'easy-facebook-post-feed' ); ?></h2>
			<div class="form-wrap">
				<div class="form-field">
					<?php _e( 'Widget Title', 'easy-facebook-post-feed' ); ?>
					<br />
					<input type="text" name="EasyFacebookPostFeed_title" maxlength="150" value="<?php echo get_option('EasyFacebookPostFeed_title'); ?>" />
				</div>

				<div class="form-field">
					<?php _e( 'Width', 'easy-facebook-post-feed' ); ?>
					<br />
					<input type="text" name="EasyFacebookPostFeed_width" maxlength="5" value="<?php echo get_option('EasyFacebookPostFeed_width'); ?>" />
				</div>

				<div class="form-field">
					<?php _e( 'Height', 'easy-facebook-post-feed' ); ?>
					<br />
					<input type="text" name="EasyFacebookPostFeed_height" maxlength="5" value="<?php echo get_option('EasyFacebookPostFeed_height'); ?>" />
				</div>

				<div class="form-field">
					<?php _e( 'Background color', 'easy-facebook-post-feed' ); ?>
					<br />
					<input type="text" class="color" name="EasyFacebookPostFeed_background" maxlength="7" value="<?php echo get_option('EasyFacebookPostFeed_background'); ?>" />
				</div>

				<div class="form-field">
					<?php _e( 'Border color', 'easy-facebook-post-feed' ); ?>
					<br />
					<input type="text" class="color2" name="EasyFacebookPostFeed_color" maxlength="7" value="<?php echo get_option('EasyFacebookPostFeed_color'); ?>" />
				</div>

				<div class="form-field">
					<?php _e( 'Display images inside post', 'easy-facebook-post-feed' ); ?>
					<br />
					<input type="checkbox" class="display_images" name="EasyFacebookPostFeed_display_images" maxlength="7" <?php if(get_option('EasyFacebookPostFeed_display_images') == 'yes') echo 'checked'; ?> />
				</div>

				<div class="form-field">
					<?php _e( 'Message length', 'easy-facebook-post-feed' ); ?> <sup><?php _e( '0 = full length', 'easy-facebook-post-feed' ); ?></sup>
					<br />
					<input type="text" name="EasyFacebookPostFeed_length" maxlength="3" value="<?php echo get_option('EasyFacebookPostFeed_length'); ?>" /> <sup><?php _e( 'characters', 'easy-facebook-post-feed' ); ?></sup>
				</div>

				<div class="form-field">
					<?php _e( 'Footer info', 'easy-facebook-post-feed' ); ?>
					<br />
					<input type="text" name="EasyFacebookPostFeed_footer" maxlength="150" value="<?php echo get_option('EasyFacebookPostFeed_footer'); ?>" />
				</div>
			</div>

			<div class="form-field">
				<input type="submit" name="btn" value="<?php echo __('Save'); ?>" class="button-primary" />
			</div>
		</form>
	</div>

	<div class="block-demo">
		<h2><?php _e( 'Live demo', 'easy-facebook-post-feed' ); ?></h2>
		<?php $EasyFacebookPostFeed = new EasyFacebookPostFeed(); $EasyFacebookPostFeed->displayFeed(); ?>
	</div>
</div>