<!DOCTYPE html>
<html lang="en">
<head>
  <title>StreamShop</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link href="css/responsive.css" rel="Stylesheet">
  <link href="css/client.css" rel="Stylesheet">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>

  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin: 1% 1%;
      margin-bottom: 0;
      border-radius: 5px;
    }
    
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 25px;
      border-radius: 5px;
    }
  </style>
</head>
<body >

<?php
include'menu.php';
?>

<div class="container-fluid bg-3 text-center">    
  <h2 style="color: blue;">Istreams Shop Products</h2><br>
  <div class="row">
    <div class="col-sm-3">
      <p>Thinkpad laptops</p>
      <img src="images/09_Thinkpad_X380_Front_forward_facing_HD_Camera_Black.jpg" class="img-responsive" height="200" width="200" alt="Image">
    </div>
    <div class="col-sm-3"> 
      <p>Dell Desktops</p>
      <img src="images/dell_d.jpg" class="img-responsive img-rounded"  height="200" width="200" alt="Image">
    </div>
    <div class="col-sm-3"> 
      <p>Hp Desktops</p>
       <img src="images/hp_d1.jpg" class="img-responsive img-rounded"  height="200" width="200" alt="Image">
    </div>
    <div class="col-sm-3">
       <p>Lenovo Laptops</p>
       <img src="images/lenovo2.jpg" class="img-responsive img-rounded"  height="200" width="200" alt="Image">
     </div>
  </div>
</div><br>

<div class="container-fluid bg-3 text-center">    
  <div class="row">
    <div class="col-sm-3">
      <p>Laptop-chargers</p>
      <img src="images/png Dell-charger.png" class="img-responsive" height="200" width="200" alt="Image">
    </div>
    <div class="col-sm-3"> 
      <p>Bluetooth Speakers</p>
      <img src="images/png speakers.png" class="img-responsive"  height="200" width="200" alt="Image">
    </div>
    <div class="col-sm-3"> 
      <p>laptop bags</p>
      <img src="images/png laptop bag.png" class="img-responsive" height="200" width="200" alt="Image">
    </div>
    <div class="col-sm-3">
      <p>Routers</p>
      <img src="images/png router.png" class="img-responsive"  height="200" width="200" alt="Image">
    </div>
  </div>
</div><br><br>
<div class="container-fluid bg-3 text-center">    
  <div class="row">
    <div class="col-sm-3">
      <p>Usb extension cables</p>
      <img src="images/usb.jpg" class="img-responsive" height="200" width="200" alt="Image">
    </div>
    <div class="col-sm-3"> 
      <p>External hard disks</p>
      <img src="images/transed.jpg" class="img-responsive"  height="200" width="200" alt="Image">
    </div>
    <div class="col-sm-3"> 
      <p>hp elitbook laptop</p>
      <img src="images/hp_elitbook.jpg" class="img-responsive" height="200" width="200" alt="Image">
    </div>
    <div class="col-sm-3">
      <p>Keyboard and Mouse</p>
      <img src="images/parts.jpg" class="img-responsive"  height="200" width="200" alt="Image">
    </div>
  </div>
</div><br><br>

<footer class="container-fluid text-center">
  <p>&copy Ivan 2018</p>
</footer>

</body>
</html>
