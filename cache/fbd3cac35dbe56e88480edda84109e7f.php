<?php !defined('ROOT_PATH') && exit; /* Tomorrow Framework 模板缓存文件 生成时间:2018-02-13 00:37:16  */ ?>
<html>
	<head>
		<title>后台管理</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" href="<?=APP_PATH?>/static/css/bootstrap.min.css">
        <script src="<?=APP_PATH?>/static/js/jquery.js"></script>
        <script src="<?=APP_PATH?>/static/js/bootstrap.min.js"></script>
        <style type="text/css">
	        body {
	          background: #f9f9f9;
	        }
        </style>
	</head>

	<body>
		<div style="width: 100%"
		>
			<!-- nav -->
			<div style="width: 10%;height: 100%;float: left">
		    	<ul class="nav nav-pills nav-stacked">
				    <li class="active"><a href="<?php echo APP_PATH.'/index.php/admin/admin_index';?>">后台管理</a></li>
				    <li class="nav-divider"></li>
				    <li><a href="<?php echo APP_PATH.'/index.php/admin/articlesAdd';?>">新增文章</a></li>
				    <li><a href="<?php echo APP_PATH.'/index.php/admin/articlesList';?>">文章列表</a></li>
				    <li><a href="<?php echo APP_PATH.'/index.php/admin/notice';?>">发布公告</a></li>
				    <li><a href="<?php echo APP_PATH.'/index.php/admin/category';?>">分类管理</a></li>
				    <li><a href="<?php echo APP_PATH.'/index.php/admin/comment';?>">留言管理</a></li>
				    <li><a href="<?php echo APP_PATH.'/index.php/admin/link';?>">友情链接</a></li>
				    <li class="nav-divider"></li>
				    <li><a href="<?php echo APP_PATH.'/index.php/admin/logout';?>">注销</a></li>
				</ul>
			</div>

			<!-- content-->
			<div style="width: 90%;height: 95%;float: left;text-align: center;">
				
				<h2>欢迎回来</h2>
			</div>

		</div>
	</body>
</html>