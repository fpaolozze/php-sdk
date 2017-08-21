<?php

namespace Paggi;

use Paggi\model\Bank;

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
        $response =  $this->_findAll($this->restClient,[]);
        return new Bank($response);
    }

}
?>