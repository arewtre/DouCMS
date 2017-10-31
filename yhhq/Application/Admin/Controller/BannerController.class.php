<?php
namespace Admin\Controller;
use Think\Controller;
class BannerController extends BaseController {
    // public function _initialize(){
    //     parent::_initialize();

    // }
    public function index(){
        if(IS_AJAX){
            $postData = I('post.');
            $start = $postData['start'] ? $postData['start'] : 0;
            $limit = $postData['length'] ? $postData['length'] : 2;
            $draw = $postData['draw'];
            $where = array();
            $getInfo = I('get.');
            if (isset($getInfo['type']) && !empty($getInfo['type'])) {              
            	$where['link_type'] = $getInfo['type'];
            }
            if (isset($getInfo['keyword']) && !empty($getInfo['keyword'])) {
                $where['text'] = array('like', '%' . $getInfo['keyword'] . '%');
            }

            $total = D('Banner')->where($where)->count();
            $info = D('Banner')->where($where)->order('addtime desc,displayorder desc')->limit($start, $limit)->select();
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
     * 新增banner
     * @author 九月一十八<2505451091@qq.com>
     */
    public function add() {
        if (IS_POST) {
            $postData = I('post.');
            $data['id'] = $postData['id'];
            $data['text'] = $postData['text'];
            $data['thumb'] = $postData['thumb'];
            $data['link_type'] = $postData['link_type'];
            $data['link_id'] = $postData['link_id'.$postData['link_type']];
            $data['link_url'] = $postData['link_url'.$postData['link_type']];
            $data['addtime'] = time();
            $data['author'] = $_SESSION['nickname'];
            $data['state'] = isset($postData['state'])?1:0;
            $data['isshow'] = isset($postData['isshow'])?1:0;
            $data['istop'] = isset($postData['istop'])?1:0;
            $res = D('Banner')->add($data);
            if ($res === false) {
                $this->ajaxError('操作失败');
            } else {
                $this->ajaxSuccess('添加成功');
            }

        } else 

            $this->display();
        }
        
    
    /**
     * 修改banner
     * @author 九月一十八<2505451091@qq.com>
     */
    public function edit() {
    	if (IS_GET) {
    		$listInfo = D('Banner')->where(array("id"=>$_GET['id']))->find();     
    		$this->assign('detail', $listInfo);
            $this->display('add');
        } elseif (IS_POST) {
            $postData = I('post.');
            //pre($postData);
            $data['id'] = $postData['id'];
            $data['text'] = $postData['text'];
            $data['thumb'] = $postData['thumb'];
            $data['link_type'] = $postData['link_type'];
            $data['link_id'] = $postData['link_id'.$postData['link_type']];
            $data['link_url'] = $postData['link_url'.$postData['link_type']];
            $data['addtime'] = time();
            $data['author'] = $_SESSION['nickname'];
            $data['state'] = isset($postData['state'])?1:0;
            $data['isshow'] = isset($postData['isshow'])?1:0;
            $data['istop'] = isset($postData['istop'])?1:0;
            
            $res = D('Banner')->where(array('id' => $data['id']))->save($data);
            if ($res === false) {
                $this->ajaxError('操作失败');
            } else {
                $this->ajaxSuccess('编辑成功');
            }
        }
    }
    
    /**
     * 删除banner
     * @author 九月一十八<2505451091@qq.com>
     */
    public function del() {

            $res = D('Banner')->where(array('id' => $_GET['id']))->delete();
            if ($res === false) {
                $this->ajaxError('操作失败');
            } else {
                $this->ajaxSuccess('删除成功');
            }
    }
    
     /**
     * 选择链接类型
     * @author 九月一十八<2505451091@qq.com>
     */
    public function choselink() {
        //pre($_GET);
        if($_GET['type'] == 1){
          $list = D('Article')->where(array('art_status' => 1))->select(); 
          foreach($list as $k=>$v){
              $list[$k]['id'] = $v['art_id'];
              $list[$k]['title'] = $v['art_title'];
              $list[$k]['img'] = htmlspecialchars('http://'.$_SERVER['HTTP_HOST'].__ROOT__)."/Public/upload/".$v['art_img'];
              $list[$k]['url'] = "已选择文章 <<".$v['art_title']." >> id:".$v['art_id'];
          }
          
        }
        if($_GET['type'] ==2){
          $list = D('Image')->where(array('status' => 0))->select();
          //pre($list);
          foreach($list as $k=>$v){
              $list[$k]['id'] = $v['img_id'];
              $list[$k]['title'] = $v['image_desc'];
              $list[$k]['img'] = $v['image_url'];
              $list[$k]['url'] = "已选择照片 地址:".$v['image_url'];
          }
        }
        if($_GET['type']==3){
          $list = D('Video')->where(array('v_status' => 0))->select();
          foreach($list as $k=>$v){
              $list[$k]['id'] = $v['v_id'];
              $list[$k]['title'] = $v['v_desc'];
              $list[$k]['img'] = $v['v_pic'];
              $list[$k]['url'] = "已选择视频 地址:".$v['v_url'];
          }
        }
        //pre($list);
        $this->assign("type",$type);
        $this->assign("list",$list);
        $this->display(); 
    }
    
}