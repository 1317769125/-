<?php

/**
 * 支付{ 控制器 }
 */
class PayAction extends WapbaseAction
{
    const WXPAY = 1;//微信支付
    const ALIPAY = 2;//支付宝
    protected $stylistUser,$newStore,$income,$newOrder,$service,$User;

    /**
     * 初始化
     */
    public function index()
    {
        echo  123;
    }
    public function _initialize()
    {
        parent::_initialize();

        ini_set('date.timezone', 'Asia/Shanghai');
        //微信支付sdk
        require_once "vendor/wxPay/lib/WxPay.Api.php";
        require_once 'vendor/wxPay/lib/WxPay.Notify.php';
        require_once 'vendor/wxPay/lib/WxPay.Data.php';
        //支付宝sdk
        require_once 'vendor/aliPay/AopSdk.php';

        $this->newStore= new NewStoreModel();
        $this->income= new IncomeModel();
        $this->newOrder = new NewOrderModel();
        $this->stylistUser = new StylistUserModel();
        $this->User = new NewUserModel();
        $this->service = new ServiceModel();
    }


    /**
     * 支付下订单
     */
    public function unifiedOrder()
    {
        $req = $this->getReq(); //获取post参数数组
        $param = array('from_pay' => '','order_id'=>'');
        //检查输入的参数
        $this->checkInput($req, $param);
        //检查参数是否存在
        $check_loc_err = $this->checkParamAllExistOrAllNot($req, $param);
        if ($check_loc_err !== '') {
            $this->responseErrorInput($check_loc_err, $req);
        }
        $from_pay = intval($req['from_pay']);
        $orderInfo=$this->newOrder->where(array('id'=>$req['order_id']))->field('service_id,order_number,total_amount')->find();
       // dump($orderInfo);exit;
        $name=$this->service->where(array('id'=>$orderInfo['service_id']))->getField('name');
      //  $total_fee = 0.01;
        $total_fee = $orderInfo['total_amount'];
        $order_number = $orderInfo['order_number'];
        if($from_pay == self::WXPAY){
            $result = $this->_wxUnifiedOrder($order_number, $name, '服务费用', $total_fee);
            if ($result) {
                $resp['code'] = 101;
                $respt['appId'] = $result["appid"];
                $respt['partnerId'] = $result["mch_id"];
                $respt['prepayId'] = $result["prepay_id"];
                $respt['nonceStr'] = WxPayApi::getNonceStr();
                $respt['timeStamp'] = time();
                $respt['packageValue'] = 'Sign=WXPay';
                $input = new WxPayNotifyReply();
                $input->SetData("appid", $respt["appId"]);
                $input->SetData("partnerid", $respt['partnerId']);
                $input->SetData("noncestr", $respt['nonceStr']);
                $input->SetData("prepayid", $respt['prepayId']);
                $input->SetData("timestamp", $respt['timeStamp']);
                $input->SetData("package", $respt['packageValue']);
                $respt['sign'] = $input->MakeSign();
                $respt['order_number'] = $order_number;
                $resp['data']=$respt;
                $resp['msg'] = '操作成功！';
            } else {
                $resp['code'] = 102;
                $resp['msg'] = '操作失败！';
            }
        } elseif ($from_pay == self::ALIPAY) {
            $result = $this->_aliUnifiedOrder($order_number, $name, '服务费用', $total_fee);
            $resp['code'] = 101;
            $respt['order_number'] = $order_number;
            $respt['orderString'] = $result;
            $resp['data']=$respt;
        } else {
            $resp['code'] = 102;
            $resp['msg'] = '参数错误';
            $resp['data']='';
        }
        $this->checkAndResponse($resp);
    }

    /**
     * 微信下单
     * @param $order_number 订单号
     * @param $body 商品描述
     * @param string $attach 扩展字段
     * @param $total_fee  订单总金额，单位为分
     * @return bool
     */
    public function _wxUnifiedOrder($order_number, $body, $attach = '', $total_fee)
    {
        $total_fee = $total_fee *100;//转换 单位为分
        $input = new WxPayUnifiedOrder();
        $input->SetBody($body);
        $input->SetAttach($attach);
        $input->SetOut_trade_no($order_number);
        $input->SetTotal_fee($total_fee);
        $input->SetTime_start(date("YmdHis"));
        $input->SetTime_expire(date("YmdHis", time() + 600));
        // $input->SetGoods_tag("test");
        $input->SetNotify_url("http://wap.faxingw.cn/user/pay/notify/1.html");
        $input->SetTrade_type("APP");
        $result = WxPayApi::unifiedOrder($input);
        Log::record('----------------------------------------------------微信下单：'.json_encode($result), Log::DEBUG);
        if($result['return_code']!='SUCCESS'){
            $msg = "统一下单失败";
            return false;
        }
        if (!array_key_exists("appid", $result) ||
            !array_key_exists("mch_id", $result) ||
            !array_key_exists("prepay_id", $result)
        ) {
            $msg = "统一下单失败";
            return false;
        }
        return $result;
    }

