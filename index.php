<?php
require __DIR__ . "/vendor/autoload.php";

use MiladRahimi\PhpRouter\Router;
use App\Controllers\UserController;

$router = Router::create();

$router->get('/', [UserController::class, 'index']);

$router->dispatch();