<?php

namespace app\index\controller;

use app\index\common\Base;
use think\Session;
use think\Request;
use think\Db;
use think\Loader;

class Pay extends Base {
    private $config;

    // 获取玩家的平台币信息
    public function getMemPtb() {
        $mem_id = Session::get('user.id');
        if (empty($mem_id)) {
            $data['remain'] = 0;
            $data['username'] = "";
            $data['btpname'] = $this->btpname;
        }else{
            $data['remain'] = Db::name('ptb_mem')
                                ->where(array('mem_id'=>$mem_id))->value('remain');
            $data['remain'] = empty($data['remain']) ? 0 : $data['remain'];
            $data['username'] = Session::get('user.username');
            $data['btpname'] = $this->btpname;
        }

        return $data;
    }

    // 获取折扣信息
    public function index() {
        $amount = request()->param('amount');
        $money_arr = Db::name('ptb_rate')->column('start_money', 'id');

        $mem['total'] = $amount;
        $rank_arr = array_merge($money_arr, $mem);
        sort($rank_arr);
        $arr = array_values($rank_arr);
        $grades = array_search($amount, $arr);

        if (0 == $grades) {
            $data['discount'] = 1;
        } else {
            $data['discount'] = Db::name('ptb_rate')->where('id', $grades)->value('rate');
        }

        return $data;
    }

    // 下单操作
    public function doPay() {
        $type = request()->param('type');

        switch ($type) {
            case 'alipay' : // 支付宝
                return $this->_alipayweb();
                break;
            case 'wxpay' : // 微信支付
                //return array('error' => 1, 'msg' => '微信支付尚未开放');
                return $this->_spayweb();
                break;
            default :
                return array('error'=>2, 'msg'=>'请选择正确的支付方式');
                exit();
        }
    }

    // 下单拼接参数
    /**
     *支付宝支付
     */
    function _alipayweb(){
        if(Request::instance()->isPost()){
            $data = $this->_insertpay();

            if(empty($data['order_id'])){
                return $data;
                exit;
            }

            $_conf_file = CONF_PATH."extra/pay/alipay/config.php";

            if (file_exists($_conf_file)) {
                $alipay_config = include $_conf_file;
            } else {
                $alipay_config = array();
            }

            //支付类型
            $payment_type = "1";
            //必填，不能修改

            //服务器异步通知页面路径
            $notify_url = WEBSITE."/index.php/index/pay/alipay_notify";
            //需http://格式的完整路径，不能加?id=123这类自定义参数

            //页面跳转同步通知页面路径
            $return_url = WEBSITE;
            //需http://格式的完整路径，不能加?id=123这类自定义参数，不能写成http://localhost/

            //商户订单号
            $out_trade_no = $data['order_id'];
            //商户网站订单系统中唯一订单号，必填

            //订单名称
            $subject = "平台币充值";
            //必填

            //付款金额
            $total_fee = $data['money'];
            //必填

            //商品展示地址
            $show_url = WEBSITE;
            //必填，需以http://开头的完整路径，例如：http://www.商户网址.com/myorder.html

            //订单描述
            $body = "平台币充值";
            //选填

            //超时时间
            $it_b_pay = '15d';
            //选填

            //钱包token
            $extern_token = "";
            //选填

            $alipay_config['input_charset'] = 'utf-8';
            $alipay_config['sign_type'] = 'RSA';
            $alipay_config['private_key_path'] = CONF_PATH.'extra/pay/alipay/key/rsa_private_key.pem';
            $alipay_config['public_key_path'] = CONF_PATH.'extra/pay/alipay/key/alipay_public_key.pem';

            $parameter = array(
                "service"           => 'create_direct_pay_by_user',
                "partner" => trim($alipay_config['partner']),
                "payment_type"	=> $payment_type,
                "notify_url"	=> $notify_url,
                "return_url"	=> $return_url,
                "seller_email"      => trim($alipay_config['seller_email']),
                "out_trade_no"	=> $out_trade_no,
                "subject"	=> $subject,
                "total_fee"	=> $total_fee,
                "body"	=> $body,
                "show_url"          => $return_url,
                "anti_phishing_key" => "",
                "exter_invoke_ip"   => "",
                "_input_charset"    => trim(strtolower($alipay_config['input_charset']))
            );

            //建立请求，请求成功之后，会通知服务器的alipay_notify方法，客户端会通知$return_url配置的方法
            Loader::import('pay.alipay.AlipaySubmit', '', '.class.php');
            $alipaySubmit = new \AlipaySubmit($alipay_config);

            $html_text = '<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>';
            $html_text = $alipaySubmit->buildRequestForm($parameter,"get", "跳转中");
            $html_text = $html_text."<script>document.forms['alipaysubmit'].submit();</script>";
            echo $html_text;
        }
    }

