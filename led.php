<?php
session_start();


$servername = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "cambio";

$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
$id = $_SESSION['class'];
$result = mysqli_query($conn, "SELECT * FROM classes WHERE id=$id;");
$class = mysqli_fetch_assoc($result);

if ($class['status']) {
	mysqli_query($conn, "UPDATE classes SET status=0 WHERE id=$id;");
	mysqli_query($conn, "UPDATE classes SET teacher = '' WHERE id = $id;");
	header("Location: login.php");
	exit();
} else {
	mysqli_query($conn, "UPDATE classes SET status=1 WHERE id=$id;");
	header("Location: index.php");
	exit();
}
