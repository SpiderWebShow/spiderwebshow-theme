<?php get_header(); ?>

<div class="main_content vertical_commissions pure-g-r">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); // WORDPRESS LOOP BEGINS ?>
	<?php
	/////////////////////////////
	// CUSTOM POST TYPE METADATA
	/////////////////////////////
	
		$youtubeUrl = types_render_field("youtube-url", array("raw"=>"true")); // get custom field for the youtube video -- REQUIRED
		$twitterHandle = types_render_field("twitter-handle", array("raw"=>"true")); // get custom field for company/artist twitter handle -- OPTIONAL
		$website = types_render_field("website", array("raw"=>"true")); // get custom field for compsny/artist website -- OPTIONAL
	
	?>
	<article class="commission_post">
		<h1 class="pure-u-1"><?php the_title(); ?></h1>
		<aside class="post_meta post_meta-top pure-u-1">
			<p>By <?php the_author_posts_link(); ?> | <?php the_date(); ?></p>
		</aside>
		
		<figure class="video"></figure>
		
		<section class="pure-u-1">
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
				videoEmbed = $('<iframe width="560" height="315" src="http://www.youtube-nocookie.com/embed/' + vID + '?rel=0" frameborder="0" allowfullscreen></iframe>');;
		$('figure.video').append(videoEmbed).fitVids();
	});
</script>


</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>