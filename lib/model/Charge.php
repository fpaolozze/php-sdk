<?php

namespace Paggi\model;

use Paggi\ModelBuild;

class Charge implements \JsonSerializable {

    use ModelBuild;

    public $total;
    public $result;
    public $customer_id ;
    public $capture;
    public $receipt_email;
    public $created;
    public $force;

    public $status;
    public $statement_descriptor;
    public $risk_analysis;
    public $metadata;
    public $installments_number;
    public $installments = array();
    public $id;
    public $expected_compensation;
    public $destination;
    public $customer;
    public $created_at;
    public $amount;
    public $acquirer_message;
    public $acquirer_code;




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