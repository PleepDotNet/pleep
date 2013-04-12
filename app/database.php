<?php

class database {
	private $connection = NULL;
	private $result = NULL;
	private $counter = NULL;
	public $error = false;
	public $errorMessage = "";
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
	
	public function __construct($host, $user, $pass, $database) {
		$this->connection = mysql_connect($host, $user, $pass);
		if ($this->connection) {
			mysql_select_db($database);
		} else {
			$this->error = true;
			$this->errorMessage = "Database doesn't exist";
		}
		$this->instance = $this;
	}
	
	public function disconnect() {
		if ($this->connection) {
			mysql_close($this->connection);
		}
	}
	
	public function query($query) {
		$this->result = mysql_query($query,$this->connection);
		$this->counter = NULL;
		$this->count();
		
		if (!is_resource($this->result)) {
			$this->error = true;
			$this->errorMessage = mysql_error();
		}
	}
	
	public function fetchRow() {
 		return mysql_fetch_array($this->result);
	}
	
	public function count() {
		if($this->counter == NULL && is_resource($this->result)) {
			$this->counter = mysql_num_rows($this->result);
		}
		
		return $this->counter;
	}
}