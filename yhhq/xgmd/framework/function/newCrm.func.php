<?php
// ini_set("display_errors", "On");
// error_reporting(E_ALL | E_STRICT);

require 'des.php';
require 'starlightcrm.php';


$LicenseKey = 'dIpx4v9vi+jDJQb1QVzFis4ryC+wccBw+2mqx9A973UAA3n2snNIw73aJaed2CBsn/b4QyTKzEWkp1/wnxHLbKpP+6I2aMb4ZgARvd6hlinZjwQ0P+V8ywoX7yaNmGLG/HS0BpQECDk6L3mSmvoolRiilAPtMikNUC+egRXyVN4=';
$public_key = '-----BEGIN PUBLIC KEY-----
MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDmoxC2SocVaM9o8WILwGdm2rKS
f0diS3u8DMlAfxIIfqIXLe9GCrvfRM9kcv7AMEleAOyqagbRbHY8yEyjllNLcIXS
U/6VkLjioerc8CdkJvi81E3Q+9llQ+Gf9VyNOQX4Ozti4M1mDbbF+cWB7+w7pveI
HKrswrp6kd/AzjFh8QIDAQAB
-----END PUBLIC KEY-----';
$ClientCode = '1003';
$ClientIP = '192.168.0.1';
$LoginTime = '2016-06-17 11:27:43';
$Password = '1234';
$clear = '12345678';

$workKey = get_work_key($clear,$public_key);
$client_info = array(
	"LoginCode"=>$ClientCode,
	"ClientIP"=>$ClientIP,
	"LoginTime"=>$LoginTime,
	"Password"=>$Password
);
$des = new JoDES();
//DES加密的clientInfo
$encode = $des->encode(json_encode($client_info), $clear);
//md5加密des加密后的clientInfo
$str_mac = strtoupper(md5($encode));

$crm = new Crm();
$result = $crm->Login($LicenseKey,$workKey,$encode,$str_mac);
$str_json = json_decode($result)->StrJson;
$token_str = $des->decode($str_json,$clear);

$token = json_decode($token_str)->Token;
//会员注册
// $member_arr = array(
// 	'Name'=>'owen',
// 	'Mobile'=>'15951610478',
// 	'OpenId'=>'111111',
// 	'Gender'=>1,
// 	'Birthday'=>'1993-03-30',
// 	'Address'=>'asda',
// 	'Email'=>'35164949@qq.com',
// 	'CardTP'=>'',
// 	'StoreID'=>181,
// 	'SourceType'=>1,
// 	'RefereeMobile'=>''
// );

/* 会员注册 */
function reg_member($reg_member_arr){
    global $des;
    global $crm;
    global $clear;
    global $token;
    $json_str = $des->encode(json_encode($reg_member_arr),$clear);
    $reg_result = $crm->RegMember($token,$json_str);
    $Result = json_decode($reg_result);
    $result = array();
    if($Result->Result == 1){
        $str_json = json_decode($des->decode($Result->StrJson,$clear));
        $result['rt'] = 0;
        $result['member_card_no'] = $str_json->MembCard;
        $result['member_id'] = $json_str->MemberID;
        $result['message'] = $str_json->Message;
        $result['status'] = $str_json->Status;
    }else{
        $result['rt'] = -99;
    }
    return $result;
}

//会员身份验证
/* $check_arr = array(
	'CheckMemberType'=>3,
	'CheckMemberKey'=>'15951610478',
	'ClientSystemTime'=>date('Y-m-d H:i:s'),
	'StoreID'=>181,
	'OpenID'=>'111111',
	'OpenIDType'=>1
);

/* 会员身份验证 */
function check_member($check_member_arr){
    global $des;
    global $crm;
    global $clear;
    global $token;
    $json_str = $des->encode(json_encode($check_member_arr),$clear);
    $check_result = $crm->CheckMember($token,$json_str);
    $Result = json_decode($check_result);
    $result = array();
    if($Result->Result == 1){
        $str_json = json_decode($des->decode($Result->StrJson,$clear));
        $result['rt'] = 0;
        $result['birthday'] = $str_json->Birthday;
        $result['bonus_curr'] = $str_json->BonusCurr;
        $result['discount_rate'] = $str_json->DiscountRate;
        $result['member_card_no'] = $str_json->MembCardID;
        $result['member_id'] = $json_str->MemberID;
        $result['member_name'] = $json_str->MemberName;
        $result['message'] = $str_json->Message;
        $result['status'] = $str_json->Status;
    }else{
        print_r($Result);
        die;
        $result['rt'] = -99;
    }
    return $result;
}

//会员信息查询
// $member_info_arr = array(
// 	'CheckMemberType'=>3,
// 	'CheckMemberKey'=>'15951610478'
// );


