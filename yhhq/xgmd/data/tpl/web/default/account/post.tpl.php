<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/header-gw', TEMPLATE_INCLUDEPATH)) : (include template('common/header-gw', TEMPLATE_INCLUDEPATH));?>
<!-- <ol class="breadcrumb"> -->
<!-- 	<li><a href="./?refresh"><i class="fa fa-home"></i></a></li> -->
<!-- 	<li><a href="<?php  echo url('account/display');?>">公众号列表</a></li> -->
<!-- 	<li class="active">编辑主公众号</li> -->
<!-- </ol> -->
<ul class="nav nav-tabs">
	<li class="active"><a href="javascript:;">账号基本信息</a></li>
</ul>
<div class="clearfix">
	<form action="" method="post"  class="form-horizontal" role="form" enctype="multipart/form-data" id="form1">
		<input type="hidden" name="acid" value="<?php  echo $acid;?>" />
		<h5 class="page-header">基础信息</h5>
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">公众平台登录用户</label>
			<div class="col-sm-9 col-xs-12">
				<input type="text" name="wxusername" id="username" class="form-control" value="<?php  echo $account['username'];?>" autocomplete="off" onblur="verifyGen()" />
				<span class="help-block">请输入你的公众平台用户名</span>
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">公众平台登录密码</label>
			<div class="col-sm-9 col-xs-12">
				<input type="password" name="wxpassword" class="form-control" value="" autocomplete="off"  />
				<span class="help-block">请输入你的公众平台密码</span>
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style="color:red">*</span> 主公众号名称</label>
			<div class="col-sm-9 col-xs-12">
				<input type="text" name="cname" class="form-control" value="<?php  echo $uniaccount['name'];?>" autocomplete="off" />
				<span class="help-block">填写公众号的帐号名称</span>
			</div>
		</div>
		<?php  if(!empty($_GPC['acid'])) { ?>
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style="color:red">*</span> 公众号名称</label>
			<div class="col-sm-9 col-xs-12">
				<input type="text" name="subname" class="form-control" value="<?php  echo $account['name'];?>" autocomplete="off" />
				<span class="help-block">填写公众号的帐号名称</span>
			</div>
		</div>
		<?php  } ?>
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">描述</label>
			<div class="col-sm-9 col-xs-12">
				<textarea style="height: 80px;" class="form-control" name="description"><?php  echo $uniaccount['description'];?></textarea>
				<span class="help-block">用于说明此公众号的功能及用途。</span>
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">公众号帐号</label>
			<div class="col-sm-9 col-xs-12">
				<input type="text" name="account" class="form-control" value="<?php  echo $account['account'];?>" autocomplete="off" />
				<span class="help-block">填写公众号的帐号，一般为英文帐号</span>
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">原始ID</label>
			<div class="col-sm-9 col-xs-12">
				<input type="text" name="original" class="form-control" value="<?php  echo $account['original'];?>" autocomplete="off" />
				<span class="help-block">在给粉丝发送客服消息时,原始ID不能为空。建议您完善该选项</span>
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">引导关注素材</label>
			<div class="col-sm-9 col-xs-12">
				<input type="text" name="subscribeurl" value="<?php  echo $account['subscribeurl'];?>" class="form-control" autocomplete="off">
				<span class="help-block">建议设置一条引导关注的素材链接,为空则跳转回测试起始界面。例:
					<a href="javascript:;" data-toggle="modal" data-target="#subscribeurl">点击查看</a>
				</span>
			</div>
		</div>
		<!-- 引导素材示例模态框 -->
		<div class="modal fade" id="subscribeurl" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content" style="width:740px;">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
						<h4 class="modal-title" id="myModalLabel">引导关注示例</h4>
					</div>
					<div class="modal-body">
						<h4>引导关注素材示例页面</h4>
						<span class="help-block"><?php  echo date('Y-m-d', time());?>&nbsp;&nbsp;
						<a href="javascript:;"><?php  echo $account['name'];?></a></span>
						<img src="./resource/images/subscribe.gif" />
						<span class="help-block"><?php  if(IMS_FAMILY == 'x') { ?>欢迎关注<?php  echo $account['name'];?><?php  } else { ?>系统是一款免费开源的微信公众平台管理系统。<?php  } ?></span>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
					</div>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">级别</label>
			<div class="col-sm-9 col-xs-12">
				<label for="status_1" class="radio-inline"><input autocomplete="off" type="radio" name="level" id="status_1" value="1" <?php  if(empty($account['level']) || $account['level'] == 1) { ?> checked<?php  } ?> > 普通订阅号</label>
				<label for="status_2" class="radio-inline"><input autocomplete="off" type="radio" name="level" id="status_2" value="2" <?php  if($account['level'] == 2) { ?> checked<?php  } ?> /> 普通服务号</label>
				<label for="status_3" class="radio-inline"><input autocomplete="off" type="radio" name="level" id="status_3" value="3" <?php  if($account['level'] == 3) { ?> checked<?php  } ?> /> 认证订阅号</label>
				<label for="status_4" class="radio-inline"><input autocomplete="off" type="radio" name="level" id="status_4" value="4" <?php  if($account['level'] == 4) { ?> checked<?php  } ?> /> 认证服务号/认证媒体/政府订阅号</label>
				<span class="help-block">注意：即使公众平台显示为“未认证”, 但只要【公众号设置】/【账号详情】下【认证情况】显示资质审核通过, 即可认定为认证号.</span>
			</div>
		</div>
		<?php  if(($_W['setting']['platform']['authstate'] && !empty($authurl)) || $account['type'] == 3) { ?>
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">公众号接入方式</label>
			<div class="col-sm-9 col-xs-12">
				<label  class="radio-inline"><input  type="radio" name="type"  value="1" <?php  if($account['type'] == 1 || $account['type'] == 2) { ?> checked<?php  } ?> onclick="$('#auth').show();" /> 普通接入</label>

				<label  class="radio-inline"><input  type="radio" name="type"  value="3" <?php  if($account['type'] == 3) { ?> checked <?php  } ?> />登录授权</label>

			</div>
		</div>
		<?php  } ?>
		<div id="auth" <?php  if($account['type'] == 3) { ?>style="display:none;"<?php  } ?>>
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">AppId</label>
			<div class="col-sm-9 col-xs-12">
				<input type="text" name="key" class="form-control" value="<?php  echo $account['key'];?>" autocomplete="off"/>
				<div class="help-block">请填写微信公众平台后台的AppId</div>
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">AppSecret</label>
			<div class="col-sm-9 col-xs-12">
				<input type="text" name="secret" class="form-control" value="<?php  echo $account['secret'];?>" autocomplete="off"/>
				<div class="help-block">请填写微信公众平台后台的AppSecret, 只有填写这两项才能管理自定义菜单</div>
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">Oauth 2.0</label>
			<div class="col-sm-9 col-xs-12">
				<p class="form-control-static">在微信公众号请求用户网页授权之前，开发者需要先到公众平台网站的【开发者中心】<b>网页服务</b>中配置授权回调域名。<?php  if($_W['isfounder']) { ?><a href="http://lejiplaza.com//" target="_black">查看详情</a><?php  } ?></p>
			</div>
		</div>
		<?php  if(!empty($acid)) { ?>
			<div class="form-group">
				<label class="col-xs-12 col-sm-3 col-md-2 control-label">接口地址</label>
				<div class="col-sm-9 col-xs-12">
					<input type="text" class="form-control" value="<?php  echo $_W['siteroot'];?>api.php?id=<?php  echo $account['acid'];?>" readonly="readonly" autocomplete="off"/>
					<div class="help-block">设置“公众平台接口”配置信息中的接口地址</div>
				</div>
			</div>
			<div class="form-group">
				<label class="col-xs-12 col-sm-3 col-md-2 control-label" style="color:red">Token</label>
				<div class="col-sm-9 col-xs-12">
					<div class="input-group">
						<input type="text" name="wetoken" class="form-control" value="<?php  echo $account['token'];?>" readonly="readonly" />
						<span class="input-group-addon" style="cursor:pointer" onclick="tokenGen();">生成新的</span>
					</div>
					<div class="help-block">与公众平台接入设置值一致，必须为英文或者数字，长度为3到32个字符. 请妥善保管, Token 泄露将可能被窃取或篡改平台的操作数据.</div>
				</div>
			</div>
			<div class="form-group">
				<label class="col-xs-12 col-sm-3 col-md-2 control-label" style="color:red">EncodingAESKey</label>
				<div class="col-sm-9 col-xs-12">
					<div class="input-group">
						<input type="text" name="encodingaeskey" class="form-control" value="<?php  echo $account['encodingaeskey'];?>" />
						<span class="input-group-addon" style="cursor:pointer" onclick="EncodingAESKeyGen();">生成新的</span>
					</div>
					<div class="help-block">与公众平台接入设置值一致，必须为英文或者数字，长度为43个字符. 请妥善保管, EncodingAESKey 泄露将可能被窃取或篡改平台的操作数据.</div>
				</div>
				</div>
			</div>
		<?php  } ?>
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">二维码</label>
			<div class="col-sm-9 col-xs-12">
				<input type="file" name="qrcode" value="<?php  echo $item['qrcode'];?>">
				<span class="help-block">只支持JPG图片</span>
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
			<div class="col-sm-9 col-xs-12">
				<div class="input-group">
					<img src="<?php  echo tomedia('qrcode_'.$account['acid'].'.jpg');?>?time=<?php  echo time()?>" class="img-responsive img-thumbnail" width="150" />
				</div>
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">头像</label>
			<div class="col-sm-9 col-xs-12">
				<input type="file" name="headimg" value="<?php  echo $item['headimg'];?>">
				<span class="help-block">只支持JPG图片</span>
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
			<div class="col-sm-9 col-xs-12">
				<div class="input-group">
					<img src="<?php  echo tomedia('headimg_'.$account['acid'].'.jpg')?>?time=<?php  echo time()?>" class="img-responsive img-thumbnail" width="150" />
				</div>
			</div>
		</div>
	<div class="form-group">
		<label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
		<div class="col-sm-9 col-xs-12">
			<input name="submit" type="submit" value="提交" class="btn btn-primary span2" />
			<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
		</div>
	</div>
	</form>
