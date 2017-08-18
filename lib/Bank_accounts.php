<?php

namespace Paggi;

class Bank_accounts
{
    use insert, findAll, findById, update, ModelBuild;

    public $total;
    public $result = array();

    public $id;
    public $customer_id;
    public $bank;
    public $number;
    public $digit ;
    public $branch ;
    public $branch_digit;
    public $bank_id;

    public function __construct($parameters)
    {
        $this->build($parameters);
    }

    public function save(){

    }
}

?>