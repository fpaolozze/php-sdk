<?php

namespace Paggi\Model;

use Paggi\ModelBuild;

class BankAccount{

    use ModelBuild;

    //public $total;
    //public $result = array();

    public $id;
    public $customer_id;
    public $bank = array();
    public $number;
    public $digit;
    public $branch;
    public $branch_digit;

    public function __construct($response)
    {
        $this->buildObject($response);
    }

}

?>