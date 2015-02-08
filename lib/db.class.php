<?php
class DB{
	private $dbhost;
	private $dbuser;
	private $dbpw;
	private $dbcharset;
	private $dbname;
	protected $mysqli;
	
	
	public function __construct($config){
		$this->dbhost = $config['db']['1']['dbhost'];
		$this->dbuser = $config['db']['1']['dbuser'];
		$this->dbpw = $config['db']['1']['dbpw'];
		$this->dbcharset = $config['db']['1']['dbcharset'];
		$this->dbname = $config['db']['1']['dbname'];
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
	
	
	
	public function getcon(){
		
		return $this->mysqli;
	}
	
	
	
	
	
	
	
	
	
	
}