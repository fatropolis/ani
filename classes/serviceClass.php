<?php
class Service {
	
	
	/* Class properties (variables) */
	/* The ID of the logged in account (or NULL if there is no logged in account) */
	private $id;
	/* The name of the logged in account (or NULL if there is no logged in account) */
	private $name;
	
	
	/* Public class methods (functions) */
	/* Constructor */
	public function __construct() {
		/* Initialize the $id and $name variables to NULL */
		$this->id = NULL;
		$this->name = NULL;
	}
	/* Destructor */
	public function __destruct() {
	}
	
	
	
	/* Login with username and password */
	public function getCat($a = null, $b = null, $c = null) {
		/* Global $conn object */
		global $conn;
		global $DBname;
		
		if($a ==null && $b == null && $c){
			$query = 'SELECT * FROM '.$DBname.'.categories WHERE (categories.Category_Status = :c)';
			$values = array(':c' => $c);
		}else if(($a && $b == null && $c == null)||($a && mb_strtolower($b) == 'id' && $c == null)){
			$query = 'SELECT * FROM '.$DBname.'.categories where (categories.Category_ID = :a)';
			$values = array(':a' => $a);
		}else if($a && mb_strtolower($b) == 'name' && $c == null){
			$query = 'SELECT * FROM '.$DBname.'.categories WHERE (categories.Category_Name)';
			$values = array(':a' => $a);
		}else if(($a && $b == null && $c)||($a && mb_strtolower($b) == 'id' && $c)){
			$query = 'SELECT * FROM '.$DBname.'.categories where (categories.Category_ID = :a AND categories.Category_Status = :c)';
			$values = array(':a' => $a, ':c' => $c);
		}else if($a && mb_strtolower($b) == 'name' && $c){
			$query = 'SELECT * FROM '.$DBname.'.categories WHERE (categories.Category_Name AND categories.Category_Status = :c)';
			$values = array(':a' => $a, ':c' => $c);
		}else{
			$query = 'SELECT * FROM '.$DBname.'.categories';
			$values = array();
		}
			
		
		/* Execute the query */
		try {
			$res = $conn->prepare($query);
			$res->execute($values);
		}
		catch (PDOException $e) {
			/* If there is a PDO exception, throw a standard exception */
			throw new Exception('Database query error');
		}
		$row = $res->fetchAll(PDO::FETCH_ASSOC);
		/* If there is a result, we must check if the password matches using password_verify() */
		if (is_array($row)) {
			return($row);
		}
	}
		/* If we are here, it means the authentication failed: return FALSE */
		
