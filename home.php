<?php get_header(); ?>

<div class="main_content">
	
		<h1>Welcome to the SpiderWebShow</h1>
		<p>A theatrical space where Canada, the Internet and performance minds intersect.</p>
		
		<p>
		  <div style="float:left;">
		    <a href="https://twitter.com/spiderwebshow" class="twitter-follow-button" data-show-count="false" data-lang="en">Follow @SpiderWebShow</a>
		  </div> &nbsp;
		  <div class="fb-like" data-href="https://www.facebook.com/PraxNACspiderwebshow" data-width="" data-height="" data-colorscheme="light" data-layout="button_count" data-action="like" data-show-faces="false" data-send="false" style="margin-left: 1em; float:left;">
		  </div>
		</p>

    <div class="directory">
      <?php dynamic_sidebar( 'front-page' ); // This is a dynamic sidebar widget area that displays only on the homepage. Controlled from the Widgets dashboard. Accepts plain text and html ?>
    </div>

<script>

head.ready('jquery', function(){  
  head.load('//cdnjs.cloudflare.com/ajax/libs/jquery.isotope/1.5.25/jquery.isotope.min.js', function(){
    var container = $('.directory');
    // init isotope
    container.isotope({
      itemSelector: '.directory-card',
      layoutMode: 'masonry'
    });      
  });
  
  head.ready('fitvids', function(){
    $('.video').fitVids();
  });
  
});

</script>

<?php get_footer(); ?>
