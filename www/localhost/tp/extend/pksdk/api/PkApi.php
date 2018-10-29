<?php
/**
 * Request.php UTF-8
 */

namespace pksdk\api;

use think\Log;

define("PK_API_ROOT", "https://playground.dobby.sandbx.co/");

class PkApi {

    public static function getToken($username, $password) {
        $apiUri = PK_API_ROOT . "security/oauth/token";
        $data = array(
            'username' => $username,
            'password' => $password,
            'grant_type' => 'password'
        );
        $rs = \pksdk\request\Request::postWithoutPkTokenJsonResponse($apiUri, $data);
        return $rs;
    }

    public static function getTokenViaRefreshToken($refreshToken) {
        $apiUri = PK_API_ROOT . "security/oauth/refresh_token";
        $data = array(
            'refresh_token' => $refreshToken,
            'grant_type' => 'refresh_token'
        );
        $rs = \pksdk\request\Request::postWithoutPkTokenJsonResponse($apiUri, $data);
        return $rs;
    }

    public static function getUser($accessToken){
        $apiUri = PK_API_ROOT . "api/portal/api/user";
        $rs = \pksdk\request\Request::getWithPkTokenJsonResponse($apiUri, $accessToken);
        return $rs;
    }
}