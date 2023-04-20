<?php

// session_start();

// include("connection.php");
// include("functions.php");


// if ($_SERVER['REQUEST_METHOD'] == "POST") {

// $user_name = $_POST['user_name'];
// $password = $_POST['password'];

// if (!empty($user_name) && !empty($password) && !is_numeric($user_name)) {


// $query = "select * from users where user_name = '$user_name' limit 1";
// $result = mysqli_query($con, $query);

// if ($result) {
// if ($result && mysqli_num_rows($result) > 0) {

// $user_data = mysqli_fetch_assoc($result);

// if ($user_data['password'] === $password) {

// $_SESSION['user_id'] = $user_data['user_id'];
// header("Location: index.php");
// die;
// }
// }
// }

// echo "wrong username or password!";
// } else {
// echo "wrong username or password!";
// }
// }

?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="img/2071992.png" type="image/x-icon">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="style/log style.css">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Cambio</title>
</head>

<body>

	<div class="container">
		<div class="left">
			<h1>Log In</h1>
			<form method="post">
				<h2>User name</h2>
				<input id="name" type="text" name="user_name" required>
				<h2>password</h2>
				<input id="password" type="password" name="password" required>
				<input id="button" type="submit" value="Login"><br><br>
				<a href="local.php">Admin</a><br><br>
			</form>
		</div>
		<div class="right">
			<img src="img/tables-right-dec.png" alt="Cambio">
			<h1>Cambio</h1>
		</div>
	</div>
	<!-- <div class="backimg"><img src="./images/videos-right-dec.png" alt=""></div> -->
	<div class="leftimg"><img src="img/tables-left-dec.png" alt=""></div>
	<div class="rightimg"><img src="img/contact-dec.png" alt=""></div>
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