<?php

namespace Paggi\model;

use Paggi\ModelBuild;

class Bank implements \JsonSerializable {

    use ModelBuild;

    public $name;
    public $id;

    public function __construct($response)
    {
        $this->buildObject($response);
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}


?>