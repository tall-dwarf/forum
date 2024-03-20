<?php

namespace App\Controllers;

use App\Entities\Record;
use App\Entities\Tag;
use App\Validations\RecordStoreValidate;
use MiladRahimi\PhpRouter\View\View;
use Psr\Http\Message\ServerRequestInterface;
use Laminas\Diactoros\Response\RedirectResponse;

class RecordController
{
    public function create(View $view, Tag $tag)
    {
        return $view->make('record-create', ['tags' => $tag->getAll([])]);
    }

    public function store(RecordStoreValidate $storeValidate, View $view, Tag $tag, Record $record, ServerRequestInterface $request)
    {

        if($storeValidate->isValid()){
            return $view->make('record-create',
                [   'errors' => $storeValidate->getErrors(),
                    'data'=> $storeValidate->getData(),
                    'tags' => $tag->getAll([])
                ]);
        }
        $record->create(['data' => $storeValidate->getData(), 'user' => $request->getAttribute('user')]);

        return new RedirectResponse('/forum');
    }
}