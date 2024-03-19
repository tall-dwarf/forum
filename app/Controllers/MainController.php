<?php

namespace App\Controllers;
use App\Validations\UserRegisterValidate;
use MiladRahimi\PhpRouter\View\View;

class MainController
{
    public function index(View $view){
        return $view->make('index');
    }
}