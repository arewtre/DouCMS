<?php
/**
 * @since   2017-07-08
 * @author  九月一十八
 */
 
namespace Admin\Controller;
use Think\Controller;
class FileUploadController extends BaseController {
    private $result="";
    private $type="";
    private $option="";
    private $dest_dir="";
    private $setting="";
    public function _initialize(){
        $this->result = array(
            'error' => 1,
            'message' => '',
            'data' => ''
        );
        $type = $_COOKIE['__fileupload_type'];
        $this->type = in_array($type, array('image','audio')) ? $type : 'image';
        $this->option = array();
        $this->option = $this->array_elements(array('uploadtype', 'global', 'dest_dir'), $_POST);
        $this->option['width'] = intval($this->option['width']);
        $this->option['global'] = !empty($_COOKIE['__fileupload_global']);
        $this->dest_dir = $_COOKIE['__fileupload_dest_dir'];
        if (preg_match('/^[a-zA-Z0-9_\/]{0,50}$/', $this->dest_dir, $out)) {
            $this->dest_dir = trim($this->dest_dir, '/');
            $pieces = explode('/', $this->dest_dir);
            if(count($pieces) > 3){
                $this->dest_dir = '';
            }
        } else {
            $this->dest_dir = '';
        }
    
        $this->setting = Array( "extentions" => Array("gif","jpg","jpeg","png"), "limit" => "500000");
        $uniacid = intval($_SESSION['uid']);
        if (!empty($this->option['global'])) {
            $this->setting['folder'] = "{$this->type}s/global/";
            if (!empty($this->dest_dir)) {
                $this->setting['folder'] .= '/'.$this->dest_dir.'/';
            }
        } else {
            $this->setting['folder'] = "/{$this->type}s/{$uniacid}";
            if(empty($this->dest_dir)){
                $this->setting['folder'] .= '/'.date('Y/m/');
            } else {
                $this->setting['folder'] .= '/'.$this->dest_dir.'/';
            }
        }
    }
    
    public function ajax_upload2(){
        // 根据自己的业务调整上传路径、允许的格式、文件大小
        //pre($_FILE);
        ajax_upload('/upload/image/');
    }
    
    function ajax_upload(){
        // //下面是配置上传类
        //pre($_FILES);
        $config = array(
            'maxSize'    =>    3145728,
            'rootPath'   =>    './Upload/images/',//文件上传保存的根路径
            'savePath'   =>    '',//文件上传的保存路径（相对于根路径）
            'exts'       =>    array('jpg', 'gif', 'png', 'jpeg'),//允许上传的文件后缀（留空为不限制），使用数组或者逗号分隔的字符串设置
            // 'mimes'      =>    array(),//允许上传的文件类型（留空为不限制），使用数组或者逗号分隔的字符串设置
            'saveName'   =>    date('YmdHis').rand(1,9999),
            // 'saveExt'    =>    'jpg',//上传文件的保存后缀，不设置的话使用原文件后缀
            // 'replace'    =>    false,//存在同名文件是否是覆盖，默认为false
            'autoSub'    =>    false,//自动使用子目录保存上传文件 默认为true
            'subName'    =>    array('date','YmdHis'),//子目录创建方式，采用数组或者字符串方式定义
        );
        $upload = new \Think\Upload($config);// 实例化上传类
        $info = $upload->upload();
        if(!$info){
            $this->error($upload->getError());
        }else{
            echo json_encode($info);//上传成功就输出返回的结果
        }
    }
    
