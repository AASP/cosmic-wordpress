<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="page" class="hfeed site">
		<header id="masthead" class="site-header" role="banner">
			<a class="home-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
			<!--	<h1 class="site-title"><?php // bloginfo( 'name' ); ?></h1>
			-->

<!--~~~~~~~~~~~~~~~~~~AASP~~~~~~~~~~~~~~~~~~~-->

<div id="aasp-header" class="aasp-container" style="clear:both; padding:12px 0;" >
	<div id="aasp-logo" style="width:200px; float:left;">
	
	</div>
        <div id="aasp-anthem" class="aasp-right" style=" float:right;width:350px;margin-right:-330px; " >
                <?php vmarquee( $setting="1", $group="GROUP1" ); ?>
        </div>
	<div id="aasp-slider" class="aasp-center" style="display:inline-block; width:400px; " >
		<?php
		if(function_exists('fhs_display_front'))
		{
		echo fhs_display_front();
		}	
		?>
	</div>
</div>


<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->


 <!-- <div class="headerslider"> <?php// echo do_shortcode('[sp_responsiveslider limit="-1"]'); ?></div>
-->

				<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
			</a>
<!--
<div id="short_code_si_icon" style="text-align:right;background: #38414D;height:45px;"><a href="http://www.twitter.com/fb.com" target="_blank" title="Visit Us On Twitter"><img src="http://192.168.0.102/wordpress/wp-content/plugins/floating-social-media-icon/images/themes/1/twitter.png" style="border:0px;width:50px;" alt="Visit Us On Twitter"></a><a href="fb.com" target="_blank" title="Visit Us On Facebook"><img src="http://192.168.0.102/wordpress/wp-content/plugins/floating-social-media-icon/images/themes/1/facebook.png" style="border:0px;width:50px;" alt="Visit Us On Facebook"></a><a href="fb.com" target="_blank" title="Visit Us On Google Plus"><img src="http://192.168.0.102/wordpress/wp-content/plugins/floating-social-media-icon/images/themes/1/googleplus.png" style="border:0px;width:50px;" alt="Visit Us On Google Plus"></a><a href="fb.com" target="_blank" title="Visit Us On Pinterest"><img src="http://192.168.0.102/wordpress/wp-content/plugins/floating-social-media-icon/images/themes/1/pinterest.png" style="border:0px;width:50px;" alt="Visit Us On Pinterest"></a><a href="fb.com" target="_blank" title="Visit Us On Youtube"><img src="http://192.168.0.102/wordpress/wp-content/plugins/floating-social-media-icon/images/themes/1/youtube.png" style="border:0px;width:50px;" alt="Visit Us On Youtube"></a><a href="fb.com" target="_blank" title="Visit Us On Linkedin"><img src="http://192.168.0.102/wordpress/wp-content/plugins/floating-social-media-icon/images/themes/1/linkedin.png" style="border:0px;width:50px;" alt="Visit Us On Linkedin"></a><a href="fb.com" target="_blank" title="Check Our Feed"><img src="http://192.168.0.102/wordpress/wp-content/plugins/floating-social-media-icon/images/themes/1/feed.png" style="border:0px;width:50px;" alt="Check Our Feed"></a></div>
-->

			<div id="navbar" class="navbar">
				<nav id="site-navigation" class="navigation main-navigation" role="navigation">
					<button class="menu-toggle"><?php _e( 'Menu', 'twentythirteen' ); ?></button>
					<a class="screen-reader-text skip-link" href="#content" title="<?php esc_attr_e( 'Skip to content', 'twentythirteen' ); ?>"><?php _e( 'Skip to content', 'twentythirteen' ); ?></a>
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
					<?php get_search_form(); ?>
				</nav><!-- #site-navigation -->
			</div><!-- #navbar -->
		</header><!-- #masthead -->

		<div id="main" class="site-main">

