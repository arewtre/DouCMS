<?php
namespace Admin\Controller;
use Think\Controller;
class ArticleController extends BaseController {
    public function _initialize(){
        parent::_initialize();
        $category= M("article_category")->select();
        $cate = formatTree(listToTree($category));
        $this->assign("cate",$cate);
    }
    public function index(){
        if(IS_AJAX){
            $postData = I('post.');
            $start = $postData['start'] ? $postData['start'] : 0;
            $limit = $postData['length'] ? $postData['length'] : 2;
            $draw = $postData['draw'];
            $where = array();
            $getInfo = I('get.');
            if (isset($getInfo['type']) && !empty($getInfo['type'])) {
                if (isset($getInfo['keyword']) && !empty($getInfo['keyword'])) {
                    switch ($getInfo['type']) {
                        case 1:
                            $where['art_author'] = array('like', '%' . $getInfo['keyword'] . '%');
                            break;
                        case 2:
                            $where['nickname'] = array('like', '%' . $getInfo['keyword'] . '%');
                            break;
                        case 3:
                            $where['art_status'] = $getInfo['keyword'];
                            break;
                    }
                }

            }else{
                $where['art_title'] = array('like', '%' . $getInfo['keyword'] . '%');
            }
            $where['art_isdel'] = 0;
            $total = D('Article')->where($where)->count();
            $info = D('Article')->where($where)->order('art_addtime desc')->limit($start, $limit)->select();
            $data = array(
                'draw'            => $draw,
                'recordsTotal'    => $total,
                'recordsFiltered' => $total,
                'data'            => $info
            );
            $this->ajaxReturn($data, 'json');            
        }
        $data = M("article as a")->join('lin_article_category  as ac   on ac.pid = a.art_pid')->where("a.art_status=1")->order("a.art_addtime desc")->select();       
        $this->assign("list",$data);
        $this->display();

    }
    
    public function detail(){
        $data = M("article")->where(array("art_id"=>$_GET['art_id']))->find();
        $data['art_addtime'] = word_time($data['art_addtime']);
        $this->assign("list",$data);
        $this->display();
    }
    
    public function imgurl($url){
    	$imgurl =  htmlspecialchars("__PUBLIC__\/Upload\/".$url);
    	return $imgurl;
    }
    
    /**
     * 新增文章
     * @author 九月一十八<2505451091@qq.com>
     */
    public function addd() {
        if (IS_POST) {
            $postData = I('post.');
            $postData['art_addtime'] = time();
            $postData['art_author'] = $_SESSION['nickname'];
            $postData['art_publish'] = isset($postData['art_publish']) ? 1 : 0;
            $postData['art_isshow'] = isset($postData['art_isshow']) ? 1 : 0;
            $postData['art_istop'] = isset($postData['art_istop']) ? 1 : 0;
            $res = D('Article')->add($postData);
            if ($res === false) {
                $this->ajaxError('操作失败');
            } else {
                $this->ajaxSuccess('添加成功');
            }

        } else 

            $this->display();
        }
        
    
    /**
     * 修改文章
     * @author 九月一十八<2505451091@qq.com>
     */
    public function edit() {
    	if (IS_GET) {
    		$listInfo = D('Article')->where(array("art_id"=>$_GET['id']))->find();       
    		$this->assign('detail', $listInfo);
            $this->display('addd');
        } elseif (IS_POST) {
            $postData = I('post.');
            $postData['art_addtime'] = time();
            $postData['art_img'] = $postData['art_img'];
            $postData['art_author'] = $_SESSION['nickname'];
            $postData['art_publish'] = isset($postData['art_publish']) ? 1 : 0;
            $postData['art_isshow'] = isset($postData['art_isshow']) ? 1 : 0;
            $postData['art_istop'] = isset($postData['art_istop']) ? 1 : 0;
            $res = D('Article')->where(array('art_id' => $postData['art_id']))->save($postData);
            if ($res === false) {
                $this->ajaxError('操作失败');
            } else {
                $this->ajaxSuccess('编辑成功');
            }
        }
    }
    
    /**
     * 删除文章
     * @author 九月一十八<2505451091@qq.com>
     */
    public function del() {
        if (isset($_POST['del']) && !empty(isset($_POST['del']))) {
            $res = D('Article')->where(array("art_id"=>$_GET['id']))->delete();
            if ($res === false) {
                $this->ajaxError('操作失败');
            } else {
                $this->ajaxSuccess('删除成功');
            }
        } else{            
            if (isset($_POST['m']) && !empty(isset($_POST['m']))) {
                $data['art_isdel'] = 0;
            }else{
                $data['art_isdel'] = 1;
            }
            $res = D('Article')->where(array('art_id' => $_GET['id']))->save($data);
            if ($res === false) {
                $this->ajaxError('操作失败');
            } else {
                $this->ajaxSuccess('删除成功');
            }
        }
    }
    
    /**
     * 修改文章
     * @author 九月一十八<2505451091@qq.com>
     */
    public function show() {
    	$this->display();
    }
    
    /**
     * 回收站
     * @author 九月一十八<2505451091@qq.com>
     */
    public function reback(){
        if(IS_AJAX){
            $postData = I('post.');
            $start = $postData['start'] ? $postData['start'] : 0;
            $limit = $postData['length'] ? $postData['length'] : 2;
            $draw = $postData['draw'];
            $where = array();
            $getInfo = I('get.');
            if (isset($getInfo['type']) && !empty($getInfo['type'])) {
                if (isset($getInfo['keyword']) && !empty($getInfo['keyword'])) {
                    switch ($getInfo['type']) {
                        case 1:
                            $where['art_author'] = array('like', '%' . $getInfo['keyword'] . '%');
                            break;
                        case 2:
                            $where['nickname'] = array('like', '%' . $getInfo['keyword'] . '%');
                            break;
                        case 3:
                            $where['art_status'] = $getInfo['keyword'];
                            break;
                    }
                }
    
            }else{
                $where['art_title'] = array('like', '%' . $getInfo['keyword'] . '%');
            }
            $where['art_isdel'] = 1;
            $total = D('Article')->where($where)->count();
            $info = D('Article')->where($where)->order('art_addtime desc')->limit($start, $limit)->select();
            $data = array(
                'draw'            => $draw,
                'recordsTotal'    => $total,
                'recordsFiltered' => $total,
                'data'            => $info
            );
            $this->ajaxReturn($data, 'json');
        }
        $this->display();    
    }
    
    public function comment() {
    	$list = M("message")->select();
    	$list['msgReply'] = json_decode($list['msgReply']);
    	$this->assign('list', $list);
    	$this->display();
    }
    
}