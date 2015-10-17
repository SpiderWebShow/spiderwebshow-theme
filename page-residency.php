<?php get_header(); ?>
<div class="main_content stage vertical_residencies pure-g-r">
	
	<div class="pure-u-1">
  	
    <figure class="vertical_header">
      <img class="vertical_header-img" src="http://spiderwebshow.ca/wp-content/uploads/2015/10/sws-thought.jpg" alt="">
      <p class="vertical_header-caption">Photo: <em>Salt Baby</em> by Mathieu Murphy-Perron, from the <a href="http://spiderwebshow.ca/images">SpiderWebShow Gallery</a></p>
    </figure>
  	
		<h1>Thought Residencies</h1>
	</div>
	
	<div class="pure-u-1-2">
  	<h2>Current Thought Resident:</h2>
  	
  	<?php
			// Custom posts loop for commissions
			$args = array( 'post_type' => 'thought-residency', 'posts_per_page' => 1 );
			$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post(); ?>
			
			<h2><span style="color:#777;"><time datetime="<?php the_time('Y-m'); ?>"><?php the_time('F Y'); ?></time>:</span> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
      
      <?php
        $authorBio = get_the_author_meta("description"); // get the author's description from their user account
        $authorPhoto = types_render_usermeta_field( "author-photo", array("raw"=>"true")); // get URL for author image
        if($authorPhoto){
  				// Function to replace the upload-sized author photo with the 300px one
  				$findImgExt = "/(\.jpg|\.jpeg|\.png)$/";
  				$addThumbDimension = "-75x75$1";
  				$authorPhoto = preg_replace($findImgExt, $addThumbDimension, $authorPhoto);
  				}
      ?>
      
      <?php if($authorPhoto){ ?><img src="<?php echo $authorPhoto; ?>" alt="Photo of <?php echo get_the_author(); ?>" style="margin:0 1em 1em 0; float:left" /><?php } ?>
      <?php if($authorBio){ echo $authorBio; } ?>
      
      <?php the_content(); ?>			
			
		<?php endwhile;	?>
  	
	</div>
	
	<div class="pure-u-1-2">
  	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); // WORDPRESS LOOP BEGINS ?>

  		<?php the_content(); ?>
  	
  	<?php endwhile; else: ?>
  	<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
  	<?php endif; // WORDPRESS LOOP ENDS ?>
  
    <hr>
		
		<h2>Previous Thought Residents:</h2>
		
		<?php
			// Custom posts loop for commissions
			$args = array( 'post_type' => 'thought-residency', 'order' => 'DESC', 'orderby' => 'date', 'offset' => '1', 'posts_per_page' => 50 );
			$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post(); ?>
			
			<h2><span style="color:#777;"><time datetime="<?php the_time('Y-m'); ?>"><?php the_time('F Y'); ?></time>:</span> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			
		<?php endwhile;	?>
  
	</div>
	
	
</div>
<?php get_footer(); ?>