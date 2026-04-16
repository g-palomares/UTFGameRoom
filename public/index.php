<?php

session_start();

require_once __DIR__ . '/../vendor/autoload.php';

use App\Controllers\ControllerTeste;
use App\Core\Router;


// $test = new ControllerTeste();
// $test->hello();

$action = $_GET['action'] ?? 'home';

$router = new Router();
$router->handle($action);