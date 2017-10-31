<?php
/**
 * @since   2017-07-08
 * @author  九月一十八 
 */

namespace Admin\Controller;

class UserController extends BaseController {

    public function index() {
    	$pageindex = isset ( $_GET ['page'] ) ? intval ( $_GET ['page'] ) : 1;
    	$pagesize = 10;
    	$total = D('User')->count();
    	$count = ceil(intval ($total) / $pagesize);
    	$listInfo = D('User')->page($pageindex,$pagesize)->select();
    	$userData = D('UserData')->select();
        $userData = $this->buildArrByNewKey($userData, 'uid');
        foreach ($listInfo as $key => $value) {
            if ($userData) {
                $listInfo[$key]['lastLoginIp'] = long2ip($userData[$value['id']]['lasttoginip']);
                $listInfo[$key]['loginTimes'] = $userData[$value['id']]['logintimes'];
                $listInfo[$key]['lastLoginTime'] = date('Y-m-d H:i:s', $userData[$value['id']]['lastlogintime']);
            }
        }
        foreach($listInfo as $k=>$v){
        	if(empty($v['image'])){
        		$listInfo[$k]['image'] = __ROOT__."/Public/img/user_nopic.jpg";
        	}
        }
        $this->assign('count',$count);
        $this->assign('pageindex',$pageindex);
        $this->assign('total',$total);
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
    
    public function edit() {
    	if (IS_POST) {
    		$data = I('post.');
    		$has = D('User')->where(array('username' => $data['username']))->count();
    		if ($has>2) {
    			$this->ajaxError('用户名已经存在，请重设！');
    		}
    		$has2 = D('User')->where(array('nickname' => $data['nickname']))->count();
    		if ($has2>2) {
    			$this->ajaxError('昵称已经存在，请重设！');
    		}
    		if(!empty($data['password'])){
    			$da['password'] = user_md5($data['password']);
    		}
    		$da['username'] = $data['username'];
    		$da['nickname'] = $data['nickname'];
    		$res = D('User')->where("id=".$data['id'])->save($data);
    		if ($res === false) {
    			$this->ajaxError('操作失败');
    		} else {
    			$this->ajaxSuccess('添加成功');
    		}
    	} else {
    		$detail = M("user")->where("id=".$_GET['id'])->find();
    		$this->assign("detail",$detail);
    		$this->display("add");
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
    
    public function userInfo() {
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
	    	$list = D('User')->where(array("id"=>$_SESSION['uid']))->find();
	    	
	    	$this->assign('detail', $list);
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

}