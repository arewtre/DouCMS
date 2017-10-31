<?php
/**
 * @since   2017-07-08
 * @author  九月一十八
 */
 
namespace Admin\Controller;
use Think\Controller;
use Admin\ORG\Auth;
class MenuController extends BaseController {


    /**
     * 获取菜单列表
     * @author 九月一十八<2505451091@qq.com>
     */

    public function index() {
        $isAdmin = isAdministrator();
        if(IS_AJAX){
            //pre($_SESSION);
            $authObj = new Auth();
            $authList = $authObj->getAuthList($this->uid);
            //pre($authList);
        	if(!empty($_GET['pid'])){
        		$where['parentid'] = $_GET['pid'];
        		$where['is_display'] = 1;
        	}else{
        		$where['parentid'] = 1;
        		$where['is_display'] = 1;
        	}
        	$top1['top'] = D("menu")->where("parentid=0 AND is_display=1")->order('displayorder desc')->select();
        	if(!isset($_GET['pid'])){
        		$a = M("menu")->where('parentid=154  AND is_display=1')->order('displayorder desc')->select();
        		foreach($a as $k=>$v){
        			$arr['parentid'] = $v['pid'];
        			$arr['is_display'] = 1;
        			$er = M("menu")->where($arr)->order('displayorder desc')->select();
        			if(!empty($er)){
        				$a[$k]["children"]= $er;						
        			}
        		}
        		$top1['left']=$a;
        	}
        	$left1 = M("menu")->where($where)->order('displayorder desc')->select();
        	foreach($left as $k=>$v){
        		$arr['parentid'] = $v['pid'];
        		$arr['is_display'] = 1;
        		$erji = M("menu")->where($arr)->select();
        		if(!empty($erji)){
        			$left1[$k]["children"]= $erji;
        		}
        	}
        	//pre($left);
        	
        	
        	foreach ($top1 as $k=>$menu) {
        	    if($isAdmin){
        	        //$menu['href'] = $menu['href'];
        	        $top[$k] = $menu;
        	    }else{
        	        $authObj = new Auth();
        	        $authList = $authObj->getAuthList($this->uid);
        	        if (in_array(strtolower($menu['href']), $authList) || $menu['href'] == '') {
        	            //$menu['href'] = $menu['href'];
        	            $top[$k] = $menu;
        	        }
        	    }
        	}

        	foreach ($left1 as $k=>$menu) {
        	    if($isAdmin){
        	        //$menu['href'] = U($menu['href']);
        	        $left[$k] = $menu;
        	    }else{
        	        $authObj = new Auth();
        	        $authList = $authObj->getAuthList($this->uid);
        	        //pre($authList);
        	        if (in_array(strtolower($menu['href']), $authList) || $menu['href'] == '') {
        	            //$menu['href'] = U($menu['href']);
        	            $left[$k] = $menu;
        	        }
        	    }
        	}
        	//pre($left);
        	if(!isset($_GET['pid']) && $_GET['Param'] == 'index_menu'){
        		echo json_encode($top);
        	}else{
        		echo json_encode($left);
        	}
        }else{
        	$list = D('Menu')->order('displayorder desc')->select();
        	$list = formatTree(listToTree($list));
        	$this->assign('list', $list);
        	$this->display();
        }
    }

    /**
     * 新增菜单
     * @author 九月一十八<2505451091@qq.com>
     */
    public function add() {
        if (IS_POST) {
            $data = I('post.');
            $data['is_display'] = isset($data['is_display']) ? 1 : 0;
            $data['icon'] = htmlspecialchars_decode($data['icon'],ENT_NOQUOTES );
            $res = D('Menu')->add($data);
            if ($res === false) {
                $this->ajaxError('操作失败');
            } else {
                $this->ajaxSuccess('添加成功');
            }
        } else {
            $originList = D('Menu')->order('displayorder desc')->select();
            $parentid = '';
            $id = I('get.id');
            if (!empty($id)) {
                $parentid = $id;
            }
            $options = formatTree(listToTree($originList));
            $this->assign('options', $options);
            $this->assign('parentid', $parentid);
            $this->display();
        }
    }

    /**
     * 显示菜单
     * @author 九月一十八<2505451091@qq.com>
     */
    public function open() {
        $id = I('post.id');
        $res = D('Menu')->where(array('pid' => $id))->save(array('is_display' => 0));
        if ($res === false) {
            $this->ajaxError('操作失败');
        } else {
            $this->ajaxSuccess('添加成功');
        }
    }

    /**
     * 隐藏菜单
     * @author 九月一十八<2505451091@qq.com>
     */
    public function close() {
        $id = I('post.id');
        $res = D('Menu')->where(array('pid' => $id))->save(array('is_display' => 1));
        if ($res === false) {
            $this->ajaxError('操作失败');
        } else {
            $this->ajaxSuccess('添加成功');
        }
    }

    /**
     * 编辑菜单
     * @author 九月一十八<2505451091@qq.com>
     */
    public function edit() {
        if (IS_GET) {
            $originList = D('Menu')->order('displayorder desc')->select();
            foreach($originList as $k=>$v){
                $originList[$k]['icon'] =  str_replace("&","&amp;",$v['icon']);
            }
            $list = $this->buildArrByNewKey2($originList);           
            $listInfo = $list[I('get.id')];         
            $options = formatTree(listToTree($originList));
            $this->assign('detail', $listInfo);
            $this->assign('options', $options);
            $this->display('add');
        } elseif (IS_POST) {
            $postData = I('post.');
            //pre($postData);
            $postData['is_display'] = isset($postData['is_display']) ? 1 : 0;
            $postData['icon'] = htmlspecialchars_decode($postData['icon'],ENT_NOQUOTES);
            $res = D('Menu')->where(array('pid' => $postData['pid']))->save($postData);
            if ($res === false) {
                $this->ajaxError('操作失败');
            } else {
                $this->ajaxSuccess('编辑成功');
            }
        }
    }

    public function del() {
        $id = I('post.id');
        $childNum = D('Menu')->where(array('parentid' => $id))->count();
        if ($childNum) {
            $this->ajaxError("当前菜单存在子菜单,不可以被删除!");
        } else {
            D('Menu')->where(array('pid' => $id))->delete();
            $this->ajaxSuccess('编辑成功');
        }
    }
    
    public function tub() {
       $this->display();
    }
    
    public function tub2() {
        if(IS_POST){
            $data = I('post.');
            //pre($data);
            foreach($data['arr'] as $k=>$v){
                $a['icon']=$v;
                M("fontawesome")->add($a);
            }
            $this->ajaxSuccess('编辑成功');
            exit;
        }
        
        $list = M("aosen")->select();
        $this->assign("list",$list);
        $this->display();
    }

}