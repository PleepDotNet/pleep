<?php

class page {
	
	function __construct($pageID, $db = NULL) {
		$wasDB = false;
		if ($db == NULL) {
			$wasDB = false;
			$db = new database(DB_HOST, DB_USER, DB_PW, DB_DB);
		} else {
			$wasDB = true;
		}
		

		if ($wasDB == false) {
			$db->disconnect();
		}
	}
}
