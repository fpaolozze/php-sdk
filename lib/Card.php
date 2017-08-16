<?php

namespace Paggi;

class Card implements \JsonSerializable
{
    private $customer_id;
    private $name;
    private $number;
    private $month;
    private $year;
    private $cvc;
    private $card_alias;
    private $default;
    private $validate;
    private $statement_descriptor;
    private $metadata;
    private $address;

    //only getters
    private $last4;
    private $id;
    private $brand;
    private $cvc_check;
    private $acquirer_code;
    private $bin;

    public function jsonSerialize()
    {
        return get_object_vars($this);
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
    public function getDefault()
    {
        return $this->default;
    }

    /**
     * @param mixed $default
     */
    public function setDefault($default)
    {
        $this->default = $default;
    }

    /**
     * @return mixed
     */
    public function getValidate()
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
    public function getStatementDescriptor()
    {
        return $this->statement_descriptor;
    }

    /**
     * @param mixed $statement_descriptor
     */
    public function setStatementDescriptor($statement_descriptor)
    {
        $this->statement_descriptor = $statement_descriptor;
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

    /**
     * @return mixed
     */
    public function getLast4()
    {
        return $this->last4;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * @return mixed
     */
    public function getCvcCheck()
    {
        return $this->cvc_check;
    }

    /**
     * @return mixed
     */
    public function getAcquirerCode()
    {
        return $this->acquirer_code;
    }

    /**
     * @return mixed
     */
    public function getBin()
    {
        return $this->bin;
    }



}

?>