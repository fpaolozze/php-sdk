<?php

namespace Paggi\model;

/**
 * Class CardCatalog - This class has a list of cards
 * @package Paggi\model
 */
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