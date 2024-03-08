<?php

namespace App\Services;


use App\Entities\User;

class UsersAuthService extends Service
{
    public static function setToken(string $token): void
    {
        setcookie('token', $token, 0, '/', '', false, true);
    }

    public static function getUserByToken(string $token): bool|array
    {
        if (empty($token)) {
            return false;
        }

        $user = new User();
        return $user->getItemByField('token', $token);

    }
}