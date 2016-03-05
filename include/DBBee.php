<?php

/**
 * Class to handle all db operations
 * This class will have CRUD methods for database tables
 *
 * @author Ravi Tamada
 * @link URL Tutorial link
 */
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
	
	//gets all data from database
	  public function getAllBeehives() {
        $stmt = $this->conn->prepare("SELECT * FROM hive");
        $stmt->execute();
        $beehives = $stmt->get_result();
        $stmt->close();
	 return $beehives;
     }
	
	//Gets population from database 
	public function getPopulation($thelimit = NULL) {
			error_log( print_R("getPopulation entered\n", TRUE), 3, LOG);
			error_log( print_R("with  thelimit: $thelimit \n", TRUE), 3, LOG);
			
			//get just one record - the most recent			
			$sql = "SELECT * FROM population order by datetime desc ";

			if (strlen($thelimit) > 0  && $thelimit != 'NULL' && $thelimit != 'All') {
				$sql .= " LIMIT " . $thelimit ;
			} 
			
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $populations = $stmt->get_result();
        $stmt->close();
        return $populations;
    }
	
	//Gets Outside temperatures from database
	public function getOutsideTemp($thelimit = NULL) {
			error_log( print_R("getOutsideTemp entered\n", TRUE), 3, LOG);
			error_log( print_R("with  thelimit: $thelimit \n", TRUE), 3, LOG);
			
			//get just one record - the most recent			
			$sql = "SELECT * FROM outsidetemp order by datetime desc ";

			if (strlen($thelimit) > 0  && $thelimit != 'NULL' && $thelimit != 'All') {
				$sql .= " LIMIT " . $thelimit ;
			} 
			
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $outsidetemp = $stmt->get_result();
        $stmt->close();
        return $outsidetemp;
    }
	
	//Get hive temp from database
	public function getHiveTemp($thelimit = NULL) {
			error_log( print_R("getHiveTemp entered\n", TRUE), 3, LOG);
			error_log( print_R("with  thelimit: $thelimit \n", TRUE), 3, LOG);
			
			//get just one record - the most recent			
			$sql = "SELECT * FROM hive order by datetime desc ";

			if (strlen($thelimit) > 0  && $thelimit != 'NULL' && $thelimit != 'All') {
				$sql .= " LIMIT " . $thelimit ;
			} 
			
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $hivetemp = $stmt->get_result();
        $stmt->close();
        return $hivetemp;
    }
	
	//Get Hive Humidity
	public function getHiveHumidity($thelimit = NULL) {
			error_log( print_R("getHiveHumidity entered\n", TRUE), 3, LOG);
			error_log( print_R("with  thelimit: $thelimit \n", TRUE), 3, LOG);
			
			//get just one record - the most recent			
			$sql = "SELECT * FROM hive order by datetime desc ";

			if (strlen($thelimit) > 0  && $thelimit != 'NULL' && $thelimit != 'All') {
				$sql .= " LIMIT " . $thelimit ;
			} 
			
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $hivehumidity = $stmt->get_result();
        $stmt->close();
        return $hivehumidity;
    }
	
	//Get Hive Weight from database
	public function getHiveWeightStatus($thelimit = NULL) {
			error_log( print_R("getHiveWeightStatus entered\n", TRUE), 3, LOG);
			error_log( print_R("with  thelimit: $thelimit \n", TRUE), 3, LOG);
			
			//get just one record - the most recent			
			$sql = "SELECT * FROM hive order by datetime desc ";

			if (strlen($thelimit) > 0  && $thelimit != 'NULL' && $thelimit != 'All') {
				$sql .= " LIMIT " . $thelimit ;
			} 
			
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $HiveWeightStatus = $stmt->get_result();
        $stmt->close();
        return $HiveWeightStatus;
    }
	
	//Get Hive Light from database
	public function getLight($thelimit = NULL) {
			error_log( print_R("getLight entered\n", TRUE), 3, LOG);
			error_log( print_R("with  thelimit: $thelimit \n", TRUE), 3, LOG);
			
			//get just one record - the most recent			
			$sql = "SELECT * FROM lighthistory order by datetime desc ";

			if (strlen($thelimit) > 0  && $thelimit != 'NULL' && $thelimit != 'All') {
				$sql .= " LIMIT " . $thelimit ;
			} 
			
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $light = $stmt->get_result();
        $stmt->close();
        return $light;
    }
	
	//Get Bee Frequency from database
	public function getBeeFrequencyStatus($thelimit = NULL) {
			error_log( print_R("getBeeFrequencyStatus entered\n", TRUE), 3, LOG);
			error_log( print_R("with  thelimit: $thelimit \n", TRUE), 3, LOG);
			
			//get just one record - the most recent			
			$sql = "SELECT * FROM audio order by datetime desc ";

			if (strlen($thelimit) > 0  && $thelimit != 'NULL' && $thelimit != 'All') {
				$sql .= " LIMIT " . $thelimit ;
			} 
			
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $beeFreqStatus = $stmt->get_result();
        $stmt->close();
        return $beeFreqStatus;
    }
	
	
	/*
    public function getStudentLists() {
        $stmt = $this->conn->prepare("SELECT t.* FROM studentlist t order by t.listtype, t.listorder");
        $stmt->execute();
        $slists = $stmt->get_result();
        $stmt->close();
        return $slists;
    }

    public function getAllStudents() {
        $stmt = $this->conn->prepare("SELECT t.* FROM ncontacts t LIMIT 10");
        $stmt->execute();
        $students = $stmt->get_result();
        $stmt->close();
        return $students;
    }



    public function getStudent($student_id) {
        $stmt = $this->conn->prepare("SELECT
                   t.ID,
                   t.LastName,
                   t.FirstName,
                   t.Email,
                   t.Email2,
                   t.Parent,
                   t.Phone,
                   t.AltPhone,
                   t.Address,
                   t.City,
                   t.State,
                   t.ZIP,
                   t.Notes,
                   DATE_FORMAT(t.Birthday, '%Y-%m-%d'),
                   t.NewRank,
                   t.BeltSize,
                   t.CurrentRank,
                   t.LastPromoted,
                   t.InstructorPaymentFree,
                   t.ContactType,
                   t.include,
                   t.InstructorFlag,
                   t.quickbooklink,
                   t.instructorTitle,
                   t.testDate,
                   t.testTime,
                   t.bdayinclude,
                   t.sex,
                   t.medicalConcerns,
                   t.GuiSize,
                   t.ShirtSize,
                   t.phoneExt,
                   t.altPhoneExt,
                   t.CurrentReikiRank,
                   t.StudentSchool,
                   t.EmergencyContact,
                   t.CurrentIARank,
                   t.ReadyForNextRank,
                   t.pictureurl,
                   t.nextScheduledTest
        from ncontacts t WHERE t.ID = ? ");
        $stmt->bind_param("i", $student_id);
        if ($stmt->execute()) {
            $res = array();
            $stmt->bind_result(
                //           $id, $student, $status, $created_at
                $ID,
                $LastName,
                $FirstName,
                $Email,
                $Email2,
                $Parent,
                $Phone,
                $AltPhone,
                $Address,
                $City,
                $State,
                $ZIP,
                $Notes,
                $Birthday,
                $NewRank,
                $BeltSize,
                $CurrentRank,
                $LastPromoted,
                $InstructorPaymentFree,
                $ContactType,
                $include,
                $InstructorFlag,
                $quickbooklink,
                $instructorTitle,
                $testDate,
                $testTime,
                $bdayinclude,
                $sex,
                $medicalConcerns,
                $GuiSize,
                $ShirtSize,
                $phoneExt,
                $altPhoneExt,
                $CurrentReikiRank,
                $StudentSchool,
                $EmergencyContact,
                $CurrentIARank,
                $ReadyForNextRank,
                $pictureurl,
                $nextScheduledTest
            );
            // TODO
            // $student = $stmt->get_result()->fetch_assoc();
            $stmt->fetch();
            //          $res["id"] = $id;
            //          $res["student"] = $student;
            //          $res["status"] = $status;
            //          $res["created_at"] = $created_at;
            $res["ID"] = $ID;
            $res["LastName"] = $LastName;
            $res["FirstName"] = $FirstName;
            $res["Email"] = $Email;
            $res["Email2"] = $Email2;
            $res["Parent"] = $Parent;
            $res["Phone"] = $Phone;
            $res["AltPhone"] = $AltPhone;
            $res["Address"] = $Address;
            $res["City"] = $City;
            $res["State"] = $State;
            $res["ZIP"] = $ZIP;
            $res["Notes"] = $Notes;
            $res["Birthday"] = $Birthday;
            $res["NewRank"] = $NewRank;
            $res["BeltSize"] = $BeltSize;
            $res["CurrentRank"]= $CurrentRank;
            $res["LastPromoted"] = $LastPromoted;
            $res["InstructorPaymentFree"] = $InstructorPaymentFree;
            $res["ContactType"] = $ContactType;
            $res["include"] = $include;
            $res["InstructorFlag"] = $InstructorFlag;
            $res["quickbooklink"] = $quickbooklink;
            $res["instructorTitle"] = $instructorTitle;
            $res["testDate"]= $testDate;
            $res["testTime"] = $testTime;
            $res["bdayinclude"] = $bdayinclude;
            $res["sex"] = $sex;
            $res["medicalConcerns"] = $medicalConcerns;
            $res["GuiSize"]= $GuiSize;
            $res["ShirtSize"] = $ShirtSize;
            $res["phoneExt"] = $phoneExt;
            $res["altPhoneExt"] = $altPhoneExt;
            $res["CurrentReikiRank"] = $CurrentReikiRank;
            $res["StudentSchool"] = $StudentSchool;
            $res["EmergencyContact"] = $EmergencyContact;
            $res["CurrentIARank"] = $CurrentIARank;
            $res["ReadyForNextRank"] = $ReadyForNextRank;
            $res["pictureurl"] = $pictureurl;
            $res["nextScheduledTest"] = $nextScheduledTest;
            $stmt->close();
            return $res;
        } else {
            return NULL;
        }
    }

    public function updateStudent($student_id,
                                  $LastName,
                                  $FirstName,
                                  $Email,
                                  $Email2,
                                  $Phone,
                                  $AltPhone,
                                  $phoneExt,
                                  $altPhoneExt,
                                  $Birthday,
                                  $sex,
                                  $Parent,
                                  $EmergencyContact,
                                  $Notes,
                                  $medicalConcerns,
                                  $Address,
                                  $City,
                                  $State,
                                  $ZIP,
                                  $ContactType,
                                  $quickbooklink,
                                  $StudentSchool,
                                  $GuiSize,
                                  $ShirtSize,
                                  $BeltSize,
                                  $InstructorPaymentFree,
                                  $InstructorFlag,
                                  $instructorTitle,
                                  $CurrentRank,
                                  $CurrentReikiRank,
                                  $pictureurl,
                                  $CurrentIARank    ) {
        $num_affected_rows = 0;

        $sql = "UPDATE ncontacts t set ";
        $sql .= " t.LastName = ?,";
        $sql .= " t.FirstName = ?,";
        $sql .= " t.Email = ?,";
        $sql .= " t.Email2 = ?,";
        $sql .= " t.Phone = ?,";
        $sql .= " t.AltPhone = ?,";
        $sql .= " t.phoneExt = ?,";
        $sql .= " t.altPhoneExt = ?,";
        $sql .= " t.Birthday = ?,";
        $sql .= " t.sex = ?,";
        $sql .= " t.Parent = ?,";
        $sql .= " t.EmergencyContact = ?,";
        $sql .= " t.Notes = ?,";
        $sql .= " t.medicalConcerns = ?,";
        $sql .= " t.Address = ?,";
        $sql .= " t.City = ?,";
        $sql .= " t.State = ?,";
        $sql .= " t.ZIP = ?,";
        $sql .= " t.ContactType = ?,";
        $sql .= " t.quickbooklink = ?,";
        $sql .= " t.StudentSchool = ?,";
        $sql .= " t.GuiSize = ?,";
        $sql .= " t.ShirtSize = ?,";
        $sql .= " t.BeltSize = ?,";
        $sql .= " t.InstructorPaymentFree = ?,";
        //$sql .= " t.InstructorFlag = ?,";
        $sql .= " t.instructorTitle = ?,";
        $sql .= " t.CurrentRank = ?,";
        $sql .= " t.CurrentReikiRank = ?,";
        $sql .= " t.pictureurl = ?,";
        $sql .= " t.CurrentIARank = ? ";


        $sql .= " where ID = ? ";

        error_log( print_R($sql, TRUE ));
        error_log( print_R($LastName, TRUE ));
        error_log( print_R($FirstName, TRUE ));
        error_log( print_R($Email, TRUE ));
        error_log( print_R($Email2, TRUE ));
        error_log( print_R($Phone, TRUE ));
        error_log( print_R($AltPhone, TRUE ));
        error_log( print_R($phoneExt, TRUE ));
        error_log( print_R($altPhoneExt, TRUE ));
        error_log( print_R($Birthday, TRUE ));
        error_log( print_R($sex, TRUE ));
        error_log( print_R($Parent, TRUE ));
        error_log( print_R($EmergencyContact, TRUE ));
        error_log( print_R($Notes, TRUE ));
        error_log( print_R($medicalConcerns, TRUE ));
        error_log( print_R($Address, TRUE ));
        error_log( print_R($City, TRUE ));
        error_log( print_R($State, TRUE ));
        error_log( print_R($ZIP, TRUE ));
        error_log( print_R($ContactType, TRUE ));
        error_log( print_R($quickbooklink, TRUE ));
        error_log( print_R($StudentSchool, TRUE ));
        error_log( print_R($GuiSize, TRUE ));
        error_log( print_R($ShirtSize, TRUE ));
        error_log( print_R($BeltSize, TRUE ));
        error_log( print_R($InstructorPaymentFree, TRUE ));
        error_log( print_R($InstructorFlag, TRUE ));
        error_log( print_R($instructorTitle, TRUE ));
        error_log( print_R($CurrentRank, TRUE ));
        error_log( print_R($CurrentReikiRank, TRUE ));
        error_log( print_R($pictureurl, TRUE ));
        error_log( print_R($CurrentIARank, TRUE ));
        error_log( print_R($student_id, TRUE ));

        //       try {
        if ($stmt = $this->conn->prepare($sql)) {
            $stmt->bind_param("sssssssssssssssssssssssdisssssi",
                              $LastName,
                              $FirstName    ,
                              $Email    ,
                              $Email2    ,
                              $Phone    ,
                              $AltPhone    ,
                              $phoneExt    ,
                              $altPhoneExt    ,
                              $Birthday    ,
                              $sex    ,
                              $Parent    ,
                              $EmergencyContact    ,
                              $Notes    ,
                              $medicalConcerns    ,
                              $Address    ,
                              $City    ,
                              $State    ,
                              $ZIP    ,
                              $ContactType    ,
                              $quickbooklink    ,
                              $StudentSchool    ,
                              $GuiSize    ,
                              $ShirtSize    ,
                              $BeltSize    ,
                              $InstructorPaymentFree    ,
                              //            $InstructorFlag    ,
                              $instructorTitle    ,
                              $CurrentRank    ,
                              $CurrentReikiRank    ,
                              $pictureurl,
                              $CurrentIARank    ,
                              $student_id    );
            $stmt->execute();
            $num_affected_rows = $stmt->affected_rows;
            $stmt->close();

        } else {
            printf("Errormessage: %s\n", $this->conn->error);
        }
        //handled in common function
        //echo json_encode($student);
        //        }
        //        catch(PDOException $e) {
        //            echo '{"error":{"text":'. $e->getMessage() .'}}';
        //       }
        return $num_affected_rows > 0;
    }
*/

}
?>
