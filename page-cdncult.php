<?php get_header(); ?>
<div class="main_content vertical_cdncult cdncult_home pure-g-r">
	
	<?php 
	
		// WP_Query arguments
		$args = array (
			'post_type'              => 'edition',
			'posts_per_page'         => '1',
		);
		
		// The Query
		$latest_edition_date = new WP_Query( $args );
		
		// The Loop
		if ( $latest_edition_date->have_posts() ) {
			while ( $latest_edition_date->have_posts() ) {
				$latest_edition_date->the_post();
				$most_recent_date = get_the_date();
			}
		} else {
			// no posts found
		}
		
		// Restore original Post Data
		wp_reset_postdata();
	
	?>
	
	<header class="cdncult_header pure-u-1">
		<h1>#CdnCult</h1>
		<p class="cdncult-tagline">Reporting and commentary about Canadian performance culture in Internet times &bull; <?php echo $most_recent_date; ?></p>
	</header>
	
	<hr>
	
	<div class="pure-u-3-5 edition-intro">
		<?php
		/*
		 * Run two loops. First, grab the most recent Edition and display it. 
		 * Grab the Post IDs of all of its child posts, and put them into an array. 
		 * Use that array to run a second loop and display all the child posts.
		 */
		 
		// First off, simply define an empty array to hold child posts		
		$edition_articles = array();
		
		// Arguments for the first loop
		$args = array(
			'posts_per_page' => 1, // fetch only the single most recent edition post
			'post_type' => 'edition' // only fetch post_type 'edition'
		);
		// The Query
		$the_query = new WP_Query( $args ); // make new WP_query with the specified arguments
		
		// The Loop
		while ( $the_query->have_posts() ) { $the_query->the_post(); ?>
			<?php
				$children = types_child_posts('article'); // get the child posts (post_type of 'article') of this single post.
				foreach($children as $child){ // for each one...
					array_push($edition_articles, $child->ID); // get its post ID and push that to the array we set up above.
				}
			?>
			
			<h2><?php the_title(); ?></h2>
			
      <?php if(has_post_thumbnail()): ?>
				<figure class="thumbnail">
					<?php the_post_thumbnail('large'); ?>
				</figure>
			<?php endif; ?>
			
			<?php the_content(); ?>
			
		<?php } // end while; ?>
		<?php
		
		/* Restore original Post Data 
		 * NB: Because we are using new WP_Query we aren't stomping on the 
		 * original $wp_query and it does not need to be reset.
		 */
		wp_reset_postdata(); ?>
		
		<a class="pure-button" href="/edition" title="See all editions of the #CdnCult Times">Read all back issues of #CdnCult Times &raquo;</a>
	</div>
	<div class="pure-u-2-5">
		<h2>Latest #CdnCult Tweets</h2>
		<p>A stream of all tweets tagged <a href="https://twitter.com/hashtag/cdncult" title="#cdncult">#CdnCult</a>. A way to use hashtags to begin, broaden, and intensify conversations about Canadian Culture.</p>
		<p>Tweeting about The SpiderWebShow? Use <a href="https://twitter.com/hashtag/cdncult" title="#cdncult">#CdnCult</a>. Tweeting about Canadian Culture? Use <a href="https://twitter.com/hashtag/cdncult" title="#cdncult">#CdnCult</a>. Tweeting about anything related to #Cdn plays, films, music, art, writing etc? Use <a href="https://twitter.com/hashtag/cdncult" title="#cdncult">#CdnCult</a>. Tweeting about Canadian Cults? Use <a href="https://twitter.com/hashtag/cdncult" title="#cdncult">#CdnCult</a>.</p>
		<a class="twitter-timeline" data-chrome="transparent noheader noborders" data-dnt="true" href="https://twitter.com/hashtag/cdncult" data-widget-id="371717661882728448" aria-polite="polite" height="400">Tweets about "#cdncult"</a>
	</div>
	
</div>
<div class="main_content vertical_cdncult cdncult_home pure-g-r">
	<hr />	<?php 
		
		/*
		 * Second loop starts here.
		 * It will use the array of post IDs from above ($edition_articles) to query the database for just those posts
		 */
		 		 
		// Set up new argument
		$args2 = array(
			//'posts_per_page' => 3, // limit the number of Articles that will display to 3. DEPRECATED so that we can accommodate differently-sized editions in future
			'post_type' => 'article', // define post_type of 'article'. We only want this post type, no traditional "posts"
			'post__in' => $edition_articles // the array of post IDs to fetch
		);
		
		/* The 2nd Query (without global var) */
		$query2 = new WP_Query( $args2 );
		
		// The 2nd Loop
		while( $query2->have_posts() ) { $query2->the_post(); ?>
		
			<div class="cdncult-home-excerpt">
  			
  			  <div class="pure-u-3-5">
				<?php if(has_post_thumbnail()): ?>
				<figure class="thumbnail">
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('large'); ?></a>
				</figure>
				<?php endif; ?>
  			  </div>
  			  
  			  <div class="pure-u-2-5">
				<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
				<em>By <?php if ( function_exists( 'coauthors_posts_links' ) ) {
					    coauthors_posts_links();
					} else {
					    the_author_posts_link();
					} ?></em>
				<?php the_excerpt(); ?>
  			  </div>
  			  
			</div>
			
			<hr>
		
		<?php } // end while; ?>
		
		<?php 
		// Restore original Post Data
		wp_reset_postdata();
		?>		

</div>
<?php get_footer(); ?>