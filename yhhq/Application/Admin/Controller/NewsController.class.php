<?php
/**
 * @since   2017-07-08
 * @author  九月一十八
 */
 
namespace Admin\Controller;
use Think\Controller;
class NewsController extends BaseController {
    public function index(){
    	if(empty($_GET['newsstatus'])){
    		$data['newsstatus'] = 0;
    	}
    	$news = M("news")->where($data)->select(); 
    	foreach($news as $k=>$v){
    		if($v['isshow']==1){
    			$news[$k]['isshow'] = "checked";
    		}
    		if($v['newsstatus']==0){
    			$news[$k]['newsstatus'] = "待审核";
    		}
    		if($v['newsstatus']==1){
    			$news[$k]['newsstatus'] = "审核通过";
    		}
    		if($v['newsstatus']==-1){
    			$news[$k]['newsstatus'] = "审核不通过";
    		}
    		if($v['newslook']==0){
    			$news[$k]['newslook'] = "开放浏览";
    		}
    		if($v['newslook']==1){
    			$news[$k]['newslook'] = "会员浏览";
    		}
    	}
    	if(isset($_GET['type'])){
    		$this->ajaxReturn($news);
    	}else{
    		$this->display();
    	}
        
    }
    
    
    public function add(){
    	$this->display();
    }
}