<?php

namespace App\Controllers;

use App\Entities\Hemiflame;
use App\Entities\Record;
use App\Entities\Tag;
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

            return $view->make('forum', ['tags' => $tags, 'records' => $records]);
        }catch (\Exception $e){
            print_r($e->getMessage());
        }
    }

    public function record($id, View $view)
    {
        if(!is_numeric($id)){
            return $view->make('404');
        }

        $record = new Record();
        $recordItem = $record->getItem($id);

        if(!$recordItem){
            return $view->make('404');
        }

        return $view->make('record', ['record' => $recordItem]);
    }
}