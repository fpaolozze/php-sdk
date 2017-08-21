<?php

namespace Paggi\Model;

use Paggi\ModelBuild;

class ChargeCatalog{

    use ModelBuild;


    public function __construct($response)
    {
        $this->buildObject($response);
    }

    /**
     * @var int
     */
    public $total;
    /**
     * @var array
     */
    public $result = array();

}

?>