<?php

namespace App\Controllers;

use App\Entities\Comment;
use App\Entities\Hemiflame;
use App\Entities\Record;
use App\Entities\Tag;
use App\Services\UsersAuthService;
use MiladRahimi\PhpRouter\View\View;
use Psr\Http\Message\ServerRequestInterface;

class ForumController
{
    public function index(View $view, ServerRequestInterface $request)
    {
        try {
            $queryParams = $request->getQueryParams();

            $tag = new Tag();
            $tags = $tag->getAll([]);

            $record = new Record();
            $records = $record->getAll($queryParams);

            return $view->make('forum', ['tags' => $tags, 'records' => $records['data'], 'pages' => $records['pages']]);
        }catch (\Exception $e){
            return $view->make('forum', ['message' => 'Произошла ошибка']);
        }
    }

    public function record($id, View $view, ServerRequestInterface $request)
    {
        if(!is_numeric($id)){
            return $view->make('404');
        }

        $record = new Record();
        $recordItem = $record->getItem($id);

        if(!$recordItem){
            return $view->make('404');
        }

        $tag = new Tag();
        $recordItem['tags'] = $tag->getByRecordId($recordItem['id']);

        $comment = new Comment();
        $recordItem['comments'] = $comment->getByRecordId($recordItem['id']);

        return $view->make('record', ['record' => $recordItem, 'user' => $request->getAttribute('user')]);
    }
}