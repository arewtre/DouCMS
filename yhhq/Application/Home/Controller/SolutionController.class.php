<?php
namespace Home\Controller;
use Think\Controller;
class SolutionController extends BaseController {
    public function _initialize(){
        parent::_initialize();
        $category= M("article_category")->where("parentid=0")->select();
        $cate = formatTree(listToTree( $category));
        $this->assign("cate",$cate);
    }
    public function index(){
    	$user = isset($_SESSION['userid']) ? $_SESSION['userid'] :null;   	
        if($user=NULL){
            $where['a.art_publish'] = 1;
            $where['a.art_isshow']=1;            
        }else{
            $where['a.art_publish'] = 1;
        }  
        $getInfo = I("get.");
        //pre($getInfo);
        if (isset($getInfo['pid']) && !empty($getInfo['pid'])) {
            $where['ac.pid'] = $getInfo['pid'];
        }
        if (isset($getInfo['keyword']) && !empty($getInfo['keyword'])) {
            $where['a.art_title'] = array('like', '%' . $getInfo['keyword'] . '%');
            $where['a.art_remark'] = array('like', '%' . $getInfo['keyword'] . '%');
            $where['_logic'] = 'OR';
        }
        $data = M("article as a")->join('lin_article_category  as ac   on ac.pid = a.art_pid')->where($where)->order("a.art_addtime desc")->select();
        $this->assign("list",$data);
        $this->display();
    }
    
    public function detail(){
    	M('article')->where(array("art_id"=>$_GET['art_id']))->setInc('art_hit');
        $data = M("article")->where(array("art_id"=>$_GET['art_id']))->find();
        $data['art_addtime'] = word_time($data['art_addtime']);
        $msg= M("message")->where(array("art_id"=>$_GET['art_id']))->order("asktime desc")->select();
        $top = M("article as a")->join('lin_article_category  as ac   on ac.pid = a.art_pid')->where("a.art_id !=".$_GET['art_id']." and a.art_isdel=0")->order("a.art_hit desc")->limit(0,5)->select();
        
        $this->assign("msg",$msg);
        $this->assign("top",$top);
        $this->assign("list",$data);
        $this->display();
    }
    

    /**
     * 添加评论
     * @author 九月一十八<2505451091@qq.com>
     */
    public function formRemark() {
//     	$user = isset($_SESSION['uid']) ? $_SESSION['uid'] :null;
//     	if($user=NULL){
//     		$this->ajaxError('请先登录!');
//     	}
    	$postData = I('post.');
    	$postData['asktime'] = date("Y-m-d H:i:s");
    	$postData['art_id'] = $_GET['art_id'];
    	$postData['username'] = $_SESSION['username'];
    	$postData['userface'] = $_SESSION['userface'];
    	$postData['userask'] = $postData['editorContent'];
    	$res = D('message')->add($postData);
    	if ($res === false) {
    		$this->ajaxError('操作失败');
    	} else {
    		$postData['code']=1;
    		$postData['userask'] = html_entity_decode($postData['userask']);
    		$this->ajaxReturn($postData);
    	}
    }

}