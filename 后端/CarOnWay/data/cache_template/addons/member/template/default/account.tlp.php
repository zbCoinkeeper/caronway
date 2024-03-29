<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
<title>会员中心</title>
<link href="<?php echo defined('TLP')?TLP:'{__TLP__}';?>css/i.css" type="text/css" rel="stylesheet" />

<script language="javascript" type="text/javascript">
	var PW_PATH='<?php echo defined('PW_PATH')?PW_PATH:'{__PW_PATH__}';?>';
</script>
<script src="<?php echo defined('PW_PATH')?PW_PATH:'{__PW_PATH__}';?>statics/jquery/jquery-1.12.2.min.js" language="javascript"></script>
<script src="<?php echo defined('PW_PATH')?PW_PATH:'{__PW_PATH__}';?>statics/core.js" language="javascript"></script>
<script language="javascript" type="text/javascript">
	$(document).ready(function(){
		$('#modifybtn').click(function(){
			$.post('<?php echo U(MOD,'account');?>', $("#accountform").serialize(), function(data) {
				data = jQuery.parseJSON(data);
				$('#errmsg').show();
				
				if(!data.errcode)
				{
					$('#errmsg').html('<font style="color:#009933">'+data.errstr+'</font>');
				}
				else
				{
					$('#errmsg').text(data.errstr);
					$('#errmsg').fadeOut(2000);
				}
				
			});
		});
	});
</script>
</head>

<body>
<?php include template('header');?>
<div class="common-width" style="overflow:auto;">
	<div class="left-nav">
		<ul>
			<li class="hover"><a href="<?php echo U(MOD,'i');?>">账号管理</a></li>
			<li><a href="<?php echo U(MOD,'myaddress');?>">我的地址</a></li>
		</ul>
	</div>
	<div class="right-nav">
		<h1>修改密码</h1>
		<form name="accountform" id="accountform" method="post">
		<input type="hidden" name="dosubmit" value="1">
		<table class="tablecss" cellpadding="1" cellspacing="1">
			<tr>
				<td width="15%">会员账号： </td>
				<td><?php echo isset($PW['memberlogin']['username'])?$PW['memberlogin']['username']:'';?></td>
			</tr>
			<tr>
				<td width="15%">旧密码： </td>
				<td>
				<input type="password" name="password"  autofocus="autofocus" placeholder="请输入旧密码" autocomplete="off" required size="32">
				</td>
			</tr>
			<tr>
				<td width="15%">新密码： </td>
				<td>
				<input type="password" name="newpassword" autocomplete="off" placeholder="请输入新密码" required size="32">
				</td>
			</tr>
			<tr>
				<td width="15%">重复新密码： </td>
				<td>
				<input type="password" name="repassword" autocomplete="off" placeholder="重复新密码" required size="32">
				</td>
			</tr>
			<tr>
				<td width="15%">&nbsp;</td>
				<td><input type="submit" id="modifybtn" class="btn" value="修改密码">
				<span id="errmsg"></span>
				</td>		
			</tr>
		</table>
		</form>
	</div>
</div>

<?php include template('footer');?>
</body>
</html>
