<?php

class menu {
	private $menuId;
	private $name;
	private $_htmlContent;
	private $activeItem;
	
	function __construct($name, $activeItem, $db = NULL) {
		$this->name = $name;
		$this->activeItem = $activeItem;
		$this->loadMenu($db);
	}
	
	private function loadMenu($db = NULL) {
		$wasDB = false;
		if ($db == NULL) {
			$wasDB = false;
			$db = new database(DB_HOST, DB_USER, DB_PW, DB_DB);
		} else {
			$wasDB = true;
		}
		
		$db->query("SELECT * FROM menus WHERE name = '". mysql_escape_string($this->name). "'");
		$dbObj = $db->fetchRow();
		
		$this->_htmlContent = '<ul class="nav '. $dbObj['name']. '">';
		$this->menuId = $dbObj['id'];
		$this->loadMenuItems($db);
		$this->_htmlContent .= '</ul>';

		if ($wasDB == false) {
			$db->disconnect();
		}
	}
	
	private function loadMenuItems($db = NULL) {
		$wasDB = false;
		if ($db == NULL) {
			$wasDB = false;
			$db = new database(DB_HOST, DB_USER, DB_PW, DB_DB);
		} else {
			$wasDB = true;
		}
		
		$db->query("SELECT * FROM menu_items WHERE menu_id = '". mysql_escape_string($this->menuId). "' ORDER BY _order");
		while ($dbObj = $db->fetchRow()) {
			if ($dbObj->name == $this->activeItem) {
				$this->_htmlContent .= '<li class="active"><a href="'. $dbObj['link']. '">'. $dbObj['title']. '</a></li>';
			} elseif ($dbObj->name != $this->activeItem) {
				$this->_htmlContent .= '<li><a href="'. $dbObj['link']. '">'. $dbObj['title']. '</a></li>';
			}
		}
		
		if ($wasDB == false) {
			$db->disconnect();
		}
	}
	
	function displayMenu() {
		echo $this->_htmlContent;
	}
}
