<?php

namespace Paggi;

include 'lib/RestClient.php';

/**
 *
 */
class Paggi
{
  static $isStaging;
  static $token;

  static public function init($_token,$_isStaging)
  {
    self::$token = $_token;
    self::$isStaging = $_isStaging;
  }

  static public function getToken(){
    return self::$token;
  }

  static public function isStaging(){
    return self::$isStaging;
  }


}



?>
