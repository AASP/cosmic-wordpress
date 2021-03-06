<?php
/**
 * @package   Yendif Player
 * @author    Yendif Technologies Pvt Ltd. (email : admin@yendifplayer.com)
 * @license   GPL-2.0+
 * @link      http://yendifplayer.com/
 * @copyright 2014 Yendif Technologies Pvt Ltd.
 */ 
 
class Yendif_Videos {

	/**
	 * Holds the page perma structure
	 *
	 * @since    1.2.0
	 *
	 * @var      string
	 */
	private $page_perma_structure;
  
	/**
	 * Outputs the content of the widget
	 *
	 * @since     1.2.0
	 *
	 * @return      string		Text or HTML that holds the gallery
	 */
	public function build_gallery( $attributes ) {
  
		global $wpdb, $wp_rewrite;
					
		$this->page_perma_structure = $wp_rewrite->get_page_permastruct();
		
		$table = $wpdb->prefix . 'yendif_player_media';		
		
		$sql  = "SELECT * FROM $table WHERE published=1 AND type!='audio'";	
		
		if( $attributes['playlist'] > 0 ) {
			$sql .=  " AND playlists LIKE '% " . $attributes['playlist'] . " %'";
		}
		
		switch( $attributes['sort'] ) {
		 	case 'latest'     : $sql .= ' ORDER BY id DESC'; break;
			case 'popular'    :	$sql .= ' ORDER BY views DESC'; break;
			case 'date_added' : $sql .= ' ORDER BY id ASC'; break;			
			case 'a_z'        : $sql .= ' ORDER BY title ASC'; break;
			case 'z_a'        : $sql .= ' ORDER BY title DESC'; break;
			case 'random'     : $sql .= ' ORDER BY RAND()'; break;
		};
		
		$limit = (int) $attributes['limit'] + 1;
		$sql .=  " LIMIT " . $limit;
		
		$items = $wpdb->get_results( $sql );		
		$count = count($items);
		if ( $count == $limit ) {
			$count = ($limit - 1);
		} else {
			$attributes['more'] = 0;
		};
		
		$html = '<div class="yendif-video-gallery yendif-widget">';
		$html .= '<div class="yendif-gallery">';
  	  	for ( $i = 0; $i < $count; $i++ ) {
			$item = $items[$i];
			
    		$target = $this->get_video_permalink( $item );
			if ( ! $item->poster ) {
				$item->poster = YENDIF_PLAYER_PLUGIN_URL . '/public/assets/images/placeholder.jpg';
			}
			
    		$html .= '<a class="yendif-item" style="width:100%;" href="' . $target . '">';
  	  		$html .= '<span class="yendif-item-wrapper">';
        	$html .= '<span class="yendif-thumb yendif-left" style="width:' . $attributes['thumb_width'] . 'px; height:' . $attributes['thumb_height'] . 'px;">';   	  
    	  	$html .= '<img class="yendif-thumb-clip" src="' . $item->poster . '"  alt="' . $item->title . '" title="' . $item->title . '" />';
          	$html .= '<img class="yendif-thumb-overlay" src="' . YENDIF_PLAYER_PLUGIN_URL . '/public/assets/images/play.png" alt="' . $item->title . '" />';
          	if( ! empty($item->duration) ) {
          		$html .= '<span class="yendif-duration">' . $item->duration . '</span>';
			};
    		$html .= '</span>';
			$html .= '<span class="yendif-item-info">';
    		$html .= '<span class="yendif-title">' . Yendif_Player_Functions::Truncate( $item->title, $attributes['title_chars_limit'] ) . '</span>';			
			if ( $attributes['show_views'] ) {
				$html .= '<span class="yendif-views">' . $item->views . ' ' . __('views', YENDIF_PLAYER_PLUGIN_SLUG) . '</span>';
			}
			if ( $attributes['show_desc'] ) {
				$html .= '<span class="yendif-description">' . Yendif_Player_Functions::Truncate( $item->description, $attributes['desc_chars_limit'] ) . '</span>';
			}
			$html .= '</span>';
			$html .= '<span class="yendif-clear-always"></span>';
			$html .= '</span>';
   			$html .= '</a>';
    	};
    	$html .= '</div>';
		if( $attributes['more'] ) {
    		$html .= '<div class="yendif-more">';			
			$html .= '<a href="' . $this->get_more_permalink( $attributes['playlist'] ) . '">' . __('More Videos &#187;', YENDIF_PLAYER_PLUGIN_SLUG) . '</a>';	
			$html .= '</div>';
		};
		$html .= '</div>';
		
		return $html;
					 
  	}  
 
  	/**
	 * Build video permalink
	 *
	 * @since     1.2.0
	 *
	 * @return      string		Video Page URL
	 */
	private function get_video_permalink( $video ) {
	
		return get_permalink( $video->post_id );
		
	}
	
	/**
	 * Build more permalink
	 *
	 * @since     1.2.0
	 *
	 * @return      string		Page URL to load other playlist videos related to this wiget configuration
	 */
	private function get_more_permalink( $playlist_id ) {
		
		global $wpdb;
		
		if ( $playlist_id > 0 ) {
			$post_id = $wpdb->get_var( "select post_id from ". $wpdb->prefix . "yendif_player_playlists WHERE id=" . $playlist_id );			
		} else {
			$post_id = $wpdb->get_var( "select ID from " . $wpdb->prefix . "posts WHERE post_type='videoplaylist' AND post_content LIKE '%[yendifgallery sort=latest]%' LIMIT 1" );
		};
		
		return get_permalink( $post_id );
		
	}
  
} 