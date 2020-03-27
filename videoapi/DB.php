<?php
if (!defined('ROOT_PATH'))
exit('invalid request');
class DB 
{
	//���ݿ��ַ
	private $dbHost = 'localhost';
	
	//MySql���ݿ��û���
	private $dbUser = 'root';
	
	 //MySql���ݿ����� 
	private $dbPwd = '123qwe';

	//MySql���ݿ�����
	private $dbName = 'kjwang23dmei';	
	
	private function connect ()
	{
		$link = mysql_connect($this->dbHost, $this->dbUser, $this->dbPwd) or die ("Could not connect"); 
		mysql_select_db($this->dbName, $link) or die ("Could not selectDB");
		mysql_query("SET NAMES UTF8;") or die ("Could not UTF8");
		return $link;
	}
	
	public function query ($sql, $parameter)
	{
		$result = NULL;
		$conn = $this->connect();
		$query = mysql_query ($sql,$conn) or die ("Invalid query��".$sql);
		switch ($parameter)
		{
			case 0 : 
				while (!!$row = mysql_fetch_row($query)) { $result[] = $row; }
				break;
			case 1 :
				while (!!$row = mysql_fetch_assoc($query)){ $result[] = $row; }
				 break;
			case 2 : $result = mysql_affected_rows($conn); //���� INERT UPDATE DELETE 푑��Д�
				break;
			case 3 : $result = mysql_num_rows($query); 
				break;
			case 4 : $result = mysql_insert_id($conn);
			break;
			case 5 : while (!!$row = mysql_fetch_field($query)){$result[] = $row->name;}
			break;
			case 6 : return $query;
		}
		return $result;
	}
	
	/**
	 * �õ���Y��
	 */
	public function GetTables()
	{
		$conn = $this->connect();
		//$tables = mysql_list_tables($this->dbName);
		$database = $this->dbName;
		$tables = mysql_query("SHOW TABLES FROM $database");
		while (!!$row = mysql_fetch_row($tables)){ 
			$result[] = $row[0]; 
		}
		return $result;
	}
	
/**
	 * SELECT ��ԃ�Z��
	 * @param String $param
	 * @param String $from
	 * @param Int $limit
	 * @param String $where
	 * @param Int $parameter
	 */
	public function Select ($param, $from, $limit, $where=null, $parameter=1)
	{
		$db = new DB();
		$sql = $where == null ? " SELECT {$param} FROM {$from} LIMIT = $limit ":
											 " SELECT {$param} FROM {$from} WHERE {$where} LIMIT $limit ";
		return $db->query($sql, $parameter);
	}
	
	/**
	 * UPDATE �����Z��
	 * @param String $param
	 * @param String $from
	 * @param Int $limit
	 * @param String $where
	 */
	public function Update ($set, $from, $where, $limit)
	{
		$db = new DB();
		$sql = " UPDATE {$from} SET {$set} WHERE {$where} LIMIT $limit";
		return $db->query($sql, 2);
	}
	
	public function selectField($sql)
	{
		$result=$this->query($sql,6);
		$row = mysql_fetch_row($result);
		return $row[0];
	}
	
	public function selectOne($sql)
	{
		$result=$this->query($sql,6);
		$row = mysql_fetch_assoc($result);
		return $row;
	}
}



?>