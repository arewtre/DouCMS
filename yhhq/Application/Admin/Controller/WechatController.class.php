<?php
/**
 * @since   2017-07-08
 * @author  九月一十八
 */
 
namespace Admin\Controller;
use Think\Controller;
use Admin\ORG\Leftnav;
class WechatController extends BaseController {

public function index(){
		$info = D('WxUser')->where('id=1')->find();
        $info['headerpicurl'] = imgUrl($info['headerpic']);
        $info['qrurl'] = imgUrl($info['qr']);
		$this->assign('info',$info);
		$apiurl = 'http://'.$_SERVER['HTTP_HOST'].'/index.php?m=Home&c=Weixin&a=home';
		$this->assign('apiurl',$apiurl);
		$this->display();
	}
	public function weixin(){
		$data = input('post.');
		D('WxUser')->where('id=1')->save($data);
		$result['code'] = 1;
		$result['msg'] = '微信公众号设置修改成功!';
		return $result;
	}


	public function menu(){
	    $wx_menu = D('WxMenu');
		$Leftnav = new Leftnav ();
		$wxMenu= $wx_menu->order('listorder')->select();
		$arr = $Leftnav::menu($wxMenu);
		$this->assign('wxMenu',$arr);
		return $this->display();
	}
    //添加菜单
    public function addMenu(){
        if(request()->isPost()) {
            $data=input('post.');
            $pid = explode(':',$data['pid']);
            $data['pid'] =$pid[1]?$pid[1]:0;
            $pcount = D('WxMenu')->where('pid',0)->count();
            if($pcount>=3 and $data['pid']==0){
                $result['msg'] = '一级菜单最多三个';
                $result['code'] = 0;
                return $result;
            }
            D('WxMenu')->insert($data);
            $result['msg'] = '自定义菜单添加成功';
            $result['code'] = 1;
            $result['url'] = url('menu');
            return $result;
        }else{
            $wx_menu = D('WxMenu');
            $wxTopMenu=$wx_menu->where('pid',0)->order('listorder')->select();
            $this->assign('wxTopMenu',json_encode($wxTopMenu,true));
            $this->assign('title',lang('add').'菜单');
            $this->assign('info','null');
            return $this->fetch('menuForm');
        }
    }

