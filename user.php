<?php
header("Content-Type: text/html; charset=UTF-8");
require_once './config/config_ucenter.php';
require_once './lib/ucdb.class.php';
require_once './class/userdb.class.php';
require_once './lib/tools.class.php';
require_once './model/user.php';
define("ROOT_PATH", str_replace('\\','/',realpath(dirname(__FILE__).'/'))."/");
$method = "post";//定义接收参数的方式
$action = Tools::my_addslashes("action", $method);

$action = !empty($action) ? $action : "error";

if($action == "adduser"){
	$username = Tools::my_addslashes("username", $method);
	$password = Tools::my_addslashes("password", $method);
	$email = Tools::my_addslashes("email", $method);
	$userdb = new UserDB();
	$is_exit_username =$userdb->check_usernameexists($username);
	$is_exit_email = $userdb->check_emailexists($email);
	if(empty($is_exit_username) && empty($is_exit_email)){
		$user = new User($username, $password);
		$user->email = $email;
		
		$uid = $userdb->add_user($user);
		$arr = array("uid"=>$uid, "username"=>$username);
		echo json_encode($arr);
	}else if(!empty($is_exit_username)){
		require_once ROOT_PATH ."model/back.php";
		require_once ROOT_PATH ."other/code.php";
		$back  = new Back(IS_USERNAME_EXIT_ERROR, ERROR);
		echo json_encode($back);
	}else if(!empty($is_exit_email)){
		require_once ROOT_PATH ."model/back.php";
		require_once ROOT_PATH ."other/code.php";
		$back  = new Back(IS_EMAIL_EXIT_ERROR, ERROR);
		echo json_encode($back);
	}
	
}





