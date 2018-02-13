<?php

class Model
{
	protected $dblink = NULL;
	protected $res = NULL;


	//__contruct,query,execute,fetchone,fetchall,__destruct

	public function __construct() 
	{
		global $db;
		$this->dblink = mysql_connect($db['DB_HOST'], $db['DB_USER'], $db['DB_PWD']) or exit(mysql_error());
		mysql_select_db($db['DB_NAME'], $this->dblink);
		mysql_query("SET NAMES " . $db['DB_CHAR']);//
	}

	public function query($sql)
	{
		$this->res = mysql_query($sql) or exit(mysql_error());
		return $this->res;
	}

	public function Execute($sql)
	{
		if(mysql_query($sql))
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

	public function FetchOne($res, $type = 'array')
	{
		$func = $type == 'array' ? 'mysql_fetch_object' : 'mysql_fetch_row';
		$row = $func($res);

		return $row;
	}

	public function FetchAll($res, $type = 'array')
	{
		$rows = array();
		$func = $type == 'array' ? 'mysql_fetch_object' : 'mysql_fetch_row';
		while ($row = $func($res)) 
		{
			$rows[] = $row;
		}

		return $rows;
	}

	public function __destruct()
	{
		$this->dblink = NULL;
		$this->res = NULL;
	}

}