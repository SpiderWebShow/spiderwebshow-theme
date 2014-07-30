	</div><!-- end .main -->
	<div id="fb-root"></div>
	<?php $template = get_bloginfo('template_url'); /* Cache the url for the template to use for all the js calls. */ ?>
	
	<script>
		head.js({ jquery: '//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js'},
						'<?php echo $template; ?>/js/scripts.js',
						'<?php echo $template; ?>/js/jquery.parallax.min.js',
						//{ soundjs: '//code.createjs.com/soundjs-0.5.2.min.js' },
						'<?php echo $template; ?>/js/fitvids.js',
						//{ soundmanager: '<?php echo $template; ?>/js/soundmanager2/script/soundmanager2-jsmin.js' },
						'<?php echo $template; ?>/js/maskedinput.min.js',
						'//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js',
						//'//cdnjs.cloudflare.com/ajax/libs/jquery-timeago/1.1.0/jquery.timeago.min.js',
						'//api.tiles.mapbox.com/mapbox.js/v1.5.1/mapbox.js',
						'//platform.twitter.com/widgets.js',
						'//connect.facebook.net/en_US/all.js#xfbml=1&appId=220399704646080'
						);
	</script>
	<!-- Google Analytics	 -->
	<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-542016-12', 'spiderwebshow.ca');
  ga('send', 'pageview');

</script>

<?php if(is_home()){ ?>
	<script src="<?php echo $template; ?>/js/soundmanager2/script/soundmanager2-jsmin.js"></script>
	<script>
		head.ready('jquery', function(){
			soundManager.setup({
				//debugMode: true,
				//debugFlash: true,
				url: "<?php bloginfo('template_url'); ?>/js/soundmanager2/swf/",
				//flashLoadTimeout: 0,
				
				onready: function(){
					var soundCloudQuery = 'http://api.soundcloud.com/users/spiderweb-show/tracks.json?client_id=3f356f314a7dde49074ede79efb447b2&limit=1';
					$.getJSON(soundCloudQuery, function(data){
						var streamUrl = data[0].stream_url + '?client_id=3f356f314a7dde49074ede79efb447b2';
						
						var audio_control_button = $('#autotune_control_button');
						var audio_status = audio_control_button.children('i');
							audio_status.removeClass('icon-ellipsis-horizontal').addClass('icon-play');
						
						var mySound = soundManager.createSound({
							url: streamUrl,
							autoload: true,
							onfinish: function() {
								$('#autotune_control_button i').toggleClass('icon-play').toggleClass('icon-pause');
							},
						});
						
						audio_control_button.on('click', function(){
							event.preventDefault();
							var thisbutton = $(this);
							thisbutton.toggleClass('playing').toggleClass('stopped');
							audio_status.toggleClass('icon-pause').toggleClass('icon-play');
							mySound.togglePause('aSound');							
						});
					});
	
				},
				
				ontimeout: function(){
					console.log("soundManager timed out");
				}
				
				
			});
		});
	</script>
	
<?php }?>
	
<?php wp_footer(); ?>
</body>
</html>
