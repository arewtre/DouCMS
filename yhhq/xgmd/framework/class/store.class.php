<?php
class store {
	var $key = "6D4267DF81D83449D851617E";
	var $iv = "78549912";
	//var $url = "http://192.168.1.190:9821/tangdao/";
	var $url = "http://api.tangdao637.com:8080/tangdao/";

	/**
	 * 获取楼层信息 
	 * @param unknown $openid
	 * @return number
	 */
	function getFloors(){
	    $ret = $this->sendPost ($this->url . "api/store/getFloors");
	    $json = json_decode ( $ret );
	    if (isset ( $json->resCode )) {
			return object2array($json->data);
		}
		return - 1;
	}
	
	/**
	 * 获取区域信息
	 * @param unknown $openid
	 * @return number
	 */
	function getAreas(){
	    $ret = $this->sendPost ($this->url . "api/store/getAreas");
	    $json = json_decode ( $ret );
	    if (isset ( $json->resCode )) {
	        return object2array($json->data);
	    }
	    return - 1;
	}
	/**
	 * 获取所有筛选条件 返回数据
	 * @param unknown $openid
	 * @return number
	 */
	function getSelectType(){
	    $ret = $this->sendPost ( $this->url . "api/store/getSelectType");
	    $json = json_decode ( $ret );
	    if (isset ( $json->resCode )) {
	        return object2array($json->data);
	    }
	}
	/**
	 * 获取所有美食分类
	 * @param unknown $openid
	 * @return number
	 */
	function getFoodCategorys(){
	    $ret = $this->sendPost ( $this->url . "api/store/getFoodCategorys");
	    $json = json_decode ($ret );
	    if (isset ( $json->resCode )) {
	        return object2array($json->data);
	    }
	}
	
	/**
	 * 获取所有娱乐分类
	 * @param unknown $openid
	 * @return number
	 */
	function getRelaxCategorys(){
	    $ret = $this->sendPost ( $this->url . "api/store/getRelaxCategorys");
	    $json = json_decode ($ret );
	    if (isset ( $json->resCode )) {
	        return object2array($json->data);
	    }
	}
	
	/**
	 * 获取所有时尚分类
	 * @param unknown $openid
	 * @return number
	 */
	function getFashionCategorys(){
	    $ret = $this->sendPost ( $this->url . "api/store/getFashionCategorys");
	    $json = json_decode ($ret );
	    if (isset ( $json->resCode )) {
	        return object2array($json->data);
	    }
	}
	
	/**
	 * 获取所有文化分类
	 * @param unknown $openid
	 * @return number
	 */
	function getCultureCategorys(){
	    $ret = $this->sendPost ( $this->url . "api/store/getCultureCategorys");
	    $json = json_decode ($ret );
	    if (isset ( $json->resCode )) {
	        return object2array($json->data);
	    }
	}
	
	/**
	 * 获取所有生活分类
	 * @param unknown $openid
	 * @return number
	 */
	function getLifeCategorys(){
	    $ret = $this->sendPost ( $this->url . "api/store/getLifeCategorys");
	    $json = json_decode ($ret );
	    if (isset ( $json->resCode )) {
	        return object2array($json->data);
	    }
	}
	/**
	 * 获取美食商户
	 * @param unknown $categoryId,$floorId,$labelId,$selectType,$page,$size
	 * @return number
	 */
	function getFoodStores($categoryId,$floorId,$areaId,$labelId,$selectType,$page,$size){
	    $arr = array (
	        "categoryId" => $categoryId,
	        "floorId" => $floorId,
	        "areaId" => $areaId,
	        "labelId"=>$labelId,
	        "selectType" =>$selectType,
	        "page" => $page,
	        "size"=>$size
	    );
	    $data = $this->encrypt ( json_encode ( $arr ) );
	    $ret = $this->sendPost ( $this->url . "api/store/getFoodStores", $data);
	    $json = json_decode ($ret );
	    if (isset ( $json->resCode )) {
	        return object2array($json->data);
	    }
	}
	
