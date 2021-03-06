<?php
/**
 * User - handles the modification and display of users
 */
 
class User {
	
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
        $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    
        // change character set to utf8 and check it
        if (!$this->db_connection->set_charset("utf8mb4")) {
            $this->errors[] = $this->db_connection->error;
        }

        // if no connection errors (= working database connection)
        if ($this->db_connection->connect_errno) {
        	$errors[] = "Unable to connect to database.";
        	$errors[] = "DB: " . $this->db_connection->errors;
        }
    }
	
    /**
     * return a list of users
     */
    public function show()
    {
    	$sql = "SELECT * FROM `users`";
    	$result = $this->db_connection->query($sql);
    	while( $result_row = $result->fetch_object() ) {
    		$output[] = $result_row;
    	}
    	$errors[] = $this->db_connection->errors;
    	return $output;
    }

};
 
?>
