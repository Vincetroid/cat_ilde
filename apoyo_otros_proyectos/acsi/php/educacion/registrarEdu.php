<?php
session_start();
include '../dbh.php';

if (!empty($_POST)) {
	$mensaje = '';
	$aut_id = $_POST['aut_id'];
	$inst = $_POST['inst'];
	$fecha_ini = $_POST['fecha_ini'];
	$fecha_fin = $_POST['fecha_fin'];
	if ($_POST['edu_id'] != '')
	{
		$sql = "UPDATE educacion SET institucion = '$inst', fecha_ini = '$fecha_ini', fecha_fin = '$fecha_fin' WHERE id_edu = '".$_POST['edu_id']."'";
		$mensaje = 'Datos actualizados.';
	}
	else 
	{
		$sql = "INSERT INTO educacion (id_autor, institucion, fecha_ini, fecha_fin) VALUES ('$aut_id', '$inst', '$fecha_ini', '$fecha_fin')";
		$mensaje = 'Datos insertados.';
	}
	
	$result = mysqli_query($conn,$sql);
	
	if ($result)
	{
		echo "<script type='text/javascript'>alert('$mensaje');</script>";
	}
}
?>