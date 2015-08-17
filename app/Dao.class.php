<?php


/**
 * All dates are in the form "YYYY-MM-DD"
 */
class Dao {

	protected $SQLWrap;

	public function __construct($SQLWrap) {
		$this->SQLWrap = $SQLWrap;
	}

	public function getAllResults() {

	}

	public function addUser($name, $dci = NULL) {
		if ($this->SQLWrap->insertUser($name, $dci) > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function addResult($date, $name, $points, $deck, $format) {

		$userid = $this->getUserIdByName($name);
		if ($userid === false) {
			$this->addUser($name);
			$userid = $this->getUserIdByName($name);
		}
		if ($this->SQLWrap->insertResult($userid, $date, $points, $deck, $format) > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function removeResult($resultid) {

	}

	public function editResult($resultid, $userid, $date, $points, $deck) {

	}

	public function getResultsByDate($date) {

	}

	public function getUserIdByName($name) {
		$id = $this->SQLWrap->selectUserIdByName($name);
		if ($id == NULL) {
			return false; 
		} else {
			return $id;
		}
	}
}