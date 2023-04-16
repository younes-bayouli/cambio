<?php

$dbhost = "localhost";
$dbuser = "id20481770_triki";
$dbpass = "z4@HZA/O2\uP/AfK";
$dbname = "id20481770_sample";

if (!$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)) {

	die("failed to connect!");
}