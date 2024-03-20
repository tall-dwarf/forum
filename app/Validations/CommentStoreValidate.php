<?php

namespace App\Validations;

class CommentStoreValidate extends Validation
{
    protected array $fields = ['recordId', 'text'];

    public function recordId($recordId)
    {
        if(!is_numeric($recordId)){
            $this->errors['recordId'] = 'Ошибка отправки формы';
        }
    }

    public function text($text)
    {
        if(strlen($text) < 2){
            $this->errors['recordId'] = 'Ошибка отпрвки формы';
        }
    }
}