<?php get_header(); ?>


<section id="collaborations" class="stage map">
	<div class="overlay" style="padding:0 1em;margin:0 2em;background:rgba(0,0,0,0.6);">
		<h1 style="margin-bottom:0.2em;">Collaborations</h1>
		<?php $img_dir = get_bloginfo('template_url'); ?>
		<p><img src="<?php echo $img_dir ?>/img/pin-red.png" /> = 1.0 <img src="<?php echo $img_dir ?>/img/pin-green.png"/> = 2.0 <img src="<?php echo $img_dir ?>/img/pin-blue.png"/> = 3.0</p>
		<p class="intro-text" style="font-size:0.8em;">The NAC English Theatre is involved in a national development experiment. We are looking at ways to broaden our engagement with work being made across the country and how to invest in the most meaningful way possible, to the quality of work being created in Canada. Our hope is that by embarking on The Collaborations we will see, in the coming years, a season of plays selected -  in large part  - from the ever widening and deepening pool of our Collaborations. We are looking at the collaborations in terms of series. 1.0 being our first series and the numbers getting progressively higher as we take the experiment ever deeper into the future. For more information on this project you  can also <a href="http://nac-cna.ca/en/englishtheatre/collaboration" title="Visit the NAC's Collaboration page">visit the NAC&rsquo;s website</a>.</p>
		<a class="close-this" href="#close" style="color: #fff;text-decoration:none;float:right;font-size:0.8em"><i class="icon-collapse-top" style="font-size:1.2em"> hide</i></a>
	</div>
</section>


<script>
	function loadMapbox() {
		var theMap = L.mapbox.map('collaborations', 'spiderwebshow.map-q3k3yb2y', { zoomControl: false });
		new L.Control.Zoom({position:'topright'}).addTo(theMap);
		theMap.markerLayer.on('ready', function(e){
			
									
			var markers = [];
			var tooltips = [];
									
			this.eachLayer(function(marker){
				markers.push(marker.getLatLng());
				tooltips.push(marker);
			});
			console.log(tooltips);
			
			tooltips[0].openPopup();			
									
			$.each(markers, function(){
				var theMarker = this,
						lat = theMarker.lat,
						lng = theMarker.lng,
						coords = [
							[45.423169486430936, -75.69335460662842] // Location of NAC: [45.423169486430936, -75.69335460662842] -- this will always be the starting point of each polyline; the second subarray is the latlng for each project.
							];
				coords.push([lat, lng]);
				
				// helper function to produce random values used in randomizing colours
				function getRandom(min, max) {
			    return Math.floor(Math.random() * (max - min + 1)) + min;
				};
				
				var r, g, b, rgba, lineOpts;
				r = getRandom(100, 255).toString(16);
				g = getRandom(100, 255).toString(16);
				b = getRandom(100, 255).toString(16);
				rgb = '#'+r+g+b;
				
				lineOpts = {
					stroke: true,
					color: rgb,
					opacity: 0.6,
					fill: false
				};

				var drawLine = L.polyline(coords).setStyle(lineOpts);
				drawLine.addTo(theMap);
			});
		});
	};
	
	
	head.ready(function(){
		// Load the map
		loadMapbox();
		
		$('.close-this').on("click", function(e){
			e.preventDefault();
			$('.intro-text').slideUp();
			$(this).hide();
		});
	
	});
	
</script>

	
<?php get_footer(); ?>