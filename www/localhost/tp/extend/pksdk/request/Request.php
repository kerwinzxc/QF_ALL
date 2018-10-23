<?php
/**
 * Request.php UTF-8
 */

namespace pksdk\request;

use think\Log;

define("PK_CURL_AUTHORIZATION_PREFIX", "Authorization: ");
define("PK_CURL_CONTENT_TYPE_JSON", "CONTENT_TYPE_JSON");
define("PK_CURL_CONTENT_TYPE_FORM", "CONTENT_TYPE_FORM");
define("PK_CURL_HTTP_TYPE_GET", "HTTP_TYPE_GET");
define("PK_CURL_HTTP_TYPE_POST", "HTTP_TYPE_POST");



class Request
{
    /**
     * error handler
     *
     * @param $msg string message to be output
     * @param $level string level defined to 'error'
     *
     * @internal param $msg
     */
    private function _error($msg, $level = 'error')
    {
        $_info = 'request\Request Error:' . $msg;
        Log::record($_info, $level);
    }

    /**
     * CP callback function POST http request
     *
     * @param $url    string url and ports
     * @param $params string post body
     *
     * @return results json Object
     */
    public static function postWithoutPkTokenJsonResponse($url, $params)
    {
        $params = http_build_query($params);
        $jsonStr = self::curlHttpWithAuthorization($url, PK_CURL_HTTP_TYPE_POST, $params, PK_CURL_CONTENT_TYPE_FORM, PK_CURL_AUTHORIZATION_PREFIX . 'Basic d2ViY2xpZW50Og==');
        return json_decode($jsonStr, true);
    }


    /**
     * CP callback function POST http request
     *
     * @param $url    string url and ports
     * @param $params string post body
     * @param $token  string user token get from powerKingdom.
     *
     * @return results json Object
     */
    public static function postWithPkTokenJsonResponse($url, $params, $token)
    {
        $params = json_encode($params);
        $jsonStr = self::curlHttpWithAuthorization($url, PK_CURL_HTTP_TYPE_POST, $params, PK_CURL_CONTENT_TYPE_JSON, PK_CURL_AUTHORIZATION_PREFIX . 'Bearer ' . $token);
        return json_decode($jsonStr, true);
    }

    /**
     * CP callback function GET http request
     *
     * @param $url    string url and ports
     * @param $token  string user token get from powerKingdom.
     *
     * @return results json Object
     */
    public static function getWithPkTokenJsonResponse($url, $token)
    {
        $jsonStr = self::curlHttpWithAuthorization($url, PK_CURL_HTTP_TYPE_GET, NULL, PK_CURL_CONTENT_TYPE_JSON, PK_CURL_AUTHORIZATION_PREFIX . 'Bearer ' . $token);
        return json_decode($jsonStr, true);
    }


    private static function curlHttpWithAuthorization($url, $httpType, $params, $contentType, $authorization)
    {
        $ch = curl_init();
        if (strcmp(PK_CURL_HTTP_TYPE_POST, $httpType) == 0) {
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        }
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 3);//set timeout
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);//request the results to be string
        //https request
        if (strlen($url) > 5 && strtolower(substr($url, 0, 5)) == "https") {
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        }
        $headers = array();
        if (strcmp(PK_CURL_CONTENT_TYPE_FORM, $contentType) == 0) {
            array_push($headers, 'Content-Type: application/x-www-form-urlencoded; charset=utf-8');
        } else if (strcmp(PK_CURL_CONTENT_TYPE_JSON, $contentType) == 0) {
            array_push($headers, 'Content-Type: application/json; charset=utf-8');
            if (!is_null($params)) {
                array_push($headers, 'Content-Length: ' . strlen($params));
            }
        }
        if (is_string($authorization)) {
            array_push($headers, "{$authorization}");
        }
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $return_content = curl_exec($ch);
        return $return_content;
    }
}