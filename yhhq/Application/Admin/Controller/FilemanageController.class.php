<?php
namespace Admin\Controller;
use Think\Model;
class FilemanageController extends BaseController {
    public function index() { 
       
      $this->display();
    }
    
     public function connect(){
    	define("IN_ADMIN",1);//重要，定义一个常量，在插件的PHP入口文件中验证，防止非法访问。
    	include './Public/elfinder2.0/php/connector.php';//包含elfinder自带php接口的入口文件
    	 //include './Public/elfinder2.1.28/php/connector.php';//包含elfinder自带php接口的入口文件
    }
    
    public function codeEdit() {
         
        //$this->display();
        //header('location:http://linxinran.cn?a');
        //die;
       header('location:'.__ROOT__.'/KodExplorer/index.php'); 
       
    }
    
}