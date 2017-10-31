<?php
/**
 * @since   2017-07-08
 * @author  九月一十八 
 */

namespace Admin\Controller;

class MemberController extends BaseController {

    public function index() {
        $listInfo = D('Member')->order("jointime desc")->select();
        //pre($userData);
        foreach($listInfo as $k=>$v){
        	$listInfo[$k]['prevtime']=date("Y-m-d H:i:s",$v['prevtime']);
        	$listInfo[$k]['logintime']=date("Y-m-d H:i:s",$v['logintime']);
        	$listInfo[$k]['jointime']=date("Y-m-d H:i:s",$v['jointime']);
        	//$listInfo[$k]['sex']=$v['sex']=1?"男":"女";
        	switch($v['sex']){
        		case 1:
        		$listInfo[$k]['sex']="男";
        		break;
        		case 0:
        		$listInfo[$k]['sex']="女";
        		break;
        		case -1:
        		$listInfo[$k]['sex']="未知";
        		break;
        	}
        }
        $this->assign('list', $listInfo);
        $this->display();
    }

    public function add() {
        if (IS_POST) {
            $data = I('post.');
            $has = D('User')->where(array('username' => $data['username']))->count();
            if ($has) {
                $this->ajaxError('用户名已经存在，请重设！');
            }
            $data['password'] = user_md5($data['password']);
            $data['regIp'] = get_client_ip(1);
            $data['regTime'] = time();
            $res = D('User')->add($data);
            if ($res === false) {
                $this->ajaxError('操作失败');
            } else {
                $this->ajaxSuccess('添加成功');
            }
        } else {
            $this->display();
        }
    }

    public function close() {
        $id = I('post.id');
        $isAdmin = isAdministrator($id);
        if ($isAdmin) {
            $this->ajaxError('超级管理员不可以被操作');
        }
        $res = D('User')->where(array('id' => $id))->save(array('status' => 0));
        if ($res === false) {
            $this->ajaxError('操作失败');
        } else {
            $this->ajaxSuccess('操作成功');
        }
    }

    public function open() {
        $id = I('post.id');
        $isAdmin = isAdministrator($id);
        if ($isAdmin) {
            $this->ajaxError('超级管理员不可以被操作');
        }
        $res = D('User')->where(array('id' => $id))->save(array('status' => 1));
        if ($res === false) {
            $this->ajaxError('操作失败');
        } else {
            $this->ajaxSuccess('操作成功');
        }
    }

    public function del() {
        $id = I('post.id');
        $isAdmin = isAdministrator($id);
        if ($isAdmin) {
            $this->ajaxError('超级管理员不可以被操作');
        }

        $res = D('User')->where(array('id' => $id))->delete();
        if ($res === false) {
            $this->ajaxError('操作失败');
        } else {
            $this->ajaxSuccess('操作成功');
        }
    }
    
    public function userinfo() {
    	if (IS_POST) {
    		$data = I('post.');
    		$has = D('User')->where(array('username' => $data['username']))->count();
    		if ($has) {
    			$this->ajaxError('用户名已经存在，请重设！');
    		}
    		$data['password'] = user_md5($data['password']);
    		$data['regIp'] = get_client_ip(1);
    		$data['regTime'] = time();
    		$res = D('User')->add($data);
    		if ($res === false) {
    			$this->ajaxError('操作失败');
    		} else {
    			$this->ajaxSuccess('添加成功');
    		}
    	} else {
	    	$list = D('User')->select();
	    	$this->assign('list', $list);
	    	$this->display();
    	}
    }
    
	public function updatePwd() {
    	if (IS_POST) {
    		$data = I('post.');
    		$has = D('User')->where(array('username' => $data['username']))->count();
    		if ($has) {
    			$this->ajaxError('用户名已经存在，请重设！');
    		}
    		$data['password'] = user_md5($data['password']);
    		$data['regIp'] = get_client_ip(1);
    		$data['regTime'] = time();
    		$res = D('User')->add($data);
    		if ($res === false) {
    			$this->ajaxError('操作失败');
    		} else {
    			$this->ajaxSuccess('添加成功');
    		}
    	} else {
	    	$list = D('User')->select();
	    	$this->assign('list', $list);
	    	$this->display();
    	}
    }
    
    public function message() {
    	$list = M("message")->select();
    	$list['msgReply'] = json_decode($list['msgReply']);
    	$this->assign('list', $list);
    	$this->display();
    }

}