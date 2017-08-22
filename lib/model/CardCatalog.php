<?php

namespace Paggi\model;

use Paggi\model\Card;

/**
 * Class CardCatalog - This class has a list of cards
 * @package Paggi\model
 */
class CardCatalog{

    public $total = 0;
    public $result = array();

    public function __construct($response)
    {
        if(!is_null($response)) {
            $this->total = sizeof($response);

            $this->total = sizeof($response);
            foreach ($response as $value) {
                $card = new Card($value);
                array_push($this->result, $card);
            }
        }
    }
}


?>