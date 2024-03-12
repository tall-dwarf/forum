<?php
namespace App\Entities;

use App\Helpers\Cryptography;
class User extends Entity
{
    protected string $table = 'user';
    protected array $columns = ['id', 'login', 'token', 'created_at', 'password', 'email', 'photo'];
    public function create(array $data): bool|array
    {
        $userData = [
            'login' => $data['login'],
            'password' => Cryptography::passwordHash($data['password']),
            'token' => Cryptography::generateToken(),
            'email' => $data['email']
        ];

        parent::create($userData);
        return $userData;
    }

    public function getUser(string $password, string $email)
    {
        $userData = $this->getItemByField('email', $email);

        if(!Cryptography::passwordVerify($password, $userData['password'])) {
            throw new \Exception("Неверный пароль");
        }

        return $userData;
    }
}