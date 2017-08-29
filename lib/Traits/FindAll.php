<?php

namespace Paggi\Traits;

use \Paggi\RestClient;

/**
 * Trait findAll - Find all resources
 * @package Paggi
 */
trait FindAll
{
    /**
     * GET METHOD
     * @param $rest - The RestClient object
     * @param $query_params - QueryParams for filter and pagination
     * @return mixed - Exception or response
     */
    protected function traitFindAll($query_params)
    {
        $rest = new RestClient();
        $curl = $rest->getCurl();
        $class = new \ReflectionClass(self::class);

        $curl->get($rest->getEndpoint($class->getShortName()), $query_params);

        return self::manageResponse($curl);
    }
}
