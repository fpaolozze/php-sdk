<?php

namespace Paggi\Traits;

use \Paggi\RestClient;

/**
 * Trait Cancel
 * Use it to manually cancel any charge or pre authorization that wasn't already cancelled.
 * A charge can be cancelled up to 180 days after its confirmation.
 * @package Paggi\Traits
 */
trait Cancel
{
  static function cancel($id)
  {
    $rest = new RestClient();
    $curl = $rest->getCurl();
    $class = new \ReflectionClass(self::class);

    $curl->put($rest->getEndpoint($class->getShortName()) .'/'. $id);

    return self::manageResponse($curl);
  }
}

?>
