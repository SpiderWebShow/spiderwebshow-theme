<?php get_header(); ?>
<div class="main_content stage vertical_residencies pure-g-r">
	
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); // WORDPRESS LOOP BEGINS ?>

	
	<div class="pure-u-1">
		<h1><?php the_title(); ?></h1>
	</div>
	
	<div class="pure-u-1-2">
		<?php the_content(); ?>
	</div>
	
	<?php endwhile; else: ?>
	<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
	<?php endif; // WORDPRESS LOOP ENDS ?>
	
	<div class="pure-u-1-2">
		
		<h2>Previous Thought Residents:</h2>
		<hr>
		
		<?php
			// Custom posts loop for commissions
			$args = array( 'post_type' => 'thought-residency', 'order' => 'DESC', 'orderby' => 'id', 'posts_per_page' => 50 );
			$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post(); ?>
			
			<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			
		<?php endwhile;	?>
		
	</div>
	
	
	
	
</div>
<?php get_footer(); ?>