<?php
namespace App\Controllers;

use App\Helpers\Cryptography;
use App\Services\UsersAuthService;
use App\Validations\UserAuthValidate;
use App\Validations\UserRegisterValidate;
use MiladRahimi\PhpRouter\View\View;
use Psr\Http\Message\ServerRequestInterface;
use App\Entities\User;
use Laminas\Diactoros\Response\RedirectResponse;
class UserController
{
    public function registerPage(View $view, )
    {
        return $view->make('register');
    }
    public function authPage(View $view)
    {
        return $view->make('auth');
    }
    public function register(View $view, UserRegisterValidate $userRegister, User $user){
        if($userRegister->isValid()) {
            return $view->make('register',
                ['errors' => $userRegister->getErrors(), 'body' => $userRegister->getData()]);
        }
        try {
            $data = $userRegister->getData();
            $userToken = $user->create($data);
            UsersAuthService::setToken($userToken);
            return new RedirectResponse("/profile");
        }catch (\Exception $exception){
            return $view->make('register', ['registerError' => $exception->getMessage()]);
        }
    }

    public function auth(View $view, UserAuthValidate $authValidate, User $user){
        if($authValidate->isValid()) {
            return $view->make('auth',
                ['errors' => $authValidate->getErrors(), 'body' => $authValidate->getData()]);
        }

        try {
            $data = $authValidate->getData();

            $userData = $user->getUser($data['password'], $data['email']);
            $user->refreshQuery();

            $userToken = Cryptography::generateToken();
            UsersAuthService::setToken($userToken);

            $user->update($userData['id'], ['token' => $userToken]);

            return new RedirectResponse("/profile");
        }catch (\Exception $exception){
            return $view->make('auth', ['authError' => $exception->getMessage()]);
        }
    }
}