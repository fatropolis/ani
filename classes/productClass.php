<?php
class Product {
	
	
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
	public function getProducts($a = null, $b = null) {
		/* Global $conn object */
		global $conn, $DBname;
		
		if($a && $b == null){
			$query = 'SELECT products.*, images.Image_URL AS Image FROM products LEFT JOIN images ON products.Product_ID = images.Image_Obj WHERE (Status_ID = :a)';
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
		
		if (is_array($row)) {
			$a = [];

			foreach($row as $x => $y){
				$a[$y['Product_ID']] = $y;
				$a[$y['Product_ID']]['Images'][] = $y['Image'];
				unset($a[$y['Product_ID']]['Image']);
			}
			return($a);
		}
		/* If we are here, it means the authentication failed: return FALSE */
		return FALSE;
	}
	/* Login with username and password */
	public function addProduct($a = null, $b = null, $c = null, $d = null, $e = null, $f = null, $g = null, $h = null) {
		/* Global $conn object */
		global $conn, $DBname;
		
		$query = 'INSERT INTO anibere.products (Product_ID, Product_Name, Product_Price, Product_SalePrice, QDesc_ID, FDesc_ID, CreationDate, Status_ID) VALUES (:a, :b, :c, :d, :e, :f, :g, :h)';
		
		$values = array(':a' => $a, ':b' => $b, ':c' => $c, ':d' => $d, ':e' => $e, ':f' => $f, ':g' => $g, ':h' => $h);
			
		
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
	public function addQuick($a = null) {
		/* Global $conn object */
		global $conn, $DBname;
		
		$query = 'INSERT INTO anibere.quickdescription (Desc_Con) VALUES (:a)';
		$values = array(':a' => $a);
			
		
		/* Execute the query */
		try {
			$res = $conn->prepare($query);
			$res->execute($values);
			$last = $conn->lastInsertId();
		}
		catch (PDOException $e) {
			/* If there is a PDO exception, throw a standard exception */
			throw new Exception('Database query error');
		}
		return $last;
	}
	/* Login with username and password */
	public function addFull($a = null) {
		/* Global $conn object */
		global $conn, $DBname;
		
		$query = 'INSERT INTO anibere.fulldescription (Desc_Con) VALUES (:a)';
		$values = array(':a' => $a);
			
		
		/* Execute the query */
		try {
			$res = $conn->prepare($query);
			$res->execute($values);
			$last = $conn->lastInsertId();
		}
		catch (PDOException $e) {
			/* If there is a PDO exception, throw a standard exception */
			throw new Exception('Database query error');
		}
		return $last;
	}
	/* Login with username and password */
	public function addImage($a = null, $b = null, $c = null) {
		/* Global $conn object */
		global $conn, $DBname;
		
		$query = 'INSERT INTO anibere.images (Image_Obj, Image_URL, Image_Alt) VALUES (:a, :b, :c)';
		$values = array(':a' => $a, ':b' => $b, ':c' => $c);
			
		
		/* Execute the query */
		try {
			$res = $conn->prepare($query);
			$res->execute($values);
			$last = $conn->lastInsertId();
		}
		catch (PDOException $e) {
			/* If there is a PDO exception, throw a standard exception */
			throw new Exception('Database query error');
		}
		return $last;
	}
}
?>