<?php session_start(); ?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link href="css/responsive.css" rel="Stylesheet">
<link href="../css/client.css" rel="Stylesheet">
<!-- Custom fonts for this template-->
<link href="../fontawesome/css/all.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="../fontawesome/js/all.js" ></script>
<link href="admin/ css/sb-admin.css" rel="stylesheet">
<link href="css/client.css" rel="Stylesheet">
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-2.1.1.min.js"></script>
<script src="js/jquery.validate.js"></script>
<script src="js/form-validation.js"></script>

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
<div class="head2">
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>                        
        </button>
        <a class="navbar-brand" href="#" style="color: green;">Menu</a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li class="active"><a href="#"> <i class="fa fa-fw fa-home"></i> Home</a></li>
          <li><a href="#"><i class="fa fa-fw fa-comments"></i>About</a></li>
          <li><a href="#"><i class="fa fa-fw fa-camera"></i>Gallery</a></li>
          <li><a href="#"><i class="fa fa-fw fa-phone"></i>Contact</a></li>
          <li><a href="#"><i class="fa fa-fw fa-question"></i>Inquiries</a></li>
          <li><a href="index.php"><i class="fa fa-fw fa-shopping-cart"></i>Online Shop</a></li>
          <li class = "dropdown">
            <a href = "#" class = "dropdown-toggle" data-toggle = "dropdown"><i class="fas fa-fw fa-list"></i> OurProducts<b class = "caret"></b></a>

            <ul class = "dropdown-menu">
              <li><a href = "../computer.php">Computers</a></li>
              <li><a href = "../disk.php">Hard disks</a></li>
              <li><a href = "../spare.php">Spare Parts</a></li>
              <li><a href = "../website.php">Websites</a></li>
            </ul>
          </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <!-- <li><a href="home.php"><i class="fa fa-fw fa-user" style="margin-left:12px;margin-top:10%;"></i></a></li>     -->
          <li>
            <?php

            $uID = $_SESSION['uID'];
            $username = $_SESSION['uName'];
            if ($uID != NULL && $username != NULL) {
                     // echo "<h4 style='color:#6495ED;float:right;'>" . "ID:" . " " . $uID . "</h3>";
              echo "<h4 style='color:#f7fafb;margin-left:20px;margin-top:10%;'>"."<a href='home.php'><i class='fa fa-fw fa-user '></i>" . "Welcome " . " " . $username . "</a></h4>";
            } else {
              header("location:index.php");
            }
            ?>
          </li>
          <li><a href="process.php?action=logout" style="color: gold;"><i class="fas fa-fw fa-power-off"></i> Logout</a></li>
        </ul>
      </div>
    </div>
  </nav>
</div>
<div class="jumbotron head">
  <div class="container text-center">
    <div class="row"">

      <div class="col-sm-3">
        <img src="../images/logo.png" style="width: 100%" class="img-responsive" alt="innovation-streams-limited">
      </div>

      <div class="col-sm-9">
        <header class="">CLIENTS MANAGEMENT SYSTEM</header>
        <p>Innovation is why we exist...</p>
        <p>(Using Technology to make the world a better place)</p>
      </div>
    </div>   

  </div>
</div>
