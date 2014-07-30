<?php get_header(); ?>

<div class="main_content vertical_home pure-g-r">
	
	<div class="pure-u-2-3">
		<h1>Welcome to the SpiderWebShow</h1>
		<p>A theatrical space where Canada, the Internet and performance minds intersect.</p>
		<?php dynamic_sidebar( 'front-page' ); ?>
		<p><div style="float:left;"><a href="https://twitter.com/spiderwebshow" class="twitter-follow-button" data-show-count="false" data-lang="en">Follow @SpiderWebShow</a></div> &nbsp; <div class="fb-like" data-href="https://www.facebook.com/PraxNACspiderwebshow" data-width="" data-height="" data-colorscheme="light" data-layout="button_count" data-action="like" data-show-faces="false" data-send="false" style="margin-left: 1em; float:left;"></div></p>
	</div>
	

	<div id="autotune" class="pure-u-1-3 jillian-form">
		<h4 style="margin:1em 0 0;padding:0;"><span style="text-transform:uppercase;">Thought Residencies</span><br>Resident Thinker for June:</h4>
		<h2 style="margin:0;padding:0;"><a href="/residency">Susan Leblanc</a></h2>
		<p>Click to hear the latest from our resident thinker.</p>
		<a href="#" id="autotune_control_button" style="font-size:3em;color:#d09;text-decoration:none;"><i class="icon-ellipsis-horizontal"></i></a>
	</div>


	
	<?php
		// Custom posts loop for commissions
		$args = array( 'post_type' => 'commission', 'posts_per_page' => 1 );
		$loop = new WP_Query( $args );
		while ( $loop->have_posts() ) : $loop->the_post();
		$firstYoutubeUrl = types_render_field("youtube-url", array("raw"=>"true")); // get custom field for the youtube video -- REQUIRED
		if($firstYoutubeUrl){ // Isolate just the video ID from the Youtube URL
			$idPattern = "/\?v=([\w-]{11})/"; // Regex for the 11-character video id
			preg_match($idPattern, $firstYoutubeUrl, $firstVideoID);
			$firstVideoID = ($firstVideoID[1]);
		}
	?>
	<?php endwhile;	?>
	<div class="pure-u-1-2">
		<h2><a href="/cdncult">#CdnCult Times</a></h2>
		<a href="/cdncult">
			<figure class="cdncult-homepage">
				<div class="cdncult-color-overlay"></div>
				<img class="home-icon" src="<?php bloginfo('template_url'); ?>/img/cdncult-icon-animated2.gif" alt="CdnCult Newspaper"/>
			</figure>
		</a>
		<p>Reporting and commentary about Canadian performance culture in Internet time.</p>
	</div>
	<div class="pure-u-1-2">
		<h2><a href="/commissions">Commissions</a></h2>
		<a href="/commissions">
			<figure class="commission-holder" style="overflow:hidden;">
				<img class="commission-thumbnail" style="margin-top:-50px;" data-youtube-id="<?php echo $firstVideoID; ?>" />
			</figure>
		</a>
		<p>Commissions: One-minute commissions from Canadian theatre artists shot in one take on a smartphone.</p>
	</div>
	<div class="pure-u-1-2">
		<h2><a href="/experiments">Experimental Theatre</a></h2>
		<a href="/experiments">
			<figure>
				<img class="home-icon" src="<?php bloginfo('template_url'); ?>/img/experiment-stage.gif" alt="Experiments"/>
			</figure>
		</a>
		<p>Home for experiments combining digital tools and performance from across Canada.</p>
	</div>
	<div class="pure-u-1-2">
		<h2><a href="/makers">Makers</a></h2>
		<a href="/makers">
			<figure>
				<img class="home-icon" src="<?php bloginfo('template_url'); ?>/img/makers-map-icon.png" alt="Map of SpiderWebShow Collaborations"/>
			</figure>
		</a>
		<p>A web of makers is being spun across the country. See who&rsquo;s part of the show.</p>
	</div>		
</div>


<div class="scene" class="stage" style="position:fixed;top:0;left:0;z-index:-100;width:100%;overflow:hidden;">

	<div id="web1" class="layer web w1" data-depth="0.1"></div>
	<div id="web2" class="layer web w2" data-depth="0.3"></div>
	<div id="web3" class="layer web w3" data-depth="0.6"></div>

</div>


<script>
	function loadThumbnails(){
		// Grab all the img.commission-thumbnail elements
		var thumbs = $('.commission-thumbnail');
		if(thumbs){
			
			// for each. execute the function to get the thumbnail image 
			thumbs.each(function(){
				var thumb = $(this),
						videoID = thumb.data('youtube-id'),
						thumbQuery = 'https://www.googleapis.com/youtube/v3/videos?part=snippet&id=' + videoID + '&key=AIzaSyAigcUcBr55WcO56VqFPw1izemze7oRtqk';
						
				$.getJSON(thumbQuery, function(data){
					var thumbURL = data.items[0].snippet.thumbnails.high.url;
					thumb.attr('src', thumbURL);
					thumb.fadeIn();
					thumb.parents('.commission-preview').addClass('thumb-loaded');
				});
			});
		} else return;
	};
	
	// function to return rounded random numbers.
	function getRandom(min, max) {
		return Math.round(Math.random() * (max - min) + min);
	};
	
	/* 	Randomly color the .cdncult-color-overlay div on load */
	function cdncultColor() {
		var r,g,b,a,colorString;
		r = getRandom(55, 255);
		g = getRandom(55, 255);
		b = getRandom(55, 255);
		a = 0.4;
		colorString = 'background-color:rgba('+ r +','+ g +','+ b +','+ a +')';
		console.log(colorString);
		
		$('.cdncult-color-overlay').attr('style',colorString);
	};
	
	/* Randomly color the #autotune call background, no alpha */
	function autotuneColor() {
		var r,g,b,a,colorString;
		r = getRandom(155, 255);
		g = getRandom(155, 255);
		b = getRandom(155, 255);
		colorString = 'background-color:rgb('+ r +','+ g +','+ b +')';
		console.log(colorString);
		
		$('#autotune').attr('style',colorString);
	};
	
/*
	
	function lastAutotuneCall(){
		// get the date and time of the last Autotune update by querying the SoundCloud API
		var soundcloudQuery = "https://api.soundcloud.com/users/spiderweb-show/tracks.json?limit=1&client_id=3f356f314a7dde49074ede79efb447b2";
		
		$.getJSON(soundcloudQuery, function(data){
			
			var uploadTime = data[0].created_at;
			$('#autotune').attr('data-upload-time', uploadTime);			
			
		});		
				
	};
	
	function autotuneTimeAgo() {
		
		var timeposted = $('#autotune').data('upload-time');
		console.log(timeposted);
		
	};
	
*/
	
	
	
	
	head.ready(function(){
		
		// get the commission thumbnail holder and resize that box to be the proper aspect ratio like the others.
		var cholder = $('.commission-holder');
		var chW = cholder.width();
		cholder.height( chW / 2 );
		
		loadThumbnails();
		cdncultColor();
		autotuneColor();
		
	});

</script>
	
<?php get_footer(); ?>
