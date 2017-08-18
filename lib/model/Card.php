<?php

namespace Paggi\model;

use Paggi\ModelBuild;

class Card implements \JsonSerializable
{
    use ModelBuild;

    public $customer_id;
    public $name;
    public $number;
    public $month;
    public $year;
    public $cvc;
    public $card_alias;
    public $default;
    public $validate;
    public $statement_descriptor;
    public $metadata;
    public $address;
    public $last4;
    public $id;
    public $brand;
    public $cvc_check;
    public $acquirer_code;
    public $bin;
    public $acquirer_message;
    public $country;

    public function __construct($parameters)
    {
        $this->buildObject($parameters);
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

}

?>