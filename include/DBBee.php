<?php

/**
 *Class to handle all db operations
 *This class will have CRUD methods for database tables
 * @author Ravi Tamada
 * @link URL Tutorial link
 */

 //Handles the database interactions
class BeeDbHandler {
    private $conn;
    function __construct() {
        require_once dirname(__FILE__) . '/DbConnect.php';
        // opening db connection
        $db = new DbConnect();
        $this->conn = $db->connect();
    }

	/* DATABASE QUERIES - Use each function to pull the different 
	characteristics off of the database, use the 
	limit to set how many you want to go back*/

	public function getHiveList() {
        $stmt = $this->conn->prepare("SELECT distinct hiveid, name FROM hive");
        $stmt->execute();
        $hiveIdList = $stmt->get_result();
        $stmt->close();
	 return $hiveIdList;
     }
	public function getAllBeehives() {
        $stmt = $this->conn->prepare("SELECT * FROM hive");
        $stmt->execute();
        $beehives = $stmt->get_result();
        $stmt->close();
	 return $beehives;
     }
	
	public function getPopulation($thelimit = NULL,$thehive = NULL) {
			error_log( print_R("getPopulation entered\n", TRUE), 3, LOG);
			error_log( print_R("with  thelimit: $thelimit \n", TRUE), 3, LOG);
			error_log( print_R("with  thehive: $thehive \n", TRUE), 3, LOG);
			
			//get all hive pops up to the limit of records optionally for a hive		
			$sql = "SELECT * FROM population ";

			if (strlen($thehive) > 0  && $thehive != 'NULL' && $thehive != 'All') {
				$sql .= " where hiveid =  " . $thehive ;
			} 

			$sql .= " order by datetime desc ";

			if (strlen($thelimit) > 0  && $thelimit != 'NULL' && $thelimit != 'All') {
				$sql .= " LIMIT " . $thelimit ;
			} 
			
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $populations = $stmt->get_result();
        $stmt->close();
        return $populations;
    }
	public function getOutsideTemp($thelimit = NULL) {
			error_log( print_R("getOutsideTemp entered\n", TRUE), 3, LOG);
			error_log( print_R("with  thelimit: $thelimit \n", TRUE), 3, LOG);
			//error_log( print_R("with  thehive: $thehive \n", TRUE), 3, LOG);
			
			//get just one record - the most recent			
			$sql = "SELECT * FROM outsidetemp  order by datetime desc ";

			if (strlen($thelimit) > 0  && $thelimit != 'NULL' && $thelimit != 'All') {
				$sql .= " LIMIT " . $thelimit ;
			} 
			
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $outsidetemp = $stmt->get_result();
        $stmt->close();
        return $outsidetemp;
    }
	public function getHiveTemp($thelimit = NULL,$thehive = NULL) {
			error_log( print_R("getHiveTemp entered\n", TRUE), 3, LOG);
			error_log( print_R("with  thelimit: $thelimit \n", TRUE), 3, LOG);
			error_log( print_R("with  thehive: $thehive \n", TRUE), 3, LOG);
			
			//get all hive temps up to the limit of records optionally for a hive			
			$sql = "SELECT * FROM hive ";

			if (strlen($thehive) > 0  && $thehive != 'NULL' && $thehive != 'All') {
				$sql .= " where hiveid =  " . $thehive ;
			} 

			$sql .= " order by datetime desc ";

			if (strlen($thelimit) > 0  && $thelimit != 'NULL' && $thelimit != 'All') {
				$sql .= " LIMIT " . $thelimit ;
			}
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $hivetemp = $stmt->get_result();
        $stmt->close();
        return $hivetemp;
    }
	public function getHiveHumidity($thelimit = NULL, $thehive = NULL) {
			error_log( print_R("getHiveHumidity entered\n", TRUE), 3, LOG);
			error_log( print_R("with  thelimit: $thelimit \n", TRUE), 3, LOG);
			error_log( print_R("with  thehive: $thehive \n", TRUE), 3, LOG);
			
			//get all hive temps up to the limit of records optionally for a hive			
			$sql = "SELECT * FROM hive ";

			if (strlen($thehive) > 0  && $thehive != 'NULL' && $thehive != 'All') {
				$sql .= " where hiveid =  " . $thehive  ;
			} 

			$sql .= "  order by datetime desc ";

			if (strlen($thelimit) > 0  && $thelimit != 'NULL' && $thelimit != 'All') {
				$sql .= " LIMIT " . $thelimit ;
			} 
			
			error_log( print_R("with  sql: $sql \n", TRUE), 3, LOG);
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $hivehumidity = $stmt->get_result();
        $stmt->close();
        return $hivehumidity;
    }
	public function getHiveWeightStatus($thelimit = NULL, $thehive=NULL) {
			error_log( print_R("getHiveWeightStatus entered\n", TRUE), 3, LOG);
			error_log( print_R("with  thelimit: $thelimit \n", TRUE), 3, LOG);
			error_log( print_R("with  thehive: $thehive \n", TRUE), 3, LOG);
			
			//get just one record - the most recent			

			$sql = "Select `frameweight1`, `frameweight2`, `frameweight3`, `frameweight4`, `frameweight5`, ";
			$sql .= " `frameweight6`, `frameweight7`, `frameweight8`, (`frameweight1` + `frameweight2`+ `frameweight3`+ ";
			$sql .= " `frameweight4` + `frameweight5` + `frameweight6` + `frameweight7` + `frameweight8` ) as frameweightsum , ";
			$sql .= " `datetime`, `hiveid` from frameweight ";
			 
			if (strlen($thehive) > 0  && $thehive != 'NULL' && $thehive != 'All') {
				$sql .= " where hiveid =  " . $thehive ;
			} 
			
			$sql .= " order by datetime desc ";

			if (strlen($thelimit) > 0  && $thelimit != 'NULL' && $thelimit != 'All') {
				$sql .= " LIMIT " . $thelimit ;
			} 
			
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $HiveWeightStatus = $stmt->get_result();
        $stmt->close();
        return $HiveWeightStatus;
    }
	public function getLight($thelimit = NULL,$thehive = NULL) {
			error_log( print_R("getLight entered\n", TRUE), 3, LOG);
			error_log( print_R("with  thelimit: $thelimit \n", TRUE), 3, LOG);
			error_log( print_R("with  thehive: $thehive \n", TRUE), 3, LOG);
			
			//get all hive temps up to the limit of records optionally for a hive			
			$sql = "SELECT * FROM lighthistory ";

			if (strlen($thehive) > 0  && $thehive != 'NULL' && $thehive != 'All') {
				$sql .= " where hiveid =  " . $thehive ;
			} 

			$sql .= " order by datetime desc ";

			if (strlen($thelimit) > 0  && $thelimit != 'NULL' && $thelimit != 'All') {
				$sql .= " LIMIT " . $thelimit ;
			} 
			
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $light = $stmt->get_result();
        $stmt->close();
        return $light;
    }
	public function getBeeFrequencyStatus($thelimit = NULL,$thehive = NULL) {
			error_log( print_R("getBeeFrequencyStatus entered\n", TRUE), 3, LOG);
			error_log( print_R("with  thelimit: $thelimit \n", TRUE), 3, LOG);
			error_log( print_R("with  thehive: $thehive \n", TRUE), 3, LOG);

			//get all hive temps up to the limit of records optionally for a hive			
			$sql = "SELECT * FROM audio ";
			if (strlen($thehive) > 0  && $thehive != 'NULL' && $thehive != 'All') {
				$sql .= " where hiveid =  " . $thehive ;
			} 

			$sql .= " order by datetime desc ";

			if (strlen($thelimit) > 0  && $thelimit != 'NULL' && $thelimit != 'All') {
				$sql .= " LIMIT " . $thelimit ;
			}
			
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $beeFreqStatus = $stmt->get_result();
        $stmt->close();
        return $beeFreqStatus;
    }

