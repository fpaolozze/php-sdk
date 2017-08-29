<?php

namespace Paggi;

use Paggi\Entity;

use Paggi\Traits\Util;
use Paggi\Traits\Create;
use Paggi\Traits\FindAll;
use Paggi\Traits\FindById;

class BankAccount extends Entity
{
    use Util, FindAll, FindById, Update;
}

?>
