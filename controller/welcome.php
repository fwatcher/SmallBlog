<?php 

//前台部分

class WelcomeController extends Controller
{

	//index,search,articles,comment

	public function index()
	{
		global $config;

		$articlesShowModel = $this->Model('articles');

		if(isset($config['params']['id']))
		{
			$id = $config['params']['id'];
			$sql = "SELECT article_id, title, content,summary,date, author FROM `article` INNER JOIN category ON article.category_id = category.category_id WHERE article.category_id = " . $id . "ORDER BY date DESC";

			$res = $articlesShowModel -> Query($sql);
		}
		else
		{
			$sql = "SELECT article_id, title, content,summary,date, author FROM `article` INNER JOIN category ON article.category_id = category.category_id ORDER BY date DESC";

			$res = $articlesShowModel -> Query($sql);
		}

		$rows = $articlesShowModel -> FetchAll($res);

		$this->assign('articles', $rows);
		$this->assign('previous', 1);
		$this->assign('next', 2);
		$this->sidebar();
		$this->display('index');
	}

	public function search()
	{
		if(!isset($_POST['search']))
		{
			$this->sidebar();
			$this->display('search');
			exit();		
		}

		$search = $_POST['search'];

		$articlesShowModel = $this->Model('articles');

		$sql = "SELECT * FROM article where title like '%" . $search . "%'";

		$res = $articlesShowModel -> Query($sql);

		$rows = $articlesShowModel ->FetchAll($res);

		if(empty($rows))
		{
			$this->sidebar();
			$this->assign('status', '0');
			$this->assign('key', $search);
			$this->display('no_search');

		}
		else
		{
			$this->sidebar();
			$this->assign('status', '1');
			$this->assign('key', $search);
			$this->assign('result', $rows);
			$this->display('search');

		}
	}

	public function articles()
	{
		global $config;

		if(isset($config['params']['id']))
		{
			$article_id = $config['params']['id'];
		}
		else
		{
			die('NO id');
		}

		$articlesShowModel = $this->Model('articles');

		$sql1 = "SELECT * FROM `article` WHERE article_id = '" . $article_id . "'";
		$res1 = $articlesShowModel -> Query($sql1);
		$rows1 = $articlesShowModel -> FetchOne($res1);

		$Parsedown = new Parsedown();

		$rows1->content = $Parsedown->text($rows1->content);

		$this->assign('articles', $rows1);

		$messageModel = $this->Model('comment');
		$sql2 = "SELECT * FROM `comment` WHERE article_id = '" . $article_id . "'";
		$res2 = $messageModel -> Query($sql2);
		$rows2 = $messageModel -> FetchAll($res2);

		if(empty($rows2))
		{
			$this->assign('status', 0);
		}
		else
		{
			$this->assign('comment', $rows2);
		}

		$this->display('articles');

	}

	public function comment()
	{
		$article_id = $_POST['article_id'];
		$name = $_POST['name'];
		$email = $_POST['email'];
		$this->alert($_POST['email']);
		$comment = $_POST['comment'];

		$commentModel = $this->Model('comment');

		$sql = "INSERT INTO comment (`article_id`, `content`, `date`, `username`, `email`) VALUES ('" . $article_id . "','" . $comment . "','" . time() . "','" . $name . "','" . $email . "')";

		echo "<script>alert('" . $sql . "')</script>";

		if($commentModel->Execute($sql))
		{
			$this->alert('comment successed!');
		}
		else
		{
			$this->alert('comment failed!');
		}

		$this->display('articles');
	}


	public function sidebar()
	{
		//公共
		$sidebarModel = $this->Model('sidebar');

		$noticeSql = "SELECT * FROM notice";

		$noticeRes = $sidebarModel->Query($noticeSql);
		$noticeRow = $sidebarModel->FetchOne($noticeRes);

		$this->assign('notice', $noticeRow);

		//分类
		$categorySql = "SELECT category.category_id,category_name,count(article.article_id) as num FROM `category` left join `article` on category.category_id = article.category_id group by category_name;";

		$categoryRes = $sidebarModel->Query($categorySql);
		$categoryRows = $sidebarModel->FetchAll($categoryRes);

		$this->assign('category', $categoryRows);

		//标签
		$tagSql = "SELECT DISTINCT tag FROM article ORDER BY article_id desc limit 0,12";

		$tagRes = $sidebarModel->Query($tagSql);
		$tagRows = $sidebarModel->FetchAll($tagRes);

		$this->assign('tag', $tagRows);

		//友链

		$linkSql = "SELECT * FROM link";

		$linkRes = $sidebarModel->Query($linkSql);
		$linkRows = $sidebarModel->FetchAll($linkRes);

		$this->assign('link', $linkRows);


	}

	public function category()
	{
		if(isset($config['params']['id']))
		{
			$category_id = $config['params']['id'];
		}
		else
		{
			die('NO id');
		}	
	}

	public function page()
	{
		global $config;


		if(isset($config['params']['id']))
		{
			$page = $config['params']['id'];
			if($page == 0)
			{
				$page=1;
			}
		}
		else
		{
			exit();
		}

		$articlesModel = $this->Model('articles');


		$sql1 = "SELECT COUNT(*) as total from article";
		$res1 = $articlesModel->Query($sql1);
		$row1 = $articlesModel->FetchOne($res1);
		$count = $row1->total;

		$page = (int)$page;
		$count = (int)$count;

		if($count % 5 == 0)
		{
			$pagetotal = (int)($count/5);
		}
		else
		{
			$pagetotal = (int)($count/5) + 1;
		}

		if($page > $pagetotal)
		{
			$page = $pagetotal;
		}
		

		$sql2 = "SELECT * FROM article ORDER BY date DESC LIMIT " . ($page-1) * 5 . ", 5";
		$res2 = $articlesModel->Query($sql2);
		$row2 = $articlesModel->FetchAll($res2);


		$this->assign('articles', $row2);
		$this->sidebar();
		$this->assign('next', $page+1);

		if($page-1 == 0)
		{
			$this->assign('previous', 1);
		}
		else
		{
			$this->assign('previous', $page-1);
		}
		$this->display('index');

	}


















}