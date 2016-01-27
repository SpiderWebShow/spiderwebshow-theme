<!doctype html>
<html lang="en-CA">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<!-- DNS Prefetching -->
	<link rel="dns-prefetch" href="//yui.yahooapis.com">
	<link rel="dns-prefetch" href="//cdnjs.cloudflare.com">
	<link rel="dns-prefetch" href="//ajax.googleapis.com">	
	<link rel="dns-prefetch" href="//api.tiles.mapbox.com">
	
	<!-- Title -->
	<title><?php bloginfo('name'); wp_title(' / '); ?></title>
	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
	
	<!-- CSS -->
	<link href="<?php bloginfo('template_url'); ?>/css/screen.css" media="screen, projection" rel="stylesheet" />
	
	<!-- FontAwesome for sharing font stuff -->
	<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css" rel="stylesheet">
	
	<!-- Mapbox CSS -->
	<link href='//api.tiles.mapbox.com/mapbox.js/v1.3.1/mapbox.css' rel='stylesheet' />
	<!--[if lte IE 8]>
    <link href='//api.tiles.mapbox.com/mapbox.js/v1.3.1/mapbox.ie.css' rel='stylesheet' >
  <![endif]-->
	
	<!-- Javascript -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/headjs/1.0.3/head.min.js"></script>
	
</head>
<body <?php body_class(); ?>>

  <a href="#main" class="skiplink" title="Skip to main content">Skip to main content</a>

	<div class="nav" role="banner">

		<a href="<?php bloginfo('url'); ?>" title="Home">
		  <img class="nav-logo" src="<?php bloginfo('template_url'); ?>/img/sws-logo-optimized.svg" alt="SpiderWebShow logo" />
		  <h1 class="nav-title"><span>Spider</span><span>Web</span><span>Show</span></h1>
	  	  <small class="nav-established">Est. 2013</small>
	  </a>

		<!-- Load in the primary menu -->
		<?php wp_nav_menu( array( 'theme_location' => 'primary-menu', 'container' => 'nav', 'menu_class' => 'nav_menu' ) ); ?>
		
		<!-- Toggle the hidden menu -->
		<a href="#" class="nav_toggle nav_toggle-hidden">Menu</a>
	</div>
	
	<div id="main" class="main <?php if(is_home()){ echo "homepage"; }?>" role="main"> <!-- Main Content Begins -->
	