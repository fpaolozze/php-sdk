<?php

namespace Paggi;

class PaggiResponse{

    use \Paggi\ModelBuild;

    public $errors;
    public function __construct($resul)
    {
        $this->buildObject($resul);
    }

}


class Errors{

    public $code;
    public $message;
    public $type;

}
?>