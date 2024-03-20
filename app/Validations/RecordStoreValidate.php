<?php

namespace App\Validations;

class RecordStoreValidate extends  Validation
{
    protected array $fields = ['name', 'text'];

    public function name($name)
    {
        if(strlen($name) < 2){
            $this->errors['name'] = 'Поле обязательно для заполнения';
        }
    }

    public function text($text)
    {
        if(strlen($text) < 2){
            $this->errors['text'] = 'Поле обязательно для заполнения';
        }
    }
}