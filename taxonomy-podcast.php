<?php get_header(); ?>
<div class="main_content vertical_podcasts pure-g-r">

  <div class="pure-u-1">

 		<p><a href="/podcasts" title="More SpiderWebShow Podcasts">&laquo; See all SpiderWebShow Podcasts</a></p>

  </div>
  
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

  <div class="pure-u-1">
  	<h1><?php single_term_title(); ?></h1>
  	<p><?php echo term_description(); ?></p>
  </div>

  <hr />
	
	<article class="pure-u-1">
		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<?php the_excerpt(); ?>
	</article>
	
<?php endwhile; else: ?>
  <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>

</div>

<?php get_footer(); ?>