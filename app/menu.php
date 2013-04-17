<?php

# ############################################################################# #
# File: auth.php																#
# Author: Anton Dachauer (kontakt@antondachauer.de // http://antondachauer.de)	#
# ############################################################################# #
# Copyright (c) 2013, Anton Dachauer											#
# ############################################################################# #

class menu {
	private $menuId;
	public $name;
	private $_htmlContent;
	private $activeItem;
	private $_allItems = 0;
	private $_visibleItems = 0;
	
	function __construct($name, $activeItem) {
		$this->name = $name;
		$this->activeItem = $activeItem;
		$this->loadMenu();
	}
	
	private function loadMenu() {
		$db = database::getInstance();
		
		$db->query("SELECT * FROM menus WHERE name = '". mysql_real_escape_string($this->name). "'");
		$dbObj = $db->fetchRow();
		
		$this->_htmlContent = '<ul class="nav '. $dbObj['name']. '">';
		$this->menuId = $dbObj['id'];
		$this->loadMenuItems();
		$this->_htmlContent .= '</ul>';
	}
	
	private function loadMenuItems() {
		$db = database::getInstance();
		
		$db->query("SELECT * FROM menu_items WHERE menu_id = '". mysql_real_escape_string($this->menuId). "' ORDER BY _order");
		while ($dbObj = $db->fetchRow()) {
			$this->_allItems ++;
			if ($dbObj['visible'] == 1) {
				$this->_visibleItems ++;
				
				$title = $dbObj['title'];
				$loggedinTitle = $dbObj['title_loggedin'];
				$auth = auth::getInstance();
				if ($auth->loggedIn() == true && strlen($loggedinTitle) > 0) {
					$title = $loggedinTitle;
				}
				
				if ($dbObj['name'] == $this->activeItem) {
					$this->_htmlContent .= '<li class="active"><a href="'. $dbObj['link']. '">'. $title. '</a></li>';
				} else {
					$this->_htmlContent .= '<li><a href="'. $dbObj['link']. '">'. $title. '</a></li>';
				}
			}
		}
	}
	
	public function countMenuItems($oVisible = true) {
		if ($oVisible == true) {
			return $this->_visibleItems;
		} else {
			return ($this->_allItems - $this->_visibleItems);
		}
	}
	
	public function displayMenu() {
		echo $this->_htmlContent;
	}
}
