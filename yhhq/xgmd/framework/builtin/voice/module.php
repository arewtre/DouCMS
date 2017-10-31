<?php
/**
 * Winner
 * Winner
 */
defined('IN_IA') or exit('Access Denied');

class VoiceModule extends WeModule {
	public $tablename = 'voice_reply';
	private $replies = '';

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
			return '必须填写有效的语音标题.';
		}
		if (empty($_GPC['mediaid'])) {
			return '必须上传有效的语音.';
		}
		$this->replies['title'] = $_GPC['title'];
		$this->replies['mediaid'] = $_GPC['mediaid'];
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
		pdo_delete($this->tablename, array('rid' => $rid));
	}
	
}