    //修改自定义菜单显示
    public function editMenu(){
        if(request()->isPost()) {
            $data= input('post.');
            $pid = explode(':',$data['pid']);
            $data['pid'] =$pid[1]?$pid[1]:0;
            D('WxMenu')->update($data);
            $result['msg'] = '自定义菜单修改成功';
            $result['code'] = 1;
            $result['url'] = url('menu');
            return $result;
        }else{
            $wx_menu = D('WxMenu');
            $wxTopMenu=$wx_menu->where('pid',0)->order('listorder')->select();
            $this->assign('wxTopMenu',json_encode($wxTopMenu,true));
            $info=D('WxMenu')->where(array('id'=>input('id')))->find();
            $this->assign('info',json_encode($info,true));
            $this->assign('type','edit');
            $this->assign('title',lang('edit').'菜单');
            return $this->fetch('menuForm');
        }

    }
	//自定义菜单排序
	public function menuOrder(){
		$wx_menu=D('WxMenu');
		foreach (input('post.') as $id => $sort){
			$wx_menu->where(array('id' => $id ))->setField('listorder' , $sort);
		}
		$result['code'] = 1;
		$result['msg'] = '排序更新成功!';
        $result['url'] = url('menu');
		return $result;
	}
	//自定义菜单状态修改
    public function menuState(){
        $id=input('id');
        $wxMenu = D('WxMenu');
        $statusone=$wxMenu->where('id',$id)->value('open');//判断当前状态情况
        if($statusone==1){
            $statedata = array('open'=>0);
            $wxMenu->where(array('id'=>$id))->setField($statedata);
            $result['info'] = '状态禁止';
            $result['status'] = 1;
        }else{
            $statedata = array('open'=>1);
            $wxMenu->where(array('id'=>$id))->setField($statedata);
            $result['info'] = '状态开启';
            $result['status'] = 1;
        }
        return $result;
    }
    //删除菜单
    public function delMenu(){
        D('WxMenu')->where(array('id'=>input('id')))->delete();
        $this->redirect('menu');
    }
    //生成菜单
    public function createMenu(){
        $wx=D('WxUser')->where(array('id'=>1))->find();//读取微信配置参数
        $access_token = $this->get_access_token($wx['appid'],$wx['appsecret']);
        //获取父级菜单
        $p_menus = D('WxMenu')->where(array('pid'=>0))->order('id ASC')->select();
        $p_menus = convert_arr_key($p_menus,'id');
        $post_str = $this->convert_menu($p_menus);
        // http post请求
        if(!count($p_menus) > 0){
            $back['info'] = "没有菜单可发布";
            $back['status'] =0;
            return $back;
        }
        $url ="https://api.weixin.qq.com/cgi-bin/menu/create?access_token={$access_token}";
        $return = httpRequest($url,'POST',$post_str);
        $return = json_decode($return,1);
        if($return['errcode'] == 0){
            $back['info'] = "菜单已成功生成";
            $back['status'] =1;
            $this->success('菜单已成功生成',url('menu'));
        }else{
            $back['info'] = "错误代码;".$return['errcode'];
            $back['status'] =0;
            //echo "错误代码;".$return['errcode'];
            //exit;
        }
        return $back;
    }
    //获取微信access_token
    public function get_access_token($appid,$appsecret){
        //判断是否过了缓存期
        $wxUser = D('WxUser');
        $wechat = $wxUser->find();
        $expire_time = $wechat['web_expires'];
        if($expire_time > time()){
            return $wechat['web_access_token'];
        }
        $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid={$appid}&secret={$appsecret}";
        $return = httpRequest($url,'GET');
        $return = json_decode($return,1);
        $web_expires = time() + 7000; // 提前200秒过期
        $wxUser->where(array('id'=>$wechat['id']))->update(array('web_access_token'=>$return['access_token'],'web_expires'=>$web_expires));
        return $return['access_token'];
    }
    //菜单转换
    private function convert_menu($p_menus){
        $new_arr = array();
        $count = 0;
        $wxMenu = D('WxMenu');
        foreach($p_menus as $k => $v){
            $new_arr[$count]['name'] = $v['name'];
            //获取子菜单
            $c_menus = $wxMenu->where(array('pid'=>$k))->select();

            if($c_menus){
                foreach($c_menus as $kk=>$vv){
                    $add = array();
                    $add['name'] = $vv['name'];
                    $add['type'] = $vv['type'];
                    // click类型
                    if($add['type'] == 'click'){
                        $add['key'] = $vv['value'];
                    }elseif($add['type'] == 'view'){
                        $add['url'] = $vv['value'];
                    }else{
                        $add['key'] = $vv['value'];
                    }
                    $add['sub_button'] = array();
                    if($add['name']){
                        $new_arr[$count]['sub_button'][] = $add;
                    }
                }
            }else{
                $new_arr[$count]['type'] = $v['type'];
                // click类型
                if($new_arr[$count]['type'] == 'click'){
                    $new_arr[$count]['key'] = $v['value'];
                }elseif($new_arr[$count]['type'] == 'view'){
                    //跳转URL类型
                    $new_arr[$count]['url'] = $v['value'];
                }else{
                    //其他事件类型
                    //$new_arr[$count]['key'] = $key_map[$v['type']];
                    $new_arr[$count]['key'] = $v['value'];  //2016年9月29日01:40:13
                }
            }
            $count++;
        }
        return json_encode(array('button'=>$new_arr),JSON_UNESCAPED_UNICODE);
    }

    //文本回复
    public function text(){
        if(request()->isPost()) {
            $page =input('pageIndex');
            $pageSize =input('pageSize');
            $list = Db::table('clt_wx_keyword')->alias('k')
                ->join('clt_wx_text t', 't.id = k.pid', 'left')
                ->field('k.id,k.keyword,t.text')
                ->where('type', 'TEXT')
                ->order('t.createtime DESC')
                ->paginate(array('list_rows'=>$pageSize,'page'=>$page))
                ->toArray();
            // 模板变量赋值
            $rsult['list'] = $list['data'];
            $rsult['count'] = $list['total'];
            $rsult['rel'] = 1;
            echo json_encode($rsult);
            exit;
        }
        return $this->fetch();
    }
    // 添加文本回复
    public function addText(){
        if(request()->isPost()) {
            $data =  input('post.');
            //添加模式
            $data['createtime'] = time();
            $data['pid'] = D('WxText')->insertGetId($data);
            unset($data['text']);
            unset($data['createtime']);
            $data['type'] = 'TEXT';
            D('WxKeyword')->insert($data);
            $result['code'] = 1;
            $result['msg'] = '添加成功!';
            $result['url'] = url('text');
            return $result;
        }else{
            $this->assign('title', lang('add') . '文本回复');
            $this->assign('info', 'null');
            return $this->fetch('textForm');
        }
    }