	/**
	 * 获取时尚商户
	 * @param $categoryId,$floorId,$labelId,$selectType,$page,$size
	 * @return number
	 */
	function getFashionStores($categoryId,$floorId,$areaId,$labelId,$selectType,$page,$size){
	    $arr = array (
	        "categoryId" => $categoryId,
	        "floorId" => $floorId,
	        "areaId" => $areaId,
	        "labelId"=>$labelId,
	        "selectType" =>$selectType,
	        "page" => $page,
	        "size"=>$size
	    );
	    $data = $this->encrypt ( json_encode ( $arr ) );
	    $ret = $this->sendPost ( $this->url . "api/store/getFashionStores", $data);
	    $json = json_decode ($ret );
	    if (isset ( $json->resCode )) {
	        return object2array($json->data);
	    }
	}
	
	/**
	 * 获取娱乐商户
	 * @param $categoryId,$floorId,$labelId,$selectType,$page,$size
	 * @return number
	 */
	function getRelaxStores($categoryId,$floorId,$areaId,$labelId,$selectType,$page,$size){
	    $arr = array (
	        "categoryId" => $categoryId,
	        "floorId" => $floorId,
	        "areaId" => $areaId,
	        "labelId"=>$labelId,
	        "selectType" =>$selectType,
	        "page" => $page,
	        "size"=>$size
	    );
	    $data = $this->encrypt ( json_encode ( $arr ) );
	    $ret = $this->sendPost ( $this->url . "api/store/getRelaxStores", $data);
	    $json = json_decode ($ret );
	    if (isset ( $json->resCode )) {
	        return object2array($json->data);
	    }
	}
	
	/**
	 * 获取文化商户
	 * @param $categoryId,$floorId,$labelId,$selectType,$page,$size
	 * @return number
	 */
	function getCultureStores($categoryId,$floorId,$areaId,$labelId,$selectType,$page,$size){
	    $arr = array (
	        "categoryId" => $categoryId,
	        "floorId" => $floorId,
	        "areaId" => $areaId,
	        "labelId"=>$labelId,
	        "selectType" =>$selectType,
	        "page" => $page,
	        "size"=>$size
	    );
	    $data = $this->encrypt ( json_encode ( $arr ) );
	    $ret = $this->sendPost ( $this->url . "api/store/getCultureStores", $data);
	    $json = json_decode ($ret );
	    if (isset ( $json->resCode )) {
	        return object2array($json->data);
	    }
	}
	
	/**
	 * 获取生活商户
	 * @param $categoryId,$floorId,$labelId,$selectType,$page,$size
	 * @return number
	 */
	function getLifeStores($categoryId,$floorId,$areaId,$labelId,$selectType,$page,$size){
	    $arr = array (
	        "categoryId" => $categoryId,
	        "floorId" => $floorId,
	        "areaId" => $areaId,
	        "labelId"=>$labelId,
	        "selectType" =>$selectType,
	        "page" => $page,
	        "size"=>$size
	    );
	    $data = $this->encrypt ( json_encode ( $arr ) );
	    $ret = $this->sendPost ( $this->url . "api/store/getLifeStores", $data);
	    $json = json_decode ($ret );
	    if (isset ( $json->resCode )) {
	        return object2array($json->data);
	    }
	}
	/**
	 * 获取商户详情
	 * @param $storeId
	 * @return number
	 */
	function getStoreById($storeId){
	    $arr = array (
	        "id" => $storeId,
	    );
	    $data = $this->encrypt ( json_encode ( $arr ) );
	    $ret = $this->sendPost ( $this->url . "api/store/getStoreById", $data);
	    $json = json_decode ($ret );
	    if (isset ( $json->resCode )) {
	        return object2array($json->data);
	    }
	}
	
