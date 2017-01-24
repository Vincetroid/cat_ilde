<?php
session_start();
include 'dbh.php';

$user = $_POST['user'];
$pwd = $_POST['pwd'];

$sql = "SELECT * FROM user WHERE user = '$user'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$hash_pwd = $row['pwd'];

if ($hash_pwd == $pwd) {
	$sql = "SELECT * FROM user WHERE user = '$user' AND pwd = '$hash_pwd'";
	$result = mysqli_query($conn, $sql);
	$_SESSION['id'] = $row['id'];
	header("Location: ../index.php");
} else {
	header("Location: ../index.php?error=login");
	exit();
}

?>