<?php

namespace Paggi;

use Paggi\model\Customer;
use Paggi\model\CustomerCatalog;

class Customers
{
    use Util; //The methods uses methods from Util

    use findAll, insert; //Actions


    /**
     * Store new clients with or without card and address data
     * @param $parameters Customer parameters
     * @return Customer model
     */
    static public function create($parameters)
    {
        $response = self::traitCreate($parameters);
        return new Customer($response);
    }

    /**
     * List all customers
     * @param array $queryParams QUery to filter pagination
     * @return CustomerCatalog model
     */
    static public function findAll($queryParams = [])
    {
        $response = self::traitFindAll($queryParams);
        return new CustomerCatalog($response);
    }


}

?>