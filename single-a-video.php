<?php get_header(); ?>

<div class="main_content vertical_video stage pure-g-r">

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); // WORDPRESS LOOP BEGINS ?>
	<?php

	// Fatal error: Cannot use object of type WP_Error as array in /Users/gfscott/dev/spiderwebshow/wp-content/themes/spiderwebshow/single-a-video.php on line 12

  	$video =  wp_get_post_terms( $post->ID, 'video-series' );
		if ($video) {

    	$video = $video[0];
    	$videoID = $video->term_id;
    	$videoName = $video->name;
    	$videoDesc = $video->description;
    	$videoSlug = $video->slug;
    	$videoURL = get_bloginfo('url') . "/video-series/" . $videoSlug;
    	$videoFeed = get_bloginfo('url') . "/video-series/" . $videoSlug . "/feed";
    if (function_exists('z_taxonomy_image_url')) {
    	  $videoImg = z_taxonomy_image_url($videoID, 'medium', false);
    }
  	}
	?>


	<?php
	/////////////////////////////
	// CUSTOM POST TYPE METADATA
	/////////////////////////////

		$youtubeUrl = types_render_field("youtube-url", array("raw"=>"true")); // get custom field for the youtube video -- REQUIRED

	?>

	<div class="pure-u-1">

		<figure class="vertical_header">
			<img class="vertical_header-img" src="https://spiderwebshow.ca/wp-content/uploads/2015/10/sws-talkshow.jpg" alt="">
			<p class="vertical_header-caption">Photo: <em>Habitat</em> by Mathieu Murphy-Perron, from the <a href="https://spiderwebshow.ca/images">SpiderWebShow Gallery</a></p>
		</figure>

		<p>
      <a href="/video" title="More SpiderWebShow Video">SpiderWeb Video</a><?php
        if ( $videoName && $videoURL ): ?>&nbsp;&raquo;&nbsp;<a href="<?php echo $videoURL ?>"><?php echo $videoName; ?></a>&nbsp;&raquo;&nbsp;<?php the_title(); ?><?php endif; ?>
    </p>
	</div>

	<article class="postcontent-video">

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
