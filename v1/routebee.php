<?php

//Gets are reading from the database
$app->get('/bees',   function() use($app) {
	$response = array();
	$db = new BeeDbHandler();
	$result = $db->getAllBeehives();
	$response["error"] = false;
	$response["HivesList"] = array();

	// looping through result and preparing  arrays
	while ($slist = $result->fetch_assoc()) {
        $tmp = array();
        if (count($slist) > 0) {
            $tmp["name"] = (empty($slist["name"]) ? "NULL" : $slist["name"]);
            $tmp["temp"] = (empty($slist["temp"]) ? "NULL" : $slist["temp"]);
            $tmp["weight"] = (empty($slist["weight"]) ? "NULL" : $slist["weight"]);
            $tmp["humidity"] =  (empty($slist["humidity"]) ? "NULL" : $slist["humidity"]);
            $tmp["datetime"] =  (empty($slist["datetime"]) ? "NULL" : $slist["datetime"]);
            $tmp["id"] =  (empty($slist["id"]) ? "NULL" : $slist["id"]);
            $tmp["hiveid"] =  (empty($slist["hiveID"]) ? "NULL" : $slist["hiveID"]);
        } 
		else {
            $tmp["id"] = "NULL";
		}
		array_push($response["HivesList"], $tmp);
    }
	$row_cnt = $result->num_rows;
	if ($result != NULL) {
		$response["error"] = false;
		echoRespnse(200, $response);
	}		
	else {
		$response["error"] = true;
		$response["message"] = "The requested resource doesn't exists";
		echoRespnse(404, $response);
	}
});
$app->get('/hivelist',   function() use($app) {
	$response = array();
	$db = new BeeDbHandler();
	$result = $db->getHiveList();
	$response["error"] = false;
	$response["HiveIdList"] = array();
// looping through result and preparing  arrays
	while ($slist = $result->fetch_assoc()) {
        $tmp = array();
        if (count($slist) > 0) {
            $tmp["hiveid"] =  (empty($slist["hiveid"]) ? "NULL" : $slist["hiveid"]);
            $tmp["name"] = (empty($slist["name"]) ? "NULL" : $slist["name"]);
        } 
		else {
            $tmp["hiveid"] = "NULL";
		}
		array_push($response["HiveIdList"], $tmp);
    }
	$row_cnt = $result->num_rows;
	if ($result != NULL) {
		$response["error"] = false;
		echoRespnse(200, $response);
	}		
	else {
		$response["error"] = true;
		$response["message"] = "The requested resource doesn't exists";
		echoRespnse(404, $response);
	}
});
$app->get('/populations',   function() use($app) {
 $allGetVars = $app->request->get();
    error_log( print_R("populations entered:\n ", TRUE), 3, LOG);
    error_log( print_R($allGetVars, TRUE), 3, LOG);
    $thelimit = '';
	$thehive = '';
    
    if(array_key_exists('thelimit', $allGetVars)){
        $thelimit = $allGetVars['thelimit'];
    }
    error_log( print_R("populations params:  thelimit: $thelimit \n ", TRUE), 3, LOG);
	
	 if(array_key_exists('thehive', $allGetVars)){
        $thehive = $allGetVars['thehive'];
    }
    error_log( print_R("populations params:  thehive: $thehive \n ", TRUE), 3, LOG);
	
    $response = array();
    $db = new BeeDbHandler();

    $result = $db->getPopulation($thelimit, $thehive);

    $response["error"] = false;
    $response["PopulationList"] = array();

    // looping through result and preparing  arrays
    while ($slist = $result->fetch_assoc()) {
        $tmp = array();
        if (count($slist) > 0) {
            $tmp["count"] = (empty($slist["count"]) ? "NULL" : $slist["count"]);
            $tmp["datetime"] =  (empty($slist["datetime"]) ? "NULL" : $slist["datetime"]);
            $tmp["id"] =  (empty($slist["id"]) ? "NULL" : $slist["id"]);
			   $tmp["hiveid"] =  (empty($slist["hiveID"]) ? "NULL" : $slist["hiveID"]);

        } else {
            $tmp["id"] = "NULL";

}
        array_push($response["PopulationList"], $tmp);
    }
    
    $row_cnt = $result->num_rows;

    if ($result != NULL) {
        $response["error"] = false;
        echoRespnse(200, $response);
    } else {
        $response["error"] = true;
        $response["message"] = "The requested resource doesn't exists";
        echoRespnse(404, $response);
    }
});
$app->get('/outsidetemp',   function() use($app) {
	

 $allGetVars = $app->request->get();
    error_log( print_R("outsidetemp entered:\n ", TRUE), 3, LOG);
    error_log( print_R($allGetVars, TRUE), 3, LOG);
    $thelimit = '';
    
    if(array_key_exists('thelimit', $allGetVars)){
        $thelimit = $allGetVars['thelimit'];
    }
    error_log( print_R("outsidetemp params:  thelimit: $thelimit \n ", TRUE), 3, LOG);
	
    $response = array();
    $db = new BeeDbHandler();

    $result = $db->getOutsideTemp($thelimit);

    $response["error"] = false;
    $response["OutsideTempList"] = array();

    // looping through result and preparing  arrays
    while ($slist = $result->fetch_assoc()) {
        $tmp = array();
        if (count($slist) > 0) {
            $tmp["temp"] = (empty($slist["temp"]) ? "NULL" : $slist["temp"]);
			$tmp["humidity"] = (empty($slist["humidity"]) ? "NULL" : $slist["humidity"]);
            $tmp["datetime"] =  (empty($slist["datetime"]) ? "NULL" : $slist["datetime"]);
            $tmp["id"] =  (empty($slist["id"]) ? "NULL" : $slist["id"]);

        } else {
            $tmp["id"] = "NULL";

}
        array_push($response["OutsideTempList"], $tmp);
    }
    
    $row_cnt = $result->num_rows;

    if ($result != NULL) {
        $response["error"] = false;
        echoRespnse(200, $response);
    } else {
        $response["error"] = true;
        $response["message"] = "The requested resource doesn't exists";
        echoRespnse(404, $response);
    }
});
$app->get('/hivetemp',   function() use($app) {
	
	
 $allGetVars = $app->request->get();
    error_log( print_R("hivetemp entered:\n ", TRUE), 3, LOG);
    error_log( print_R($allGetVars, TRUE), 3, LOG);
    $thelimit = '';
    $thehive = '';
	
    if(array_key_exists('thelimit', $allGetVars)){
        $thelimit = $allGetVars['thelimit'];
    }
    error_log( print_R("hivetemp params:  thelimit: $thelimit \n ", TRUE), 3, LOG);
	
	if(array_key_exists('thehive', $allGetVars)){
        $thehive = $allGetVars['thehive'];
    }
    error_log( print_R("hivetemp params:  thehive: $thehive \n ", TRUE), 3, LOG);
	
    $response = array();
    $db = new BeeDbHandler();

    $result = $db->getHiveTemp($thelimit, $thehive);

    $response["error"] = false;
    $response["HiveTempList"] = array();

    // looping through result and preparing  arrays
    while ($slist = $result->fetch_assoc()) {
        $tmp = array();
        if (count($slist) > 0) {
            $tmp["temp"] = (empty($slist["temp"]) ? "NULL" : $slist["temp"]);
            $tmp["datetime"] =  (empty($slist["datetime"]) ? "NULL" : $slist["datetime"]);
            $tmp["id"] =  (empty($slist["id"]) ? "NULL" : $slist["id"]);
            $tmp["hiveid"] =  (empty($slist["hiveID"]) ? "NULL" : $slist["hiveID"]);

        } else {
            $tmp["id"] = "NULL";

}
        array_push($response["HiveTempList"], $tmp);
    }
    
    $row_cnt = $result->num_rows;

    if ($result != NULL) {
        $response["error"] = false;
        echoRespnse(200, $response);
    } else {
        $response["error"] = true;
        $response["message"] = "The requested resource doesn't exists";
        echoRespnse(404, $response);
    }
});
$app->get('/hivehumidity',   function() use($app) {
	
	
 $allGetVars = $app->request->get();
    error_log( print_R("hivehumidity entered:\n ", TRUE), 3, LOG);
    error_log( print_R($allGetVars, TRUE), 3, LOG);
    $thelimit = '';
	$thehive = '';
    
    if(array_key_exists('thelimit', $allGetVars)){
        $thelimit = $allGetVars['thelimit'];
    }
    error_log( print_R("hivehumidity params:  thelimit: $thelimit \n ", TRUE), 3, LOG);
	
	if(array_key_exists('thehive', $allGetVars)){
        $thehive = $allGetVars['thehive'];
    }
    error_log( print_R("hivehumidity params:  thehive: $thehive \n ", TRUE), 3, LOG);
	
    $response = array();
    $db = new BeeDbHandler();

    $result = $db->getHiveHumidity($thelimit,$thehive);

    $response["error"] = false;
    $response["HiveHumidityList"] = array();

    // looping through result and preparing  arrays
    while ($slist = $result->fetch_assoc()) {
        $tmp = array();
        if (count($slist) > 0) {
            $tmp["humidity"] = (empty($slist["humidity"]) ? "NULL" : $slist["humidity"]);
            $tmp["datetime"] =  (empty($slist["datetime"]) ? "NULL" : $slist["datetime"]);
            $tmp["id"] =  (empty($slist["id"]) ? "NULL" : $slist["id"]);
            $tmp["hiveid"] =  (empty($slist["hiveID"]) ? "NULL" : $slist["hiveID"]);

        } else {
            $tmp["id"] = "NULL";

}
        array_push($response["HiveHumidityList"], $tmp);
    }
    
    $row_cnt = $result->num_rows;

    if ($result != NULL) {
        $response["error"] = false;
        echoRespnse(200, $response);
    } else {
        $response["error"] = true;
        $response["message"] = "The requested resource doesn't exists";
        echoRespnse(404, $response);
    }
});
$app->get('/HiveWeightStatus',   function() use($app) {
	$allGetVars = $app->request->get();
    error_log( print_R("HiveWeightStatus entered:\n ", TRUE), 3, LOG);
    error_log( print_R($allGetVars, TRUE), 3, LOG);
    $thelimit = '';
	$thehive = '';
    if(array_key_exists('thelimit', $allGetVars)){
        $thelimit = $allGetVars['thelimit'];
    }
	if(array_key_exists('thehive', $allGetVars)){
        $thehive = $allGetVars['thehive'];
    }
    error_log( print_R("HiveWeightStatus params:  thelimit: $thelimit \n ", TRUE), 3, LOG);
	error_log( print_R("HiveWeightStatus params:  thehive: $thehive \n ", TRUE), 3, LOG);
    $response = array();
    $db = new BeeDbHandler();
    $result = $db->getHiveWeightStatus($thelimit,$thehive);
    $response["error"] = false;
    $response["HiveWeightStatusList"] = array();
// looping through result and preparing  arrays
    while ($slist = $result->fetch_assoc()) {
        $tmp = array();
        if (count($slist) > 0) {
			 $tmp["datetime"] =  (empty($slist["datetime"]) ? "NULL" : $slist["datetime"]);
            $tmp["hiveid"] =  (empty($slist["hiveid"]) ? "NULL" : $slist["hiveid"]);
		   $tmp["frameweight1"] = (empty($slist["frameweight1"]) ? "NULL" : $slist["frameweight1"]);
            $tmp["frameweight2"] = (empty($slist["frameweight2"]) ? "NULL" : $slist["frameweight2"]);
            $tmp["frameweight3"] = (empty($slist["frameweight3"]) ? "NULL" : $slist["frameweight3"]);
            $tmp["frameweight4"] = (empty($slist["frameweight4"]) ? "NULL" : $slist["frameweight4"]);
            $tmp["frameweight5"] = (empty($slist["frameweight5"]) ? "NULL" : $slist["frameweight5"]);
            $tmp["frameweight6"] = (empty($slist["frameweight6"]) ? "NULL" : $slist["frameweight6"]);
            $tmp["frameweight7"] = (empty($slist["frameweight7"]) ? "NULL" : $slist["frameweight7"]);
            $tmp["frameweight8"] = (empty($slist["frameweight8"]) ? "NULL" : $slist["frameweight8"]);
            $tmp["frameweightsum"] = (empty($slist["frameweightsum"]) ? "NULL" : $slist["frameweightsum"]);
           
        } 
		else {
            $tmp["hiveid"] = "NULL";
		}
        array_push($response["HiveWeightStatusList"], $tmp);
    }
    $row_cnt = $result->num_rows;
    if ($result != NULL) {
        $response["error"] = false;
        echoRespnse(200, $response);
    } 
	else {
        $response["error"] = true;
        $response["message"] = "The requested resource doesn't exists";
        echoRespnse(404, $response);
    }
});
$app->get('/light',   function() use($app) {
	$allGetVars = $app->request->get();
    error_log( print_R("light entered:\n ", TRUE), 3, LOG);
    error_log( print_R($allGetVars, TRUE), 3, LOG);
    $thelimit = '';
	$thehive = '';
    if(array_key_exists('thelimit', $allGetVars)){
        $thelimit = $allGetVars['thelimit'];
    }
    error_log( print_R("light params:  thehive: $thehive \n ", TRUE), 3, LOG);
	if(array_key_exists('thehive', $allGetVars)){
        $thehive = $allGetVars['thehive'];
    }
    error_log( print_R("light params:  thehive: $thehive \n ", TRUE), 3, LOG);
	
    $response = array();
    $db = new BeeDbHandler();
    $result = $db->getLight($thelimit,$thehive);
    $response["error"] = false;
    $response["LightList"] = array();
 // looping through result and preparing  arrays
    while ($slist = $result->fetch_assoc()) {
        $tmp = array();
        if (count($slist) > 0) {
            $tmp["lumen"] = (empty($slist["lumen"]) ? "NULL" : $slist["lumen"]);
            $tmp["datetime"] =  (empty($slist["datetime"]) ? "NULL" : $slist["datetime"]);
            $tmp["id"] =  (empty($slist["id"]) ? "NULL" : $slist["id"]);
            $tmp["hiveid"] =  (empty($slist["hiveID"]) ? "NULL" : $slist["hiveID"]);
        }
		else {
            $tmp["id"] = "NULL";
		}
        array_push($response["LightList"], $tmp);
    }
    $row_cnt = $result->num_rows;
    if ($result != NULL) {
        $response["error"] = false;
        echoRespnse(200, $response);
    } 
	else{
        $response["error"] = true;
        $response["message"] = "The requested resource doesn't exists";
        echoRespnse(404, $response);
    }
});
$app->get('/beeFreqStatus',   function() use($app) {
	$allGetVars = $app->request->get();
    error_log( print_R("beeFreqStatus entered:\n ", TRUE), 3, LOG);
    error_log( print_R($allGetVars, TRUE), 3, LOG);
    $thelimit = '';
	$thehive = '';
    if(array_key_exists('thelimit', $allGetVars)){
        $thelimit = $allGetVars['thelimit'];
    }
    error_log( print_R("beeFreqStatus params:  thelimit: $thelimit \n ", TRUE), 3, LOG);
	if(array_key_exists('thehive', $allGetVars)){
    $thehive = $allGetVars['thehive'];
    }
    error_log( print_R("beeFreqStatus params:  thehive: $thehive \n ", TRUE), 3, LOG);
    $response = array();
    $db = new BeeDbHandler();
    $result = $db->getBeeFrequencyStatus($thelimit,$thehive);
    $response["error"] = false;
    $response["BeeFreqStatusList"] = array();
// looping through result and preparing  arrays
    while ($slist = $result->fetch_assoc()) {
        $tmp = array();
        if (count($slist) > 0) {
            $tmp["frequencyStatus"] = (empty($slist["frequencyStatus"]) ? "NULL" : $slist["frequencyStatus"]);
            $tmp["datetime"] =  (empty($slist["datetime"]) ? "NULL" : $slist["datetime"]);
            $tmp["id"] =  (empty($slist["id"]) ? "NULL" : $slist["id"]);
			$tmp["hiveID"] =  (empty($slist["hiveID"]) ? "NULL" : $slist["hiveID"]);
		}
		else {
			$tmp["id"] = "NULL";
		}
        array_push($response["BeeFreqStatusList"], $tmp);
    }
    $row_cnt = $result->num_rows;
    if ($result != NULL) {
        $response["error"] = false;
        echoRespnse(200, $response);
    }
	else {
        $response["error"] = true;
        $response["message"] = "The requested resource doesn't exists";
        echoRespnse(404, $response);
    }
});
$app->get('/outsidehum',   function() use($app) {
	

 $allGetVars = $app->request->get();
    error_log( print_R("outsidehum entered:\n ", TRUE), 3, LOG);
    error_log( print_R($allGetVars, TRUE), 3, LOG);
    $thelimit = '';
    
    if(array_key_exists('thelimit', $allGetVars)){
        $thelimit = $allGetVars['thelimit'];
    }
    error_log( print_R("outsidehum params:  thelimit: $thelimit \n ", TRUE), 3, LOG);
	
    $response = array();
    $db = new BeeDbHandler();

    $result = $db->getOutsideHum($thelimit);

    $response["error"] = false;
    $response["OutsideHumList"] = array();

    // looping through result and preparing  arrays
    while ($slist = $result->fetch_assoc()) {
        $tmp = array();
        if (count($slist) > 0) {
			$tmp["humidity"] = (empty($slist["humidity"]) ? "NULL" : $slist["humidity"]);
            $tmp["datetime"] =  (empty($slist["datetime"]) ? "NULL" : $slist["datetime"]);
            $tmp["id"] =  (empty($slist["id"]) ? "NULL" : $slist["id"]);

        } else {
            $tmp["id"] = "NULL";

}
        array_push($response["OutsideHumList"], $tmp);
    }
    
    $row_cnt = $result->num_rows;

    if ($result != NULL) {
        $response["error"] = false;
        echoRespnse(200, $response);
    } else {
        $response["error"] = true;
        $response["message"] = "The requested resource doesn't exists";
        echoRespnse(404, $response);
    }
});

