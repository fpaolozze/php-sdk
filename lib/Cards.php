<?php

namespace Paggi;

class Cards
{

    use find, findById, insert, delete {
        find::__construct as private __findConstruct;
        findById::__construct as private __findByIdConstruct;
        insert::__construct as private __insertConstruct;
        delete::__construct as private __deleteConstruct;
    }

    public function __construct()
    {
        $this->__findConstruct();
        $this->__findByIdConstruct();
        $this->__insertConstruct();
        $this->__deleteConstruct();
    }

}


class Card implements \JsonSerializable
{
    private $year;
    private $name;
    private $number;
    private $month;
    private $metadata;
    private $last4;
    private $id;
    private $customer_id;
    private $card_alias;
    private $brand;
    private $cvc_check;
    private $cvc;
    private $acquirer_code;
    private $bin;
    private $address;
    private $validate;

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    /**
     * @return mixed
     */
    public function isValidate()
    {
        return $this->validate;
    }

    /**
     * @param mixed $validate
     */
    public function setValidate($validate)
    {
        $this->validate = $validate;
    }


    /**
     * @return mixed
     */
    public function getCvc()
    {
        return $this->cvc;
    }

    /**
     * @param mixed $cvc
     */
    public function setCvc($cvc)
    {
        $this->cvc = $cvc;
    }

    /**
     * @return mixed
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param mixed $number
     */
    public function setNumber($number)
    {
        $this->number = $number;
    }


    /**
     * @return mixed
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * @param mixed $year
     */
    public function setYear($year)
    {
        $this->year = $year;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getMonth()
    {
        return $this->month;
    }

    /**
     * @param mixed $month
     */
    public function setMonth($month)
    {
        $this->month = $month;
    }

    /**
     * @return mixed
     */
    public function getMetadata()
    {
        return $this->metadata;
    }

    /**
     * @param mixed $metadata
     */
    public function setMetadata($metadata)
    {
        $this->metadata = $metadata;
    }

    /**
     * @return mixed
     */
    public function getLast4()
    {
        return $this->last4;
    }

    /**
     * @param mixed $last4
     */
    public function setLast4($last4)
    {
        $this->last4 = $last4;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getCustomerId()
    {
        return $this->customer_id;
    }

    /**
     * @param mixed $customer_id
     */
    public function setCustomerId($customer_id)
    {
        $this->customer_id = $customer_id;
    }

    /**
     * @return mixed
     */
    public function getCardAlias()
    {
        return $this->card_alias;
    }

    /**
     * @param mixed $card_alias
     */
    public function setCardAlias($card_alias)
    {
        $this->card_alias = $card_alias;
    }

    /**
     * @return mixed
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * @param mixed $brand
     */
    public function setBrand($brand)
    {
        $this->brand = $brand;
    }

    /**
     * @return mixed
     */
    public function getCvcCheck()
    {
        return $this->cvc_check;
    }

    /**
     * @param mixed $cvc_check
     */
    public function setCvcCheck($cvc_check)
    {
        $this->cvc_check = $cvc_check;
    }

    /**
     * @return mixed
     */
    public function getAcquirerCode()
    {
        return $this->acquirer_code;
    }

    /**
     * @param mixed $acquirer_code
     */
    public function setAcquirerCode($acquirer_code)
    {
        $this->acquirer_code = $acquirer_code;
    }

    /**
     * @return mixed
     */
    public function getBin()
    {
        return $this->bin;
    }

    /**
     * @param mixed $bin
     */
    public function setBin($bin)
    {
        $this->bin = $bin;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }


}

?>
