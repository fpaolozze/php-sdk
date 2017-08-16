<?php

namespace Paggi\model;

class Account implements \JsonSerializable
{

    private $bank_id;
    private $customer_id;
    private $number;
    private $digit;
    private $branch;
    private $branch_digit;


    public function jsonSerialize()
    {
        get_object_vars($this);
    }

    /**
     * @return mixed
     */
    public function getBankId()
    {
        return $this->bank_id;
    }

    /**
     * @param mixed $bank_id
     */
    public function setBankId($bank_id)
    {
        $this->bank_id = $bank_id;
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
    public function getDigit()
    {
        return $this->digit;
    }

    /**
     * @param mixed $digit
     */
    public function setDigit($digit)
    {
        $this->digit = $digit;
    }

    /**
     * @return mixed
     */
    public function getBranch()
    {
        return $this->branch;
    }

    /**
     * @param mixed $branch
     */
    public function setBranch($branch)
    {
        $this->branch = $branch;
    }

    /**
     * @return mixed
     */
    public function getBranchDigit()
    {
        return $this->branch_digit;
    }

    /**
     * @param mixed $branch_digit
     */
    public function setBranchDigit($branch_digit)
    {
        $this->branch_digit = $branch_digit;
    }

}


?>