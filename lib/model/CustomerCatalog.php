<?php

namespace Paggi\model;

use Paggi\ModelBuild;
use Paggi\model\Customer;

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
        $resultados = $response['result'];

        $this->total = sizeof($resultados);
        foreach ($resultados as $value) {
            $charge = new Customer($value);
            array_push($this->result,$charge);
        }
    }
}

?>