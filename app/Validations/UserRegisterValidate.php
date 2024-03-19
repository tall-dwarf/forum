<?php
namespace App\Validations;

use Psr\Http\Message\ServerRequestInterface;

class UserRegisterValidate extends Validation
{
    protected array $fields = ['login', 'password', 'email', 'confirm_password'];
    public function login($login)
    {
        if(!preg_match('/^\w{5,40}$/', $login)){
            $this->errors['login'] = 'Длинна логина должна быть от 5 до 40 символов';
        }
    }

    public function password($password)
    {
        if(!preg_match('/^\w{5,50}$/', $password)){
            $this->errors['password'] = 'Пароль слишком слабый';
        }
    }

    public function email($email)
    {
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $this->errors['email'] = 'Почта имеет не верный формат';
        }
    }

    public function confirm_password()
    {
        $data = $this->getData();
        if($data['confirm_password'] !== $data['password']){
            $this->errors['confirm_password'] = 'Пароли не совпадают';
        }
    }
}