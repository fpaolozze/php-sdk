<?php

namespace Paggi;

class Charges
{

  use findAll {
    findAll::__construct as private __findConstruct;
  }
  use insert{
   insert::create as private __insertConstruct;
  }
  use update;

    public function __construct()
    {
      $this->__findConstruct();
    }

}



?>
