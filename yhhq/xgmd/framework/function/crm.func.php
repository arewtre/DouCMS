<?php
defined('IN_IA') or exit('Access Denied');

$crm = pdo_fetch("select * from ".tablename('port')." where type = :type",array(':type'=>1));
// $url = 'http://119.255.54.188:8089';
//输入参数：MemberName=会员姓名，MobilePhone=会员电话
function login_member($param) {
    header("Content-Type: text/html; charset=utf-8");
    if($GLOBALS['crm']['is_open'] == 0){
        $data = array(
            'error_code'=>'1',
            'error_content'=>'请求接口路径错误'
        );
        return $data;
    }else{
        $soap = new SoapClient($GLOBALS['crm']['url'].'?wsdl');
    }
    $fun = pdo_fetch("select * from ".tablename('port_list')." where pid=:pid and id=:id",array(":pid"=>$GLOBALS['crm']['id'],':id'=>2));
    if($fun['is_open'] == 0){
        $data = array(
            'error_code'=>'1',
            'error_content'=>'请求接口方法错误'
        );
        return $data;
    }else{
        $result = $soap->__soapCall($fun['value'], array('paramters'=>$param));
    }
    $loginMemberResult= simplexml_load_string($result->LoginMemberResult);
    return $loginMemberResult;
//     $data = array(
//         'LoginRe'=>$loginMemberResult->LoginRe,
//         'MemberId' => $loginMemberResult->MemberId,
//         'CardClassName' => $loginMemberResult->CardClassName,
//         'BonusTotal' => $loginMemberResult->BonusTotal,
//         'Fail' => $loginMemberResult->Fail
//     );
//     return $data;
}

//输入参数：MemberName=会员姓名,CredentialID=证件号码,CredentialType=证件类型,MobilePhone=移动电话,Birthday=出生日期
function new_app_member($param) {
    header("Content-Type: text/html; charset=utf-8");
    if($GLOBALS['crm']['is_open'] == 0){
        $data = array(
            'error_code'=>'1',
            'error_content'=>'请求接口路径错误'
        );
        return $data;
    }else{
        $soap = new SoapClient($GLOBALS['crm']['url'].'?wsdl');
    }
    $fun = pdo_fetch("select * from ".tablename('port_list')." where pid=:pid and id=:id",array(":pid"=>$GLOBALS['crm']['id'],':id'=>1));
    if($fun['is_open'] == 0){
        $data = array(
            'error_code'=>'1',
            'error_content'=>'请求接口方法错误'
        );
        return $data;
    }else{
        $result = $soap->__soapCall($fun['value'], array('paramters'=>$param));
    }
    $newAppMemberResult= simplexml_load_string($result->NewAppMemberResult);
    return $newAppMemberResult;
//     $data = array(
//         'LoginRe'=>$newAppMemberResult->LoginRe,
//         'MemberId' => $newAppMemberResult->MemberId,
//         'CardClassName' => $newAppMemberResult->CardClassName,
//         'BonusTotal' => $newAppMemberResult->BonusTotal,
//         'Fail' => $newAppMemberResult->Fail
//     );
//     return $data;
    
}

//会员信息修改
//输入参数：MemberID=会员号，MemberName=会员姓名，Sex=性别，CredentialID=证件号码，CredentialType=证件类型，MobilePhone=移动电话，Birthday=出生日期
function update_app_member($memberID,$memberName,$sex,$credentialID,$credentialType,$mobliePhone,$birthday) {
    header("Content-Type: text/html; charset=utf-8");
    if($GLOBALS['crm']['is_open'] == 0){
        $data = array(
            'error_code'=>'1',
            'error_content'=>'请求接口路径错误'
        );
        return $data;
    }else{
        $soap = new SoapClient($GLOBALS['crm']['url'].'?wsdl');
    }
    $fun = pdo_fetch("select * from ".tablename('port_list')." where pid=:pid and id=:id",array(":pid"=>$GLOBALS['crm']['id'],':id'=>3));
    if($fun['is_open'] == 0){
        $data = array(
            'error_code'=>'1',
            'error_content'=>'请求接口方法错误'
        );
        return $data;
    }else{
        $param = array(
            'MemberID'=>$memberID,
            'MemberName'=>$memberName,
            'Sex'=>$sex,
            'CredentialID'=>$credentialID,
            'CredentialType'=>$credentialType,
            'MobilePhone'=>$mobliePhone,
            'Birthday'=>$birthday
        );
        $result = $soap->__soapCall($fun['value'], array('paramters'=>$param));
    }
    $updateAppMemberResult= simplexml_load_string($result->UpdateAppMemberResult);
    return $updateAppMemberResult;
}

