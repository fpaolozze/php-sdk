<?php

namespace Paggi;

class Customers
{
    use Util;

    use findAll, findById, insert, update {
    }

    private $restClient;

    public function __construct($restClient)
    {
        $this->restClient = $restClient;
    }

    /**
     * Store new clients with or without card ad address data
     * @param $parameters Customer data
     */
    public function create($parameters){

    }

    /**
     * List all customers
     * @param array $queryParams Use it for pagination
     */
    public function findAll($queryParams = []){

    }

    /**
     * Get all customers
     * @param $customerId Customer id
     */
    public function findById($customerId){

    }

    /**
     * Update a customer
     * @param $customerId Customer id
     * @param array $parameters body params for update
     */
    public function update($customerId, $parameters = []){

    }
}

?>