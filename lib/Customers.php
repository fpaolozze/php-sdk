<?php

namespace Paggi;

class Customers{

    use find, findById, insert, delete {
        find::__construct as private __findConstruct;
        findById::__construct as private __findByIdConstruct;
        insert::__construct as private __insertConstruct;
    }

    public function __construct()
    {
        $this->__findConstruct();
        $this->__findByIdConstruct();
        $this->__insertConstruct();

    }
}
?>