//Posts used for inserting into the database
$app->post('/uploadData', function() use($app){
    //accumulate success/failures starting with 0 meaning good
    $thesuccess = 0;
	$response = array();
	
	$allGetVars = $app->request->get();
    error_log( print_R("uploadData entered:\n ", TRUE), 3, LOG);
    error_log( print_R($allGetVars, TRUE), 3, LOG);

    $thefile = '';
	$thehive = '';
    if(array_key_exists('filename', $allGetVars)){
        $thefile = $allGetVars['filename'];
    } else {
        error_log( print_R("filename missing\n", TRUE), 3, LOG);
        $response["error"] = true;
        $response["message"] = "Failed to create audio. Please try again";
        echoRespnse(400, $response);
    }
    
    //hive is optional eq. outside temperature
	if(array_key_exists('hiveid', $allGetVars)){
		$thehive = $allGetVars['hiveid'];
        error_log( print_R("uploaddata params:  thehive: $thehive \n ", TRUE), 3, LOG);
    }

	//Reads the key values and extracts them from the passed in uploaded file
    $uploadPath = dirname( __FILE__ ) . DIRECTORY_SEPARATOR . '../app' . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . $thefile ;
    error_log( print_R("uploaded file: $uploadPath\n ", TRUE), 3, LOG);
	
	$data = file_get_contents($uploadPath);
    error_log( print_R("uploaded data:\n ", TRUE), 3, LOG);
    error_log( print_R($data, TRUE), 3, LOG);

	$dataJsonDecode = json_decode($data);

    switch (json_last_error()) {
        case JSON_ERROR_NONE:
			error_log( print_R("No errors:\n ", TRUE), 3, LOG);
        break;
        case JSON_ERROR_DEPTH:
			error_log( print_R("- Maximum stack depth exceeded:\n ", TRUE), 3, LOG);
        $response["error"] = true;
        $response["message"] = "Failed to upload. Please try again";
        echoRespnse(400, $response);
        break;
        case JSON_ERROR_STATE_MISMATCH:
			error_log( print_R("- Underflow or the modes mismatch:\n ", TRUE), 3, LOG);
        $response["error"] = true;
        $response["message"] = "Failed to upload. Please try again";
        echoRespnse(400, $response);
        break;
        case JSON_ERROR_CTRL_CHAR:
			error_log( print_R("- Unexpected control character found:\n ", TRUE), 3, LOG);
        $response["error"] = true;
        $response["message"] = "Failed to upload. Please try again";
        echoRespnse(400, $response);
        break;
        case JSON_ERROR_SYNTAX:
			error_log( print_R("- Syntax error, malformed JSON:\n ", TRUE), 3, LOG);
        $response["error"] = true;
        $response["message"] = "Failed to upload. Please try again";
        echoRespnse(400, $response);
        break;
        case JSON_ERROR_UTF8:
			error_log( print_R("- Malformed UTF-8 characters, possibly incorrectly encoded:\n ", TRUE), 3, LOG);
        $response["error"] = true;
        $response["message"] = "Failed to upload. Please try again";
        echoRespnse(400, $response);
        break;
        default:
			error_log( print_R("- Unknown error:\n ", TRUE), 3, LOG);
        $response["error"] = true;
        $response["message"] = "Failed to upload. Please try again";
        echoRespnse(400, $response);
        break;
    }

	
    $isAudio  = (isset($dataJsonDecode->audio) ? $dataJsonDecode->audio : "");
    if ($isAudio != "") {
        //we could have multiple records.  If end up with 0, all was good 
        $thesuccess += uploadAudio(json_decode($data,true) , $thehive);
    }
    $isHive  = (isset($dataJsonDecode->hive) ? $dataJsonDecode->hive : "");
    if ($isHive != "") {
       $thesuccess += uploadHive(json_decode($data,true) , $thehive);
	}
    $isPopulation  = (isset($dataJsonDecode->population) ? $dataJsonDecode->population : "");
    if ($isPopulation != "") {
		$thesuccess += uploadPopulation(json_decode($data,true) , $thehive);
    }
    $isFrameWeight  = (isset($dataJsonDecode->frameweight) ? $dataJsonDecode->frameweight : "");
    if ($isFrameWeight != "") {
		$thesuccess += uploadFrameWeight(json_decode($data,true) , $thehive);
    }
    $isLightHistory  = (isset($dataJsonDecode->lighthistory) ? $dataJsonDecode->lighthistory : "");
    if ($isLightHistory != "") {
		$thesuccess += uploadLightHistory(json_decode($data,true) , $thehive);
    }
    $isOutsideTemp  = (isset($dataJsonDecode->outsidetemp) ? $dataJsonDecode->outsidetemp : "");
    if ($isOutsideTemp != "") {
		$thesuccess += uploadOutsideTemp(json_decode($data,true) , $thehive);
    }
    if ($thesuccess == 0) {
        $response["error"] = false;
        $response["message"] = "data upload created successfully";
        error_log( print_R("upload success\n", TRUE ), 3, LOG);
        echoRespnse(201, $response);
    } else {
        error_log( print_R("after upload result bad\n", TRUE), 3, LOG);
        error_log( print_R( $thesuccess, TRUE), 3, LOG);
        $response["error"] = true;
        $response["message"] = "Failed to upload. Please try again";
        echoRespnse(400, $response);
    }
    
});
$app->post('/genData', function() use($app){
    //accumulate success/failures starting with 0 meaning good
    $thesuccess = 0;
	$response = array();
	
	$allGetVars = $app->request->get();
    error_log( print_R("genData entered:\n ", TRUE), 3, LOG);
    error_log( print_R($allGetVars, TRUE), 3, LOG);

    $thefile = '';
    if(array_key_exists('filename', $allGetVars)){
        $thefile = $allGetVars['filename'];
    } else {
        error_log( print_R("filename missing\n", TRUE), 3, LOG);
        $response["error"] = true;
        $response["message"] = "Failed to create audio. Please try again";
        echoRespnse(400, $response);
    }
    

	//Reads the key values and extracts them from the passed in uploaded file
    $uploadPath = dirname( __FILE__ ) . DIRECTORY_SEPARATOR . '../app' . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . $thefile ;
    error_log( print_R("uploaded file: $uploadPath\n ", TRUE), 3, LOG);
	
	$data = file_get_contents("php://input");

    error_log( print_R("uploaded data:\n ", TRUE), 3, LOG);
    error_log( print_R($data, TRUE), 3, LOG);

	$dataJsonDecode = json_decode($data);

    switch (json_last_error()) {
        case JSON_ERROR_NONE:
			error_log( print_R("No errors:\n ", TRUE), 3, LOG);
        break;
        case JSON_ERROR_DEPTH:
			error_log( print_R("- Maximum stack depth exceeded:\n ", TRUE), 3, LOG);
        $response["error"] = true;
        $response["message"] = "Failed to upload. Please try again";
        echoRespnse(400, $response);
        break;
        case JSON_ERROR_STATE_MISMATCH:
			error_log( print_R("- Underflow or the modes mismatch:\n ", TRUE), 3, LOG);
        $response["error"] = true;
        $response["message"] = "Failed to upload. Please try again";
        echoRespnse(400, $response);
        break;
        case JSON_ERROR_CTRL_CHAR:
			error_log( print_R("- Unexpected control character found:\n ", TRUE), 3, LOG);
        $response["error"] = true;
        $response["message"] = "Failed to upload. Please try again";
        echoRespnse(400, $response);
        break;
        case JSON_ERROR_SYNTAX:
			error_log( print_R("- Syntax error, malformed JSON:\n ", TRUE), 3, LOG);
        $response["error"] = true;
        $response["message"] = "Failed to upload. Please try again";
        echoRespnse(400, $response);
        break;
        case JSON_ERROR_UTF8:
			error_log( print_R("- Malformed UTF-8 characters, possibly incorrectly encoded:\n ", TRUE), 3, LOG);
        $response["error"] = true;
        $response["message"] = "Failed to upload. Please try again";
        echoRespnse(400, $response);
        break;
        default:
			error_log( print_R("- Unknown error:\n ", TRUE), 3, LOG);
        $response["error"] = true;
        $response["message"] = "Failed to upload. Please try again";
        echoRespnse(400, $response);
        break;
    }

	$fp = fopen($uploadPath, 'w');
	$thesuccess = fwrite($fp, $data);
	fclose($fp);
	
    if ($thesuccess > 0) {
        $response["error"] = false;
        $response["message"] = "data gen created successfully";
        error_log( print_R("datagen success\n", TRUE ), 3, LOG);
        echoRespnse(201, $response);
    } else {
        error_log( print_R("after upload result bad\n", TRUE), 3, LOG);
        error_log( print_R( $thesuccess, TRUE), 3, LOG);
        $response["error"] = true;
        $response["message"] = "Failed to upload. Please try again";
        echoRespnse(400, $response);
    }
    
});

