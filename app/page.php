<?php

# ############################################################################# #
# File: auth.php																#
# Author: Anton Dachauer (kontakt@antondachauer.de // http://antondachauer.de)	#
# ############################################################################# #
# Copyright (c) 2013, Anton Dachauer											#
# ############################################################################# #

class page {
	private $_id;
	private $_html;
	
	function __construct($pageID) {
		$this->_id = $pageID;
		$db = database::getInstance();
		
		$db->query("SELECT * FROM pages WHERE id = '". mysql_escape_string($this->_id). "'");
		$dbObj = $db->fetchRow();
		var_dump($dbObj);
		if ($db->count() > 0) {
		} else {
			header("location: /404");
		}
	}
}
