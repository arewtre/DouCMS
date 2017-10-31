<?php

/**
 * 会员财务中心
 *
 * 作者:Kim

 */

defined('IN_IA') or exit('Access Denied');

global $_W,$_GPC;

//checklogin();

define ('ALIPAY_ROOT', "payment" . DIRECTORY_SEPARATOR . "alipay");
define ('YUNPAY_ROOT', "payment" . DIRECTORY_SEPARATOR . "yunpay");

if (!defined("ALIPAY_SDK_ROOT"))

{ define("ALIPAY_SDK_ROOT", dirname(dirname(dirname(__FILE__))) . DIRECTORY_SEPARATOR . ALIPAY_ROOT . DIRECTORY_SEPARATOR);

}
if (!defined("YUNPAY_SDK_ROOT"))

{ define("YUNPAY_SDK_ROOT", dirname(dirname(dirname(__FILE__))) . DIRECTORY_SEPARATOR . YUNPAY_ROOT . DIRECTORY_SEPARATOR);

}
require_once(ALIPAY_SDK_ROOT."alipay.config.php");

require_once(ALIPAY_SDK_ROOT."lib/alipay_submit.class.php");

if($_W['ispost']) {

    $pay_type = $_GPC["pay_type"];

    $order_create_time = date("YmdHis");

    $order_no = $order_create_time . sprintf ( '%06d', rand(0, 999999));

    if($pay_type == "yunpay"){
		
		pdo_insert("buymod_payrecords",array("orderid"=>$order_no,"credit"=>doubleval($_POST['recharge_number']),"createtime"=>TIMESTAMP,"uid"=>$_W['uid'],"weid"=>$_W["weid"],"pay_type"=>0));
		
		if(pdo_insertid() > 0) {

                header("location:".$_W["siteroot"]."web/payment/yunpay/yunpay.php?order_no=".$order_no);

            }
		
		}elseif($pay_type == "alipay") {

        /**************************请求参数**************************/

        //支付类型

        $payment_type = "1";

        //必填，不能修改

        //服务器异步通知页面路径

        $notify_url = $_W['siteroot']."web/source/members/common/notify_url.inc.php";

        //需http://格式的完整路径，不能加?id=123这类自定义参数



        //页面跳转同步通知页面路径

        $return_url =  $_W['siteroot']."web/source/members/common/notify_url.inc.php";

        //需http://格式的完整路径，不能加?id=123这类自定义参数，不能写成http://localhost/



        //卖家支付宝帐户

        $seller_email = $alipay_config['seller_email'];

        //必填



        //商户订单号

        $out_trade_no = $order_no;

        //商户网站订单系统中唯一订单号，必填



        //订单名称

        $subject = "用户充值";

        //必填



        //付款金额

        $total_fee = $_POST['recharge_number'];

        //必填



        //订单描述

        $body = "用户充值";

        //商品展示地址

        $show_url = $_W['siteroot'];

        //需以http://开头的完整路径，例如：http://www.xxx.com/myorder.html



        //防钓鱼时间戳

        $anti_phishing_key = "";

        //若要使用请调用类文件submit中的query_timestamp函数



        //客户端的IP地址

        $exter_invoke_ip = "";

        //非局域网的外网IP地址，如：221.0.0.1



        /************************************************************/

        //构造要请求的参数数组，无需改动

        $parameter = array(

            "service" => "create_direct_pay_by_user",

            "partner" => trim($alipay_config['partner']),

            "payment_type"	=> $payment_type,

            "notify_url"	=> $notify_url,

            "return_url"	=> $return_url,

            "seller_email"	=> $seller_email,

            "out_trade_no"	=> $out_trade_no,

            "subject"	=> $subject,

            "total_fee"	=> $total_fee,

            "body"	=> $body,

            "show_url"	=> $show_url,

            "anti_phishing_key"	=> $anti_phishing_key,

            "exter_invoke_ip"	=> $exter_invoke_ip,

            "_input_charset"	=> trim(strtolower($alipay_config['input_charset']))

        );

        //exit(json_encode($parameter));

        //建立请求

        $alipaySubmit = new AlipaySubmit($alipay_config);

        $html_text = $alipaySubmit->buildRequestForm($parameter,"get", "确认");

        if(empty($html_text)){

            logResult("创建订单失败.");

        }else {

            logResult("创建订单成功.".$out_trade_no);

            pdo_insert("buymod_payrecords",array("orderid"=>$order_no,"credit"=>doubleval($_POST['recharge_number']),"createtime"=>TIMESTAMP,"uid"=>$_W['uid'],"weid"=>$_W["weid"],"pay_type"=>1));

            if(pdo_insertid() > 0) {

                //die(json_encode(array("code"=>1,"message"=>"创建订单成功.","url"=>$order_url)));

                //message("正在使用百付宝支付,马上跳转到支付页面,请稍后....",$order_url);

                echo($html_text);

                exit;

            }

        }

    }

}