<?php get_header(); ?>
<div class="main_content vertical_cdncult pure-g-r">

	<header class="cdncult_header pure-u-1">
		<h1><a href="/cdncult" title="#CDNCult Home">#CDNCult Times</a></h1>
		<p class="cdncult-tagline">All the #CdnCult that's fit to print</p>
	</header>
	
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
		
		<section class="post-content pure-u-3-4">
			<?php the_content(); ?>
		</section>
		
		<aside class="pure-u-1-4">
			<div class="post_meta post_meta-author">
			<p class="about-the-author">About the author</p>
			<?php if($authorPhoto){ ?>
				<figure class="author-photo">
					<a href="<?php echo get_author_posts_url($authorID); ?>" title="Visit <?php echo $authorName; ?>&rsquo;s Author Profile">
						<img src="<?php echo $authorPhoto; ?>" alt="<?php echo $authorName; ?>" />
					</a>
				</figure>
			<?php } ?>
			<p class="author-name"><a href="<?php echo get_author_posts_url($authorID); ?>" title="Visit <?php echo $authorName; ?>&rsquo;s Author Profile"><?php echo $authorName; ?></a></p>
			<?php if($authorBio){ echo '<p class="author-bio">'.$authorBio.'</p>'; } ?>
			<p class="connect-the-author">Elsewhere online</p>
			<?php if($authorWebsite){ echo '<p><a href="'.$authorWebsite.'" class="author-website" title="Visit '.$authorName.'&rsquo;s website" target="_blank">Website <i class="icon-external-link"></i></a></p>'; } ?>
			<?php if($twitterHandle){ echo '<p><a href="https://twitter.com/'.$twitterHandle.'" title="Follow '.$authorName.' on Twitter" class="twitter-follow-button" data-dnt="true" data-show-count="false">@'.$twitterHandle.'</a></p>'; } ?>
			
			<?php $args = array( 'posts_per_page' => 5, 'author' => $authorID, 'exclude' => $thisPost ); // Most recent five other posts by this author, excluding the current one
				$myposts = get_posts( $args );
				if(count($myposts) >= 1 ) : ?>
				<p class="author-related-posts-header">Also by this author</p>
				<?php foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
					<a href="<?php the_permalink(); ?>" title="Read <?php the_title(); ?>" class="author-related-post"><?php the_title(); ?></a>
			<?php endforeach; endif; wp_reset_postdata();?>
			</div>
			
			<?php if(!has_category('uncategorized')) {  // Only display the category & tag box if the post has been actually given a category other than "uncategorized" ?>
			<div class="post_meta post_meta-bottom pure-u-1-4">
					<p class="category-list-header">Filed Under</p>
					<p class="category-list"><?php the_category(', '); // output as an inline list, separated by commas ?></p>
				<?php if(has_tag()): ?>
					<p class="tag-list-header">Tagged With</p>
					<p class="tag-list"><?php the_tags('',', ',''); // output as an inline list with nothing preceding or following, separated by commas ?></p>
				<?php endif; ?>
			</div>
			<?php } ?>
		
		</aside>
			
	
	<?php endwhile; else: ?>
		<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
	<?php endif; // WORDPRESS LOOP ENDS ?>

</div><!-- /.main_content -->	
<?php get_footer(); ?>