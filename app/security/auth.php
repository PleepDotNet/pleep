<?php

# ############################################################################# #
# File: auth.php																#
# Author: Anton Dachauer (kontakt@antondachauer.de // http://antondachauer.de)	#
# ############################################################################# #
# Copyright (c) 2013, Anton Dachauer											#
# ############################################################################# #

class auth {
    protected static $instance = null;
	
	public static function getInstance($AutoCreate = false) {
		if (!self::$instance) {
			self::init();
		}
		return self::$instance;
	}
	
	public static function init() {
		return self::setInstance(new self(DB_HOST, DB_USER, DB_PW, DB_DB));
	}
	
	public static function setInstance($instance) {
		return self::$instance = $instance;
	}
	
	function loggedIn() {
		
	}
}

?>
