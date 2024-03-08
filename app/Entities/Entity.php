<?php
namespace App\Entities;

use App\DataBase\DB;
use NilPortugues\Sql\QueryBuilder\Builder\MySqlBuilder;
use NilPortugues\Sql\QueryBuilder\Manipulation\QueryInterface;

abstract class Entity
{
    protected string $table = '';
    protected array $columns = [];
    protected MySqlBuilder $builder;
    protected DB $db;
    public function __construct(){
        $this->builder = new MySqlBuilder();
        $this->db = new DB();
    }

    public function sendQuery(QueryInterface $query)
    {
        $sql = $this->builder->writeFormatted($query);
        $values = $this->builder->getValues();
        return $this->db->query($sql, $values);
    }

    public function getItemByField(string $field, $value): bool|array
    {
        $query = $this->builder->select()
            ->setTable($this->table)
            ->setColumns($this->columns)
            ->where()
            ->equals($field, $value)
            ->end();

        return $this->sendQuery($query);
    }

    public function create(array $data): bool|array
    {
        $query = $this->builder->insert()
            ->setTable($this->table)
            ->setValues($data);

        return $this->sendQuery($query);

    }
}