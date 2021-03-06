<?php get_header(); ?>
<div class="main_content stage vertical_cdncult archive-edition pure-g-r">
	
	<?php 
	
		// WP_Query arguments
		$args = array (
			'post_type'              => 'edition',
			'posts_per_page'         => '1',
		);
		
		// The Query
		$latest_edition_date = new WP_Query( $args );
		
		// The Loop
		if ( $latest_edition_date->have_posts() ) {
			while ( $latest_edition_date->have_posts() ) {
				$latest_edition_date->the_post();
				$most_recent_date = get_the_date();
			}
		} else {
			// no posts found
		}
		
		// Restore original Post Data
		wp_reset_postdata();
	
	?>
	
	<header class="cdncult_header pure-u-1">
		<h1><a href="/cdncult" title="#CdnCult Home">#CdnCult</a></h1>
		<p class="cdncult-tagline">Reporting and commentary about Canadian performance culture in Internet times &bull; <?php echo $most_recent_date; ?></p>
	</header>
	
	<hr/>

	<div class="pure-u-1">
		<h1 style="text-align:center;"><em>Previous Editions</em></h1>
	</div>


<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
	<article class="pure-u-1 Archive-excerpt">
    
    	<?php if(has_post_thumbnail()): ?>
			<figure class="Archive-thumbnail">
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('category-thumb'); ?></a>
			</figure>
		<?php endif; ?>
  	
		<h2 class="Archive-hed"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		
		<time datetime="<?php the_time("c"); ?>" class="Archive-datetime"><?php the_time('F j, Y'); ?></time>
		
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