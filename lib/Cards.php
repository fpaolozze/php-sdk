<?php

namespace Paggi;

class Cards
{

    use findAll, findById, insert, delete {
        findAll::__construct as private __findConstruct;
        //findById::__construct as private __findByIdConstruct;
        insert::__construct as private __insertConstruct;
        delete::__construct as private __deleteConstruct;
    }

    public function __construct()
    {
        $this->__findConstruct();
        //$this->__findByIdConstruct();
        $this->__insertConstruct();
        $this->__deleteConstruct();
    }

}
?>
