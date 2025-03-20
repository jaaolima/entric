<?php
error_reporting(E_ALL);
ini_set('display_errors','On');
date_default_timezone_set('America/Sao_Paulo');


$configuration = [
    'settings' => [
        'displayErrorDetails' => true,
		'determineRouteBeforeAppMiddleware' => true,
    ],
];
$c = new \Slim\Container($configuration);

$app = new \Slim\App($c);

require '../src/autoload.php';
require '../vendor/autoload.php';

$app->run();
?>
