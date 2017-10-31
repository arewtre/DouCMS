<?php
class crm {
private $wsoap;
	private $websoap;
	private $awssoap;
	
	const AWS_WEBURL = 'http://221.178.202.148:9000/frdif/n_frdif.asmx?wsdl';
	const CALL_USER = "test";
	const CALL_PASSWD = "00B54E5ADD61AC9C";
	const CALL_CMDID = "8005";

	public function __construct() {
		try {
			libxml_disable_entity_loader ( false );
			$this->awssoap = new SoapClient ( self::AWS_WEBURL );
		} catch ( Exception $e ) {
			//printf ( "Message = %s/n", $e->__toString () );
		    header('Location: http://www.xiaooo.club/mlgc/error.html');
			//return -1;
		    die;
		}
	}
			
	public function CreateMemberEform($data) {
	    try {
	        $result = $this->awssoap->processdata ( array (
	            'userid' => self::CALL_USER,
	            'password' => self::CALL_PASSWD,
	            'cmdid' => self::CALL_CMDID,
	            'inputpara'=>$data,
	            'outputpara'=>"",
	            'rtn'=>0,
	            'errormsg'=>"",
	        ) );
	        
	        //pre($result);
	        //libxml_disable_entity_loader ( true );
	        //$values = json_decode ( json_encode ( simplexml_load_string ( $result->processdataResult->any, 'SimpleXMLElement', LIBXML_NOCDATA ) ), true );
	        return $result;
	    } catch ( Exception $e ) {
	        printf ( "Message = %s/n", $e->__toString () );
	    }
	}
	public function bonusAdjustmentByDocno($vipcode, $docNo, $bonusPoint) {
		if ($bonusPoint == 0)
			return false;
		$strAdjustReason = 'K01';
		if ($bonusPoint > 0) {
			$strAdjustReason = "K02";
		}
		$params = array (
				'strCallUserCode' => self::CALL_USER,
				'strCallPassword' => self::CALL_PASSWD,
				'strMemberCode' => $vipcode,
				'strDocno' => $docNo,
				'strBonusPoint' => $bonusPoint,
				'strAdjustReason' => $strAdjustReason 
		);
		try {
			$result = $this->awssoap->bonusAdjustmentByDocno ( $params );
			libxml_disable_entity_loader ( true );
			$values = json_decode ( json_encode ( simplexml_load_string ( $result->BonusAdjustmentByDocnoResult->any, 'SimpleXMLElement', LIBXML_NOCDATA ) ), true );
			return $values;
		} catch ( Exception $e ) {
			printf ( "Message = %s/n", $e->__toString () );
		}
	}
}
