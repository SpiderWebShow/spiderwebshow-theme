<?php get_header(); ?>
<div class="main_content stage vertical_experiments pure-g-r">
	
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
	<div class="pure-u-1">
		<p><a href="/experiments" title="See all experiments">&laquo; Back to experiments</a></p>
		
		<?php if( has_term('podcasts', 'laboratory')) { ?>
	
			<p style="text-align:right;"><a href="//smallwoodenshoe.org/swspc-feed?format=rss" style="background:orange;color:#000;padding:0.1em 0.3em;border-radius: 0.2em;text-decoration:none;"><i class="icon-rss-sign"></i> Subscribe to the podcast in RSS</a>&nbsp;<a href="https://itunes.apple.com/ca/podcast/sws-podcast-small-wooden-shoe/id812260853" style="background:#444;color:#fff;padding:0.1em 0.3em;border-radius: 0.2em;text-decoration:none;"><i class="icon-apple"></i> Subscribe in iTunes</a></p>
		
		<?php } ?>
			
		<h1><?php the_title(); ?></h1>
	</div>
	<div class="pure-u-1">
		<?php the_content(); ?>

	</div>
	
	
	<?php endwhile; else: ?>
	<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
	<?php endif; ?>

</div>

<style>
	.gallery-item {
		float:left;
	}
</style>

<script>
	head.ready('jquery', function(){
		
		var galleryItems = $('div.gallery-item');
		
		if(galleryItems){
			
			head.load('//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js', '//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css',  function(){
				
				$('.gallery-icon a').fancybox();
				
			});
			
		}
		
		
	});
</script>

<?php get_footer(); ?>