<?php get_header(); ?>
<div class="main_content vertical_video pure-g-r">

  <div class="pure-u-1 Videoseries-description">

    <figure class="vertical_header">
			<img class="vertical_header-img" src="https://spiderwebshow.ca/wp-content/uploads/2015/10/sws-talkshow.jpg" alt="">
			<p class="vertical_header-caption">Photo: <em>Habitat</em> by Mathieu Murphy-Perron, from the <a href="https://spiderwebshow.ca/images">SpiderWebShow Gallery</a></p>
		</figure>

 		<p><a href="/video" title="More SpiderWebShow Video">SpiderWeb Video</a>&nbsp;&raquo;&nbsp;<?php single_term_title(); ?></p>

    	<h1 class="Videoseries-title"><?php single_term_title(); ?></h1>

    	<?php

      	// This functionality requires the Categories Images plugin:
      	// https://wordpress.org/plugins/categories-images/

      if (function_exists('z_taxonomy_image_url')) {
        // if the plugin is active, fetch the img src
        // z_taxonomy_image_url($term_ID, $size, $return_placeholder)
        $videoImg = z_taxonomy_image_url(NULL, 'medium');

      }

      if( $videoImg ) { // only insert img tag if src is present

    ?>
    	  <img src="<?php echo $videoImg ?>" class="Videoseries-image" />

    	<?php } // end of Categories Images ?>

    	<?php if (term_description()) { ?>
    	<p class="Videoseries-text"><?php echo term_description(); ?></p>
    	<?php } ?>

  </div>

  <hr />


<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

  <div class="pure-u-1">

  	<article class="Videoseries-card">

      <?php if(has_post_thumbnail()): ?>
        <figure>
          <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('square-300'); ?></a>
        </figure>
      <?php endif; ?>

      <div class="Videoseries-text">

    		<h2 class="Videoseries-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    		<?php the_excerpt(); ?>

      </div>

  	</article>

  <?php endwhile; else: ?>
    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
  <?php endif; ?>


  </div>

  <nav class="pure-u-1 Nav-pagination">
    <p class="Nav-pagination--older"><?php next_posts_link("Older »"); ?></p>
    <p class="Nav-pagination--newer"><?php previous_posts_link("« Newer"); ?></p>
  </nav>

</div>

<?php get_footer(); ?>
