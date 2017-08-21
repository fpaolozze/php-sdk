<?php

namespace Paggi;

use Paggi\model\Customer;
use Paggi\model\CustomerCatalog;

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
     * @return
     */
    public function create($parameters)
    {
        $response = $this->_create($this->restClient, $parameters);
        return new Customer($response);
    }

    /**
     * List all customers
     * @param array $queryParams Use it for pagination
     */
    public function findAll($queryParams = [])
    {
        $response = $this->_findAll($this->restClient, $queryParams);
        return new CustomerCatalog($response);
    }

    /**
     * Get all customers
     * @param $customerId Customer id
     */
    public function findById($customerId)
    {
        $response = $this->_findById($this->restClient, $customerId);
        return new Customer($response);
    }

    /**
     * Update a customer
     * @param $customerId Customer id
     * @param array $parameters body params for update
     */
    public function update($customerId, $parameters = [])
    {
        $response = $this->_update($this->restClient, $customerId, $parameters);
        return new Customer($response);
    }
}

?>