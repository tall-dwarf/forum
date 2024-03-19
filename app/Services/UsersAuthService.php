<?php

namespace App\Services;


use App\Entities\User;
use HemiFrame\Lib\SQLBuilder\QueryException;

class UsersAuthService extends Service
{
    public static function setToken(string $token): void
    {
        $time = (new \DateTime())->add(new \DateInterval('PT6H'))->format('U');
        $time = base64_encode(serialize($time));
        setcookie('token', "$time:$token", 0, '/', '', false, true);
    }

    /**
     * @throws QueryException
     */
    public static function getUserByToken(string $token): null|array
    {
        if (empty($token)) {
            return null;
        }

        $data = explode(":", $token, 2);

        if(count($data) != 2){
            return null;
        }

        [$time, $token] = $data;
        $time = unserialize(base64_decode($time));

        if(!is_numeric($time)){
            return null;
        }

        if(($time - (new \DateTime())->format('U')) < 0){
            return null;
        }

        $user = new User();
        return $user->getByField('token', $token);

    }
}