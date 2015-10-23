<?php get_header(); ?>
<div class="main_content stage vertical_elder pure-g-r">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); // BEGIN WORDPRESS LOOP ?>

	<div class="pure-u-1">
		<h1><?php the_title(); ?></h1>
	</div>
	
	<div class="pure-u-2-5">
		<?php the_content(); ?>
		
		<script>
		  // Load the Google API to load the Youtube Subscribe button
  		head.load("//apis.google.com/js/platform.js");
		</script>
		<hr>
		<p>Subscribe on YouTube: <div class="g-ytsubscribe" data-channel="UC32SlshOqWPecg0eYa63DPA" data-layout="default" data-count="hidden"></div></p>
		
	</div>

<?php endwhile; else: ?>
<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>
	
	<?php
		// Custom posts loop for commissions
		$args = array( 'post_type' => 'elder-project', 'posts_per_page' => 1 );
		$loop = new WP_Query( $args );
		while ( $loop->have_posts() ) : $loop->the_post();
		$firstYoutubeUrl = types_render_field("youtube-url", array("raw"=>"true")); // get custom field for the youtube video -- REQUIRED
		$permalinkToTalkShow = get_the_permalink(); // Permalink to the episode
		if($firstYoutubeUrl){ // Isolate just the video ID from the Youtube URL
			$idPattern = "/\?v=([\w-]{11})/"; // Regex for the 11-character video id
			preg_match($idPattern, $firstYoutubeUrl, $firstVideoID);
			$firstVideoID = ($firstVideoID[1]);
		}
	?>
		<?php endwhile;	?>
	
	<div class="pure-u-3-5">
	<figure id="embed_youtube" class="embed video youtube">
		<iframe width="560" height="315" src="http://www.youtube-nocookie.com/embed/<?php echo $firstVideoID; ?>?rel=0" frameborder="0" allowfullscreen></iframe>		
	</figure>
	<p>
	  <small><a href="<?php echo $permalinkToTalkShow; ?>"><i class="icon-link"></i> Permanent link to this episode »</a></small>
	</p>
	</div>

	
	<div class="pure-u-1">
    <h1>Previous Elder Project videos</h1>
	</div>
		<?php
			// Custom posts loop for commissions
			$args = array( 'post_type' => 'elder-project', 'posts_per_page' => 6, 'offset' => 1 );
			$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post(); ?>
			
			<article class="pure-u-1-3">
			<?php
				// For each Commission post, fetch the url of the youtube video and then isolate just its ID.
				$youtubeUrl = types_render_field("youtube-url", array("raw"=>"true")); // get custom field for the youtube video -- REQUIRED
				if($youtubeUrl){
					$idPattern = "/\?v=([\w-]{11})/";
					preg_match($idPattern, $youtubeUrl, $videoID);
					$videoID = ($videoID[1]);
				}
			?>
				<style>
					.commission-thumbnail { display: none; }
					.commission-preview { position: relative; }
					.commission-preview .icon-youtube-play { position: absolute; z-index: 100; opacity: 0.9; text-decoration: none; font-size: 4em; top: 40%; left: 40%; text-shadow: 2px 2px 4px rgba(0,0,0,0.5); display: none; }
					.commission-preview.thumb-loaded .icon-youtube-play { display: block; }
				</style>
				<figure class="elder-project-preview">
					<a href="<?php the_permalink(); ?>">						
						<img src="" alt="video thumbnail image" class="elder-project-thumbnail" data-youtube-id="<?php echo $videoID; ?>" />
						<i class="icon-youtube-play"></i>
					</a>
				</figure>
				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<?php the_excerpt(); ?>
			</article>
			
		<?php endwhile;	?>
<script>
		
		// Helper function to isolate a Youtube video ID from a Youtube URL
		function getVideoID(url) {
			var vID = url.match(/\?v=([\w-]{11})/)[1];
			return vID;
		};
		
		function loadYoutube(){
			
			// Youtube API call to fetch the first video from the specified playlist
			var youTubeQuery = "https://www.googleapis.com/youtube/v3/playlistItems?part=snippet&maxResults=1&order=date&playlistId=PLriu98w2Np-kvLJsKEYW7OZXv7EMYZEOp&key=AIzaSyAigcUcBr55WcO56VqFPw1izemze7oRtqk";

			// Make JSONP call to fetch the object 
			$.getJSON(youTubeQuery, function(data){
				var v, vID, vTitle, videoEmbed;
				
				// Get the video ID
				vID = data.items[0].snippet.resourceId.videoId;
				// embed it!
				videoEmbed = $('<iframe width="560" height="315" src="http://www.youtube-nocookie.com/embed/' + vID + '?rel=0" frameborder="0" allowfullscreen></iframe>');
				$('.video').append(videoEmbed).fitVids();		
				});	
		};
		
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
		
		
		
		
	head.ready(function(){
		$('#embed_youtube').fitVids();
		//loadYoutube();
		loadThumbnails();
	});
		
</script>

</div><!-- /.main_content -->



<?php get_footer(); ?>