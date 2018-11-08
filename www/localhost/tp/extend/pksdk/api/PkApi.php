<?php
/**
 * Request.php UTF-8
 */

namespace pksdk\api;

use think\Log;
use think\Db;

define("PK_API_ROOT", "https://playground.dobby.sandbx.co/");
define("PK_GAME_UUID", "demo-game");
define("PK_INVALID_TOKEN", "invalid_token");

class PkApi {

    public static function getAccessTokenByMemId($memId, $forceToRefresh = false) {
        $_map['mem_id'] = $memId;
        $_oath_data = Db::name('mem_oauth')->where($_map)->find();
        if (empty($_oath_data)) {
            return NULL;
        }
        if (!$forceToRefresh && time() < $_oath_data['expires_date']) {
            return $_oath_data['access_token'];
        }
        $rs = self::getTokenViaRefreshToken($_oath_data['refresh_token']);
        if (empty($rs) || empty($rs['access_token'])) {
            return NULL;
        }
        $_oauth_data['access_token'] = $rs['access_token'];
        $_oauth_data['refresh_token'] = $rs['refresh_token'];
        $_oauth_data['expires_date'] = time() + $rs['expires_in'] * 1000;
        Db::name('mem_oauth')->update($_oauth_data);
        return $rs['access_token'];
    }

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

    /*
     *     {
     *           "access_token": "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJleHAiOjE1MDExNTczNTAsInVzZXJfbmFtZSI6IjMzIiwiYXV0aG9yaXRpZXMiOlsiUkVHSVNURVJFRF9VU0VSIl0sImp0aSI6IjQ1ZWJiNTYwLWQ1MDQtNDQ1NS1hY2ViLThmMmZjOTfdsdsfdsfdsfsd3cml0ZSJdfQ.dnZXBGdI7KK5RLIfavk8fnh3Q0vAtXxHTm8B-lFxU5I",
     *           "token_type": "bearer",
     *           "refresh_token": "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyX25hbWUiOiIzMyIsInNjb3BlIjpbInJlYWQiLCJ3cml0ZSJdLCJhdGkiOiI0NWViYjU2MC1kNTA0LTQ0NTUtYWNlYi04ZjJmYzk4MzUzNmQiLCJleHAiOjE1MDExOTAxMTAsImF1dGhvcml0aWVzIjpbIlJFR0lTVEVSRURfVVNFUiJdLCJqdGkiOiJjNWIwYTIxMC0xMWM1LTRiNmEtYmI4My0zYjI0OGI3NDVhYjUiLCJjbGllbnRfaWQiOfdsfdsfdsfsd3ZWJjbGllbnQifQ.txaiH2sKHJTOh7EkaEr-GIFW18OjdIteDgl-pxhcgLE",
     *           "expires_in": 1799,
     *           "scope": "read write",
     *           "jti": "45ebb560-d504-4455-aceb-8f2fc983536d"
     *      }
     */
    public static function getTokenViaRefreshToken($refreshToken) {
        $apiUri = PK_API_ROOT . "security/oauth/token";
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
    public static function listPurchaseItems($memId){
        $accessToken = self::getAccessTokenByMemId($memId);
        if ($accessToken == NULL) {
            return NULL;
        }
        $apiUri = PK_API_ROOT . "api/games/" . PK_GAME_UUID . "/purchases";
        $rs = \pksdk\request\Request::getWithPkTokenJsonResponse($apiUri, $accessToken);
        if (!empty($rs) && isset($rs['error'])) {
            if (strcmp($rs['error'], PK_INVALID_TOKEN) == 0) {
                $accessToken = self::getAccessTokenByMemId($memId, true);
                if ($accessToken == NULL) {
                    return NULL;
                }
                $rs = \pksdk\request\Request::getWithPkTokenJsonResponse($apiUri, $accessToken);
            }
        }
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

    public static function consumeItem($purchaseUuid, $memId){
        $accessToken = self::getAccessTokenByMemId($memId);
        if ($accessToken == NULL) {
            return NULL;
        }
        $apiUri = PK_API_ROOT . "api/purchases/{$purchaseUuid}/consume";
        $data = array(
            'purchaseUuid' => $purchaseUuid,
        );
        $rs = \pksdk\request\Request::postWithPkTokenJsonResponse($apiUri, $data, $accessToken);
        if (!empty($rs) && isset($rs['error'])) {
            if (strcmp($rs['error'], PK_INVALID_TOKEN) == 0) {
                $accessToken = self::getAccessTokenByMemId($memId, true);
                if ($accessToken == NULL) {
                    return NULL;
                }
                $rs = \pksdk\request\Request::postWithPkTokenJsonResponse($apiUri, $data, $accessToken);
            }
        }
        return $rs;
    }
}