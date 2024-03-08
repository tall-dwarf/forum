<?php
namespace App\DataBase;

use App\Config;
use PDO;
class DB
{
    private $db;
    public function __construct()
    {
        $config = Config::DB;
        $this->db = new PDO("mysql:host={$config['host']};dbname={$config['dbname']}", $config['login'], $config['password']);
    }

    public function query($sql, $params = []): bool|array
    {
        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}