<?php
require __DIR__ . "/vendor/autoload.php";
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
ini_set('memory_limit', '-1');

use App\Controllers\CommentController;
use App\Controllers\ForumController;
use App\Controllers\RecordController;
use App\Controllers\MainController;
use App\Controllers\ProfileController;
use App\Controllers\UserController;
use App\Services\UsersAuthService;
use Laminas\Diactoros\Response\JsonResponse;
use Laminas\Diactoros\Response\RedirectResponse;
use MiladRahimi\PhpRouter\Router;
use Psr\Http\Message\ServerRequestInterface;
use App\Validations\UserRegisterValidate;
use App\Validations\UserAuthValidate;

// Если вынести в другое место мидлвар не работает
class AuthMiddleware
{

    function sendError(ServerRequestInterface $request,)
    {
        return count($request->getHeader('Content-Type')) === 0 ?
            new RedirectResponse('/') :
            new JsonResponse(['message' => 'Ошибка авторизации'], 401);
    }
    public function handle(ServerRequestInterface $request, Closure $next)
    {
        $cookie = $request->getCookieParams();
        if(empty($cookie['token'])){
            return $this->sendError($request);
        }

        $user = UsersAuthService::getUserByToken($cookie['token']);
        if(!$user){
            return $this->sendError($request);
        }
        return $next($request->withAttribute('user', $user));
    }
}

$router = Router::create();
$router->getContainer()->singleton(UserRegisterValidate::class, UserRegisterValidate::class);
$router->getContainer()->singleton(UserAuthValidate::class, UserAuthValidate::class);

$router->setupView(__DIR__ . '/views');

$router->post('/register', [UserController::class, 'register']);
$router->get('/register', [UserController::class, 'registerPage']);
$router->post('/auth', [UserController::class, 'auth']);
$router->get('/auth', [UserController::class, 'authPage']);

$router->get('/', [MainController::class, 'index']);
$router->post('/', [MainController::class, 'index']);

$router->get('/forum', [ForumController::class, 'index']);
$router->get('/forum/{id}', [ForumController::class, 'record']);



$router->group(['middleware' => [AuthMiddleware::class]], function(Router $router) {
    $router->get('/profile', [ProfileController::class, 'profilePage']);
    $router->post('/profile', [ProfileController::class, 'loadPhoto']);

    $router->post('/comment', [CommentController::class, 'store']);

    $router->post('/record', [RecordController::class, 'store']);
    $router->get('/record', [RecordController::class, 'create']);
});

$router->dispatch();