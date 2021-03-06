<?php
/**
 * @package   Yendif Player
 * @author    Yendif Technologies Pvt Ltd. (email : admin@yendifplayer.com)
 * @license   GPL-2.0+
 * @link      http://yendifplayer.com/
 * @copyright 2014 Yendif Technologies Pvt Ltd.
 */
 
$page = $_GET['page'];
$action = '?page=' . $page . '&action=add';
$hidden = '<input type="hidden" name="page" value="' . $page . '" />';

?>

<div class="wrap yendif-player <?php echo $page; ?>">
  <?php $this->prepare_items(); ?>
  <div class="yendif-player-left">
  	<a href="<?php echo $action; ?>" class="button-primary"><?php _e( 'Add New Media', YENDIF_PLAYER_PLUGIN_SLUG ); ?></a>
  </div>
  <form method="post" class="<?php echo $page; ?>-form-search" id="<?php echo $page; ?>-form-search">
    <?php echo $hidden; ?>
    <?php $this->search_box( __( 'Search by Title', YENDIF_PLAYER_PLUGIN_SLUG ), 'yendif_player_search' ); ?>
  </form>
  <div class="yendif-player-clear"></div>
  <form method="get" class="<?php echo $page; ?>-form-filter" id="<?php echo $page; ?>-form-filter">
    <?php echo $hidden; ?>
    <?php $this->display();	?>
  </form>
</div>