<?php

namespace Paggi;

class Banks{

    use Util;

    use findAll; //List all banks

    private $restClient;

    public function __construct($restClient)
    {
        $this->restClient = $restClient;
    }

    /**
     * List all banks
     */
    public function findAll(){
        return $this->_findAll($this->restClient,[]);
    }

}
?>