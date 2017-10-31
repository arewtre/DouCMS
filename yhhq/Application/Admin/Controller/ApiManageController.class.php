<?php
/**
 * @since   2017-07-08
 * @author  九月一十八 
 */

namespace Admin\Controller;


class ApiManageController extends BaseController {
    public function index() {
    	//添加排序 //add by wkj 2017-03-18
        $list = D('List')->order('id asc')->select();
        $this->assign('list', $list);
        $this->display();
    }

    public function edit() {
        if( IS_GET ) {
            $id = I('get.id');
            if( $id ){
                $detail = D('List')->where(array('id' => $id))->find();
                $this->assign('detail', $detail);
                $this->display('add');
            }else{
                $this->redirect('add');
            }
        }elseif( IS_POST ) {
            $data = I('post.');
            $res = D('List')->where(array('id' => $data['id']))->save($data);
            if( $res === false ) {
                S('ApiInfo_' . $data['hash'], 0);
                $this->ajaxError('操作失败');
            } else {
                $this->ajaxSuccess('添加成功');
            }
        }
    }

    public function add() {
        if( IS_POST ) {
            $data = I('post.');
            $res = D('List')->add($data);
            if( $res === false ) {
                $this->ajaxError('操作失败');
            } else {
                $this->ajaxSuccess('添加成功');
            }
        } else {
            $data['hash'] = uniqid();
            $this->assign('detail', $data);
            $this->display();
        }
    }

    public function open() {
        if( IS_POST ) {
            $id = I('post.id');
            if( $id ) {
                $hash = D('List')->where(array('id' => $id))->getField('hash');
                S('ApiInfo_' . $hash, 0);
                D('List')->open(array('id' => $id));
                $this->ajaxSuccess('操作成功');
            } else {
                $this->ajaxError('缺少参数');
            }
        }
    }

    public function close() {
        if( IS_POST ) {
            $id = I('post.id');
            if( $id ) {
                $hash = D('List')->where(array('id' => $id))->getField('hash');
                S('ApiInfo_' . $hash, 0);
                D('List')->close(array('id' => $id));
                $this->ajaxSuccess('操作成功');
            } else {
                $this->ajaxError('缺少参数');
            }
        }
    }

    public function del() {
        if( IS_POST ) {
            $id = I('post.id');
            if( $id ) {
                $hash = D('List')->where(array('id' => $id))->getField('hash');
                S('ApiInfo_' . $hash, 0);
                D('List')->del(array('id' => $id));
                $this->ajaxSuccess('操作成功');
            } else {
                $this->ajaxError('缺少参数');
            }
        }
    }
}