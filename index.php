<?php

define("pleep", true);
include 'init.php';

$p = $_GET['p'];

if (!isset($p)) {
	$p = 'home';
}

$content = new content($p, $db);
$content->getContent();

?>
