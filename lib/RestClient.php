<?php

namespace Paggi;

require 'vendor/autoload.php';

use \Curl\Curl;
use Paggi\model\Card;
use Paggi\model\Bank;
use Paggi\model\Customer;
use Paggi\model\Charge;
trait findById
{
    protected function _findById($rest,$id)
    {
        $curl = $rest->getCurl();
        $class = new \ReflectionObject($this);

        $curl->get($rest->getEndpoint($class->getShortName()) . "/" . $id);
        return $this->manageResponse($curl,$class);
    }

}

trait findAll
{
    protected function _findAll($rest, $query_params)
    {
        $curl = $rest->getCurl();
        $class = new \ReflectionObject($this);
        $curl->get($rest->getEndpoint($class->getShortName()),$query_params);

        return $this->manageResponse($curl,$class);
    }
}

trait insert
{
    protected function _create($rest,$params)
    {
        $curl = $rest->getCurl();
        $class = new \ReflectionObject($this);

        $curl->post($rest->getEndpoint($class->getShortName()), json_encode($params));

        return $this->manageResponse($curl,$class);
    }
}

trait update
{
    protected function _update($rest,$id, $params)
    {
        $curl = $rest->getCurl();
        $class = new \ReflectionObject($this);
        $curl->put($rest->getEndpoint($class->getShortName()) . "/" . $id, json_encode($params));

        return $this->manageResponse($curl,$class);
    }

}


trait delete
{
    protected function _delete($rest,$id)
    {
        $curl = $rest->getCurl();
        $class = new \ReflectionObject($this);

        $curl->delete($rest->getEndpoint($class->getShortName()) . "/" . $id);

        return $this->manageResponse($curl,$class);
    }
}

trait charge_
{
    //Charge an user using user's default card
    protected function _charge($rest,$params)
    {
        $curl = $rest->getCurl();
        $class = new \ReflectionObject($this);

        $curl->post($rest->getEndpoint($class->getShortName()), json_encode($params));

        return $this->manageResponse($curl,$class);
    }

    protected function _cancelCapture($rest,$chargeId,$resource){
        $curl = $rest->getCurl();
        $class = new \ReflectionObject($this);

        $curl->put($rest->getEndpoint($class->getShortName()."/".$chargeId."/".$resource));
        return $this->manageResponse($curl,$class);
    }
}

trait Util
{/**/

    protected function manageResponse($responseCurl,$class = null){
            switch ($responseCurl->httpStatusCode){
                case 200:
                    return $this->getResourceObject($class, $responseCurl);
                case 402:
                    return $this->getResourceObject($class, $responseCurl);
                default:
                    throw new PaggiException($this->_getError2($responseCurl));
            }
    }

    protected function _getError2($responseCurl)
    {
        $message =  json_decode($responseCurl->rawResponse,true);
        $code = array("code"=>$responseCurl->httpStatusCode);
        array_push($message['errors'],$code);
        return new PaggiResponse($message);
    }

    protected function getResourceObject($class, $responseCurl){
        switch ($class->getShortName()){
            case "Cards":
                return new Card($responseCurl->response);
            case "Banks":
                return new Bank($responseCurl->response);
            case "Customers":
                return new Customer($responseCurl->response);
            case "Charges":
                return new Charge($responseCurl->response);
            default:
                return "ERRO AO CRIAR OBJETO";
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
        $this->curl->setBasicAuthentication($token, "");
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

    /**
     * @return Curl
     */
    public function getCurl()
    {
        return $this->curl;
    }
}
?>