    /**
     * 上传图片/音频/视频
     */
    public function upload(){
        if (empty($_FILES['file']['name'])) {
            $this->result['message'] = '上传失败, 请选择要上传的文件！';
            die(json_encode($result));
        }
        if ($_FILES['file']['error'] != 0) {
            $this->result['message'] = '上传失败, 请重试.';
            die(json_encode($this->result));
        }
        if (!$this->file_is_image($_FILES['file']['name'])) {
            $this->result['message'] = '上传失败, 请重试.';
            die(json_encode($this->result));
        }
        if(empty($_GET['type'])){
            $type="image";
        }else{
            $type=$_GET['type'];
        }
        if (!in_array($type, array('image', 'thumb', 'voice', 'video', 'audio'))) {
            return $this->error('未知的上传类型');
        }
    
        $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
        $ext = strtolower($ext);
        $size = intval($_FILES['file']['size']);
        $originname = $_FILES['file']['name'];
        $filename = $this->file_random_name(__ROOT__ .'/Public/'. $this->setting['folder'], $ext);
        $uniacid = intval($_SESSION['uid']);
        $path = "Public/upload/{$type}s/{$uniacid}/" . date('Y-m-d');
        $this->mkdirs($path);
        $pathname = $path ."/". $filename;
        move_uploaded_file($_FILES["file"]["tmp_name"], $pathname);
        $info = array(
            'name' => $originname,
            'ext' => $ext,
            'filename' => $pathname,
            'attachment' => $pathname,
            'url' => tomedia($pathname),
            'is_image' => $type == 'image' ? 1 : 0,
            'filesize' => filesize($pathname),
        );
         
        $data =array(
            'uniacid' => $uniacid,
            'uid' => $uniacid,
            'filename' => $originname,
            'attachment' => $pathname,
            'type' => $type == 'image' ? 1 : 2,
            'createtime' => TIMESTAMP,
        );
        M("upload")->add($data);
        die(json_encode($info));
    }
    
    /**
     * 获取图片列表
     */
    public function local(){
        $types = array('image', 'audio');
        $type = in_array($_GET['type'], $types) ? $_GET['type'] : 'image';
        $typeindex = array('image' => 1, 'audio' => 2);
        $condition = ' WHERE  type = '.$typeindex[$type];
        $year = intval($_GET['year']);
        $month = intval($_GET['month']);
        if($year > 0 || $month > 0) {
            if($month > 0 && !$year) {
                $year = date('Y');
                $starttime = strtotime("{$year}-{$month}-01");
                $endtime = strtotime("+1 month", $starttime);
            } elseif($year > 0 && !$month) {
                $starttime = strtotime("{$year}-01-01");
                $endtime = strtotime("+1 year", $starttime);
            } elseif($year > 0 && $month > 0) {
                $year = date('Y');
                $starttime = strtotime("{$year}-{$month}-01");
                $endtime = strtotime("+1 month", $starttime);
            }
            $condition .= ' AND createtime >= '.$starttime.' AND createtime <= '.$endtime;
        }
        $page = intval($_GET['page']);
        $page = max(1, $page);
        $size = $_GET['pagesize'] ? intval($_GET['pagesize']) : 32;
        $sql = 'SELECT * FROM lin_upload' .$condition.' ORDER BY id DESC LIMIT '.(($page-1)*$size).','.$size;
        $list = M()->query($sql);
        foreach ($list as &$item) {
            $item['url'] = tomedia($item['attachment']);
            $item['createtime'] = date('Y-m-d', $item['createtime']);
            unset($item['uid']);
        }
        $lis['message']['items']= $list;
        //pre($lis);
        $this->ajaxReturn($lis);      
    }
    
    
    public function fetch() {
        $url = trim($_GET['url']);
        $resp = $this->ihttp_get($url);
        if ($this->is_error($resp)) {
            $result['message'] = '提取文件失败, 错误信息: '.$resp['message'];
            die(json_encode($result));
        }
        if (intval($resp['code']) != 200) {
            $result['message'] = '提取文件失败: 未找到该资源文件.';
            die(json_encode($result));
        }
        $ext = '';
        $types = array('image', 'audio');
        $type = in_array($_GET['type'], $types) ? $_GET['type'] : 'image';
        if ($type == 'image') {
            switch ($resp['headers']['Content-Type']){
                case 'application/x-jpg':
                case 'image/jpeg':
                    $ext = 'jpg';
                    break;
                case 'image/png':
                    $ext = 'png';
                    break;
                case 'image/gif':
                    $ext = 'gif';
                    break;
                default:
                    $result['message'] = '提取资源失败, 资源文件类型错误.';
                    die(json_encode($result));
                    break;
            }
        } else {
            $result['message'] = '提取资源失败, 仅支持图片提取.';
            die(json_encode($result));
        }
    
        if (intval($resp['headers']['Content-Length']) > $this->setting['limit'] * 1024) {
            $result['message'] = '上传的媒体文件过大('.$this->sizecount($size).' > '.$this->sizecount($this->setting['limit'] * 1024);
            die(json_encode($result));
        }
        $originname = pathinfo($url, PATHINFO_BASENAME);
        $filename = $this->file_random_name(__ROOT__ .'/'. $setting['folder'], $ext);
        $pathname = $this->setting['folder'] . $filename;
        $fullname = __ROOT__ . '/Public/upload' . $pathname;
        //pre($fullname);
        if (file_put_contents($fullname, $resp['content']) == false) {
            $result['message'] = '提取失败.';
            die(json_encode($result));
        }
    
    }
    
