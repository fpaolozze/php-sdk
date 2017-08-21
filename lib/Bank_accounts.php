<?php

namespace Paggi;

use Paggi\model\BankAccount;
use Paggi\model\BankAccountCatalog;

class Bank_accounts
{
    use Util; //The methods uses methods from Util

    use insert, findAll, findById, update;

    private $restClient;

    public function __construct()
    {
        $this->restClient = new RestClient();
    }

    public function create($params){
        $response = $this->_create($this->restClient, $params);
        return new BankAccount($response);
    }

    public function findAll($query_params = []){
        $response = $this->_findAll($this->restClient,$query_params);
        return new BankAccountCatalog($response);
    }

    public function findById($bank_account_id){
        $response = $this->_findById($this->restClient,$bank_account_id);
        return new BankAccount($response);
    }

    public function update($bank_account_id, $body_params){
        $response = $this->_update($this->restClient,$bank_account_id,$body_params);
        return new BankAccount($response);
    }
}

?>