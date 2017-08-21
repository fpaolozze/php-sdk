<?php

namespace Paggi;

require 'vendor/autoload.php';

use \Curl\Curl;

trait findById
{
    protected function _findById($rest, $id)
    {
        $curl = $rest->getCurl();
        $class = new \ReflectionObject($this);

        $curl->get($rest->getEndpoint($class->getShortName()) . "/" . $id);
        return $this->manageResponse($curl, $class);
    }

}

trait findAll
{
    protected function _findAll($rest, $query_params)
    {
        $curl = $rest->getCurl();
        $class = new \ReflectionObject($this);

        $curl->get($rest->getEndpoint($class->getShortName()), $query_params);

        return $this->manageResponse($curl, $class);
    }
}

trait insert
{
    protected function _create($rest, $params)
    {
        $curl = $rest->getCurl();
        $class = new \ReflectionObject($this);

        $curl->post($rest->getEndpoint($class->getShortName()), json_encode($params));

        return $this->manageResponse($curl, $class);
    }
}

trait update
{
    protected function _update($rest, $id, $params)
    {
        $curl = $rest->getCurl();
        $class = new \ReflectionObject($this);
        $curl->put($rest->getEndpoint($class->getShortName()) . "/" . $id, json_encode($params));

        return $this->manageResponse($curl, $class);
    }

}


trait delete
{
    protected function _delete($rest, $id)
    {
        $curl = $rest->getCurl();
        $class = new \ReflectionObject($this);

        $curl->delete($rest->getEndpoint($class->getShortName()) . "/" . $id);

        return $this->manageResponse($curl, $class);
    }
}

trait charge_
{
    //Charge an user using user's default card
    protected function _charge($rest, $params)
    {
        $curl = $rest->getCurl();
        $class = new \ReflectionObject($this);

        $curl->post($rest->getEndpoint($class->getShortName()), json_encode($params));

        return $this->manageResponse($curl, $class);
    }

    protected function _cancelCapture($rest, $chargeId, $resource)
    {
        $curl = $rest->getCurl();
        $class = new \ReflectionObject($this);

        $curl->put($rest->getEndpoint($class->getShortName() . "/" . $chargeId . "/" . $resource));
        return $this->manageResponse($curl, $class);
    }
}

trait Util
{/**/

    protected function manageResponse($responseCurl, $class = null)
    {
        switch ($responseCurl->httpStatusCode) {
            case 200:
                return $responseCurl->response;
            case 402:
                return $responseCurl->response;
            default:
                throw new PaggiException($this->_getError2($responseCurl));
        }
    }

    protected function _getError2($responseCurl)
    {
        $originalError = json_decode($responseCurl->rawResponse, true);
        $code = $responseCurl->httpStatusCode;
        if (!is_null($originalError)) {
            if (array_key_exists('errors', $originalError)) {
                array_push($originalError['errors'], array("code" => "$code"));
                $paggiError = $originalError;
            } else {
                $paggiError = array("error" => $originalError['error'], "code" => $code);
            }
        } else {
            $paggiError = array("error" => 'No Content', "code" => $code);
        }
        return $paggiError;
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
