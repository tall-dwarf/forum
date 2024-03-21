<?php
namespace App\Entities;

use App\Helpers\Cryptography;
use HemiFrame\Lib\SQLBuilder\Query;
use HemiFrame\Lib\SQLBuilder\QueryException;

class User extends Hemiflame
{
    protected string $table = 'user';
    protected array $columns = ['id', 'login', 'token', 'created_at', 'password', 'email', 'photo'];

    /**
     * @throws QueryException
     * @throws \Exception
     */
    public function create(array $values): string
    {
        $user = $this->getByField('email', $values['email']);
        if($user){
            throw new \Exception('Пользователь с такой почтой уже существует');
        }

        $this->query = new Query();

        $userData = [
            'login' => $values['login'],
            'password' => Cryptography::passwordHash($values['password']),
            'token' => Cryptography::generateToken(),
            'email' => $values['email']
        ];

        parent::create($userData);
        return $userData['token'];
    }

    /**
     * @throws QueryException
     * @throws \Exception
     */
    public function getUser(string $password, string $email): ?array
    {
        $userData = $this->getByField('email', $email);

        if(!Cryptography::passwordVerify($password, $userData['password'])) {
            throw new \Exception("Неверный пароль");
        }

        return $userData;
    }
}