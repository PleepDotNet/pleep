<?php

# ############################################################################# #
# File: auth.php																#
# Author: Anton Dachauer (kontakt@antondachauer.de // http://antondachauer.de)	#
# ############################################################################# #
# Copyright (c) 2013, Anton Dachauer											#
# Permission is hereby granted, free of charge, to any person obtaining a copy	#
# of this software and associated documentation files (the "Software"), to deal	#
# in the Software without restriction, including without limitation the			#
# rights to use, copy, modify, merge, publish, distribute, sublicense, and/or	#
# sell copies of the Software, and to permit persons to whom the Software is	#
# furnished to do so, subject to the following conditions:						#
#																				#
# The above copyright notice and this permission notice shall be included in	#
# of all copies or substantial portions of the Software.						#
# 																				#
# THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR	#
# IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,		#
# FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE	#
# AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER		#
# LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,	#
# OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE	#
# SOFTWARE.																		#
# ############################################################################# #

class menu {
	private $menuId;
	public $name;
	private $_htmlContent;
	private $activeItem;
	
	function __construct($name, $activeItem) {
		$this->name = $name;
		$this->activeItem = $activeItem;
		$this->loadMenu();
	}
	
	private function loadMenu() {
		$db = database::getInstance();
		
		$db->query("SELECT * FROM menus WHERE name = '". mysql_escape_string($this->name). "'");
		$dbObj = $db->fetchRow();
		
		$this->_htmlContent = '<ul class="nav '. $dbObj['name']. '">';
		$this->menuId = $dbObj['id'];
		$this->loadMenuItems();
		$this->_htmlContent .= '</ul>';
	}
	
	private function loadMenuItems() {
		$db = database::getInstance();
		
		$db->query("SELECT * FROM menu_items WHERE menu_id = '". mysql_escape_string($this->menuId). "' ORDER BY _order");
		while ($dbObj = $db->fetchRow()) {
			if ($dbObj['visible'] == 1) {
				
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
	
	public function displayMenu() {
		echo $this->_htmlContent;
	}
}