$app->post('/updateFrameWeight', function() use($app){
	$response = array();
	//Reads the key values and extracts them
	$data = file_get_contents("php://input");
	$dataJsonDecode = json_decode($data);
	
	error_log( print_R("frame post before update insert\n", TRUE ), 3, LOG);
    $frame  = (isset($dataJsonDecode->frame) ? $dataJsonDecode->frame : "");
    error_log( print_R($frame, TRUE ), 3, LOG);
	
	$datetime  = (isset($dataJsonDecode->frame->datetime)? $dataJsonDecode->frame->datetime : "");
    $hiveID   = (isset($dataJsonDecode->frame->hiveID)? $dataJsonDecode->frame->hiveID : "");
    $frameweight1 = (isset($dataJsonDecode->frame->frameweight1) ? $dataJsonDecode->frame->frameweight1 : "");
	$frameweight2 = (isset($dataJsonDecode->frame->frameweight2) ? $dataJsonDecode->frame->frameweight2 : "");
	$frameweight3 = (isset($dataJsonDecode->frame->frameweight3) ? $dataJsonDecode->frame->frameweight3 : "");	
	$frameweight4 = (isset($dataJsonDecode->frame->frameweight4) ? $dataJsonDecode->frame->frameweight4 : "");
	$frameweight5 = (isset($dataJsonDecode->frame->frameweight5) ? $dataJsonDecode->frame->frameweight5 : "");
	$frameweight6 = (isset($dataJsonDecode->frame->frameweight6) ? $dataJsonDecode->frame->frameweight6 : "");
	$frameweight7 = (isset($dataJsonDecode->frame->frameweight7) ? $dataJsonDecode->frame->frameweight7 : "");
	$frameweight8 = (isset($dataJsonDecode->frame->frameweight8) ? $dataJsonDecode->frame->frameweight8 : "");
	
	$db = new BeeDbHandler();
	$response = array();
	
	//Updates Task
	$frame_id = $db->updateFrameWeight($datetime, $hiveID, $frameweight1, $frameweight2, $frameweight3, $frameweight4, $frameweight5, $frameweight6, $frameweight7, $frameweight8);
	
	    if ($frame_id > 1) {
        $response["error"] = false;
        $response["message"] = "frame created successfully";
        $response["frame_id"] = $frame_id;
        error_log( print_R("frame created: $frame_id\n", TRUE ), 3, LOG);
        echoRespnse(201, $response);
    } else if ($frame_id == 1) {
        $response["error"] = false;
        $response["message"] = "frame updated successfully";
        error_log( print_R("frame already existed\n", TRUE ), 3, LOG);
        echoRespnse(201, $response);
    } else {
        error_log( print_R("after frame result bad\n", TRUE), 3, LOG);
        error_log( print_R( $frame_id, TRUE), 3, LOG);
        $response["error"] = true;
        $response["message"] = "Failed to create frame. Please try again";
        echoRespnse(400, $response);
    }
});
$app->post('/updateHive', function() use($app){
	$response = array();
	//Reads the key values and extracts them
	$data = file_get_contents("php://input");
	$dataJsonDecode = json_decode($data);
	
	error_log( print_R("hive post before update insert\n", TRUE ), 3, LOG);
    $hive  = (isset($dataJsonDecode->hive) ? $dataJsonDecode->hive : "");
    error_log( print_R($hive, TRUE ), 3, LOG);
	   
	$hiveID   = (isset($dataJsonDecode->hive->hiveID)? $dataJsonDecode->hive->hiveID : "");
    $name = (isset($dataJsonDecode->hive->name) ? $dataJsonDecode->hive->name : "");
	$datetime  = (isset($dataJsonDecode->hive->datetime)? $dataJsonDecode->hive->datetime : "");
	$temp = (isset($dataJsonDecode->hive->temp) ? $dataJsonDecode->hive->temp : "");
	$weight = (isset($dataJsonDecode->hive->weight) ? $dataJsonDecode->hive->weight : "");
	$humidity = (isset($dataJsonDecode->hive->humidity) ? $dataJsonDecode->hive->humidity : "");	
	
	
	$db = new BeeDbHandler();
	$response = array();
	
	//Updates Task
	$hive_id = $db->updateHive($datetime, $hiveID, $name, $weight, $humidity, $temp);
	
	    if ($hive_id > 1) {
        $response["error"] = false;
        $response["message"] = "hive created successfully";
        $response["hive_id"] = $hive_id;
        error_log( print_R("hive created: $hive_id\n", TRUE ), 3, LOG);
        echoRespnse(201, $response);
    } else if ($hive_id == 1) {
        $response["error"] = false;
        $response["message"] = "hive updated successfully";
        error_log( print_R("hive already existed\n", TRUE ), 3, LOG);
        echoRespnse(201, $response);
    } else {
        error_log( print_R("after hive result bad\n", TRUE), 3, LOG);
        error_log( print_R( $hive_id, TRUE), 3, LOG);
        $response["error"] = true;
        $response["message"] = "Failed to create hive. Please try again";
        echoRespnse(400, $response);
    }
});
$app->post('/updateLightHistory', function() use($app){
	$response = array();
	//Reads the key values and extracts them
	$data = file_get_contents("php://input");
	$dataJsonDecode = json_decode($data);
	
	error_log( print_R("light post before update insert\n", TRUE ), 3, LOG);
    $light  = (isset($dataJsonDecode->light) ? $dataJsonDecode->light : "");
    error_log( print_R($light, TRUE ), 3, LOG);
	
	$hiveID      = (isset($dataJsonDecode->light->hiveID)      ? $dataJsonDecode->light->hiveID : "");
	$datetime  = (isset($dataJsonDecode->light->datetime) ? $dataJsonDecode->light->datetime : "");
    $lumen    = (isset($dataJsonDecode->light->lumen)    ? $dataJsonDecode->light->lumen : "");
	
	$db = new BeeDbHandler();
	$response = array();
	
	//Updates Task
	$light_id = $db->updateLightHistory($datetime, $hiveID, $lumen);
	
	    if ($light_id > 1) {
        $response["error"] = false;
        $response["message"] = "light created successfully";
        $response["light_id"] = $light_id;
        error_log( print_R("light created: $light_id\n", TRUE ), 3, LOG);
        echoRespnse(201, $response);
    } else if ($light_id == 1) {
        $response["error"] = false;
        $response["message"] = "light updated successfully";
        error_log( print_R("light already existed\n", TRUE ), 3, LOG);
        echoRespnse(201, $response);
    } else {
        error_log( print_R("after light result bad\n", TRUE), 3, LOG);
        error_log( print_R( $light_id, TRUE), 3, LOG);
        $response["error"] = true;
        $response["message"] = "Failed to create light. Please try again";
        echoRespnse(400, $response);
    }
});
$app->post('/updateOutsideTemp', function() use($app){
	$response = array();
	//Reads the key values and extracts them
	$data = file_get_contents("php://input");
	$dataJsonDecode = json_decode($data);
	
	error_log( print_R("otemp post before update insert\n", TRUE ), 3, LOG);
    $otemp  = (isset($dataJsonDecode->otemp) ? $dataJsonDecode->otemp : "");
    error_log( print_R($otemp, TRUE ), 3, LOG);
	
	$datetime  = (isset($dataJsonDecode->otemp->datetime) ? $dataJsonDecode->otemp->datetime : "");
    $temp      = (isset($dataJsonDecode->otemp->temp)      ? $dataJsonDecode->otemp->temp : "");
	$humidity      = (isset($dataJsonDecode->otemp->humidity)      ? $dataJsonDecode->otemp->humidity : "");
	
	$db = new BeeDbHandler();
	$response = array();
	
	//Updates Task
	$otemp_id = $db->updateOutsideTemp($datetime, $temp, $humidity);
	
	    if ($otemp_id > 1) {
        $response["error"] = false;
        $response["message"] = "otemp created successfully";
        $response["otemp_id"] = $otemp_id;
        error_log( print_R("otemp created: $otemp_id\n", TRUE ), 3, LOG);
        echoRespnse(201, $response);
    } else if ($otemp_id == 1) {
        $response["error"] = false;
        $response["message"] = "otemp updated successfully";
        error_log( print_R("otemp already existed\n", TRUE ), 3, LOG);
        echoRespnse(201, $response);
    } else {
        error_log( print_R("after otemp result bad\n", TRUE), 3, LOG);
        error_log( print_R( $otemp_id, TRUE), 3, LOG);
        $response["error"] = true;
        $response["message"] = "Failed to create otemp. Please try again";
        echoRespnse(400, $response);
    }
});
$app->post('/updatePopulation', function() use($app){
	$response = array();
	//Reads the key values and extracts them
	$data = file_get_contents("php://input");
	$dataJsonDecode = json_decode($data);
	
	error_log( print_R("population post before update insert\n", TRUE ), 3, LOG);
    $population  = (isset($dataJsonDecode->population) ? $dataJsonDecode->population : "");
    error_log( print_R($population, TRUE ), 3, LOG);
	
	$hiveID      = (isset($dataJsonDecode->population->hiveID)      ? $dataJsonDecode->population->hiveID : "");
	$datetime  = (isset($dataJsonDecode->population->datetime) ? $dataJsonDecode->population->datetime : "");
    $count    = (isset($dataJsonDecode->population->count)    ? $dataJsonDecode->population->count : "");
	
	$db = new BeeDbHandler();
	$response = array();
	
	//Updates Task
	$population_id = $db->updatePopulation($datetime, $hiveID, $count);
	
	    if ($population_id > 1) {
        $response["error"] = false;
        $response["message"] = "population created successfully";
        $response["population_id"] = $population_id;
        error_log( print_R("population created: $population_id\n", TRUE ), 3, LOG);
        echoRespnse(201, $response);
    } else if ($population_id == 1) {
        $response["error"] = false;
        $response["message"] = "population updated successfully";
        error_log( print_R("population already existed\n", TRUE ), 3, LOG);
        echoRespnse(201, $response);
    } else {
        error_log( print_R("after population result bad\n", TRUE), 3, LOG);
        error_log( print_R( $population_id, TRUE), 3, LOG);
        $response["error"] = true;
        $response["message"] = "Failed to create population. Please try again";
        echoRespnse(400, $response);
    }
});
$app->post('/uploadStream', function() use($app){
    //accumulate success/failures starting with 0 meaning good
    $thesuccess = 0;
	$response = array();
	
	$allGetVars = $app->request->get();
    error_log( print_R("uploadData entered:\n ", TRUE), 3, LOG);
    error_log( print_R($allGetVars, TRUE), 3, LOG);

    $thefile = '';
	$thehive = '';
    
    //hive is optional eq. outside temperature
	if(array_key_exists('hiveid', $allGetVars)){
		$thehive = $allGetVars['hiveid'];
        error_log( print_R("uploaddata params:  thehive: $thehive \n ", TRUE), 3, LOG);
    }


	$data = file_get_contents("php://input");

    error_log( print_R("uploaded data:\n ", TRUE), 3, LOG);
    error_log( print_R($data, TRUE), 3, LOG);
	
	$dataJsonDecode = json_decode($data);

    switch (json_last_error()) {
        case JSON_ERROR_NONE:
			error_log( print_R("No errors:\n ", TRUE), 3, LOG);
        break;
        case JSON_ERROR_DEPTH:
			error_log( print_R("- Maximum stack depth exceeded:\n ", TRUE), 3, LOG);
        $response["error"] = true;
        $response["message"] = "Failed to upload. Please try again";
        echoRespnse(400, $response);
        break;
        case JSON_ERROR_STATE_MISMATCH:
			error_log( print_R("- Underflow or the modes mismatch:\n ", TRUE), 3, LOG);
        $response["error"] = true;
        $response["message"] = "Failed to upload. Please try again";
        echoRespnse(400, $response);
        break;
        case JSON_ERROR_CTRL_CHAR:
			error_log( print_R("- Unexpected control character found:\n ", TRUE), 3, LOG);
        $response["error"] = true;
        $response["message"] = "Failed to upload. Please try again";
        echoRespnse(400, $response);
        break;
        case JSON_ERROR_SYNTAX:
			error_log( print_R("- Syntax error, malformed JSON:\n ", TRUE), 3, LOG);
        $response["error"] = true;
        $response["message"] = "Failed to upload. Please try again";
        echoRespnse(400, $response);
        break;
        case JSON_ERROR_UTF8:
			error_log( print_R("- Malformed UTF-8 characters, possibly incorrectly encoded:\n ", TRUE), 3, LOG);
        $response["error"] = true;
        $response["message"] = "Failed to upload. Please try again";
        echoRespnse(400, $response);
        break;
        default:
			error_log( print_R("- Unknown error:\n ", TRUE), 3, LOG);
        $response["error"] = true;
        $response["message"] = "Failed to upload. Please try again";
        echoRespnse(400, $response);
        break;
    }

	
    $isAudio  = (isset($dataJsonDecode->audio) ? $dataJsonDecode->audio : "");
    if ($isAudio != "") {
        //we could have multiple records.  If end up with 0, all was good 
        $thesuccess += uploadAudio(json_decode($data,true) , $thehive);
    }
    $isHive  = (isset($dataJsonDecode->hive) ? $dataJsonDecode->hive : "");
    if ($isHive != "") {
       $thesuccess += uploadHive(json_decode($data,true) , $thehive);
	}
    $isPopulation  = (isset($dataJsonDecode->population) ? $dataJsonDecode->population : "");
    if ($isPopulation != "") {
		$thesuccess += uploadPopulation(json_decode($data,true) , $thehive);
    }
    $isFrameWeight  = (isset($dataJsonDecode->frameweight) ? $dataJsonDecode->frameweight : "");
    if ($isFrameWeight != "") {
		$thesuccess += uploadFrameWeight(json_decode($data,true) , $thehive);
    }
    $isLightHistory  = (isset($dataJsonDecode->lighthistory) ? $dataJsonDecode->lighthistory : "");
    if ($isLightHistory != "") {
		$thesuccess += uploadLightHistory(json_decode($data,true) , $thehive);
    }
    $isOutsideTemp  = (isset($dataJsonDecode->outsidetemp) ? $dataJsonDecode->outsidetemp : "");
    if ($isOutsideTemp != "") {
		$thesuccess += uploadOutsideTemp(json_decode($data,true) , $thehive);
    }
    if ($thesuccess == 0) {
        $response["error"] = false;
        $response["message"] = "data upload created successfully";
        error_log( print_R("upload success\n", TRUE ), 3, LOG);
        echoRespnse(201, $response);
    } else {
        error_log( print_R("after upload result bad\n", TRUE), 3, LOG);
        error_log( print_R( $thesuccess, TRUE), 3, LOG);
        $response["error"] = true;
        $response["message"] = "Failed to upload. Please try again";
        echoRespnse(400, $response);
    }
    
});
$app->post('/uploadPic', function() use($app){

    $input = var_dump($_FILES);
    error_log( print_R("upload pic \n", TRUE ), 3, LOG);
    error_log( print_R($input, TRUE ), 3, LOG);

	$allGetVars = $app->request->get();
    error_log( print_R("uploadpic entered:\n ", TRUE), 3, LOG);
    error_log( print_R($allGetVars, TRUE), 3, LOG);
    $count = '';
	$thehive = '';
    $datetime = '';
	
    if(array_key_exists('count', $allGetVars)){
        $count = $allGetVars['count'];
    }
    error_log( print_R("uploadpic params:  count: $count \n ", TRUE), 3, LOG);
	
	if(array_key_exists('thehive', $allGetVars)){
        $thehive = $allGetVars['thehive'];
    }
    error_log( print_R("uploadpic params:  thehive: $thehive \n ", TRUE), 3, LOG);
	
	if(array_key_exists('datetime', $allGetVars)){
        $datetime = $allGetVars['datetime'];
    }
    error_log( print_R("uploadpic params:  datetime: $datetime \n ", TRUE), 3, LOG);
	
	$response = array();

    if ( !empty( $_FILES ) ) {
        error_log( print_R("upload pic has files\n", TRUE ), 3, LOG);
        error_log( print_R($_FILES[ 'test_file' ][ 'name' ] . "\n", TRUE ), 3, LOG);

        $tempPath = $_FILES[ 'test_file' ][ 'tmp_name' ];
        $uploadPath = dirname( __FILE__ ) . DIRECTORY_SEPARATOR . '../app' . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR  . $_FILES[ 'test_file' ][ 'name' ] ;
        if (!is_writeable($uploadPath)) {
            $response["error"] = true;
            $response["message"] = "Failed to upload. Cannot write to destination file";
            echoRespnse(400, $response);
        }        
        error_log( print_R("about to move $tempPath to $uploadPath\n", TRUE ), 3, LOG);
        move_uploaded_file( $tempPath, $uploadPath );
        $response["error"] = false;
        $response["message"] = "data upload created successfully";
        error_log( print_R("upload success\n", TRUE ), 3, LOG);
        echoRespnse(201, $response);
        
    } else {
       error_log( print_R("after upload result bad\n", TRUE), 3, LOG);
        $response["error"] = true;
        $response["message"] = "Failed to upload. Please try again";
        echoRespnse(400, $response);
    }
    
});


