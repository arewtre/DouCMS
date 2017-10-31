<?php
/**
 * @since   2017-07-08
 * @author  九月一十八 
 */

namespace Admin\Controller;

class SystemController extends BaseController {

    public function index() {
        
        $this->display();
    }

    public function tools() {
    	
    	$this->display();
    }
    
    
    public function parameter(){
        $list = M("parameter")->find();
        $res = M("third_parameter")->select();
        $this->assign("list",$list);
        $this->assign("res",$res);
        $this->display();
    }
    
    public function edit(){
        if (IS_POST) {
            $postData = I('post.');
            //pre($postData);
            $res = D('parameter')->where("id=1")->save($postData);
            if ($res === false) {
                $this->ajaxError('操作失败');
            } else {
                $this->ajaxSuccess('编辑成功');
            }
        }
    }
    
    public function sqltool() {
         
        //$this->display();
        //header('location:http://linxinran.cn?a');
        //die;
       header('location:http://linxinran.cn/KodExplorer/plugins/adminer/adminer/index.php'); 
       //include './KodExplorer/plugins/adminer/adminer/index.php';
    }
}