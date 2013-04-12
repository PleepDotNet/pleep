<?php

class template {
	private $savant;
	private $tplLocation;
	
	function __construct($tplId, $menu) {
		$db = database::getInstance();
		
		$db->query("SELECT * FROM templates WHERE id = '". mysql_escape_string($tplId). "'");
		$dbObj = $db->fetchRow();
		$this->tplLocation = $dbObj['location'];
		
		$this->savant = new Savant3();
		$this->savant->assign('Sitename', SITE_NAME);
		$this->savant->assign('title', $tplPageTitle);
		$this->savant->assign('MainCSS', '/css/style.css.php');
		$this->savant->assign('TopMenu', $menu);
		$this->savant->assign('header_code', $dbObj['header_code']);
	}
	
	function display() {
		$this->savant->display($this->tplLocation);
	}
}

?>
