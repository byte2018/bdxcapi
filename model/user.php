<?php
class User{
	private $username;//用户名
	private $password;//密码
	private $email;//邮箱
	private $regip;//注册ip
	private $regdate;//注册时间
	
	function __construct($username, $password){
		$this->username = $username;
		$this->password = $password;
	}
	
	public function __get($property_name){
		
		if(isset($this->$property_name)){
			return($this->$property_name);
		}else{
			return Null;
		}
	}
	

	public function __set($property_name, $value){
		
		$this->$property_name = $value;
	}
	
	
}
	
	