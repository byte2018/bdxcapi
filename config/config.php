<?php
/**
 * 基本配置文件
 */

$_config = array();

// ----------------------------  CONFIG DB  ----------------------------- //
$_config['db']['1']['dbhost'] = 'localhost';
$_config['db']['1']['dbuser'] = 'root';
$_config['db']['1']['dbpw'] = 'root';
$_config['db']['1']['dbcharset'] = 'utf8';
$_config['db']['1']['pconnect'] = '0';
$_config['db']['1']['dbname'] = 'ultrax';
$_config['db']['1']['tablepre'] = 'pre_';
$_config['db']['slave'] = '';
$_config['db']['common']['slave_except_table'] = '';



// ----------------------------  COMMENT  ----------------------------- //
$_config['portal']['pic']['url'] = 'http://127.0.0.1:8080/discuz/data/attachment/';

$_config['site']['url'] = 'http://127.0.0.1:8080/discuz/';
$_config['comment']['pageSize'] = 30;//分页条数



// ----------------------------  PORTAL  ----------------------------- //
$_config['portal']['search']['where'] = " where tag <> 16 "; //discuz的门户文章展示条件
$_config['portal']['search']['order'] = " order by dateline desc "; //discuz的门户文章排序方式

// ----------------------------  FORUM  ----------------------------- //
$_config['forum']['search']['order'] = " order by dateline desc "; //discuz论坛排序方式




