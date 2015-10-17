<?php get_header(); ?>
<div class="main_content">
  
  <figure class="vertical_header">
    <img class="vertical_header-img" src="http://spiderwebshow.ca/wp-content/uploads/2015/10/sws-map.jpg" alt="">
    <p class="vertical_header-caption">Photo: <em>Territories</em> by Mathieu Murphy-Perron, from the <a href="http://spiderwebshow.ca/images">SpiderWebShow Gallery</a></p>
  </figure>
  
  
	<!-- This is a default template page! -->

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
	<h1><?php the_title(); ?></h1>
	
	<?php the_content(); ?>
	
	
	<?php endwhile; else: ?>
	<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
	<?php endif; ?>

</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>