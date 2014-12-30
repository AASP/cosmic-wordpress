<?php
/**
 * @package   Yendif Player
 * @author    Yendif Technologies Pvt Ltd. (email : admin@yendifplayer.com)
 * @license   GPL-2.0+
 * @link      http://yendifplayer.com/
 * @copyright 2014 Yendif Technologies Pvt Ltd.
 */

class Yendif_Player_Controller {
	
	/**
	 * Global configuration data of the player.
	 *
	 * @since    1.0.0
	 *
	 * @var      array
	 */
	private $config = null;
	
	/**
	 * Number of players used in current page.
	 *
	 * @since    1.0.0
	 *
	 * @var      int
	 */
	private $players = 0;

	/**
	 * Instance of this class.
	 *
	 * @since    1.0.0
	 *
	 * @var      object
	 */
	protected static $instance = null;

	/**
	 * Initialize the plugin by setting localization and loading public scripts
	 * and styles.
	 *
	 * @since     1.0.0
	 */
	private function __construct() {
		
		// Load global configuration data of the plugin
		$this->config = $this->load_config();
		
		// Load "yendifplayer" or "yendifgallery" when appropriate shortcode is found.
		add_shortcode( 'yendifplayer', array( $this, 'load_yendif_player' ) );
		add_shortcode( 'yendifgallery', array( $this, 'load_yendif_gallery' ) );
		
		// Load plugin text domain
		add_action( 'init', array( $this, 'load_plugin_textdomain' ) );
		
		// Load public-facing style sheet and JavaScript.
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_styles' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );		

	}	

	/**
	 * Return an instance of this class.
	 *
	 * @since     1.0.0
	 *
	 * @return    object    A single instance of this class.
	 */
	public static function get_instance() {

		// If the single instance hasn't been set, set it now.
		if ( null == self::$instance ) {
			self::$instance = new self;
		}

		return self::$instance;
		
	}

	/**
	 * Load global configuration data of the player.
	 *
	 * @since	1.0.0
	 *
	 * @return		array		An associative array containing global configuration data
	 */
	public function load_config() {
		
		global $wpdb;
		
		$table = $wpdb->prefix . 'yendif_player_settings';
		$sql = "SELECT * FROM $table WHERE id = %d";		
		$config = $wpdb->get_row( $wpdb->prepare( $sql, 1 ), ARRAY_A );
		
		return $config;
		
	}
	
	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		$domain = YENDIF_PLAYER_PLUGIN_SLUG;
		$locale = apply_filters( 'plugin_locale', get_locale(), $domain );

		load_textdomain( $domain, trailingslashit( WP_LANG_DIR ) . $domain . '/' . $domain . '-' . $locale . '.mo' );
		load_plugin_textdomain( $domain, FALSE, YENDIF_PLAYER_PLUGIN_NAME . '/languages/' );

	}
	
	/**
	 * Check the current post for the existence of a short code.
	 *
	 * @since    1.2.0
	 *
	 * @return		boolean		return "true" if shortcode found, else return "false"
	 */
	public function has_shortcode( $shortcode = '' ) {
	
		$post_to_check = get_post(get_the_ID());
     
    	// False because we have to search through the post content first
    	$found = false;
     
    	// If no short code was provided, return false
    	if ( ! $shortcode ) {
        	return $found;
    	}
		
    	// Check the post content for the short code
    	if ( stripos($post_to_check->post_content, '[' . $shortcode) !== false ) {
        	// We have found the short code
        	$found = true;
    	}
     
    	// Return our final results
    	return $found;
		
	}
	
	/**
	 * Register and enqueue public-facing style sheet.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {
		
		$domain = YENDIF_PLAYER_PLUGIN_SLUG;
		
		if( $this->has_shortcode('yendifplayer') ) {
			wp_enqueue_style( $domain . '-plugin-player-styles', YENDIF_PLAYER_PLUGIN_URL . '/public/assets/libraries/yendifplayer.css', array(), YENDIF_PLAYER_VERSION_NUM );
		}
		wp_enqueue_style( $domain . '-plugin-dashicon-styles', get_stylesheet_uri(), array( 'dashicons' ), YENDIF_PLAYER_VERSION_NUM );
		wp_enqueue_style( $domain . '-plugin-gallery-styles', YENDIF_PLAYER_PLUGIN_URL . '/public/assets/css/gallery.css', array(), YENDIF_PLAYER_VERSION_NUM );
		
	}

	/**
	 * Register and enqueues public-facing JavaScript files.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {
	
		$domain = YENDIF_PLAYER_PLUGIN_SLUG;
		
		if( $this->has_shortcode('yendifplayer') ) {
			wp_enqueue_script( $domain . '-plugin-script', YENDIF_PLAYER_PLUGIN_URL . '/public/assets/libraries/yendifplayer.js', array('jquery'), YENDIF_PLAYER_VERSION_NUM );		
			wp_enqueue_script( $domain . '-plugin-dyn-script', YENDIF_PLAYER_PLUGIN_URL . '/public/assets/js/config.js', array('jquery'), YENDIF_PLAYER_VERSION_NUM );
		
			$config = $this->config;
			$config['playlistWidth'] = $config['playlist_width'];
			$config['playlistHeight'] = $config['playlist_height'];
			$config['playlistPosition'] = $config['playlist_position'];
			$config['volume'] = $config['volume'] / 100;
			$config['swf'] = YENDIF_PLAYER_PLUGIN_URL .  '/public/assets/libraries/player.swf';
			unset( $config['id'], $config['width'], $config['height'], $config['playlist_width'], $config['playlist_height'],  $config['playlist_position'] );
			wp_localize_script( $domain . '-plugin-dyn-script', 'yendifplayer_config', $config );
		}
		
	}
	
	/**
	 * Outputs the short code for this object.
	 *
	 * @since    1.0.0
	 * 
	 * @return      string		Text or HTML that holds the player
	 */
	public function load_yendif_player( $attributes ) {
		
		++$this->players;
		
		// Initialize the model		
		include_once( YENDIF_PLAYER_PLUGIN_DIR . 'public/models/player.php' );		
		$model = new Yendif_Player_Player_Model();
		
		// Initialize the view		
		include_once( YENDIF_PLAYER_PLUGIN_DIR . 'public/views/player/view.html.php' );		
		$view = new Yendif_Player_Player_View( $model );
		$attributes = (array) $attributes;
		if( ! count($attributes) ) $attributes['sort'] = 'latest';
		$player = $view->load_player( $attributes, $this->config, $this->players );
		
		return $player;
				
	}
	
	/**
	 * Outputs the short code for this object.
	 *
	 * @since    1.0.0
	 * 
	 * @return      string		Text or HTML that holds the gallery
	 */
	public function load_yendif_gallery( $attributes ) {
		
		// Initialize the model		
		include_once( YENDIF_PLAYER_PLUGIN_DIR . 'public/models/gallery.php' );		
		$model = new Yendif_Player_Gallery_Model();
		
		// Initialize the view		
		include_once( YENDIF_PLAYER_PLUGIN_DIR . 'public/views/gallery/view.html.php' );		
		$view = new Yendif_Player_Gallery_View( $model );
		$gallery = $view->load_gallery( (array) $attributes, $this->config );
		
		return $gallery;
				
	}

}