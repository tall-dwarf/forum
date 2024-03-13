<?php

namespace App\Controllers;

use App\Entities\User;
use App\Services\UsersAuthService;
use Laminas\Diactoros\Response\RedirectResponse;
use MiladRahimi\PhpRouter\View\View;
use Psr\Http\Message\ServerRequestInterface;
use Gumlet\ImageResize;

class ProfileController
{
    public function profilePage(View $view, ServerRequestInterface $request)
    {
        return $view->make('profile', ['user' => $request->getAttribute('user')]);
    }


    public function loadPhoto(View $view, ServerRequestInterface $request)
    {
        $userData = $request->getAttribute('user');
        $photo = $request->getUploadedFiles()['photo'];

        $maxFileSize = 5000000;
        if($photo->getSize() > $maxFileSize){
            return $view->make('profile', ['user' => $userData, 'loadPhotoError' => 'Размер файла слишком большой']);
        }

        $photoName = $userData['id'] . bin2hex(random_bytes(40 / 2));
        $photoPath = "upload/users/$photoName.jpg";
        $photo->moveTo($photoPath);

        $image = new ImageResize($photoPath);
        $image->resize(100, 100);
        $image->save($photoPath);

        $user = new User();
        $user->update($userData['id'], ['photo' => $photoPath]);

        if(file_exists($userData['photo'])){
            unlink($userData['photo']);
        }

        $userData['photo'] = $photoPath;
        return $view->make('profile', ['user' => $userData]);
    }
}