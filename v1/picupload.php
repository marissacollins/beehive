<?php

ini_set('display_errors',1);
error_reporting(E_ALL);

$picnm = 'test';
$picsrc = 'c:/beehive/beehive/samplepic/2014.04.23.16.40.jpg';
$picroot = "population";
$error = "";
$output = "";

        //set POST variables
        $url = "http://localhost/v1/uploadPic";

        $picname = $picroot . "_" . date('YmdGisu') . "_" . $picnm . ".jpg";
        
        // Create a CURLFile object
        $cfile = curl_file_create($picsrc,'image/jpeg',$picname);

        $fields = array(
            'test_file' => $cfile
        );

        //open connection
        $curl = curl_init();

        //set the url, number of POST vars, POST data
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_VERBOSE, 1);
        curl_setopt($curl, CURLOPT_SAFE_UPLOAD, false);
        curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible;)");
        curl_setopt($curl, CURLINFO_HEADER_OUT, true);
        curl_setopt($curl,CURLOPT_URL,$url);
        curl_setopt($curl,CURLOPT_POST,true);
        curl_setopt($curl,CURLOPT_POSTFIELDS,$fields);
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);

        //execute post
        $json_response = curl_exec($curl);
 //       if($output == false)
 //           $error = "Fail.";
 //       echo "{error: '". $error ."', msg: '" . $output . "'}";

        $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $headout = curl_getinfo($curl, CURLINFO_HEADER_OUT);
        echo "showing response header out\n";
        var_dump($headout);

        if ( $status != 201 ) {
            die("Error: call to URL $url failed with status $status, response $json_response, curl_error " . curl_error($curl) . ", curl_errno " . curl_errno($curl));
        }
        
        //close connection
        curl_close($curl);
        $response = json_decode($json_response, true);
        echo "showing response\n";
        var_dump($response);

?>