<?php
namespace Api\Controller;

use Think\Controller;

class WxXcxController extends Controller {
    public function rabbit(){
        $this->ajaxReturn(array("data"=>"欢迎来到小程序"));
    }
    
    public function sendMsg(){
        header('location:'.__ROOT__.'/wxxcx/demo.php'); 
        //include './wxxcx/demo.php';
    }
    
    public function sendMsg2(){
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];       
        $token = "doudoubao";
        $tmpArr = array($token, $timestamp, $nonce);
        sort($tmpArr, SORT_STRING);
        $tmpStr = implode( $tmpArr );
        $tmpStr = sha1( $tmpStr );
        
        if( $tmpStr == $signature ){
            return true;
        }else{
            return false;
        }
    }
}