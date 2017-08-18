<?php
namespace Paggi;

class PaggiException extends \Exception
{
    public function __construct($message)
    {
        parent::__construct(json_encode($message),0);
    }

}
