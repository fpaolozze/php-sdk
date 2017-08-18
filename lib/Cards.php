<?php

namespace Paggi;

use Paggi\model\Card;
use Paggi\PaggiResponse;
use Paggi\PaggiException;

class Cards
{
    private $restClient;

    use Util;
    use insert, findById,findAll, delete{
    }

    /**
     * Cards constructor. Instance the RestClient object. The curl/restclient must be initilized on the constructor;
     * @param $restClient Get from Paggi class
     */
    public function __construct($restClient)
    {
        $this->restClient = $restClient;
    }

    /**
     * Create a new card. You can store multiple cards for each customer, in order to charge the customer later.
     * @param $params body params
     * @return Card A card object
     */
    public function createCard($params)
    {
        return $this->_create($this->restClient,$params);
    }

    /** List all cards with pagination and creation date filter
     * @param array $query_params query pagination and filter
     * @return Card object
     */
    public function findAll($query_params = []){
        return $this->_findAll($this->restClient, $query_params);
    }

    /**
     * Delete a card
     * @param $card_id The card id to remove
     * @return Thee removed card object
     */
    public function delete($card_id){
        return $this->_delete($this->restClient,$card_id);
    }

    /** Retrieves a card
     * @param $card_id The card_id to find
     * @return Card object
     */
    public function findById($card_id){
        return $this->_findById($this->restClient,$card_id);
    }

}
?>
