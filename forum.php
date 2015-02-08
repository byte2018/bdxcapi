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

$forumDB = new ForumDB($_config);

$arr =  $forumDB->getAllForum();

echo json_encode($arr);


