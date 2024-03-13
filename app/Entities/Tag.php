<?php

namespace App\Entities;

class Tag extends  Entity
{
    protected string $table = 'tag';
    protected array $columns = ['id', 'name'];
}