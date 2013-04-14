<?php

# ############################################################################# #
# File: auth.php																#
# Author: Anton Dachauer (kontakt@antondachauer.de // http://antondachauer.de)	#
# ############################################################################# #
# Copyright (c) 2013, Anton Dachauer											#
# Permission is hereby granted, free of charge, to any person obtaining a copy	#
# of this software and associated documentation files (the "Software"), to deal	#
# in the Software without restriction, including without limitation the			#
# rights to use, copy, modify, merge, publish, distribute, sublicense, and/or	#
# sell copies of the Software, and to permit persons to whom the Software is	#
# furnished to do so, subject to the following conditions:						#
#																				#
# The above copyright notice and this permission notice shall be included in	#
# of all copies or substantial portions of the Software.						#
# 																				#
# THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR	#
# IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,		#
# FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE	#
# AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER		#
# LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,	#
# OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE	#
# SOFTWARE.																		#
# ############################################################################# #

class database {
	private $connection = NULL;
	private $result = NULL;
	private $counter = NULL;
	public $error = false;
	public $errorMessage = "";
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