<?php

namespace Paggi;

use Paggi\model\Bank_account;
use Paggi\model\BankAccountCatalog;

class Bank_accounts
{
    //The methods uses methods from Util
    use Util;

    //Actions for this resource
    use insert, findAll;

    /**
     * Create a new account of customer
     * @param $params
     * @return BankAccount
     */
    static public function create($params){
        $response = self::traitCreate($params);
        return new Bank_account($response);
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