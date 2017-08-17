<?php

namespace Paggi;

require 'vendor/autoload.php';


use JsonMapper;
use \Curl\Curl;
use Paggi\model\Customer;

trait findById
{
    use Util;

    private $rest;
    private $curl;
    private $class;

    public function __construct()
    {
        $this->rest = new RestClient();
        $this->curl = $this->rest->getCurl();
        $this->class = Util::getClass($this)->getShortName();
    }

    public function findById($id)
    {
        $this->curl->get($this->rest->getEndpoint($this->class) . "/" . $id);

        if ($this->curl->error) {
            Util::getError($this->curl);
        } else {
            switch ($this->curl->httpStatusCode) {
                case 200:
                    return Util::createObjectResponse($this, $this->curl->response);
                case 401:
                    return $this->curl->errorMessage;
                default:
                    $this->curl->httpStatusCode;
            }
        }
    }

}

trait findAll
{
    private $rest;
    private $curl;
    private $class;

    public function __construct()
    {
        $this->rest = new RestClient();
        $this->curl = $this->rest->getCurl();
        $this->class = Util::getClass($this)->getShortName();
    }

    public function findAll()
    {
        $this->curl->get($this->rest->getEndpoint($this->class));
        if ($this->curl->error) {
            Util::getError($this->curl);
        } else {
            return json_encode($this->curl->response);
        }
    }
}

trait insert
{

    private $rest;
    private $curl;
    private $class;

    public function __construct()
    {
        $this->rest = new RestClient();
        $this->curl = $this->rest->getCurl();
        $this->class = Util::getClass($this)->getShortName();
    }

    public function create($param)
    {
        $this->curl->post($this->rest->getEndpoint($this->class), json_encode($param));

        if ($this->curl->error) {
            Util::getError($this->curl);
        } else {
            return json_encode($this->curl->response, true);
        }
    }
}

trait update
{
    private $rest;
    private $curl;
    private $class;

    public function __construct()
    {
        $this->rest = new RestClient();
        $this->curl = $this->rest->getCurl();
        $this->class = Util::getClass($this)->getShortName();
    }

    public function update($id, $params)
    {
        $this->curl->put($this->rest->getEndpoint($this->class) . "/" . $id, json_encode($params));
        if ($this->curl->error) {
            Util::getError($this->curl);
        } else {
            return json_encode($this->curl->response);
        }
    }
}


trait delete
{
    private $rest;
    private $curl;
    private $class;

    public function __construct()
    {
        $this->rest = new RestClient();
        $this->curl = $this->rest->getCurl();
        $this->class = Util::getClass($this)->getShortName();
    }

    public function delete($id)
    {
        $this->curl->delete($this->rest->getEndpoint($this->class) . "/" . $id);
        if ($this->curl->error) {
            Util::getError($this->curl);
        } else {
            return json_encode($this->curl->response);
        }
    }
}

trait Util
{

    static public function getClass($class)
    {
        return new \ReflectionObject($class);
    }

    static public function getError($curl)
    {
        print_r('Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n");
    }

    public function createObject($class, $param)
    {
        $fields = self::getClass($class)->getDefaultProperties();
        foreach (json_decode($param) as $key => $value) {
            //echo "{$key} => {$value} ";
            if (array_key_exists($key, $fields)) {
                //print_r($param[$key]);pa
                $parametro = array("{$key}" => "{$value}");
            }
        }
        //print_r($parametro);
        //$ob = new \ReflectionClass($class);
        //$instance = $ob->newInstance($parametro);
        return new Customer($param);
    }

    public function createObjectResponse($class, $param)
    {
        $className = self::getClass($class)->getShortName();
        if(strcmp($className,"Customers")==0){
            $mapper = new JsonMapper();
            $contactObject = $mapper->map(
                $param,
                new Customers()
            );
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
