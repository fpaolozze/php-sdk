<?php

namespace Paggi;

class Bank implements \JsonSerializable {

    use ModelBuild;

    public $id;
    public $name;

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