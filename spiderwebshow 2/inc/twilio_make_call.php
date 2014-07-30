<?php

$callee = $_POST["phone"];

// Load the Twilio helper library
require_once('twilio-php/Services/Twilio.php');

// Your Account Sid and Auth Token from twilio.com/user/account
$sid = "AC732be5da15ae5695c3dde4cad7604b07"; 
$token = "181e37cc27d245d6ca6ad4d7f67fd2f6"; 
$client = new Services_Twilio($sid, $token);

$call = $client->account->calls->create("+16136049911", $callee, "http://spiderwebshow.ca/wp-content/themes/spiderwebshow/inc/twilio_get_soundcloud.php", array());
echo $call->sid;


?>