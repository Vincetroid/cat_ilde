<?php
	$host="localhost";
	$usuario="ildef0nso";    //"ildef0nso";
	$password="6kv3bf#sN560f05nd1i" ;      //"6kv3bf#sN560f05nd1i";
	$db_name="ildefonso";

$cnx=mysql_pconnect($host,$usuario,$password) or die('Error en la conexión');
$db=mysql_select_db($db_name);	
mysql_set_charset('utf8');
	
//$cnx=mysql_pconnect('localhost','root','') or die('Error en la conexión');
//$db=mysql_select_db('ildefonso');


function clean($s)
{
	if (is_array($s)) 
	{
		foreach($s as $c=>$v)	
		{
				$s[$c]=clean($v);
		}
				return $s;
	}
	else
		$s=mysql_real_escape_string($s);
		return $s;
}
	
///   echo mysql_error();
///   var_dump(variable);
?>
