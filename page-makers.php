<?php get_header(); ?>
<div class="main_content stage pure-g-r">
	
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
		<div class="pure-u-1">
			<h1><?php the_title(); ?></h1>
		</div>
		<div class="pure-u-1">
		<?php the_content(); ?>
		</div>
		
	<?php endwhile; else: ?>
	<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
	<?php endif; // End standard wordpress loop. Custom loop fetches experiment list below ?>	

	<div id="makermap" class="pure-u-1" style="height:600px;"></div>
		
	<div class="pure-u-1-4">
		<h2><a href="https://twitter.com/sarahgstanley" title="Follow Sarah Garton Stanley on Twitter">@SarahgStanley</a></h2>
		<img src="<?php bloginfo('template_url'); ?>/img/sstanley-glitch-2.gif" alt="Sarah Garton Stanley" />
		<h3><em>Co-Creator &amp; Artistic Director, SpiderWebShow</em></h3>
		<p>Sarah is the Associate Artistic Director @ <a href="http://nac-cna.ca/englishtheatre" title="NAC English Theatre">NAC English Theatre</a>. Originally from Montréal, she now lives between Ottawa and Kingston. She co-founded <a href="http://kingstongrand.ca/" title="The Baby Grand Theatre, Kingston">The Baby Grand Theatre</a> in Kingston,  co-created Women Making Scenes in Montréal, and Die in Debt Theatre in Toronto, (a ground-breaking company dedicated to large canvas altspace work).</p>
		<p>Sarah is a former AD @<a href="http://buddiesinbadtimes.com/" title="Buddies in Bad Times">Buddies in Bad Times</a>, co-helmed the Directing Program @<a href="http://ent-nts.ca/en/" title="National Theatre School">National Theatre School</a> and is an adjunct @<a href="http://www.concordia.ca" title="Concordia University">Concordia University</a>. She creates work with Michael Rubenfeld like <em><a href="http://www.bookofjudith.com" title="The Book of Judith">The Book of Judith</a></em> and others at <a href="http://selfconscious.ca/" title="Selfconscious">Selfconscious</a>. Sarah oversees <a href="http://nac-cna.ca/en/englishtheatre/collaboration" title="#TheCollaborations at NAC">#TheCollaborations</a>.</p>
	</div>
	<div class="pure-u-1-4">
		<h2><a href="https://twitter.com/michaelcwheeler" title="Follow Michael Wheeler on Twitter">@MichaelcWheeler</a></h2>
		<img src="<?php bloginfo('template_url'); ?>/img/mwheeler-glitch-2.gif" alt="Michael Wheeler" />
		<h3><em>Co-Creator, SpiderWebShow &amp; Editor in Chief, <a href="/cdncult" title="#CdnCult Times">#CdnCult Times</a></em></h3>
		<p>Michael is a director, writer, social designer, and artistic director of Praxis Theatre. His work in performance is often integrated online through various tools including <a href="http://praxistheatre.com" title="Praxis Theatre">praxistheatre.com</a>, <a href="http://thewreckingball.ca" title="The Wrecking Ball">thewreckingball.ca</a>, and <a href="http://michaelcwheeler.com" title="Michael C. Wheeler's website">michaelcwheeler.com</a>.</p>
		<p>Directing credits include the National Tour of <em>You Should Have Stayed Home</em>, <em>Jesus Chrysler</em>, <em>Section 98</em>, <em>Dyad</em> and <em>Steel</em>. Michael has been Co-Curator of the Freefall Festival at The Theatre Centre, a Neil Munro Intern Director at The Shaw Festival and is currently Guest Co-Curator of HATCH ’14 at Harbourfront Centre. Upcoming is <em>Rifles</em>, a new Brecht adaptation by Nicolas Billon at The Next Stage Festival in Toronto in January 2014.</p>
	</div>
	<div class="pure-u-1-4">
		<h2><a href="https://twitter.com/AdrienneWong88" title="Follow Adrienne Wong on Twitter">@AdrienneWong88</a></h2>
		<img src="<?php bloginfo('template_url'); ?>/img/awong-glitch.gif" alt="Adrienne Wong" />
		<h3><em>Artistic Associate, SpiderWebShow &amp; Head Researcher, <a href="/experiments" title="SpiderWebShow Experiments">Experiments</a></em></h3>
		<p>Adrienne is an artist interested in asking audiences to “re-see” and re-imagine the everyday. To date, most of Adrienne’s projects could be called theatre; located in actual theatres, on-site, soundwaves, or in purpose-built structures.</p>
		<p>Projects with Neworld Theatre, where she is Associate Artist (previously Artistic Producer), include commissioning, developing and producing eleven "podplays" (site-specific audio plays); co-creating three <em>HIVE</em> presentations of installation theatre; <em>Placebook</em>, an analogue Facebook; <em>Landline</em>, a text-message performance for audience in different cities; and <em>Me On The Map</em>, a participatory show for kids about inclusive community-building. Adrienne is a member of PTC's Associates and a graduate of SFU’s School for the Contemporary Arts.</p>
	</div>
	<div class="pure-u-1-4">
		<h2><a href="https://twitter.com/gfscott" title="Follow Graham F. Scott on Twitter">@gfscott</a></h2>
		<img src="<?php bloginfo('template_url'); ?>/img/gfscott-glitch-2.gif" alt="Graham F. Scott" />
		<h3><em>Designer-Developer &amp; Digital Dramaturg</em></h3>
		<p>Graham is a Toronto editor, writer, and web designer. Recent projects of note include <a href="http://praxistheatre.com" title="Praxis Theatre">praxistheatre.com</a>, <a href="http://thewreckingball.ca" title="The Wrecking Ball">thewreckingball.ca</a>, and <a href="http://howlonghasrobfordbeenmayor.com" title="How Long Has Rob Ford Been Mayor?">HowLongHasRobFordBeenMayor.com</a>.</p>
	</div>
	
	<hr>
	
	<div class="pure-u-1">
		<p style="text-align:center">The SpiderWebShow is produced by <a href="http://www.neworldtheatre.com/" title="Neworld Theatre">Neworld Theatre</a> in collaboration with <a href="http://praxistheatre.com/" title="Praxis Theatre">Praxis Theatre</a> and <a href="http://nac-cna.ca/englishtheatre" title="NAC English Theatre">The NAC English Theatre</a></p>
	</div>
	
	<hr>
	
	<div class="pure-u-1">
	<p>So far the SpiderWebShow has incorporated the contributions of the following makers:</p>
	<?php // custom_wp_list_authors(); ?>
	<ul class="columnize">
	<?php
	    $blogusers = get_users();
	    foreach ($blogusers as $user) {
	        echo '<li><a href="' . get_author_posts_url($user->ID) . '" title="'.$user->display_name.'">' . $user->display_name . '</a></li>';
	    }
	?>
	</ul>
	
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
			//console.log(tooltips);
			
			//tooltips[0].openPopup();			
									
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