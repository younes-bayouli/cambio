<?php
session_start();

include("connection.php");
include("functions.php");

$user_data = check_login($con);

$servername = "localhost";
$dBUsername = "id20481770_triki";
$dBPassword = "z4@HZA/O2\uP/AfK";
$dBName = "id20481770_sample";

$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);



if (isset($_POST['toggle_LED'])) {
	$sql = "SELECT * FROM LED_STATUS;";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);

	if ($row['status'] == 0) {
		$update = mysqli_query($conn, "UPDATE LED_STATUS SET status = 1 WHERE id = 1;");
	} else {
		$update = mysqli_query($conn, "UPDATE LED_STATUS SET status = 0 WHERE id = 1;");
	}
}


if (isset($_POST['Alert'])) {
	$sql = "SELECT * FROM LED_STATUS;";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);

	if ($row['alert'] == 0) {
		$update = mysqli_query($conn, "UPDATE LED_STATUS SET alert = 1 WHERE id = 1;");
	} else {
		$update = mysqli_query($conn, "UPDATE LED_STATUS SET alert = 0 WHERE id = 1;");
	}
}
$sql = "SELECT * FROM LED_STATUS;";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

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
	<div class="wrapper" id="refresh">
		<div class="col_3">
		</div>

		<div class="col_3">
			<h1 style="font-family:serf;text-align:center;">The status of the LED is:</h1>

			<?php 
			echo '<h1 style="text-align: center; color:red;">  ' . $row['status'] . '</h1>'; 
			?>

			<div class="col_3">
			</div>

			<div class="col_3" style="text-align: center;">
				<form action="index.php" method="post" id="LED" enctype="multipart/form-data">
					<input id="submit_button" type="submit" name="toggle_LED" value="Toggle LED" />
				</form>

				<script type="text/javascript">
					$(document).ready(function () {
						var updater = setTimeout(function () {
							$('div#refresh').load('index.php', 'update=true');
						}, 1000);
					});
				</script>
				<br>
				<br>
				<?php
				if ($row['status'] == 0) { ?>
					<div class="led_img">
						<img id="contest_img" src="img/led_off.png" width="100%" height="100%">
					</div>
					<?php
				} else { ?>
					<div class="led_img">
						<img id="contest_img" src="img/led_on.png" width="100%" height="100%">
					</div>
					<?php
				}
				?>




			</div>


			<div style="text-align: center;">
				<form action="index.php" method="post" id="LED" enctype="multipart/form-data">
					<input id="submit_button" type="submit" name="Alert" value="alert" />
					<h1 style="font-family:serf;text-align:center;">is there a problem?:</h1>

					<!-- <?php echo '<h1 style="text-align: center; color:red;">  ' . $row['alert'] . '</h1>'; ?> -->

				</form>
			</div>
		</div>

		<div class="col_3">
		</div>
	</div>
</body>

</html>

</html>