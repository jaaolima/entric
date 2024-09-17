<?php
class Model extends Database {
    protected $_model;
    protected $conn;

	function __construct() {
        $this->_model = get_class($this);
	}

	function __destruct() {
	}
}