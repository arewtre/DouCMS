<?php
/**
 * @since   2017-07-08
 * @author  九月一十八
 */
 
namespace Admin\Controller;
use Think\Controller;
class IconController extends BaseController {

    public function index(){
        //$link=M('link')->where($map)->order('sort')->select();
        //$this->assign('link',$link);
        //$this->assign('val',$val);
        $this->display();
    }
    
    public function fontAwesome(){
        //$link=M('link')->where($map)->order('sort')->select();
        //$this->assign('link',$link);
        //$this->assign('val',$val);
        $this->display();
    }
    //修改友情链接状态
    public function linkState(){
        $id=I('post.id');
        $open= M('link')->where('link_id='.$id)->find();//判断当前状态情况
        if($open==1){
            $data['open'] = 0;
            db('link')->where(array('link_id'=>$id))->setField($data);
            $result['status'] = 1;
            $result['info'] = '状态禁止';
        }else{
            $data['open'] = 1;
            db('link')->where(array('link_id'=>$id))->setField($data);
            $result['status'] = 1;
            $result['info'] = '状态开启';
        }
        return $result;
    }
    //添加
    public function add(){
        if(IS_POST){
            $data = input('post.');
            $data['addtime'] = time();
            db('link')->insert($data);
            $result['code'] = 1;
            $result['msg'] = '友情链接添加成功!';
            $result['url'] = url('index');
            return $result;
        }else{
            $this->assign('title',lang('add').lang('link'));
            $this->assign('info','null');
            return $this->fetch('form');
        }
    }
    //修改友情链接
    public function edit(){
        if(request()->isPost()){
            $data = input('post.');
            db('link')->update($data);
            $result['code'] = 1;
            $result['msg'] = '友情链接修改成功!';
            $result['url'] = url('index');
            return $result;
        }else{
            $link_id=input('param.link_id');
            $info=db('link')->where(array('link_id'=>$link_id))->find();
            $this->assign('info',json_encode($info,true));
            $this->assign('title',lang('edit').lang('link'));
            return $this->fetch('form');
        }
    }
    public function del(){
        db('link')->where(array('link_id'=>input('link_id')))->delete();
        $this->redirect('index');
    }
}