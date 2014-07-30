<?php get_header(); ?>
<div class="main_content exp2_vertical">

<div class="pure-u-1">
  <p><a href="/experiments" title="See all experiments">&laquo; Back to experiments</a></p>
	<h1><?php single_cat_title(); ?></h1>
</div>

<?php
  // get the term slug, per http://wordpress.stackexchange.com/questions/130947/get-term-slug-of-current-post
  $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
  $term_slug = $term->slug;
  
	// Custom posts loop for experiments
	$args = array( 
		'post_type' => 'experiment',
		'laboratory' => $term_slug,
		'posts_per_page' => '50'
		);
	
	$loop = new WP_Query( $args );
	while ( $loop->have_posts() ) : $loop->the_post();
?>

	<a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
	<?php the_excerpt(); ?>

<?php endwhile; ?>

<?php wp_reset_postdata(); // Restore original Post Data ?>

</div>

<?php get_footer(); ?>