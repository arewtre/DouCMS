<?php
/**
 * @since   2017-07-08
 * @author  九月一十八 
 */

namespace Admin\Controller;
use Admin\ORG\MySQLReback;
class BakController extends BaseController {
	//private $dataname;
	
	public function index() {
		$dbname = C("DB_NAME");
		$DataDir = "databak/";
		mkdir($DataDir);
		if (!empty($_GET['Action'])) {
			$config = array(
					'host' => C('DB_HOST'),
					'port' => C('DB_PORT'),
					'userName' => C('DB_USER'),
					'userPassword' => C('DB_PWD'),
					'dbprefix' => C('DB_PREFIX'),
					'charset' => 'UTF8',
					'path' => $DataDir,
					'isCompress' => 0, //是否开启gzip压缩
					'isDownload' => 0
			);
			$mr = new MySQLReback($config);
			$mr->setDBName(C('DB_NAME'));
			if ($_GET['Action'] == 'backup') {
				$mr->backup();
				$this->ajaxReturn(array("code"=>1,'msg'=>"数据库备份成功！"));
			} elseif ($_GET['Action'] == 'RL') {
				$mr->recover($_GET['File']);
				$this->ajaxReturn(array("code"=>1,'msg'=>"数据库还原成功！"));
			} elseif ($_GET['Action'] == 'Del') {
				if (@unlink($DataDir . $_GET['File'])) {
					$this->ajaxReturn(array("code"=>1,'msg'=>"数据库备份删除成功！"));					
				} else {
					$this->ajaxReturn(array("code"=>0,'msg'=>"数据库备份删除失败！"));
				}
			}
			if ($_GET['Action'] == 'download') {
	
				function DownloadFile($fileName) {
					ob_end_clean();
					header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
					header('Content-Description: File Transfer');
					header('Content-Type: application/octet-stream');
					header('Content-Length: ' . filesize($fileName));
					header('Content-Disposition: attachment; filename=' . basename($fileName));
					readfile($fileName);
				}
				DownloadFile($DataDir . $_GET['file']);
				exit();
			}
			if($_GET['Action']="addTable"){
				
			}
		}

		$tables = M()->query("select TABLE_NAME ,table_rows from INFORMATION_SCHEMA.TABLES  where TABLE_SCHEMA='".$dbname."'");
		$lists = $this->MyScandir('databak/');
		//pre($tables);
		foreach($tables as $k=>$v){
			$tables[$k]['zdnum']= M()->query("select count(*) from information_schema.`COLUMNS` where TABLE_SCHEMA='".$dbname."' AND table_name='".$v['table_name']."'");
		}
		if(isset($_GET['biaoname'])){
			$biao = M()->query("select column_name from information_schema.columns where table_schema='".$dbname."' and table_name='".$_GET['biaoname']."'");
		}
		$this->assign("datadir",$DataDir);
		$this->assign("tables", $tables);
		//pre($tables);
		$this->assign("lists", $lists);
		$this->assign("biao", $biao);
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
	
	public function edit(){
		$dbname = C("DB_NAME");
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
			//pre($this->dataname);
			$tablename = $_GET['tablename'];
			$dalist = M()->query("select COLUMN_NAME from information_schema.COLUMNS where table_name = '".$tablename."' and table_schema = '".$dbname."'");
			$list = M()->query("select * from ".$tablename);
			//pre($list);
			$this->assign("dalist",$dalist);
			$this->assign("list",$list);
			$this->display();
		}
	}
	
	private function MyScandir($FilePath = './', $Order = 0) {
		$FilePath = opendir($FilePath);
		while (false !== ($filename = readdir($FilePath))) {
			$FileAndFolderAyy[] = $filename;
		}
		$Order == 0 ? sort($FileAndFolderAyy) : rsort($FileAndFolderAyy);
		return $FileAndFolderAyy;
	}

}