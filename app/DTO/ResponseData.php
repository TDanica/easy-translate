<?php

namespace App\DTO;

class ResponseData
{
    protected $data = [];

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function __get($property)
    {
        if (array_key_exists($property, $this->data)) {
            return $this->data[$property];
        }

        return null;
    }

    public function __set($property, $value)
    {
        $this->data[$property] = $value;
    }
}
