<?php
session_start();

include("connection.php");
include("functions.php");


if ($_SERVER['REQUEST_METHOD'] == "POST") {
	//something was posted
	$user_name = $_POST['user_name'];
	$password = $_POST['password'];

	if (!empty($user_name) && !empty($password) && !is_numeric($user_name)) {

		//save to database
		$user_id = random_num(20);
		$query = "insert into users (user_id,user_name,password) values ('$user_id','$user_name','$password')";

		mysqli_query($con, $query);

		header("Location: login.php");
		die;
	} else {
		echo "Please enter some valid information!";
	}
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="2071992.png" type="image/x-icon">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
		rel="stylesheet">
	<link rel="stylesheet" href="log style.css">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Cambio</title>
</head>

<body>

	<div class="container">
		<div class="left">
			<h1>Sign up</h1>
			<form method="post">
				<h2>user name</h2>
				<input id="text" type="text" name="user_name" required>
				<h2>password</h2>
				<input id="text" type="password" name="password" required>
				<input id="button" type="submit" value="Signup"><br><br>

				<a href="login.php">Login</a><br><br>
			</form>
		</div>
		<div class="right">
			<img src="tables-right-dec.png" alt="Cambio">
			<h1>Cambio</h1>
		</div>
	</div>
	<!-- <div class="backimg"><img src="./images/videos-right-dec.png" alt=""></div> -->
	<div class="leftimg"><img src="tables-left-dec.png" alt=""></div>
	<div class="rightimg"><img src="contact-dec.png" alt=""></div>
	<script>
		// Basic client-side validation to ensure that both fields are filled in
		const form = document.querySelector('form');
		const usernameInput = document.querySelector('#username');
		const passwordInput = document.querySelector('#password');

		form.addEventListener('submit', event => {
			if (!usernameInput.value || !passwordInput.value) {
				event.preventDefault();
				alert('Please enter both a username and password.');
			}
		});
	</script>

</body>

</html>