<?php

class AdminController extends Controller
{
	public function index()
	{
		$this->auth(1);
		$this->display('login');
	}

	public function login()
	{
		$user = $_POST['username'];
		$pass = $_POST['password'];
		$AdminModel = $this->Model('admin');

		$res = $AdminModel->Query('SELECT * FROM admin');
		$row = $AdminModel->FetchOne($res);

		if($user == $row->username && $pass == $row->password)
		{
			$_SESSION['login'] = 1;
			$this->redirect("index.php/admin/admin_index");
		}
		else
		{
			$this->alert("username or password error!");
		}
	}

	public function admin_index()
	{
		$this->auth();
		$this->display('admin_index');
	}

	public function logout()
	{
		$this->auth();
		if(isset($_COOKIE[session_name()]))
		{
			setCookie(session_name(),'',time()-3600,'/');			
		}

		session_destroy();
		$this->redirect('index.php/admin');
	}

	public function articlesAdd()
	{
		$this->auth();
		$CategoryShowModel = $this->Model('category');

		$res = $CategoryShowModel->Query("SELECT * FROM category");
		$rows = $CategoryShowModel->FetchAll($res);

		$this->assign('category', $rows);
		$this->display('admin_add_articles');
	}

	public function articlesAddAction()
	{
		$this->auth();

		$title = $_POST['title'];
		$content = $_POST['content'];
		$summary = $_POST['summary'];
		$date = time();
		$tag = $_POST['tag'];
		$category_id = $_POST['category_id'];
		$name = 'watcher';

		$articlesAddModel=$this->Model('articles');
		$sql = "INSERT INTO article (`title`,`content`,`summary`,`date`,`tag`,`category_id`,`author`) VALUES ('".$title."','".$content . "','" .$summary ."','".$date."','".$tag."','".$category_id."','".$name."')";


		if($articlesAddModel->Execute($sql))
		{
			$this->alert('add succeed!');
		}
		else
		{
			$this->alert('add failed');
		}
	}

	public function articlesList()
	{
		$this->auth();

		$articlesShowModel = $this->Model('articles');

		$sql = "SELECT article_id,tag,title,category_name,date FROM `article` inner join category on article.category_id=category.category_id";

		$res = $articlesShowModel->Query($sql);
		$rows = $articlesShowModel->FetchAll($res);

		$this->assign('articles', $rows);
		$this->display('admin_articles');
	}

	public function articlesMod()
	{
		global $config;

		$this->auth();

		if(isset($config['params']['id']))
		{
			$article_id = $config['params']['id'];
		}
		else
		{
			$article_id = 1;
		}
		
		$articlesShowModel = $this->Model('articles');

		$sql = "SELECT * FROM `article` inner join category on article.category_id=category.category_id where article_id='".$article_id."'";
		$res = $articlesShowModel->Query($sql);
		$row = $articlesShowModel->FetchOne($res);

		if(empty($row))
		{
			$this->alert('NO id');
			exit();
		}

		$CategoryShowModel = $this->Model('category');

		$res1 = $CategoryShowModel->Query("SELECT * FROM category");
		$row1 = $CategoryShowModel->FetchAll($res1);

		$this->assign('articles', $row);
		$this->assign('category', $row1);
		$this->display('admin_mod_articles');

	}



	public function articlesModAction()
	{
		global $config;
		$this->auth();

		$title = $_POST['title'];
		$content = $_POST['content'];
		$summary = $_POST['summary'];
		$date = time();
		$tag = $_POST['tag'];
		$category_id = $_POST['category_id'];
		$articles_id = $config['params']['id'];

		$articlesModModel = $this->Model('articles');

		$sql = "update article set title='".$title."',content='".$content . "',summary='" . $summary ."',date='".$date."',tag='".$tag."',category_id='".$category_id."' where article_id='".$articles_id."'";

		if($articlesModModel->Execute($sql))
		{
			$this->alert('mod succeed');
		}
		else
		{
			$this->alert('mod failed');
		}


	}



	public function articlesDel()
	{
		global $config;
		$this->auth();

		$articlesDelModel = $this->Model('articles');

		$sql = "DELETE FROM article WHERE article_id = '" . $config['params']['id'] . "'";
		var_dump($sql);

		if($articlesDelModel->Execute($sql))
		{
			$this->alert('del successed');
		}
		else
		{
			//$this->alert('del failed');
		}
	}


	public function notice()
	{
		$this->auth();

		if(isset($_POST['notice']))
		{
			$noticeModel = $this->Model('notice');
			$sql = "INSERT INTO notice (`content`, `date`) VALUES ('" . $_POST['notice'] . "','" . time() . "')";
			if($noticeModel->Execute($sql))
			{
				$this->alert('add notice successed');
			}
			else
			{
				$this->alert('add notice failed');
			}
		}

		$this->display('admin_notice');
	}

	public function link()
	{
		$this->auth();
		$linkShowModel = $this->Model('link');

		$res = $linkShowModel->Query("SELECT * FROM link");
		$rows = $linkShowModel->FetchAll($res);

		$this->assign('link', $rows);
		$this->display('admin_link');
	}

	public function linkAdd()
	{
		$this->auth();
		$name = $_POST['name'];
		$url = $_POST['url'];
		$linkModel = $this->Model('link');

		$sql = "INSERT INTO link (`name`, `url`) VALUES ('" . $name . "','" . $url . "')";

		if($linkModel->Execute($sql))
		{
			$this->alert('add link successed');
		}
		else
		{
			$this->alert('add link failed');
		}
	}

	public function linkDel()
	{
		global $config;
		$this->auth();

		$linkDelModel = $this->Model('link');

		$sql = "DELETE FROM link WHERE id = '" . $config['parmas']['id'] . "'";

		if($linkDelModel->Execute($sql))
		{
			$this->alert('del successed');
		}
		else
		{
			$this->alert('del failed');
		}
	}

	public function category()
	{
		$this->auth();

		$CategoryShowModel = $this->Model('category');

		$res = $CategoryShowModel->Query("SELECT * FROM category");
		$rows = $CategoryShowModel->FetchAll($res);

		$this->assign('category', $rows);
		$this->display('admin_category');

	}

	public function categoryAdd()
	{
		$this->auth();
		$category = $_POST['category'];
		$CategoryModel = $this->Model('category');

		$sql = "INSERT INTO category(category_name) values('" . $_POST['category'] . "')"; 

		if($CategoryModel->Execute($sql))
		{
			$this->alert('add successed');
		}		
		else
		{
			$this->display('add failed');
		}

	}

	public function categoryDel()
	{
		global $config;

		$this->auth();
		$CategoryDelModel = $this->Model('category');

		$sql = "DELETE FROM category WHERE category_id = '" . $config['params']['id'] . "'";

		if($CategoryDelModel->Execute($sql))
		{
			$this->alert('del successed');
		}
		else
		{
			$this->alert('del failed');
		}
	}

	public function comment()
	{
		$this->auth();

		$commentModel = $this->Model('comment');

		$res = $commentModel->Query("SELECT * FROM comment");
		$rows = $commentModel->FetchAll($res);

		$this->assign('comment', $rows);
		$this->display('admin_comment');
	}

	public function commentDel()
	{
		global $config;

		$this->auth();

		$commentDelModel = $this->Model('comment');

		$sql = "DELETE FROM comment WHERE id ='". $config['params']['id'] . "'";

		if($commentDelModel->Execute($sql))
		{
			$this->alert('del successed');
		}
		else
		{
			$this->alert('del failed');
		}
	}









}