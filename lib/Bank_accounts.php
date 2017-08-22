<?php

namespace Paggi;

use Paggi\model\BankAccount;
use Paggi\model\BankAccountCatalog;

class Bank_accounts
{
    //The methods uses methods from Util
    use Util;

    //Actions for this resource
    use insert, findAll;

    private $restClient;

    /**
     * Bank_accounts constructor.
     * @param $restClient  The RestClient manage the curl
     */
    public function __construct($rest)
    {
        $this->restClient = $rest;
    }

    /**
     * Create a new account of customer
     * @param $params
     * @return BankAccount
     */
    static public function create($params){
        $response = self::traitCreate($params);
        return new BankAccount($response);
    }

    /**
     * List all banks accounts
     * @param array Query params to pagination
     * @return BankAccountCatalog
     */
    static public function findAll($query_params = [])
    {
        $response = self::traitFindAll($query_params);
        return new BankAccountCatalog($response);
    }
}

?>