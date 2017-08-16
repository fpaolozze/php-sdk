<?php

namespace Paggi;

require 'vendor/autoload.php';

use \Curl\Curl;
use \Paggi\Paggi;
use \Paggi\PaggiException;

trait findById
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

    public function findById($id)
    {
        $this->curl->get($this->rest->getEndpoint($this->class) . "/" . $id);

        if ($this->curl->error) {
            print_r('Error: ' . $this->curl->errorCode . ': ' . $this->curl->errorMessage . "\n");
        } else {
            return json_encode($this->curl->response);
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
            print_r('Error: ' . $this->curl->errorCode . ': ' . $this->curl->errorMessage . "\n");
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
            print_r('Error: ' . $this->curl->errorCode . ': ' . $this->curl->errorMessage . "\n");
        } else {
            return json_encode($this->curl->response,true);
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
        $this->curl->put($this->rest->getEndpoint($this->class) . "/" . $id, $params);
        if($this->curl->error){
            print_r('Error: ' . $this->curl->errorCode . ': ' . $this->curl->errorMessage . "\n");
        }else{
            return $this->curl->response;
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
        $this->curl->delete($this->rest->getEndpoint($this->class)."/".$id);
        if($this->curl->error){
            Util::getError($this->curl);
        }else{
            return json_encode($this->curl->response);
        }
    }
}

class Util{

    static public function getClass($class){
        return new \ReflectionObject($class);
    }

    static public function getError($curl){
        print_r('Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n");
    }
}


class RestClient
{
    private $curl;
    private $baseStaging = "https://staging-online.paggi.com/api/v4/";
    private $baseProd = "https://online.paggi.com/api/v4/";
    private $endPoint;

    private static $instance;

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

    /*static public function getInstance()
    {
        if (!(self::$instance instanceof self)) {
            self::$instance = new self;
        }
        return $instance;
    }*/

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
