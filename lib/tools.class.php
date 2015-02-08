<?php
/**
 * 工具类
 * @author moai
 *
 */
abstract  class Tools{
	/**
	 * 对特殊字符串进行过滤
	 */
	public static function my_addslashes($name, $method="post"){
		if($method == "post"){
			$anyStr = isset($_POST[$name])?$_POST[$name]:null;
		}else if($method == "get"){
			$anyStr = isset($_GET[$name])?$_GET[$name]:null;
		}
		if(!get_magic_quotes_gpc()){
			$anyStr = addslashes($anyStr);//过滤敏感字符
		}
		
		return trim($anyStr);
	}
	
}