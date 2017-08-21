<?php

namespace Paggi\Model;

use Paggi\ModelBuild;

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
        if(!is_null($response)){
            $this->buildObject($response);
        }
    }

}

?>