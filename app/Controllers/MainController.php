<?php

namespace App\Controllers;
use MiladRahimi\PhpRouter\View\View;

class MainController
{
    public function index(View $view){
        return $view->make('index');
    }
}