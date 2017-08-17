<?php
namespace Paggi\model;

class Address implements \JsonSerializable {

    public $street;
    public $neighborhood;
    public $city;
    public $state;
    public $zip;


    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}


?>