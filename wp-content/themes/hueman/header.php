<!DOCTYPE html> 
<html class="no-js" <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title><?php wp_title(''); ?></title>

	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
	
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="wrapper">

	<header id="header">
	
		<?php if (has_nav_menu('topbar')): ?>
			<nav class="nav-container group" id="nav-topbar">
				<div class="nav-toggle"><i class="fa fa-bars"></i></div>
				<div class="nav-text"><!-- put your mobile menu text here --></div>
				<div class="nav-wrap container">
					<div style="display:inline-block">
<!--
<h1 style="font-size: 25px; color: white; font-style: oblique;">COSMIC WAY OF LIVING</h1>	
-->						<?php // echo alx_site_title(); ?>
					</div>
					
					<div style="display:inline-block">
					<?php wp_nav_menu(array('theme_location'=>'topbar','menu_class'=>'nav container-inner group','container'=>'','menu_id' => '','fallback_cb'=> false)); ?>
					</div>
					
				</div>

				<div class="container">
					<div class="container-inner">		
						<div class="toggle-search"><i class="fa fa-search"></i></div>
						<div class="search-expand">
							<div class="search-expand-inner">
								<?php get_search_form(); ?>
							</div>
						</div>
					</div><!--/.container-inner-->
				</div><!--/.container-->
				
			</nav><!--/#nav-topbar-->
		<?php endif; ?>
		
		<div class="container group">
			<div class="container-inner">
			
				<div class="group pad">
				


      				<!--	<div class="logo" style="width: 20%;">	
					<?php //lm_display_logo(); ?>
				-->	
					<?php echo alx_site_title(); ?>
					<?php if ( ot_get_option('site-description') != 'off' ): ?><p class="site-description"><?php bloginfo( 'description' ); ?></p><?php endif; ?>

		<!--		<h1 style="font-size: 200px; margin-top: 75px; color: white;">{</h1>

		-->		<h1 style="font-size: 50px; color: #8B0000;float: right; margin-top: 50px; margin-right: 700px; 
font-family: "Comic Sans MS", cursive, sans-serif ">Cosmic Way of Living </h1> 

				

<!--				<h3 style=" float:right; margin-right: 160px; margin-top: -40px; color: white;" >

				ਗਗਨ ਮੈ ਥਾਲੁ ਰਵਿ ਚੰਦੁ ਦੀਪਕ ਬਨੇ ਤਾਰਿਕਾ ਮੰਡਲ ਜਨਕ ਮੋਤੀ ॥

				ਧੂਪੁ ਮਲਆਨਲੋ ਪਵਣੁ ਚਵਰੋ ਕਰੇ ਸਗਲ ਬਨਰਾਇ ਫੂਲੰਤ ਜੋਤੀ ॥੧॥
<br>
				ਕੈਸੀ ਆਰਤੀ ਹੋਇ ਭਵ ਖੰਡਨਾ ਤੇਰੀ ਆਰਤੀ ॥

				ਅਨਹਤਾ ਸਬਦ ਵਾਜੰਤ ਭੇਰੀ ॥੧॥ ਰਹਾਉ ॥
<br>
				ਸਹਸ ਤਵ ਨੈਨ ਨਨ ਨੈਨ ਹੈ ਤੋਹਿ ਕਉ ਸਹਸ ਮੂਰਤਿ ਨਨਾ ਏਕ ਤੋਹੀ ॥

				ਸਹਸ ਪਦ ਬਿਮਲ ਨਨ ਏਕ ਪਦ ਗੰਧ ਬਿਨੁ ਸਹਸ ਤਵ ਗੰਧ ਇਵ ਚਲਤ ਮੋਹੀ ॥੨॥
<br>				
				ਸਭ ਮਹਿ ਜੋਤਿ ਜੋਤਿ ਹੈ ਸੋਇ ॥

				ਤਿਸ ਕੈ ਚਾਨਣਿ ਸਭ ਮਹਿ ਚਾਨਣੁ ਹੋਇ ॥

				ਗੁਰ ਸਾਖੀ ਜੋਤਿ ਪਰਗਟੁ ਹੋਇ ॥

				ਜੋ ਤਿਸੁ ਭਾਵੈ ਸੁ ਆਰਤੀ ਹੋਇ ॥੩॥
<br>
				ਹਰਿ ਚਰਣ ਕਮਲ ਮਕਰੰਦ ਲੋਭਿਤ ਮਨੋ ਅਨਦਿਨੋ ਮੋਹਿ ਆਹੀ ਪਿਆਸਾ ॥

				ਕ੍ਰਿਪਾ ਜਲੁ ਦੇਹਿ ਨਾਨਕ ਸਾਰਿੰਗ ਕਉ ਹੋਇ ਜਾ ਤੇ ਤੇਰੈ ਨਾਮਿ ਵਾਸਾ ॥੪॥੧॥੭॥੯॥
	

				</h3>				
-->

                 <!--               <img src="http://serv.devplace.in/~satinder/cosmic/wp-content/uploads/2015/01/drawing-banner222-compressed.jpg" alt="some_text">		       
		-->
	
				<!--	 <div id="aasp-anthem" class="aasp-right" style=" float:right; " >
			               <?php //echo wp_text_slider(); ?>
					<?php // vmarquee( $setting="1", $group="GROUP1" ); ?>
        				</div>
				-->







				</div>
				
				<?php if (has_nav_menu('header')): ?>
					<nav class="nav-container group" id="nav-header">
						<div class="nav-toggle"><i class="fa fa-bars"></i></div>
						<div class="nav-text"><!-- put your mobile menu text here --></div>
						<div class="nav-wrap container"><?php wp_nav_menu(array('theme_location'=>'header','menu_class'=>'nav container-inner group','container'=>'','menu_id' => '','fallback_cb'=> false)); ?></div>
					</nav><!--/#nav-header-->
				<?php endif; ?>
				
			</div><!--/.container-inner-->
		</div><!--/.container-->
		
	</header><!--/#header-->
	
	<div class="container" id="page">
		<div class="container-inner">
			<div class="main">
				<div class="main-inner group">
