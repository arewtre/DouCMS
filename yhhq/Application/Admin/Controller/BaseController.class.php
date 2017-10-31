<?php
/**
 * @since   2017-07-08
 * @author  九月一十八 
 */

namespace Admin\Controller;
use Think\Controller;
use Admin\ORG\Auth;

class BaseController extends Controller {

    protected $userInfo;
    protected $allMenu;
    protected $uid;

    private $url;
    private $menuInfo;

    public function _initialize(){

        //初始化系统
        $this->uid = session('uid');
        $this->assign('uid', $this->uid);
        $this->iniSystem();
        //E($this->iniSystem());
        //控制器初始化
        if(method_exists($this, 'myInit')){
            $this->myInit();
        }
        $PHP_SELF=$_SERVER['PHP_SELF'];
        $url='http://'.$_SERVER['HTTP_HOST'].__ROOT__;
        define('IP_ROOT', $url);
    }

    /**
     * 自定义初始化函数
     */
    public function myInit(){}

    /**
     * Ajax正确返回，自动添加debug数据
     * @param $msg
     * @param array $data
     * @param int $code
     */
    public function ajaxSuccess( $msg, $code = 1, $data = array() ){
        $returnData = array(
            'code' => $code,
            'msg' => $msg,
            'data' => $data
        );
        if( !empty($this->debug) ){
            $returnData['debug'] = $this->debug;
        }
        $this->ajaxReturn($returnData, 'json');
    }

    /**
     * Ajax错误返回，自动添加debug数据
     * @param $msg
     * @param array $data
     * @param int $code
     */
    public function ajaxError( $msg, $code = 0, $data = array() ){
        $returnData = array(
            'code' => $code,
            'msg' => $msg,
            'data' => $data
        );
        if( !empty($this->debug) ){
            $returnData['debug'] = $this->debug;
        }
        $this->ajaxReturn($returnData, 'json');
    }

    /**
     * 将二维数组变成指定key
     * @param $array
     * @param $keyName
     * @author zhaoxiang <zhaoxiang051405@gmail.com>
     * @return array
     */
    protected function buildArrByNewKey($array, $keyName = 'id') {
        $list = array();
        foreach ($array as $item) {
            $list[$item[$keyName]] = $item;
        }
        return $list;
    }
    
    protected function buildArrByNewKey2($array, $keyName = 'pid') {
    	$list = array();
    	foreach ($array as $item) {
    		$list[$item[$keyName]] = $item;
    	}
    	return $list;
    }

    private function iniSystem() {
        $this->url = "Admin/".CONTROLLER_NAME . "/" . ACTION_NAME;
        $this->isForbid();
        if (CONTROLLER_NAME != 'Login') {
            $this->allMenu = D('Menu')->order('is_display desc')->select();
            $this->menuInfo = D('Menu')->where(array('href' => $this->url))->find();
            //pre($this->menuInfo);
            if (empty($this->menuInfo)) {
//                 if (IS_AJAX) {
//                     $this->ajaxError('当前URL非法');
//                 } else {
//                     $this->error('当前URL非法');
//                 }
            }
            $this->checkLogin();
            $this->checkRule();
            //$this->iniLog();
        }
    }
    

    /**
     * 封号，或者封IP等特殊需求才用到的
     * @return bool
     */
    private function isForbid() {
        return true;
    }

    /**
     * 检测登录
     */
    private function checkLogin() {
        if (isset($this->uid) && !empty($this->uid)) {
            $sidNow = session_id();
            $sidOld = S($this->uid);
            if (isset($sidOld) && !empty($sidOld)) {
                if ($sidOld !== $sidNow) {
                    $this->error("您的账号在别的地方登录了，请重新登录！", U('Login/index'));
                } else {
                    S($this->uid, $sidNow, C('ONLINE_TIME'));
                    $this->userInfo = $userInfo = D('User')->where(array('id' => $this->uid))->find();
                    $this->assign('userInfo', $this->userInfo);
                }
            } else {
                $this->error("登录超时，请重新登录！", U('Login/index'));
            }
        } else {
            $this->redirect('Login/index');
        }

    }

    /**
     * 检测权限
     */
    private function checkRule() {
        $isAdmin = isAdministrator();
        if ($isAdmin) {
            return true;
        } else {
            //if ($this->menuInfo['level'] == 0) {
                $authObj = new Auth();
                $check = $authObj->check(strtolower($this->url), $this->uid);
                if (!$check) {
                    $this->ajaxError(L('_VALID_ACCESS_'));
                	//$this->ajaxError("您暂无权限!");
                	$this->error("您暂无权限！", U($this->url));
                }
            //}
        }
    }

    /**
     * 根据菜单级别进行区别Log记录，当然，如果有更加细节的控制，也可以在这个函数内实现
     */
    private function iniLog() {
        $data = array(
            'actionName' => $this->menuInfo['title'],
            'uid' => $this->uid,
            'nickname' => $this->userInfo['username'],
            'addTime' => time(),
            'url' => $this->menuInfo['href'],
            'data' => json_encode($_REQUEST)
        );

        D('UserAction')->add($data);
    }

}