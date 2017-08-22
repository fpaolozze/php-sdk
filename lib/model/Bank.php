<?php

namespace Paggi\model;

use Paggi\ModelBuild;
use Paggi\Paggi;

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
        /*        if(!is_null($response)) {
                    $this->total = sizeof($response);
                    foreach ($response as $objeto) {
                        $banco = new BankObj();
                        $banco->name = $objeto['name'];
                        $banco->id = $objeto['id'];
                        array_push($this->result, $banco);
                    }
                }*/

        if (!is_null($response)) {
            $this->total = sizeof($response);

            $resut = $response['result'];

            foreach ($resut as $value) {
                $bank = new BankObj($value);
                array_push($this->result, $bank);
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

    use ModelBuild;


    public $name;
    public $id;

    public function __construct($parameters)
    {
        $this->buildObject($parameters);
    }
}


?>