<?php
//Proceso de conexión con la base de datos
$conex = mysql_connect("localhost", "root", "")
		or die("No se pudo realizar la conexion");
	mysql_select_db("cursogratuito",$conex)
		or die("ERROR con la base de datos");

//Iniciar Sesión
session_start();

//Validar si se está ingresando con sesión correctamente
if (!$_SESSION){
	header("location:login.php");	
}

$id_usuario= $_SESSION['id_usuario'];
$consulta="SELECT pais FROM usuarios WHERE id='$id_usuario'";
$resultado=mysql_query($consulta,$conex) or die(mysql_error());
$resultado_obtenido=mysql_fetch_array($resultado);
$pais= $resultado_obtenido['pais'];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Pagina de Usuario</title>
</head>
<body>
<table width="700" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="right">Usuario: <?php echo $_SESSION['nombre']; ?></td>
  </tr>
  <tr>
    <td align="center"><a href="desconectar_usuario.php">cerrar sesi&oacute;n</a></td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td align="center"><h3>P&Aacute;GINA DE USUARIO</h3></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="center">Su pa&iacute;s es: <?php echo $pais; ?></td>
  </tr>
</table>
</body>
</html>