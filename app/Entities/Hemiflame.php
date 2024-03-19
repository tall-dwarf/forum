<?php

namespace App\Entities;

use App\Config;
use HemiFrame\Lib\SQLBuilder\Query;
use HemiFrame\Lib\SQLBuilder\QueryException;

class Hemiflame
{
    protected Query $query;
    protected string $table = '';
    public function __construct()
    {
        $config = Config::DB;
        $pdo = new \PDO("mysql:host={$config['host']};dbname={$config['dbname']}", $config['login'], $config['password'], [\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,]);
        $pdo->exec("set names utf8");
        Query::$global['pdo'] = $pdo;
        $this->query = new Query();
    }

    /**
     * @throws QueryException
     */
    public function getAll(array $params): ?array
    {
        $this->query->select('*')->from($this->table)->where('id', 1);
        $this->query->execute();
        return $this->query->fetchArrays();
    }

    /**
     * @throws QueryException
     */
    public function update(int $id, array $values): void
    {
        $this->query->update($this->table)->set($values)->andWhere('id', $id);
        $this->query->execute();
    }

    /**
     * @throws QueryException
     */
    public function create(array $values)
    {
        $this->query->insertInto($this->table)->set($values);
        $this->query->execute();
    }

    /**
     * @throws QueryException
     */
    public function getByField(string $field, $value): array | null
    {
        $this->query->select()->from($this->table)->where($field, $value);
        $this->query->execute();
        return $this->query->fetchFirstArray();
    }
}