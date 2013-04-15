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

class template {
	private $savant;
	private $tplLocation;
	
	function __construct($tplPageTitle, $tplId, $menues) {
		$db = database::getInstance();
		
		$db->query("SELECT * FROM templates WHERE id = '". mysql_escape_string($tplId). "'");
		$dbObj = $db->fetchRow();
		$this->tplLocation = $dbObj['location'];
		
		if (!file_exists($this->tplLocation) && empty($this->tplLocation) && empty($tplId)) {
			header("location: /404");
		} elseif (!file_exists($this->tplLocation)) {
			die("ERROR: Template file not found (TemplateLocation: ". $this->tplLocation. ", TemplateID: ". $tplId. ")");
		}
		
		$this->savant = new Savant3();
		$this->savant->assign('Sitename', SITE_NAME);
		$this->savant->assign('title', $tplPageTitle);
		$this->savant->assign('MainCSS', '/css/style.css.php');
		$this->savant->assign('TopMenu', $menues['top']);
		$this->savant->assign('FooterMenu', $menues['footer']);
		$this->savant->assign('header_code', $dbObj['header_code']);
	}
	
	function display() {
		$this->savant->display($this->tplLocation);
	}
}

?>
