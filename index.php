<?php
session_start();


$servername = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "cambio";

$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$cid = $_POST['class'];
	$_SESSION['class']=$cid;
} else {
	$cid = $_SESSION['class'];
}


$result = mysqli_query($conn, "SELECT * FROM classes WHERE id = $cid;");
$class = mysqli_fetch_assoc($result);


$teacherid=$_SESSION['user_id'];
$teacherresult=mysqli_query($conn, "SELECT * FROM users WHERE id = $teacherid;");
$teacher=mysqli_fetch_assoc($teacherresult);
if(mysqli_query($conn, "UPDATE classes SET teacher=$teacherid WHERE id=$cid;"))
echo '<h1>good morning '.$teacher['name'].'</h1>';
echo "<h2>" . $class["name"] . "</h2>";


?>

<style>
	.wrapper {
		width: 100%;
		padding-top: 50px;
	}

	.col_3 {
		width: 33.3333333%;
		float: left;
		min-height: 1px;
	}

	#submit_button {
		background-color: #2bbaff;
		color: #FFF;
		font-weight: bold;
		font-size: 40;
		border-radius: 15px;
		text-align: center;
	}

	.led_img {
		height: 400px;
		width: 100%;
		object-fit: cover;
		object-position: center;
	}

	@media only screen and (max-width: 600px) {
		.col_3 {
			width: 100%;
		}

		.wrapper {
			width: 100%;
			padding-top: 5px;
		}

		.led_img {
			height: 300px;
			width: 80%;
			margin-right: 10%;
			margin-left: 10%;
			object-fit: cover;
			object-position: center;
		}
	}
</style>


<html>

<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js" type="text/javascript"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>

	<?php
	if ($class['status']) {
		echo '<form action="led.php" method="post"><input type="text" name="class" value=' . $cid . ' style="display:none;">';
		echo '<input type="text" name="test" value="1" style="display: none;">';
		echo '<button type="submit">turn off</button></form>';
		echo '<div id="ledimg"><img src="img/led_on.png" alt=""></div>';
	} else {
		echo '<form action="led.php" method="post"><input type="text" name="class" value=' . $cid . ' style="display:none;">';
		echo '<input type="text" name="test" value="1" style="display: none;">';
		echo '<button type="submit">turn on</button></form>';
		echo '<div id="ledimg"><img src="img/led_off.png" alt=""></div>';
	}
	?>
	

</body>

</html>

</html>