	/**
	 * 获取个人是否收藏该商户
	 * @param $storeId
	 * @return number
	 */
	function checkStoreCollect($cardCode,$storeId){
	    $arr = array (
	        "cardCode"=>$cardCode,
	        "id" => $storeId,
	    );
	    $data = $this->encrypt ( json_encode ( $arr ) );
	    $ret = $this->sendPost ( $this->url . "api/collect/checkStoreCollect", $data);
	    $json = json_decode ($ret );
	    if (isset ( $json->resCode )) {
	        return object2array($json->data);
	    }
	}
	/**
	 * 获取所有美食标签
	 * @param unknown $openid
	 * @return number
	 */
	function getFoodLabels(){
	    $ret = $this->sendPost ( $this->url . "api/store/getFoodLabels");
	    $json = json_decode ($ret );
	    if (isset ( $json->resCode )) {
	        return object2array($json->data);
	    }
	}
	
	/**
	 * 获取所有时尚标签
	 * @param unknown $openid
	 * @return number
	 */
	function getFashionLabels(){
	    $arr = array ();
	    $data = $this->encrypt ( json_encode ( $arr ) );
	    $ret = $this->sendPost ( $this->url . "api/store/getFashionLabels", $data);
	    $json = json_decode ($ret );
	    if (isset ( $json->resCode )) {
	        return object2array($json->data);
	    }
	}
	
	/**
	 * 获取所有娱乐标签
	 * @param unknown $openid
	 * @return number
	 */
	function getRelaxLabels(){
	    $arr = array ();
	    $data = $this->encrypt ( json_encode ( $arr ) );
	    $ret = $this->sendPost ( $this->url . "api/store/getRelaxLabels", $data);
	    $json = json_decode ($ret );
	    if (isset ( $json->resCode )) {
	        return object2array($json->data);
	    }
	}
	
	/**
	 * 收藏商户
	 * @param unknown $openid
	 * @return number
	 */
	function addStoreCollect($cardCode,$storeId){
	    $arr = array (
	        "cardCode" => $cardCode,
	        "id" => $storeId,
	    );
	    $data = $this->encrypt ( json_encode ( $arr ) );
	    $ret = $this->sendPost ( $this->url . "api/collect/addStoreCollect", $data);
	    $json = json_decode ($ret );
	    if (isset ( $json->resCode )) {
	        return object2array($json->data);
	    }
	}
	
	/**
	 * 取消收藏
	 * @param unknown $openid
	 * @return number
	 */
	function removeStoreCollect($cardCode,$storeId){
	    $arr = array (
	        "cardCode" => $cardCode,
	        "idStr" => $storeId,
	    );
	    $data = $this->encrypt ( json_encode ( $arr ) );
	    $ret = $this->sendPost ( $this->url . "api/collect/removeStoreCollect", $data);
	    $json = json_decode ($ret );
	    if (isset ( $json->resCode )) {
	        return object2array($json->data);
	    }
	}
	
	/**
	 * 获取用户收藏商户
	 * @param unknown $openid
	 * @return number
	 */
	function getCollectStores($cardCode,$type,$page,$size){
	    $arr = array (
	        "cardCode" => $cardCode,
	        "type" => $type,
	        "page" => $page,
	        "size" => $size,
	        "paginationType"=>0,
	    );
	    $data = $this->encrypt ( json_encode ( $arr ) );
	    $ret = $this->sendPost ( $this->url . "api/store/getCollectStores", $data);
	    $json = json_decode ($ret );
	    if (isset ( $json->resCode )) {
	        return object2array($json->data);
	    }
	}
	
	/**
	 * 获取用户收藏的活动
	 * @param unknown $openid
	 * @return number
	 */
	function getCollectPromotion($cardCode,$page,$size){
	    $arr = array (
	        "cardCode" => $cardCode,
	        "page" => $page,
	        "size" => $size,
	        "paginationType"=>0,
	    );
	    $data = $this->encrypt ( json_encode ( $arr ) );
	    $ret = $this->sendPost ( $this->url . "api/activity/getCollectPromotion", $data);
	    $json = json_decode ($ret );
	    //pre($json);
	    if (isset ( $json->resCode )) {
	        return object2array($json->data);
	    }
	}
	
	/**
	 * 活动报名
	 * @param unknown $openid
	 * @return number
	 */
	function applyActivity($cardCode,$activityId,$name,$linkPhone){
	    $arr = array (
	        "cardCode" => $cardCode,
	        "activityId" => $activityId,
	        "name" => $name,
	        "linkPhone" => $linkPhone,
	    );
	    $data = $this->encrypt ( json_encode ( $arr ) );
	    $ret = $this->sendPost ( $this->url . "api/activity/applyActivity", $data);
	    $json = json_decode ($ret );
	    if (isset ( $json->resCode )) {
	        return $json->data;
	    }
	}
	
