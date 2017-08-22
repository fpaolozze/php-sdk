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


    /**
     * Charging an user using user's default card
     * @param $body Body charge params
     * @return Charge model
     */
    static public function create($body){
        $response = self::_charge($body);
        return new Charge($response);
    }

    /**
     * Used to manueally cancel any charge or pre authorization that wasn't already cancelled
     * @param $chargeId
     * @return Charge model
     */
    static public function cancel()
    {
        $response = self::_cancelCapture("cancel");
        return new Charge($response);
    }

    /**
     * Captures an existing pre authorization
     * @param $chargeId
     * @return Charge
     */
    static public function capture(){
        $response = self::_cancelCapture("capture");
        return new Charge($response);
    }

    /**
     * List all with paginate and date filter
     * @param array $query_params for pagination
     * @return ChargeCatalog
     */
    static public function findAll($query_params = []){
        $response =  self::traitFindAll( $query_params);
        return new ChargeCatalog($response);
    }

    /**
     * Retrieves a charge
     * @param $charge_id
     * @return Charge
     */
    static public function traitFindById(){
        $response =  self::_findById();
        return new Charge($response);
    }


}

?>
