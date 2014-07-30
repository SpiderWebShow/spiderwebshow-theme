<!doctype html>
<html lang="en-CA">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<!-- DNS Prefetching -->
	<link rel="dns-prefetch" href="//yui.yahooapis.com">
	<link rel="dns-prefetch" href="//cdnjs.cloudflare.com">
	<link rel="dns-prefetch" href="//ajax.googleapis.com">	
	<link rel="dns-prefetch" href="//fonts.googleapis.com">	
	<link rel="dns-prefetch" href="//api.tiles.mapbox.com">
	<link rel="dns-prefetch" href="//use.typekit.net">
	
	<!-- Title -->
	<title><?php bloginfo('name'); wp_title(' / '); ?></title>
	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
	
	<!-- CSS -->
	<link href="<?php bloginfo('template_url'); ?>/css/screen.css" media="screen, projection" rel="stylesheet" />
	
	<!-- Cloud.Typography -->
	<link rel="stylesheet" type="text/css" href="//cloud.typography.com/7533252/654022/css/fonts.css" />
	
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

	<div class="nav" role="banner">
		<figure id="nav_logo">
			
		</figure>
		<a href="/" title="Home"><h1 class="nav_title" style="overflow:hidden;"><span style="float:left;">Spider</span><span style="float:left;">Web</span><span style="float:left;">Show</span></h1></a>

		<nav class="nav_menu" role="navigation">
			<ul>
				<li><a href="/">Home</a></li>
				<li><a href="/cdncult">#CdnCult Times</a></li>
				<li><a href="/commissions">Commissions</a></li>
				<li><a href="/experiments">Experiments</a></li>
				<li><a href="/talkshow">TalkShow</a></li>
				<li><a href="/makers">Makers</a></li>
				<li><a href="/participate">Participate</a></li>
			</ul>
		</nav>
		<a href="#" class="nav_toggle nav_toggle-hidden">Menu</a>
	</div>
	
	<div class="main <?php if(is_home()){ echo "homepage"; }?>" role="main"> <!-- Main Content Begins -->
	