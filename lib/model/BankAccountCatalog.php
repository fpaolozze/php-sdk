<?php

namespace Paggi\model;

use Paggi\ModelBuild;
use Paggi\model\Bank_account;

/**
 * Class BankAccountCatalog - This class has a lit of BankAccounts
 * @package Paggi\Model
 */
class BankAccountCatalog{

    use ModelBuild;

    public $total = 0;
    public $result = array();

    public function __construct($response)
    {
        $resultados = $response['result'];

        $this->total = sizeof($resultados);
        foreach ($resultados as $value) {
            $bank_account = new Bank_account($value);
            array_push($this->result,$bank_account);
        }
    }

}

?>