	//Check for duplicate records in each table in the database
	private function doesAudioIDExist($hiveID, $datetime){
		
		error_log( print_R("before doesAudioIDExist\n", TRUE ), 3, LOG);
		error_log( print_R("hiveID: $hiveID\n", TRUE ), 3, LOG);
		error_log( print_R("datetime: $datetime\n", TRUE ), 3, LOG);
	
	    $stmt = $this->conn->prepare("SELECT hiveID from audio WHERE hiveID = ? and datetime = ?");
        $stmt->bind_param("ss", $hiveID, $datetime);
        $stmt->execute();
        $stmt->store_result();
        $num_rows = $stmt->num_rows;
        $stmt->close();
        return $num_rows > 0;
	
	}
	private function doesFWIDExist($hiveID, $datetime){
		
		error_log( print_R("before doesFWIDExist\n", TRUE ), 3, LOG);
		error_log( print_R("hiveid: $hiveID\n", TRUE ), 3, LOG);
		error_log( print_R("datetime: $datetime\n", TRUE ), 3, LOG);
	
	    $stmt = $this->conn->prepare("SELECT hiveID from frameweight WHERE hiveID = ? and datetime = ?");
        $stmt->bind_param("ss", $hiveID, $datetime);
        $stmt->execute();
        $stmt->store_result();
        $num_rows = $stmt->num_rows;
        $stmt->close();
        return $num_rows > 0;
	
	}
	private function doesHiveIDExist($hiveID, $datetime){
		
		error_log( print_R("before doesHiveIDExist\n", TRUE ), 3, LOG);
		error_log( print_R("hiveID: $hiveID\n", TRUE ), 3, LOG);
		error_log( print_R("datetime: $datetime\n", TRUE ), 3, LOG);
	
	    $sql ="SELECT hiveID from hive WHERE hiveID = ? and datetime = ?";
		if ($stmt = $this->conn->prepare($sql)) {
			$stmt->bind_param("ss", $hiveID, $datetime);
			$stmt->execute();
			$stmt->store_result();
			$num_rows = $stmt->num_rows;
			$stmt->close();
			error_log( print_R("hiveidexist result: $num_rows\n", TRUE ), 3, LOG);
			return $num_rows > 0;
		}
		else{
			printf("Errormessage: %s\n", $this->conn->error);
			return false;
		}
	
	}
	private function doesHiveNameExist($name, $datetime){
		
		error_log( print_R("before doesHiveNameExist\n", TRUE ), 3, LOG);
		error_log( print_R("name: $name\n", TRUE ), 3, LOG);
		error_log( print_R("datetime: $datetime\n", TRUE ), 3, LOG);

		$sql = "SELECT name from hive WHERE name = ? and datetime = ?";
	
	    if( $stmt = $this->conn->prepare($sql)){
        $stmt->bind_param("ss", $name, $datetime);
        $stmt->execute();
        $stmt->store_result();
        $num_rows = $stmt->num_rows;
        $stmt->close();
		error_log( print_R("hivenameexist result: $num_rows\n", TRUE ), 3, LOG);
        return $num_rows > 0;
		}
		else{
			printf("Errormessage: %s\n", $this->conn->error);
			return false;
		}
	
	}
	private function doesLightIDExist($hiveID, $datetime){
		
		error_log( print_R("before doesLightID1Exist\n", TRUE ), 3, LOG);
		error_log( print_R("hiveID: $hiveID\n", TRUE ), 3, LOG);
		error_log( print_R("datetime: $datetime\n", TRUE ), 3, LOG);
	
	    $stmt = $this->conn->prepare("SELECT hiveID from lighthistory WHERE hiveID = ? and datetime = ?");
        $stmt->bind_param("ss", $hiveID, $datetime);
        $stmt->execute();
        $stmt->store_result();
        $num_rows = $stmt->num_rows;
        $stmt->close();
        return $num_rows > 0;
	
	}
	private function doesLightLumenExist($lumen, $datetime){
		
		error_log( print_R("before doesLightID2Exist\n", TRUE ), 3, LOG);
		error_log( print_R("lumen: $lumen\n", TRUE ), 3, LOG);
		error_log( print_R("datetime: $datetime\n", TRUE ), 3, LOG);
	
	    $stmt = $this->conn->prepare("SELECT datetime from lighthistory WHERE datetime = ? and lumen = ?");
        $stmt->bind_param("ss", $datetime, $lumen);
        $stmt->execute();
        $stmt->store_result();
        $num_rows = $stmt->num_rows;
        $stmt->close();
        return $num_rows > 0;
	
	}
	private function doesOTempExist($datetime){
		
		error_log( print_R("before doesOTempExist\n", TRUE ), 3, LOG);
		error_log( print_R("datetime: $datetime\n", TRUE ), 3, LOG);
	
	    $stmt = $this->conn->prepare("SELECT datetime from outsidetemp WHERE datetime = ?");
        $stmt->bind_param("s", $datetime);
        $stmt->execute();
        $stmt->store_result();
        $num_rows = $stmt->num_rows;
        $stmt->close();
        return $num_rows > 0;
	
	}
	private function doesPopIDExist($hiveID, $datetime){
		
		error_log( print_R("before doesPopIDExist\n", TRUE ), 3, LOG);
		error_log( print_R("hiveID: $hiveID\n", TRUE ), 3, LOG);
		error_log( print_R("datetime: $datetime\n", TRUE ), 3, LOG);
	
	    $stmt = $this->conn->prepare("SELECT hiveID from population WHERE hiveID = ? and datetime = ?");
        $stmt->bind_param("ss", $hiveID, $datetime);
        $stmt->execute();
        $stmt->store_result();
        $num_rows = $stmt->num_rows;
        $stmt->close();
        return $num_rows > 0;
	
	}
	
	
	//INSERT STATEMENT FUNCTIONS
	public function createAudio($datetime, $hiveID, $frequencyStatus){
		
		error_log( print_R("createAudio entered: date: $datetime freq: $frequencyStatus\n", TRUE ),3, LOG);
		
		$response = array();
		
		$sql = "INSERT INTO audio (datetime, hiveID, frequencyStatus)VALUES ";
		$sql .= "(?,?,?)";
		
		//Check if hiveID already exists in database
		if (!$this->doesAudioIDExist($hiveID, $datetime)){
			if ($stmt = $this->conn->prepare($sql)) {
                $stmt->bind_param("sss", $datetime, $hiveID, $frequencyStatus);
				//Check if it inserted correctly
				$stmt->execute();
                $num_affected_rows = $stmt->affected_rows;
                error_log( print_R("createAudio numrows: $num_affected_rows\n", TRUE ),3, LOG);
                $stmt->close();
                return $num_affected_rows >= 0;
			}
			else{
				printf("Errormessage: %s\n", $this->conn->error);
                return NULL;
			}
		}
		else{
			// datetime with same hiveID existed
            return RECORD_ALREADY_EXISTED;
		}
		
		return $response;
	}
	public function createFrameWeight($datetime, $hiveID, $frameweight1, $frameweight2, $frameweight3, $frameweight4, $frameweight5, $frameweight6, $frameweight7, $frameweight8){
		
		error_log( print_R("createFrameWeight entered\n", TRUE ),3, LOG);
		
		$response = array();
		
		$sql = "INSERT INTO frameweight (datetime, hiveID, frameweight1, frameweight2, frameweight3, frameweight4, frameweight5, frameweight6, frameweight7, frameweight8) VALUES ";
		$sql .= "(?,?, ";
		$sql .= " ?,?,?,?, ";
		$sql .= " ?,?,?,?)";
		
		//Check if hiveID already exists in database
		if (!$this->doesFWIDExist($hiveID, $datetime)){
			if ($stmt = $this->conn->prepare($sql)) {
                $stmt->bind_param("ssssssssss", $datetime, $hiveID, $frameweight1, $frameweight2, $frameweight3, $frameweight4, $frameweight5, $frameweight6, $frameweight7, $frameweight8);
				//Check if it inserted correctly
				$stmt->execute();
                $num_affected_rows = $stmt->affected_rows;
                $stmt->close();
                return $num_affected_rows >= 0;
			}
			else{
				printf("Errormessage: %s\n", $this->conn->error);
                return NULL;
			}
		}
		else{
			// datetime with same hiveID existed
            return RECORD_ALREADY_EXISTED;
		}
		
		return $response;
	}
	public function createHive($hiveID, $name, $datetime, $temp, $humidity){
		
		error_log( print_R("createHive entered\n", TRUE ),3, LOG);
		
		$response = array();
		
		$sql = "INSERT INTO hive (hiveID, name, datetime, temp, humidity)VALUES ";
		$sql .= "(?,?,? ";
		$sql .= " ,?,?)";
		
		//Check if hiveID already exists in database
		if (!$this->doesHiveIDExist($hiveID, $datetime) && !$this->doesHiveNameExist($name, $datetime)){
			error_log( print_R("createHive about to prepare stmt\n", TRUE ),3, LOG);
			if ($stmt = $this->conn->prepare($sql)) {
                $stmt->bind_param("sssss", $hiveID, $name, $datetime, $temp, $humidity);
				error_log( print_R("createHive about to insert\n", TRUE ),3, LOG);
				//Check if it inserted correctly
				$stmt->execute();
                $num_affected_rows = $stmt->affected_rows;
                $stmt->close();
                return $num_affected_rows >= 0;
			}
			else{
				$e = sprintf("Errormessage: %s\n", $this->conn->error);
				error_log( print_R("createHive prep sql failed: $e\n", TRUE ),3, LOG);
				printf("Errormessage: %s\n", $this->conn->error);
                return NULL;
			}
		}
		else{
			error_log( print_R("createHive exist failed\n", TRUE ),3, LOG);
			// datetime with same hiveID existed
            return RECORD_ALREADY_EXISTED;
		}
		
		return $response;
	}
	public function createLightHistory($hiveID, $datetime, $lumen){
		
		error_log( print_R("createLightHistory entered\n", TRUE ),3, LOG);
		
		$response = array();
		
		$sql = "INSERT INTO lighthistory (hiveID, datetime, lumen)VALUES ";
		$sql .= "(?,?,?)";
		
		//Check if hiveID already exists in database
		if (!$this->doesLightIDExist($hiveID, $datetime) && !$this->doesLightLumenExist($lumen, $datetime)){
			if ($stmt = $this->conn->prepare($sql)) {
                $stmt->bind_param("sss", $hiveID, $datetime, $lumen);
				//Check if it inserted correctly
				$stmt->execute();
                $num_affected_rows = $stmt->affected_rows;
                $stmt->close();
                return $num_affected_rows >= 0;
			}
			else{
				printf("Errormessage: %s\n", $this->conn->error);
                return NULL;
			}
		}
		else{
			// datetime with same hiveID existed
            return RECORD_ALREADY_EXISTED;
		}
		
		return $response;
	}	
	public function createOutsideTemp($datetime, $temp){
		
		error_log( print_R("createOutsideTemp entered\n", TRUE ),3, LOG);
		
		$response = array();
		
		$sql = "INSERT INTO outsidetemp (datetime, temp)VALUES ";
		$sql .= "(?,?)";
		
		//Check if hiveID already exists in database
		if (!$this->doesOTempExist($datetime)){
			if ($stmt = $this->conn->prepare($sql)) {
                $stmt->bind_param("ss", $datetime, $temp);
				//Check if it inserted correctly
				$stmt->execute();
                $num_affected_rows = $stmt->affected_rows;
                $stmt->close();
                return $num_affected_rows >= 0;
			}
			else{
				printf("Errormessage: %s\n", $this->conn->error);
                return NULL;
			}
		}
		else{
			// datetime with same hiveID existed
            return RECORD_ALREADY_EXISTED;
		}
		
		return $response;
	}
	public function createPopulation($hiveID, $datetime, $count){
		
		error_log( print_R("createPopulation entered\n", TRUE ),3, LOG);
		
		$response = array();
		
		$sql = "INSERT INTO population (hiveID, datetime, count)VALUES ";
		$sql .= "(?,?,?)";
		
		//Check if hiveID already exists in database
		if (!$this->doesPopIDExist($hiveID, $datetime)){
			if ($stmt = $this->conn->prepare($sql)) {
                $stmt->bind_param("sss", $hiveID, $datetime, $count);
				//Check if it inserted correctly
				$stmt->execute();
                $num_affected_rows = $stmt->affected_rows;
                $stmt->close();
                return $num_affected_rows >= 0;
			}
			else{
				printf("Errormessage: %s\n", $this->conn->error);
                return NULL;
			}
		}
		else{
			// datetime with same hiveID existed
            return RECORD_ALREADY_EXISTED;
		}
		
		return $response;
	}	
	
}
?>
