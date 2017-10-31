<?php
namespace Home\Controller;
class IndexController extends BaseController {
    
    public function index(){
        $user = isset($_SESSION['userid']) ? $_SESSION['userid'] :null;
        if($user=NULL){
            $data = M("article as a")->join('lin_article_category  as ac   on ac.pid = a.art_pid ')->where("a.art_publish=1 AND a.art_isshow=1 AND art_isdel=0")->order("a.art_addtime desc")->select();       
            $video = M("video as v")->join('lin_video_category  as vc   on vc.pid = v.v_cid ')->where("is_top = 1")->order("v.v_create_time desc")->find();
            $banner = M("banner")->where(array("state"=>1,"is_show"=>0))->order("displayorder desc")->select();
        }else{
            $data = M("article as a")->join('lin_article_category  as ac   on ac.pid = a.art_pid ')->where("a.art_publish=1 AND art_isdel=0")->order("a.art_addtime desc")->select();       
            $video = M("video as v")->join('lin_video_category  as vc   on vc.pid = v.v_cid ')->where("is_top = 1")->order("v.v_create_time desc")->find();
            $banner = M("banner")->where(array("state"=>1))->order("displayorder desc")->select();
        }
        //pre($video);
        $vlist = M("video as v")->join('lin_video_category  as vc on vc.pid = v.v_cid ')->where("is_top = 1")->order("v.v_create_time desc")->limit(0,2)->select();
        $vlist = M("video as v")->join('lin_video_category  as vc on vc.pid = v.v_cid ')->where("is_top = 1")->order("v.v_create_time desc")->limit(0,2)->select();
        $msg = M("msg")->order("addtime desc")->select();
        
        $this->assign("list",$data);
        $this->assign("banner",$banner);
        $this->assign("vlist",$vlist);
        $this->assign("video",$video);
        $this->assign("msg",$msg);
        $this->display();
    }

}