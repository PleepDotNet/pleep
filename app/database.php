<?php

class database {
	private $connection = NULL;
	private $result = NULL;
	private $counter = NULL;
	public $error = false;
	public $errorMessage = "";
	
	public function __construct($host, $user, $pass, $database) {
		$this->connection = mysql_connect($host, $user, $pass);
		if ($this->connection) {
			mysql_select_db($database);
		} else {
			$this->error = true;
			$this->errorMessage = "Database doesn't exist";
		}
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
		return mysql_fetch_assoc($this->result);
	}
	
	public function count() {
		if($this->counter == NULL && is_resource($this->result)) {
			$this->counter = mysql_num_rows($this->result);
		}
		
		return $this->counter;
	}
}