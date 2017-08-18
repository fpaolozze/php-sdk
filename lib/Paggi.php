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
    private $banks;
    private $customers;
    private $charges;
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

    /** Use it for a new call
     * @return Paggi
     */
    public function newCall(){
        if($this instanceof $this){
            return new Paggi("B31DCE74-E768-43ED-86DA-85501612548F",true);
        }
    }

    /**
     * Instance a card if necessary and return it
     * @return Card object
     */
    public function cards(){
        if(!$this->cards instanceof Cards){
            return $this->cards = new Cards($this->restClient);
        }
    }

    public function banks(){
        if(!$this->banks instanceof Banks){
            return $this->banks = new Banks($this->restClient);
        }
    }

    public function bank_accounts(){
        if(!$this->bank_accounts instanceof Bank_accounts){
            return $this->bank_accounts = new Bank_accounts($this->restClient);
        }
    }

    public function customers(){
        if(!$this->customers instanceof  Customers){
            return $this->customers = new Customers($this->restClient);
        }
    }



}


?>