/* 会员信息查询 */
function get_member_info($member_info_arr){
    global $des;
    global $crm;
    global $clear;
    global $token;
    $json_str = $des->encode(json_encode($member_info_arr),$clear);
    $member_info_result = $crm->MemberInfo($token,$json_str);
    $Result = json_decode($member_info_result);
    $result = array();
    if($Result->Result == 1){
        $str_json = json_decode($des->decode($Result->StrJson,$clear));
        $result['rt'] = 0;
        $result['member_name'] = $str_json->MemberName;
        $result['address'] = $str_json->Address;
        $result['car_no'] = $str_json->CarNo;
        $result['card_class_name'] = $str_json->CardClassNm;
        $result['card_tp'] = $str_json->CardTP;
        $result['certificate_type_id'] = $str_json->CertificateTypeID;
        $result['email'] = $str_json->Email;
        $result['gender'] = $str_json->Gender;
        $result['mobile'] = $str_json->Mobile;
//         $result['l_other_id'] = $str_json->LOtherID;
        $result['birthday'] = json_decode($str_json->Birthday);
        $result['bonus_curr'] = $str_json->BonusCurr;
        $result['discount_rate'] = $str_json->DiscountRate;
        $result['member_card_no'] = $str_json->MembCardId;
        $result['member_id'] = $str_json->MemberID;
        $result['message'] = $str_json->Message;
        $result['status'] = $str_json->Status;
    }else{
        $result['rt'] = -99;
    }
    return $result;
}

//会员积分历史查询
/* $bouns_info_arr = array(
	'CheckMemberType'=>3,
	'CheckMemberKey'=>'15951610478',
	'PerPage'=>10,
	'PageIndex'=>1
);

/* 会员积分历史查询 */
function get_bonus_history($history_arr){
    global $des;
    global $crm;
    global $clear;
    global $token;
    $json_str = $des->encode(json_encode($history_arr),$clear);
    $bonus_history_result = $crm->GetBonusHistory($token,$json_str);
    $Result = json_decode($bonus_history_result);
    $result = array();
    if($Result->Result == 1){
        $str_json = json_decode($des->decode($Result->StrJson,$clear));
        $result['rt'] = 0;
        $result['bonus_curr'] = $str_json->BonusCurr;
        $result['bonus_history_list'] = $str_json->BonusHistoryDetailsList;
        $result['status'] = $str_json->Status;
    }else{
        $result['rt'] = -99;
    }
    return $result;
}
// print_r(json_encode($bouns_info_arr));
// echo '<br>';
// $json_str = $des->encode(json_encode($bouns_info_arr),$clear);
// $member_info_result = $crm->GetBonusHistory($token,$json_str);
// print_r($member_info_result);
// echo '<br>';
// echo '<br>';
// print_r($des->decode(json_decode($member_info_result)->StrJson,$clear));
// die;

//曾减积分
/* $bouns_info_arr = array(
	'CheckMemberType'=>3,
	'CheckMemberKey'=>'15951610478',
	'StoreID'=>181,
	'Bonus'=>-1.25,
	'ClientTransID'=>'123456',
	'AdjustDesc'=>'测试'
);*/

/* 增减积分 */
function credit_adjust($credit_adjust_arr){
    global $des;
    global $crm;
    global $clear;
    global $token;
    $json_str = $des->encode(json_encode($credit_adjust_arr),$clear);
    $credit_adjust_result = $crm->CreditAdjust($token,$json_str);
    $Result = json_decode($credit_adjust_result);
    $result = array();
    if($Result->Result == 1){
        $str_json = json_decode($des->decode($Result->StrJson,$clear));
        $result['rt'] = 0;
        $result['member_id'] = $json_str->MemberId;
        $result['message'] = $str_json->Message;
        $result['status'] = $str_json->Status;
        $result['bouns_cuur'] = $str_json->BonusCurr;
    }else{
        $result['rt'] = -99;
    }
    return $result;
}


//会员卡绑定
/* $bouns_info_arr = array(
	'Mobile '=>'15952003840',
	'MembCard'=>'789456123',
	'OpenID'=>'222222',
	'OpenIDType'=>1,
	'SourceType'=>1
);
print_r(json_encode($bouns_info_arr));
echo '<br>';
$json_str = $des->encode(json_encode($bouns_info_arr),$clear);
$member_info_result = $crm->MemberJoinCard($token,$json_str);
print_r($member_info_result);
echo '<br>';
echo '<br>';
print_r($des->decode(json_decode($member_info_result)->StrJson,$clear)); */


//会员信息修改
/* $bouns_info_arr = array(
	'CheckMemberType'=>3,
	'CheckMemberKey'=>'15951610478',
	'Name'=>'peipei',
	'Gender'=>1,
	'Birthday'=>'1993-03-30',
	'Address'=>'asda',
	'Email'=>'35164949@qq.com',
	'CardTP'=>'',
	'StoreID'=>181,
	'SourceType'=>1,
	'RefereeMobile'=>''
	
);*/

/* 会员信息修改 */
function update_member_info($update_member_arr){
    global $des;
    global $crm;
    global $clear;
    global $token;
    $json_str = $des->encode(json_encode($update_member_arr),$clear);
    $member_info_result = $crm->ModifyMemberInfo($token,$json_str);
    $Result = json_decode($member_info_result);
    $result = array();
    if($Result->Result == 1){
        $str_json = json_decode($des->decode($Result->StrJson,$clear));
        $result['rt'] = 0;
        $result['member_id'] = $json_str->MemberId;
        $result['message'] = $str_json->Message;
        $result['status'] = $str_json->Status;
    }else{
        $result['rt'] = -99;
    }
    return $result;
}

