<?php
class aliyun {
    private $lib_path;
    private $conf_path;

    public function __construct() {
        $this->lib_path = SITE_PATH.'thinkphp/Core/Library/Vendor/aliyun/';
        $this->conf_path = SITE_PATH."conf/sms/aliyun.php";
    }

    function send($mobile) {
        include($this->lib_path.'aliyun-php-sdk-core/Config.php');
        include($this->lib_path.'Dysmsapi/Request/V20170525/SendSmsRequest.php');
        include($this->lib_path.'Dysmsapi/Request/V20170525/QuerySendDetailsRequest.php');
        //获取阿里云配置信息
        if (file_exists($this->conf_path)) {
            $_config = include $this->conf_path;
        } else {
            $_config = array();
        }
        if (empty($_config)) {
            return false;
        }
        $sms_code = rand(1000, 9999);   //获取随机码
        $_SESSION['sms_code'] = $sms_code;
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

