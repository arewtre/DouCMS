<?php
/**
 * @since   2017-07-08
 * @author  九月一十八
 */
 
namespace Admin\Controller;
use Think\Controller;
use Admin\ORG\Auth;
class IndexController extends BaseController {
	public function index(){	    
	    if(IS_AJAX){
	        $isAdmin = isAdministrator();
	        if(!empty($_GET['pid'])){
	            $where['parentid'] = $_GET['pid'];
	            $where['is_display'] = 1;
	        }else{
	            $where['parentid'] = 1;
	            $where['is_display'] = 1;
	        }
	        $top1['top'] = D("menu")->where("parentid=0 AND is_display=1")->order('displayorder desc')->select();
	       // foreach($top1['top'] as $k=>$v){
        //         $top1['top'][$k]['icon'] =  htmlspecialchars_decode($v['icon'],ENT_NOQUOTES );
        //     }
	        
	        if(!isset($_GET['pid'])){
	            $a = M("menu")->where('parentid=154 AND is_display=1')->order('displayorder desc')->select();
	            foreach($a as $k=>$v){
	                $arr['parentid'] = $v['pid'];
	                $arr['is_display'] = 1;
	                $er = M("menu")->where($arr)->order('displayorder desc')->select();
	                if(!empty($er)){
	                    $a[$k]["children"]= $er;
	                }
	            }
	            $top1['left']=$a;
	        }
	        $left1 = M("menu")->where($where)->order('displayorder desc')->select();
	        foreach($left1 as $k=>$v){
	            $arr['parentid'] = $v['pid'];
	            $arr['is_display'] = 1;
	            $erji = M("menu")->where($arr)->select();
	            if(!empty($erji)){
	                $left1[$k]["children"]= $erji;
	            }
	        }
  
	        foreach ($top1['top'] as $k=>$menu) {
    	            if($isAdmin){
    	                $top['top'][] = $menu;
    	            }else{
    	                $authObj = new Auth();
    	                $authList = $authObj->getAuthList($this->uid);
    	                if (in_array(strtolower($menu['href']), $authList) || $menu['href'] == '') {
    	                    $top['top'][]  = $menu;
    	                }
	            }
	        }
	        
	        foreach ($top1['left'] as $k=>$menu) {
	            if($isAdmin){
	                $top['left'][] = $menu;
	            }else{
	                $authObj = new Auth();
	                $authList = $authObj->getAuthList($this->uid);
	                if (in_array(strtolower($menu['href']), $authList) || $menu['href'] == '') {
	                    $top['left'][]  = $menu;
	                }
	            }
	        }

	        foreach ($left1 as $k=>$menu) {
	            if($isAdmin){
	                $left[] = $menu;
	            }else{
	                $authObj = new Auth();
	                $authList = $authObj->getAuthList($this->uid);
	                if (in_array(strtolower($menu['href']), $authList) || $menu['href'] == '') {
	                    $left[] = $menu;
	                }
	            }
	        }
	        
	        if(!isset($_GET['pid']) && $_GET['Param'] == 'index_menu'){
	            echo json_encode($top);
	        }else{
	            echo json_encode($left);
	        }
	    }else{
    	    $version = M()->query('SELECT VERSION() AS ver');
    	    $config  = array(
    	        'url'             => $_SERVER['HTTP_HOST'],
    	        'document_root'   => $_SERVER['DOCUMENT_ROOT'],
    	        'server_os'       => PHP_OS,
    	        'server_port'     => $_SERVER['SERVER_PORT'],
    	        'server_ip'       => $_SERVER['SERVER_ADDR'],
    	        'server_soft'     => $_SERVER['SERVER_SOFTWARE'],
    	        'php_version'     => PHP_VERSION,
    	        'mysql_version'   => $version[0]['ver'],
    	        'max_upload_size' => ini_get('upload_max_filesize')
    	    );
    	    
    	    $re = M("message")->limit(4)->order("asktime desc")->select();
    	    $this->assign('re', $re);
    	    $this->assign('config', $config);
    		if(!isset($_GET['main'])){
    			$this->display();
    		}else{			
    			$this->display("Index/main");
    		}
	    }
	}
    
    public function main(){
        
    	$this->display();
    }
    
}