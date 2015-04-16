<?php get_header(); ?>
<div class="main_content vertical_sound pure-g-r">

  <div class="pure-u-1">

 		<p><a href="/sound" title="More SpiderWebShow Sound">&laquo; See all SpiderWeb Sound</a></p>
  
    	<h1><?php single_term_title(); ?></h1>
    	
    	<?php if (function_exists('z_taxonomy_image')) { z_taxonomy_image(NULL, 'medium'); } ?>
    	
    	<?php if (term_description()) { ?>
    	<p><?php echo term_description(); ?></p>
    	<?php } ?>

    <hr />
  
  </div>
  
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