	/* Login with username and password */
	public function getStyle($a = null, $b = null, $c = null) {
		/* Global $conn object */
		global $conn, $DBname;
		
		if($a && $b == null && $c){
			$query = 'SELECT * FROM '.$DBname.'.services WHERE (Service_ID = :a AND Service_Status = :c)';
			$values = array(":a" => $a, ":c" => $c);
		}else if($a && $b == null && $c == null){
			$query = 'SELECT * FROM '.$DBname.'.services WHERE (Service_ID = :a)';
			$values = array(":a" => $a);
		}else if($a && mb_strtolower($b) == "name" && $c == null){
			$query = 'SELECT * FROM '.$DBname.'.services WHERE (Service_Name = :a)';
			$values = array(":a" => $a);
		}else if($a && mb_strtolower($b) == "name" && $c){
			$query = 'SELECT * FROM '.$DBname.'.services WHERE (Service_Name = :a AND Service_Status = :c)';
			$values = array(":c" => $c, ":a" => $a);
		}else if($a && mb_strtolower($b) == "id" && $c){
			$query = 'SELECT * FROM '.$DBname.'.services WHERE (Service_ID = :a AND Service_Status = :c)';
			$values = array(":c" => $c, ":a" => $a);
		}else{
			$query = 'SELECT * FROM '.$DBname.'.services';
			$values = array();
		}
			
		
		/* Execute the query */
		try {
			$res = $conn->prepare($query);
			$res->execute($values);
		}
		catch (PDOException $e) {
			/* If there is a PDO exception, throw a standard exception */
			throw new Exception('Database query error');
		}
		$row = $res->fetchAll(PDO::FETCH_ASSOC);
		/* If there is a result, we must check if the password matches using password_verify() */
		if (is_array($row)) {
			return($row);
		}
		/* If we are here, it means the authentication failed: return FALSE */
		return FALSE;
	}
	
	
	/* Login with username and password */
	public function getStyleFromCat($a = null, $b = null) {
		/* Global $conn object */
		global $conn, $DBname;
		if($a != '' && $b != ''){
			$query = 'SELECT services.*,quickdescription.Desc_Con AS QDesc_Con,fulldescription.Desc_Con AS FDesc_Con, images.Image_URL AS URL FROM services LEFT JOIN quickdescription ON services.QDesc_ID = quickdescription.Desc_ID LEFT JOIN fulldescription ON services.FDesc_ID = fulldescription.Desc_ID LEFT JOIN images ON services.Service_ID = images.Image_Obj WHERE (Category_ID = :a AND Service_Status = :b)';
			$values = array(":a" => $a, ":b" => $b);
		}else{
			$query = 'SELECT services.*,quickdescription.Desc_Con AS QDesc_Con,fulldescription.Desc_Con AS FDesc_Con, images.Image_URL AS URL FROM services LEFT JOIN quickdescription ON services.QDesc_ID = quickdescription.Desc_ID LEFT JOIN fulldescription ON services.FDesc_ID = fulldescription.Desc_ID LEFT JOIN images ON services.Service_ID = images.Image_Obj WHERE (Category_ID = :a)';
			$values = array(":a" => $a);
		}
			
		
		/* Execute the query */
		try {
			$res = $conn->prepare($query);
			$res->execute($values);
		}
		catch (PDOException $e) {
			/* If there is a PDO exception, throw a standard exception */
			throw new Exception('Database query error');
		}
		$row = $res->fetchAll(PDO::FETCH_ASSOC);
		/* If there is a result, we must check if the password matches using password_verify() */
		if (is_array($row)) {
			$a = [];
			$b = [];

			foreach($row as $x => $y){
				$a[$y['Service_ID']] = $y;
				$a[$y['Service_ID']]['Images'][] = $y['URL'];
				unset($a[$y['Service_ID']]['URL']);
			}
			return $a;
		}
		/* If we are here, it means the authentication failed: return FALSE */
		return FALSE;
	}
	
