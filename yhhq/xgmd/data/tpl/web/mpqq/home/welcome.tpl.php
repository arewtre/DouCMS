<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
 <?php 
 global $_W;
$uniacid = empty($uniacid) ? $_W['uniacid'] : 0;
$accounttype = 
     pdo_fetch("SELECT * FROM " . tablename('account_wechats') . " WHERE uniacid = :uniacid ", array(':uniacid' => $uniacid));
$isconnect = 
     pdo_fetch("SELECT * FROM " . tablename('account') . " WHERE uniacid = :uniacid ", array(':uniacid' => $uniacid));
$num = pdo_fetchcolumn('SELECT COUNT(fanid) FROM '.tablename('mc_mapping_fans').' WHERE uniacid=:uniacid AND follow=1', array(':uniacid'=> $_W['uniacid']));
	$fansnum = intval($num);
if ( pdo_tableexists('stat_fans'))
{ $today_stat = pdo_get('stat_fans', array('date' => date('Ymd'), 'uniacid' => $_W['uniacid']));
$today_add_num = intval($today_stat['new']); //今日新增
$today_cancel_num = intval($today_stat['cancel']);//今日取消
$today_jing_num = $today_add_num - $today_cancel_num;//今日净增
} else {

$today_add_num = pdo_fetchcolumn('SELECT COUNT(*) FROM ' . tablename('mc_mapping_fans') . ' WHERE acid = :acid AND uniacid = :uniacid AND follow = :follow AND followtime >= :starttime AND followtime <= :endtime', array(':acid' => $_W['acid'], ':uniacid' => $_W['uniacid'], ':starttime' => strtotime(date('Y-m-d')), ':endtime' => TIMESTAMP, ':follow' => 1));
$today_cancel_num = pdo_fetchcolumn('SELECT COUNT(*) FROM ' . tablename('mc_mapping_fans') . ' WHERE acid = :acid AND uniacid = :uniacid AND follow = :follow AND unfollowtime >= :starttime AND unfollowtime <= :endtime', array(':acid' => $_W['acid'], ':uniacid' => $_W['uniacid'], ':starttime' => strtotime(date('Y-m-d')), ':endtime' => TIMESTAMP, ':follow' => 0));
$today_jing_num = $today_add_num - $today_cancel_num;
	
}

$percent =  round(($today_jing_num/$fansnum)*100,2); //新增百分比

$starttime1 = strtotime(date("Y-m-d",time()));
$endtime1 = $starttime1 + 3600*24;
$chatnum = pdo_fetchcolumn("SELECT COUNT(id) FROM ".tablename('stat_msg_history')." WHERE uniacid = :uniacid AND createtime >= :starttime1 AND createtime < :endtime1 and type='text'" , array(':uniacid'=> $_W['uniacid'],':starttime1'=>$starttime1,':endtime1'=>$endtime1));
?>
<style type="text/css">
	
.notice_number_x h5, h6 {
	line-height: 18px;
font-size: 100%;
margin: 0;
font-weight: 400;
}
.cuman{

	margin: 0 auto;
}

</style>
<ul class="nav nav-tabs">
	<li class="active"><a href="<?php  echo url('home/welcome/' . $do);?>">账号概况 - <?php  echo $title;?></a></li>
</ul>

