<?php ?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <title>Admin</title>
<?php 
    include 'functions.php';

?>
</head>
<body>
    <div class="sidenav">
    <a href="index.php">Home</a>
        <a href="map.php">Map</a>
        <a href="devices.php">Devices</a>
        <a href="getstarted.php">Get Started</a>
      </div>
</body>
</html>
<button onclick="<?php git_pull(); ?>">Pull from GitHub</button>
<?php
?>
