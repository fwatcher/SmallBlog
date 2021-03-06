<?php !defined('ROOT_PATH') && exit; /* Tomorrow Framework 模板缓存文件 生成时间:2018-02-13 00:46:09  */ ?>
<html>
	<head>
		<title>后台管理</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" href="<?=APP_PATH?>/static/css/bootstrap.min.css">
        
        <style type="text/css">
	        body {
	          background: #f9f9f9;
	        }
        </style>
	</head>

	<body>

		<div style="width: 100%">
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
			<div style="width: 90%;height: 95%;float: left;padding: 10px;">
                <div class="panel panel-primary">
                        <div class="panel-body">
                            <h4>添加文章</h4>

                            <form  id="testform" class="form-horizontal" role="form" action="<?php echo APP_PATH.'/index.php/admin/articlesAddAction';?>" method="post">

                                <div class="form-group">
                                    <label for="input1" class="col-sm-1 control-label">标题</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" id="input1" placeholder="请输入标题" name="title">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="input3" class="col-sm-1 control-label">内容</label>
                                    <div class="col-sm-5">
                                        <textarea style="height:300px;width:800px;border:1px solid #000000 overflow-y:yes" id="content" name="content" placeholder="填写内容....."></textarea>
                                        
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="input3" class="col-sm-1 control-label">简介</label>
                                    <div class="col-sm-5">
                                        <textarea style="height:120px;width:320px;border:1px solid #000000 overflow-y:yes" id="content" name="summary" placeholder="填写简介....."></textarea>
                                        
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="input1" class="col-sm-1 control-label">分类</label>
                                    <div class="col-sm-5">

									    <select class="form-control" name="category_id">
									      <?php
									    	foreach($category as $v){
												echo "<option value=".$v->category_id.">".$v->category_name."</option>";
											}
									      ?>
									    </select>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="input1" class="col-sm-1 control-label">标签</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" id="input1" placeholder="请输入标签" name="tag">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-offset-1 col-sm-10">
                                        <button type="submit" class="btn btn-default">发表</button>

                                    </div>
                                </div>

                            </form>

                        </div>
                </div>


				<!--  <form class="form-inline" role="form">
				  <div class="form-group">
				    <label class="sr-only" for="upload">文件上传</label>
				    <input type="file" class="form-control" id="upload">
				  </div>
			
				  <button type="submit" class="btn btn-default">文件上传</button>
				</form>
				-->
			</div>

		</div>
		<script src="<?=APP_PATH?>/asset/js/jquery.js"></script>
        <script src="<?=APP_PATH?>/asset/js/bootstrap.min.js"></script>
		<script type="text/javascript">
			$("#testform").submit(function(e){
				//alert(1);
				e.preventDefault();
				$("#test").val($("#content").html());
				e.target.submit();
			});
		</script>
	</body>
</html>