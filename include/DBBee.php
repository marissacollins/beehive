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


}
?>
