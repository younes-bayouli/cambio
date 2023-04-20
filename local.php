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


$sql = "SELECT * FROM LED_STATUS;";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="img/2071992.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/view.css">
    <title>Cambio-Admin</title>
</head>

<body>
    <table>
        <tr>
            <th>ClasseID</th>
            <th>Electricity</th>
            <th>Status</th>
        </tr>
        <tr>
            <td>classe N°1</td>
            <td>
                <?php
                if ($row['status'] == 1) {
                    echo '<h1 style="color:green;">Active</h1>';
                } else {
                    echo '<h1> style="color:red;">Inactive</h1>';
                }
                ?>
            </td>
            <td>
                <?php
                if ($row['alert'] == 1) {
                    echo '<h1 style="color:red;">urgency</h1>';
                } else {
                    echo '<h1> style="color:green;">normal</h1>';
                }
                ?>
            </td>
        </tr>
        <tr>
            <td>classe N°2</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>classe N°3</td>
            <td></td>
            <td></td>
        </tr>
    </table>
</body>

</html>