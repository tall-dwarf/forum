<?php

namespace App\Middleware;

use Closure;
use Laminas\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ServerRequestInterface;

class AuthMiddleware
{
    public function handle(ServerRequestInterface $request, Closure $next)
    {
//        if ($request->getHeader('Authorization')) {
//            // Call the next middleware/controller
//            return $next($request);
//        }

        return new JsonResponse(['error' => 'Unauthorized!'], 401);
    }
}