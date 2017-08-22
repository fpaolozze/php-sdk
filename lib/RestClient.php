<?php

namespace Paggi;

//AutoLoad with the files to inclue
require 'vendor/autoload.php';

//Curl for manager the HTTP requests
use \Curl\Curl;

/**
 * Trait findById - Find a resource by ID
 * @package Paggi
 */
trait findById
{
    /**
     * @param $rest - The RestClient object
     * @param $id - Resouce ID
     * @return mixed - Exception or a Response
     */
    public function traitFindById()
    {
        $rest = new RestClient();
        $curl = $rest->getCurl();
        $class = new \ReflectionClass(self::class); //Clas information

        $idResource = get_object_vars($this)['id'];

        $curl->get($rest->getEndpoint($class->getShortName()) . "s/" . $idResource);

        return self::manageResponse($curl);
    }

}

/**
 * Trait findAll - Find all resources
 * @package Paggi
 */
trait findAll
{
    /**
     * GET METHOD
     * @param $rest - The RestClient object
     * @param $query_params - QueryParams for filter and pagination
     * @return mixed - Exception or response
     */
    protected function traitFindAll($query_params)
    {
        $rest = new RestClient();
        $curl = $rest->getCurl();
        $class = new \ReflectionClass(self::class);

        $curl->get($rest->getEndpoint($class->getShortName()), $query_params);

        return self::manageResponse($curl);
    }
}

/**
 * Trait insert - Insert/Create a new resource
 * @package Paggi
 */
trait insert
{
    /**
     * POST METHOD
     * @param $rest - The RestClient object
     * @param $params - Resource paramns
     * @return mixed - Exception or response
     */
    protected function _create($rest, $params)
    {
        $curl = $rest->getCurl();
        $class = new \ReflectionObject($this);

        $curl->post($rest->getEndpoint($class->getShortName()), json_encode($params));

        return $this->manageResponse($curl);
    }
}

/**
 * Trait update - Update a resource
 * @package Paggi
 */
trait update
{
    /**
     * PUT METHOD
     * @param $rest - The RestClient object
     * @param $id - ID resource
     * @param $params - Resource params
     * @return mixed - Exception or response
     */
    protected function traitUpdate($id, $params)
    {
        $rest = new RestClient();
        $curl = $rest->getCurl();
        $class = new \ReflectionClass(self::class);

        $idResource = get_object_vars($this)['id'];

        $curl->put($rest->getEndpoint($class->getShortName()) . "s/" . $idResource, json_encode($params));

        return self::manageResponse($curl);
    }

}

/**
 * Trait delete - Delete a resource
 * @package Paggi
 */
trait delete
{
    /**
     * DELETE METHOD
     * @param $rest - The RestClient object
     * @param $id - ID resource
     * @return mixed - Exception or Response
     */
    public function traitDelete()
    {
        $rest = new RestClient();
        $curl = $rest->getCurl();
        $class = new \ReflectionClass(self::class);

        $idResource = get_object_vars($this)['id'];

        $curl->delete($rest->getEndpoint($class->getShortName()) . "s/" . $idResource);

        return $this->manageResponse($curl);
    }
}

/**
 * Trait charge_ - This trait contains the all actions for the Charge
 * @package Paggi
 */
trait charge_
{
    /**
     * Create a charge
     * POST METHOD
     * @param $rest - The RestClient object
     * @param $params - Charge params
     * @return mixed - Exception or Charge response
     */
    protected function _charge($rest, $params)
    {
        $curl = $rest->getCurl();
        $class = new \ReflectionObject($this);

        $curl->post($rest->getEndpoint($class->getShortName()), json_encode($params));

        return $this->manageResponse($curl);
    }

    /**
     * Cancel/Capture
     * @param $rest - The RestClient object
     * @param $chargeId - Charge ID
     * @param $resource - CANCEL or CAPTURE
     * @return mixed - Exception or Response charge
     */
    protected function _cancelCapture($rest, $chargeId, $resource)
    {
        $curl = $rest->getCurl();
        $class = new \ReflectionObject($this);

        $curl->put($rest->getEndpoint($class->getShortName() . "/" . $chargeId . "/" . $resource));
        return $this->manageResponse($curl);
    }
}

/**
 * Trait Util - Funtions util for the requests
 * @package Paggi
 */
trait Util
{
    /**
     * This method manage the response and return a exception or resposne
     * @param $responseCurl - Curl response
     * @return string - Response json
     * @throws PaggiException Exception
     */
    protected function manageResponse($responseCurl)
    {
        //Switch the HTTPStatusCode
        switch ($responseCurl->httpStatusCode) {
            case 200:
                //STATUS APROVED OR OTHER OK
                return $responseCurl->response;
            case 402:
                //STATUS DECLINED
                return $responseCurl->response;
            case 401:
                throw new PaggiException("Not a valid API key");
            default:
                throw new PaggiException($this->_getError($responseCurl));
        }
    }

    /**
     * This method manage the Erros
     * @param $responseCurl
     * @return array Array error
     */
    protected function _getError($responseCurl)
    {
        //The original message error from API
        $originalError = json_decode($responseCurl->rawResponse, true);
        //HttpStatusCode
        $code = $responseCurl->httpStatusCode;
        //Some errors get null - Check it
        if (!is_null($originalError)) {
            if (array_key_exists('errors', $originalError)) { //Paggi erros json array
                //Add the statusCode into the paggi error
                array_push($originalError['errors'], array("code" => "$code"));
                $paggiError = $originalError;
            } else {//Paggi error object json
                $paggiError = array("error" => $originalError['error'], "code" => $code);
            }
        } else {
            //Errors null
            $paggiError = array("error" => 'No Content', "code" => $code);
        }
        return $paggiError;
    }
}

/**
 * Class RestClient - This class manager the requests
 * @package Paggi
 */
class RestClient
{
    private $curl;
    const BASE_STAGING = "https://staging-online.paggi.com/api/v4/"; //STAGING
    const BASE_PRODUCTION = "https://online.paggi.com/api/v4/"; //PRODUCTION
    private $endPoint;

    /**
     * RestClient constructor.
     */
    public function __construct()
    {
        //Get the Enviroment
        $this->endPoint = $this->getEnviroment(Paggi::isStaging());

        //Instance the curl
        $this->curl = new Curl();
        $this->curl->setBasicAuthentication(Paggi::getToken(), "");
        $this->curl->setDefaultJsonDecoder($assoc = true);
        $this->curl->setHeader('Content-Type', 'application/json; charset=utf-8');
        $this->curl->setDefaultTimeout();
    }

    /**
     * Return the Environment
     * @param $isStaging
     * @return string API Environment
     */
    private function getEnviroment($isStaging = false)
    {
        if ($isStaging == true) {
            return (self::BASE_STAGING);
        } else {
            return (self::BASE_PRODUCTION);
        }
    }

    /**
     * Get the Endpoint [banks - bank-accounts - customer - cards - charges]
     * @param $resource - The resource used [banks - bank-accounts - customer - cards - charges]
     * @return string [banks - bank-accounts - customer - cards - charges]
     */
    public function getEndpoint($resource)
    {
        return strtolower($this->endPoint . str_replace('\\', '/', $resource));
    }

    /**
     * Return the curl for manage the HTTP Requests
     * @return Curl
     */
    public function getCurl()
    {
        return $this->curl;
    }
}

?>
