<?php
session_start();
include '../dbh.php';

$id = $_POST['id'];
$sql = "DELETE FROM user WHERE id = '$id'";
$result = mysqli_query($conn,$sql);

if ($result) {
	echo "Registro eliminado";
}
?>