function uploadAudio($dataJsonDecode, $thehive) {
    $app = \Slim\Slim::getInstance();

    $db = new BeeDbHandler();
    $audio_cnt = 0;
    
    foreach ($dataJsonDecode["audio"] as $loop) {
        
        $hiveID = $thehive;
        $datetime  = (isset($loop["datetime"]) ? 
                            $loop["datetime"] : "");
        $frequencyStatus = (isset($loop["frequencyStatus"]) ?
                                  $loop["frequencyStatus"] : "");
        
        $response = array();

        error_log( print_R("before audio created: datetime $datetime hive $hiveID Freq $frequencyStatus\n", TRUE ), 3, LOG);
        
        //Updates Task
        $audio_id = $db->createAudio($datetime, $hiveID, $frequencyStatus);
        error_log( print_R("audio return: $audio_id\n", TRUE ), 3, LOG);
        if ($audio_id > 0) {
            $audio_cnt += 0;
        } else {
            $audio_cnt += 1;
        }
        error_log( print_R("audio cnt: $audio_cnt\n", TRUE ), 3, LOG);
        
    }
    error_log( print_R("audio final cnt: $audio_cnt\n", TRUE ), 3, LOG);
        
    if ($audio_cnt == 0) {
        error_log( print_R("audio created\n", TRUE ), 3, LOG);
        return 0;
    } else {
        error_log( print_R("after audio result bad\n", TRUE), 3, LOG);
        return 1;
    }
}
function uploadOutsideTemp($dataJsonDecode, $thehive) {
    $app = \Slim\Slim::getInstance();

    $db = new BeeDbHandler();
    $otemp_cnt = 0;
    
    foreach ($dataJsonDecode["outsidetemp"] as $loop) {
        
        $datetime  = (isset($loop["datetime"]) ? 
                            $loop["datetime"] : "");
        $temp = (isset($loop["temp"]) ?
                             $loop["temp"] : "");
		$humidity = (isset($loop["humidity"]) ?
                             $loop["humidity"] : "");
        
        $response = array();

        error_log( print_R("before otemp created: datetime $datetime temp $temp humidity $humidity \n", TRUE ), 3, LOG);
        
        //Updates Task
        $otemp_id = $db->createOutsideTemp($datetime, $count);
        error_log( print_R("outsidetemp return: $otemp_id\n", TRUE ), 3, LOG);
        if ($otemp_id > 0) {
            $otemp_cnt += 0;
        } else {
            $otemp_cnt += 1;
        }
        error_log( print_R("outsidetemp cnt: $otemp_cnt\n", TRUE ), 3, LOG);
        
    }
    error_log( print_R("otemp final cnt: $otemp_cnt\n", TRUE ), 3, LOG);
        
    if ($otemp_cnt == 0) {
        error_log( print_R("otemp created\n", TRUE ), 3, LOG);
        return 0;
    } else {
        error_log( print_R("after otemp result bad\n", TRUE), 3, LOG);
        return 1;
    }
}
function uploadHive($dataJsonDecode, $thehive) {
    $app = \Slim\Slim::getInstance();

    $db = new BeeDbHandler();
    $hive_cnt = 0;
    
    foreach ($dataJsonDecode["hive"] as $loop) {
        
        $datetime  = (isset($loop["datetime"]) ? 
                            $loop["datetime"] : "");
        $name = (isset($loop["name"]) ?
                             $loop["name"] : "");
		$temp = (isset($loop["temp"]) ?
                             $loop["temp"] : "");
		$humidity = (isset($loop["humidity"]) ?
                             $loop["humidity"] : "");
        
        $response = array();

        error_log( print_R("before hive created: datetime $datetime name $name temp $temp humidity $humidity \n", TRUE ), 3, LOG);
        
        //Updates Task
        $hive_id = $db->createHive($thehive, $name,$datetime,  $temp, $humidity);
        error_log( print_R("hive return: $hive_id\n", TRUE ), 3, LOG);
        if ($hive_id > 0) {
            $hive_cnt += 0;
        } else {
            $hive_cnt += 1;
        }
        error_log( print_R("hive cnt: $hive_cnt\n", TRUE ), 3, LOG);
        
    }
    error_log( print_R("hive final cnt: $hive_cnt\n", TRUE ), 3, LOG);
        
    if ($hive_cnt == 0) {
        error_log( print_R("hive created\n", TRUE ), 3, LOG);
        return 0;
    } else {
        error_log( print_R("after hive result bad\n", TRUE), 3, LOG);
        return 1;
    }
}
function uploadLightHistory($dataJsonDecode, $thehive) {
    $app = \Slim\Slim::getInstance();

    $db = new BeeDbHandler();
    $light_cnt = 0;
    
    foreach ($dataJsonDecode["lighthistory"] as $loop) {
        
        $datetime  = (isset($loop["datetime"]) ? 
                            $loop["datetime"] : "");
        $lumen = (isset($loop["lumen"]) ?
                             $loop["lumen"] : "");
        
        $response = array();

        error_log( print_R("before lighthistory created: datetime $datetime lumen $lumen \n", TRUE ), 3, LOG);
        
        //Updates Task
        $light_id = $db->createLightHistory($thehive, $datetime, $lumen);
        error_log( print_R("light return: $light_id\n", TRUE ), 3, LOG);
        if ($light_id > 0) {
            $light_cnt += 0;
        } else {
            $light_cnt += 1;
        }
        error_log( print_R("light cnt: $light_cnt\n", TRUE ), 3, LOG);
        
    }
    error_log( print_R("light final cnt: $light_cnt\n", TRUE ), 3, LOG);
        
    if ($light_cnt == 0) {
        error_log( print_R("light created\n", TRUE ), 3, LOG);
        return 0;
    } else {
        error_log( print_R("after light result bad\n", TRUE), 3, LOG);
        return 1;
    }
}
function uploadFrameWeight($dataJsonDecode, $thehive) {
    $app = \Slim\Slim::getInstance();

    $db = new BeeDbHandler();
    $weight_cnt = 0;
    
    foreach ($dataJsonDecode["frameweight"] as $loop) {
        
        $datetime  = (isset($loop["datetime"]) ? 
                            $loop["datetime"] : "");
		 $hiveID  = (isset($loop["hiveID"]) ? 
                            $loop["hiveID"] : "");					
        $frameweight1 = (isset($loop["frameweight1"]) ?
                             $loop["frameweight1"] : "");
		$frameweight2 = (isset($loop["frameweight2"]) ?
							$loop["frameweight2"] : "");
		$frameweight3 = (isset($loop["frameweight3"]) ?
							$loop["frameweight3"] : "");
		$frameweight4 = (isset($loop["frameweight4"]) ?
							$loop["frameweight4"] : "");
		$frameweight5 = (isset($loop["frameweight5"]) ?
							$loop["frameweight5"] : "");
		$frameweight6 = (isset($loop["frameweight6"]) ?
							$loop["frameweight6"] : "");
		$frameweight7 = (isset($loop["frameweight7"]) ?
							$loop["frameweight7"] : "");
		$frameweight8 = (isset($loop["frameweight8"]) ?
							$loop["frameweight8"] : "");
        
        $response = array();

        error_log( print_R("before frameweight created: datetime $datetime hiveID $thehive, frameweight1 $frameweight1 frameweight2 $frameweight2 frameweight3 $frameweight3 frameweight4 $frameweight4 frameweight5 $frameweight5 frameweight6 $frameweight6 frameweight7 $frameweight7 frameweight8 $frameweight8  \n", TRUE ), 3, LOG);
        
        //Updates Task
        $weight_id = $db->createFrameWeight($datetime, $thehive, $frameweight1, $frameweight2, $frameweight3, $frameweight4, $frameweight5, $frameweight6, $frameweight7, $frameweight8);
        error_log( print_R("weight return: $weight_id\n", TRUE ), 3, LOG);
        if ($weight_id > 0) {
            $weight_cnt += 0;
        } else {
            $weight_cnt += 1;
        }
        error_log( print_R("weight cnt: $weight_cnt\n", TRUE ), 3, LOG);
        
    }
    error_log( print_R("weight final cnt: $weight_cnt\n", TRUE ), 3, LOG);
        
    if ($weight_cnt == 0) {
        error_log( print_R("weight created\n", TRUE ), 3, LOG);
        return 0;
    } else {
        error_log( print_R("after weight result bad\n", TRUE), 3, LOG);
        return 1;
    }
}
function uploadPopulation($dataJsonDecode, $thehive) {
    $app = \Slim\Slim::getInstance();

    $db = new BeeDbHandler();
    $population_cnt = 0;
    
    foreach ($dataJsonDecode["population"] as $loop) {
        
        $datetime  = (isset($loop["datetime"]) ? 
                            $loop["datetime"] : "");
        $count = (isset($loop["count"]) ?
                             $loop["count"] : "");
        
        $response = array();

        error_log( print_R("before population created: datetime $datetime count $count  \n", TRUE ), 3, LOG);
        
        //Updates Task
        $population_id = $db->createPopulation($thehive, $datetime, $count);
        error_log( print_R("population return: $population_id\n", TRUE ), 3, LOG);
        if ($population_id > 0) {
            $population_cnt += 0;
        } else {
            $population_cnt += 1;
        }
        error_log( print_R("population cnt: $population_cnt\n", TRUE ), 3, LOG);
        
    }
    error_log( print_R("population final cnt: $population_cnt\n", TRUE ), 3, LOG);
        
    if ($population_cnt == 0) {
        error_log( print_R("population created\n", TRUE ), 3, LOG);
        return 0;
    } else {
        error_log( print_R("after population result bad\n", TRUE), 3, LOG);
        return 1;
    }
}

?>
