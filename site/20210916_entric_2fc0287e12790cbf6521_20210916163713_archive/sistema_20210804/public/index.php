<?php
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(dirname(__FILE__)));

if (isset($_GET['url']) == FALSE ) $url = "home"; else $url = $_GET['url'];

require_once (ROOT . DS . 'app'. DS . 'libs' . DS . 'bootstrap.php');