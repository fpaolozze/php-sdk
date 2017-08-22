<?php

namespace Paggi\model;

use Paggi\charge_;
use Paggi\findById;
use Paggi\ModelBuild;
use Paggi\Util;

/**
 * Class Charge
 * @package Paggi\model
 */
class Charge{

    use ModelBuild;

    use Util;

    use charge_;

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

    /**
     * Used to manueally cancel any charge or pre authorization that wasn't already cancelled
     * @return Charge model
     */
    public function cancel()
    {
        $response = self::_cancelCapture("cancel");
        return new Charge($response);
    }

    /**
     * Captures an existing pre authorization
     * @return Charge
     */
    public function capture(){
        $response = self::_cancelCapture("capture");
        return new Charge($response);
    }
}


?>