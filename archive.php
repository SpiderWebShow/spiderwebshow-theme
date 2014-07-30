<?php get_header(); ?>
<div class="main_content pure-g-r">

<?php
		// Generate a random pastel color for the Jillian button
		$r = dechex(rand(155,255));
		$g = dechex(rand(155,255));
		$b = dechex(rand(155,255));
	?>

<div class="pure-u-1">
	<h1>Keyword: <span style="background:#<?php echo $r . $g . $b; ?>"><?php single_cat_title(); ?></span></h1>
</div>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
	<article class="pure-u-1">
		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<?php the_excerpt(); ?>
	</article>
	
		<?php endwhile; else: ?>
		<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
		<?php endif; ?>

</div>

<?php get_footer(); ?>