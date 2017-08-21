<?php

namespace Paggi;

use Paggi\model\Bank;

class Banks{

    //The methods uses methods from Util
    use Util;

    //Actions list all
    use findAll;

    private $restClient;

    /**
     * Banks constructor. Inisitalize the rest client, for manage the curl
     * @param $restClient
     */
    public function __construct($restClient)
    {
        $this->restClient = $restClient;
    }

    /**
     * List all banks
     * @return Bank
     */
    public function findAll(){
        $response =  $this->_findAll($this->restClient,[]);
        return new Bank($response);
    }

}
?>