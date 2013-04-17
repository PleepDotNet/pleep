<?php

# ############################################################################# #
# File: auth.php																#
# Author: Anton Dachauer (kontakt@antondachauer.de // http://antondachauer.de)	#
# ############################################################################# #
# Copyright (c) 2013, Anton Dachauer											#
# ############################################################################# #

class content {
	private $tpl;
	
	public function __construct($p = 'home', $db = NULL) {
		$topMenu = new menu('top_menu', $p);
		$footerMenu = new menu('footer_menu', $p);
		$menues = array('top'		=>		$topMenu,
						'footer'	=>		$footerMenu);
		
		$tplID = $this->getTemplateID($p);
		$pageID = $this->getPageID($p);
		
		if ($p != "404") {
			$page = new page($pageID);
			$this->tpl = new template($page->title, $tplID, $menues);
		} else {
			$this->tpl = new template("Seite nicht gefunden", $tplID, $menues);
		}
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
