<?php !defined('ROOT_PATH') && exit; /* Tomorrow Framework 模板缓存文件 生成时间:2018-02-13 00:37:12  */ ?>
<html>
	<head>
		<meta charset="utf8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Small</title>
		<!--Bootstrap -->
		<link href="<?=APP_PATH?>/static/css/bootstrap.min.css" rel="stylesheet">
		<style type="text/css">
			body
			{
				background: #f9f9f9
			}
		</style>
	</head>
	<body>
		<div class = "container">

			<div class="row">
				<div class="col-md-4"></div>
				<div class="col-md-4">
		    		<div class="col-sm-3"></div>
		    		<div class="col-sm-9" style="margin-top: 30%;text-align:center">
		    			<h2>后台管理</h2>
		    		</div>
		    		<form class="form-horizontal" role="form" action="<?=APP_PATH?>/index.php/admin/login" method="POST">
		    			<div class="form-group">
		    				<label for="input1" class="col-sm-3 control-label">用户</label>
		    				<div class="col-sm-9">
		    					<input type="text" class="form-control" id="input1" placeholder="请输入用户名" name="username">
		    				</div>
		    			</div>
		    			<div class="form-group">
		    				<label for="input2" class="col-sm-3 control-label">密码</label>
		    				<div class="col-sm-9">
		    					<input type="password" class="form-control" id="input2" placeholder="请输入密码" name="password">
		    				</div>
		    			</div>
		    			<div class="form-group">
		    				<div class="col-sm-3"></div>
		    				<div class="col-sm-9">
		    					<div class="checkbox">
		    						<label>
		    							<input type="checkbox">记住密码
		    						</label>
		    					</div>
		    				</div>
		    			</div>
					  	<div class="form-group">
					  		<div class="col-sm-6"></div>
				    		<div class="col-sm-6">
				      			<button type="submit" class="btn btn-default">
				      				登录
				      			</button>
				    		</div>
				  		</div>
		    		</form>

				</div>
			</div>
		

		</div>	





		<script src="../static/js/jquery.js"></script>
		<script src="../static/js/bootstrap.min.js"></script>
	</body>
</html>