    function ihttp_get($url) {
        return ihttp_request($url);
    }
    
    /**
     * 计算大小
     */
    public function sizecount($size) {
        if($size >= 1073741824) {
            $size = round($size / 1073741824 * 100) / 100 . ' GB';
        } elseif($size >= 1048576) {
            $size = round($size / 1048576 * 100) / 100 . ' MB';
        } elseif($size >= 1024) {
            $size = round($size / 1024 * 100) / 100 . ' KB';
        } else {
            $size = $size . ' Bytes';
        }
        return $size;
    }
    /**
     * 创建文件夹
     */
    function mkdirs($dir, $mode = 0777)
    {
        if (is_dir($dir) || @mkdir($dir, $mode)) return TRUE;
        if (!$this->mkdirs(dirname($dir), $mode)) return FALSE;
        return @mkdir($dir, $mode);
    }
    /**
     * 重新生成文件名
     */
    public function file_random_name($dir, $ext){
        do {
            $filename = $this->random(30) . '.' . $ext;
        } while (file_exists($dir . $filename));
    
        return $filename;
    }
    /**
     * 删除文件
     */
    public function delete() {
        $id = intval($_POST['id']);
        $media = M('upload')->where(array( 'id' => $id))->find();
        if(empty($media)) {
            exit('文件不存在或已经删除');
        }
        M('upload')->where(array( 'id' => $id))->delete();
        exit();
    }
    
    public function array_elements($keys, $src, $default = FALSE) {
        $return = array();
        if(!is_array($keys)) {
            $keys = array($keys);
        }
        foreach($keys as $key) {
            if(isset($src[$key])) {
                $return[$key] = $src[$key];
            } else {
                $return[$key] = $default;
            }
        }
        return $return;
    }
    /**
     * 判断是否是图片文件
     */
    function file_is_image($url) {
        $pathinfo = pathinfo($url);
        $extension = strtolower($pathinfo['extension']);
        return !empty($extension) && in_array($extension, array('jpg', 'jpeg', 'gif', 'png'));
    }
    
    function random($length, $numeric = FALSE) {
        $seed = base_convert(md5(microtime() . $_SERVER['DOCUMENT_ROOT']), 16, $numeric ? 10 : 35);
        $seed = $numeric ? (str_replace('0', '', $seed) . '012340567890') : ($seed . 'zZ' . strtoupper($seed));
        if ($numeric) {
            $hash = '';
        } else {
            $hash = chr(rand(1, 26) + rand(0, 1) * 32 + 64);
            $length--;
        }
        $max = strlen($seed) - 1;
        for ($i = 0; $i < $length; $i++) {
            $hash .= $seed{mt_rand(0, $max)};
        }
        return $hash;
    }
    
    function is_error($data) {
        if (empty($data) || !is_array($data) || !array_key_exists('errno', $data) || (array_key_exists('errno', $data) && $data['errno'] == 0)) {
            return false;
        } else {
            return true;
        }
    }
}