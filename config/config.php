<?php

//数据库配置信息

$db = array(
	'DB_HOST' => '127.0.0.1',
	'DB_USER' => 'root',
	'DB_PWD' => 'woaini123',
	'DB_CHAR' => 'utf8',
	'DB_NAME' =>'small',
);

//程序常量定义

$config = array(
	'DEFAULT_CONTROL' => 'welcome',//默认控制器
	'DEFAULT_ACTION' => 'index', //默认方法
);

/*

	是否开启debug模式

*/

define('DE_BUG', 0);