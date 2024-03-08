<?php
require __DIR__ . "/vendor/autoload.php";
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);

use MiladRahimi\PhpRouter\Router;
use App\Controllers\UserController;
use App\Controllers\MainController;

$router = Router::create();
$router->setupView(__DIR__ . '/views');

$router->post('/register', [UserController::class, 'register']);
$router->get('/register', [UserController::class, 'registerPage']);

$router->post('/auth', [UserController::class, 'auth']);
$router->get('/auth', [UserController::class, 'authPage']);

$router->get('/', [MainController::class, 'index']);

$router->dispatch();