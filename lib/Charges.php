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


}

class Installments
{
    public $status;
    public $number;
    public $expected_date;
    public $amount;
}


?>
