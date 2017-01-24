<?php
session_start();
include '../dbh.php';

if (!empty($_POST)) {
	$mensaje = '';
	$nombres = $_POST['nombres'];
	$apellidos = $_POST['apellidos'];
	$nac_lugar = $_POST['nac_lugar'];
	$nac_fecha = $_POST['nac_fecha'];
	$bio = $_POST['bio'];
	if ($_POST["aut_id"] != '')
	{
		$sql = "UPDATE autores SET nombres = '$nombres', apellidos = '$apellidos', fecha_nac = '$nac_fecha', lugar_nac = '$nac_lugar', bio = '$bio' WHERE id = '".$_POST["aut_id"]."'";
		$mensaje = 'Datos actualizados.';
	}
	else 
	{
		$sql = "INSERT INTO autores (nombres, apellidos, fecha_nac, lugar_nac, bio) VALUES ('$nombres', '$apellidos', '$nac_fecha', '$nac_lugar', '$bio')";
		$mensaje = 'Datos insertados.';
	}
	
	$result = mysqli_query($conn,$sql);
	
	if ($result)
	{
		echo "<script type='text/javascript'>alert('$mensaje');</script>";
	}
}
?>