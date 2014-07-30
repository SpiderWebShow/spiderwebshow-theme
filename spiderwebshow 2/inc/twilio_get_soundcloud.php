<?php 
	$soundcloud_query = "http://api.soundcloud.com/users/spiderweb-show/tracks.json?client_id=3f356f314a7dde49074ede79efb447b2";
	
	//================================
	// FETCHING WITH CURL
	//================================
		// initiate curl session
		$getSC = curl_init($soundcloud_query);
		
		// curl options
		$options = array(
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_HTTPHEADER => array('Content-type: application/json') ,
		);
		
		// set the options: get the feed from youtube, save it as a file, put it in yt.json.
		curl_setopt_array($getSC, $options);
		
		// execute the request
		$response = curl_exec($getSC);
		
		// Decode the JSON response
		$data = json_decode($response);
		
		// Isolate just the URI for the sound
		$mp3 = $data[0]->stream_url;
		
		// close the curl session
		curl_close($getSC);
		

	//================================
	// OUTPUT TWIML
	//================================
		
		// establish header attributes and specify XML output
    header("content-type: text/xml");
    echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";

// Echo response as TwiML

?>
<Response>
  <Play><?php echo($mp3 . '?client_id=3f356f314a7dde49074ede79efb447b2'); ?></Play>
</Response>