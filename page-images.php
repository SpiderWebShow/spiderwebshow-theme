<?php get_header(); ?>
<div class="main_content pure-g-r">
	<!-- This is a default template page! -->
  
  <div class="pure-u-1">
    
    <figure class="vertical_header">
      <img class="vertical_header-img" src="https://spiderwebshow.ca/wp-content/uploads/2015/10/sws-gallery.jpg" alt="">
      <p class="vertical_header-caption">Photo: <em>Rage</em> by Mathieu Murphy-Perron, from the <a href="https://spiderwebshow.ca/images">SpiderWebShow Gallery</a></p>
    </figure>
      
  
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
	<h1><?php the_title(); ?></h1>
	
	<?php the_content(); ?>
	
	<?php endwhile; else: ?>
  	<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
	<?php endif; ?>
	
	
	<hr />
	
	<?php
	  
	  $imgSeries = get_terms( 'img-series' );
  	
  	foreach($imgSeries as $img) {
          	
    	$imgName = $img->name;
    	$imgSlug = $img->slug;
    	$imgID = $img->term_id;
    	$imgDesc = $img->description;
    	$imgImg = z_taxonomy_image_url($imgID, 'thumbnail');
    	$imgURL = get_bloginfo('url') . "/img-series/" . $img->slug;
    	  
  ?>    	
    
    <div class="img-series img-series-id-<?php echo $imgID ?> img-series-<?php echo $imgSlug ?>">
      
      <h2><a href="<?php echo $imgURL ?>"><?php echo $imgName ?></a></h2>
      
      <?php if ( $imgImg ) { ?>
        <figure>
          <a href="<?php echo $imgURL ?>">
            <img src="<?php echo $imgImg ?>" alt="<?php echo $imgName ?>" />
          </a>
        </figure>
      <?php } ?>
      
      <?php if ( $imgDesc ) { ?>
        <p><?php echo $imgDesc ?></p>
      <?php } ?>      
    </div>
    	
  
  <?php }; // End foreach ?>
	
	
  </div>

</div>
<?php get_footer(); ?>