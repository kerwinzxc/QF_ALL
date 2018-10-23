<?php
/**
 * Aliyun.php UTF-8
 * 阿里云短信发送
 *
 * @date    : 2017年04月14日下午1:55:34
 *
 * @license 这不是一个自由软件，未经授权不许任何使用和传播。
 * @author  : ou <ozf@huosdk.com>
 * @version : HUOSDK 7.0
 */
namespace huosdk\sms;

use think\Log;
class Aliyun {
    /**
     * 自定义错误处理
     *
     * @param string $msg 输出的文件
     * @param string $level
     *
     * @internal param  $msg
     */
    private function _error($msg, $level = 'error') {
        $_info = 'sms\Aliyun Error:'.$msg;
        Log::record($_info, $level);
    }

    public function __construct() {
    }

    public function send($mobile, $type, $sms_code) {
        include_once EXTEND_PATH.'aliyun/aliyun-php-sdk-core/Config.php';
        include_once EXTEND_PATH.'aliyun/Dysmsapi/Request/V20170525/SendSmsRequest.php';
        include_once EXTEND_PATH.'aliyun/Dysmsapi/Request/V20170525/QuerySendDetailsRequest.php';
        // 获取阿里云短信配置信息
        if (file_exists(CONF_PATH."extra/sms/aliyun.php")) {
            $_config = include CONF_PATH."extra/sms/aliyun.php";
        } else {
            $_config = array();
        }
        if (empty($_config)) {
            $this->_error("配置信息错误");

            return false;
        }
        //此处需要替换成自己的AK信息
        $accessKeyId = $_config['APPKEY'];
        $accessKeySecret = $_config['APPSECRET'];
        //短信API产品名
        $product = "Dysmsapi";
        //短信API产品域名
        $domain = "dysmsapi.aliyuncs.com";
        //暂时不支持多Region
        $region = "cn-hangzhou";
        //初始化访问的acsCleint
        $profile = \DefaultProfile::getProfile($region, $accessKeyId, $accessKeySecret);
        \DefaultProfile::addEndpoint("cn-hangzhou", "cn-hangzhou", $product, $domain);
        $acsClient = new \DefaultAcsClient($profile);
        $request = new \Dysmsapi\Request\V20170525\SendSmsRequest;
        //必填-短信接收号码
        $request->setPhoneNumbers($mobile);
        //必填-短信签名
        $request->setSignName($_config['SIGNNAME']);
        //必填-短信模板Code
        $request->setTemplateCode($_config['SMSTEMPAUTH']);
        //选填-假如模板中存在变量需要替换则为必填(JSON格式)
        $_content = array(
            "code"    => ''.$sms_code,
            "product" => ''.$_config['PRODUCT']
        );
        $request->setTemplateParam(json_encode($_content));
        //选填-发送短信流水号
        $request->setOutId("1234");
        //发起访问请求
        $acsResponse = $acsClient->getAcsResponse($request);
        if ($acsResponse->Code == "OK") {
            $_rdata['code'] = '200';
            $_rdata['msg'] = '发送成功';
        } else {
            $_rdata['code'] = '400';
            $_rdata['msg'] = '短信发送失败';
        }
        return $_rdata;
    }
}