	/* Login with username and password */
	public function checkApointment($a = null, $b = null, $c = null) {
		/* Global $conn object */
		global $conn, $DBname;
		
		if($a && $b){
			$query = 'SELECT * FROM '.$DBname.'.booked WHERE (Slot_ID = :a AND Day_ID = :b);DELETE FROM '.$DBname.'.booked WHERE (booked.User_ID = :c AND booked.Paid = 0 AND TIMESTAMPDIFF(minute, Time_Created, CURRENT_TIMESTAMP)>5);';
			$values = array(":a" => $a, ":b" => $b, ':c' => $c);
		}else{
			return 'Appointment Check missing variables';
		}
			
		
		/* Execute the query */
		try {
			$res = $conn->prepare($query);
			$res->execute($values);
			$row = $res->fetchAll(PDO::FETCH_ASSOC);
			$query = 'SELECT CURRENT_TIMESTAMP';
			$res = $conn->prepare($query);
			$res->execute();
			$curTime = $res->fetchAll(PDO::FETCH_ASSOC);
		}
		catch (PDOException $e) {
			/* If there is a PDO exception, throw a standard exception */
			throw new Exception('Database query error');
		}
		/* If there is a result, we must check if the password matches using password_verify() */
		if (isset($row[0])) {
			$d1 = strtotime($row[0]['Time_Created']);
			$d2 = strtotime($curTime[0]['CURRENT_TIMESTAMP']);
			$d3 = $d2-$d1;
			if($d3 < 300 && $row[0]['User_ID'] == $_SESSION['User']['ID'] && $row[0]['Paid'] == 0){
				return 2;
			}else if($d3 < 300 && $row[0]['User_ID'] == $_SESSION['User']['ID'] && $row[0]['Paid'] == 1){
				return 4;
			}else if ($d3 > 300 && $row[0]['User_ID'] == $_SESSION['User']['ID']){
				
				$service = $_SESSION['ServiceID'];
				$slot = $_SESSION['Slot'];
				$day = $_SESSION['Day'];
				$user = $_SESSION['User']['ID'];
				$slots = $_SESSION['ServiceSlots'];
				$this->removeAppointment($service, $slot, $day, $user, $slots);
				return 3;
			}
			return  1;
		}
		/* If we are here, it means the authentication failed: return FALSE */
		return 0;
	}
	/* Login with username and password */
	//setAppointment(Service_ID, Slot_ID, Day_ID, Cus_ID, Slot_Count) 
	public function setAppointment($a, $b, $c, $d, $e) {
		/* Global $conn object */
		global $conn, $DBname;
		$x = 0;
		for($i = 0; $i < $e; $i++){
			$f = $b+$i;
			$check = $this->checkApointment($f, $c, $d);
			if($check == 1){
//				echo 'Your appointment time is no longer available;';
				return 'check '.$i.' returned true';
			}else if($check == 2){
				return 1;
			}else if($check == 4){
				return 'You\'ve already booked this appointment!';
			}else if($check == 3){
				return 'Out of Time';
			}else{
				$x++;
			}
		}
		if($x == $e){
			for($i = 0; $i < $e; $i++){
				$j = $b+$i;
			/* Execute the query */
				try {
					$query = 'INSERT INTO '.$DBname.'.booked (Service_ID, Slot_ID, Day_ID, Cus_ID) VALUES (:a, :b, :c, :d);';
					$values = array(':a' => $a, ':b' => $j, ':c' => $c, ':d' => $d);
					$res = $conn->prepare($query);
					$res->execute($values);
					$last = $conn->lastInsertId();
					$query = 'SELECT Time_Created FROM '.$DBname.'.booked WHERE (Book_ID = :last);';
					$values = array(':last' => $last);
					$res = $conn->prepare($query);
					$res->execute($values);
					$tCre = $res->fetch(PDO::FETCH_ASSOC);
					$_SESSION['Apt_Timer'] = strtotime($tCre['Time_Created']);
				}
				catch (PDOException $e) {
					/* If there is a PDO exception, throw a standard exception */
					throw new Exception('Database query error');
					
					return 0;
				}
				
			}
			return 1;
		}
			return 0;
	}
	public function removeAppointment($a, $b, $c, $d, $e) {
		/* Global $conn object */
		global $conn, $DBname;
				unset($_SESSION['ServiceID'],$_SESSION['Slot'],$_SESSION['Day'],$_SESSION['ServiceSlots'],$_SESSION['Apt_Timer']);
			for($i = 0; $i < $e; $i++){
				$j = $b+$i;
				$query = 'DELETE FROM '.$DBname.'.booked WHERE (Service_ID = :a AND Slot_ID = :b AND Day_ID = :c AND User_ID = :d AND Paid = 0);';
				$values = array(':a' => $a, ':b' => $j, ':c' => $c, ':d' => $d);
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
	public function removeAllAppointment($a) {
		/* Global $conn object */
		global $conn, $DBname;
				unset($_SESSION['ServiceID'],$_SESSION['Slot'],$_SESSION['Day'],$_SESSION['ServiceSlots'],$_SESSION['Apt_Timer']);
			for($i = 0; $i < $e; $i++){
				$j = $b+$i;
				$query = 'DELETE FROM '.$DBname.'.booked WHERE (User_ID = :d AND Paid = 0);';
				$values = array(':a' => $a, ':b' => $j, ':c' => $c, ':d' => $d);
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
	public function confirmAppointment($a, $b, $c, $d, $e) {
		/* Global $conn object */
		global $conn, $DBname;
			for($i = 0; $i < $e; $i++){
				$j = $b+$i;
				$query = 'UPDATE '.$DBname.'.booked SET Paid = 1, Time_Paid = CURRENT_TIMESTAMP WHERE (Service_ID = :a AND Slot_ID = :b AND Day_ID = :c AND User_ID = :d AND Paid = 0);';
				$values = array(':a' => $a, ':b' => $j, ':c' => $c, ':d' => $d);
			/* Execute the query */
				try {
					$res = $conn->prepare($query);
					$res->execute($values);
					unset($_SESSION['ServiceID'],$_SESSION['Slot'],$_SESSION['Day'],$_SESSION['ServiceSlots'],$_SESSION['Apt_Timer']);
				}
				catch (PDOException $e) {
					/* If there is a PDO exception, throw a standard exception */
					throw new Exception('Database query error');
				}
				
			}
	}

}
?>