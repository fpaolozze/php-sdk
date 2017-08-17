<?php

namespace Paggi;

class Cards
{
    use ModelBuild;

    public $year;
    public $name;
    public $month;
    public $metadata;
    public $last4;
    public $id;
    public $cvc_check;
    public $acquirer_code;
    public $acquirer_message;
    public $customer_id;
    public $country;
    public $card_alias;
    public $brand;
    public $bin;
    public $address;


    use findAll, findById, insert, delete {
    }

    public function __construct($parameters = [])
    {
        if(!empty($parameters)){
            $this->build($parameters);
        }
    }

    /*public function _set($properties){
        $classe = new \ReflectionObject($this);
        foreach($properties as $key => $value){
            if (array_key_exists($key, $classe->getDefaultProperties())) {
                $this->{$key} = $value;
            }
        }
    }*/

}
?>
