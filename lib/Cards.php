<?php

namespace Paggi;

use Paggi\model\Card;
use Paggi\model\CardCatalog;

class Cards
{
    private $restClient; //RestClient

    use Util; //The methods uses methods from Util

    /**
     * Insert a new card
     * Find a card by id
     * Find all cards
     * Delete a card
     */
    use insert, findById, findAll, delete;

    /**
     * Cards constructor. Instance the RestClient object. The curl/restclient must be initilized on the constructor;
     * @param $restClient Get from Paggi class
     */
    public function __construct()
    {
        $this->restClient = new RestClient();
    }

    /**
     * Create a new card. You can store multiple cards for each customer, in order to charge the customer later.
     * @param $params body params
     * @return Card A card object
     */
    public function createCard($params)
    {
        $response = $this->_create($this->restClient, $params);
        return new Card($response);
    }

    /** List all cards with pagination and creation date filter
     * @param array $query_params query pagination and filter
     * @return Card object
     */
    public function findAll($query_params = [])
    {
        $response = $this->_findAll($this->restClient, $query_params);
        return new CardCatalog($response);
    }

    /**
     * Delete a card
     * @param $card_id The card id to remove
     * @return Thee removed card object
     */
    public function delete($card_id)
    {
        $response = $this->_delete($this->restClient, $card_id);
        return new Card($response);
    }

    /** Retrieves a card
     * @param $card_id The card_id to find
     * @return Card object
     */
    public function findById($card_id)
    {
        $response = $this->_findById($this->restClient, $card_id);
        return new Card($response);
    }



}

?>
