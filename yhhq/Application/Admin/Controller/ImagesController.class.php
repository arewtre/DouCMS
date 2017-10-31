<?php
/**
 * @since   2017-07-08
 * @author  九月一十八 
 */
namespace Admin\Controller;
use Think\Controller;
use Think\Upload\Driver\Qiniu\QiniuStorage;

/**
 * 七牛扩展类测试控制器
 */
class ImagesController extends BaseController {

    public function _initialize(){
        $config = array(
            'accessKey'=>C('QINIU_AK'),
            'secrectKey'=>C('QINIU_SK'),
            'bucket'=>C('QINIU_IMAGE_BUCKET'),
            'domain'=>C('QINIU_IMAGE_DOMAIN')
        );
        $this->qiniu = new QiniuStorage($config);
        $cate = D("ImagesCategory")->order('displayorder desc')->select();
		$cates = formatTree(listToTree($cate));
		foreach($cates as $k=>$v){
			$re = D("ImagesCategory")->where("parentid=".$v['pid'])->select();
			if(!empty($re)){
				$cates[$k]['res']=1;
			}else{
				$cates[$k]['res']=0;
			}
		}
		$this->assign('cates', $cates);
    }

    //获取文件列表
    public function index(){    	 
	//	$start = $_GET['page'] ? $_GET['page'] : 0;
	//	$limit = 25;
		$where = array();
		if(!empty($_GET['cate_id'])){
			$where['cat_id'] = $_GET['cate_id'];
		}
		if(IS_AJAX){    
		    $list = M("image")->where($where)->order("create_time desc")->select();
        	$this->ajaxReturn($list);
		}
		

		//$list = M("image")->where($where)->order("create_time desc")->limit($start, $limit)->select();
		$list = M("image")->where($where)->order("create_time desc")->select();
		//pre($list);
		foreach($list as $k=>$v){
            if($v['image_size']==""){
               $file = explode("/",$v['image_url']);
               $detail = $this->qiniu->info($file[3]); 
               $map['image_size'] = format_bytes($detail['fsize']);
               M("image")->where(array("img_id"=>$v['img_id']))->save($map);
            }
        }
		$num = count($list);
		$this->assign('num', $num);
		$this->assign('list', $list);
		$this->assign('cat_id', $cat_id);
        $this->display();
    }
    public function add(){
    	if(IS_POST){
    		if(!empty($_POST['cid'])){
    		    //pre($_POST);
    		    $da = json_decode($_POST['res']);
        	    $data['image_url']= "http://".C('QINIU_IMAGE_DOMAIN')."/".$da->data;
        		$data['create_time']=time();
        		$data['cat_id'] = $_POST['cid'];
        		$data['image_desc'] = $_POST['desc'];
        		$res = M("image")->add($data);
        		$this->ajaxSuccess('上传成功');
        	}
    		
    		$file = $_FILES['file'];
    		$arr = explode(".", $file['name']);
    		$file = array(
    				'name'=>'file',
    				'fileName'=>time().rand().".".$arr[count($arr)-1],
    				'fileBody'=>file_get_contents($file['tmp_name'])
    		);
    		$config = array();
    		$res = $this->qiniu->upload($config, $file);
    		if($res){
    			$this->ajaxSuccess('七牛上传成功',1,$res['key']);
    		}else{
    			$this->ajaxError('七牛上传失败');
    		}
    		exit;
    	}
    	
    	$this->display();
    }
    
    public function edit(){
    	if(IS_POST){
            $data['image_desc'] = $_POST['desc'];
            $data['cate_id'] = $_POST['cate_id'];
            //pre($_POST);
            $res = M("image")->where(array("img_id"=>$_POST['id']))->save($data);
    		if($res){
    			$this->ajaxSuccess('修改成功');
    		}else{
    			$this->ajaxError('修改失败');
    		}
    		exit;
    	}
    	$list = M("image")->where(array("img_id"=>$_GET['id']))->find();
    	$this->assign("list",$list);
    	$this->display();
    }

    public function del(){
       $file = trim(I('file'));
       $file = explode("/",$file);
       $id = I('id');
        if($file){
            $result = $this->qiniu->del($file[3]);
            $result2 = M("image")->where("img_id=".$id)->delete();                
            if(!$result2){
                $this->ajaxError('删除失败');
            }else{
                $this->ajaxSuccess('删除成功');
            }
            
        }else{
            $this->ajaxError('错误的文件名');
        }
    }

    public function dealImage($key){
        $url = $this->qiniu->dealWithType($key, 'img') ;
        redirect($url);
    }

    public function dealDoc($key){
        $url = $this->qiniu->dealWithType($key, 'doc');
        redirect($url);
    }

    public function rename(){
        $key = I('get.fileList');
        $new = I('new_name');
        $result = $this->qiniu->rename($key, $new);
        if(false === $result){
            trace($this->qiniu->error);
            $this->error($this->qiniu->errorStr);
        }else{
            $this->success('改名成功');
        }
    }

    public function batchDel(){
        $files = $_GET['key'];
        if(is_array($files) && $files !== array()){
            $files = array_column($files,'value');
            $result = $this->qiniu->delBatch($files);
            if(false === $result){
                $this->error($this->qiniu->errorStr);
            }else{
                $this->success('删除成功');
            }
        }else{
            $this->error('请至少选择一个文件');
        }
    }

    public function detail($key){
        $result = $this->qiniu->info($key);
        if($result){
            if(in_array($result['mimeType'], array('image/jpeg','image/png'))){
                $img = "<img src='{$this->qiniu->downlink($key)}?imageView/2/w/203/h/203'>";
            }else{
                $img = '<img class="file-prev" src="https://dn-portal-static.qbox.me/v104/static/theme/default/image/resource/no-prev.png">';
            }
            $time = date('Y-m-d H:i:s', bcmul(substr(strval($result['putTime']), 0, 11),"1000000000"));
            $filesize = format_bytes($result['fsize']);
            $tpl = <<<tpl
            <div class="right-head">
                {$key}
            </div>
            <div class="right-body">
                <div class="right-body-block">
                    <div class="prev-block">
                        {$img}
                    </div>
                    <p class="file-info-item">
                        外链地址：<input class="file-share-link" type="text" readonly="readonly" value="{$this->qiniu->downlink($key)}">
                    </p>
                    <p class="file-info-item">
                        最后更新时间：<span>{$time}</span>
                    </p>
                    <p class="file-info-item">
                        文件大小：<span class="file-size">{$filesize}</span>
                    </p>
                </div>
            </div>
tpl;
            $this->success('as', '', array('tpl'=>$tpl));
        }else{
            $this->error('获取文件信息失败');
        }

    }

    //上传单个文件 用uploadify
    public function uploadOne(){
        $file = $_FILES['fileList'];
        //pre($file);
        $arr=explode(".", $file['name']);
        $file = array(
            'name'=>'file',
            //'fileName'=>$file['name'],
        	'fileName'=>time().rand().".".$arr[count($arr)-1],
            'fileBody'=>file_get_contents($file['tmp_name'])
        );
        $config = array();
        $result = $this->qiniu->upload($config, $file);
        //pre($result);die;
        $data['image_url']= "http://oiwban6zi.bkt.clouddn.com/".$result['key'];
        $data['create_time']=time();
        $data['cat_id'] = $_GET['cid'];
        if($result){
        	$res = M("image")->add($data);
        }
        
        if($res){
            //$this->success('上传成功','', $result);
        }else{
            //$this->error('上传失败','', array(
                //'error'=>$this->qiniu->error,
                //'errorStr'=>$this->qiniu->errorStr
            //));
        }
        exit;
    }   
    
}
