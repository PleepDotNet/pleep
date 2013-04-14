<?php

class auth {
    protected static $instance = null;
	
	public static function getInstance($AutoCreate = false)
	{
		if (!self::$instance) {
			self::init();
		}
		return self::$instance;
	}
	
	public static function init()
	{
		return self::setInstance(new self(DB_HOST, DB_USER, DB_PW, DB_DB));
	}
	
	public static function setInstance($instance)
	{
		return self::$instance = $instance;
	}
	
	function loggedIn() {
		
	}
}

?>
