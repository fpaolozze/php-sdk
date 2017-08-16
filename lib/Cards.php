<?php

namespace Paggi;

class Cards
{

    use find, findById, insert, delete {
        find::__construct as private __findConstruct;
        findById::__construct as private __findByIdConstruct;
        insert::__construct as private __insertConstruct;
        delete::__construct as private __deleteConstruct;
    }

    public function __construct()
    {
        $this->__findConstruct();
        $this->__findByIdConstruct();
        $this->__insertConstruct();
        $this->__deleteConstruct();
    }

}
?>
