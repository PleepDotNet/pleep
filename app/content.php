<?php

class content {
	private $tpl;
	
	public function __construct($p = 'home', $db = NULL) {
		$menu = new menu('top_menu', $p);
		$tplID = $this->getTemplateID($p);
		$pageID = $this->getPageID($p);
		
		$this->tpl = new template($tplID, $menu);
		$page = new page($pageID);
	}
	
	public function getContent() {
		$this->tpl->display();
	}

	private function getTemplateID($p) {
		$db = database::getInstance();
		
		$db->query("SELECT * FROM menu_items WHERE name = '". mysql_escape_string($p). "'");
		$dbObj = $db->fetchRow();
		
		$id = $dbObj['template_id'];
		return $id;
	}

	private function getPageID($p) {
		$db = database::getInstance();
		
		$db->query("SELECT * FROM menu_items WHERE name = '". mysql_escape_string($p). "'");
		$db->fetchRow();
		$dbObj = $db->row;

		return $dbObj['page_id'];
	}
}
