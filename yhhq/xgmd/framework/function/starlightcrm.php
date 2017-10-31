<?php

class Crm {
	private $wsoap;
	const W_WEBURL = 'http://119.255.54.188:8059?wsdl';

	
	public function __construct() {
		try {
			libxml_disable_entity_loader ( false );
			$this->wsoap = new SoapClient ( self::W_WEBURL );
		} catch ( Exception $e ) {
			printf ( "Message = %s/n", $e->__toString () );
		}
	}

	//调用Login方法
	public function Login($LicenseKey,$WrokKey,$ClientInfo,$StrMAC) {
		try {
			$result = $this->wsoap->Login(array(
					'LicenseKey'=>$LicenseKey,
                	'WorkKey'=>$WrokKey,
                	'ClientInfo'=>$ClientInfo,
                	'StrMAC'=>$StrMAC
			));
			return $result->LoginResult;
		} catch ( Exception $e ) {
			printf ( "Message = %s/n", $e->__toString () );
		}
	}
	//会员注册
	public function RegMember($token,$StrJson) {
	    try {
	        $result = $this->wsoap->RegMember(array(
	            'Token'=>$token,
	            'CallTime'=>date("Y-m-d H:i:s"),
	            'StrJson'=>$StrJson,
	            'StrMAC'=>strtoupper(md5($StrJson))
	        ));
	        return $result->RegMemberResult;
	    } catch ( Exception $e ) {
	        printf ( "Message = %s/n", $e->__toString () );
	    }
	}
	//会员身份验证
	public function CheckMember($token,$StrJson) {
	    try {
	        $result = $this->wsoap->CheckMember(array(
	            'Token'=>$token,
	            'CallTime'=>date("Y-m-d H:i:s"),
	            'StrJson'=>$StrJson,
	            'StrMAC'=>strtoupper(md5($StrJson))
	        ));
	        return $result->CheckMemberResult;
	    } catch ( Exception $e ) {
	        printf ( "Message = %s/n", $e->__toString () );
	    }
	}
	//会员信息查询
	public function MemberInfo($token,$StrJson) {
	    try {
	        $result = $this->wsoap->MemberInfo(array(
	            'Token'=>$token,
	            'CallTime'=>date("Y-m-d H:i:s"),
	            'StrJson'=>$StrJson,
	            'StrMAC'=>strtoupper(md5($StrJson))
	        ));
	        return $result->MemberInfoResult;
	    } catch ( Exception $e ) {
	        printf ( "Message = %s/n", $e->__toString () );
	    }
	}
	//会员消费查询
	public function MemberSales($token,$StrJson) {
	    try {
	        $result = $this->wsoap->MemberSales(array(
	            'Token'=>$token,
	            'CallTime'=>date("Y-m-d H:i:s"),
	            'StrJson'=>$StrJson,
	            'StrMAC'=>strtoupper(md5($StrJson))
	        ));
	        return $result->MemberSalesResult;
	    } catch ( Exception $e ) {
	        printf ( "Message = %s/n", $e->__toString () );
	    }
	}
	//会员积分历史查询
	public function GetBonusHistory($token,$StrJson) {
	    try {
	        $result = $this->wsoap->GetBonusHistory(array(
	            'Token'=>$token,
	            'CallTime'=>date("Y-m-d H:i:s"),
	            'StrJson'=>$StrJson,
	            'StrMAC'=>strtoupper(md5($StrJson))
	        ));
	        return $result->GetBonusHistoryResult;
	    } catch ( Exception $e ) {
	        printf ( "Message = %s/n", $e->__toString () );
	    }
	}
	//增减积分
	public function CreditAdjust($token,$StrJson) {
	    try {
	        $result = $this->wsoap->CreditAdjust(array(
	            'Token'=>$token,
	            'CallTime'=>date("Y-m-d H:i:s"),
	            'StrJson'=>$StrJson,
	            'StrMAC'=>strtoupper(md5($StrJson))
	        ));
	        return $result->CreditAdjustResult;
	    } catch ( Exception $e ) {
	        printf ( "Message = %s/n", $e->__toString () );
	    }
	}
	/* //会员卡绑定
	public function MemberJoinCard($token,$StrJson) {
	    try {
	        $result = $this->wsoap->MemberJoinCard(array(
	            'Token'=>$token,
	            'CallTime'=>date("Y-m-d H:i:s"),
	            'StrJson'=>$StrJson,
	            'StrMAC'=>strtoupper(md5($StrJson))
	        ));
	        return $result->MemberJoinCardResult;
	    } catch ( Exception $e ) {
	        printf ( "Message = %s/n", $e->__toString () );
	    }
	} */
	//会员信息修改
	public function ModifyMemberInfo($token,$StrJson) {
	    try {
	        $result = $this->wsoap->ModifyMemberInfo(array(
	            'Token'=>$token,
	            'CallTime'=>date("Y-m-d H:i:s"),
	            'StrJson'=>$StrJson,
	            'StrMAC'=>strtoupper(md5($StrJson))
	        ));
	        return $result->ModifyMemberInfoResult;
	    } catch ( Exception $e ) {
	        printf ( "Message = %s/n", $e->__toString () );
	    }
	}
	//积分换购查询
	public function GetGiftList($token,$StrJson) {
	    try {
	        $result = $this->wsoap->GetGiftList(array(
	            'Token'=>$token,
	            'CallTime'=>date("Y-m-d H:i:s"),
	            'StrJson'=>$StrJson,
	            'StrMAC'=>strtoupper(md5($StrJson))
	        ));
	        return $result->GetGiftListResult;
	    } catch ( Exception $e ) {
	        printf ( "Message = %s/n", $e->__toString () );
	    }
	}
	//会员换礼
	public function ExchangeGift($token,$StrJson) {
	    try {
	        $result = $this->wsoap->ExchangeGift(array(
	            'Token'=>$token,
	            'CallTime'=>date("Y-m-d H:i:s"),
	            'StrJson'=>$StrJson,
	            'StrMAC'=>strtoupper(md5($StrJson))
	        ));
	        return $result->ExchangeGiftResult;
	    } catch ( Exception $e ) {
	        printf ( "Message = %s/n", $e->__toString () );
	    }
	}
	//会员换礼查询
	public function GetExchangeGiftHist($token,$StrJson) {
	    try {
	        $result = $this->wsoap->GetExchangeGiftHist(array(
	            'Token'=>$token,
	            'CallTime'=>date("Y-m-d H:i:s"),
	            'StrJson'=>$StrJson,
	            'StrMAC'=>strtoupper(md5($StrJson))
	        ));
	        return $result->GetExchangeGiftHistResult;
	    } catch ( Exception $e ) {
	        printf ( "Message = %s/n", $e->__toString () );
	    }
	}
}