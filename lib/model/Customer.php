<?php

namespace Paggi\model;

use Paggi\delete;
use Paggi\findById;
use Paggi\ModelBuild;
use Paggi\update;
use Paggi\Util;

/**
 * Class Customer
 * @package Paggi\model
 */
class Customer
{
    use ModelBuild;

    use Util;

    use findById, update;

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


    public function findById()
    {
        $response = $this->traitFindById();
        return new Customer($response);
    }


    public function update($parameters = [])
    {
        $response = $this->traitUpdate($parameters);
        return new Customer($response);
    }

}

?>