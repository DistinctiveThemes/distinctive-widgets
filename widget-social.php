<?php
if ( !defined('ABSPATH')) exit;

class dt_social extends WP_Widget {

	function dt_social() {
		$widget_ops = array( 'classname' => 'distinctive_themes_social_widget', 'description' => 'Display social icons on your site' );
		$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'distinctive_themes_social_widget' );
		parent::__construct( 'distinctive_themes_social_widget', 'DistinctiveThemes: Social Icons', $widget_ops, $control_ops);	
	}
	public function widget($args, $instance) {
		extract( $args );
		$title	= $instance['title'];
		$fbook_l	= $instance['fbook_l'];
		$tweet_l	= $instance['tweet_l'];
		$feed_l 	= $instance['feed_l'];
		$instagram_l	= $instance['instagram_l'];
		$flickr_l	= $instance['flickr_l'];
		$lastfm_l	= $instance['lastfm_l'];
		$linkin_l	= $instance['linkin_l'];
		$plus1_l	= $instance['plus1_l'];
		$ytube_l	= $instance['ytube_l'];
		$vimeo_l	= $instance['vimeo_l'];
		$digg_l	= $instance['digg_l'];
		$stumb_l	= $instance['stumb_l'];
		$devia_l	= $instance['devia_l'];
		$delic_l	= $instance['delic_l'];
		$fsq_l	= $instance['fsq_l'];

		echo $before_widget;

			if ( $title ) {
				echo $before_title . $title . $after_title;	
			}
			
			if($fbook_l) { 
				echo '<a target="_blank" class="facebook" href="' . $fbook_l . '" rel="nofollow"><i class="fa fa-facebook"></i></a>';
			}
			if($tweet_l) {
				echo '<a target="_blank" class="twitter" href="' . $tweet_l . '" rel="nofollow"><i class="fa fa-twitter"></i></a>';
			}
			if($feed_l) {
				echo '<a target="_blank" class="feed" href="' . $feed_l . '" rel="nofollow"><i class="fa fa-rss"></i></a>';
			}
			if($instagram_l) {
				echo '<a target="_blank" class="instagram" href="' . $instagram_l . '" rel="nofollow"><i class="fa fa-instagram"></i></a>';
			}
			if($plus1_l) {
				echo '<a target="_blank" class="plus1" href="' . $plus1_l . '" rel="nofollow"><i class="fa fa-google-plus"></i></a>';
			}
			if($flickr_l) {
				echo '<a target="_blank" class="flickr" href="' . $flickr_l . '" rel="nofollow"><i class="fa fa-flickr"></i></a>';
			}
			if($lastfm_l) {
				echo '<a target="_blank" class="lastfm" href="' . $lastfm_l . '" rel="nofollow"><i class="fa fa-lastfm"></i></a>';
			}
			if($linkin_l) {
				echo '<a target="_blank" class="linkedin" href="' . $linkin_l . '" rel="nofollow"><i class="fa fa-linkedin"></i></a>';
			}
			if($ytube_l) {
				echo '<a target="_blank" class="youtube" href="' . $ytube_l . '" rel="nofollow"><i class="fa fa-youtube"></i></a>';
			}
			if($vimeo_l) {
				echo '<a target="_blank" class="vimeo" href="' . $vimeo_l . '" rel="nofollow"><i class="fa fa-vimeo"></i></a>';
			}
			if($delic_l) {
				echo '<a target="_blank" class="delicious" href="' . $delic_l . '" rel="nofollow"><i class="fa fa-delicious"></i></a>';
			}
			if($stumb_l) {
				echo '<a target="_blank" class="stumbleupon" href="' . $stumb_l . '" rel="nofollow"><i class="fa fa-stumbleupon"></i></a>';
			}
			if($devia_l) {
				echo '<a target="_blank" class="deviantart" href="' . $devia_l . '" rel="nofollow"><i class="fa fa-deviantart"></i></a>';
			}
			if($digg_l) {
				echo '<a target="_blank" class="digg" href="' . $digg_l . '" rel="nofollow"><i class="fa fa-digg"></i></a>';
			}
			if($fsq_l) {
				echo '<a target="_blank" class="foursquare" href="' . $fsq_l . '" rel="nofollow"><i class="fa fa-foursquare"></i></a>';
			}

			echo '<div class="clear clearfix"></div>';
			
		echo "<div class='clear'></div>$after_widget"; 
	}
	
	function update($new_instance, $old_instance) { 
		$instance['title']	= ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['fbook_l'] = ( ! empty( $new_instance['fbook_l'] ) ) ? sanitize_text_field( $new_instance['fbook_l'] ) : '';
		$instance['tweet_l'] = ( ! empty( $new_instance['tweet_l'] ) ) ? sanitize_text_field( $new_instance['tweet_l'] ) : '';
		$instance['feed_l']  = ( ! empty( $new_instance['feed_l'] ) ) ? sanitize_text_field( $new_instance['feed_l'] ) : '';
		$instance['instagram_l'] = ( ! empty( $new_instance['instagram_l'] ) ) ? sanitize_text_field( $new_instance['instagram_l'] ) : '';
		$instance['plus1_l'] = ( ! empty( $new_instance['plus1_l'] ) ) ? sanitize_text_field( $new_instance['plus1_l'] ) : '';
		$instance['flickr_l'] = ( ! empty( $new_instance['flickr_l'] ) ) ? sanitize_text_field( $new_instance['flickr_l'] ) : '';
		$instance['lastfm_l'] = ( ! empty( $new_instance['lastfm_l'] ) ) ? sanitize_text_field( $new_instance['lastfm_l'] ) : '';
		$instance['linkin_l'] = ( ! empty( $new_instance['linkin_l'] ) ) ? sanitize_text_field( $new_instance['linkin_l'] ) : '';
		$instance['ytube_l'] = ( ! empty( $new_instance['ytube_l'] ) ) ? sanitize_text_field( $new_instance['ytube_l'] ) : '';
		$instance['vimeo_l'] = ( ! empty( $new_instance['vimeo_l'] ) ) ? sanitize_text_field( $new_instance['vimeo_l'] ) : '';
		$instance['digg_l'] = ( ! empty( $new_instance['digg_l'] ) ) ? sanitize_text_field( $new_instance['digg_l'] ) : '';
		$instance['stumb_l'] = ( ! empty( $new_instance['stumb_l'] ) ) ? sanitize_text_field( $new_instance['stumb_l'] ) : '';
		$instance['devia_l'] = ( ! empty( $new_instance['devia_l'] ) ) ? sanitize_text_field( $new_instance['devia_l'] ) : '';
		$instance['delic_l'] = ( ! empty( $new_instance['delic_l'] ) ) ? sanitize_text_field( $new_instance['delic_l'] ) : '';
		$instance['fsq_l'] = ( ! empty( $new_instance['fsq_l'] ) ) ? sanitize_text_field( $new_instance['fsq_l'] ) : '';
		return $new_instance;
	}
 
	function form($instance) {
		$defaults	= array(
			'title' => 'Socialize',
			'fbook_l' => '',
			'tweet_l' => '',
			'feed_l' => '',
			'instagram_l' => '',
			'plus1_l' => '',
			'flickr_l' => '',
			'lastfm_l' => '',
			'linkin_l' => '',
			'ytube_l' => '',
			'vimeo_l' => '',
			'digg_l' => '',
			'stumb_l' => '',
			'devia_l' => '',
			'delic_l' => '',
			'fsq_l' => ''
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); 
	?>

	<p><?php _e('To disable a social icon, leave the link field empty below','distinctive_themes-widget-pack'); ?></p>
	
	<p>
		<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title','distinctive_themes-widget-pack'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($instance['title']); ?>" />
	</p>
	
	<p>
		<label for="<?php echo $this->get_field_id('fbook_l'); ?>"><?php _e('Link to Facebook account','distinctive_themes-widget-pack'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('fbook_l'); ?>" name="<?php echo $this->get_field_name('fbook_l'); ?>" type="text" value="<?php echo esc_attr($instance['fbook_l']); ?>" />
	</p>

	<p>
		<label for="<?php echo $this->get_field_id('tweet_l'); ?>"><?php _e('Link to Twitter account','distinctive_themes-widget-pack'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('tweet_l'); ?>" name="<?php echo $this->get_field_name('tweet_l'); ?>" type="text" value="<?php echo esc_attr($instance['tweet_l']); ?>" />
	</p>

	<p>
		<label for="<?php echo $this->get_field_id('feed_l'); ?>"><?php _e('RSS Feed Link','distinctive_themes-widget-pack'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('feed_l'); ?>" name="<?php echo $this->get_field_name('feed_l'); ?>" type="text" value="<?php echo esc_attr($instance['feed_l']); ?>" />
	</p>
				
	<p>
		<label for="<?php echo $this->get_field_id('instagram_l'); ?>"><?php _e('Link to Instagram account','distinctive_themes-widget-pack'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('instagram_l'); ?>" name="<?php echo $this->get_field_name('instagram_l'); ?>" type="text" value="<?php echo esc_attr($instance['instagram_l']); ?>" />
	</p>
	
	<p>
		<label for="<?php echo $this->get_field_id('plus1_l'); ?>"><?php _e('Link to Google +1 account','distinctive_themes-widget-pack'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('plus1_l'); ?>" name="<?php echo $this->get_field_name('plus1_l'); ?>" type="text" value="<?php echo esc_attr($instance['plus1_l']); ?>" />
	</p>
	
	<p>
		<label for="<?php echo $this->get_field_id('flickr_l'); ?>"><?php _e('Link to Flickr account','distinctive_themes-widget-pack'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('flickr_l'); ?>" name="<?php echo $this->get_field_name('flickr_l'); ?>" type="text" value="<?php echo esc_attr($instance['flickr_l']); ?>" />
	</p>
		
	<p>
		<label for="<?php echo $this->get_field_id('lastfm_l'); ?>"><?php _e('Link to Last.Fm account','distinctive_themes-widget-pack'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('lastfm_l'); ?>" name="<?php echo $this->get_field_name('lastfm_l'); ?>" type="text" value="<?php echo esc_attr($instance['lastfm_l']); ?>" />
	</p>	
		
	<p>
		<label for="<?php echo $this->get_field_id('linkin_l'); ?>"><?php _e('Link to LinkedIn account','distinctive_themes-widget-pack'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('linkin_l'); ?>" name="<?php echo $this->get_field_name('linkin_l'); ?>" type="text" value="<?php echo esc_attr($instance['linkin_l']); ?>" />
	</p>
	
	<p>
		<label for="<?php echo $this->get_field_id('ytube_l'); ?>"><?php _e('Link to Youtube account','distinctive_themes-widget-pack'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('ytube_l'); ?>" name="<?php echo $this->get_field_name('ytube_l'); ?>" type="text" value="<?php echo esc_attr($instance['ytube_l']); ?>" />
	</p>
	
	<p>
		<label for="<?php echo $this->get_field_id('vimeo_l'); ?>"><?php _e('Link to Vimeo account','distinctive_themes-widget-pack'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('vimeo_l'); ?>" name="<?php echo $this->get_field_name('vimeo_l'); ?>" type="text" value="<?php echo esc_attr($instance['vimeo_l']); ?>" />
	</p>
	
	<p>
		<label for="<?php echo $this->get_field_id('digg_l'); ?>"><?php _e('Link to Digg account','distinctive_themes-widget-pack'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('digg_l'); ?>" name="<?php echo $this->get_field_name('digg_l'); ?>" type="text" value="<?php echo esc_attr($instance['digg_l']); ?>" />
	</p>
	
	<p>
		<label for="<?php echo $this->get_field_id('stumb_l'); ?>"><?php _e('Link to Stumble Upon account','distinctive_themes-widget-pack'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('stumb_l'); ?>" name="<?php echo $this->get_field_name('stumb_l'); ?>" type="text" value="<?php echo esc_attr($instance['stumb_l']); ?>" />
	</p>
	
	<p>
		<label for="<?php echo $this->get_field_id('devia_l'); ?>"><?php _e('Link to Deviantart account','distinctive_themes-widget-pack'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('devia_l'); ?>" name="<?php echo $this->get_field_name('devia_l'); ?>" type="text" value="<?php echo esc_attr($instance['devia_l']); ?>" />
	</p>
	
	<p>
		<label for="<?php echo $this->get_field_id('delic_l'); ?>"><?php _e('Link to Delicious account','distinctive_themes-widget-pack'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('delic_l'); ?>" name="<?php echo $this->get_field_name('delic_l'); ?>" type="text" value="<?php echo esc_attr($instance['delic_l']); ?>" />
	</p>
	
	<p>
		<label for="<?php echo $this->get_field_id('fsq_l'); ?>"><?php _e('Link to FourSquare account','distinctive_themes-widget-pack'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('fsq_l'); ?>" name="<?php echo $this->get_field_name('fsq_l'); ?>" type="text" value="<?php echo esc_attr($instance['fsq_l']); ?>" />
	</p>
	
<?php
	}
}

function register_dt_social() {
	register_widget('dt_social');
}

add_action('widgets_init', 'register_dt_social');