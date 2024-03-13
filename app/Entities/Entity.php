<?php
namespace App\Entities;

use App\DataBase\DB;
use NilPortugues\Sql\QueryBuilder\Builder\MySqlBuilder;
use NilPortugues\Sql\QueryBuilder\Manipulation\ColumnQuery;
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

    public function sendQuery(QueryInterface $query, $many = false): bool|array
    {
        $sql = $this->builder->writeFormatted($query);
        $values = $this->builder->getValues();
        return $this->db->query($sql, $values, $many);
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

    public function update(int $id, array $values): bool|array
    {
        $query = $this->builder->update()
            ->setTable($this->table)
            ->setValues($values)
            ->where()
            ->equals('id', $id)
            ->end();

        return $this->sendQuery($query);
    }

    public function getAll(array $params): bool|array
    {
        $query = $this->builder->select()->setTable($this->table);
        return $this->sendQuery($query, true);
    }
}