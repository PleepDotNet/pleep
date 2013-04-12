<?php

error_reporting(E_ERROR | E_WARNING);
ini_set('date.timezone', 'Europe/Berlin');

session_start();

define("DIR", dirname(__FILE__));

require_once DIR. '/config.php';
require_once DIR. '/app/template.php';
require_once DIR. '/app/page.php';
require_once DIR. '/app/menu.php';
require_once DIR. '/app/database.php';
require_once DIR. '/app/content.php';
require_once DIR. '/lib/savant/Savant3.php';

$db = new database(DB_HOST, DB_USER, DB_PW, DB_DB);

?>
