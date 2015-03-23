<?php get_header(); ?>
<div class="main_content vertical_podcasts pure-g-r">
	<!-- This is a default template page! -->
  
  <div class="pure-u-1">  
  
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
	<h1><?php the_title(); ?></h1>
	
	<?php the_content(); ?>
	
	<?php endwhile; else: ?>
  	<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
	<?php endif; ?>
	
	
	<hr />
	
	<?php
	  
	  $podcasts = get_terms( 'podcast' );
  	
  	foreach($podcasts as $podcast) {
          	
    	$podcastName = $podcast->name;
    	$podcastSlug = $podcast->slug;
    	$podcastID = $podcast->term_id;
    	$podcastDesc = $podcast->description;
    	$podcastURL = get_bloginfo('url') . "/podcast/" . $podcast->slug;
    	
    	// Get the podcast term's custom fields based on its ID. See functions.php for the code that controls the podcast term's custom fields
    	// See also: http://sabramedia.com/blog/how-to-add-custom-fields-to-custom-taxonomies
    	$podcast_custom_fields = get_option( "taxonomy_term_$podcast->term_id");    	
      $podcastURLitunes = $podcast_custom_fields['podcast_itunes_link'];
  
  ?>    	
    
    <div class="podcast podcast-id-<?php echo $podcastID ?> podcast-<?php echo $podcastSlug ?>">
      
      <h2><a href="<?php echo $podcastURL ?>"><?php echo $podcastName ?></a></h2>
      <?php if ( $podcastDesc ) { ?>
      <p><?php echo $podcastDesc ?></p>
      <?php } ?>
      <?php if ( $podcastURLitunes ) { ?>
      <p><small><a href="<?php echo $podcastURLitunes ?>">Subscribe in iTunes</a></small></p>
      <?php } ?>
      
    </div>
    	
  
  <?php }; // End foreach ?>
	
	
  </div>

</div>
<?php get_footer(); ?>