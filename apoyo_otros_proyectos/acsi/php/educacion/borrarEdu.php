<?php
session_start();
include '../dbh.php';

$id = $_POST['id'];
$sql = "DELETE FROM educacion WHERE id_edu = '$id'";
$result = mysqli_query($conn,$sql);

if ($result) {
	echo "Registro eliminado";
}
?>