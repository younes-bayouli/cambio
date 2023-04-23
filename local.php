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

$sql = "SELECT * FROM classes;";
$cresult = mysqli_query($conn, $sql);

echo "<table>";
echo "<tr><th>name</th><th>status</th><th>teacher</th><th>id</th></tr>";
while ($crow= mysqli_fetch_assoc($cresult)) {
    if($crow["teacher"]){
        $tid= $crow["teacher"];
        $tresult = mysqli_query($conn, "SELECT * FROM users WHERE id = $tid");
        $tinfo=mysqli_fetch_assoc($tresult);
        $tname=$tinfo["name"];
    }else{
        $tname="";
    }
    if($crow["status"]){
        echo "<tr><td>" . $crow["name"] . "</td><td style='background-color:green;'>ON</td><td>" . $tname . "</td><td>" . $crow["id"] . "</td></tr>";
    }else{
        echo "<tr><td>" . $crow["name"] . "</td><td style='background-color:red;'>OFF</td><td>" . $tname . "</td><td>" . $crow["id"] . "</td></tr>";
    }
    
}
echo "</table>";

echo "<table>";
echo "<tr><th>name</th><th>phone</th></tr>";
$tresult=mysqli_query($conn, "select * from users");
while ($trow= mysqli_fetch_assoc($tresult)) {
    echo "<tr><td>" . $trow["name"] . "</td><td>" . $trow["mobile"] . "</td></tr>";
}

echo "</table>";

mysqli_close($conn);
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        setInterval(function() {
            $.ajax({
                url: 'index.php', // replace with the URL of your PHP script to check for changes in the database
                success: function(data) {
                    if (data == '1') {
                        location.reload(); // reload the page if changes are detected
                    }
                }
            });
        }, 5000); // repeat the check every 5 seconds
    });
</script>

</body>

</html>