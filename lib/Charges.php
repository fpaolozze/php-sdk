<?php

namespace Paggi;

class Charges
{
    use findAll, findById, charge, insert,ModelBuild{
        charge::__construct as private __chargeConstruct;
    }

    public $total;
    public $result;

    //values to send
    public $amount = 100;
    public $customer_id = "customer_ab32d26f-f396-460e-a2c4-7963543055b4";
    public $statement_descriptor;
    public $capture;
    public $destination;
    public $risk_analysis;
    public $installments_number;
    public $force;

    public $status;
    public $receipt_email;
    public $metadata;
    public $id;
    public $acquirer_message;
    public $acquirer_code;
    public $expected_compensation;
    public $customer;
    public $created;
    public $installments;


    public function __construct($parameters)// $isParam = true
    {
        $this->__chargeConstruct();//ModelBuild::__construct();
        $this->build($parameters);
    }

    static public function chargeStatic(){
        
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
