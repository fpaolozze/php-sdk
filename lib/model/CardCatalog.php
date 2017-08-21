<?php

namespace Paggi\model;

class CardCatalog{

    public $total;
    public $result = array();

    public function __construct($response)
    {
        $this->result = $response;
        $this->total = sizeof($response);
    }
}


?>