<?php

namespace App\Controllers;

use App\Entities\Comment;
use App\Validations\CommentStoreValidate;
use Laminas\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ServerRequestInterface;

class CommentController
{
    public function store(ServerRequestInterface $request, CommentStoreValidate $storeValidate)
    {
        $errors = $storeValidate->getErrors();
        if(count($errors)){
            return new JsonResponse(['ok' => false, 'errors' => $errors], 400);
        }

        $data = $storeValidate->getData();
        $user = $request->getAttribute('user');

        $comment = new Comment();
        $comment->create(['user_id' => $user['id'], 'record_id' => (int)$data['recordId'], 'text' => $data['text']]);

        return new JsonResponse(['ok' => true]);
    }
}