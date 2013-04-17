<?php

# ############################################################################# #
# File: auth.php																#
# Author: Anton Dachauer (kontakt@antondachauer.de // http://antondachauer.de)	#
# ############################################################################# #
# Copyright (c) 2013, Anton Dachauer											#
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
