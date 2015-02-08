<?php
class UCDB{
	private $dbhost;
	private $dbuser;
	private $dbpw;
	private $dbcharset;
	private $dbname;
	protected $mysqli;
	
	
	public function __construct(){
		$this->dbhost = UC_DBHOST;
		$this->dbuser = UC_DBUSER;
		$this->dbpw = UC_DBPW;
		$this->dbcharset = UC_DBCHARSET;
		$this->dbname = UC_DBNAME;
		$this->mysqli = new mysqli($this->dbhost, $this->dbuser, $this->dbpw, $this->dbname);
		/* check connection */
		if (mysqli_connect_errno()) {
			printf("Connect failed: %s\n", mysqli_connect_error());
			exit();
		}
	}
	
	public function __destruct(){
		$this->mysqli->close();
	}
	
	
	/*
	 * 获得链接
	 */
	public function getcon(){
		
		return $this->mysqli;
	}
	
	
	
	
	
	
	
	
	
	
}