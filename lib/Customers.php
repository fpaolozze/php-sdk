<?php

namespace Paggi;

class Customers
{

    use findAll, findById, insert, update {
        findAll::__construct as private __findConstruct;
        findById::__construct as private __findByIdConstruct;
        insert::__construct as private __insertConstruct;
        update::__construct as private __updateConstruct;
    }

    public function __construct()
    {
        $this->__findConstruct();
        $this->__findByIdConstruct();
        $this->__insertConstruct();
        $this->__updateConstruct();
    }
}

?>