</div>
<script type="text/javascript">
	require(['filestyle'], function(){
		$(".form-group").find(':file').filestyle({buttonText: '上传图片'});
	});
	function tokenGen() {
		var letters = 'abcdefghijklmnopqrstuvwxyz0123456789';
		var token = '';
		for(var i = 0; i < 32; i++) {
			var j = parseInt(Math.random() * (31 + 1));
			token += letters[j];
		}
		$(':text[name="wetoken"]').val(token);
	}
	function EncodingAESKeyGen() {
		var letters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
		var token = '';
		for(var i = 0; i < 43; i++) {
			var j = parseInt(Math.random() * 61 + 1);
			token += letters[j];
		}
		$(':text[name="encodingaeskey"]').val(token);
	}
	<?php  if($account['type'] != 3) { ?>
		$(':radio[name="type"][value="3"]').click(function() {
			$(':radio[value="1"]').prop('checked',true);
			if (confirm('必须通过公众号授权登录页面进行授权接入，是否跳转至授权页面...')) {
				location.href="<?php  echo $authurl;?>";
			} else {
				return false;
			}
		});
	<?php  } ?>
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/footer-gw', TEMPLATE_INCLUDEPATH)) : (include template('common/footer-gw', TEMPLATE_INCLUDEPATH));?>