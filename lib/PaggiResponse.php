<?php

namespace Paggi;

class PaggiResponse{

    use \Paggi\ModelBuild;

    public $code;
    public $message;
    public $type;

    public function __construct($errors)
    {
        $this->buildObject($errors);
    }

}
?>