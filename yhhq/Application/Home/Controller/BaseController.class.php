<?php
namespace Home\Controller;
use Think\Controller;
class BaseController extends Controller {
    
    public function _initialize(){
        $menu = D("SiteMenu")->order("displayorder desc")->where("parentid=0")->select();
        foreach($menu as $k=>$v){
        	$re = D("SiteMenu")->where(array("parentid"=>$v['pid']))->select();
        	if($re){
        		$menu[$k]['children']=$re;
        	}
        }
        
        //pre($menu);
        $this->assign("menu",$menu);
    }
}