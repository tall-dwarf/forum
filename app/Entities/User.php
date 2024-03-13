<?php
namespace App\Entities;

use App\Helpers\Cryptography;
use HemiFrame\Lib\SQLBuilder\QueryException;

class User extends Hemiflame
{
    protected string $table = 'user';
    protected array $columns = ['id', 'login', 'token', 'created_at', 'password', 'email', 'photo'];
    public function create(array $values): array
    {
        $userData = [
            'login' => $values['login'],
            'password' => Cryptography::passwordHash($values['password']),
            'token' => Cryptography::generateToken(),
            'email' => $values['email']
        ];

        parent::create($userData);
        return $userData;
    }

    public function getUser(string $password, string $email): ?array
    {
        $userData = $this->getByField('email', $email);

        if(!Cryptography::passwordVerify($password, $userData['password'])) {
            throw new \Exception("Неверный пароль");
        }

        return $userData;
    }
}