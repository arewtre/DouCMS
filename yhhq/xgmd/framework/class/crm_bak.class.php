<?php
//ini_set("display_errors", "On");
//error_reporting(E_ALL | E_STRICT);
class crm {
	var $key = "6D4267DF81D83449D851617E";
	var $iv = "78549912";
	var $url = "http://139.196.255.125:8080/members/";
	
	function getMember($openid){
	    $arr = array (
	        "openidType" => 1,
	        "openid"=>$openid
	    );
	    $data = $this->encrypt ( json_encode ( $arr ) );
	    $ret = $this->sendPost ( $this->url . "api/openid/getMemberByOpenid", $data );
	    $json = json_decode ( $ret );
	    if (isset ( $json->resCode )) {
	        return $json->data;
	    }
	}
	
	/**
	 * 根据openid 修改用户信息
	 * @param unknown $openid
	 * @return number
	 */
	function updateMemberInfo($arr){
	    $data = $this->encrypt ( json_encode ( $arr ) );
	    $ret = $this->sendPost ( $this->url . "api/member/updateMemberInfo", $data );
	    $json = json_decode ( $ret );
	    if (isset ( $json->resCode )) {
	        return $json->resCode;
	    }
	    return - 1;
	}
	/**
	 * 根据openid 获取用户信息
	 * @param unknown $openid
	 * @return number
	 */
	function getMemberByOpenid($openid){
	    $arr = array (
	        "openidType" => 1,
	        "openid"=>$openid
	    );
	    $data = $this->encrypt ( json_encode ( $arr ) );
	    $ret = $this->sendPost ( $this->url . "api/openid/getMemberByOpenid", $data );
	    $json = json_decode ( $ret );
	    if (isset ( $json->resCode )) {
			return $json->resCode;
		}
		return - 1;
	}
	
	/**
	 * 修改用户openid值
	 * @param unknown $openid
	 * @param unknown $cardCode
	 * @return number
	 */
	function updateOpenid($openid,$cardCode){
	    $arr = array (
	        "openidType" => 1,
	        "cardCode" => $cardCode,
	        "openid"=>$openid
	    );
	    $data = $this->encrypt ( json_encode ( $arr ) );
	    $ret = $this->sendPost ( $this->url . "api/openid/updateOpenid", $data );
	    //print_r($ret);
	    $json = json_decode ( $ret );
	    if (isset ( $json->resCode )) {
	        return $json->resCode;
	    }
	    return - 1;
	}
	/**
	 * 发送手机短信验证码
	 * 
	 * @param $phone 手机号        	
	 * @return number 0 发送成功 -1发送失败 10011 已发送
	 */
	function test(){
	    echo"111";die;
	}
	
	function sendVerificationCode($phone) {
	    //echo"<pre>";print_r($phone);die;
		$arr = array (
				"phone" => $phone 
		);
		//print_r($arr);die;
		$data = $this->encrypt ( json_encode ( $arr ) );		
		$ret = $this->sendPost ( $this->url . "api/member/sendVerificationCode", $data );
		$json = json_decode ( $ret );
		if (isset ( $json->resCode )) {
			return $json->resCode;
		}
		return - 1;
	}
	/**
	 * 验证短信验证码
	 * @param unknown $phone 手机号
	 * @param unknown $verfCode 短信验证
	 * @return 0 success -1 fail 
	 */
	function checkVerificationCode($phone, $verfCode) {
		$arr = array (
				"phone" => $phone,
				"verfCode" => $verfCode 
		);
		$data = $this->encrypt ( json_encode ( $arr ) );
		$ret = $this->sendPost ( $this->url . "api/member/checkVerificationCode", $data );
// 		$json = json_decode ( $ret );
		return $ret;
	}
	
