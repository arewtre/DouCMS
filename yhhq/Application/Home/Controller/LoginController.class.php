<?php
namespace Home\Controller;
class LoginController extends BaseController {
	
	public function login(){
		$Qqconnect = new \Common\Lib\Qqconnect();
		$Qqconnect->getAuthCode();
	}
}