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

class content {
	private $tpl;
	
	public function __construct($p = 'home', $db = NULL) {
		$topMenu = new menu('top_menu', $p);
		$footerMenu = new menu('footer_menu', $p);
		$menues = array('top'		=>		$topMenu,
						'footer'	=>		$footerMenu);
		
		$tplID = $this->getTemplateID($p);
		$pageID = $this->getPageID($p);
		
		$page = new page($pageID);
		$this->tpl = new template($page->title, $tplID, $menues);
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
