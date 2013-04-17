<?php

class modules {

	function __construct() {
		
	}
	
	function navigation() {
		$html = '<ul class="nav nav-list"><li class="nav-header">Module</li>';
		
		$db = database::getInstance();
		$db->query("SELECT * FROM admin_modules");
		while ($dbObj = $db->fetchRow()) {
			if (file_exists(DIR. "/admin/modules/". $dbObj['file'])) {
				if ($_GET['mod'] == $dbObj['name']) {
					$html .= '<li class="active"><a href="/admin/index.php?mod='. $dbObj['name']. '&mod_file='. $dbObj['file']. '">'. utf8_encode($dbObj['title']). '</a></li>';
				} else {
					$html .= '<li><a href="/admin/index.php?mod='. $dbObj['name']. '&mod_file='. $dbObj['file']. '">'. utf8_encode($dbObj['title']). '</a></li>';
				}
			}
		}
		
		$html .= '</ul>';
		echo $html;
	}
}

?>
