<?php
/**
 * 权限和URL和Menu的关联表
 * Author: 赵翔 <756958008@qq.com>
 * Date: 16/1/16
 */
namespace Admin\Model;

class MenuModel extends BaseModel{

	/**
	 * 获取全部菜单
	 * @param  string $type tree获取树形结构 level获取层级结构
	 * @return array       	结构数据
	 */
	public function getTreeData($type='tree',$order=''){
		// 判断是否需要排序
		if(empty($order)){
			$data= $this->select();
		}else{
			$data= $this->order('displayorder is null,'.$order)->select();
		}
		// 获取树形或者结构数据
		if($type=='tree'){
			$data=\Org\Nx\Data::tree($data,'title','pid','parentid');
		}elseif($type="level"){
			$data=\Org\Nx\Data::channelLevel($data,0,'&nbsp;','pid');
			// 显示有权限的菜单
			//$auth=new \Think\Auth();
			$auth=new \Think\Auth();
			foreach ($data as $k => $v) {
				if ($auth->check($v['mca'],$_SESSION['uid'])) {
					foreach ($v['_data'] as $m => $n) {
						if(!$auth->check($n['mca'],$_SESSION['uid'])){
							unset($data[$k]['_data'][$m]);
						}
					}
				}else{
					// 删除无权限的菜单
					unset($data[$k]);
				}
			}
		}
		//pre($data);
		return $data;
	}
}