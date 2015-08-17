<?php

require_once("app/Sql.class.php");
require_once("app/Dao.class.php");

$sql = new SQLWrap();
$dao = new Dao($sql);
if ($dao->addResult($_POST['dateInput'], 
					$_POST['nameInput'],
					$_POST['pointsInput'],
					$_POST['deckInput'],
					$_POST['formatInput'])) {
}
