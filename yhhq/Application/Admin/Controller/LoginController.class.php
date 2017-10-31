<?php
/**
 * @since   2017-07-08
 * @author  九月一十八
 */
 
namespace Admin\Controller;

/**
 * 登录控制器
 * @since   2016-01-16
 * @author  zhaoxiang <zhaoxiang051405@outlook.com>
 */
class LoginController extends BaseController {

    public function index() {
        $this->display();
    }

public function login() {
    	$data= I('post.');
        $res = $this->geetest_submit_check($data);
    	if($res==0){
    		$this->ajaxError('验证码不正确');
    	}
        $pass = user_md5($data['password']);
        $user = $data['username'];
        $userInfo = D('User')->where(array('username' => $user, 'password' => $pass))->find();
        if (!empty($userInfo)) {
            if ($userInfo['status']) {
                //保存用户信息和登录凭证
                S($userInfo['id'], session_id(), C('ONLINE_TIME'));
                session('uid', $userInfo['id']);
                session('username', $userInfo['username']);
                session('nickname', $userInfo['nickname']);
                session('headimg', $userInfo['image']);
                //更新用户数据
                $userData = D('UserData')->where(array('uid' => $userInfo['id']))->find();
                $data = array();
                if ($userData) {
                    $data['loginTimes'] = $userData['loginTimes'] + 1;
                    $data['lastLoginIp'] = get_client_ip(1);
                    $data['lastLoginTime'] = NOW_TIME;
                    D('UserData')->where(array('uid' => $userInfo['id']))->save($data);
                } else {
                    $data['loginTimes'] = 1;
                    $data['uid'] = $userInfo['id'];
                    $data['lastLoginIp'] = get_client_ip(1);
                    $data['lastLoginTime'] = NOW_TIME;
                    D('UserData')->add($data);
                }
                $this->ajaxSuccess('登录成功');
            } else {
                $this->ajaxError('用户已被封禁，请联系管理员');
            }
        } else {
            $this->ajaxError('用户名密码不正确');
        }
    }

    public function logOut() {
        S(session('uid'), null);
        session('[destroy]');
        $this->success('退出成功', U('Login/index'));
    }

    public function changeUser() {
        if (IS_POST) {
            $data = I('post.');
            $newData = array();
            if (!empty($data['nickname'])) {
                $newData['nickname'] = $data['nickname'];
            }
            if (!empty($data['password'])) {
                $newData['password'] = user_md5($data['password']);
                $newData['updateTime'] = time();
            }
            $res = D('User')->where(array('id' => session('uid')))->save($newData);
            if ($res === false) {
                $this->ajaxError('修改失败');
            } else {
                $this->ajaxSuccess('修改成功');
            }
        } else {
            $userInfo = D('User')->where(array('id' => session('uid')))->find();
            $this->assign('uname', $userInfo['username']);
            $this->display('add');
        }
    }
 /**
     * geetest生成验证码
     */
    public function geetest_show_verify(){
        $geetest_id=C('GEETEST_ID');
        $geetest_key=C('GEETEST_KEY');
        $geetest=new \Org\Xb\Geetest($geetest_id,$geetest_key);
        $user_id = "test";
        $status = $geetest->pre_process($user_id);
        $_SESSION['geetest']=array(
            'gtserver'=>$status,
            'user_id'=>$user_id
        );
        echo $geetest->get_response_str();//die;
    }
    
    public function geetest_submit_check($data){
    	//$data=I('post.');
    	if (geetest_chcek_verify($data)) {
    		return 1;
    	}else{
    		return 0;
    	}
    }
    
    /**
     * geetest ajax 验证
     */
    public function geetest_ajax_check($data){
        //$data=I('post.');
        echo intval(geetest_chcek_verify($data));//die;
    }

}