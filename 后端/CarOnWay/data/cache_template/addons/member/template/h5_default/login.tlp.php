<!DOCTYPE html>
<html lang="zh-CN">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
        <meta name="format-detection" content="telephone=no" />
		<!-- 禁止数字识自动别为电话号码 -->
        <meta http-equiv="Expires" content="0">
        <meta http-equiv="Cache-Control" content="no-cache">
        <meta http-equiv="Pragma" content="no-cache">
        <title><?php echo defined('WECHAT_NAME')?WECHAT_NAME:'{__WECHAT_NAME__}';?>登录</title>
        <link rel="stylesheet" href="<?php echo defined('TLP')?TLP:'{__TLP__}';?>css/zc-dl.css">
		
        <script language="javascript" type="text/javascript">
			var PW_PATH='<?php echo defined('PW_PATH')?PW_PATH:'{__PW_PATH__}';?>';
		</script>
        <script src="<?php echo defined('TLP')?TLP:'{__TLP__}';?>js/jquery-2.1.3.min.js"></script>
		<script>
        	document.getElementsByTagName("html")[0].style.fontSize=document.documentElement.clientWidth/16+"px";
        </script>
        <script src="<?php echo defined('PW_PATH')?PW_PATH:'{__PW_PATH__}';?>statics/core.js" language="javascript"></script>
		<script language="javascript" type="text/javascript">
		$(document).ready(function(){
			$('#dosubmit').click(function(){
				
				$.post('<?php echo U(MOD,'login');?>', $("#loginform").serialize(), function(data) {
					if(data=='success')
					{
						showToast('登陆成功','<?php echo htmlspecialchars_decode(get_cookie("redirect"));?>');
					}
					else
					{
						msg=$("#"+data).attr("msg");
						
						showToast(msg,false);
					}
				});
			});
			
			$('#viewpwd').click(function(){
				if($('#password').attr('type')=='text')
				{
					$('#viewpwd').removeClass('noviewpwd');
					$('#viewpwd').addClass('viewpwd');
					$('#password').attr('type','password');
				}
				else
				{
					$('#viewpwd').removeClass('viewpwd');
					$('#viewpwd').addClass('noviewpwd');
					$('#password').attr('type','text');
				}
			});
		});
		</script>
        
        <style>
        ::-webkit-input-placeholder { /* WebKit browsers */color:#591b46;}
        :-moz-placeholder { /* Mozilla Firefox 4 to 18 */color:#591b46;}
        ::-moz-placeholder { /* Mozilla Firefox 19+ */color:#591b46;}
        :-ms-input-placeholder { /* Internet Explorer 10+ */color:#591b46;}
        a:link,a:visited,a:hover{
        text-decoration: none;
        color: none;
        }
        a:active{
           color: none; 
        }
        html{
            height:100%;
            outline:none;
        }
        input,select{outline:none}
        </style>
    </head>
    <body style="background: #f9f8f9;">
        <div style="position: absolute;    top: 1rem;">
            <form action="<?php echo U(MOD,'login');?>" name="loginform" id="loginform" method="post">
            	<input type="hidden" name="dosubmit" value="1">
                <div class="">
                    <div class="r_dl1 of">
                        <div class="img_bg fl">
                            <img src="<?php echo defined('TLP')?TLP:'{__TLP__}';?>imgs/z_dh1.png">
                        </div>
                        <input class="inp r_inp_dl fl" type="text" name="telephone" autocomplete="off" id="telephone" msg="请输入正确的手机号" placeholder="手机号">
                    </div>
                    <div class="r_dl1 of">
                        <div class="img_bg fl">
                            <img src="<?php echo defined('TLP')?TLP:'{__TLP__}';?>imgs/z_ddd1.png">
                        </div>
                        <input class="inp r_inp_dl fl" type="text" name="password" autocomplete="off" id="password" msg="请输入正确的密码" placeholder="密码">
                        <span class="noviewpwd" id="viewpwd"></span>
                    </div>
                </div>            
                <div class="jy_ann">
                    <input class="sub dj_z1 bgc_1" type="button" id="dosubmit" value="登　录">
                    <input class="sub dj_z2 bgc_2" type="button" onClick="window.location.href='<?php echo U(MOD,'register');?>'" value="注　册">
                </div>
            </form>
            <div class="r_lj" style="text-align:center">
                <a class="fc_1" href="<?php echo U(MOD,'getpwd');?>">忘记密码?</a>
            </div>
        </div>
    </body>
</html>