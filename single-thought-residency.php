<?php get_header(); ?>

<div class="main_content vertical_residencies pure-g-r">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); // WORDPRESS LOOP BEGINS ?>
	
	<div class="pure-u-1">
		<h2>The Thought Residencies</h2>
		<h1><?php the_title(); ?></h1>
	</div>
	
	<div class="pure-u-1-2">
		<?php
			$authorName = get_the_author(); // get the author's name
			$authorID = get_the_author_meta("ID"); // get the author's description from their user account
			$authorBio = get_the_author_meta("description"); // get the author's description from their user account
			$authorPhoto = types_render_usermeta_field( "author-photo", array("raw"=>"true")); // get URL for author image
			
			if($authorPhoto){
				// Function to replace the upload-sized author photo with the 300px one
				$findImgExt = "/(\.jpg|\.jpeg|\.png)$/";
				$addThumbDimension = "-300x300$1";
				$authorPhoto = preg_replace($findImgExt, $addThumbDimension, $authorPhoto);
				}
		 ?>
		 
		 <?php if($authorPhoto){ ?>
				<figure class="author-photo">
					<a href="<?php echo get_author_posts_url($authorID); ?>" title="Visit <?php echo $authorName; ?>&rsquo;s Author Profile">
						<img src="<?php echo $authorPhoto; ?>" alt="<?php echo $authorName; ?>" />
					</a>
				</figure>
			<?php } ?>

			<?php if($authorBio){ echo '<p class="author-bio">'.$authorBio.'</p>'; } ?>
			
			<p class="author-name"><a href="<?php echo get_author_posts_url($authorID); ?>" title="Visit <?php echo $authorName; ?>&rsquo;s Author Profile">Visit <?php echo $authorName; ?>&rsquo;s Full Author Profile</a></p>

	</div>
	<div class="pure-u-1-2">
		<?php the_content(); ?>
	</div>
		
	<?php endwhile; else: ?>
	<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
	<?php endif; // WORDPRESS LOOP ENDS ?>


</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>