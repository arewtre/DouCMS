<?php
/**
 * Winner
 * Winner
 */
defined('IN_IA') or exit('Access Denied');

class VideoModule extends WeModule {
	public $tablename = 'video_reply';

	public function fieldsFormDisplay($rid = 0) {
		global $_W;
		load()->func('tpl');
		if (!empty($rid)) {
			$replies = pdo_fetch("SELECT * FROM ".tablename($this->tablename)." WHERE rid = :rid", array(':rid' => $rid));
			$replies = istripslashes($replies);
		}
		include $this->template('form');
	}

	public function fieldsFormValidate($rid = 0) {
		global $_GPC;
		if(empty($_GPC['title'])) {
			return '必须填写有效的视频标题.';
		}
		if (empty($_GPC['mediaid'])) {
			return '必须上传有效的视频.';
		}
		$this->replies['title'] = $_GPC['title'];
		$this->replies['mediaid'] = $_GPC['mediaid'];
		$this->replies['description'] = $_GPC['description'];
		$this->replies['createtime'] = time();
		return '';
	}

	public function fieldsFormSubmit($rid = 0) {
		global $_GPC, $_W;
		$sql = 'DELETE FROM '. tablename($this->tablename) . ' WHERE `rid`=:rid';
		$pars = array();
		$pars[':rid'] = $rid;
		pdo_query($sql, $pars);
		$this->replies['rid'] = $rid;
		pdo_insert($this->tablename, $this->replies);
		return true;
	}

	public function ruleDeleted($rid = 0) {
		global $_W;
		$replies = pdo_fetchall("SELECT id FROM ".tablename($this->tablename)." WHERE rid = '$rid'");
		$deleteid = array();
		if (!empty($replies)) {
			foreach ($replies as $index => $row) {
				$deleteid[] = $row['id'];
			}
		}
		pdo_delete($this->tablename, "id IN ('".implode("','", $deleteid)."')");
		return true;
	}
	
}
