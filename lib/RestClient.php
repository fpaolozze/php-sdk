<?php

namespace Paggi;

require 'vendor/autoload.php';

use \Curl\Curl;
use Paggi\model\Card;

trait findById
{
    protected function _findById($rest,$id)
    {
        $curl = $rest->getCurl();
        $class = new \ReflectionObject($this);

        $curl->get($rest->getEndpoint($class->getShortName()) . "/" . $id);
        return $this->manageResponse($curl);
    }

}

trait findAll
{
    public function _findAll($rest, $query_params)
    {
        $curl = $rest->getCurl();
        $class = new \ReflectionObject($this);
        $curl->get($rest->getEndpoint($class->getShortName()),$query_params);

        return $this->manageResponse($curl);
    }
}

trait insert
{
    protected function _create($rest,$params)
    {
        $curl = $rest->getCurl();
        $class = new \ReflectionObject($this);

        $curl->post($rest->getEndpoint($class->getShortName()), json_encode($params));

        return $this->manageResponse($curl);
    }
}

trait update
{
    public function _update($rest,$id, $params)
    {
        $curl = $rest->getCurl();
        $class = new \ReflectionObject($this);
        $curl->put($rest->getEndpoint($class->getShortName()) . "/" . $id, json_encode($params));

        return $this->manageResponse($curl);
    }

}


trait delete
{
    public function _delete($rest,$id)
    {
        $curl = $rest->getCurl();
        $class = new \ReflectionObject($this);

        $curl->delete($rest->getEndpoint($class->getShortName()) . "/" . $id);

        return $this->manageResponse($curl);
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
            return array("Error code" => $curl->errorCode, "Error message" => $curl->errorMessage);
        }else{
            return $rest->manageResponse($this,$curl);
        }
    }

    public function _cancel($rest,$chargeId){
        $curl = $rest->getCurl();
        $class = new \ReflectionObject($this);

        $curl->put($rest->getEndpoint($class->getShortName()."/".$chargeId."/cancel"));
        if($curl->error){
            return array("Error code" => $curl->errorCode, "Error message" => $curl->errorMessage);
        }else{
            return $rest->manageResponse($this,$curl);
        }
    }
}

trait Util
{/**/

    protected function manageResponse($responseCurl){
        if($responseCurl->error){
            throw new PaggiException(new PaggiResponse($this->_getError($responseCurl)));
        }else{
            switch ($responseCurl->httpStatusCode){
                case 200:
                    return new Card($responseCurl->response);
                default:
                    throw new PaggiException($this->__getError($responseCurl));
            }
        }
    }

    protected function _getError($responseCurl)
    {
        $message =  json_decode($responseCurl->rawResponse)->error;
        $errors = array("code"=>"$responseCurl->httpStatusCode", "message"=>$message);
        return new PaggiResponse($errors);
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

    /**
     * @return Curl
     */
    public function getCurl()
    {
        return $this->curl;
    }
}
?>
