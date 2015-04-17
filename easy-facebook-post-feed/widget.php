<?php
class EasyFacebookPostFeedWidget extends WP_Widget {
 
	function __construct() {
	    parent::__construct(
	    'EasyFacebookPostFeedWidget',
	    __('Easy Facebook Post Feed', 'easy-facebook-post-feed'),
	    array( 'description' => __( 'Allows user to display custom Facebook post to own page', 'easy-facebook-post-feed' ), ) 
	    );
	}

	public function widget( $args, $instance ) {
		echo $args['before_widget'];		
		echo do_shortcode('[easy-facebook-post-feed]');		 
		echo $args['after_widget'];
	}

	public function form( $instance ) {
	?>
	    <div class="form-wrap">
	    	<div class="form-field">
				<?php _e( 'Widget title', 'easy-facebook-post-feed' ); ?>:
				<br />
				<input type="text" name="EasyFacebookPostFeed_title" maxlength="2" size="2" value="<?php echo get_option('EasyFacebookPostFeed_title'); ?>" />
			</div>

	    	<div class="form-field">
				<?php _e( 'Number of posts to display', 'easy-facebook-post-feed' ); ?>:
				<br />
				<input type="text" name="EasyFacebookPostFeed_limit" maxlength="2" size="2" value="<?php echo get_option('EasyFacebookPostFeed_limit'); ?>" />
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
	<?php 
	}

	
    public function update( $new_instance, $old_instance ) {
    		update_option('EasyFacebookPostFeed_title', $_POST['EasyFacebookPostFeed_title']);
			update_option('EasyFacebookPostFeed_limit', $_POST['EasyFacebookPostFeed_limit']);
			update_option('EasyFacebookPostFeed_width', $_POST['EasyFacebookPostFeed_width']);
			update_option('EasyFacebookPostFeed_height', $_POST['EasyFacebookPostFeed_height']);
			update_option('EasyFacebookPostFeed_footer', $_POST['EasyFacebookPostFeed_footer']);
			update_option('EasyFacebookPostFeed_length', $_POST['EasyFacebookPostFeed_length']);

			if($_POST['EasyFacebookPostFeed_display_images'] == 'on')
				update_option('EasyFacebookPostFeed_display_images', 'yes');
			else
				update_option('EasyFacebookPostFeed_display_images', '');

			$color = str_replace('#', '', $_POST['EasyFacebookPostFeed_color']);
			update_option('EasyFacebookPostFeed_color', '#' . $color);
			$background = str_replace('#', '', $_POST['EasyFacebookPostFeed_background']);
			update_option('EasyFacebookPostFeed_background', '#' . $background);
	 
	}
}

function EasyFacebookPostFeedWidget_register() {
    register_widget( 'EasyFacebookPostFeedWidget' );
}
add_action( 'widgets_init', 'EasyFacebookPostFeedWidget_register' );
?>