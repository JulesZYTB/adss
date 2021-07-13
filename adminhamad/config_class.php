<?php
/**
*
*
*
*all right reserved to lhbib95
*facebook : fb.com.hobrt
*khamsat  khamsat.com/user/lhbib95
*website  : arabfor.com
*
*
*
**/

/**
* hobrt's class
*/

class db
{
	public $insert_id;
	public static $connect;
	public function __construct()
	{
		global $db_server, $db_name, $db_username, $db_password;
		self::$connect=new mysqli($db_server ,$db_username ,$db_password ,$db_name);
		self::$connect -> set_charset("utf8");
	}
	/**
	* @access public
	* @param srting
	* @return string result of query $sql 
	**/
	public function qex($sql) {
		$result=self::$connect -> query($sql) or die(self::$connect->error." SQL : $sql");
		$this->insert_id = self::$connect->insert_id;
		return $result;
	}
	/**
	* @access public
	* @param srting,string (fil_function example trim|htmlspecialchars|any_function )
	* @return string result of filtering $var 
	**/
	public function fil($var,$fil_function = false) {
		if($fil_function === false){
			return self::$connect -> real_escape_string($var);
		}
		else
		{
			$fun = explode("|", $fil_function);
			foreach ($fun as $key) {
				$var = $key($var);
			}
			return self::$connect -> real_escape_string($var);
		}
	}
	/**
	* @access public
	* @param noting
	* @return int the number of affected row in last query
	**/
	public function aff(){
		return self::$connect -> affected_rows;
	}
	/**
	* @access public
	* @param string table, string where,int limit start,int limit fin, string order, array select
	* @return string result
	**/
	public function _select($table, $where = false, $s = false, $f = false, $o = false, $t = "DESC", $a = false)
	{
		$sql = "SELECT ";
		if(is_array($a))
		{
			$sql.=implode(",", $a).' ';
		}else
		{
			$sql.="* ";
		}
		$sql.="FROM ";
		$sql.=$table;
		$sql.=' ';
		if($where != false)
		{
			$sql.="WHERE ";
			$sql.=$where.' ';
		}
		if($o != false)
		{
			$sql.="ORDER BY ";
			$sql.=$o;
			$sql.=" ";
			$sql.=$t;
		}
		if($f != false)
		{
			$sql.="LIMIT ";
			$sql.=$s;
			$sql.=",";
			$sql.=$f;
			$sql.=" ";
		}
		return $this->qex($sql);
	}
	/**
	* @access public
	* @param string table, array
	* @return void
	**/
	public function insert($tab = false , $param = array())
	{
		if(count($param) == 0)
		{
			return false;
		}elseif($tab == false)
		{
			return false;
		}else
		{
			$sql = "INSERT INTO $tab(";
			$i = 0;
			$va = "";
			foreach ($param as $key => $value) {
				$sql.=$key;
				$va.="'$value'";
				$i++;
				if($i != count($param))
				{
					$sql.=',';
					$va.=",";
				}
			}
			$sql.=") VALUES (".$va.")";
			$this->qex($sql);
			$this->insert_id = self::$connect->insert_id;
		}
	}
	/**
	* @access public
	* @param string table, array to update, array where
	* @return void
	**/
	public function update($tab = false, $param = array(),$where = array())
	{
		if(count($param) == 0)
		{
			return false;
		}elseif($tab == false)
		{
			return false;
		}elseif($where == false)
		{
			return false;
		}else
		{
			$sql = "UPDATE $tab SET ";
			$i = 0;
			foreach ($param as $key => $value) {
				$sql.=$key." = "."'$value'";
				$i++;
				if($i != count($param))
				{
					$sql.=',';
				}
			}
			$sql.=" WHERE ";
			foreach ($where as $key => $value) {
				$sql.=$key." = "."'$value'";
				$i++;
				if($i != count($param) + count($where))
				{
					$sql.=" AND ";
				}
			}
			$this->qex($sql);
		}
	}
	public function __destruct()
	{
		self::$connect -> close();
	}
}


 ?>