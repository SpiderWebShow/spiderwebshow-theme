<?php get_header(); ?>
<div class="main_content stage vertical_cdncult pure-g-r">

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
		<h1><a href="/cdncult" title="#CdnCult Home">#Cdncult Times</a></h1>
		<p class="cdncult-tagline">Reporting and commentary about Canadian performance culture in Internet times &bull; <?php echo $most_recent_date; ?></p>
	</header>
	<hr/>
	
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); // WORDPRESS LOOP BEGINS ?>
	<?php
	/////////////////////////////
	// CUSTOM POST TYPE METADATA
	/////////////////////////////
		$thisPost = (string) $post->ID;
		$twitterHandle = types_render_usermeta_field( "twitter-handle", array("raw"=>"true")); // get custom field for company/artist twitter handle -- OPTIONAL
		$authorWebsite = get_the_author_meta("user_url"); // get custom field for compsny/artist website -- OPTIONAL
		$authorBio = get_the_author_meta("description"); // get the author's description from their user account
		$authorID = get_the_author_meta("ID"); // get the author's description from their user account
		$authorPhoto = types_render_usermeta_field( "author-photo", array("raw"=>"true")); // get URL for author image
		

		if($authorPhoto){
			// Function to replace the upload-sized author photo with the thumbnail-sized one
			$findImgExt = "/(\.jpg|\.jpeg|\.png)$/";
			$addThumbDimension = "-75x75$1";
			$authorPhoto = preg_replace($findImgExt, $addThumbDimension, $authorPhoto);
		}
					
		$authorName = get_the_author();
	
	?>
		<header class="post-header pure-u-1">
			<time class="post-pub-date" datetime="<?php the_time('c'); ?>"><?php the_time('l, F j, Y'); ?></time>
			<h1 class="post-title"><?php the_title(); ?></h1>
			<p class="author-name">By <?php the_author_posts_link(); ?></p>
		</header>
		
		<section class="post-content pure-u-1">
			<?php the_content(); ?>
			<?php the_post_thumbnail(); ?>
			<div class="" style="border:solid 1px #999;padding: 0 1em;">
				<h2>In this edition:</h2>
				<?php
					$children = types_child_posts('article');
					foreach($children as $child){ ?>
					
						<p><a href="<?php echo get_permalink($child->ID); ?>" title="<?php echo($child->post_title); ?>"><?php echo($child->post_title); ?></a></p>
					
					<?php }	?>
			</div>
			
		</section>
		
		
			
	
	<?php endwhile; else: ?>
		<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
	<?php endif; // WORDPRESS LOOP ENDS ?>

</div><!-- /.main_content -->	
<?php get_footer(); ?>