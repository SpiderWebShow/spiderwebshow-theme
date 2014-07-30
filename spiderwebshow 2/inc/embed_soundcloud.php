<?php

$soundcloud_embed = "soundcloud_embed.php";

//================================
// DEFINE FUNCTION TO GET FEED
//================================

function get_soundcloud_feed() {

	//================================
	// FILE AND FEED SETTINGS
	//================================
		
		// API query with username injected
		$soundcloud_query = "https://api.soundcloud.com/users/spiderweb-show/tracks.json?client_id=3f356f314a7dde49074ede79efb447b2";
		// set the name of the JSON cache file name
		$jsoncache = "soundcloud_cache.json";
		global $soundcloud_embed;
	
	//================================
	// FETCHING WITH CURL
	//================================
		// initiate curl session
		$getSC = curl_init($soundcloud_query);
		// open a json file to dump the response into
		$cachedSC = fopen($jsoncache, "w");
		
		// set the options: get the feed from youtube, save it as a file, put it in yt.json.
		curl_setopt($getSC, CURLOPT_FILE, $cachedSC);
		// set whether to include header information; seems not to be necessary, so commented out for now.
		// curl_setopt($getYT, CURLOPT_HEADER, 0);
		
		// execute the request
		curl_exec($getSC);
		// close the session
		curl_close($getSC);
		// close the json file
		fclose($cachedSC);
	
	
	//================================
	// PARSE JSON	INTO ARRAY
	//================================
	
		$lump = file_get_contents($jsoncache);
		$parselump = json_decode($lump, true);
		
		$trackURL = $parselump[0][uri];			

	//=================================
	// Output Soundcloud Embed HTML 	
	//=================================
	
		$output = '<iframe class="iframe" width="100%" height="166" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=' . $trackURL . '&amp;auto_play=false&amp;auto_advance=false&amp;buying=false&amp;liking=false&amp;download=false&amp;sharing=true&amp;show_artwork=false&amp;show_comments=false&amp;show_playcount=false&amp;show_user=true&amp;start_track=0&amp;callback=true" data-cache="1"></iframe>';
		file_put_contents($soundcloud_embed, $output);

		echo '<iframe class="iframe" width="100%" height="166" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=' . $trackURL . '&amp;auto_play=false&amp;auto_advance=false&amp;buying=false&amp;liking=false&amp;download=false&amp;sharing=true&amp;show_artwork=false&amp;show_comments=false&amp;show_playcount=false&amp;show_user=true&amp;start_track=0&amp;callback=true" data-cache="0"></iframe>';
	};



//================================
// CHECK FOR CACHED EMBED FILE
//================================

if (file_exists($soundcloud_embed)) { // 1. if cache file exists use it.
	
	// get the age of the file and define the desired freshness.
	// current time minus the time the file was last modified
	$file_age = time() - filemtime($soundcloud_embed);
	// time limit to check against. In this case 1800 seconds, or 30 minutes.
	$expires = 1800;
	
	// if the file's age in seconds is larger than the expiry deadline in seconds, then the cache is out of date, so call the API function
	if ( $file_age > $expires ) {
		
		get_soundcloud_feed();
	
	// but if the file's age in seconds is smaller than the expiry age, just spit out the cache contents		
	} else {
		
		$contents = file_get_contents($soundcloud_embed);
		echo $contents;
		
	}

// if the file didn't exist in the first place, call the API function.	
} else { get_soundcloud_feed(); } // 1. if cache file doesn't exist, call the function


?>