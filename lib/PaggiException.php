<?php
namespace Paggi;

class PaggiException extends GeneralException
{
    private $message;
    private $code;
    private $curl;

    public function __construct($message,$code)
    {
        //parent::__construct($curl->errorMessage,$curl->errorCode);
        parent::__construct($message, $code);
    }

}
