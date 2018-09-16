<?php
/**
 * Float.php UTF-8
 * 浮点显示
 *
 * @date    : 2017年04月10日下午4:58:28
 * @license 这不是一个自由软件，未经授权不许任何使用和传播。
 * @author  : ou <ozf@huosdk.com>
 * @version : HUOSDK 7.0
 */
namespace huosdk\floater;

use think\Log;
use think\Db;

class Floater {
    private $app_id;

    /**
     * 自定义错误处理
     *
     * @param msg 输出的文件
     */
    private function _error($msg, $level = 'error') {
        $_info = 'float\Float Error:'.$msg;
        Log::record($_info, 'error');
    }

    /**
     * 构造函数
     *
     */
    public function __construct($app_id = 0) {
        if (!empty($app_id)) {
            $this->app_id = $app_id;
        }
    }

    public function getFloatstatus($app_id = 0) {
        if (!empty($app_id)) {
            $_map['id'] = $app_id;
        }else{
            $_map['id'] = $this->app_id;
        }
        $_status = DB::name('game')->where($_map)->value('float_is_show');
        return $_status;
    }
}