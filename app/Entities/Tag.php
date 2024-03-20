<?php

namespace App\Entities;

use HemiFrame\Lib\SQLBuilder\QueryException;

class Tag extends  Hemiflame
{
    protected string $table = 'tag';
    protected array $columns = ['id', 'name'];

    /**
     * @throws QueryException
     */
    public function getByRecordId($recordId): array
    {
        $this->query
            ->select('*')
            ->from('tag', 't')
            ->innerJoin('record_on_tag' ,'rt', 't.id=rt.tag_id')
            ->where('rt.record_id', $recordId);

        $this->query->execute();
        return $this->query->fetchArrays();
    }
}