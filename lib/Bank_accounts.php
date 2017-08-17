<?php

namespace Paggi;

class Bank_accounts
{

    public $total;
    public $result = array();


    public $id;
    public $customer_id;
    public $bank;
    public $number;
    public $digit;
    public $branch;
    public $branch_digit;

    use insert, findAll, findById, update;

    public function __construct()
    {
    }


    public function _set($properties){
        $classe = new \ReflectionObject($this);
        foreach($properties as $key => $value){
            if (array_key_exists($key, $classe->getDefaultProperties())) {
                $this->{$key} = $value;
            }
        }
    }
}

class Bank{

    public $id;
    public $name;
}


?>