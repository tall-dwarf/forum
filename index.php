<?php
require __DIR__ . "/vendor/autoload.php";
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
ini_set('memory_limit', '-1');

use App\Controllers\MainController;
use App\Controllers\ProfileController;
use App\Controllers\UserController;
use App\Services\UsersAuthService;
use Laminas\Diactoros\Response\RedirectResponse;
use MiladRahimi\PhpRouter\Router;
use Psr\Http\Message\ServerRequestInterface;

// Если вынести в другое место мидлвар не работает
class AuthMiddleware
{
    public function handle(ServerRequestInterface $request, Closure $next)
    {
        $cookie = $request->getCookieParams();
        if(empty($cookie['token'])){
            return new RedirectResponse('/');
        }

        $user = UsersAuthService::getUserByToken($cookie['token']);
        if(!$user){
            return new RedirectResponse('/');
        }
        return $next($request->withAttribute('user', $user));
    }
}

$router = Router::create();

$router->setupView(__DIR__ . '/views');

$router->post('/register', [UserController::class, 'register']);
$router->get('/register', [UserController::class, 'registerPage']);
$router->post('/auth', [UserController::class, 'auth']);
$router->get('/auth', [UserController::class, 'authPage']);

$router->get('/', [MainController::class, 'index']);



$router->group(['middleware' => [AuthMiddleware::class]], function(Router $router) {
    $router->get('/profile', [ProfileController::class, 'profilePage']);
    $router->post('/profile', [ProfileController::class, 'loadPhoto']);
});

$router->dispatch();