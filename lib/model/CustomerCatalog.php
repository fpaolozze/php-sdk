<?php

namespace Paggi\model;

use Paggi\ModelBuild;

/**
 * Class CustomerCatalog - has a list of Customers
 * @package Paggi\model
 */
class CustomerCatalog
{
    use ModelBuild;

    public $total = 0;
    public $result = array();

    public function __construct($response)
    {
        $this->buildObject($response);
    }
}

?>