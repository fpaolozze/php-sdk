<?php

namespace Paggi\Traits;

use \Paggi\RestClient;

/**
 * Trait Delete - Delete a resource
 * @package Paggi
 */
trait Delete
{
    /**
     * DELETE METHOD
     * @param $rest - The RestClient object
     * @param $id - ID resource
     * @return mixed - Exception or Response
     */
    public function traitDelete()
    {
        $rest = new RestClient();
        $curl = $rest->getCurl();
        $class = new \ReflectionClass(self::class);

        $idResource = get_object_vars($this)['id'];

        $curl->delete($rest->getEndpoint($class->getShortName()) . "s/" . $idResource);

        return self::manageResponse($curl);
    }
}