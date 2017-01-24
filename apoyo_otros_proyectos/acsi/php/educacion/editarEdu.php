<?php
session_start();
include '../dbh.php';

if (isset($_POST["edu_id"]))
{
	$sql = "SELECT * FROM educacion WHERE id_edu = '".$_POST["edu_id"]."'";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($result);
	echo json_encode($row);
}

?>