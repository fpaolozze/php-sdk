<?php

namespace Paggi\model;

class Bank
{

    public $result = array();

    public function __construct($response)
    {
        foreach ($response as $objeto) {
            $banco = new Banco();
            $banco->name = $objeto['name'];
            $banco->id = $objeto['id'];
            array_push($this->result, $banco);
        }
    }
}

class Banco
{
    public $name;
    public $id;
}


?>