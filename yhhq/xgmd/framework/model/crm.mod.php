<?php
defined('IN_IA') or exit('Access Denied');

$crm = pdo_fetch("select * from ".tablename('port')." where type = :type",array(':type'=>1));

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
    $data = array(
        'LoginRe'=>$loginMemberResult->LoginRe,
        'MemberId' => $loginMemberResult->MemberId,
        'CardClassName' => $loginMemberResult->CardClassName,
        'BonusTotal' => $loginMemberResult->BonusTotal, 
        'Fail' => $loginMemberResult->Fail    
    );
    return $data;
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
    $data = array(
        'LoginRe'=>$newAppMemberResult->LoginRe,
        'MemberId' => $newAppMemberResult->MemberId,
        'CardClassName' => $newAppMemberResult->CardClassName,
        'BonusTotal' => $newAppMemberResult->BonusTotal,
        'Fail' => $newAppMemberResult->Fail
    );
    return $data;
}
//输入参数：MemberName=会员姓名,CredentialID=证件号码,CredentialType=证件类型,MobilePhone=移动电话,Birthday=出生日期
function update_app_member($param) {
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
        $result = $soap->__soapCall($fun['value'], array('paramters'=>$param));
    }
    $newAppMemberResult= simplexml_load_string($result->UpdateAppMemberResult);
    $data = array(
        'LoginRe'=>$newAppMemberResult->LoginRe,
        'MemberId' => $newAppMemberResult->MemberId,
        'Fail' => $newAppMemberResult->Fail
    );
    return $data;
}