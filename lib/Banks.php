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
     * List all banks
     * @return Bank
     */
   static public function findAll($query_params = []){
        $response =  self::traitFindAll($query_params);
        return new Bank($response);
    }

}
?>