<?php

namespace Paggi;

use Paggi\Entity;

use Paggi\Traits\Create;
use Paggi\Traits\FindAll;
use Paggi\Traits\FindById;
use Paggi\Traits\Update;

class BankAccount extends Entity
{
    use Create, FindAll, FindById, Update;
}

?>