	/**
	 * 获取活动列表
	 * @param unknown $openid
	 * @return number
	 */
	function getActivityList($cardCode,$page,$size){
	    $arr = array (
	        "cardCode" => $cardCode,
	        "page" => $page,
	        "size" => $size,
	    );
	    $data = $this->encrypt ( json_encode ( $arr ) );
	    $ret = $this->sendPost ( $this->url . "api/activity/getActivityList", $data);
	    $json = json_decode ($ret );
	    if (isset ( $json->resCode )) {
	        return object2array($json->data);
	    }
	}
	
	/**
	 * 获取活动详情
	 * @param unknown $openid
	 * @return number
	 */
	function getActivityById($id){
	    $arr = array (
	        "id" => $id,
	    );
	    $data = $this->encrypt ( json_encode ( $arr ) );
	    $ret = $this->sendPost ( $this->url . "api/activity/getActivityById", $data);
	    $json = json_decode ($ret );
	    if (isset ( $json->resCode )) {
	        return object2array($json->data);
	    }
	}
	
	/**
	 * 收藏活动
	 * @param unknown $openid
	 * @return number
	 */
	function addPromotionCollect($cardCode,$id){
	    $arr = array (
	        "cardCode" => $cardCode,
	        "id" => $id,
	    );
	    $data = $this->encrypt ( json_encode ( $arr ) );
	    $ret = $this->sendPost ( $this->url . "api/collect/addPromotionCollect", $data);
	    $json = json_decode ($ret );
	    if (isset ( $json->resCode )) {
	        return $json->resCode;
	    }
	}
	
	
	/**
	 * 取消收藏活动
	 * @param unknown $openid
	 * @return number
	 */
	function removePromotionCollect($cardCode,$id){
	    $arr = array (
	        "cardCode" => $cardCode,
	        "idStr" => $id,
	    );
	    $data = $this->encrypt ( json_encode ( $arr ) );
	    $ret = $this->sendPost ( $this->url . "api/collect/removePromotionCollect", $data);
	    $json = json_decode ($ret );
	    if (isset ( $json->resCode )) {
	        return $json->resCode;
	    }
	}
	
	/**
	 * 检查活动收藏状态
	 * @param unknown $openid
	 * @return number
	 */
	function checkPromotionCollect($cardCode,$id){
	    $arr = array (
	        "cardCode" => $cardCode,
	        "id" => $id,
	    );
	    $data = $this->encrypt ( json_encode ( $arr ) );
	    $ret = $this->sendPost ( $this->url . "api/collect/checkPromotionCollect", $data);
	    $json = json_decode ($ret );
	    if (isset ( $json->resCode )) {
	        return $json->data;
	    }
	} 
	/**
	 * 获取优惠券列表
	 * @param unknown $type  1  大家都在领，  2  最值得领，  0所有
	 * @return number
	 */
	function getCouponList($cardCode,$type,$page,$size){
	    $arr = array (
	        "cardCode" => $cardCode,
	        "type" => $type,
	        "page" => $page,
	        "size" => $size,
	    );
	    $data = $this->encrypt ( json_encode ( $arr ) );
	    $ret = $this->sendPost ( $this->url . "api/coupon/getCouponList", $data);
	    $json = json_decode ($ret );
	    if (isset ( $json->resCode )) {
	        return object2array($json->data);
	    }
	}
	
	/**
	 * 领取优惠券
	 * @param unknown $cardCode  
	 * @return number
	 */
	function addUserCouponCode($cardCode,$couponId){
	    $arr = array (
	        "cardCode" => $cardCode,
	        "couponId" => $couponId,
	    );
	    $data = $this->encrypt ( json_encode ( $arr ) );	    
	    $ret = $this->sendPost ( $this->url . "api/coupon/addUserCouponCode", $data);
	    $json = json_decode ($ret );
	    if (isset ( $json->resCode )) {	        
	        return object2array($json->resCode);
	    }
	}
	
