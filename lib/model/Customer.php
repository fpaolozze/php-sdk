<?php

namespace Paggi\model;

use Paggi\ModelBuild;

/**
 * Class Customer
 * @package Paggi\model
 */
class Customer
{
    use ModelBuild;

    public $phone;
    public $name;
    public $metadata;
    public $id;
    public $email;
    public $document;
    public $description;
    public $created;

    public $address = array();
    public $cards = array();

    public function __construct($response)
    {
        $this->buildObject($response);
    }
}

?>