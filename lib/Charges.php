<?php

namespace Paggi;

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
        return $this->_charge($this->restClient,$body);
    }

    public function cancel($chargeId)
    {
        return $this->_cancelCapture($this->restClient,$chargeId,"cancel");
    }

    public function capture($chargeId){
        return $this->_cancelCapture($this->restClient,$chargeId,"capture");
    }

    public function findAll($query_params = []){
        return $this->_findAll($this->restClient, $query_params);
    }

    public function findById($charge_id){
        return $this->_findById($this->restClient,$charge_id);
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
