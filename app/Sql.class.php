<?php

/**
 * All dates are in the form "YYYY-MM-DD"
 * 0 legacy
 * 1 modern
 * 2 standard
 */
class SQLWrap {

		protected $host, $user, $pass, $db;
		protected $mysqli;

	    function __construct() {
	        $this->host = "localhost";
	        $this->user = "henry"; 
	        $this->pass = "asdfasdf"; 
	        $this->db = "mtgresults";
	        $this->mysqli = new PDO("mysql:host=".$this->host.";dbname=".$this->db, $this->user, $this->pass);
	        //$this->mysqli = new mysqli($this->host, $this->user, $this->pass, $this->db);
	        $this->mysqli->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
			$this->mysqli->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    	}

    	public function insertResult($date, $user, $points, $format, $deck) {

    		$stmt = $this->mysqli->prepare("INSERT INTO `results` (date, userid, points, format, deck)
    						  		  VALUES (?, ?, ?, ?, ?)");
    		$stmt->bindParam('sddds', $date, $user, $points, $format, $deck);
    		$stmt->execute();
    		$stmt->close();
    		return $stmt->affeceted_rows;
    	}

    	public function insertUser($name, $dci = NULL) {
    		$stmt = $this->mysqli->prepare("INSERT INTO `results` (name, dci)
    						  		  VALUES (?)");
    		$stmt->bindParam('sd', $name, $dci);
    		$stmt->execute();
    		$stmt->close();
    		return $stmt->affeceted_rows;
    	}

    	public function selectUserIdByName($name) {
    		$stmt = $this->mysqli->prepare("SELECT *
    								  FROM `users`
    								  WHERE name LIKE ?");
    		$stmt->bindParam('s', $name);
    		$stmt->execute();
    		$result = $stmt->fetch();
    		$stmt->close();
    		return $result;
    	}

}