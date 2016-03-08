<?php get_header(); ?>
<div class="main_content vertical_sound pure-g-r">
	<!-- This is a default template page! -->

  <div class="pure-u-1">

  <figure class="vertical_header">
    <img class="vertical_header-img" src="http://spiderwebshow.ca/wp-content/uploads/2015/10/sws-sound.jpg" alt="">
    <p class="vertical_header-caption">Photo: <em>Zadie’s Shoes</em> by Mathieu Murphy-Perron, from the <a href="http://spiderwebshow.ca/images">SpiderWebShow Gallery</a></p>
  </figure>

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<h1><?php the_title(); ?></h1>

	<?php the_content(); ?>

	<?php endwhile; else: ?>
  	<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
	<?php endif; ?>


	<hr />

	<?php

	  $sounds = get_terms( 'sounds' );

  	foreach($sounds as $sound) {

    	$soundName = $sound->name;
    	$soundSlug = $sound->slug;
    	$soundID = $sound->term_id;
    	$soundDesc = $sound->description;
    	$soundImg = z_taxonomy_image_url($soundID, 'square-300');
    	$soundURL = get_bloginfo('url') . "/sounds/" . $sound->slug;

    	// Get the podcast term's custom fields based on its ID. See functions.php for the code that controls the podcast term's custom fields
    	// See also: http://sabramedia.com/blog/how-to-add-custom-fields-to-custom-taxonomies
    	$podcast_custom_fields = get_option( "taxonomy_term_$sound->term_id");
      $podcastURLitunes = $podcast_custom_fields['podcast_itunes_link'];

  ?>

    <div class="podcast podcast-card podcast-id-<?php echo $podcastID ?> podcast-<?php echo $podcastSlug ?>">

      <?php if ( $soundImg ) { ?>
        <figure>
          <a href="<?php echo $soundURL ?>">
            <img src="<?php echo $soundImg ?>" alt="<?php echo $soundName ?>" />
          </a>
        </figure>
      <?php } ?>

      <div class="podcast-text">
        <h2><a href="<?php echo $soundURL ?>"><?php echo $soundName ?></a></h2>

        <?php if ( $soundDesc ) { ?>
          <p><?php echo $soundDesc ?></p>
        <?php } ?>
        <?php if ( $podcastURLitunes ) { ?>
        <p><small><a href="<?php echo $podcastURLitunes ?>">Subscribe in iTunes</a></small></p>
        <?php } ?>
      </div>
      
    </div>


  <?php }; // End foreach ?>


  </div>

</div>
<?php get_footer(); ?>
