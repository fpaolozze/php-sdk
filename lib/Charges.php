<?php

namespace Paggi;

use Paggi\model\Charge;
use Paggi\model\ChargeCatalog;

class Charges
{
    //The methods uses methods from Util
    use Util;
    //Actions methods
    use findAll;
    use findById;
    use charge_;
    use insert;

    private $restClient;

    /**
     * Charges constructor. Receive the RestClient manage the curl
     * @param $restClient
     *
     */
    public function __construct()// $isParam = true
    {
        $this->restClient = new RestClient();
    }

    /**
     * Charging an user using user's default card
     * @param $body Body charge params
     * @return Charge model
     */
    public function charge($body){
        $response = $this->_charge($this->restClient,$body);
        return new Charge($response);
    }

    /**
     * Used to manueally cancel any charge or pre authorization that wasn't already cancelled
     * @param $chargeId
     * @return Charge model
     */
    public function cancel($chargeId)
    {
        $response = $this->_cancelCapture($this->restClient,$chargeId,"cancel");
        return new Charge($response);
    }

    /**
     * Captures an existing pre authorization
     * @param $chargeId
     * @return Charge
     */
    public function capture($chargeId){
        $response = $this->_cancelCapture($this->restClient,$chargeId,"capture");
        return new Charge($response);
    }

    /**
     * List all with paginate and date filter
     * @param array $query_params for pagination
     * @return ChargeCatalog
     */
    public function findAll($query_params = []){
        $response =  $this->_findAll($this->restClient, $query_params);
        return new ChargeCatalog($response);
    }

    /**
     * Retrieves a charge
     * @param $charge_id
     * @return Charge
     */
    public function findById($charge_id){
        $response =  $this->_findById($this->restClient,$charge_id);
        return new Charge($response);
    }


}

?>
