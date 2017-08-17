<?php

namespace Paggi;

require 'vendor/autoload.php';


use JsonMapper;
use \Curl\Curl;
use Paggi\model\Customer;

trait findById
{

    public function findById($id)
    {

        $rest = new RestClient();
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
    public function findAll()
    {
        $rest = new RestClient();
        $curl = $rest->getCurl();
        $class = new \ReflectionObject($this);
        $curl->get($rest->getEndpoint($class->getShortName()));
        if ($curl->error) {
            return Util::getError($curl);
        } else {
            return Util::createObjectResponse($this, $curl->response);
        }
    }
}

trait insert
{
    public function create($params)
    {
        $rest = new RestClient();
        $curl = $rest->getCurl();
        $class = new \ReflectionObject($this);

        $class_var = get_class_vars(get_class($this));

        /*foreach ($class_var as $name => $value) {
            echo "$name : $value\n";
        }*/

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
    public function update($id, $params)
    {
        $rest = new RestClient();
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
    public function delete($id)
    {
        $rest = new RestClient();
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

    private $endPoint;
    private $curl;

    public function __construct()
    {
        $rest = new RestClient();
        $this->curl = $rest->getCurl();
        $class = new \ReflectionObject($this);
        $this->endPoint = $rest->getEndpoint($class->getShortName());
    }

    //Charge an user using user's default card
    public function charge()
    {
        $class_var = get_class_vars(get_class($this));
        $this->curl->post($this->endPoint, json_encode($class_var));
        if($this->curl->error){
            return Util::getError($this->curl);
        }else{
            return Util::manageResponse($this,$this->curl);
        }
    }

    public function cancel($chargeId){
        $this->curl->put($this->endPoint."/".$chargeId."/cancel");
        if($this->curl->error){
            return Util::getError($this->curl);
        }else{
            return Util::manageResponse($this,$this->curl);
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
                return Util::createObjectResponse($class, $curl->response);
            case 401:
                return $curl->httpStatusCode;
            default:
                new \Exception("ddddd");
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
