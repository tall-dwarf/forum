<?php

namespace App\Entities;

use NilPortugues\Sql\QueryBuilder\Builder\GenericBuilder;
use NilPortugues\Sql\QueryBuilder\Builder\MySqlBuilder;
use NilPortugues\Sql\QueryBuilder\Syntax\OrderBy;

class Record extends Hemiflame
{
    protected string $table = 'record';
    protected array $columns = ['id', 'name', 'date', 'text', 'user_id'];

    public function getAll(array $params): ?array
    {
        $this->query
            ->select('r.*')
            ->from('record', 'r')
            ->groupBy('r.id');

        if(isset($params['name']) && strlen($params['name']) > 0){
            $this->query->andWhere('r.name,r.text', "{$params['name']}", 'fulltext');
        }

        if(isset($params['tag'])){
            $this->query
                ->innerJoin('record_on_tags' ,'rt', 'r.id=rt.record_id')
                ->innerJoin('tag', 't', 't.id=rt.tag_id')
                ->andWhere('t.id', $params['tag']);
        }

        $page = $params['page'] ?? 1;
        $this->query->paginationLimit((int)$page, 10);

        $this->query->execute();
        return $this->query->fetchArrays();
    }
}