	/**
	 * 获取商户优惠券
	 * @param unknown $cardCode
	 * @return number
	 */
	function getStoreCouponList($storeId,$page,$size){
	    $arr = array (
	        "storeId" => $storeId,
	        "page" => $page,
	        "size" => $size,
	    );
	    $data = $this->encrypt ( json_encode ( $arr ) );
	    $ret = $this->sendPost ( $this->url . "api/coupon/getStoreCouponList", $data);
	    $json = json_decode ($ret );
	    if (isset ( $json->resCode )) {
	        return object2array($json->data);
	    }
	}
	
	/**
	 * 获取优惠券详情
	 * @param unknown $cardCode
	 * @return number
	 */
	function getCouponInfo($couponId){
	    $arr = array (
	        "couponId" => $couponId,
	    );
	    $data = $this->encrypt ( json_encode ( $arr ) );
	    $ret = $this->sendPost ( $this->url . "api/coupon/getCouponInfo", $data);
	    $json = json_decode ($ret );
	    if (isset ( $json->resCode )) {
	        return object2array($json->data);
	    }
	}
	
	/**
	 * 获取券包优惠券详情
	 * @param unknown $cardCode
	 * @return number
	 */
	function getCouponCodeInfo($codeId,$cardCode){
	    $arr = array (
	        "codeId" => $codeId,
	        "cardCode" =>$cardCode
	    );
	    $data = $this->encrypt ( json_encode ( $arr ) );
	    $ret = $this->sendPost ( $this->url . "api/coupon/getCouponCodeInfo", $data);
	    $json = json_decode ($ret );
	    if (isset ( $json->resCode )) {
	        return object2array($json->data);
	    }
	}
	/**
	 * 获取券包列表
	 * @param unknown $cardCode
	 * @return number
	 */
	function getMyCouponList($cardCode,$state,$page,$size){
	    $arr = array (
	        "cardCode" => $cardCode,
	        "state" => $state,
	        "page" => $page,
	        "size" => $size,
	    );
	    $data = $this->encrypt ( json_encode ( $arr ) );
	    $ret = $this->sendPost ( $this->url . "api/coupon/getMyCouponList", $data);
	    $json = json_decode ($ret );
	    if (isset ( $json->resCode )) {
	        return object2array($json->data);
	    }
	}
	/**
	 * 获取用户消息列表
	 * @param unknown $cardCode
	 * @return number
	 */
	function getNoteList($cardCode,$page,$size){
	    $arr = array (
	        "cardCode" => $cardCode,
	        "paginationType"=>0,
	        "page" => $page,
	        "size" => $size,
	    );
	    $data = $this->encrypt ( json_encode ( $arr ) );
	    $ret = $this->sendPost ( $this->url . "api/note/getNoteList", $data);
	    $json = json_decode ($ret );
	    if (isset ( $json->resCode )) {
	        return object2array($json->data);
	    }
	}
	
	/**
	 * 获取积分兑换比例
	 * @param leftScale 积分比例     rightScale 金币比例
	 * @return number
	 */
	function getCentScale(){
	    $ret = $this->sendPost ( $this->url . "api/scale/getCentScale");
	    $json = json_decode ($ret );
	    if (isset ( $json->resCode )) {
	        return object2array($json->data);
	    }
	}
	
	/**
	 * 获取积分兑换金币
	 * @param cardCode cent
	 * @return number
	 */
	function exchangeCent($cardCode,$cent){
	    $arr = array (
	        "cardCode" => $cardCode,
	        "cent"=>$cent,
	    );
	    $data = $this->encrypt ( json_encode ( $arr ) );
	    $ret = $this->sendPost ( $this->url . "/api/cent/exchangeCent",$data);
	    $json = json_decode ($ret );
	    if (isset ( $json->resCode )) {
	        return $json->resCode;
	    }
	}
	
