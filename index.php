<?php

# ############################################################################# #
# File: auth.php																#
# Author: Anton Dachauer (kontakt@antondachauer.de // http://antondachauer.de)	#
# ############################################################################# #
# Copyright (c) 2013, Anton Dachauer											#
# ############################################################################# #

define("pleep", true);
include 'init.php';

$p = $_GET['p'];

if (!isset($p)) {
	$p = 'home';
}

$content = new content($p);
$content->getContent();

?>