//积分明细查询
//输入参数：MobilePhone=移动电话，StartDate=查询开始日期，EndDate=查询结束日期，pageNumber=页码，Number=每页数据条数
function get_bous_history($mobliePhone,$startDate,$endDate,$pageNumber,$number) {
    header("Content-Type: text/html; charset=utf-8");
    if($GLOBALS['crm']['is_open'] == 0){
        $data = array(
            'error_code'=>'1',
            'error_content'=>'请求接口路径错误'
        );
        return $data;
    }else{
        $soap = new SoapClient($GLOBALS['crm']['url'].'?wsdl');
    }
    $fun = pdo_fetch("select * from ".tablename('port_list')." where pid=:pid and id=:id",array(":pid"=>$GLOBALS['crm']['id'],':id'=>5));
    if($fun['is_open'] == 0){
        $data = array(
            'error_code'=>'1',
            'error_content'=>'请求接口方法错误'
        );
        return $data;
    }else{
        $param = array(
            'MobilePhone'=>$mobliePhone,
            'StartDate'=>$startDate,
            'EndDate'=>$endDate,
            'PageNumber'=>$pageNumber,
            'Number'=>$number
        );
        $result = $soap->__soapCall($fun['value'], array('paramters'=>$param));
    }
    $getBousHistoryResult= simplexml_load_string($result->GetBonusHistoryResult);
    return $getBousHistoryResult;
}

//积分余额查询
//输入参数：MobilePhone=手机号
function get_bonus_total($mobilePhone) {
    header("Content-Type: text/html; charset=utf-8");
    if($GLOBALS['crm']['is_open'] == 0){
        $data = array(
            'error_code'=>'1',
            'error_content'=>'请求接口路径错误'
        );
        return $data;
    }else{
        $soap = new SoapClient($GLOBALS['crm']['url'].'?wsdl');
    }
    $fun = pdo_fetch("select * from ".tablename('port_list')." where pid=:pid and id=:id",array(":pid"=>$GLOBALS['crm']['id'],':id'=>6));
    if($fun['is_open'] == 0){
        $data = array(
            'error_code'=>'1',
            'error_content'=>'请求接口方法错误'
        );
        return $data;
    }else{
        $param = array(
            'MobilePhone'=>$mobilePhone
        );
        $result = $soap->__soapCall($fun['value'], array('paramters'=>$param));
    }
    $getBonusTotalResult= simplexml_load_string($result->GetBonusTotalResult);
    return $getBonusTotalResult;
}

//积分明细查询(根据积分变动类型查询)
//输入参数：BousType=积分变动类型，StartDate=查询开始日期，EndDate=查询结束日期
function get_bonus_by_type($bousType,$startDate,$endDate) {
    header("Content-Type: text/html; charset=utf-8");
    if($GLOBALS['crm']['is_open'] == 0){
        $data = array(
            'error_code'=>'1',
            'error_content'=>'请求接口路径错误'
        );
        return $data;
    }else{
        $soap = new SoapClient($GLOBALS['crm']['url'].'?wsdl');
    }
    $fun = pdo_fetch("select * from ".tablename('port_list')." where pid=:pid and id=:id",array(":pid"=>$GLOBALS['crm']['id'],':id'=>7));
    if($fun['is_open'] == 0){
        $data = array(
            'error_code'=>'1',
            'error_content'=>'请求接口方法错误'
        );
        return $data;
    }else{
        $param = array(
            'BousType'=>$bousType,
            'StartDate'=>$startDate,
            'EndDate'=>$endDate
        );
        $result = $soap->__soapCall($fun['value'], array('paramters'=>$param));
    }
    $getBousByTypeResult= simplexml_load_string($result->GetBousByTypeResult);
    return $getBousByTypeResult;
}
//积分变动
//输入参数：ReceiptID=识别码，UpdateType=积分变动类型(1=增加，2=减少)，MemberID=会员号，TransDate=积分日期，BounsAmt=积分值，BonusType=积分类型，BonusNote=积分变动原因
function update_bonus($receiptID,$updateType,$memberID,$transDate,$bounsAmt,$bonusType,$bonusNote) {
    header("Content-Type: text/html; charset=utf-8");
    if($GLOBALS['crm']['is_open'] == 0){
        $data = array(
            'error_code'=>'1',
            'error_content'=>'请求接口路径错误'
        );
        return $data;
    }else{
        $soap = new SoapClient($GLOBALS['crm']['url'].'?wsdl');
    }
    $fun = pdo_fetch("select * from ".tablename('port_list')." where pid=:pid and id=:id",array(":pid"=>$GLOBALS['crm']['id'],':id'=>4));
    if($fun['is_open'] == 0){
        $data = array(
            'error_code'=>'1',
            'error_content'=>'请求接口方法错误'
        );
        return $data;
    }else{
        $param = array(
            'ReceiptID'=>$receiptID,
            'UpdateType'=>$updateType,
            'MemberID'=>$memberID,
            'TransDate'=>$transDate,
            'BounsAmt'=>$bounsAmt,
            'BonusType'=>$bonusType,
            'BonusNote'=>$bonusNote
        );
        $result = $soap->__soapCall($fun['value'], array('paramters'=>$param));
    }
    $updateBonusResult= simplexml_load_string($result->UpdateBonusResult);
    return $updateBonusResult;
}