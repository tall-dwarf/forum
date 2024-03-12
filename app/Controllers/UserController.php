<?php
namespace App\Controllers;

use App\Helpers\Cryptography;
use App\Services\UsersAuthService;
use MiladRahimi\PhpRouter\View\View;
use Psr\Http\Message\ServerRequestInterface;
use App\Entities\User;
use Laminas\Diactoros\Response\RedirectResponse;
class UserController
{
    public function registerPage(View $view)
    {
        return $view->make('register');
    }
    public function authPage(View $view)
    {
        return $view->make('auth');
    }
    public function register(ServerRequestInterface $request, View $view){
        $body = $request->getParsedBody();

        $errors = [];
        if(!preg_match('/^\w{5,40}$/', $body['login'])){
            $errors['login'] = 'Длинна логина должна быть от 5 до 40 символов';
        }
        if(!preg_match('/^\w{5,50}$/', $body['password'])){
            $errors['password'] = 'Пароль слишком слабый';
        }
        if(!filter_var($body['email'], FILTER_VALIDATE_EMAIL)){
            $errors['email'] = 'Ошибка при вводе почты';
        }
        if($body['confirm_password'] !== $body['password']){
            $errors['confirm_password'] = 'Пароли не совпадают';
        }
        if(count($errors)){
            return $view->make('register', ['errors' => $errors, 'body' => $body]);
        }

        try {
            $user = new User();
            $userData = $user->create($body);
            UsersAuthService::setToken($userData['token']);

            return new RedirectResponse("/profile");
        }catch (\Exception $exception){
            return $view->make('register', ['registerError' => 'Произошла ошибка регистрации']);
        }
    }

    public function auth(ServerRequestInterface $request, View $view){
        $body = $request->getParsedBody();

        $errors = [];
        if(!filter_var($body['email'], FILTER_VALIDATE_EMAIL)){
            $errors['email'] = 'Ошибка при вводе почты';
        }
        if(!preg_match('/^\w{5,50}$/', $body['password'])){
            $errors['password'] = 'Ошибка при вводе пароля';
        }
        if(count($errors)){
            return $view->make('auth', ['errors' => $errors, 'body' => $body]);
        }

        try {
            $user = new User();
            $userData = $user->getUser($body['password'], $body['email']);

            $userToken = Cryptography::generateToken();
            $user->update($userData['id'], ['token' => $userToken]);
            UsersAuthService::setToken($userToken);

            return new RedirectResponse("/profile");
        }catch (\Exception $exception){
            return $view->make('auth', ['authError' => $exception->getMessage()]);
        }
    }
}