<?php get_header(); ?>
<div class="main_content exp2_vertical">

<h1>Experiments</h1>

<hr>

<?php
		// Custom posts loop for commissions
		$args = array( 'post_type' => 'talk-show', 'posts_per_page' => 1 );
		$loop = new WP_Query( $args );
		while ( $loop->have_posts() ) : $loop->the_post();
		$firstYoutubeUrl = types_render_field("youtube-url", array("raw"=>"true")); // get custom field for the youtube video -- REQUIRED
		if($firstYoutubeUrl){ // Isolate just the video ID from the Youtube URL
			$idPattern = "/\?v=([\w-]{11})/"; // Regex for the 11-character video id
			preg_match($idPattern, $firstYoutubeUrl, $firstVideoID);
			$firstVideoID = ($firstVideoID[1]);
		}
	?>
	<?php endwhile;	?>
	
<style>
  .sort-buttons { margin-bottom: 1em; } .sort-buttons a.filter { background: #444; color: #fff; padding: 0.2em 0.4em; margin-right: 1em; border-radius: 4px; text-decoration: none; -webkit-transition-duration:0.2s;-moz-transition-duration:0.2s;-o-transition-duration:0.2s;transition-duration:0.2s; } .sort-buttons a.filter:hover { background: #f55; }
</style>
<div class="sort-buttons">Sort: <a class="filter" data-filter="*" href="#">Everything</a> <a class="filter" data-filter=".podcasts" href="#">Podcasts</a> <a class="filter" data-filter=".sonic-theatre" href="#">Sonic Theatre</a> <a class="filter" data-filter=".twitter-theatre" href="#">Twitter Theatre</a> <a class="filter" data-filter=".unknown-theatre" href="#">Unknown Theatre</a></div>

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

<div class="exp2-card" style="color:#444;">
  <figure id="embed_youtube" class="embed video youtube">
	<iframe width="560" height="315" src="http://www.youtube-nocookie.com/embed/<?php echo $firstVideoID; ?>?rel=0" frameborder="0" allowfullscreen></iframe>		
	</figure>
	<div style="padding: 1em;">
	  <h2>Talk Show</h2>
	  <p>Blurb about the talk show goes here</p>
	</div>
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