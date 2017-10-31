<?php
/**
 * @since   2017-07-08
 * @author  九月一十八
 */
 
namespace Admin\Controller;
use Think\Controller;
class LinkController extends BaseController {

    public function index(){        
    	$val=I('post.');
        $map = '';
        if (!empty($val)){
            $map['name|url'] = array('like',"%".$val."%");
        }
        $pageindex = isset ( $_GET ['page'] ) ? intval ( $_GET ['page'] ) : 1;
        $pagesize = 4;
        $link = M('link')->where($map)->order('link_sort')->page($pageindex,$pagesize)->select();
        $total = M('link')->where($map)->count();
        $count = ceil(intval ($total) / $pagesize);
        $this->assign('count',$count);
        $this->assign('pageindex',$pageindex);
        $this->assign('link',$link);
        $this->assign('val',$val);
        $this->display();
    }
    //修改友情链接状态
    public function linkState(){
        $id=I('post.id');
        $open= M('link')->where('link_id='.$id)->find();//判断当前状态情况
        if($open==1){
            $data['open'] = 0;
            M('link')->where(array('link_id'=>$id))->save($data);
            $result['status'] = 1;
            $result['info'] = '状态禁止';
        }else{
            $data['open'] = 1;
            M('link')->where(array('link_id'=>$id))->save($data);
            $result['status'] = 1;
            $result['info'] = '状态开启';
        }
        return $result;
    }
    //添加
    public function add(){
     if (IS_POST) {
            $postData = I('post.');
            $postData['addtime'] = time();
            $res = D('Link')->add($postData);
            if ($res === false) {
                $this->ajaxError('操作失败');
            } else {
                $this->ajaxSuccess('添加成功');
            }

        } else {

            $this->display();
        }
    }
    //修改友情链接
    public function edit(){
    	if (IS_GET) {
    		$listInfo = D('Link')->where(array("link_id"=>$_GET['id']))->find();       
    		$this->assign('detail', $listInfo);
            $this->display('add');
        } elseif (IS_POST) {
            $postData = I('post.');
            $postData['addtime'] = time();  
            $postData['status'] = isset($postData['status'])? 1:0;
            $res = D('Link')->where(array('link_id' => $postData['id']))->save($postData);
            if ($res === false) {
                $this->ajaxError('操作失败');
            } else {
                $this->ajaxSuccess('编辑成功');
            }
        }
    }
    //删除友链
	public function del(){
    	$res = M('link')->where(array('link_id'=>$_POST['id']))->delete();
		if ($res === false) {
            $this->ajaxError('操作失败');
        } else {
            $this->ajaxSuccess('删除成功');
        }
    }
}