    /**
     *支付宝回调
     */
    function alipay_notify(){
        Loader::import('pay.alipay.AlipayNotify', '', '.class.php');
        //Loader::import('Alipay.AlipayNotify', EXTEND_PATH, '.class.php');
        //Loader::import('Alipay.Config', EXTEND_PATH, '.php');
        //计算得出通知验证结果
        //$config = new \Config();
        $alipay_config = $this->alipayConfig();
        $alipayNotify = new \AlipayNotify($alipay_config);
        $verify_result = $alipayNotify->verifyNotify();

        if($verify_result) {//验证成功
            //商户订单号
            $out_trade_no = $_POST['out_trade_no'];
            //支付宝交易号
            $trade_no = $_POST['trade_no'];
            $amount = $_POST['total_fee'];

            //交易状态
            $trade_status = $_POST['trade_status'];
            if($trade_status == 'TRADE_FINISHED') {
                // 自由网络申请的是普通及时到账接口
                //支付成功后，修改支付表中支付状态，并将交易信息写入用户平台充值记录表ptb_charge。
                //$this->paypost($out_trade_no,$trade_no,$amount);
            }else if ($trade_status == 'TRADE_SUCCESS') {
                //支付成功后，修改支付表中支付状态，并将交易信息写入用户平台充值记录表ptb_charge。
                $this->paypost($out_trade_no ,$amount);

            }
        } else {
            echo '验证失败';
        }
    }
    public function alipayConfig() {
        $_conf_file = CONF_PATH."extra/pay/alipay/config.php";
        if (file_exists($_conf_file)) {
            $alipay_config = include $_conf_file;
        } else {
            $alipay_config = array();
        }
        $alipay_config = array(
            'partner'          => $alipay_config['partner'],
            'key'              => $alipay_config['key'],
            'input_charset'    => strtolower('utf-8'),
            'cacert'           => $alipay_config['partner'],
            'transport'        => 'http',
            'sign_type'        => 'RSA',
            'private_key_path' => CONF_PATH.'extra/pay/alipay/key/rsa_private_key.pem',
            'public_key_path'  => CONF_PATH.'extra/pay/alipay/key/alipay_public_key.pem'
        );
        return $alipay_config;
    }

    /**
     *支付记录保存
     */
    function _insertpay() {
        $ptb_cnt = request()->param('amount'); // 获取平台币数量
        $username = Session::get('user.username');
        // 获取折扣
        $discount = $this->index();
        $amount = $discount['discount']*$ptb_cnt; // 平台币与充值金额比例暂定为1:1
        $paytypeid = request()->param('type');

        // 判断充值金额的有效性
        if ($amount <= 0) {
            return array('error'=>3, 'msg'=>'充值金额不能小于或等于0');
        }
        //验证参数有效性
        if (empty($amount) || empty($username)
            || empty($ptb_cnt)
            || empty($paytypeid)
        ) {
            $str = "缺少参数，请重新提交";
            return array('error'=>4, 'msg'=>$str);
        }
        //检查用户名是否存在
        $mem_id = Db::name('members')
            ->where(array('username' => $username))
            ->value('id');
        if (empty($mem_id)) {
            $str = "用户不存在";
            return array('error'=>5, 'msg'=>$str);
        }
        if (!empty(Session::get('paytime')) && Session::get('paytime') + 5 > time()) {
            $str = "订单己存在，请确认是您的付款单号再付款!";
            return array('error'=>6, 'msg'=>$str);
        }
        //订单流水号
        $order_id = setorderid($mem_id);
        Session::set('weborderid', $order_id);
        Session::set('paytime', time());

        //查询是否为同一订单，插入到平台币充值订单中
        $orderdata = Db::name('ptb_charge')->where(array('order_id' => $order_id))->value('id');
        //判断订单是否存在
        if ($orderdata) {
            $str = "订单己存在，请确认是您的付款单号再付款!";
            return array('error'=>7, 'msg'=>$str);
        }
        $BuyerIp = request()->ip();           //用户支付时使用的网络终端IP
        $transtime = time();                  //交易时间
        $mem_id = Db::name("members")->where(array("username" => $username))->value("id");
        $data['order_id'] = $order_id;
        $data['mem_id'] = $mem_id;
        $data['money'] = $amount;
        $data['ptb_cnt'] = $ptb_cnt;
        $data['status'] = 1;
        $data['create_time'] = $transtime;
        $data['payway'] = $paytypeid;
        $data['flag'] = 1; // 官网充值
        $data['remark'] = "官网充值";
        $data['ip'] = $BuyerIp;
        $data["discount"] = "1";
        $data["real_amount"] = $amount;

        $data['id'] = Db::name('ptb_charge')->insert($data);
        if (!$data['id']) {
            return array('error'=>8, 'msg'=>'数据处理出错，请重新提交!');
            exit;
        }

        return $data;
    }

