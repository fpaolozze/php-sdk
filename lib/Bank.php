<?php

namespace Paggi;

use Paggi\Entity;

use Paggi\Traits\Util;
use Paggi\Traits\Create;
use Paggi\Traits\FindAll;
use Paggi\Traits\FindById;

class Bank extends Entity
{
    use Util, FindAll;
}
?>
