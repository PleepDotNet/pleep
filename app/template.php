<?php

class template {
	private $savant;
	private $tplLocation;
	
	function __construct($tplId, $db = NULL) {
		$wasDB = false;
		if ($db == NULL) {
			$wasDB = false;
			$db = new database(DB_HOST, DB_USER, DB_PW, DB_DB);
		} else {
			$wasDB = true;
		}
		
		$db->query("SELECT * FROM templates WHERE id = '". mysql_escape_string($tplId). "'");
		$dbObj = $db->fetchRow();
		$this->tplLocation = $dbObj['location'];
		
		$this->savant = new Savant3();
		$this->savant->assign('Sitename', $tplSitename);
		$this->savant->assign('title', $tplPageTitle);
		$this->savant->assign('MainCSS', '/css/style.css.php');
		$this->savant->assign('TopMenu', $menu);

		if ($wasDB == false) {
			$db->disconnect();
		}
	}
	
	function display() {
		$this->savant->display($this->tplLocation);
	}
}

?>
