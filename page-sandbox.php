<?php get_header(); ?>
<div class="main_content">
	

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
	<h1><?php the_title(); ?></h1>
	
	<?php the_content(); ?>
	
	
	<?php endwhile; else: ?>
	<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
	<?php endif; ?>	

<style>
	#autotune_control_button {
		color: red;
		text-decoration: none;
	}
</style>

<div class="pure-g-r">
	<div id="autotune" class="pure-u-1-3 jillian-form">
		<h4 style="margin:1em 0 0;padding:0;"><span style="text-transform:uppercase;">Thought Residencies</span><br>Resident Thinker for January:</h4>
		<h2 style="margin:0;padding:0;"><a href="/residency">Guillermo Verdecchia</a></h2>
		<p>Click to hear the latest from our resident thinker.</p>
		<a href="#" id="autotune_control_button" style="font-size:3em;"><i class="icon-ellipsis-horizontal"></i></a>
	</div>
</div>

<script>
head.ready('jquery', function(){
	head.ready('soundmanager', function(){
						
		soundManager.setup({
			debugMode: true,
			debugFlash: true,
			url: "<?php bloginfo('template_url'); ?>/js/soundmanager2/swf/",
			flashLoadTimeout: 0,
			
			onready: function(){
				console.log("soundManager loaded");
			},
			
			ontimeout: function(){
				console.log("soundManager timed out");
			}
			
			
		});
		
		
		
		/*
soundManager.setup({
		
			url: '<?php bloginfo('template_url'); ?>/js/soundmanager2/swf/',
			flashLoadTimeout: 10000,
			
			onready: function() {
				var mySound = soundManager.createSound({
					url: 'https://api.soundcloud.com/tracks/134645988/stream?client_id=3f356f314a7dde49074ede79efb447b2'
				});
				mySound.play();
			},
			
			ontimeout: function() {
			console.log('SoundManager2 timed out'); // Hrmm, SM2 could not start. Missing SWF? Flash blocked? Show an error, etc.?
			}
		});
*/
		
	});
});
</script>






<script>

/*
head.ready('jquery', function(){
	head.load('<?php bloginfo('template_url'); ?>/js/soundmanager2/script/soundmanager2-jsmin.js', function(){
		
		console.log('jQuery then soundmanager loaded');
		
		var mySound = soundManager.createSound({
				      id: 'aSound',
				      url: 'http://api.soundcloud.com/tracks/134645988/stream?client_id=3f356f314a7dde49074ede79efb447b2',
				      autoload: true,
				      autoplay: false,
				      onfinish: function() {
					      $('#autotune_control_button i').toggleClass('icon-play').toggleClass('icon-pause');
				      }
				    });
				
				var audio_control_button = $('#autotune_control_button');
				var audio_status = audio_control_button.children('i');
				
				audio_control_button.on('click', function(){
					event.preventDefault();
					var thisbutton = $(this);
					thisbutton.toggleClass('playing').toggleClass('stopped');
					audio_status.toggleClass('icon-pause').toggleClass('icon-play');
					mySound.togglePause('aSound');							
				});
			  
		  });
		  			
	});
*/

	/*
head.ready(["jquery", "soundjs"], function(){
		
	});	
*/
	
	
</script>





<script>
/*
head.ready('jquery', function(){
	head.load('<?php bloginfo('template_url'); ?>/js/soundmanager2/script/soundmanager2.js', function(){
		
			soundManager.setup({
			  url: '<?php bloginfo('template_url'); ?>/js/soundmanager2/swf/soundmanager2_debug.swf',
			  
			  onready: function() {
				  
				  var mySound = soundManager.createSound({
					      id: 'aSound',
					      url: 'http://api.soundcloud.com/tracks/134645988/stream?client_id=3f356f314a7dde49074ede79efb447b2',
					      autoload: true,
					      autoplay: false,
					      onfinish: function() {
						      $('#autotune_control_button i').toggleClass('icon-play').toggleClass('icon-pause');
					      },
					      				      
					    });
					    
				var audio_control_button = $('#autotune_control_button');
				var audio_status = audio_control_button.children('i');
				
				audio_control_button.on('click', function(){
					event.preventDefault();
					var thisbutton = $(this);
					thisbutton.toggleClass('playing').toggleClass('stopped');
					audio_status.toggleClass('icon-pause').toggleClass('icon-play');
					mySound.togglePause('aSound');							
				});
				  
			  },
			  
			  ontimeout: function() {
			    console.log('SoundManager2 timed out'); // Hrmm, SM2 could not start. Missing SWF? Flash blocked? Show an error, etc.?
			  }
			});
			

		});
});
*/
</script>




<!-- Last Autotune update script -->
<script>

	/*

		function lastAutotuneCall(){
		// get the date and time of the last Autotune update by querying the SoundCloud API
		var soundcloudQuery = "https://api.soundcloud.com/users/spiderweb-show/tracks.json?limit=1&client_id=3f356f314a7dde49074ede79efb447b2";
		
		$.getJSON(soundcloudQuery, function(data){
			
			var uploadTime = data[0].created_at;
			var theAbbr = $('<abbr/>');
			var howLongAgo = $.timeago(uploadTime);
			
				
			$('#autotune').append(howLongAgo);
			
		});		
				
	};
	
	function autotuneTimeAgo() {
		
		var timeposted = $('#autotune').data('upload-time');
		console.log(timeposted);
		
	};	
	
	*/
	
	// function to return rounded random numbers.
	function getRandom(min, max) {
		return Math.round(Math.random() * (max - min) + min);
	};
	
	
	/* Randomly color the #autotune call background, no alpha */
	function autotuneColor() {
		var r,g,b,a,colorString;
		r = getRandom(155, 255);
		g = getRandom(155, 255);
		b = getRandom(155, 255);
		colorString = 'background-color:rgb('+ r +','+ g +','+ b +')';
		// console.log(colorString);
		
		$('#autotune').attr('style',colorString);
	};
	
	
		head.ready(function(){
			autotuneColor();
		});	
	
	</script>










	
</div>
<?php get_footer(); ?>