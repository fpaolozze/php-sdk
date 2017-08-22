<?php

namespace Paggi\Model;

use Paggi\findById;
use Paggi\ModelBuild;
use Paggi\update;
use Paggi\Util;

/**
 * Class BankAccount
 * @package Paggi\Model
 */
class BankAccount{

    use ModelBuild;

    use Util;

    use update, findById;

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
     * Retrieves a Bank account by id
     * @param Bank account id
     * @return BankAccount
     */
    public function findById(){
        $response = self::traitFindById();
        return new BankAccount($response);
    }

    /**
     * Update a bank account
     * @param $bank_account_id Bank
     * @param $body_params
     * @return BankAccount
     */
    public function update($body_params = []){
        $response = self::update($body_params);
        return new BankAccount($response);
    }

}

?>