<?php

use Core\Helpers\Session;
use Core\Router\Router;

require_once __DIR__ . '/../bootstrap/autoload.php';
require_once __DIR__ .'/../Core/Helpers/functions.php';

Session::setLifetime(30 * 24 * 60 * 60);
Session::start();


$router = new Router();

require_once __DIR__ . '/../Routes/web.php';

$router->dispatch();
