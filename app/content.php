<?php

class content {
	private $tpl;
	
	public function __construct($p = 'home', $db = NULL) {
		$menu = new menu('top_menu', $p, $db);
		$tplID = $this->getTemplateID($p, $db);
		$pageID = $this->getPageID($p, $db);
		
		echo $tplID. ", ". $pageID. ", ". $p;
		
		$this->tpl = new template($tplID, $db);
		$page = new page($pageID, $db);
	}
	
	public function getContent() {
		$this->tpl->display();
	}

	private function getTemplateID($p, $db = NULL) {
		$wasDB = false;
		if ($db == NULL) {
			$wasDB = false;
			$db = new database(DB_HOST, DB_USER, DB_PW, DB_DB);
		} else {
			$wasDB = true;
		}
		
		$db->query("SELECT * FROM menu_items WHERE name = '". mysql_escape_string($this->p). "'");
		$dbObj = $db->fetchRow();
		
		return $dbObj['template_id'];

		if ($wasDB == false) {
			$db->disconnect();
		}
	}

	private function getPageID($p, $db = NULL) {
		$wasDB = false;
		if ($db == NULL) {
			$wasDB = false;
			$db = new database(DB_HOST, DB_USER, DB_PW, DB_DB);
		} else {
			$wasDB = true;
		}
		
		$db->query("SELECT * FROM menu_items WHERE name = '". mysql_escape_string($this->p). "'");
		$dbObj = $db->fetchRow();
		
		return $dbObj['page_id'];

		if ($wasDB == false) {
			$db->disconnect();
		}
	}
}
