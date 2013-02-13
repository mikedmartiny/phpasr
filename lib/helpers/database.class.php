<?php
/**
 * @package phpasr
 * @author Thomas Palmer
 * @version v1.0.0 13/02/2013 NEW FILE
 */

class database {
	/** 
	 * - Database User
	 * -----------------------------------------------------------
	 *
	 * Create a variable to store the username for database access
	 *
	 */
	private $db_user;

	/** 
	 * - Database Pass
	 * -----------------------------------------------------------
	 *
	 * Create another credential variable to store the database 
	 * users password.
	 *
	 */
	private $db_pass;

	/** 
	 * - Database Name
	 * -----------------------------------------------------------
	 *
	 * Yet another credential variable for the name of the 
	 * database that we want to access.
	 *
	 */
	private $db_name;

	/** 
	 * - Database Host
	 * -----------------------------------------------------------
	 *
	 * One final variable to stored database credentials.
	 *
	 */
	private $db_host;

	/** 
	 * - Database Port
	 * -----------------------------------------------------------
	 *
	 * I lied, we also need to define the port for PDO, sometimes
	 * we'll end up with different port numbers than the default 
	 * which is 3306.
	 *
	 */
	private $db_port;

	/** 
	 * - PDO Class
	 * -----------------------------------------------------------
	 *
	 * Now we're moving onto holding the database PDO class.
	 *
	 */
	public $pdo;

	/** 
	 * - Statement Execution
	 * -----------------------------------------------------------
	 *
	 * We need a variable to store the statement while we prepare
	 * We then use this to store the results
	 *
	 */
	private $statement;

	public function __construct($db_config) {
		/** 
		 * - Configure Database Credential Information
		 * -----------------------------------------------------------
		 *
		 * Let's configure our database information so that we can use
		 * the same instance of this class over and over
		 *
		 */
		$this->db_user = $db_config['db_user'];
		$this->db_pass = $db_config['db_pass'];
		$this->db_name = $db_config['db_name'];
		$this->db_host = $db_config['db_host'];
		$this->db_port = $db_config['db_port'];

		/** 
		 * - Connect
		 * -----------------------------------------------------------
		 *
		 * Let's try and connect else we'll catch the error and let
		 * ourselves know.
		 *
		 */
		try {
			$this->pdo = new PDO("mysql:host=".$this->db_host.";port=".$this->db_port.";dbname=".$this->db_name, $this->db_user, $this->db_pass, array(PDO::ATTR_PERSISTENT => true));
		} catch (PDOException $e) {
			echo '<strong>Could not connect:</strong> ', $e->getMessage();
			exit;
		}
	}

	public function query($sql, $bind = null) {
		/** 
		 * - PDO Query
		 * -----------------------------------------------------------
		 *
		 * Use the query method to perform SQL Queries if we're not
		 * using the public PDO property to execute custom SQL command
		 * blocks.
		 *
		 */
		$this->statement = $this->pdo->prepare($sql);
		$this->statement->execute($bind);
	}

	public function result() {
		/** 
		 * - PDO Result
		 * -----------------------------------------------------------
		 *
		 * We return the statement property to allow the programmer to
		 * use methods such as fetch and fetchAll
		 *
		 */		 
		return $this->statement;
	}

	public function numRows() {
		/** 
		 * - PDO Num Rows
		 * -----------------------------------------------------------
		 *
		 * Let's create a handy function to to return the num of rows
		 * affected or returned in the selected statement
		 *
		 */
		if ($this->statement) {
			return $this->result()->rowCount();
		}

		return false;
	}

	public function __destruct() {
		/** 
		 * - PDO Query
		 * -----------------------------------------------------------
		 *
		 * We don't want the app to be too to dependant on the 
		 * database, so let's cut the connection off.
		 *
		 */
		$this->pdo = null;
	}
}