<?php
/**
 * 文章数据库操作类
 * @author moai
 *
 */
class ForumDB extends DB{
	private $config;
	public function __construct($config){
		parent::__construct($config);
		$this->config = $config;
	}
	
	public function __destruct(){
		parent::__destruct();
	}
	
	
	/**
	 * 获得所有论坛数据
	 * $page 当前页数
	 * $pageSize 一页的个数
	 * 作者:王震
	 */
	public function getAllForum($page, $pageSize){
		$page = intval($page);
		$pageSize = intval($pageSize);
		$start=($page-1)*$pageSize;
		$arr = array("addata"=>array(), "count"=>0, "data"=>array());
		$sql = "select * from ".$this->config['db']['1']['tablepre']."forum_post " . $this->config['forum']['search']['order']
		. " limit {$start}, {$pageSize}";
		$result = $this->mysqli->query($sql);
		while ($row = $result->fetch_assoc()) {
			if(!empty($row["authorid"])){
				$row["user"] = array("url"=>$this->config['site']['url']. 'uc_server/avatar.php?uid=' . $row["authorid"]);
			}
			$arr["data"][] = $row;
		}
		$arr["count"] = count($arr["data"]);
		$result->close();
		return $arr;
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
}