<?php

namespace App\Entities;

use HemiFrame\Lib\SQLBuilder\QueryException;

class Comment extends Hemiflame
{
    protected string $table = 'comment';
    protected array $columns = ['id', 'user_id', 'record_id', 'text'];

    /**
     * @throws QueryException
     */
    public function getByRecordId(string $recordId): array|null
    {
        $this->query
            ->select(['c.*', 'u.login', 'u.photo'])
            ->from('comment', 'c')
            ->where('c.record_id', $recordId)
            ->innerJoin('user', 'u', 'c.user_id=u.id');
        $this->query->execute();
        return $this->query->fetchArrays();
    }
}