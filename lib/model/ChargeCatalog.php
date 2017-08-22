<?php

namespace Paggi\model;

use Paggi\ModelBuild;
use Paggi\model\Charge;

/**
 * Class ChargeCatalog - has a list of charges
 * @package Paggi\Model
 */
class ChargeCatalog
{

    use ModelBuild;

    public $total;
    public $result = array();

    public function __construct($response)
    {
        $resultados = $response['result'];

        $this->total = sizeof($resultados);
        foreach ($resultados as $value) {
            $charge = new Charge($value);
            array_push($this->result,$charge);
        }
    }
}

?>