	</div><!-- end .main -->
	<div id="fb-root"></div>
	<?php $template = get_bloginfo('template_url'); /* Cache the url for the template to use for all the js calls. */ ?>
	
	<script>
		head.js(
		  { jquery:   '//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js' },
		  { main:     '<?php echo $template; ?>/js/scripts.js' },
			{ fitvids:  '//cdnjs.cloudflare.com/ajax/libs/fitvids/1.1.0/jquery.fitvids.min.js' },
			{ mapbox:   '//api.tiles.mapbox.com/mapbox.js/v1.5.1/mapbox.js' },
			{ twitter:  '//platform.twitter.com/widgets.js' },
			{ facebook: '//connect.facebook.net/en_US/all.js#xfbml=1&appId=220399704646080' }
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
	
<?php wp_footer(); ?>
</body>
</html>
