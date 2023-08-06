<?php
class Account {
	
	
	/* Class properties (variables) */
	/* The ID of the logged in account (or NULL if there is no logged in account) */
	private $id;
	/* The name of the logged in account (or NULL if there is no logged in account) */
	private $name;
	/* TRUE if the user is authenticated, FALSE otherwise */
	private $authenticated;
	
	
	/* Public class methods (functions) */
	/* Constructor */
	public function __construct() {
		/* Initialize the $id and $name variables to NULL */
		$this->id = NULL;
		$this->fName = NULL;
		$this->lName = NULL;
		$this->email = NULL;
		$this->authenticated = FALSE;
	}
	/* Destructor */
	public function __destruct() {
	}
	
	
	/* Add a new account to the system and return its ID (the account_id column of the accounts table) */
	public function addAccount(string $id, string $fname, string $lname, string $email, string $passwd) {
		/* Global $conn object */
		global $conn;
		global $DBname;
		/* Trim the strings to remove extra spaces */
		$id = trim($id);
		$fname = trim($fname);
		$lname = trim($lname);
		$email = trim($email);
		$passwd = trim($passwd);
		/* Check if the user name is valid. If not, throw an exception */
//		if (!$this->isNameValid($name)) {
//			throw new Exception('Invalid user name');
//		}
		/* Check if the password is valid. If not, throw an exception */
//		if (!$this->isPasswdValid($passwd)) {
//			throw new Exception('Invalid password');
//		}
		/* Check if an account having the same name already exists. If it does, throw an exception */
		if (!is_null($this->getIdFromEmail($email))) {
			throw new Exception('User name not available');
		}
		/* Finally, add the new account */
		/* Insert query template */
		$query = 'INSERT INTO '.$DBname.'.users (User_ID, User_fName, User_lName, User_Email, User_Psw) VALUES (:id, :fname, :lname, :email, :passwd)';
		/* Password hash */
		$hash = password_hash($passwd, PASSWORD_DEFAULT);
		/* Values array for PDO */
		$values = array(':id' => $id, ':fname' => $fname, ':lname' => $lname, ':email' => $email, ':passwd' => $hash);
		/* Execute the query */
		try {
			$res = $conn->prepare($query);
			$res->execute($values);
		}
		catch (PDOException $e) {
			/* If there is a PDO exception, throw a standard exception */
			throw new Exception('Database query error');
		}
		/* Return the new ID */
		$this->login($email,$passwd);
	}
	
	
	/* Delete an account (selected by its ID) */
	public function deleteAccount(int $id) {
		/* Global $conn object */
		global $conn;
		global $DBname;
		/* Check if the ID is valid */
		if (!$this->isIdValid($id)) {
			throw new Exception('Invalid account ID');
		}
		/* Query template */
		$query = 'DELETE FROM '.$DBname.'.users WHERE (User_ID = :id)';
		/* Values array for PDO */
		$values = array(':id' => $id);
		/* Execute the query */
		try {
			$res = $conn->prepare($query);
			$res->execute($values);
		}
		catch (PDOException $e) {
			/* If there is a PDO exception, throw a standard exception */
			throw new Exception('Database query error');
		}
		/* Delete the Sessions related to the account */
		$query = 'DELETE FROM '.$DBname.'.usersessions WHERE (User_ID = :id)';
		/* Values array for PDO */
		$values = array(':id' => $id);
		/* Execute the query */
		try {
			$res = $conn->prepare($query);
			$res->execute($values);
		}
		catch (PDOException $e) {
			/* If there is a PDO exception, throw a standard exception */
			throw new Exception('Database query error');
		}
	}
	
	
	/* Edit an account (selected by its ID). The name, the password and the status (enabled/disabled) can be changed */
	public function editAccount(int $id, string $name, string $passwd, bool $enabled) {
		/* Global $conn object */
		global $conn;
global $DBname;
		/* Trim the strings to remove extra spaces */
		$name = trim($name);
		$passwd = trim($passwd);
		/* Check if the ID is valid */
		if (!$this->isIdValid($id)) {
			throw new Exception('Invalid account ID');
		}
		/* Check if the user name is valid. */
		if (!$this->isNameValid($name)) {
			throw new Exception('Invalid user name');
		}
		/* Check if the password is valid. */
		if (!$this->isPasswdValid($passwd)) {
			throw new Exception('Invalid password');
		}
		/* Check if an account having the same name already exists (except for this one). */
		$idFromName = $this->getIdFromEmail($email);
		if (!is_null($idFromName) && ($idFromName != $id)) {
			throw new Exception('User name already used');
		}
		/* Finally, edit the account */
		/* Edit query template */
		$query = 'UPDATE '.$DBname.'.users SET User_fName = :name, User_Psw = :passwd, Status_ID = :enabled WHERE User_ID = :id';
		/* Password hash */
		$hash = password_hash($passwd, PASSWORD_DEFAULT);
		/* Int value for the $enabled variable (0 = false, 1 = true) */
		$intEnabled = $enabled ? 1 : 0;
		/* Values array for PDO */
		$values = array(':name' => $name, ':passwd' => $hash, ':enabled' => $intEnabled, ':id' => $id);
		/* Execute the query */
		try {
			$res = $conn->prepare($query);
			$res->execute($values);
		}
		catch (PDOException $e) {
			/* If there is a PDO exception, throw a standard exception */
			throw new Exception('Database query error');
		}
	}
	
	
	/* Login with username and password */
	public function login(string $email, string $passwd) {
		/* Global $conn object */
		global $conn;
global $DBname;
		/* Trim the strings to remove extra spaces */
		$email = trim($email);
		$passwd = trim($passwd);
		/* Check if the user name is valid. If not, return FALSE meaning the authentication failed */
//		if (!$this->isNameValid($name)) {
//			return FALSE;
//		}
		/* Check if the password is valid. If not, return FALSE meaning the authentication failed */
//		if (!$this->isPasswdValid($passwd)) {
//			return FALSE;
//		}
		/* Look for the account in the db. Note: the account must be enabled (account_enabled = 1) */
		$query = 'SELECT * FROM '.$DBname.'.users WHERE (User_Email= :email) AND (Verify_ID != 0)';
		/* Values array for PDO */
		$values = array(':email' => $email);
		/* Execute the query */
		try {
			$res = $conn->prepare($query);
			$res->execute($values);
		}
		catch (PDOException $e) {
			/* If there is a PDO exception, throw a standard exception */
			throw new Exception('Database query error');
		}
		$row = $res->fetch(PDO::FETCH_ASSOC);
		/* If there is a result, we must check if the password matches using password_verify() */
		if (is_array($row)) {
			if (password_verify($passwd, $row['User_Psw'])) {
//				echo($name.$passwd);
				/* Authentication succeeded. Set the class properties (id and name) */
				$this->id = $row['User_ID'];
				$this->fName = $row['User_fName'];
				$this->lName = $row['User_lName'];
				$this->email = $email;
				$this->authenticated = TRUE;
				/* Register the current Sessions on the database */
				$this->registerLoginSession();
				$this->sessionStore();
				/* Finally, Return TRUE */
				return TRUE;
			}
		}
		/* If we are here, it means the authentication failed: return FALSE */
		return FALSE;
	}
	
	
	/* A sanitization check for the account username */
	public function isNameValid(string $name) {
		/* Initialize the return variable */
		$valid = TRUE;
		/* Example check: the length must be between 8 and 16 chars */
		$len = mb_strlen($name);
		if (($len < 8) || ($len > 16)) {
			$valid = FALSE;
		}
		/* You can add more checks here */
		return $valid;
	}
	
	
	/* A sanitization check for the account password */
	public function isPasswdValid(string $passwd) {
		/* Initialize the return variable */
		$valid = TRUE;
		/* Example check: the length must be between 8 and 16 chars */
		$len = mb_strlen($passwd);
		if (($len < 8) || ($len > 16)) {
			$valid = FALSE;
		}
		/* You can add more checks here */
		return $valid;
	}
	
	
	/* A sanitization check for the account ID */
	public function isIdValid(int $id) {
		/* Initialize the return variable */
		$valid = TRUE;
		/* Example check: the ID must be between 1 and 1000000 */
		if (($id < 1) || ($id > 1000000)) {
			$valid = FALSE;
		}
		/* You can add more checks here */
		return $valid;
	}
	
	
	/* Login using Sessions */
	public function sessionLogin() {
		/* Global $conn object */
		global $conn;
		global $DBname;
		/* Check that the Session has been started */
		if (session_status() == PHP_SESSION_ACTIVE) {
			/* 
			Query template to look for the current session ID on the account_sessions table.
			The query also make sure the Session is not older than 7 days
			*/
			$query = 
				'SELECT * FROM '.$DBname.'.usersessions, '.$DBname.'.User WHERE (usersessions.Session_ID = :sid) ' . 
				'AND (usersessions.Login_Time >= (NOW() - INTERVAL 7 DAY)) AND (usersessions.User_ID = users.User_ID) ' . 
				'AND (users.Status_ID != 0)';
			/* Values array for PDO */
			$values = array(':sid' => session_id());
			/* Execute the query */
			try {
				$res = $conn->prepare($query);
				$res->execute($values);
			}
			catch (PDOException $e) {
				/* If there is a PDO exception, throw a standard exception */
				throw new Exception('Database query error');
			}
			$row = $res->fetch(PDO::FETCH_ASSOC);
			if (is_array($row)) {
				/* Authentication succeeded. Set the class properties (id and name) and return TRUE*/
				$this->id = intval($row['User_ID'], 10);
				$this->name = $row['User_fName'];
				$this->authenticated = $row['Status_ID'];
				return TRUE;
			}
		}
		/* If we are here, the authentication failed */
		return FALSE;
	}
	
	
	/* Logout the current user */
	public function logout() {
		/* Global $conn object */
		global $conn;
global $DBname;
		/* If there is no logged in user, do nothing */
		if (is_null($this->id)) {
			return;
		}
		/* Reset the account-related properties */
		$this->id = NULL;
		$this->name = NULL;
		$this->authenticated = FALSE;
		/* If there is an open Session, remove it from the account_sessions table */
		if (session_status() == PHP_SESSION_ACTIVE) {
			/* Delete query */
			$query = 'DELETE FROM '.$DBname.'.usersessions WHERE (Session_ID = :sid)';
			/* Values array for PDO */
			$values = array(':sid' => session_id());
			/* Execute the query */
			try {
				$res = $conn->prepare($query);
				$res->execute($values);
			}
			catch (PDOException $e) {
				/* If there is a PDO exception, throw a standard exception */
				throw new Exception('Database query error');
			}
		}
	}
	
	
	/* Close all account Sessions except for the current one (aka: "logout from other devices") */
	public function closeOtherSessions() {
		/* Global $conn object */
		global $conn;
global $DBname;
		/* If there is no logged in user, do nothing */
		if (is_null($this->id)) {
			return;
		}
		/* Check that a Session has been started */
		if (session_status() == PHP_SESSION_ACTIVE) {
			/* Delete all account Sessions with session_id different from the current one */
			$query = 'DELETE FROM '.$DBname.'.usersessions WHERE (Session_ID != :sid) AND (User_ID = :User_ID)';
			/* Values array for PDO */
			$values = array(':sid' => session_id(), ':User_ID' => $this->id);
			/* Execute the query */
			try {
				$res = $conn->prepare($query);
				$res->execute($values);
			}
			catch (PDOException $e) {
				/* If there is a PDO exception, throw a standard exception */
				throw new Exception('Database query error');
			}
		}
	}
	
	
	/* Returns the account id having $name as name, or NULL if it's not found */
	public function getIdFromEmail(string $email) {
		/* Global $conn object */
		global $conn;
global $DBname;
		/* Since this method is public, we check $name again here */
//		if (!$this->isNameValid($email)) {
//			throw new Exception('Invalid user Email');
//		}
		/* Initialize the return value. If no account is found, return NULL */
		$id = NULL;
		/* Search the ID on the database */
		$query = 'SELECT User_ID FROM '.$DBname.'.users WHERE (User_Email = :Email)';
		$values = array(':Email' => $email);
		try {
			$res = $conn->prepare($query);
			$res->execute($values);
		}
		catch (PDOException $e) {
			/* If there is a PDO exception, throw a standard exception */
			throw new Exception('Database query error');
		}
		$row = $res->fetch(PDO::FETCH_ASSOC);
		/* There is a result: get it's ID */
		if (is_array($row)) {
			$id = $row['User_ID'];
		}
		return $id;
	}
	
	
	/* Private class methods */
	/* Saves the current Session ID with the account ID */
	private function registerLoginSession() {
		/* Global $conn object */
		global $conn;
global $DBname;
		/* Check that a Session has been started */
		if (session_status() == PHP_SESSION_ACTIVE) {
			/* 	Use a REPLACE statement to:
			- insert a new row with the session id, if it doesn't exist, or...
			- update the row having the session id, if it does exist.
			*/
			$query = 'REPLACE INTO '.$DBname.'.usersessions (session_id, User_ID, login_time) VALUES (:sid, :accountId, NOW())';
			$values = array(':sid' => session_id(), ':accountId' => $this->id);
			/* Execute the query */
			try {
				$res = $conn->prepare($query);
				$res->execute($values);
			}
			catch (PDOException $e) {
				/* If there is a PDO exception, throw a standard exception */
				throw new Exception('Database query error');
			}
		}
	}
	private function sessionStore() {
		$_SESSION['User']['ID'] = $this->id;
		$_SESSION['User']['fName'] = $this->fName;
		$_SESSION['User']['lName'] = $this->lName;
		$_SESSION['User']['email'] = $this->email;
		$_SESSION['User']['auth'] = $this->authenticated;
	}
	
	
}
?>