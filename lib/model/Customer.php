<?php

namespace Paggi\model;

use Paggi\ModelBuild;

class Customer implements \JsonSerializable
{
    use ModelBuild;

    public $total = 1;
    public $result = array();

    //response
    public $name;
    public $email;
    public $document;
    public $phone;
    public $address;
    public $card;
    public $id;
    //body/response
    public $description;
    public $metadata;

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