//积分换购查询
/* $gift_list_arr = array(
 'CheckGiftType'=>1,
 'CheckGiftKey'=>'',
 'ClientSystemTime'=>,
 'StoreID'=>181
);*/

/*获取积分换购列表 */
function get_gift_list($gift_list_arr){
    global $des;
    global $crm;
    global $clear;
    global $token;
    $json_str = $des->encode(json_encode($gift_list_arr),$clear);
    $gift_list_result = $crm->GetGiftList($token,$json_str);
    $Result = json_decode($gift_list_result);
    $result = array();
    if($Result->Result == 1){
        $str_json = json_decode($des->decode($Result->StrJson,$clear));
        $str_json1 = $str_json->Gifts;
        foreach ($str_json1 as $str){
            $map = array();
            $map['rt'] = 0;
            $map['gift_id'] = $str->GiftID;
            $map['gift_desc'] = $str->GiftDesc;
            $map['gift_name'] = $str->GiftName;
            $map['qty'] = $str->Qty;
            $map['spec'] = $str->Spec;
            $map['unit'] = $str->Unit;
            $map['value'] = $str->Value;
            $map['bonus'] = $str->Bonus;
            $map['gift_status'] = $str->GiftStatus;
            $map['receive_start_date'] = $str->ReceiveStartDate;
            $map['receive_end_date'] = $str->ReceiveEndDate;
            $map['exchange_start_date'] = $str->ExchangeStartDate;
            $map['exchange_end_date'] = $str->ExchangeEndDate;
            array_push($result, $map);
        }
    }else{
        $result['rt'] = -99;
    }
    return $result;
}
/* 会员换礼参数 */
// $exchange_arr = array(
//     'CheckMemberType'=>3,
//     'CheckMemberKey'=>'15952003840',
//     'ClientSystemTime'=>date('y-m-d h:s:i',time()),
//     'StoreID'=>181
//     'GiftID'=>
//     'ExchangeQty'=>
// );

/* 会员换礼 */
function exchange_gift($exchange_arr){
    global $des;
    global $crm;
    global $clear;
    global $token;
    $json_str = $des->encode(json_encode($exchange_arr),$clear);
    $exchange_gift_result = $crm->ExchangeGift($token,$json_str);
    $Result = json_decode($exchange_gift_result);
    $result = array();
    if($Result->Result == 1){
        $str_json = json_decode($des->decode($Result->StrJson,$clear));
        $result['rt'] = 0;
        $result['message'] = $str_json->Message;
        $result['server_exchange_id'] = $str_json->ServerExchangeID;
        $result['member_id'] = $str_json->MemberID;
        $result['bonus_prev'] = $str_json->BonusPrev;
        $result['bonus'] = $str_json->Bonus;
        $result['bonus_curr'] = $str_json->BonusCurr;
        $result['status'] = $str_json->Status;
    }else{
        $result['rt'] = -99;
    }
    return $result;
}
/* 会员换礼查询 */
// $exchange_hist_arr = array(
//     'CheckMemberType'=>3,
//     'CheckMemberKey'=>'15952003840',
//     'ClientSystemTime'=>date('Y-m-d h:s:i',time()),
//     'StoreID'=>181
//     'GiftID'=>
//     'ExchangeQty'=>
// );

/* 会员换礼查询 */
function get_exchange_gift_hist($exchange_hist_arr){
    global $des;
    global $crm;
    global $clear;
    global $token;
    $json_str = $des->encode(json_encode($exchange_hist_arr),$clear);
    $exchange_gift_hist_result = $crm->GetExchangeGiftHist($token,$json_str);
    $Result = json_decode($exchange_gift_hist_result);
    $result = array();
    if($Result->Result == 1){
        $str_json = json_decode($des->decode($Result->StrJson,$clear));
        $str_json1 = $str_json->Gifts;
        foreach ($str_json1 as $str){
            $map = array();
            $map['rt'] = 0;
            $map['gift_id'] = $str->Giftid;
            $map['gift_desc'] = $str->GiftDesc;
            $map['gift_name'] = $str->Giftname;
            $map['qty'] = $str->Qty;
            $map['spec'] = $str->Spec;
            $map['unit'] = $str->Unit;
            $map['value'] = $str->Value;
            $map['bonus'] = $str->Bonus;
            $map['gift_status'] = $str->GiftStatus;
            $map['receive_start_date'] = $str->ReceiveStartDate;
            $map['receive_end_date'] = $str->ReceiveEndDate;
            $map['server_exchange_id'] = $str->ServerExchangeID;
            array_push($result, $map);
        }
    }else{
        $result['rt'] = -99;
    }
    return $result;
}


function get_work_key($clear,$public_key){
    openssl_public_encrypt($clear, $crypted, $public_key);
    return base64_encode($crypted);
}

