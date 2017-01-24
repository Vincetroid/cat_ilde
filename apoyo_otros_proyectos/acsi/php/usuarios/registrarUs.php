<?php
session_start();
include '../dbh.php';

if (!empty($_POST)) {
	$output = '';
	$user = $_POST['user'];
	$pwd = $_POST['pwd'];
	$sql = "SELECT user FROM user WHERE user = '$user'";
	$result = mysqli_query($conn,$sql);
	$usercheck = mysqli_num_rows($result);
	if ($usercheck > 0) {
		$output .= 'Error, usuario ya existente.';
	}
	else {
		$sql = "INSERT INTO user (user, pwd) VALUES ('$user','$encriptar')";
		$result = mysqli_query($conn,$sql);
		if ($result) {
			$output .= 'Datos insertados.';
		}		
	}
	echo "<script type='text/javascript'>alert('$output');</script>";
}
?>