	/**
	 * 创建新用户
	 * 
	 * @param unknown $phone        	
	 */
	function createMember($phone) {
		$arr = array (
				"phone" => $phone 
		);
		$data = $this->encrypt ( json_encode ( $arr ) );
		//echo"<pre>";print_r($phone);print_r($data);die;
		$ret = $this->sendPost ( $this->url . "api/member/createMember", $data );
		$json = json_decode ($ret );
		if (isset ( $json->resCode )) {
			///return $json->resCode;
			return $ret;
		}
		return - 1;
	}
	private function sendPost($url, $data) {
		$arr = array (
				"userCode" => "qqkj",
				"passwd" => "123456",
				"data" => $data 
		);
		$data_string = json_encode ( $arr );
		$ch = curl_init ();
// 		curl_setopt ( $ch, CURLOPT_PROXY, "http://127.0.0.1:8888" );
		curl_setopt ( $ch, CURLOPT_URL, $url );
		curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
		// post数据
		curl_setopt ( $ch, CURLOPT_POST, 1 ); // post的变量
		curl_setopt ( $ch, CURLOPT_POSTFIELDS, $data_string );
		curl_setopt ( $ch, CURLOPT_HTTPHEADER, array (
				'Content-Type: application/json',
				'Content-Length: ' . strlen ( $data_string ) 
		) );
		$output = curl_exec ( $ch );
		curl_close ( $ch );
		return $output;
	}
	function encrypt($input) {
		$size = mcrypt_get_block_size ( MCRYPT_3DES, MCRYPT_MODE_CBC );
		$input = $this->pkcs5_pad ( $input, $size );
		$key = str_pad ( $this->key, 24, '0' );
		$td = mcrypt_module_open ( MCRYPT_3DES, '', MCRYPT_MODE_CBC, '' );
		if ($this->iv == '') {
			$iv = @mcrypt_create_iv ( mcrypt_enc_get_iv_size ( $td ), MCRYPT_RAND );
		} else {
			$iv = $this->iv;
		}
		@mcrypt_generic_init ( $td, $key, $iv );
		$data = mcrypt_generic ( $td, $input );
		mcrypt_generic_deinit ( $td );
		mcrypt_module_close ( $td );
		$data = base64_encode ( $data );
		return $data;
	}
	function decrypt($encrypted) {
		$encrypted = base64_decode ( $encrypted );
		$key = str_pad ( $this->key, 24, '0' );
		$td = mcrypt_module_open ( MCRYPT_3DES, '', MCRYPT_MODE_CBC, '' );
		if ($this->iv == '') {
			$iv = @mcrypt_create_iv ( mcrypt_enc_get_iv_size ( $td ), MCRYPT_RAND );
		} else {
			$iv = $this->iv;
		}
		$ks = mcrypt_enc_get_key_size ( $td );
		@mcrypt_generic_init ( $td, $key, $iv );
		$decrypted = mdecrypt_generic ( $td, $encrypted );
		mcrypt_generic_deinit ( $td );
		mcrypt_module_close ( $td );
		$y = $this->pkcs5_unpad ( $decrypted );
		return $y;
	}
	function pkcs5_pad($text, $blocksize) {
		$pad = $blocksize - (strlen ( $text ) % $blocksize);
		return $text . str_repeat ( chr ( $pad ), $pad );
	}
	function pkcs5_unpad($text) {
		$pad = ord ( $text {strlen ( $text ) - 1} );
		if ($pad > strlen ( $text )) {
			return false;
		}
		if (strspn ( $text, chr ( $pad ), strlen ( $text ) - $pad ) != $pad) {
			return false;
		}
		return substr ( $text, 0, - 1 * $pad );
	}
	function PaddingPKCS7($data) {
		$block_size = mcrypt_get_block_size ( MCRYPT_3DES, MCRYPT_MODE_CBC );
		$padding_char = $block_size - (strlen ( $data ) % $block_size);
		$data .= str_repeat ( chr ( $padding_char ), $padding_char );
		return $data;
	}
}
