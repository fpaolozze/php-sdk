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
    public function create($param)
    {
        $rest = new RestClient();
        $curl = $rest->getCurl();
        $class = new \ReflectionObject($this);

        $curl->post($rest->getEndpoint($class->getShortName()), json_encode($param));

        if ($curl->error) {
            return Util::getError($curl);
        } else {
            return Util::createObjectResponse($this, $curl->response);
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

trait Util
{/**/
    static public function getError($curl)
    {
        "Error: ' . $curl->errorCode . ': ' . $curl->errorMessage";
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
                $cards = new Cards();
                $cards->_set($response);
                return $cards;
            case "Bank_accounts":
                $bank_account = new Bank_accounts();
                $bank_account->_set($response);
                return $bank_account;
        }
    }

    static public function manageResponse($class, $curl)
    {
        switch ($curl->httpStatusCode) {
            case 200:
                return Util::createObjectResponse($class, $curl->response);
            case 401:
                return $curl->errorMessage;
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
