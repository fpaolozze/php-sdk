<?php

namespace Paggi;

use Paggi\model\Card;
use Paggi\model\CardCatalog;

class Cards
{
    private $restClient; //RestClient

    use Util; //The methods uses methods from Util

    use insert, findAll;



    /**
     * Create a new card. You can store multiple cards for each customer, in order to charge the customer later.
     * @param $params body params
     * @return Cards A card object
     */
    static public function create($params)
    {
        $response = self::traitCreate($params);
        return new Card($response);
    }

    /** List all cards with pagination and creation date filter
     * @param array $query_params query pagination and filter
     * @return Cards object
     */
    static public function findAll($query_params = [])
    {
        $response = self::traitFindAll($query_params);
        return new CardCatalog($response);
    }

}

?>
