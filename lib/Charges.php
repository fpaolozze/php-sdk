<?php

namespace Paggi;

use Paggi\model\Charge;
use Paggi\model\ChargeCatalog;

class Charges
{
    use Util;
    use findAll;
    use findById;
    use charge_;
    use insert;

    private $restClient;

    public function __construct($restClient)// $isParam = true
    {
        $this->restClient = $restClient;
    }

    public function charge($body){
        $response = $this->_charge($this->restClient,$body);
        return new Charge($response);
    }

    public function cancel($chargeId)
    {
        $response = $this->_cancelCapture($this->restClient,$chargeId,"cancel");
        return new Charge($response);
    }

    public function capture($chargeId){
        $response = $this->_cancelCapture($this->restClient,$chargeId,"capture");
        return new Charge($response);
    }

    public function findAll($query_params = []){
        $response =  $this->_findAll($this->restClient, $query_params);
        return new ChargeCatalog($response);
    }

    public function findById($charge_id){
        $response =  $this->_findById($this->restClient,$charge_id);
        return new Charge($response);
    }


}

class Installments
{
    public $status;
    public $number;
    public $expected_date;
    public $amount;
}


?>
