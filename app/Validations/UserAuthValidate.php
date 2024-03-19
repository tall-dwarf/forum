<?php

namespace App\Validations;

class UserAuthValidate extends Validation
{
    protected array $fields = ['email', 'password'];

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
}