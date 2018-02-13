<?php !defined('ROOT_PATH') && exit; /* Tomorrow Framework 模板缓存文件 生成时间:2018-02-13 00:54:34  */ ?>
<html>
	<head>
		<meta charset="utf8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Small</title>
		<!--Bootstrap -->
		<link href="<?=APP_PATH?>/static/css/bootstrap.min.css" rel="stylesheet">
		<style type="text/css">
			div.post_left
			{
				float:left;
			}
			div.post_right
			{
				float:right;
			}
			div.clear
			{
				clear:both;
			}
		</style>
	</head>
	<body>


		<!--navbar-->
		<nav class="navbar navbar-default navbar-fxied-top">
			<div class="container-fluid">
				<div class="navbar-header">
					<a href="<?=APP_PATH?>/index.php" class="navbar-brand">Small</a>
				</div>

		 	    <ul class="nav navbar-nav navbar-right">
					<li><a href="<?=APP_PATH?>/index.php">首页</a></li>
			       	<li class = "dropdown">
          				<a href="##" data-toggle="dropdown" class="dropdown-toggle">分类
          				<span class="caret"></span></a>
          				
			    		<ul class="dropdown-menu">
			    		<?php foreach($category as $v) { ?>

                			<li><a href="##"><?php echo $v->category_name?></a></li>
                		<?php  } ?>
            	   	 	</ul>
			       	</li>
			        <li><a href="<?php echo APP_PATH . '/index.php/welcome/search/'; ?>">搜索</a></li>
			        <li><a href="##">关于我</a></li>
 				</ul>
			</div>
			
			<img src="<?=APP_PATH?>/static/img/545085.jpg" class="img-responsive" alt="Cinque Terre" style="width:100%; height:45%"> 
		</nav>

		<!-- main -->

		<div class="container-fluid">
			<div class="row">
				<div class = "col-md-8">

					<?php foreach($articles as $v){ ?>

					<div class="blog-content">

						<h2><?php echo $v->title;?></h2>
						<p><?php echo $v->summary;?></p>
						<div class="post_left">
							<a href="<?php echo APP_PATH.'/index.php/welcome/articles/id/'.$v->article_id;?>">继续阅读</a>							
						</div>						
						<div class="post_right">
						作者:<?php echo $v->author;?> 时间:<?php echo date('Y-m-d H:i',$v->date);?>						

						</div>
						<div style="clear:both"></div>
						<hr class="divider">

					</div>					
						<?php } ?>
					
				</div>

				<div class="col-md-1"></div>

				<div class="col-md-3">
					<div class="panel panel-default">
						<div class="panel-heading">
							公告
						</div>
						<div class="panel-body">
							<p><?php echo $notice->content;?></p>
						</div>
					</div>

					<div class="panel panel-default">
						<div class="panel-heading">文章分类</div>
						<ul class="list-group">
						<?php foreach($category as $v){ ?>
							<li class="list-group-item">
								<span class="badge">
								<?php echo $v->num; ?>
								</span>
								<?php echo $v->category_name; ?>
							</li>
						<?php } ?>
						</ul>
					</div>

                    <div class="panel panel-default">
                        <div class="panel-heading">标签</div>
                        <div class="panel-body" id="tag">
                        	<?php foreach($tag as $v){ ?>
                        	<span class="label label-default"><?php echo $v->tag; ?></span>
                        	<?php } ?>
                        </div>

                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading">友情链接</div>
                        <div class="panel-body" >
                        <?php foreach($link as $v) { ?>
		<a href="<?php echo $v->url;?>" class="list-group-item" target="_blank"><?php echo $v->name;?></a> 				  <?php } ?>
                        </div>
                    </div>					

				</div>
			</div>
		</div>

			<div class="row">
				<div class="col-md-9">
                    <ul class="pager">
                    	
                        <li><a href="<?php echo APP_PATH . '/index.php/welcome/page/id/' . $previous ?>" value="">&laquo;上一页</a></li>
                        <li><a href="<?php echo APP_PATH . '/index.php/welcome/page/id/' . $next ?>">下一页&raquo;</a></li>

					</ur>
				</div>
			</div>

        <!-- foot -->
        <div id="footer" class="container">
        <nav class="navbar ">
            <div class="navbar-inner navbar-content-center">
                <p class="text-muted credit" style="text-align:center;">
                    Copyright © 2018 Powered by Small
                </p>
            </div>
        </nav>			
		<script src="<?=APP_PATH?>/static/js/jquery.js"></script>
		<script src="<?=APP_PATH?>/static/js/bootstrap.min.js"></script>
	</body>
</html>