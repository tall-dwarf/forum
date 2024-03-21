<?php

namespace App\Controllers;

use App\Entities\Comment;
use App\Entities\Record;
use App\Entities\Tag;
use MiladRahimi\PhpRouter\View\View;
use Psr\Http\Message\ServerRequestInterface;

class ForumController
{
    public function index(View $view, ServerRequestInterface $request, Tag $tag, Record $record)
    {
        try {
            $queryParams = $request->getQueryParams();

            $tags = $tag->getAll([]);
            $records = $record->getAll($queryParams);

            return $view->make('forum', ['tags' => $tags, 'records' => $records['data'], 'pages' => $records['pages']]);
        }catch (\Exception $e){
            return $view->make('forum', ['message' => 'Произошла ошибка']);
        }
    }

    public function record($id, View $view, ServerRequestInterface $request, Record $record, Tag $tag, Comment $comment)
    {
        if(!is_numeric($id)){
            return $view->make('404');
        }

        $recordItem = $record->getItem($id);

        if(!$recordItem){
            return $view->make('404');
        }

        return $view->make('record',
            [   'record' => $recordItem,
                'user' => $request->getAttribute('user'),
                'tags' => $tag->getByRecordId($recordItem['id']),
                'comments' => $comment->getByRecordId($recordItem['id'])
            ]);
    }
}