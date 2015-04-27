<?php get_header(); ?>
<div class="main_content vertical_sound pure-g-r">
	
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  
  <?php
  	
  	$sound =  wp_get_post_terms( $post->ID, 'sounds' );
  
  if ($sound) {

    	$sound = $sound[0];  	
    	$soundID = $sound->term_id;
    	$soundName = $sound->name;
    	$soundDesc = $sound->description;
    	$soundSlug = $sound->slug;
    	$soundURL = get_bloginfo('url') . "/sounds/" . $soundSlug;
    	$soundFeed = get_bloginfo('url') . "/sounds/" . $soundSlug . "/feed";
    if (function_exists('z_taxonomy_image_url')) {
    	  $soundImg = z_taxonomy_image_url($soundID, 'medium', false);
    }
  	}
	?>

  <div class="pure-u-1">

 		<p>
      <a href="/sound" title="More SpiderWebShow Sound">SpiderWeb Sound</a><?php 
        if ( $soundName && $soundURL ): ?>&nbsp;&raquo;&nbsp;<a href="<?php echo $soundURL ?>"><?php echo $soundName; ?></a>&nbsp;&raquo;&nbsp;<?php the_title(); ?><?php endif; ?>
    </p>

  </div>
	
	<article class="pure-u-2-3">
		
		<h1><?php the_title(); ?></h1>
		<p>Posted by <?php if ( function_exists( 'coauthors_posts_links' ) ) {
          coauthors_posts_links();
      } else {
          the_author_posts_link();
      } ?> on <?php the_date("F j, Y"); ?></p>
		<?php the_content(); ?>

	</article>
	
	<div class="pure-u-1-3">
	
  <hr />
  <?php if ( $soundImg ) { ?>
    <img src="<?php echo $soundImg ?>" />
  <?php } ?>
	
  	
  	<h3><a href="<?php echo $soundURL ?>"><?php echo $soundName; ?></a></h3>
  	<p><?php echo $soundDesc; ?></p>
  	<p><a href="<?php echo $soundURL ?>">Full Episode List</a></p>
  	<p><a href="<?php echo $soundFeed ?>">Subscribe with RSS</a></p>
  	
	</div>	
	
	<?php endwhile; else: ?>
	<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
	<?php endif; ?>

</div>

<?php get_footer(); ?>