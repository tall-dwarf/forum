<?php

namespace App\Validations;

use Psr\Http\Message\ServerRequestInterface;

class Validation
{
    private ServerRequestInterface $request;
    protected array $errors = [];
    protected array $fields = [];
    public function isValid(): bool
    {
        return count($this->errors) > 0;
    }

    public function getErrors(): array
    {
        return $this->errors;
    }
    public function __construct(ServerRequestInterface $request){
        $this->request = $request;
        $this->validate();
    }

    public function getData(): object|array|null
    {
        return $this->request->getParsedBody();
    }

    public function validate(): object|array|null
    {
        $data = $this->getData();

        foreach ($this->fields as $field){
            if(!array_key_exists($field, $data)){
                $this->errors[$field] = 'Поле не заполнено';
                continue;
            }
            call_user_func_array([$this, $field], [$data[$field],]);
        }

        return $data;
    }
}