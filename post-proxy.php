<?php

/**
 * Accepts Post form variables passes them to the endpoint 
 * and returns response as it was returned from endpoint
 */

$endpoint = "";

if(isset($_POST) && !empty($_POST)) {

	$postVars = $_POST;

	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL, $endpoint);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postVars));
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
   
	// Receive server response
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$server_output = curl_exec ($ch);

	// Close
	curl_close ($ch);

	// Return response
	echo $server_output;

} else
	die("No data has been provided.");
	
?>