<?php
/**
 * Request.php UTF-8
 */

namespace pksdk\api;

use think\Log;

define("PK_API_ROOT", "https://playground.dobby.sandbx.co/");
define("PK_GAME_UUID", "demo-game");

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

    /*
     *        {
     *           "state": "PURCHASED",
     *           "purchaseUuid": "53ed5476-98a8-4e08-83e6-41733ed77b27",
     *           "type": "ASSET",
     *           "loginEmail": "demo@example.com",
     *           "itemUuid": "demo-game-gold10",
     *           "gameUuid": "demo-game",
     *           "price": 10,
     *           "purpose": "Demo Game, Gold 10"
     *       },
     */
    public static function listPurchaseItems($accessToken){
        $apiUri = PK_API_ROOT . "api/games/" . PK_GAME_UUID . "/purchases";
        $rs = \pksdk\request\Request::getWithPkTokenJsonResponse($apiUri, $accessToken);
        return $rs;
    }

    /*
     * {
     *   "status": "SUCCESS",
     *   "purchaseUuid": "53ed5476-98a8-4e08-83e6-41733ed77b27",
     *   "type": "ASSET",
     *   "loginEmail": "demo@example.com",
     *   "itemUuid": "demo-game-gold10",
     *   "gameUuid": "demo-game"
     *  }
     */

    public static function consumeItem($purchaseUuid, $accessToken){
        $apiUri = PK_API_ROOT . "api/purchases/{$purchaseUuid}/consume";
        $data = array(
            'purchaseUuid' => $purchaseUuid,
        );
        $rs = \pksdk\request\Request::postWithPkTokenJsonResponse($apiUri, $data, $accessToken);
        return $rs;
    }
}