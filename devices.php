<!DOCTYPE html>
<html class="wide wow-animation" >
  <head>
    <title>AirCycle - Devices</title>
    <?php include 'parts/head.php'; 
    include 'functions.php';
    include 'databasehelper.php';?>
  </head>
  <body>
  <div class="page"> 
      <section class="section page-header-3">
  <?php include 'parts/header.php'; ?>
  <section class="section section-md">
        <div class="container">
          <div class="table-outer table-rounded table-responsive-lg">
            <table class="table-custom table-custom-primary">
              <thead>
                <tr>
                  <th>Device</th>
                  <th>Name</th>
                </tr>
              </thead>
              <tbody>
                <?php
              $result = getDevices();
              if ($result->num_rows > 0) 
           {
               while($row = $result->fetch_assoc())
               {
                   ?>
                   <tr>
                   <?php
                   ?> <td> <?php echo $row["name"]; ?> </td>
                   <td> <?php echo $row["created"]; ?> </td>
                   </tr>
                   <?php
               }
           } 
           else {
               echo "keine ";
           }
    ?>
              </tbody>
              <tfoot>
                <tr>
                  <td>Total Devices: </td>
                  <td><?php echo $result->num_rows ?></td>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </section>
      <?php include 'parts/footer.php'; ?>
    </div>
    <div class="snackbars" id="form-output-global"></div>
    <script src="theme/js/core.min.js"></script>
    <script src="theme/js/script.js"></script>
  </body>
</html>