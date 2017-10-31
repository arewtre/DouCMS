<?php
/**
 * 
 * 微信支付API异常类
 * @author widyhu
 *
 */
class WxPayException extends Exception {
	function __construct($message){
		echo $message;
	}
	public function errorMessage()
	{
		return $this->getMessage();
	}
}
