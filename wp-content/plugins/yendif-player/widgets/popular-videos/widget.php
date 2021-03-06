<?php  	
/**
 * @package   Yendif Player
 * @author    Yendif Technologies Pvt Ltd. (email : admin@yendifplayer.com)
 * @license   GPL-2.0+
 * @link      http://yendifplayer.com/
 * @copyright 2014 Yendif Technologies Pvt Ltd.
 */  
 
require_once('popular-videos.php' );

class Yendif_Popular_Videos_Widget extends WP_Widget {	
	
	/**
	 * Sets up the widgets name etc
	 *
	 * @since    1.2.0
	 */
	public function __construct() {
		parent::__construct(
			'yendif-popular-videos',
			__('Yendif Popular Videos', YENDIF_PLAYER_PLUGIN_SLUG),
			array( 'description' => __('Use this widget to show Most Viewed Yendif Videos in your website\'s sidebar.', YENDIF_PLAYER_PLUGIN_SLUG) )
		);
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @since    1.2.0
	 */
	public function widget( $args, $instance ) {
		extract( $args );

		$title = apply_filters('widget_title', $instance['title'] );

		echo $before_widget;

		if ( $title ) echo $before_title . $title . $after_title;
	
		$videos = new Yendif_Popular_Videos();	
    	echo $videos->build_gallery( $instance );

		echo $after_widget;
	}

	/**
	 * Processing widget options on save
	 *
	 * @since    1.2.0
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		$instance['title']             = strip_tags( $new_instance['title'] );
		$instance['thumb_width']       = $new_instance['thumb_width']; 
		$instance['thumb_height']      = $new_instance['thumb_height'];
		$instance['limit']             = $new_instance['limit'];
		$instance['title_chars_limit'] = $new_instance['title_chars_limit'];
		$instance['desc_chars_limit']  = $new_instance['desc_chars_limit'];
		$instance['show_desc']         = (isset( $new_instance['show_desc'] ) ? 1 : 0 );   
		$instance['show_views']        = (isset( $new_instance['show_views'] ) ? 1 : 0 );   	
		$instance['more']              = (isset( $new_instance['more'] ) ? 1 : 0 );   
	
		return $instance;
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @since    1.2.0
	 */
	public function form( $instance ) {
		$defaults = array( 
			'title'             =>  __('Popular Videos', YENDIF_PLAYER_PLUGIN_SLUG),
			'thumb_width'       => 145,
			'thumb_height'      => 80,
			'limit'        	    => 5,
			'title_chars_limit' => 75,
			'desc_chars_limit'  => 150,
			'show_desc'         => 1,
			'show_views'        => 1,		 
			'more'              => 1	
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); 	
	?>

	<p>
  	  <label for="<?php echo $this->get_field_id( 'title' ); ?>">
	    <?php _e('Title :', YENDIF_PLAYER_PLUGIN_SLUG); ?>
  	    <input type="text"
      		   class="widefat"
      		   id="<?php echo $this->get_field_id( 'title' ); ?>"
               name="<?php echo $this->get_field_name( 'title' ); ?>"
               value="<?php echo $instance['title']; ?>" />
      </label>
	</p>
    
	<p>
      <label for="<?php echo $this->get_field_id( 'thumb_width' ); ?>">
	    <?php _e('Thumbnail width :', YENDIF_PLAYER_PLUGIN_SLUG); ?>
  	    <input type="text"
      		   class="widefat"
      		   id="<?php echo $this->get_field_id('thumb_width'); ?>"
               name="<?php echo $this->get_field_name('thumb_width'); ?>"
               value="<?php echo $instance['thumb_width']; ?>" />
      </label>
	</p>

	<p>
  	  <label for="<?php echo $this->get_field_id( 'thumb_height' ); ?>">
	    <?php _e('Thumbnail height :', YENDIF_PLAYER_PLUGIN_SLUG); ?>
  	    <input type="text"
      		   class="widefat"
      		   id="<?php echo $this->get_field_id('thumb_height'); ?>"
               name="<?php echo $this->get_field_name('thumb_height'); ?>"
               value="<?php echo $instance['thumb_height']; ?>" />
      </label>
	</p>
    
	<p>
  	  <label for="<?php echo $this->get_field_id( 'limit' ); ?>">
	    <?php _e('No. of videos to show :', YENDIF_PLAYER_PLUGIN_SLUG); ?>
  	    <input type="text"
      		   class="widefat"
      		   id="<?php echo $this->get_field_id('limit'); ?>"
               name="<?php echo $this->get_field_name('limit'); ?>"
               value="<?php echo $instance['limit']; ?>" />
      </label>
	</p>
    
    <p>
  	  <label for="<?php echo $this->get_field_id( 'title_chars_limit' ); ?>">
	    <?php _e('Title characters limit :', YENDIF_PLAYER_PLUGIN_SLUG); ?>
  	    <input type="text"
      		   class="widefat"
      		   id="<?php echo $this->get_field_id('title_chars_limit'); ?>"
               name="<?php echo $this->get_field_name('title_chars_limit'); ?>"
               value="<?php echo $instance['title_chars_limit']; ?>" />
      </label>
	</p>
    
    <p>
  	  <label for="<?php echo $this->get_field_id( 'desc_chars_limit' ); ?>">
	    <?php _e('Description characters limit :', YENDIF_PLAYER_PLUGIN_SLUG); ?>
  	    <input type="text"
      		   class="widefat"
      		   id="<?php echo $this->get_field_id('desc_chars_limit'); ?>"
               name="<?php echo $this->get_field_name('desc_chars_limit'); ?>"
               value="<?php echo $instance['desc_chars_limit']; ?>" />
      </label>
	</p>	

	<p>  	  
  	  <label for="<?php echo $this->get_field_id( 'show_desc' ); ?>">
        <input type="checkbox"
      		 class="checkbox" <?php checked( $instance['show_desc'], true ); ?>
             id="<?php echo $this->get_field_id('show_desc'); ?>"
             name="<?php echo $this->get_field_name('show_desc'); ?>" />
	    <?php _e('Show description', YENDIF_PLAYER_PLUGIN_SLUG); ?>
      </label>
	</p>
    
    <p>  	  
  	  <label for="<?php echo $this->get_field_id( 'show_views' ); ?>">
        <input type="checkbox"
      		 class="checkbox" <?php checked( $instance['show_views'], true ); ?>
             id="<?php echo $this->get_field_id('show_views'); ?>"
             name="<?php echo $this->get_field_name('show_views'); ?>" />
	    <?php _e('Show views', YENDIF_PLAYER_PLUGIN_SLUG); ?>
      </label>
	</p>
    
    <p>  	  
  	  <label for="<?php echo $this->get_field_id( 'more' ); ?>">
        <input type="checkbox"
      		 class="checkbox" <?php checked( $instance['more'], true ); ?>
             id="<?php echo $this->get_field_id('more'); ?>"
             name="<?php echo $this->get_field_name('more'); ?>" />
	    <?php _e('Show more button', YENDIF_PLAYER_PLUGIN_SLUG); ?>
      </label>
	</p>
<?php
	} 
}