    public function delText(){
        $id = input('id');
        $row = D('WxKeyword')->where(array('id'=>$id))->find();
        if($row){
            D('WxKeyword')->where(array('id'=>$id))->delete();
            D('WxText')->where(array('id'=>$row['pid']))->delete();
            $this->redirect('text');
        }
    }
    //修改文本回复
    public function editText(){
        if(request()->isPost()) {
            $map['id'] = input('post.id');
            $data['keyword'] =  input('post.keyword');
            D('WxKeyword')->where($map)->update($data);

            $where['id'] = D('WxKeyword')->where($map)->value('pid');
            $data['text'] = input('post.text');//添加模式
            $data['updatetime'] = time();
            $data['pid'] = D('WxText')->where($where)->update($data);

            $result['code'] = 1;
            $result['msg'] = '修改成功!';
            $result['url'] = url('text');
            return $result;
        }else{
            $info = Db::table('clt_wx_keyword')->alias('k')
                ->join('clt_wx_text t','t.id = k.pid','left')
                ->field('k.id,k.keyword,t.text')
                ->where('k.id',input('id'))
                ->find();
            $this->assign('title', lang('edit') . '文本回复');
            $this->assign('info',json_encode($info,true));
            return $this->fetch('textForm');
        }
    }

    //图文列表
    public function img(){
        if(request()->isPost()) {
            $page =input('pageIndex');
            $pageSize =input('pageSize');
            $list=Db::table('clt_wx_keyword')->alias('k')
                ->join('clt_wx_img i','i.id = k.pid','left')
                ->field('k.id,k.keyword,i.title,i.url,i.pic,i.desc')
                ->where('type','IMG')
                ->order('i.createtime DESC')
                ->paginate(array('list_rows'=>$pageSize,'page'=>$page))
                ->toArray();
            // 模板变量赋值
            $rsult['list'] = $list['data'];
            $rsult['count'] = $list['total'];
            $rsult['rel'] = 1;
            echo json_encode($rsult);
            exit;
        }
        return $this->fetch();
    }

    // 添加图文列表
    public function addImg(){
        if(request()->isPost()) {
            $add['keyword'] =  db('post.keyword');
            $data = input('post.');
            //添加模式
            $data['createtime'] = time();
            $id =  D('WxImg')->insertGetId($data);
            $data['pid'] = $id;
            $data['type'] = 'IMG';
            if(D('WxKeyword')->insert($data)){
                $result['code'] = 1;
                $result['msg'] = '添加成功!';
                $result['url'] = url('img');
            }else{
                $result['code'] = 0;
                $result['msg'] = '添加失败!';
            }
            return $result;
        }else{
            $this->assign('title', lang('add') . '图文回复');
            $this->assign('info', 'null');
            return $this->fetch('imgForm');
        }

    }

    //删除图文列表
    public function delImg(){
        $id = input('id');
        $row = D('WxKeyword')->where(array('id'=>$id))->find();
        if($row){
            D('WxKeyword')->where(array('id'=>$id))->delete();
            D('WxImg')->where(array('id'=>$row['pid']))->delete();
            $this->redirect('img');
        }
    }

    public function editImg(){
        if(request()->isPost()) {
            $map['id'] = input('post.id');
            $data['keyword'] =  input('post.keyword');
            D('WxKeyword')->where($map)->update($data);

            $where['id'] = D('WxKeyword')->where($map)->value('pid');

            $data['title'] = input('post.title');
            $data['url'] = input('post.url');
            $data['pic'] = input('post.pic');
            $data['desc'] = input('post.desc');
            $data['updatetime'] = time();
            $data['pid'] = D('WxImg')->where($where)->update($data);

            $result['code'] = 1;
            $result['msg'] = '修改成功!';
            $result['url'] = url('img');
            return $result;
        }else{
            $info = Db::table('clt_wx_keyword')->alias('k')
                ->join('clt_wx_img i','i.id = k.pid','left')
                ->field('k.id,k.keyword,i.title,i.url,i.pic,i.desc')
                ->where('k.id',input('id'))
                ->find();
            $info['thumb'] = imgUrl($info['pic']);

            $this->assign('title', lang('edit') . '图文回复');
            $this->assign('info',json_encode($info,true));
            return $this->fetch('imgForm');
        }
    }

}