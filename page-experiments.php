<?php get_header(); ?>
<div class="main_content exp2_vertical">

<h1>Experiments</h1>

<style>
  .sort-buttons { display: inline-block; line-height: 2em; margin: 0.5em; } .sort-buttons a.filter { background: #444; color: #fff; padding: 0.2em 0.4em; border-radius: 4px; text-decoration: none; -webkit-transition-duration:0.2s;-moz-transition-duration:0.2s;-o-transition-duration:0.2s;transition-duration:0.2s; } .sort-buttons a.filter:hover { background: #f55; }
</style>
<div class="sort-buttons">Sort: <a class="filter" data-filter="*" href="#everything">Everything</a> <a class="filter" data-filter=".podcasts" href="#podcasts">Podcasts</a> <a class="filter" data-filter=".sonic-theatre" href="#sonictheatre">Sonic Theatre</a> <a class="filter" data-filter=".twitter-theatre" href="#twittertheatre">Twitter Theatre</a> <a class="filter" data-filter=".tableau" href="#tableaux">Tableaux</a> <a class="filter" data-filter=".unknown-theatre" href="#unknown">Unknown Theatre</a></div>

<div class="all_the_cards">

<div class="exp2-card" style="background:#444;">
	<div class="experiment">
		&nbsp;	
	</div>
	<a href="http://spiderwebshow.ca/experiment/about-the-experiments">
		<div class="exp2-content">
			<h2>About the Experiments</h2>
			<p>CLICK HERE to read more about the research wing of the SpiderWebShow</p>
		</div>
	</a>
</div>

<div class="exp2-card podcasts" style="background:green;">
	<div class="experiment">
		&nbsp;	
	</div>
	<a href="http://spiderwebshow.ca/laboratory/podcasts">
		<div class="exp2-content">
			<h2>Podcasts</h2>
			<p>CLICK HERE to see all our podcast episodes</p>
		</div>
	</a>
</div>


<?php
	// Custom posts loop for experiments
	$args = array( 
		'post_type' => 'experiment',
		'post__not_in' => array(611),
		'posts_per_page' => '50'
		);
	
	$loop = new WP_Query( $args );
	while ( $loop->have_posts() ) : $loop->the_post();
?>

<?php
	// Get the Thumbnail URL to use as style background
	$thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "square-300" );
	$thumb = $thumbnail_src[0];
?>
<?php
	$terms = get_the_terms( $post->ID, 'laboratory' );
	if ( $terms && ! is_wp_error( $terms ) ) : 
	
		$lab_names = array();
		$lab_slugs = array();
	
		foreach ( $terms as $term ) {
			$lab_names[] = $term->name;
			$lab_slugs[] = $term->slug;
		}
		$the_names = join( ", ", $lab_names );
		$the_slugs = join( " ", $lab_slugs );
?>
<?php endif; ?>
<div class="exp2-card <?php if($terms){ echo $the_slugs; } ?>" style="background: <?php if ($thumb) { echo 'url(' . $thumb . ')'; } else { echo '#444'; } ?>;">
	<div class="experiment <?php if($terms){ echo $the_slugs; } ?>">
		&nbsp;	
	</div>
	<a href="<?php the_permalink(); ?>">
		<div class="exp2-content">
			<span class="which-lab <?php if($terms){ echo $the_slugs; } ?>"><?php if($terms){ echo $the_names; } ?></span>
			<h2><?php the_title(); ?></h2>
			<?php the_excerpt(); ?>
			
		</div>
	</a>
</div>

<?php endwhile; ?>

<?php wp_reset_postdata(); // Restore original Post Data ?>

</div> <!-- /.all_the_cards -->
</div>

<script>
	
	head.ready(function(){
		$('#embed_youtube').fitVids();
	});
	
  head.ready('jquery', function(){
  
    head.load('//cdnjs.cloudflare.com/ajax/libs/jquery.isotope/1.5.25/jquery.isotope.min.js', function(){
      var container = $('.all_the_cards');
      // init isotope
      container.isotope({
        itemSelector: '.exp2-card',
        layoutMode: 'fitRows'
      });
      
      $('a.filter').on('click', function(){
        event.preventDefault();
        var filterValue = $(this).attr('data-filter');
        console.log(filterValue);
        container.isotope({filter: filterValue});
      });
      
      
    });
    
  });

</script>


<?php get_footer(); ?>