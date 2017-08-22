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
     * @return Charge
     */
    static public function findById($id){
        $response =  self::traitFindById($id);
        return new Charge($response);
    }



}

?>
