<?php
namespace app\api\controller\v7;

use think\Controller;
use think\Log;

class Hello extends Controller {
    function _initialize() {
        parent::_initialize();
    }

    public function index() {
        $data = array(
            'username' => 'demo@example.com',
            'password' => 'Demo!123',
            'grant_type' => 'password'
        );
        $rs = \pksdk\request\Request::postWithoutPkTokenJsonResponse("https://playground.dobby.sandbx.co/security/oauth/token", $data);
        $customer = \pksdk\request\Request::getWithPkTokenJsonResponse("https://playground.dobby.sandbx.co/api/portal/api/user", $rs['access_token']);
        return hs_api_responce(200, $customer);
    }
}
