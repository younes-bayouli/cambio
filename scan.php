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
            <input type="text" name="test" value="0" style="display: none;">
            <button type="submit">submit</button>
        </form>
    </div>
    <script>
        function scan() {
            document.getElementById('class').value = "7"
            let scanner = new Instascan.Scanner({
                video: document.getElementById('preview')
            });

            scanner.addListener('scan', function(content) {
                scanner.stop();
            });

            Instascan.Camera.getCameras().then(function(cameras) {
                if (cameras.length > 0) {
                    scanner.start(cameras[2]);
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