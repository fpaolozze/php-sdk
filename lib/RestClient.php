<?php

namespace Paggi;

require 'vendor/autoload.php';

use \Curl\Curl;

trait findById
{

    protected function _findById($rest,$id)
    {
        $curl = $rest->getCurl();
        $class = new \ReflectionObject($this);

        $curl->get($rest->getEndpoint($class->getShortName()) . "/" . $id);

        if ($curl->error) {
            return Util::getError($curl);
        } else {
            return Util::manageResponse($this, $curl);
        }
    }

}

trait findAll
{
    public function _findAll($rest, $query_params)
    {
        $curl = $rest->getCurl();
        $class = new \ReflectionObject($this);
        $curl->get($rest->getEndpoint($class->getShortName()),$query_params);
        if ($curl->error) {
            return Util::getError($curl);
        } else {
            return Util::manageResponse($this,$curl);
        }
    }
}

trait insert
{
    protected function _create($rest,$params)
    {
        $curl = $rest->getCurl();
        $class = new \ReflectionObject($this);

        $curl->post($rest->getEndpoint($class->getShortName()), json_encode($params));
        if ($curl->error) {
            return Util::getError($curl);
        } else {
            return Util::manageResponse($this, $curl);
        }
    }
}

trait update
{
    public function _update($rest,$id, $params)
    {
        $curl = $rest->getCurl();
        $class = new \ReflectionObject($this);
        $curl->put($rest->getEndpoint($class->getShortName()) . "/" . $id, json_encode($params));
        if ($curl->error) {
            return Util::getError($curl);
        } else {
            return Util::manageResponse($this, $curl);
        }
    }

}


trait delete
{
    public function _delete($rest,$id)
    {
        $curl = $rest->getCurl();
        $class = new \ReflectionObject($this);

        $curl->delete($rest->getEndpoint($class->getShortName()) . "/" . $id);
        if ($curl->error) {
            return Util::getError($curl);
        } else {
            return Util::manageResponse($this, $curl);
        }
    }
}

trait charge
{
    //Charge an user using user's default card
    public function _charge($rest,$params)
    {
        $curl = $rest->getCurl();
        $class = new \ReflectionObject($this);

        $curl->post($rest->getEndpoint($class->getShortName(), json_encode($params)));
        if($curl->error){
            return Util::getError($curl);
        }else{
            return Util::manageResponse($this,$curl);
        }
    }

    public function _cancel($rest,$chargeId){
        $curl = $rest->getCurl();
        $class = new \ReflectionObject($this);

        $curl->put($rest->getEndpoint($class->getShortName()."/".$chargeId."/cancel"));
        if($curl->error){
            return Util::getError($curl);
        }else{
            return Util::manageResponse($this,$curl);
        }
    }
}

trait Util
{/**/
    static public function getError($curl)
    {
        return array("Error code" => $curl->errorCode, "Error message" => $curl->errorMessage);
    }

    public function createObjectResponse($class, $response)
    {
        $className = new \ReflectionObject($class);
        switch ($className->getShortName()) {
            case "Customers":
                $customers = new Customers();
                $customers->_set($response);
                return $customers;
            case "Cards":
                //return new Cards($response);
                return $this->buildCards($response);
            case "Bank_accounts":
                return new Bank_accounts($response);
            case "Charges":
                return new Charges($response);
        }
    }

    protected function buildCards($parameters){
        $r = new \ReflectionClass("Cards");
        return $instance = $r->newInstanceArgs($parameters);
    }

    static public function manageResponse($class, $curl)
    {
        switch ($curl->httpStatusCode) {
            case 200:
                return $curl->response;
            case 401:
                return $curl->response;
            case 410:
                return "Cartao ja foi deletado anteriormente";
            default:
                return $curl->httpStatusCode;
        }
    }
}


class RestClient
{
    private $curl;
    private $baseStaging = "https://staging-online.paggi.com/api/v4/";
    private $baseProd = "https://online.paggi.com/api/v4/";
    private $endPoint;

    public function __construct()
    {
        $token = Paggi::getToken();
        $isStaging = Paggi::isStaging();
        $this->endPoint = $this->getEnviroment($isStaging);//get_class($this)

        $this->curl = new Curl();
        $this->curl->setBasicAuthentication($token, $token);
        $this->curl->setDefaultJsonDecoder($assoc = true);
        $this->curl->setHeader('Content-Type', 'application/json; charset=utf-8');
        //$this->curl->setDefaultTimeout();//TIMEOUT?

    }

    private function getEnviroment($isStaging)
    {
        if ($isStaging == true) {
            return strtolower($this->baseStaging);
        } else {
            return strtolower($this->baseProd);
        }
    }

    public function getEndpoint($resource)
    {
        return strtolower($this->endPoint . str_replace('\\', '/', $resource));
    }

    public function getCurl()
    {
        return $this->curl;
    }

}
?>
