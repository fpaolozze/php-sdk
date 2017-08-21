<?php

namespace Paggi;

include 'lib/RestClient.php';

/**
 * Class Paggi manage all resoucers and API values
 * @package Paggi
 */
class Paggi
{
    static private $isStaging; //Enviroment staging
    static private $token; //Token value

    private $restClient;

    private $cards;
    private $banks;
    private $customers;
    private $charges;
    protected $bank_accounts;

    /**
     * Paggi constructor.
     * @param $token The user Paggi TOKEN
     * @param bool $staging If the environment is staging
     * @throws PaggiException
     */
    public function __construct($token, $staging = false)
    {
        if(is_null($token) || strcmp($token,"")==0){
            throw new PaggiException(array("type"=>"Unauthorized","message"=>"The parameter 'token' cannot be a null or empty string"));
        }
        self::$isStaging = $staging;
        self::$token = $token;
        $this->restClient = new RestClient();

    }

    /**
     * Get a token value
     * @return Token value
     */
    static public function getToken()
    {
        return self::$token;
    }

    /**
     * Get if the environment is staging
     * @return bool
     */
    static public function isStaging()
    {
        return self::$isStaging;
    }

    /**
     * This method return a new instance of the Paggi for the a new call
     * @return Paggi
     */
    public function newCall(){
        if($this instanceof $this){
            return new Paggi(self::$token,true);
        }
    }

    /**
     * Return a Cards manager
     * @return Cards manager
     */
    public function cards(){
        if(!$this->cards instanceof Cards){
            return $this->cards = new Cards($this->restClient);
        }
    }

    /**
     * Return a Banks manager
     * @return Banks
     */
    public function banks(){
        if(!$this->banks instanceof Banks){
            return $this->banks = new Banks($this->restClient);
        }
    }

    /**
     * Return Bank accounts
     * @return Bank_accounts
     */
    public function bank_accounts(){
        if(!$this->bank_accounts instanceof Bank_accounts){
            return $this->bank_accounts = new Bank_accounts($this->restClient);
        }
    }

    /**
     * Return a Customer manager
     * @return Customers
     */
    public function customers(){
        if(!$this->customers instanceof  Customers){
            return $this->customers = new Customers($this->restClient);
        }
    }

    /**
     * @return Charges
     */
    public function charges(){
        if(!$this->charges instanceof Charges){
            return $this->charges = new Charges($this->restClient);
        }
    }

}

?>
