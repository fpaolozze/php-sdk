<?php

namespace Paggi\Model;

use Paggi\ModelBuild;

/**
 * Class BankAccount
 * @package Paggi\Model
 */
class BankAccount{

    use ModelBuild;

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