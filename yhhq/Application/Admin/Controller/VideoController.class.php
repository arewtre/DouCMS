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
 * @author yangweijie <yangweijiester@gmail.com>
 */
class VideoController extends BaseController {

    public function _initialize(){
        $config = array(
            'accessKey'=>C('QINIU_AK'),
            'secrectKey'=>C('QINIU_SK'),
            'bucket'=>C('QINIU_VIDEO_BUCKET'),
            'domain'=>C('QINIU_VIDEO_DOMAIN')
        );
        $this->qiniu = new QiniuStorage($config);
        $cate = D("VideoCategory")->order('displayorder desc')->select();
		$cates = formatTree(listToTree($cate));
		foreach($cates as $k=>$v){
			$re = D("VideoCategory")->where("parentid=".$v['pid'])->select();
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
		if(IS_AJAX){
 			$list = M("video")->order("v_create_time desc")->select();
//         	$this->ajaxReturn($list);
            foreach($list as $k=>$v){
                if($v['v_size']==""){
                   $file = explode("/",$v['v_url']);
                   $detail = $this->qiniu->info($file[3]); 
                   $map['v_size'] = format_bytes($detail['fsize']);
                   M("video")->where(array("v_id"=>$v['v_id']))->save($map);
                }
            }
		    $postData = I('post.');
		    $start = $postData['start'] ? $postData['start'] : 0;
		    $limit = $postData['length'] ? $postData['length'] : 5;
		    $draw = $postData['draw'];
		    $where = array();
		    $getInfo = I('get.');
		    //pre($getInfo);
		  //  if (isset($getInfo['type']) && !empty($getInfo['type'])) {
		  //      if (isset($getInfo['keyword']) && !empty($getInfo['keyword'])) {
		  //          switch ($getInfo['type']) {
		  //              case 1:
		  //                  $where['art_author'] = array('like', '%' . $getInfo['keyword'] . '%');
		  //                  break;
		  //              case 2:
		  //                  $where['nickname'] = array('like', '%' . $getInfo['keyword'] . '%');
		  //                  break;
		  //              case 3:
		  //                  $where['art_status'] = $getInfo['keyword'];
		  //                  break;
		  //          }
		  //      }
		  //  }
		    
		  //  }else{
		  //      $where['v_name'] = array('like', '%' . $getInfo['keyword'] . '%');
		  //  }
		    //pre($where);
		    if (isset($getInfo['time']) && !empty($getInfo['time'][0])) {
		        $star = strtotime($getInfo['time'][0]);
                $end = strtotime($getInfo['time'][1]) + 86399;
                $where['v_create_time'] = array('between',array($star,$end));
		    }
		    if (isset($getInfo['cid']) && !empty($getInfo['cid'])) {
                $where['v_cid'] = $getInfo['cid'];
		    }
		    
		    //pre($where);
		    $total = D('Video')->where($where)->count();
		    $info = D('Video')->where($where)->order('v_create_time desc')->limit($start, $limit)->select();
		    $data = array(
		        'draw'            => $draw,
		        'recordsTotal'    => $total,
		        'recordsFiltered' => $total,
		        'data'            => $info
		    );
		    //pre($data);
		    $this->ajaxReturn($data, 'json');
		}
		$cate = D("VideoCategory")->where($where)->order('displayorder desc')->select();
		$cates = formatTree(listToTree($cate));
		foreach($cates as $k=>$v){
			$re = D("VideoCategory")->where("parentid=".$v['pid'])->select();
			if(!empty($re)){
				$cates[$k]['res']=1;
			}else{
				$cates[$k]['res']=0;
			}
		}
		$this->assign('cates', $cates);
        $this->display();
    }
    
	public function add(){
    	if(IS_POST){
    		$file = $_FILES['fileList'];
    		$arr = explode(".", $file['name']);
    		$file = array(
    			'name'=>'file',
    			'fileName'=>time().rand().".".$arr[count($arr)-1],
    			'fileBody'=>file_get_contents($file['tmp_name'])
    		);
    		$config = array();
    		$result = $this->qiniu->upload($config, $file);
    		$detail = $this->qiniu->info($result['key']);
    		$data['v_url']= "http://".C('QINIU_VIDEO_DOMAIN')."/".$result['key'];
    		$data['v_pic']=$data['v_url']."?vframe/png/offset/1/w/1366/h/768";
    		$data['v_create_time']=time();
    		$data['v_cid'] = $_GET['cid'];
    		$data['v_author'] = $_SESSION['nickname'];
    		$data['v_size'] = format_bytes($detail['fsize']);
    		if($result){
    			$res = M("video")->add($data);
    		}
    		if($res){
    			$this->success('上传成功'//,'', $result
    			);
    		}else{
     			$this->error('上传失败'//,'', array(
    // 				'error'=>$this->qiniu->error,
    // 				'errorStr'=>$this->qiniu->errorStr
    // 			)
    );
    		}
    		exit;
    	}
    	$this->display();
    }
    
    public function edit(){
    	if(IS_POST){
            $data['v_name'] = $_POST['desc'];
            $data['v_cid'] = $_POST['cate_id'];
            //pre($_POST);
            $res = M("video")->where(array("v_id"=>$_POST['id']))->save($data);
    		if($res){
    			$this->ajaxSuccess('修改成功');
    		}else{
    			$this->ajaxError('修改失败');
    		}
    		exit;
    	}
    	$list = M("video")->where(array("v_id"=>$_GET['id']))->find();
    	$this->assign("list",$list);
    	$this->display();
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
     public function del(){
        $file = trim(I('file'));
        $file = explode("/",$file);
        $id = I('get.id');
        if($file){
            $result = $this->qiniu->del($file[3]);
            $result2 = M("video")->where("v_id=".$id)->delete();                
            if(!$result2){
                $this->ajaxError('删除失败');
            }else{
                $this->ajaxSuccess('删除成功');
            }
            
        }else{
            $this->ajaxError('错误的文件名');
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
            $this->success('上传成功','', $result);
        }else{
            $this->error('上传失败','', array(
                'error'=>$this->qiniu->error,
                'errorStr'=>$this->qiniu->errorStr
            ));
        }
        exit;
    }   
    
}
