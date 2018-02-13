<?php

session_start();

header("Content-type:text/html;charset=utf-8");


/*
  程序目录 __FILE__ /var/www/html/Small/config/config.php


*/

define('ROOT_PATH', '/var/www/html/small/');
define('APP_PATH', '/small');

require ROOT_PATH . '/config/config.php';

if(DE_BUG == 1)
{
	error_reporting(E_ALL);
	ini_set("display_errors", 1);
}
else
{
    error_reporting(0);
}

require ROOT_PATH . '/common/Parsedown.php';
require ROOT_PATH . '/common/route.php';
require ROOT_PATH . '/common/view.php';
require ROOT_PATH . '/common/controller.php';
require ROOT_PATH . '/common/model.php';

