<?php
header("Content-Type: text/html; charset=UTF-8");
/**
 * 文章
 * 
 * 作者：moai
 */
require_once './config/config.php';
require_once './lib/db.class.php';
require_once './class/portaldb.class.php';

$arr = array();
$action =  isset($_POST["action"])?$_POST["action"]:'index'; //行为控制

$portaldb = new PortalDB($_config);
if(!get_magic_quotes_gpc()){
	$action = addslashes($action);//过滤敏感字符
}

if($action == 'index'){//获得门户相应列表
	$page = isset($_POST["page"])?$_POST["page"]:1;
	$pageSize = isset($_POST["pageSize"])?$_POST["pageSize"]:$_config['comment']['pageSize'];
	$arr = $portaldb->getAllPortal($page, $pageSize);
}else if($action == "content"){//查找文章内容
	if(isset($_POST["aid"])){
		$aid =  intval($_POST["aid"]); //获得文章id
		$arr = $portaldb ->getPortalContent($aid);
	}
}else if($action == "loadMore"){//加载更多数据
	$page = isset($_POST["page"])?$_POST["page"]:1;
	$pageSize = isset($_POST["pageSize"])?$_POST["pageSize"]:$_config['comment']['pageSize'];
	
	$pageSize = isset($_POST["pageSize"])?$_POST["pageSize"]:$_config['comment']['pageSize'];
	$arr = $portaldb->getLoadMorePortal($page, $pageSize);
}

echo json_encode($arr);

