<?php

namespace Paggi\model;

/**
 * Class CardCatalog - This class has a list of cards
 * @package Paggi\model
 */
class CardCatalog{

    public $total;
    public $list = array();

    public function __construct($response)
    {
        $this->list = $response;
        $this->total = sizeof($response);
    }
}


?>