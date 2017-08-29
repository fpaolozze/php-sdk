<?php

namespace Paggi;

/**
 * Trait Create - Create a new resource
 * @package Paggi
 * */

abstract class Entity {

  /**
   * @param $params Array Entity properties
   * */
  public function __construct(array $params) {
    foreach($params as $property => $value) {
      $this->{$property} = $value;
    }
  }
}
