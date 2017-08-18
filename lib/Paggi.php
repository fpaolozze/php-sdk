<?php

namespace Paggi;

include 'lib/RestClient.php';

/**
 *
 */
class Paggi
{
    static private $isStaging;
    static private $token;

    private $restClient;

    private $cards;
    protected $bank_accounts;


    public function __construct($token, $staging = false)
    {
        self::$isStaging = $staging;
        self::$token = $token;
        $this->restClient = new RestClient();

    }

    static public function getToken()
    {
        return self::$token;
    }

    static public function isStaging()
    {
        return self::$isStaging;
    }

    public function cards(){
        if(!$this->cards instanceof Cards){
            return $this->cards = new Cards($this->restClient);
        }
    }

    public function bank_accounts(){
        if(!$this->bank_accounts instanceof Bank_accounts){
            return $this->bank_accounts = new Bank_accounts($this->restClient);
        }
    }



}


?>
