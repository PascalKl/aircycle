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
        <a href="index.php">Start</a>
        <a href="map.php">Karte</a>
        <a href="devices.php">Geräte</a>
        <a href="admin.php">Admin</a>
      </div>
</body>
</html>
<button onclick="<?php git_pull(); ?>">Pull from GitHub</button>
<?php
?>
