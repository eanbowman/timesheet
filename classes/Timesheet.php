<?php
/**
 * Timesheet - handles the modification and display of timesheets
 */
 
class Timesheet {
	
    /**
     * @var object The database connection
     */
    private $db_connection = null;
    /**
     * @var array Collection of error messages
     */
    public $errors = array();
    /**
     * @var array Collection of success / neutral messages
     */
    public $messages = array();

    /**
     * the function "__construct()" automatically starts whenever an object of this class is created
     */
    public function __construct()
    {
		// create a database connection, using the constants from config/db.php (which we loaded in index.php)
        $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DOCKET_DB_NAME);
    
        // change character set to utf8 and check it
        if (!$this->db_connection->set_charset("utf8")) {
            $this->errors[] = $this->db_connection->error;
        }

        // if no connection errors (= working database connection)
        if ($this->db_connection->connect_errno) {
        	$this->errors[] = "Unable to connect to database.";
        	$this->errors[] = "DB: " . $this->db_connection->errors;
        }
    }
	
    /**
     * return a list of timesheets
     */
    public function show()
    {
    	$sql = "SELECT * FROM `time_timesheet` ORDER BY `date` DESC,`id` DESC";
    	$result = $this->db_connection->query($sql);
    	while($result_row = $result->fetch_object() ) {
    		$output[] = $result_row;
    	}
    	$errors[] = $this->db_connection->errors;
    	return $output;
    }
	
    /**
     * return a single timesheet
     */
    public function get( $id = -1 ) {
    	if( $id != -1 ) {
			$sql = "SELECT * FROM `time_timesheet` WHERE `id`=" . $id;
			$result = $this->db_connection->query($sql);
			if($result && $result_row = $result->fetch_object() ) {
				$output[] = $result_row;
			}
			$this->errors[] = $this->db_connection->error;
		} else {
			$this->errors[] = "Invalid ID provided.";
		}
    	return $output;
    }
    
    /**
     * return most recent inserted ID
     */
    public function getLastInsertID() {
    	$output = $this->db_connection->insert_id;
    	return $output;  
    }
    
    /**
     * save the updates to a single timesheet
     */
    public function set( $id = -1 ) {
    	if( $id != -1 ) {
			$sql = "UPDATE `time_timesheet` SET ";
			$sql .= "`docketID`=?,`date`=?,`start`=?,`end`=?,`empID`=?,";
			$sql .= "`description`=?,`task`=?,`lastModified`=?,`subtask`=? WHERE id=?";
			if (!($stmtUpdate = $this->db_connection->prepare($sql))) {
				$this->errors[] = "Prepare failed: (" . $this->db_connection->errno . ") " . $this->db_connection->error;
			}

			if (!$stmtUpdate->bind_param("isssissssi", $_POST['docketID'], $_POST['date'], $_POST['start'], $_POST['end'], $_POST['empID'], $_POST['description'], $_POST['task'], $_POST['lastModified'], $_POST['subtask'], $_POST['id'])) {
				$this->errors[] = "Binding parameters failed: (" . $stmtUpdate->errno . ") " . $stmtUpdate->error;
			}

			if (!$stmtUpdate->execute()) {
				$this->errors[] = "Execute failed: (" . $stmtUpdate->errno . ") " . $stmtUpdate->error;
			}
			
			$this->errors[] = $this->db_connection->error;
		} else {
			$this->errors[] = "Invalid ID provided.";
		}
    	return $output;
    }
     
    /**
     * add a new single timesheet
     */
    public function add() {
    	if($_POST['docketID'] != "" ) {
			$sql = "INSERT INTO `time_timesheet` ";
			$sql .= "(`docketID`,`date`,`start`,`end`,`empID`,`description`,`task`,`subtask`,`isAClientChange`)";
			$sql .= "VALUES (?,?,?,?,?,?,?,?,0)";
			if (!($stmtUpdate = $this->db_connection->prepare($sql))) {
				$this->errors[] = "Prepare failed: (" . $this->db_connection->errno . ") " . $this->db_connection->error;
			}

			$date = new DateTime($_POST['date']);
			$date = $date->format('Y-m-d');
			$start = new DateTime($_POST['start']);
			$start = $start->format('H:i:s');
			$end = new DateTime($_POST['end']);
			$end = $end->format('H:i:s');
		
			if (!$stmtUpdate->bind_param("isssisss", $_POST['docketID'], $date, $start, $end, $_POST['empID'], $_POST['description'], $_POST['task'], $_POST['subtask'])) {
				$this->errors[] = "Binding parameters failed: (" . $stmtUpdate->errno . ") " . $stmtUpdate->error;
			}

			if (!$stmtUpdate->execute()) {
				$this->errors[] = "Execute failed: (" . $stmtUpdate->errno . ") " . $stmtUpdate->error;
			}
		} else {
			$this->errors[] = "Required fields were not filled out.";
		}
		
		$this->errors[] = $this->db_connection->error;
		
    	return $this->getLastInsertID();
    }
    
    /**
     * delete a single timesheet
     */
    public function delete($timesheetID) {
    	if($timesheetID) {
    		$sql = "DELETE FROM `time_timesheet` ";
			$sql .= "WHERE `ID`=?";
			
			if(!($stmtDelete = $this->db_connection->prepare($sql))) {
				$this->errors[] = "Prepare failed: (" . $this->db_connection->errno . ") " . $this->db_connection->error;
			}
			
			if (!$stmtDelete->bind_param("i", $timesheetID)) {
				$this->errors[] = "Binding parameters failed: (" . $stmtUpdate->errno . ") " . $stmtUpdate->error;
			}
			
			if (!$stmtDelete->execute()) {
				$this->errors[] = "Execute failed: (" . $stmtUpdate->errno . ") " . $stmtUpdate->error;
			}
    	}
    }

};
 
?>
