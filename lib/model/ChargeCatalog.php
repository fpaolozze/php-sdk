<?php

namespace Paggi\Model;

use Paggi\ModelBuild;

/**
 * Class ChargeCatalog - has a list of charges
 * @package Paggi\Model
 */
class ChargeCatalog{

    use ModelBuild;

    public $total;
    public $result = array();

    public function __construct($response)
    {
        $this->buildObject($response);
    }
}

?>