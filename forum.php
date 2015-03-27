<?php
header("Content-Type: text/html; charset=UTF-8");
/**
 * 获得论坛基本信息
 * 
 * 作者：王震
 */
require_once './config/config.php';
require_once './lib/db.class.php';
require './class/forumdb.class.php';

$action =  isset($_POST["action"])?$_POST["action"]:'index'; //行为控制
$forumDB = new ForumDB($_config);

if(!get_magic_quotes_gpc()){
	$action = addslashes($action);//过滤敏感字符
}
if($action == 'index'){//获得门户相应列表
	$page = isset($_POST["page"])?$_POST["page"]:1;
	$pageSize = isset($_POST["pageSize"])?$_POST["pageSize"]:$_config['comment']['pageSize'];
	$arr =  $forumDB->getAllForum($page, $pageSize);
}




echo json_encode($arr);


