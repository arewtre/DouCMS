<?php
/**
 * @since   2017-07-08
 * @author  九月一十八 
 */

namespace Admin\Controller;

class WebController extends BaseController {

    public function index() {
        $list = D('SiteMenu')->order('displayorder desc')->select();
        $list = formatTree(listToTree($list));
        $this->assign('list', $list);
        $this->display();
    }

	/**
     * 新增栏目
     * @author  九月一十八 
     */
    public function add() {
        if (IS_POST) {
            $data = I('post.');
            $data['is_display'] = isset($data['is_display']) ? 1 : 0;
            $res = D('SiteMenu')->add($data);
            if ($res === false) {
                $this->ajaxError('操作失败');
            } else {
                $this->ajaxSuccess('添加成功');
            }
        } else {
            $originList = D('SiteMenu')->order('displayorder desc')->select();
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
     * 显示栏目
     * @author  九月一十八 
     */
    public function open() {
        $id = I('post.id');
        $res = D('SiteMenu')->where(array('pid' => $id))->save(array('is_display' => 0));
        if ($res === false) {
            $this->ajaxError('操作失败');
        } else {
            $this->ajaxSuccess('添加成功');
        }
    }

    /**
     * 隐藏栏目
     * @author  九月一十八 
     */
    public function close() {
        $id = I('post.id');
        $res = D('SiteMenu')->where(array('pid' => $id))->save(array('is_display' => 1));
        if ($res === false) {
            $this->ajaxError('操作失败');
        } else {
            $this->ajaxSuccess('添加成功');
        }
    }

    /**
     * 编辑栏目
     * @author  九月一十八 
     */
    public function edit() {
        if (IS_GET) {
            $originList = D('SiteMenu')->order('displayorder desc')->select();
            $list = $this->buildArrByNewKey2($originList);           
            $listInfo = $list[I('get.id')];         
            $options = formatTree(listToTree($originList));
            $this->assign('detail', $listInfo);
            $this->assign('options', $options);
            $this->display('add');
        } elseif (IS_POST) {
            $postData = I('post.');
            $postData['is_display'] = isset($postData['is_display']) ? 1 : 0;
            $res = D('SiteMenu')->where(array('pid' => $postData['pid']))->save($postData);
            if ($res === false) {
                $this->ajaxError('操作失败');
            } else {
                $this->ajaxSuccess('编辑成功');
            }
        }
    }
    /**
     * 删除栏目
     * @author  九月一十八tpl_form_field_color
     */
    public function del() {
        $id = I('post.id');
        $childNum = D('SiteMenu')->where(array('parentid' => $id))->count();
        if ($childNum) {
            $this->ajaxError("当前栏目存在子栏目,不可以被删除!");
        } else {
            D('SiteMenu')->where(array('pid' => $id))->delete();
            $this->ajaxSuccess('编辑成功');
        }
    }
    
    /**
     * tags
     * @author  九月一十八tpl_form_field_color
     */
    public function tags() {
        $this->display();
    }

}