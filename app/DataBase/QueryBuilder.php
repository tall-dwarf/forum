<?php

namespace App\DataBase;
use NilPortugues\Sql\QueryBuilder\Builder\MySqlBuilder;

class QueryBuilder
{
    private MySqlBuilder $builder;
    public function __construct()
    {
        $this->builder = new MySqlBuilder();
    }

    public function insert(string $table, array $values)
    {
        $query = $this->builder->insert()
            ->setTable($table)
            ->setValues($values);

        $sql = $this->builder->writeFormatted($query);
        $values = $this->builder->getValues();

        return ['sql' => $sql, 'values' => $values];
    }
}