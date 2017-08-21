<?php

namespace Paggi;

use Paggi\model\BankAccount;
use Paggi\model\BankAccountCatalog;

class Bank_accounts
{
    //The methods uses methods from Util
    use Util;

    //Actions for this resource
    use insert, findAll, findById, update;

    private $restClient;

    /**
     * Bank_accounts constructor.
     * @param $restClient  The RestClient manage the curl
     */
    public function __construct()
    {
        $this->restClient = new RestClient();
    }

    /**
     * Create a new account of customer
     * @param $params
     * @return BankAccount
     */
    public function create($params){
        $response = $this->_create($this->restClient, $params);
        return new BankAccount($response);
    }

    /**
     * List all banks accounts
     * @param array Query params to pagination
     * @return BankAccountCatalog
     */
    public function findAll($query_params = []){
        $response = $this->_findAll($this->restClient,$query_params);
        return new BankAccountCatalog($response);
    }

    /**
     * Retrieves a Bank account by id
     * @param Bank account id
     * @return BankAccount
     */
    public function findById($bank_account_id){
        $response = $this->_findById($this->restClient,$bank_account_id);
        return new BankAccount($response);
    }

    /**
     * Update a bank account
     * @param $bank_account_id Bank
     * @param $body_params
     * @return BankAccount
     */
    public function update($bank_account_id, $body_params){
        $response = $this->_update($this->restClient,$bank_account_id,$body_params);
        return new BankAccount($response);
    }
}

?>