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
            $tmp["hiveid"] =  (empty($slist["hiveid"]) ? "NULL" : $slist["hiveid"]);
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
            $tmp["frameweight1"] = (empty($slist["frameweight1"]) ? "NULL" : $slist["frameweight1"]);
            $tmp["frameweight2"] = (empty($slist["frameweight2"]) ? "NULL" : $slist["frameweight2"]);
            $tmp["frameweight3"] = (empty($slist["frameweight3"]) ? "NULL" : $slist["frameweight3"]);
            $tmp["frameweight4"] = (empty($slist["frameweight4"]) ? "NULL" : $slist["frameweight4"]);
            $tmp["frameweight5"] = (empty($slist["frameweight5"]) ? "NULL" : $slist["frameweight5"]);
            $tmp["frameweight6"] = (empty($slist["frameweight6"]) ? "NULL" : $slist["frameweight6"]);
            $tmp["frameweight7"] = (empty($slist["frameweight7"]) ? "NULL" : $slist["frameweight7"]);
            $tmp["frameweight8"] = (empty($slist["frameweight8"]) ? "NULL" : $slist["frameweight8"]);
            $tmp["frameweightsum"] = (empty($slist["frameweightsum"]) ? "NULL" : $slist["frameweightsum"]);
            $tmp["datetime"] =  (empty($slist["datetime"]) ? "NULL" : $slist["datetime"]);
            $tmp["hiveid"] =  (empty($slist["hiveid"]) ? "NULL" : $slist["hiveid"]);
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

//Posts used for inserting into the database
$app->post('/updateAudio', function() use($app){
	$response = array();
	
	$allGetVars = $app->request->get();
    error_log( print_R("updateAudio entered:\n ", TRUE), 3, LOG);
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
	if(array_key_exists('hiveid', $allGetVars)){
		$thehive = $allGetVars['hiveid'];
    }
    error_log( print_R("beeFreqStatus params:  thehive: $thehive \n ", TRUE), 3, LOG);

	//Reads the key values and extracts them from the passed in uploaded file
    $uploadPath = dirname( __FILE__ ) . DIRECTORY_SEPARATOR . '../app' . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . $thefile ;
    error_log( print_R("uploaded file: $uploadPath\n ", TRUE), 3, LOG);
	
	$data = file_get_contents($uploadPath);

	$dataJsonDecode = json_decode($data);
	
	error_log( print_R("audio post before update insert\n", TRUE ), 3, LOG);
    $thetype  = (isset($dataJsonDecode) ? $dataJsonDecode : "");
    error_log( print_R($thetype, TRUE ), 3, LOG);

    $audio  = (isset($dataJsonDecode->audio[0]) ? $dataJsonDecode->audio[0] : "");
    error_log( print_R($audio, TRUE ), 3, LOG);
	
	$datetime  = (isset($dataJsonDecode->audio[0]->datetime) ? $dataJsonDecode->audio[0]->datetime : "");
//    $hiveID      = (isset($dataJsonDecode->audio->hiveID)      ? $dataJsonDecode->audio->hiveID : "");
	$hiveID = $thehive;
    $frequencyStatus    = (isset($dataJsonDecode->audio[0]->frequencyStatus)    ? $dataJsonDecode->audio[0]->frequencyStatus : "");
	
	$db = new BeeDbHandler();
	$response = array();
	
	//Updates Task
	$audio_id = $db->createAudio($datetime, $hiveID, $frequencyStatus);
	
	    if ($audio_id > 1) {
        $response["error"] = false;
        $response["message"] = "audio created successfully";
        $response["audio_id"] = $audio_id;
        error_log( print_R("audio created: $audio_id\n", TRUE ), 3, LOG);
        echoRespnse(201, $response);
    } else if ($audio_id == 1) {
        $response["error"] = false;
        $response["message"] = "audio updated successfully";
        error_log( print_R("audio already existed\n", TRUE ), 3, LOG);
        echoRespnse(201, $response);
    } else {
        error_log( print_R("after audio result bad\n", TRUE), 3, LOG);
        error_log( print_R( $audio_id, TRUE), 3, LOG);
        $response["error"] = true;
        $response["message"] = "Failed to create audio. Please try again";
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
	
	$datetime  = (isset($dataJsonDecode->hive->datetime)? $dataJsonDecode->hive->datetime : "");
    $hiveID   = (isset($dataJsonDecode->hive->hiveID)? $dataJsonDecode->hive->hiveID : "");
    $name = (isset($dataJsonDecode->hive->name) ? $dataJsonDecode->hive->name : "");
	$weight = (isset($dataJsonDecode->hive->weight) ? $dataJsonDecode->hive->weight : "");
	$humidity = (isset($dataJsonDecode->hive->humidity) ? $dataJsonDecode->hive->humidity : "");	
	$temp = (isset($dataJsonDecode->hive->temp) ? $dataJsonDecode->hive->temp : "");
	
	
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
	
	$datetime  = (isset($dataJsonDecode->light->datetime) ? $dataJsonDecode->light->datetime : "");
    $hiveID      = (isset($dataJsonDecode->light->hiveID)      ? $dataJsonDecode->light->hiveID : "");
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
	
	$db = new BeeDbHandler();
	$response = array();
	
	//Updates Task
	$otemp_id = $db->updateOutsideTemp($datetime, $temp);
	
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
	
	$datetime  = (isset($dataJsonDecode->population->datetime) ? $dataJsonDecode->population->datetime : "");
    $hiveID      = (isset($dataJsonDecode->population->hiveID)      ? $dataJsonDecode->population->hiveID : "");
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


?>
