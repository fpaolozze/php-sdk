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
    private $result = array();
    public $list = array();

    public function __construct($response)
    {
        $this->buildObject($response);

        $this->list = $this->result;
    }
}

?>