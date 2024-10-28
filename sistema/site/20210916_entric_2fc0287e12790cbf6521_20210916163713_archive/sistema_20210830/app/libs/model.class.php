<?php
class Model extends Database {
    protected $_model;
    protected $conn;

	function __construct() {
		$conn = $this->connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
        if (!$conn) exit();

        $registry = Registry::getInstance();
        $this->conn = $registry->get("conexao");
        $this->_model = get_class($this);
	}

	function __destruct() {
	}
}