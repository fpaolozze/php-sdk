<?php

namespace Paggi;

class Bank_accounts
{
    use insert, findAll, findById, update, ModelBuild;

    public $total;
    public $result = array();


    /**public $id;
    public $customer_id;
    public $bank;
    public $number;
    public $digit ;
    public $branch ;
    public $branch_digit;
    public $bank_id;*/

    public $id;
    public $customer_id = "customer_7241f2c6-d8d7-4648-9843-e494c1ac881b";
    public $bank;
    public $number = "0000";
    public $digit = "0";
    public $branch = "000";
    public $branch_digit;
    public $bank_id = "bank_30860418-f51d-423f-812a-4d7cb659ac82";


    public function __construct($parameters)
    {
            $this->build($parameters);
    }

    public function save(){

    }
}

class Bank{

    public $id;
    public $name;
}


?>