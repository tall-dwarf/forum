<?php

namespace App\Middleware;

use App\Services\UsersAuthService;
use Closure;
use Laminas\Diactoros\Response\JsonResponse;
use Laminas\Diactoros\Response\RedirectResponse;
use Psr\Http\Message\ServerRequestInterface;

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