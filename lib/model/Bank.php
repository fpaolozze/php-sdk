<?php

namespace Paggi\model;

/**
 * Class Bank - Represents a Bank catalog
 * @package Paggi\model
 */
class Bank
{
    public $total = 0;
    public $result = array();

    public function __construct($response)
    {
        if(!is_null($response)) {
            $this->total = sizeof($response);
            foreach ($response as $objeto) {
                $banco = new BankObj();
                $banco->name = $objeto['name'];
                $banco->id = $objeto['id'];
                array_push($this->result, $banco);
            }
        }
    }
}

/**
 * Class BankObj - represents a bank model
 * @package Paggi\model
 */
class BankObj
{
    public $name;
    public $id;
}


?>