<?php
/**
	 * 本文件是 sysmanager 模块的后端控制器
	 *
	 * 您可以通过 switch 的 case 分支来实现不同的业务逻辑
	 */

use pc\Sysmanager\Sysmanager;
use phpWeChat\Area;
use phpWeChat\CaChe;
use phpWeChat\Config;
use phpWeChat\Member;
use phpWeChat\Module;
use phpWeChat\MySql;
use phpWeChat\Order;
use phpWeChat\Upload;

!defined('IN_MANAGE') && exit('Access Denied!'); 

$mod=@return_edefualt(str_callback_w($_GET['mod']),'sysmanager');
$file=@return_edefualt(str_callback_w($_GET['file']),'sysmanager');
$action=@return_edefualt(str_callback_w($_GET['action']),'config');

$_parent=Module::getModuleByKey(Module::getModule($mod,'parentkey'));
$_mod=$_parent['folder'].'/'.$mod.'/';

switch($action)
{
	// case 'config' 是系统默认自带操作，用于进行模块选项配置的操作
	case 'config':
		if(isset($dosubmit))
		{
			Config::setConfig($_mod,$config);
			operation_tips('操作成功！','?mod=sysmanager&file=sysmanager&action=config');
		}
		include_once parse_admin_tlp($file.'-'.$action,$mod);
		break;
	//以下 case 条件仅为 示例。您可以根据业务逻辑自由修改和拓展


	//case 'manage':
			
		//在此写 phpwechat.php?mod=sysmanager&file=sysmanager&action=manage 时的逻辑
			
		//break;

	//case 'add':
			
		//在此写 phpwechat.php?mod=sysmanager&file=sysmanager&action=add 时的逻辑
		
		//break;

	//以此类推...

	//case '...':
			
		//在此写 phpwechat.php?mod=sysmanager&file=sysmanager&action=... 时的逻辑
			
		//break;
	default:
		break;
}
?>