    function paypost($out_trade_no, $total_fee) {
        $time = time();
        $data = Db::name("ptb_charge")->where(array("order_id" => $out_trade_no))->find();
        $myamount = number_format($data['money']);
        $transAmount = number_format($total_fee);
        if ($myamount == $transAmount) {
            if ($data['status'] == 1) {
                $status['status'] = 2;
                $rs = Db::name("ptb_charge")->where(array("order_id" => $out_trade_no))->update($status);
                if ($rs) {
                    $check = $this->checkPtb($data['mem_id'], $data['ptb_cnt'], $data['money']);
                    if ($check) {
                        echo "OK";
                        exit;
                    }
                }
            }
        }
    }

    //检查是否已经存在过平台币并更新
    public function checkPtb($mem_id, $ptb_cnt, $amount) {
        //获取玩家平台币余额表中的ID
        $data = Db::name('ptb_mem')->where(array('mem_id' => $mem_id))->find();
        $where['remain'] = $data['remain'] + $ptb_cnt;
        $where['update_time'] = time();
        $where['total'] = $data['total'] + $ptb_cnt;
        $where['sum_money'] = $data['sum_money'] + $amount;
        $map['mem_id'] = $mem_id;
        //判断玩家平台币余额表中是否存在数据，没有则添加，有则修改！
        if (!empty($data)) {
            $result = Db::name('ptb_mem')->where($map)->update($where);
        } else {
            $where['create_time'] = time();
            $where['mem_id'] = $mem_id;
            $where['total'] = $ptb_cnt;
            $where['remain'] = $ptb_cnt;
            $where['sum_money'] = $amount;
            $result = Db::name('ptb_mem')->data($where)->insert();
        }
        //判断充值结果
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    /**
     * 扫码支付
     *
     * @return mixed
     */
    function _spayweb() {
        if (Request::instance()->isPost()) {
            $data = $this->_insertpay();
            if (empty($data['order_id'])) {
                $this->error("内部服务器发生错误");
                exit;
            }
            $_conf_file = CONF_PATH."extra/pay/spay/config.php";
            if (file_exists($_conf_file)) {
                $_config = include $_conf_file;
            } else {
                $_config = array();
            }
            header("Content-type:text/html;charset=utf-8");
            Loader::import('pay.spay.Utils', '', '.class.php');
            Loader::import('pay.spay.RequestHandler', '', '.class.php');
            Loader::import('pay.spay.ClientResponseHandler', '', '.class.php');
            Loader::import('pay.spay.PayHttpClient', '', '.class.php');
            $resHandler = new \ClientResponseHandler();
            $reqHandler = new \RequestHandler();
            $pay = new \PayHttpClient();
            $notify_url = WEBSITE."/index.php/index/pay/spay_notify";
            //导入回调地址
            $reqHandler->setGateUrl($_config['url']);
            $reqHandler->setKey($_config['key']);
            $reqHandler->setParameter('out_trade_no', $data['order_id']);
            $reqHandler->setParameter('body', "平台币充值");
            $reqHandler->setParameter('attach', "平台币充值");
            $reqHandler->setParameter('total_fee', $data['money'] * 100);
            $reqHandler->setParameter('mch_create_ip', $data['ip']);
            $reqHandler->setParameter('time_start', date('YmdHis', time()));
            $reqHandler->setParameter('time_expire', date('YmdHis', time() + 7200));
            $reqHandler->setParameter('service', 'pay.weixin.native');//接口类型：pay.weixin.native
            $reqHandler->setParameter('mch_id', $_config['mchId']);//必填项，商户号，由威富通分配
            $reqHandler->setParameter('version', $_config['version']);
            //通知地址，必填项，接收威富通通知的URL，需给绝对路径，255字符内格式如:http://wap.tenpay.com/tenpay.asp
            //$notify_url = 'http://'.$_SERVER['HTTP_HOST'];			//$reqHandler->setParameter('notify_url',$notify_url.'/payInterface/request.php?method=callback');
            $reqHandler->setParameter('notify_url', $notify_url);
            $reqHandler->setParameter('nonce_str', mt_rand(time(), time() + rand()));//随机字符串，必填项，不长于 32 位
            $reqHandler->createSign();//创建签名
            $rdata = \Utils::toXml($reqHandler->getAllParameters());//var_dump($rdata);
            $pay->setReqContent($reqHandler->getGateURL(), $rdata);
            if ($pay->call()) {
                $resHandler->setContent($pay->getResContent());
                $resHandler->setKey($reqHandler->getKey());
                if ($resHandler->isTenpaySign()) {
                    //当返回状态与业务结果都为0时才返回支付二维码，其它结果请查看接口文档
                    if ($resHandler->getParameter('status') == 0 && $resHandler->getParameter('result_code') == 0) {
                        $code_img_url = $resHandler->getParameter('code_img_url');
                        $this->assign('code_img_url', $code_img_url);
                        $this->assign('order_id', $data['order_id']);
                        $this->assign('checkurl', WEBSITE."/index.php/index/pay/spaystatus");
                        $this->assign('returnurl', WEBSITE);
                        \think\Config::set('default_return_type', 'html');
                        return $this->fetch("spay");
                        exit;
                    } else {
                        echo json_encode(
                            array('status' => 500,
                                  'msg'    => 'Error Code:'.$resHandler->getParameter('err_code').' Error Message:'
                                              .$resHandler->getParameter('err_msg'))
                        );
                        exit();
                    }
                }
                echo json_encode(
                    array('status' => 500, 'msg' => 'Error Code:'.$resHandler->getParameter('status').' Error Message:'
                                                    .$resHandler->getParameter('message'))
                );
            } else {
                echo json_encode(
                    array('status' => 500,
                          'msg'    => 'Response Code:'.$pay->getResponseCode().' Error Info:'.$pay->getErrInfo())
                );
            }
        }
    }
    /**
     *威富通通知
     */
    function spay_notify() {
        if (Request::instance()->isPost()) {
            $_conf_file = CONF_PATH."extra/pay/spay/config.php";
            if (file_exists($_conf_file)) {
                $_config = include $_conf_file;
            } else {
                $_config = array();
            }
            header("Content-type:text/html;charset=utf-8");
            Loader::import('pay.spay.Utils', '', '.class.php');
            Loader::import('pay.spay.RequestHandler', '', '.class.php');
            Loader::import('pay.spay.ClientResponseHandler', '', '.class.php');
            Loader::import('pay.spay.PayHttpClient', '', '.class.php');
            $resHandler = new \ClientResponseHandler();
            $xml = file_get_contents('php://input');
            $resHandler->setContent($xml);
            $resHandler->setKey($_config['key']);
            //判断签名结果
            $signResult = $resHandler->isTenpaySign();
            if ($signResult) {
                if ($resHandler->getParameter('status') == 0 && $resHandler->getParameter('result_code') == 0) {
                    //更改订单状态
                    $out_trade_no = $resHandler->getParameter('out_trade_no'); //自己生成的订单状态
                    $total_fee = $resHandler->getParameter('total_fee') / 100;
                    //将订单状态写入数据表中
                    $this->paypost($out_trade_no, $total_fee);
                    echo 'success';
                    exit;
                } else {
                    echo 'failure1';
                    exit();
                }
            } else {
                echo 'failure2';
            }
        }
        echo 'failure2';
    }
    function spaystatus() {
        $_order_id = $this->request->param("order_id","");
        if (empty($_order_id)) {
            $_data = array(
                "success" => 0
            );
        }
        $_status = Db::name("ptb_charge")->where(array("order_id" => $_order_id))->value("status");
        if (2 == $_status) {
            $_data = array(
                "success" => 1
            );
        } else {
            $_data = array(
                "success" => 0
            );
        }
        echo json_encode($_data);
    }
}