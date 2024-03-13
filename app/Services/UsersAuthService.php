<?php

namespace App\Services;


use App\Entities\User;
use HemiFrame\Lib\SQLBuilder\QueryException;

class UsersAuthService extends Service
{
    public static function setToken(string $token): void
    {
        $time = base64_encode(serialize((new \DateTime())->add(new \DateInterval('PT6H'))));
        setcookie('token', "$time:$token", 0, '/', '', false, true);
    }

    public static function getUserByToken(string $token): bool|array
    {
        if (empty($token)) {
            return false;
        }

        [$time, $token] = explode(":", $token);
        $time = unserialize(base64_decode($time));

        if(($time->format('U') - (new \DateTime())->format('U')) < 0){
            return false;
        }

        $user = new User();
        return $user->getByField('token', $token);

    }
}