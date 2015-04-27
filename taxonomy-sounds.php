<?php get_header(); ?>
<div class="main_content vertical_sound pure-g-r">

  <div class="pure-u-1 Soundseries-description">

 		<p><a href="/sound" title="More SpiderWebShow Sound">SpiderWeb Sound</a>&nbsp;&raquo;&nbsp;<?php single_term_title(); ?></p>
  
    	<h1 class="Soundseries-title"><?php single_term_title(); ?></h1>
    	
    	<?php
      	
      	// This functionality requires the Categories Images plugin:
      	// https://wordpress.org/plugins/categories-images/
      	
      if (function_exists('z_taxonomy_image_url')) { 
        // if the plugin is active, fetch the img src
        // z_taxonomy_image_url($term_ID, $size, $return_placeholder)
        $soundImg = z_taxonomy_image_url(NULL, 'medium');
        
      }
    
      if( $soundImg ) { // only insert img tag if src is present
    
    ?>
    	  <img src="<?php echo $soundImg ?>" class="Soundseries-image" />
    	  
    	<?php } // end of Categories Images ?>
    	
    	<?php if (term_description()) { ?>
    	<p class="Soundseries-text"><?php echo term_description(); ?></p>
    	<?php } ?>
    	  
  </div>
  
  <hr />

  
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
	<article class="pure-u-1">
		
		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		
		<?php if(has_post_thumbnail()): ?>
			<figure>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('cdncult-thumb'); ?></a>
			</figure>
		<?php endif; ?>
		
		<?php the_excerpt(); ?>
	</article>
	
<?php endwhile; else: ?>
  <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>

<nav class="pure-u-1 Nav-pagination">
  <p class="Nav-pagination--older"><?php next_posts_link("Older »"); ?></p>
  <p class="Nav-pagination--newer"><?php previous_posts_link("« Newer"); ?></p>
</nav>

</div>

<?php get_footer(); ?>