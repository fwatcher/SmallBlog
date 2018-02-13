<?php

class Route
{
	private $controller;
	private $method;
	private $params = array();

	public function __construct()
	{
		$this->parseUrl();
	}

	protected function parseUrl()
	{
		global $config;
		/*
			www.xxx.com/index.php/index/welcome/goods/52

			$_SERVER['PATH_INFO'] = /index/welcome/goods/52


		*/

		$path_info = isset($_SERVER['PATH_INFO']) ? trim($_SERVER['PATH_INFO'], '/') : '';
		$arr = explode('/', $path_info);
		$this->controller = array_shift($arr);
		$this->method = array_shift($arr);
		
		for($i = 0; $i < count($arr); $i = $i + 2)
		{
			$this->params[$arr[$i]] = $arr[$i+1];
		}

		$this->controller = !empty($this->controller) ? $this->controller : $config['DEFAULT_CONTROL'];
		$this->method = !empty($this->method) ? $this->method : $config['DEFAULT_ACTION'];

	}

	public function run()
	{
		global $config;

		$config['params'] = $this->params;

		$controlFile = ROOT_PATH . '/controller/' . $this->controller . '.php';
		if(!file_exists($controlFile))
		{
			exit('控制器' . $controlFile . '不存在');
		}
		include($controlFile);

		$className = ucwords($this->controller) . 'Controller';
		if(!class_exists($className))
		{
			exit('控制器类' . $className . '未定义');
		}

		$instance = new $className();

		$methodName = $this->method;

		if(!method_exists($instance, $methodName))
		{
			exit('方法' . $this->method . '不存在');
		}

		$instance->$methodName();

	}


}