<?php

namespace Paggi;

class GeneralException extends Exception
{

    public function __construct($message)
    {
        parent::__construct(json_encode($message), 0,null);
    }
}
