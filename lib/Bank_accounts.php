<?php

namespace Paggi;

class Bank_accounts
{

    use insert, findAll, findById, update {
        insert::__construct as private __insertConstruct;
        findAll::__construct as private __findAllConstruct;
        findById::__construct as private __findByIdConstruct;
        update::__construct as private __updateConstruct;
    }

    public function __construct()
    {
        $this->__insertConstruct();
        $this->__findAllConstruct();
        $this->__findByIdConstruct();
        $this->__updateConstruct();
    }
}
?>