<div class="clearfix welcome-container">
	<?php  if($do != 'ext') { ?>
	<div class="notice_set clearfix" style="visibility: visible;">
                            <div class="notice_head notice_item" id="notice_avatar" data-acc-type="5">
                                <div class="notice_item_inner ui_loading">
                                       <div class="avater_img_x"><img id="avatarImgBlur" class="avater_img_blur" src="<?php  echo tomedia('headimg_'.$_W['account']['acid'].'.jpg')?>?time=<?php  echo time()?>" onerror="this.src='resource/images/gw-wx.gif'"></div>
                                        <i class="notice_avatar_cover" style="background-color:#45a9b5;"></i>
                                        <a href="<?php  echo url('account/post', array('uniacid' => $_W['uniacid']));?>" class="notice_head_a">
                                            <div class="ovh">
                                                <span class="avatar_url">
                                                    <img class="avater_img" src="<?php  echo tomedia('headimg_'.$_W['account']['acid'].'.jpg')?>?time=<?php  echo time()?>" onerror="this.src='resource/images/gw-wx.gif'">
                                                </span>
                                                <div class="name_area">
                                                	<p class="f16 mb5 pb2">
                                                		<?php 
                                                		$h=date('G');
                                                		if ($h<6) echo '夜深了，注意休息哦';
                                                		else if ($h<11) echo '上午好';
                                                		else if ($h<13) echo '中午好';
                                                		else if ($h<17) echo '下午好';
                                                		else echo '晚上好';
                                                		?>
                                                		</p>
                                                    <strong class="name_title ell"><?php  echo $_W['account']['name'];?></strong>
                                                    	<?php  if($isconnect['isconnect'] == 1 ) { ?>
										<i class="verify_icon" title="已接入"></i>
										<?php  } else { ?>
										<i class="no_verify_icon" title="未接入"></i>
										<?php  } ?>
                                           <p class="cuman">
                                           	<?php  if($accounttype['level'] == 1) { ?>普通订阅号<?php  } ?>
											<?php  if($accounttype['level'] == 2) { ?>普通服务号<?php  } ?>
											<?php  if($accounttype['level'] == 3) { ?>认证订阅号<?php  } ?>
											<?php  if($accounttype['level'] == 4) { ?>认证服务号<?php  } ?>

                                           </p>                   
                                
                                                </div>
                                            </div>

                                                         <div class="notice_number_x notice_number_quota">
                                                    <h6><span class="icon_circle_shape mr5">¥</span>当前可用余额</h6>
                                                    <p class="notice_number">0</p>
                                                </div>
                                                                                    </a></div>
                            </div>

                            <div class="notice_item notice_item2 notice_fans" id="notice_fans_total">
                                <div class="notice_item_inner ui_loading"><a href="<?php  echo url('mc/fans')?>" class="notice_item_a">
                                            <div class="notice_style">
                                                 <i class="icon_fans_total"></i><span class="notice_font">总粉丝数</span>
                                            </div>
                                            <div class="notice_number_x">

                                                
                                                <h6 id="fansTotalUp" class="tinyup"> <?php  if($today_jing_num  > 0 ) { ?><i class="icon_arrow_up">+</i> 
                                                <?php  } else if($today_jing_num  < 0 ) { ?><i class="icon_arrow_down">-</i> <?php  } else if($today_jing_num  == 0 ) { ?><i class="icon_arrow_same">+-</i><?php  } ?>
                                                <?php  echo abs($percent);?>%</h6>
                                                

                                                <p class="notice_number"><?php  echo $fansnum;?></p>
                                            </div>
                                        </a></div>
                            </div>
                            <div class="notice_item notice_item2 notice_new_fans" id="notice_fans_new">
                                <div class="notice_item_inner ui_loading"><a href="<?php  echo url('account/summary/', array('acid' => $_W['acid'], 'uniacid' => $_W['uniacid']));?>" class="notice_item_a">
                                            <div class="notice_style">
                                                 <i class="icon_fans_add"></i><span class="notice_font">净增粉丝</span>
                                            </div>
                                            <div class="notice_number_x">
                                                <h6>&nbsp;</h6>
                                                <p class="notice_number">
                                                    
                                                    <span class="notice_number_char icon_cross tinyup">

                                                        <span class="icon_cross_h"></span>
                                                       <?php  if($today_jing_num  >= 0 ) { ?> 
                                                        <span class="icon_cross_v"></span> <?php  } ?>
                                                    </span>
                                                    <span id="numAnimateFans" class="numAnimate"><?php  echo abs($today_jing_num);?></span>
                                                    
                                                </p>
                                            </div>
                                        </a></div>
                            </div>
                            <div class="notice_item notice_item2 notice_msg" id="notice_msg_num">
                                <div class="notice_item_inner ui_loading"><a href="<?php  echo url('platform/stat/history')?>" class="notice_item_a">
                                            <div class="notice_style">
                                                <i class="icon_fans_msg"></i><span class="notice_font">消息</span>
                                            </div>
                                            <div class="notice_number_x">
                                                <h6>&nbsp;</h6>
                                                <p class="notice_number directup">
                                                    
                                                    <span id="numAnimateMsg" class="numAnimate"><?php  echo $chatnum;?></span>
                                                </p>
                                            </div>
                                        </a></div>
                            </div>
                        </div>
	<div class="page-header">
		<h4><i class="fa fa-plane"></i> 快捷操作</h4>
	</div>
	<div class="shortcut clearfix">
		<a href="<?php  echo url('platform/reply', array('m' => 'userapi'))?>">
			<i class="fa fa-sitemap"></i>
			<span>自定义接口</span>
		</a>
		<?php  if(is_array($shortcuts)) { foreach($shortcuts as $shortcut) { ?>
			<a href="<?php  echo $shortcut['link'];?>" title="<?php  echo $shortcut['title'];?>">
				<img src="<?php  echo $shortcut['image'];?>" alt="<?php  echo $shortcut['title'];?>" class="img-rounded" />
				<span><?php  echo $shortcut['title'];?></span>
			</a>
		<?php  } } ?>
	</div>
	<?php  } ?>
	<?php  if($do == 'platform') { ?>
	<?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('home/welcome-platform', TEMPLATE_INCLUDEPATH)) : (include template('home/welcome-platform', TEMPLATE_INCLUDEPATH));?>
	<?php  } ?>
	<?php  if($do == 'site') { ?>
	<?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('home/welcome-site', TEMPLATE_INCLUDEPATH)) : (include template('home/welcome-site', TEMPLATE_INCLUDEPATH));?>
	<?php  } ?>
	<?php  if($do == 'mc') { ?>
	<?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('home/welcome-mc', TEMPLATE_INCLUDEPATH)) : (include template('home/welcome-mc', TEMPLATE_INCLUDEPATH));?>
	<?php  } ?>
	<?php  if($do == 'setting') { ?>
	<?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('home/welcome-setting', TEMPLATE_INCLUDEPATH)) : (include template('home/welcome-setting', TEMPLATE_INCLUDEPATH));?>
	<?php  } ?>
	<?php  if($do == 'ext') { ?>
	<?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('home/welcome-ext', TEMPLATE_INCLUDEPATH)) : (include template('home/welcome-ext', TEMPLATE_INCLUDEPATH));?>
	<?php  } ?>
	<?php  if($do == 'solution') { ?>
	<?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('home/welcome-solution', TEMPLATE_INCLUDEPATH)) : (include template('home/welcome-solution', TEMPLATE_INCLUDEPATH));?>
	<?php  } ?>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
