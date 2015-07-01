<?php get_header(); ?>
<div class="main_content pure-g-r">
	
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
		<div class="pure-u-1">
			<h1><?php the_title(); ?></h1>
		</div>
		<div class="pure-u-1">
		<?php the_content(); ?>
		</div>
		
	<?php endwhile; else: ?>
	<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
	<?php endif; // End standard wordpress loop. ?>	
	
	<div class="pure-u-1">
  	<div id="makermap" style="height:600px;">
      <!-- MapBox map placeholder div -->	
  	</div>
	</div>
	
	<div class="pure-u-1">
	  
	  <div class="creator-card">
    	<a href="http://spiderwebshow.ca/author/sstanley">
      	<img src="//spiderwebshow.ca/wp-content/uploads/2014/09/sarah-garton-stanley-75x75.jpg" alt="Sarah Garton Stanley" />
      	<p>Sarah Garton Stanley</p>
    	</a>
      	<p class="twitter"><a href="https://twitter.com/sarahgstanley">@SarahgStanley</a></p>
      <p class="title">Co-Creator &amp; Artistic Director, SpiderWebShow</p>
      <p class="location">Kingston/Ottawa</p>
    	</a>
	  </div>
  	
  	<div class="creator-card">
    	<a href="http://spiderwebshow.ca/author/mwheeler">
      	<img src="//spiderwebshow.ca/wp-content/uploads/2013/08/Michael_Wheeler_Headshot-75x75.jpg" alt="Michael Wheeler" />
      	<p>Michael Wheeler</p>
    	</a>
     	<p class="twitter"><a href="https://twitter.com/michaelcwheeler">@MichaelcWheeler</a></p>
     	<p class="title">Co-Creator, SpiderWebShow &amp; Editor in Chief, <a href="/cdncult" title="#CdnCult Times">#CdnCult Times</a></p>
     	<p class="location">Toronto</p>
  	</div>
  	
  	<div class="creator-card">
    	<a href="http://spiderwebshow.ca/author/adriennewong">
      	<img src="//spiderwebshow.ca/wp-content/uploads/2013/11/074-IMG_4796-75x75.jpg" alt="Adrienne Wong" />
      	<p>Adrienne Wong</p>
    	</a>
     	<p class="twitter"><a href="https://twitter.com/adriennewong88">@AdrienneWong88</a></p>
     	<p class="title">Artistic Associate &amp; Head Researcher</p>
     	<p class="location">Ottawa/Vancouver</p>
  	</div>
  	
  	<div class="creator-card">
    	<a href="http://spiderwebshow.ca/author/laurelgreen">
      	<img src="http://spiderwebshow.ca/wp-content/uploads/2014/09/laurel-green-75x75.jpg" alt="Laurel Green" />
      	<p>Laurel Green</p>
    	</a>
     	<p class="twitter"><a href="https://twitter.com/lgyyc">@LGYYC</a></p>
     	<p class="title">Artistic Associate</p>
     	<p class="location">Calgary</p>
  	</div>
  	
    <div class="creator-card">
    	<a href="http://spiderwebshow.ca/author/gfscott">
      	<img src="//spiderwebshow.ca/wp-content/uploads/2013/08/gfs1-75x75.jpg" alt="Graham F. Scott" />
      	<p>Graham F. Scott</p>
    	</a>
     	<p class="twitter"><a href="https://twitter.com/gfscott">@gfscott</a></p>
     	<p class="title">Designer-Developer &amp; Digital Dramaturg</p>
     	<p class="location">Toronto</p>
  	</div>
  	
  	<div class="creator-card">
    	<a href="http://spiderwebshow.ca/author/simonbloom">
      	<img src="//spiderwebshow.ca/wp-content/uploads/2014/09/simonbloom-75x75.jpg" alt="Simon Bloom" />
      	<p>Simon Bloom</p>
    	</a>
     	<p class="twitter"><a href="https://twitter.com/SimonWBloom">@simonwbloom</a></p>
     	<p class="title">Designer-Developer &amp; Associate Digital Dramaturg</p>
     	<p class="location">Toronto</p>
   	</div>

  <div class="creator-card">
    	<a href="http://spiderwebshow.ca/author/claytonbaraniuk">
      	<img src="http://spiderwebshow.ca/wp-content/uploads/2014/12/Clayton-75x75.jpg" alt="Clayton Baraniuk" />
      	<p>Clayton Baraniuk</p>
    	</a>
      <p class="twitter"><a href="https://twitter.com/Claybee">@Claybee</a></p>
      <p class="title">Associate Producer</p>
      <p class="location">Ottawa/Victoria</p>
 	</div>
   	
  <div class="creator-card">
    	<a href="http://spiderwebshow.ca/author/alisonbowie">
      	<img src="http://spiderwebshow.ca/wp-content/uploads/2015/05/Headshot-2015sm-75x75.jpeg" alt="Alison Bowie" />
      	<p>Alison Bowie</p>
    	</a>
      <p class="twitter"><a href="https://twitter.com/ajbowie1984">@ajbowie1984</a></p>
      <p class="title">Associate Dramaturg</p>
      <p class="location">Montreal</p>
 	</div>
  	
	</div>
		
	<hr>
	
	<div class="pure-u-1">
		<p>The SpiderWebShow is produced by <a href="http://www.neworldtheatre.com/" title="Neworld Theatre">Neworld Theatre</a> in collaboration with <a href="http://praxistheatre.com/" title="Praxis Theatre">Praxis Theatre</a>, <a href="http://nac-cna.ca/englishtheatre" title="NAC English Theatre">The NAC English Theatre</a> and <a href="http://atplive.com/" title="Alberta Theatre Projects">Alberta Theatre Projects</a>.</p>
	</div>
	
	<hr>
	
	<div class="pure-u-1">
	<h1>Contributors</h1>
	<p>So far the SpiderWebShow has incorporated the contributions of the following makers:</p>
	
	<?php
		// Get the complete list of authors
	    $makers = get_users();
	    // Loop through the list and fetch the basic information for each user account
	    foreach ($makers as $maker) {
        $maker_ID = $maker->ID; // User ID
        $maker_name = $maker->display_name; // Display Name
        $maker_link = get_author_posts_url($maker_ID); // Link to author page 
        $maker_img = types_render_usermeta_field( "author-photo", array("raw"=>"true", "user_id" => $maker_ID)); // URL for author image, custom field
    		$maker_twitter = types_render_usermeta_field( "twitter-handle", array("raw"=>"true", "user_id" => $maker_ID)); // artist twitter handle, custom field

    			// Scrub any stray "@" symbols from the handle to keep the data clean here, regardless of how it was entered in the database
    			// preg_replace($patternToFind, $patternToReplace, $stringToOperateOn);
    			$maker_twitter = preg_replace("/(@)/", "", $maker_twitter);

        if($maker_img){
  				// If there is a user photo on file, replace the full-sized image URL with the 75px-square one
  				$findImgExt = "/(\.jpg|\.jpeg|\.png)$/";
  				$addThumbDimension = "-75x75$1";
  				$maker_img = preg_replace($findImgExt, $addThumbDimension, $maker_img);
			} else { 
				// If there is no image, substitute a placeholder
				$maker_img = "http://placehold.it/75x75&text=No+Photo";			
			}						
  ?>
	 
	<a class="maker-card" href="<?php echo $maker_link; ?>" title="See <?php echo $maker_name; ?>'s SpiderWebShow profile page">
		<img src="<?php echo $maker_img; ?>" alt="Small headshot of <?php echo $maker_name; ?>">
		<p><?php echo $maker_name; ?></p>
		<?php if($maker_twitter) { ?><p class="twitter">@<?php echo $maker_twitter ?></p><?php } ?>
	</a>
	 
	 <?php } ?>
	
	</div>


	
</div>
<script>
	function loadMapbox() {
		var theMap = L.mapbox.map('makermap', 'spiderwebshow.map-asrom3ea', { zoomControl: false });
		new L.Control.Zoom({position:'topright'}).addTo(theMap);
		theMap.markerLayer.on('ready', function(e){
									
			var markers = [];
			var tooltips = [];
									
			this.eachLayer(function(marker){
				markers.push(marker.getLatLng());
				tooltips.push(marker);
			});			
									
			$.each(markers, function(){
				var theMarker = this,
						lat = theMarker.lat,
						lng = theMarker.lng,
						coords = [
							[45.424748, -75.699578] // Location of Peace Tower in Ottawa: [45.424748, -75.699578] -- this will always be the starting point of each polyline; the second subarray is the latlng for each project.
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
	
	});
</script>



<?php get_footer(); ?>