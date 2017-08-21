<?php

namespace Paggi\Model;

use Paggi\ModelBuild;

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