<?php

namespace App\Entities;

use HemiFrame\Lib\SQLBuilder\QueryException;

class Comment extends Hemiflame
{
    protected string $table = 'comment';

    /**
     * @throws QueryException
     */
    public function getByRecordId(string $recordId): array|null
    {
        $this->query
            ->select(['c.*', 'u.login', 'u.photo'])
            ->from('comment', 'c')
            ->where('c.record_id', $recordId)
            ->innerJoin('user', 'u', 'c.user_id=u.id')
        ->orderBy('c.date DESC');
        $this->query->execute();
        return $this->query->fetchArrays();
    }
}