<?php

namespace Paggi\model;

use Paggi\findById;
use Paggi\ModelBuild;
use Paggi\update;
use Paggi\Util;

/**
 * Class BankAccount
 * @package Paggi\Model
 */
class Bank_account{

    use ModelBuild;

    use Util;

    use update;

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

    /**
     * Update a bank account
     * @param $bank_account_id Bank
     * @param $body_params
     * @return BankAccount
     */
    public function update($body_params = []){
        $response = self::traitUpdate($body_params);
        return new Bank_account($response);
    }

}

?>