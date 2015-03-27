<?php
/**
 * 文章数据库操作类
 * @author moai
 *
 */
class PortalDB extends DB{

	private $config;
	public function __construct($config){
		parent::__construct($config);
		$this->config = $config;
	}
	
	
	
	/**
	 * 获得所有门户的数据
	 * $page 第几页
	 * $pageSize 一页内显示条数
	 * 作者:王震
	 */
	public function getAllPortal($page, $pageSize ){
		$page = intval($page);
		$pageSize = intval($pageSize);
		$start=($page-1)*$pageSize;
		$arr = array("addata"=>array(), "count"=>0, "data"=>array());
		$sql = "select * from " . $this->config['db']['1']['tablepre'] . "portal_article_title " .  $this->config['portal']['search']['where'] 
		. $this->config['portal']['search']['order'] . " limit {$start}, {$pageSize} " ;
		
		
		$result = $this->mysqli->query($sql);
		while ($row = $result->fetch_assoc()) {
			if(!empty($row["pic"])){
				$row["pic"] = $this->config['portal']['pic']['url']  . $row["pic"];
			}
			
			$arr["data"][] = $row;
		}
		$arr["count"] = count($arr["data"]);
		
		$result->close();
		//获得头条数据
		$sqlheader = "select aid, pic from " . $this->config['db']['1']['tablepre'] . "portal_article_title where tag = 16 order by dateline desc limit 0, 4";
		$res = $this->mysqli->query($sqlheader);
		while ($row = $res->fetch_assoc()) {
			if(!empty($row["pic"])){
				$row["pic"] = $this->config['portal']['pic']['url']  . $row["pic"];
				$arr["addata"][] = $row;
			}
		}
		$res->close();
		return $arr;
	}
	
	/**
	 * 获得特定文章内容
	 *
	 * 作者:王震
	 */
	public function getPortalContent($aid){
		$aid = mysql_real_escape_string($aid);//对特殊字符进行过滤
		$arr = array("data"=>array());
		$sql = "select * from " . $this->config['db']['1']['tablepre'] . "portal_article_content where aid ={$aid}";
		$result = $this->mysqli->query($sql);
		while ($row = $result->fetch_assoc()) {
			if(!empty($row['content'])){
				$row['content'] = str_replace("data/attachment/", $this->config['portal']['pic']['url'], $row['content']);
				$row['content'] = str_replace("href", " ", $row['content']);
			}
			$arr["data"] = $row;
		}
		$result->close();
		return $arr;
	}
	
	/**
	 * 加载更多的门户文章
	 * @param int $page
	 * @param int $pageSize
	 * 作者:王震
	 */
	function getLoadMorePortal($page, $pageSize){
		$page = intval($page);
		$pageSize = intval($pageSize);
		$start=($page-1)*$pageSize;
		$arr = array("addata"=>array(), "count"=>0, "data"=>array());
		$sql = "select * from " . $this->config['db']['1']['tablepre'] . "portal_article_title " .  $this->config['portal']['search']['where']
		. $this->config['portal']['search']['order'] . " limit {$start}, {$pageSize} " ;
		
		
		$result = $this->mysqli->query($sql);
		while ($row = $result->fetch_assoc()) {
			if(!empty($row["pic"])){
				$row["pic"] = $this->config['portal']['pic']['url']  . $row["pic"];
			}
			$arr["data"][] = $row;
		}
		$arr["count"] = count($arr["data"]);
		
		$result->close();
		
		return $arr;
	}
	
	
	 
	
	
	
	
	
	
	
	
	
	
	
}