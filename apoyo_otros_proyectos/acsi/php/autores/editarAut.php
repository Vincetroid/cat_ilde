<?php
session_start();
include '../dbh.php';

if (isset($_POST["aut_id"]))
{
	$sql = "SELECT * FROM autores WHERE id = '".$_POST["aut_id"]."'";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($result);
	echo json_encode($row);
}

?>