<?php

namespace Paggi\Traits;

use \Paggi\PaggiException;

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
            case 410:
                throw new PaggiException(self::_getError($responseCurl));
            default:
                throw new PaggiException(self::_getError($responseCurl));
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
        if (!is_null($originalError) && !empty($originalError)) {
            $paggiError = $originalError;
        } else {
            //Errors null
            $paggiError = array("error" => 'No Content', "code" => $code);
        }
        return $paggiError;
    }
}
