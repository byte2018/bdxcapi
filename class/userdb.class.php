<?php
/**
 * 用户数据库操作类
 * @author moai
 *
 */
class UserDB extends UCDB{
	public function __construct(){
		parent::__construct();
	}
	
	/**
	 * 添加用户
	 *
	 * 作者:moai
	 */
	public function add_user($user){
		$username = mysql_real_escape_string($user->username);//获得用户名
		$password = mysql_real_escape_string($user->password);//获得用户密码
		
		$regip = ($user->regip) == NULL ? "" : $user->regip;//注册ip
		$salt = substr(uniqid(rand()), -6);
		$password = md5(md5($password).$salt);
		$email =  ($user->email) == NULL ? "" : $user->email;//获得注册邮箱
		$this->mysqli->query("INSERT INTO ".UC_DBTABLEPRE."members SET  username='$username', password='$password', email='$email', regip='$regip', regdate='". time() ."', salt='$salt'");
		$uid =$this->mysqli->insert_id;
		$this->mysqli->query("INSERT INTO ".UC_DBTABLEPRE."memberfields SET uid='$uid'");
		if($uid){
			return $uid;
		}else{
			require_once ROOT_PATH ."model/back.php";
			require_once ROOT_PATH ."other/code.php";
			$back  = new Back(ADD_USER_ERROR, ERROR);
			return $back;
		}
		
	}
	/**
	 * 检查用户是否存在
	 * @param unknown $username
	 * @return unknown
	 */
	function check_usernameexists($username) {
		$result = $this->mysqli->query("SELECT username FROM ".UC_DBTABLEPRE."members WHERE username='$username'");
		$row = $result->fetch_row(); //取一行数据
		$result->close();
		return $row[0];
	}
	
	/**
	 * 检查邮箱是否存在
	 * @param unknown $email
	 * @return unknown
	 */
	function check_emailexists($email) {
		$result = $this->mysqli->query("SELECT email FROM ".UC_DBTABLEPRE."members WHERE email='$email'");
		$row = $result->fetch_row(); //取一行数据
		$result->close();
		return $row[0];
	}
	
	
	
}