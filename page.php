<?php get_header(); ?>
<div class="main_content">
	<!-- This is a default template page! -->

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
	<h1><?php the_title(); ?></h1>
	
	<?php the_content(); ?>
	
	
	<?php endwhile; else: ?>
	<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
	<?php endif; ?>

</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>