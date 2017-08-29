<?php

namespace Paggi\Traits;

use \Paggi\RestClient;

/**
 * Trait update - Update a resource
 * @package Paggi
 */
trait Update
{
    /**
     * PUT METHOD
     * @param $rest - The RestClient object
     * @param $id - ID resource
     * @param $params - Resource params
     * @return mixed - Exception or response
     */
    protected function traitUpdate($params)
    {
        $rest = new RestClient();
        $curl = $rest->getCurl();
        $class = new \ReflectionClass(self::class);

        $idResource = get_object_vars($this)['id'];

        $curl->put($rest->getEndpoint($class->getShortName()) . "s/" . $idResource, json_encode($params));

        return self::manageResponse($curl);
    }

}
