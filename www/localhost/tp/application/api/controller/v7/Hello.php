<?php
namespace app\api\controller\v7;

use think\Controller;

class Hello extends Controller {
    function _initialize() {
        parent::_initialize();
    }

    public function index() {
        $ttt = "tttt";
        var_dump($ttt);
        return json_encode("hello");
    }
}