    /**
     * 支付宝下单
     * @param $order_number  订单号
     * @param $body 商品描述
     * @param string $attach 扩展字段 传服务类型
     * @param $total_fee 订单总金额，单位为元，精确到小数点后两位，取值范围[0.01,100000000]
     * @return string
     */
    public function _aliUnifiedOrder($order_number, $body, $attach = '', $total_fee)
    {

        $aop = new AopClient;
        $aop->gatewayUrl = "https://openapi.alipay.com/gateway.do";
        $aop->format = "json";
        $aop->charset = "UTF-8";
        $aop->signType = "RSA";
        $request = new AlipayTradeAppPayRequest();
        //SDK已经封装掉了公共参数，这里只需要传入业务参数
        $bizcontent = "{\"body\":\"".$body."\","
            . "\"subject\": \"".$attach."\","
            . "\"out_trade_no\": \"".$order_number."\","
            . "\"timeout_express\": \"30m\","
            . "\"total_amount\": \"". $total_fee."\","//订单总价
            . "\"product_code\":\"QUICK_MSECURITY_PAY\""
            . "}";
        $request->setNotifyUrl("http://wap.faxingw.cn/user/pay/notify/2.html");
        $request->setBizContent($bizcontent);
        //这里和普通的接口调用不同，使用的是sdkExecute
        $response = $aop->sdkExecute($request);
        //htmlspecialchars是为了输出到页面时防止被浏览器将关键参数html转义，实际打印到日志以及http传输不会有这个问题
        Log::record('阿里------------'.$response, Log::DEBUG);

        return   $response;//就是orderString 可以直接给客户端请求，无需再做处理。
    }

    /**
     * 支付统一回调
     */
    public function notify()
    {
        Log::record('回调开始-----------------------', Log::DEBUG);
        $platform = intval($_GET['platform']);
        if ($platform == self::WXPAY) {
            Log::record('微信回调-----------------------', Log::DEBUG);
            $input = new WxPayNotifyReply();
            $result = $this->wxNotify();
            if($result){
                $pay_time = strtotime($result["time_end"]);
                $this->updateOrder($result["out_trade_no"],self::WXPAY,$result["openid"],$result["transaction_id"],$pay_time);//成功修改订单状态
                $input->SetReturn_code('SUCCESS');
            }else{
                $input->SetReturn_code('FAIL');
            }
            WxpayApi::replyNotify($input->ToXml());
            exit;
        } elseif ($platform == self::ALIPAY) {
            Log::record('阿里回调-----------------------', Log::DEBUG);
            $result = $this->aliNotify();
            if($result['trade_status']=='TRADE_SUCCESS'){
                $pay_time = strtotime($result["gmt_payment"]);
                $this->updateOrder($result["out_trade_no"],self::ALIPAY,$result["buyer_id"],$result["trade_no"],$pay_time);//成功修改订单状态
                echo 'success';
            }else{
                echo 'fail';
            }
            exit;
        } else {
            $result = false;
        }

    }

    /**
     * 支付宝回调
     * @return bool || array 成功返回 订单详细
     */
    protected function aliNotify()
    {
        $aop = new AopClient;
        $aop->alipayrsaPublicKey = 'MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDDI6d306Q8fIfCOaTXyiUeJHkrIvYISRcc73s3vF1ZT7XN8RNPwJxo8pWaJMmvyTn9N4HQ632qJBVHf8sxHi/fEsraprwCtzvzQETrNRwVxLO5jVmRGi60j8Ue1efIlzPXV9je9mkjzOmdssymZkh2QhUrCmZYI/FCEa3/cNMW0QIDAQAB';
        Log::record('阿里回调结果：----------'.json_encode($_POST), Log::DEBUG);
        $result = $aop->rsaCheckV1($_POST, NULL, "RSA");
        if($result){
            return $_POST;
        }
        return false;

    }

    /**
     * 微信回调
     * @return bool || array 成功返回 订单详细
     */
    protected function wxNotify()
    {
        //获取通知的数据
        $xml = $GLOBALS['HTTP_RAW_POST_DATA'];
        //如果返回成功则验证签名
        try {
            $result = WxPayResults::Init($xml);
        } catch (WxPayException $e) {
            $msg = $e->errorMessage();
            return false;
        }
        Log::record('微信回调结果：----------'.json_encode($result), Log::DEBUG);
        if (!array_key_exists("transaction_id", $result)) {
            $msg = "输入参数不正确";
            return false;
        }
        if (!array_key_exists("out_trade_no", $result)) {
            $msg = "输入参数不正确";
            return false;
        }

        //查询订单，判断订单真实性
        if (!$this->wxOrderQuery($result["out_trade_no"])) {
            $msg = "订单查询失败";
            return false;
        }
        return $result;
    }

