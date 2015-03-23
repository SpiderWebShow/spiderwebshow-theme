<?php get_header(); ?>
<div class="main_content vertical_podcasts pure-g-r">
	
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  
  <?php
  	
  	$podcast =  wp_get_post_terms( $post->ID, 'podcast' );
  	$podcast = $podcast[0];
  	$podcastID = $podcast->term_id;
  	$podcastName = $podcast->name;
  	$podcastDesc = $podcast->description;
  	$podcastSlug = $podcast->slug;
  	$podcastURL = get_bloginfo('url') . "/podcast/" . $podcastSlug;
  	$podcastFeed = get_bloginfo('url') . "/podcast/" . $podcastSlug . "/feed";
  	
	?>

  <div class="pure-u-1">

 		<p><a href="/podcasts" title="More SpiderWebShow Podcasts">&laquo; See all SpiderWebShow Podcasts</a></p>

  </div>
	
	<div class="pure-u-2-3">
		
		<h1><?php the_title(); ?></h1>
		<p>Posted by <?php the_author_posts_link(); ?> on <?php the_date("F j, Y"); ?></p>
		<?php the_content(); ?>

	</div>
	
	<div class="pure-u-1-3">
	
	  <hr />
  	
  	<h3><a href="<?php echo $podcastURL ?>"><?php echo $podcastName; ?></a></h3>
  	<p><?php echo $podcastDesc; ?></p>
  	<p><a href="<?php echo $podcastURL ?>">Full Episode List</a></p>
  	<p><a href="<?php echo $podcastFeed ?>">Subscribe with RSS</a></p>
  	
	</div>	
	
	<?php endwhile; else: ?>
	<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
	<?php endif; ?>

</div>

<?php get_footer(); ?>