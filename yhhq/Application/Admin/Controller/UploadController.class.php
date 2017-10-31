<?php
namespace Admin\Controller;
class UploadController extends BaseController {
    /**
     * TP上传类
     * @author  九月一十八
     */
    public  function upload(){
        $config = array(
            'maxSize'    =>    31457280,
            'rootPath'   =>    './Public/upload/images/',//文件上传保存的根路径
            'savePath'   =>    '',//文件上传的保存路径（相对于根路径）
            'exts'       =>    array('jpg', 'gif', 'png', 'jpeg'),//允许上传的文件后缀（留空为不限制），使用数组或者逗号分隔的字符串设置
            // 'mimes'      =>    array(),//允许上传的文件类型（留空为不限制），使用数组或者逗号分隔的字符串设置
            'saveName'   =>    date('YmdHis').rand(1,9999),
            // 'saveExt'    =>    'jpg',//上传文件的保存后缀，不设置的话使用原文件后缀
            // 'replace'    =>    false,//存在同名文件是否是覆盖，默认为false
            'autoSub'    =>    true,//自动使用子目录保存上传文件 默认为true
            'subName'    =>    array('date','Y-m-d'),//子目录创建方式，采用数组或者字符串方式定义
        );
        $upload = new \Think\Upload($config);// 实例化上传类
        $info = $upload->upload();   
        $infos['url'] = __ROOT__.$config['rootPath'].$info['imgFile']['savepath'].$info['imgFile']['savename'];   
        $infos['error']=0;
        if(!$info){
            $this->error($upload->getError());
        }else{
            $this->ajaxReturn($infos);//上传成功就输出返回的结果
        }
    }
   
    /**
     * 删除图片
     * @author  九月一十八
     */
    public function del() {
        $delurl = $_POST['pic'];
        if ($this->file_delete($delurl)) {
            echo 1;
        } else {
            echo 0;
        }
    }
    /**
     * 删除文件
     * @author  九月一十八
     */
    public function file_delete($file) {
        if (empty($file)) {
            return FALSE;
        }
        if (file_exists($file)) {
            unlink($file);
        }
        return TRUE;
    }
    
    /**
     * 管理文件列表
     * @author  九月一十八
     */
    public function manager(){
        //根目录路径，可以指定绝对路径，比如 /var/www/attached/
        $root_path =  IA_ROOT . '/Public/upload/images/';
        //pre($root_path);
        //根目录URL，可以指定绝对路径，比如 http://www.yoursite.com/attached/
        $root_url =  '/Public/upload/images/';
        $root_u = 'Public/upload/images/';
        //图片扩展名
        $ext_arr = array('gif', 'jpg', 'jpeg', 'png', 'bmp');
        //目录名
        $dir_name = empty($_GET['dir']) ? '' : trim($_GET['dir']);
        if (!in_array($dir_name, array('', 'image', 'flash', 'media', 'file'))) {
            echo "Invalid Directory name.";
            exit;
        }   
        //根据path参数，设置各路径和URL
        if (empty($_GET['path'])) {
            $current_path = $root_path;
            $current_url = $root_url;
            $current_u = $root_u;
            $current_dir_path = '';
            $moveup_dir_path = '';
        } else {
            $current_path = realpath($root_path) . '/' . $_GET['path'];
            $current_url = $root_url . $_GET['path'];
            $current_u = $root_u. $_GET['path'];
            $current_dir_path = $_GET['path'];
            $moveup_dir_path = preg_replace('/(.*?)[^\/]+\/$/', '$1', $current_dir_path);
        }

        //排序形式，name or size or type
        $order = empty($_GET['order']) ? 'name' : strtolower($_GET['order']);
    
        //不允许使用..移动到上一级目录
        if (preg_match('/\.\./', $current_path)) {
            echo 'Access is not allowed.';
            exit;
        }
        //最后一个字符不是/
        if (!preg_match('/\/$/', $current_path)) {
            echo 'Parameter is not valid.';
            exit;
        }
        //目录不存在或不是目录
        if (!file_exists($current_path) || !is_dir($current_path)) {
            echo 'Directory does not exist.';
            exit;
        }
    
        //遍历目录取得文件信息
        $file_list = array();
        if ($handle = opendir($current_path)) {
            $i = 0;
            while (false !== ($filename = readdir($handle))) {
                if ($filename{0} == '.') continue;
                $file = $current_path . $filename;
                if (is_dir($file)) {
                    $file_list[$i]['is_dir'] = true; //是否文件夹
                    $file_list[$i]['has_file'] = (count(scandir($file)) > 2); //文件夹是否包含文件
                    $file_list[$i]['filesize'] = 0; //文件大小
                    $file_list[$i]['is_photo'] = false; //是否图片
                    $file_list[$i]['filetype'] = ''; //文件类别，用扩展名判断
                } else {
                    $file_list[$i]['is_dir'] = false;
                    $file_list[$i]['has_file'] = false;
                    $file_list[$i]['filesize'] = filesize($file);
                    $file_list[$i]['dir_path'] = '';
                    $file_ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                    $file_list[$i]['is_photo'] = in_array($file_ext, $ext_arr);
                    $file_list[$i]['filetype'] = $file_ext;
                }
                $file_list[$i]['filename'] = $filename; //文件名，包含扩展名
                $file_list[$i]['datetime'] = date('Y-m-d H:i:s', filemtime($file)); //文件最后修改时间
                $i++;
            }
            closedir($handle);
        }
       //pre($file_list) ;
        
        //排序
        function cmp_func($a, $b) {
            global $order;
            if ($a['is_dir'] && !$b['is_dir']) {
                return -1;
            } else if (!$a['is_dir'] && $b['is_dir']) {
                return 1;
            } else {
                if ($order == 'size') {
                    if ($a['filesize'] > $b['filesize']) {
                        return 1;
                    } else if ($a['filesize'] < $b['filesize']) {
                        return -1;
                    } else {
                        return 0;
                    }
                } else if ($order == 'type') {
                    return strcmp($a['filetype'], $b['filetype']);
                } else {
                    return strcmp($a['filename'], $b['filename']);
                }
            }
        }
        
        usort($file_list, 'cmp_func');
        //$sitepath = substr($_SERVER['PHP_SELF'], 0, strrpos($_SERVER['PHP_SELF'], '/'));    
        $siteroot = htmlspecialchars('http://'.$_SERVER['HTTP_HOST'].__ROOT__);   
        $result = array();   
        //相对于根目录的上一级目录
        $result['moveup_dir_path'] = $moveup_dir_path;
        //相对于根目录的当前目录
        $result['current_dir_path'] = $current_dir_path;
        //当前目录的URL
        $result['current_url'] =  $siteroot."/".$current_u;
        //$result['current_url'] = $current_u;
        //文件数
        $result['total_count'] = count($file_list);
        //文件列表数组
        $result['file_list'] = $file_list;
        //输出JSON字符串
       // pre($result);
        $this->ajaxReturn($result);
    }

}