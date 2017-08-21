<?php

namespace Paggi;

use Paggi\model\Customer;
use Paggi\model\CustomerCatalog;

class Customers
{
    use Util; //The methods uses methods from Util

    use findAll, findById, insert, update; //Actions

    private $restClient;

    /**
     * Customers constructor. Restclient manage the curl
     * @param $restClient
     */
    public function __construct()
    {
        $this->restClient = new RestClient();
    }

    /**
     * Store new clients with or without card and address data
     * @param $parameters Customer parameters
     * @return Customer model
     */
    public function create($parameters)
    {
        $response = $this->_create($this->restClient, $parameters);
        return new Customer($response);
    }

    /**
     * List all customers
     * @param array $queryParams QUery to filter pagination
     * @return CustomerCatalog model
     */
    public function findAll($queryParams = [])
    {
        $response = $this->_findAll($this->restClient, $queryParams);
        return new CustomerCatalog($response);
    }

    /**
     * Retrieves a customer by Customer id
     * @param $customerId
     * @return Customer model
     */
    public function findById($customerId)
    {
        $response = $this->_findById($this->restClient, $customerId);
        return new Customer($response);
    }

    /**
     * Update a customer
     * @param $customerId Customer id
     * @param array $parameters Customer parameters
     * @return Customer model
     */
    public function update($customerId, $parameters = [])
    {
        $response = $this->_update($this->restClient, $customerId, $parameters);
        return new Customer($response);
    }
}

?>