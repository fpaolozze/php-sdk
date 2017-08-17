<?php

namespace Paggi;

class Customers
{

    public $name;
    public $email;
    public $document;
    public $phone;
    public $description;
    public $metadata;
    public $address;
    public $card;

    use findAll, findById, insert, update {
    }

    public function __construct()
    {
    }

    public function _set($properties){
        foreach($properties as $key => $value){
                if (array_key_exists($key, self::getClass($this)->getDefaultProperties())) {
                    $this->{$key} = $value;
            }
        }
    }
}

?>