	/**
	 * 获取唐道币充值比例
	 * @param leftScale 积分比例     rightScale 金币比例
	 * @return number
	 */
	function getGoldScale(){
	    $ret = $this->sendPost ( $this->url . "api/scale/getGoldScale");	    
	    $json = json_decode ($ret );
	    if (isset ( $json->resCode )) {
	        return object2array($json->data);
	    }
	}
	
	/**
	 * 签到详情
	 * @param unknown $cardCode
	 * @return isSignin true :今天成功 cent: 增加积分 contCount:连续签到次数
	 */
	function getSigninInfo($cardCode){
	    $arr = array (
	        "cardCode" => $cardCode,
	    );
	    $data = $this->encrypt ( json_encode ( $arr ) );
	    $ret = $this->sendPost ( $this->url . "api/signin/getSigninInfo", $data);
	    $json = json_decode ($ret );
	    if (isset ( $json->resCode )) {
	        return object2array($json->data);
	    }
	}
	
	/**
	 * 签到
	 * @param unknown $cardCode
	 * @return resCode :10011 resMsg:签到成功
	 */
	function doSignin($cardCode){
	    $arr = array (
	        "cardCode" => $cardCode,
	    );
	    $data = $this->encrypt ( json_encode ( $arr ) );
	    $ret = $this->sendPost ( $this->url . "api/signin/doSignin", $data);
	    $json = json_decode ($ret );
	    if (isset ( $json->resCode )) {
	        return $json->resCode;
	    }
	}
	
	/**
	 * 签到规则
	 * 
	 * @return resCode :0 resMsg:success
	 */
	function getSigninExplain(){
	    $ret = $this->sendPost ( $this->url . "api/signin/getSigninExplain");
	    $json = json_decode ($ret );
	   //pre($json);
	    if (isset ( $json->resCode )) {
	        return object2array($json->data);
	    }
	}
	/**
	 * 添加车牌
	 * @param unknown $openid
	 * @return number
	 */
	function addMemberCar($cardCode,$carNumber){
	    $arr = array (
	        "cardCode" => $cardCode,
	        "carNumber" => $carNumber,
	    );
	    $data = $this->encrypt ( json_encode ( $arr ) );
	    $ret = $this->sendPost ( $this->url . "api/car/addMemberCar", $data);
	    $json = json_decode ($ret );
	    if (isset ( $json->resCode )) {
	        return $json->resCode;
	    }
	}
	
	/**
	 * 删除车牌
	 * @param unknown $openid
	 * @return number
	 */
	function delMemberCar($cardCode,$carNumber){
	    $arr = array (
	        "cardCode" => $cardCode,
	        "carNumber" => $carNumber,
	    );
	    $data = $this->encrypt ( json_encode ( $arr ) );
	    $ret = $this->sendPost ( $this->url . "api/car/delMemberCar", $data);
	    $json = json_decode ($ret );
	    if (isset ( $json->resCode )) {
	        return $json->resCode;
	    }
	}
	
	/**
	 * 车牌列表
	 * @param unknown $openid
	 * @return number
	 */
	function getMemberCar($cardCode){
	    $arr = array (
	        "cardCode" => $cardCode,
	    );
	    $data = $this->encrypt ( json_encode ( $arr ) );
	    $ret = $this->sendPost ( $this->url . "api/car/getMemberCar", $data);
	    $json = json_decode ($ret );
	    //pre($json);
	    if (isset ( $json->resCode )) {
	        return  object2array($json->data);
	    }
	}
	
	/**
	 * 获取用户参加活动列表
	 * @param unknown $openid
	 * @return numberapi  /  activity  /
	 */
	function getActivityByMemberId($cardCode,$page,$size,$type){
	    $arr = array (
	        "cardCode" => $cardCode,
	        "page" => $page,
	        "size" => $size,
	        "type" => $type,
	    );
	    $data = $this->encrypt ( json_encode ( $arr ) );
	    $ret = $this->sendPost ( $this->url . "api/activity/getActivityByMemberId", $data);
	    $json = json_decode ($ret );
	    if (isset ( $json->resCode )) {
	        return  object2array($json->data);
	    }
	}
	
	/**
	 * 
	 * 请求数据
	 * 
	 */
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
