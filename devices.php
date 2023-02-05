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
    include 'databasehelper.php';

?>
</head>
<body>
    <div class="sidenav">
        <a href="index.php">Start</a>
        <a href="map.php">Karte</a>
        <a href="devices.php">Geräte</a>
        <a href="admin.php">Admin</a>
      </div>
      <div class="main">
    <table>
        <tr>
          <th>Gerätename</th>
          <th>Registriert am</th>
        </tr>
        <?php 
        foreach (getDevices() as $device){
            echo $device;
        }
        ?>
      </table>
    </div>
</body>
</html>
<?php
?>
