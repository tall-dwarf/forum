<?php

namespace App\Entities;

use HemiFrame\Lib\SQLBuilder\Query;
use HemiFrame\Lib\SQLBuilder\QueryException;
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
            ->groupBy('r.id')
        ->orderBy('r.date DESC');

        if(isset($params['name']) && strlen($params['name']) > 0){
            $this->query->andWhere('r.name,r.text', "{$params['name']}", 'fulltext');
        }

        if(isset($params['tag'])){
            $this->query
                ->innerJoin('record_on_tag' ,'rt', 'r.id=rt.record_id')
                ->innerJoin('tag', 't', 't.id=rt.tag_id')
                ->andWhere('t.id', $params['tag']);
        }

        $page = $params['page'] ?? 1;
        $this->query->paginationLimit((int)$page, 10);

        $this->query->execute();
        return $this->query->fetchArrays();
    }

    /**
     * @throws QueryException
     */
    public function getItem($id)
    {
        $this->query->select('*')->from($this->table)->where('id', $id);
        $this->query->execute();
        return $this->query->fetchFirstArray();
    }

    public function create(array $values)
    {
        $this->query->insertInto($this->table)->set(
            ['name' => $values['data']['name'], 'text' => $values['data']['text'], 'user_id' => $values['user']['id']]);
        $this->query->execute();

        $recordId = $this->query->getLastInsertId();
        $this->refreshQuery();

        $this->query
            ->insertInto('record_on_tag')
            ->values(['record_id', 'tag_id'],
            array_map(fn($tag) => [$recordId, $tag], $values['data']['tags']));
        $this->query->execute();
    }
}