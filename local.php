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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="view.css">
    <title>Cambio</title>
    <style>
        table {
            border-collapse: collapse;
            border-spacing: 0;
            width: 100%;
            border: 1px solid #ddd;
        }

        th,
        td {
            text-align: left;
            padding: 8px;
        }
    </style>
</head>

<body>
    <center>
        <table border="2" style="margin-top: auto;margin-bottom: auto;" class="center">
            <tr>
                <th></th>
                <th>
                    <h1>Electricity</h1>
                </th>
                <th>
                    <h1>Status</h1>
                </th>

            </tr>
            <tr>
                <th>
                    <h1>classe N°1</h1>
                </th>
                <td>
                    <?php
                    if ($row['status'] == 1) {
                        echo '<h1 style="color:green;">Active </h1';
                    } else {
                        echo '<h1 style="color:red;">Inactive</h1>';
                    }
                    ?>
                </td>
                <td>
                    <?php
                    if ($row['alert'] == 1) {
                        echo '<h1 style="color:red;">urgency</h1';
                    } else {
                        echo '<h1 style="color:green;">normal</h1>';
                    }
                    ?>
                </td>

            </tr>
            <tr>
                <th>
                    <h1>classe N°2</h1>
                </th>
                <td></td>
                <td></td>

            </tr>
            <tr>
                <th>
                    <h1>classe N°3</h1>
                </th>
                <td></td>
                <td></td>

            </tr>
        </table>
    </center>
</body>

</html>