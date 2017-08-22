<?php

namespace Paggi\model;

use Paggi\delete;
use Paggi\findById;
use Paggi\insert;
use Paggi\ModelBuild;
use Paggi\Util;

/**
 * Class Card
 * @package Paggi\model
 */
class Card
{
    use ModelBuild;

    use Util;

    use delete;

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

    public function delete(){
        $res = $this->traitDelete();
        return new Card($res);
    }


}

?>