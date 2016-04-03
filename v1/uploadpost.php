<?php 
//with xampp php installed, open a cmdshell and run php uploadpost.php to send a test json to the beehive backend
// make sure windows path has php eq. c:\xampp\php

$string = file_get_contents("c:/beehive/beehive/samplejson/set1/audiodistribution.json");
echo "showing string\n";
var_dump($string);

$json_a = json_decode($string, true);
echo "showing json\n";
var_dump($json_a);

$url = "http://localhost/v1/uploadStream?hiveid=2";
$content = json_encode($json_a);

//commandline way to call http services
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_HEADER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_VERBOSE, true);
curl_setopt($curl, CURLOPT_HTTPHEADER,
        array("Content-type: application/json"));
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $content);

//execute the request to the server and store reponse in json variable
$json_response = curl_exec($curl);

$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

if ( $status != 201 ) {
    die("Error: call to URL $url failed with status $status, response $json_response, curl_error " . curl_error($curl) . ", curl_errno " . curl_errno($curl));
}


curl_close($curl);

$response = json_decode($json_response, true);
echo "showing response\n";
var_dump($response);



?>