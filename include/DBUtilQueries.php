<?php
/**
 * Class to handle all db operations
 * This class will have CRUD methods for database tables
 *
 * @author Ravi Tamada
 * @link URL Tutorial link
 */
class UtilDbHandler {

    private $conn;

    function __construct() {
        require_once dirname(__FILE__) . '/DbConnect.php';
        // opening db connection
        $db = new DbConnect();
        $this->conn = $db->connect();
    }


     /**
     * Fetching all zips
     */
    public function getAllZips() {
        $stmt = $this->conn->prepare("SELECT t.* FROM zipcity t");
        $stmt->execute();
        $zips = $stmt->get_result();
        $stmt->close();
        return $zips;
    }
}
?>
