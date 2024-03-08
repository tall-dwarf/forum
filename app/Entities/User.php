<?php
namespace App\Entities;

use App\Helpers\Cryptography;
class User extends Entity
{
    protected string $table = 'user';
    protected array $columns = ['id', 'login', 'token', 'created_at', 'password'];
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

//    public function getUserByToken(string $token)
//    {
//        $query = $this->builder->select()
//            ->setTable($this->table)
//            ->where()
//            ->equals('token', $token)->end();
//
//        $userData = $this->sendQuery($query);
//    }
    public function updateToken(int $userId)
    {
        $newToken = Cryptography::generateToken();

        $query = $this->builder->update()
            ->setTable('user')
            ->setValues(['token' => $newToken])
            ->where()
            ->equals('id', $userId)
            ->end();
        $this->sendQuery($query);

        return $newToken;
    }
}