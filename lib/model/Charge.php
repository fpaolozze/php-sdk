<?php

namespace Paggi\model;

use Paggi\ModelBuild;

class Charge{

    use ModelBuild;

    public $total;
    public $result = array();
    public $customer_id;
    public $capture = false;
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
}


?>