    /**
     * 订单查询
     */
    public function orderQuery()
    {
        $req = $this->getReq(); //获取post参数数组
        $param = array('order_number'=>'');
        //检查输入的参数
        $this->checkInput($req, $param);
        //检查参数是否存在
        $check_loc_err = $this->checkParamAllExistOrAllNot($req, $param);
        if ($check_loc_err !== '') {
            $this->responseErrorInput($check_loc_err, $req);
        }
        //验证密钥是否正确
        /*$where['order_number'] = $req['order_number'];
        $orderInfo = $this->newOrder->field('id,pay_type')->where($where)->find();*/
        $where['a.order_number'] = $req['order_number'];
        $orderInfo = $this->newOrder->alias('a')->join('fxw_new_user b on a.from_uid = b.uid')
            ->field('a.id,a.pay_type,b.mobile')
            ->where($where)->find();
        if($orderInfo){
            if ($orderInfo['pay_type'] > 0) {
                $arr['is_certification'] = empty($orderInfo['mobile']) ? 0 : 1;
                $resp['code'] = 101;
                $resp['msg'] = '支付成功！';
                $resp['data'] = $arr;
            }else{
                $resp['code'] = 102;
                $resp['msg'] = '暂未支付！';
                $resp['data']='';
            }
        }else{
            $resp['code'] = 104;
            $resp['msg'] = '订单不存在！';
            $resp['data']='';
        }

        $this->checkAndResponse($resp);
    }
    /**
     * 支付宝 订单查询
     * @param $order_number 订单号 对应 支付宝返回字段 out_trade_no
     * @return bool
     */
    public function aliOrderQuery($order_number)
    {
        $aop = new AopClient ();
        $aop->gatewayUrl = 'https://openapi.alipay.com/gateway.do';
        // $aop->gatewayUrl = 'https://openapi.alipaydev.com/gateway.do';
        //  $aop->appId = 'your app_id';
        //  $aop->rsaPrivateKey = '请填写开发者私钥去头去尾去回车，一行字符串';
        // $aop->alipayrsaPublicKey='MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDDI6d306Q8fIfCOaTXyiUeJHkrIvYISRcc73s3vF1ZT7XN8RNPwJxo8pWaJMmvyTn9N4HQ632qJBVHf8sxHi/fEsraprwCtzvzQETrNRwVxLO5jVmRGi60j8Ue1efIlzPXV9je9mkjzOmdssymZkh2QhUrCmZYI/FCEa3/cNMW0QIDAQAB';
//        $aop->apiVersion = '1.0';
//        $aop->signType = 'RSA2';
//        $aop->format='json';
        $request = new AlipayTradeQueryRequest ();
        $request->setBizContent("{" .
            "    \"out_trade_no\":\"".$order_number."\"," .
            "    \"trade_no\":\"\"" .
            "  }");
        $result = $aop->execute ( $request);

        $responseNode = str_replace(".", "_", $request->getApiMethodName()) . "_response";

        if(!empty($resultCode)&&$resultCode == 10000 ){
            return $result->$responseNode->trade_status==='TRADE_SUCCESS';//交易状态：WAIT_BUYER_PAY（交易创建，等待买家付款）、TRADE_CLOSED（未付款交易超时关闭，或支付完成后全额退款）、TRADE_SUCCESS（交易支付成功）、TRADE_FINISHED（交易结束，不可退款）
        }
        return false;

    }

    /**
     * 微信 订单查询
     * @param $order_number 订单号 对应 微信返回字段 out_trade_no
     * @return bool
     */
    public function wxOrderQuery($order_number)
    {
        if ($order_number) {
            $input = new WxPayOrderQuery();
            $input->SetOut_trade_no($order_number);
            $result = WxPayApi::orderQuery($input);
        }

        if ($result['return_code'] == 'SUCCESS' && $result['total_fee']!='') {
            return $result['trade_state']==='SUCCESS'; ///交易状态：SUCCESS—支付成功  //REFUND—转入退款 //NOTPAY—未支付 //CLOSED—已关闭 //REVOKED—已撤销（刷卡支付） //USERPAYING--用户支付中  //PAYERROR--支付失败(其他原因，如银行返回失败)
        }
        return false;
    }

    /**
     * 更新订单状态
     * @param $order_number 订单号
     * @param $from_pay 支付方式
     * @param $openid 用户公众平台id
     * @param $transaction_id 第三方订单号
     * @param $pay_time 支付时间
     */
    protected function updateOrder($order_number,$from_pay,$openid,$transaction_id,$pay_time){
        $ticket=$this->makeTicket();
        $data=array(
            'pay_type'=>$from_pay,
            'openid'=>$openid,
            'transaction_id'=>$transaction_id,
            'pay_time'=>$pay_time,
            'statue'=>2,
            'ticket'=>$ticket
        );
        $where['order_number']=$order_number;
        $res= $this->newOrder->where($where)->save($data);
        return  $res;

    }

    private function makeTicket($length = 6) {
        $characters = '0123456789';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }




}