<?php get_header(); ?>
<div class="main_content stage vertical_cdncult pure-g-r">
	
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
		<h1><a href="/cdncult" title="#CdnCult Home">#Cdncult Times</a></h1>
		<p class="cdncult-tagline">Reporting and commentary about Canadian performance culture in Internet times &bull; <?php echo $most_recent_date; ?></p>
	</header>
	
	<hr/>

	<div class="pure-u-1">
		<h1 style="text-align:center;"><em>Previous Editions</em></h1>
	</div>


<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
	<article class="pure-u-1">
		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<?php the_time('F j, Y'); ?>
		<?php the_excerpt(); ?>
	</article>
	
		<?php endwhile; else: ?>
		<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
		<?php endif; ?>

</div>

<?php get_footer(); ?>