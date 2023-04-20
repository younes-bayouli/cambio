<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <link rel="stylesheet" href="style/scan.css">
    <title>Cambio</title>

<body>
    <div class="container">
        <video id="preview"></video>
        <button onclick="scan()">Scan QR Code</button>
        <form action="index.php" method="post">
            <input type="text" name="class" id="class" readonly placeholder="Scaning...">
            <!-- <?php echo '<input type="text" name="teacher" id="teacher" value=' . $_POST['user_name'] . '>' ?> -->
            <button type="submit">submit</button>
        </form>
    </div>
    <script>
        function scan() {
            // Initialize the scanner with the video element
            let scanner = new Instascan.Scanner({
                video: document.getElementById('preview')
            });

            // Add a listener for when a QR code is scanned
            scanner.addListener('scan', function(content) {
                alert('Scanned content: ' + content);
                scanner.stop(); // Stop the scanner once a QR code has been found
            });

            // Start the scanner
            Instascan.Camera.getCameras().then(function(cameras) {
                if (cameras.length > 0) {
                    scanner.start(cameras[2]);
                    alert("Hello, World!");

                } else {
                    alert("no camera");
                    console.error('No cameras found.');
                }
            }).catch(function(e) {
                console.error(e);
            });
        }
    </script>
</body>

</html>