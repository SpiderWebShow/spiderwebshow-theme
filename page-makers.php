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
      	<h4>Sarah Garton Stanley</h4>
    	</a>
     	<p class="twitter"><a href="https://twitter.com/sarahgstanley">@SarahgStanley</a></p>
     	<strong>Co-Creator &amp; Artistic Director, SpiderWebShow</strong>
      <p>Sarah is the Associate Artistic Director @ <a href="http://nac-cna.ca/englishtheatre" title="NAC English Theatre">NAC English Theatre</a>. Originally from Montréal, she now lives between Ottawa and Kingston. She co-founded <a href="http://kingstongrand.ca/" title="The Baby Grand Theatre, Kingston">The Baby Grand Theatre</a> in Kingston,  co-created Women Making Scenes in Montréal, and Die in Debt Theatre in Toronto, (a ground-breaking company dedicated to large canvas altspace work).</p>
  		<p>Sarah is a former AD @<a href="http://buddiesinbadtimes.com/" title="Buddies in Bad Times">Buddies in Bad Times</a>, co-helmed the Directing Program @<a href="http://ent-nts.ca/en/" title="National Theatre School">National Theatre School</a> and is an adjunct @<a href="http://www.concordia.ca" title="Concordia University">Concordia University</a>. She creates work with Michael Rubenfeld like <em><a href="http://www.bookofjudith.com" title="The Book of Judith">The Book of Judith</a></em> and others at <a href="http://selfconscious.ca/" title="Selfconscious">Selfconscious</a>. Sarah oversees <a href="http://nac-cna.ca/en/englishtheatre/collaboration" title="#TheCollaborations at NAC">#TheCollaborations</a>.</p>
  	</div>
  	
  	<div class="creator-card">
    	<a href="http://spiderwebshow.ca/author/mwheeler">
      	<img src="//spiderwebshow.ca/wp-content/uploads/2013/08/Michael_Wheeler_Headshot-75x75.jpg" alt="Michael Wheeler" />
      	<h4>Michael Wheeler</h4>
    	</a>
     	<p class="twitter"><a href="https://twitter.com/michaelcwheeler">@MichaelcWheeler</a></p>
     	<strong>Co-Creator, SpiderWebShow &amp; Editor in Chief, <a href="/cdncult" title="#CdnCult Times">#CdnCult Times</a></strong>
      <p>Michael is a director, writer, social designer, and artistic director of Praxis Theatre. His work in performance is often integrated online through various tools including <a href="http://praxistheatre.com" title="Praxis Theatre">praxistheatre.com</a>, <a href="http://thewreckingball.ca" title="The Wrecking Ball">thewreckingball.ca</a>, and <a href="http://michaelcwheeler.com" title="Michael C. Wheeler's website">michaelcwheeler.com</a>.</p>
  		<p>Directing credits include the National Tour of <em>You Should Have Stayed Home</em>, <em>Jesus Chrysler</em>, <em>Section 98</em>, <em>Dyad</em> and <em>Steel</em>. Michael has been Co-Curator of the Freefall Festival at The Theatre Centre, a Neil Munro Intern Director at The Shaw Festival and is currently Guest Co-Curator of HATCH ’14 at Harbourfront Centre. Upcoming is <em>Rifles</em>, a new Brecht adaptation by Nicolas Billon at The Next Stage Festival in Toronto in January 2014.</p>
  	</div>
  	
  	<div class="creator-card">
    	<a href="http://spiderwebshow.ca/author/adriennewong">
      	<img src="//spiderwebshow.ca/wp-content/uploads/2013/11/074-IMG_4796-75x75.jpg" alt="Adrienne Wong" />
      	<h4>Adrienne Wong</h4>
    	</a>
     	<p class="twitter"><a href="https://twitter.com/adriennewong88">@AdrienneWong88</a></p>
     	<strong>Artistic Associate, SpiderWebShow &amp; Head Researcher, <a href="/experiments" title="SpiderWebShow Experiments">Experiments</a></strong>
  		<p>Adrienne is an artist interested in asking audiences to “re-see” and re-imagine the everyday. To date, most of Adrienne’s projects could be called theatre; located in actual theatres, on-site, soundwaves, or in purpose-built structures.</p>
  		<p>Projects with Neworld Theatre, where she is Associate Artist (previously Artistic Producer), include commissioning, developing and producing eleven "podplays" (site-specific audio plays); co-creating three <em>HIVE</em> presentations of installation theatre; <em>Placebook</em>, an analogue Facebook; <em>Landline</em>, a text-message performance for audience in different cities; and <em>Me On The Map</em>, a participatory show for kids about inclusive community-building. Adrienne is a member of PTC's Associates and a graduate of SFU’s School for the Contemporary Arts.</p>
  	</div>
  	
  	<div class="creator-card">
    	<a href="http://spiderwebshow.ca/author/laurelgreen">
      	<img src="http://spiderwebshow.ca/wp-content/uploads/2014/09/laurel-green-75x75.jpg" alt="Laurel Green" />
      	<h4>Laurel Green</h4>
    	</a>
     	<p class="twitter"><a href="https://twitter.com/lgyyc">@LGYYC</a></p>
     	<strong>Artistic Associate</strong><br>
  		<p>Laurel Green is Artistic Associate at <a href="http://www.atplive.com/">Alberta Theatre Projects</a> in Calgary (<a href="https://twitter.com/contemporaryATP">@contemporaryATP</a>), a dramaturg in new play development and the company’s literary manager. She creates and hosts events for ATP’s Exchange series, bringing together audiences and artists to explore and celebrate the art of theatre making.</p>
      <p>Laurel also works with: <a href="http://insideouttheatre.com/">Inside Out Theatre</a>’s Point of View Ensemble (<a href="https://twitter.com/IOT_YYC">@IOT_YYC</a>), Evergreen Theatre (<a href="https://twitter.com/Evergreen_Th">@Evergreen_Th</a>), mi casa theatre (<a href="https://twitter.com/micasatheatre">@micasatheatre</a>) &amp; Humble Wonder (<a href="https://twitter.com/humblewonder">@humblewonder</a>). She is a board member for the Literary Managers and Dramaturgs of the Americas (<a href="https://twitter.com/LMDAmericas">@LMDAmericas</a>) Canada chapter. She has a Masters degree in Drama from the University of Toronto, and this past summer she knit her first scarf.</p>
  	</div>
  	
    <div class="creator-card">
    	<a href="http://spiderwebshow.ca/author/gfscott">
      	<img src="//spiderwebshow.ca/wp-content/uploads/2013/08/gfs1-75x75.jpg" alt="Graham F. Scott" />
      	<h4>Graham F. Scott</h4>
    	</a>
     	<p class="twitter"><a href="https://twitter.com/gfscott">@gfscott</a></p>
     	<strong>Designer-Developer &amp; Digital Dramaturg</strong>
      <p>Graham is a Toronto editor, writer, and web designer. Recent projects of note include <a href="http://praxistheatre.com" title="Praxis Theatre">praxistheatre.com</a>, <a href="http://thewreckingball.ca" title="The Wrecking Ball">thewreckingball.ca</a>, and <a href="http://howlonghasrobfordbeenmayor.com" title="How Long Has Rob Ford Been Mayor?">HowLongHasRobFordBeen-Mayor.com</a>.</p>
  	</div>
  	
  	<div class="creator-card">
    	<a href="http://spiderwebshow.ca/author/simonbloom">
      	<img src="//spiderwebshow.ca/wp-content/uploads/2014/09/simonbloom-75x75.jpg" alt="Simon Bloom" />
      	<h4>Simon Bloom</h4>
    	</a>
     	<p class="twitter"><a href="https://twitter.com/SimonWBloom">@simonwbloom</a></p>
     	<strong>Designer-Developer &amp; Associate Digital Dramaturg</strong>
     	<p>Simon Bloom is a director, designer, web developer, co-Artistic Director of the Dora award winning theatre company <a href="http://www.outsidethemarch.ca/">Outside the March</a>, and co-founder of the Sterling award winning East/West Collective. He is deeply interested in the intersection between theatre and digital experiences.</p>
      <p>Recent directing credits include <em>East of Berlin</em> (Sterling Award, Outstanding Production & Outstanding Director), <em>Murderers Confess at Christmastime</em> (Outside the March), and <em>The Last Days of Judas Iscariot</em> (Studio Theatre). He is a graduate of the MFA Directing Program at the University of Alberta, and the Banff/Citadel Professional Theatre Program.</p>
      <p>Currently, Simon is working as a front-end web developer at the creative agency <a href="http://nascentdigital.com/">Nascent</a>, and is in pre-production for <em>Mr. Burns: A Post Electric Play</em>, Outside the March's upcoming show about the apocalypse and the Simpsons, which he will be co-direct with Mitchell Cushman.</p>
  	</div>
  	
	</div>
		
	<hr>
	
	<div class="pure-u-1">
		<p>The SpiderWebShow is produced by <a href="http://www.neworldtheatre.com/" title="Neworld Theatre">Neworld Theatre</a> in collaboration with <a href="http://praxistheatre.com/" title="Praxis Theatre">Praxis Theatre</a> and <a href="http://nac-cna.ca/englishtheatre" title="NAC English Theatre">The NAC English Theatre</a></p>
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