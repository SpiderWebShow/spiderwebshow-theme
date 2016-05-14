<?php get_header(); ?>

<div class="main_content vertical_talkshow stage pure-g-r">

	<div class="pure-u-1">
		<p><a href="/talkshow" title="See all TalkShow episodes">&laquo; Back to TalkShow</a></p>
	</div>

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); // WORDPRESS LOOP BEGINS ?>
	<?php
	/////////////////////////////
	// CUSTOM POST TYPE METADATA
	/////////////////////////////
	
		$youtubeUrl = types_render_field("youtube-url", array("raw"=>"true")); // get custom field for the youtube video -- REQUIRED
	
	?>
	<article class="commission_post">
		<h1 class="pure-u-1"><?php the_title(); ?></h1>
		
		<figure class="video"></figure>
		
		<section class="pure-u-1">
		  
  		<script>
  		  // Load the Google API to load the Youtube Subscribe button
    		head.load("https://apis.google.com/js/platform.js");
  		</script>
  		<div style="display:block;float:right;margin-top: 1em;padding:0.33em 2em;background:rgba(33,33,33,0.3);text-align:center;">
    		<p>Subscribe on YouTube: <div class="g-ytsubscribe" data-channel="sarahgartonstanley" data-layout="default" data-count="hidden"></div></p>
  		</div>
		  
			<?php the_content(); ?>
		</section>
		
	</article>
	
	
	<?php endwhile; else: ?>
	<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
	<?php endif; // WORDPRESS LOOP ENDS ?>


<script>
	// When page is ready, get the YouTube url, isolate the video ID, and embed the Youtube iframe.
	head.ready(function(){
		var youtubeURL = '<?php echo $youtubeUrl; ?>',
		// Use a Regex .match to extract just the video's 11-digit id; see http://stackoverflow.com/a/1280572			
				vID = youtubeURL.match(/\?v=([\w-]{11})/)[1],
				videoEmbed = $('<iframe width="560" height="315" src="https://www.youtube-nocookie.com/embed/' + vID + '?rel=0" frameborder="0" allowfullscreen></iframe>');;
		$('figure.video').append(videoEmbed).fitVids();
	});
</script>


</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>