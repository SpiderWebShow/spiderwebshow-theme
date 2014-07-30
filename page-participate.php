<?php get_header(); ?>
<div class="main_content stage pure-g-r">
	
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
	<div class="pure-u-1">
		<h1><?php the_title(); ?></h1>
	</div>
	
	<div class="pure-u-1">
		<h2>Email us!</h2>
		<p>We&rsquo;d like to hear from you. Our email address is thespiderwebshow (&rsquo;at&lsquo; symbol) gmail (dot) com.</p>
	</div>
	
	<hr>
	
	<div class="pure-u-1" style="border:solid 1px #999;">
	<?php the_content(); ?>
	</div>
	
	<?php endwhile; else: ?>
	<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
	<?php endif; // End standard wordpress loop. Custom loop fetches experiment list below ?>
	
	
	<div class="pure-u-1-3">
		<h2><a href="https://twitter.com/search?q=%23cdncult">#CdnCult</a></h2>
		<p>Connect your discussion to a national cultural conversation by adding the <a href="https://twitter.com/search?q=%23cdncult">#CdnCult</a> hashtag.</p>
		<a class="twitter-timeline" data-chrome="transparent noheader noborders" data-dnt="true" href="https://twitter.com/search?q=%23cdncult" data-tweet-limit="5" data-widget-id="371717661882728448" aria-polite="polite">Tweets about "#cdnhist"</a>
	</div>
	
	<div class="pure-u-1-3">
		<h2><a href="/cdncult" title="#CdnCult Times">#CdnCult Times</a></h2>
		<p>It&rsquo;s not a hashtag, it&rsquo;s an online paper that publishes weekly. We accept submissions from across the country. Tell us about what kind of story you have in mind. Here are some recent articles we&rsquo;ve published:</p>
		<ul>
		<?php $args = array(
			'posts_per_page' => 3, // fetch only the single most recent edition post
			'post_type' => 'article' // only fetch post_type 'edition'
		);
		// The Query
		$the_query = new WP_Query( $args ); // make new WP_query with the specified arguments
		
		// The Loop
		while ( $the_query->have_posts() ) { $the_query->the_post(); ?>

			<li><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></li>
			
		<?php } // end while;
			wp_reset_postdata();
		?>		
		</ul>
	</div>
	
	<div class="pure-u-1-3">
		<h2><a href="/experiments">Experiments</a></h2>
		<p>Have an idea about how online technologies can alter/complement/broaden/focus live performance? Tell us about it.</p>
	</div>
	
	
	
	
</div>
<?php get_footer(); ?>