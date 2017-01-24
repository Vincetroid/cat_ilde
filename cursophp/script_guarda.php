<?php
$nombre= $_POST['nombre'];
$email= $_POST['email'];
$pais= $_POST['pais'];
$password= $_POST['password'];

if(isset($email)){

$conex= mysql_connect("localhost","root","")
	or die("No se pudo realizar la conexion");
mysql_select_db("cursogratuito",$conex)
	or die("ERROR con la base de datos");
	
	
$sql_insertar="INSERT INTO usuarios SET nombre='$nombre', email='$email',pais='$pais', password='$password'";
mysql_query($sql_insertar,$conex) or die (mysql_error());
mysql_close();
header("location:login.php");
}
else{
	header("location:formulario.php");	
}
?>