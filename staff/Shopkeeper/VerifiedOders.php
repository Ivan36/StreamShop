<!DOCTYPE html>
<html lang="en">
<?php
session_start();
require_once '../dbconfig.php';
?>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <script type="text/javascript" src="js/jquery-1.11.3-jquery.min.js"></script>
  <title>CURRENT STOCK</title>
  <style>
  .m_buttons{
    float:right;
    margin-left:20px;
    padding:10px 20px;
  }
</style>

<script type="text/javascript">
  $(document).ready(function () {

    $("#btn-view").hide();

    $("#btn-add").click(function () {
      $(".content-loader").fadeOut('slow', function ()
      {
        $(".content-loader").fadeIn('slow');
        $(".content-loader").load('add_form.php');
        $("#btn-add").hide();
        $("#btn-view").show();
      });
    });

    $("#btn-view").click(function () {

      $("body").fadeOut('slow', function ()
      {
        $("body").load('index.php');
        $("body").fadeIn('slow');
        window.location.href = "index.php";
      });
    });

  });
</script>

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

   <a class="navbar-brand mr-1" href="#index.php" style="color: green;">System Menu</a>

   <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
    <i class="fas fa-bars"></i>
  </button>

  <!-- Navbar Search -->
  <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
    <div class="input-group">
      <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
      <div class="input-group-append">
        <button class="btn btn-primary" type="button">
          <i class="fas fa-search"></i>
        </button>
      </div>
    </div>
  </form>

  <!-- Navbar -->
  <ul class="navbar-nav ml-auto ml-md-0">
    <li class="nav-item dropdown no-arrow mx-1">
      <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-bell fa-fw"></i>
        <span class="badge badge-danger">9+</span>
      </a>
      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
        <a class="dropdown-item" href="#">Action</a>
        <a class="dropdown-item" href="#">Another action</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#">Something else here</a>
      </div>
    </li>
    <li class="nav-item dropdown no-arrow mx-1">
      <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-envelope fa-fw"></i>
        <span class="badge badge-danger">7</span>
      </a>
      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
        <a class="dropdown-item" href="#">Action</a>
        <a class="dropdown-item" href="#">Another action</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#">Something else here</a>
      </div>
    </li>
    <li class="nav-item dropdown no-arrow">
      <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
       <?php

       $uID = $_SESSION['uID'];
       $username = $_SESSION['uName'];
       if ($uID != NULL && $username != NULL) {
                     // echo "<h4 style='color:#6495ED;float:right;'>" . "ID:" . " " . $uID . "</h3>";
        echo "<p style='color:#6495ED;float:right;margin-top:;'>" . " " . " " . $username . "</p>";
      } else {
        header("location:../../admin/login.php");
      }
      ?>
      <i class="fas fa-user-circle fa-fw"></i>
    </a>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
      <a class="dropdown-item" href="#">Settings</a>
      <a class="dropdown-item" href="#">Activity Log</a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
    </div>
  </li>
</ul>

</nav>

<div id="wrapper">

  <!-- Sidebar -->
  <ul class="sidebar navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="index.html">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span>
      </a>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-fw fa-folder"></i>
        <span>Pages</span>
      </a>
      <div class="dropdown-menu" aria-labelledby="pagesDropdown">
        <h6 class="dropdown-header">Home pages:</h6>
        <a class="dropdown-item" href="index.php">Stock</a>
        <a class="dropdown-item" href="ViewOrders.php">Single orders</a>
        <a class="dropdown-item" href="multiple_orders.php">Multiple orders</a>
        <div class="dropdown-divider"></div>
        <h6 class="dropdown-header">Verified</h6>
        <a class="dropdown-item" href="VerifiedOders.php">Single Orders</a>
        <a class="dropdown-item" href="VerifiedOder.php">Multiple Orders</a>
      </div>
    </li>
    <li class="nav-item active">
      <a class="nav-link" href="index.php">
        <i class="fas fa-fw fa-bell"></i>
        <span>Home</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#charts.html">
          <i class="fas fa-fw fa-shopping-cart"></i>
          <span>Shopping cart</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#charts.html">
            <i class="fas fa-fw fa-user"></i>
            <span>Profile</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="s_process.php?action=logout">
              <i class="fas fa-fw fa-power-off"></i>
              <span>Logout</span></a>
            </li>
          </ul>

          <div id="content-wrapper">

            <div class="container-fluid">

              <!-- Breadcrumbs-->
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="#">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Tables</li>
              </ol>

              <!-- DataTables Example -->
              <div class="card mb-3">
                <div class="card-header">
                  <i class="fas fa-table"></i>&nbsp;&nbsp;&nbsp;&nbsp;
                VERIFIED ORDERS</div>
                <div class="card-body">
                  <div class="container">
                    <!-- <h2 class="form-signin-heading" style = "color:green;"></h2><hr /> -->
                    <button class="btn btn-info" type="button" id="btn-add"> <i class="fas fa-fw fa-plus-circle"></i></span> &nbsp; UPDATE STOCK</button>
                    <button class="btn btn-info" type="button" id="btn-view"> <i class="fas fa-fw fa-eye"></i></span> &nbsp; VIEW STOCK</button>
                    <hr />

                    <div class="content-loader">
                      <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                          <thead>
                            <tr>
                              <th>ORDER ID</th>
                              <th>USER ID</th>
                              <th>PRODUCT ID</th>
                              <th>QUANTITY</th>
                              <th>CLIENT ADDRESS</th>
                              <th>PAYMENT MODE</th>
                              <th>ORDER VERIFIED</th>
                              <th>DELETE ORDER</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            require_once '../dbconfig.php';

                            $stmt = $DB_con->prepare("SELECT * FROM orders where Active = 'NULL' ORDER BY orderID");
                            $stmt->execute();
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                              ?>
                              <tr>
                                <td><?php echo $row['orderID']; ?></td>
                                <td><?php echo $row['uID']; ?></td>
                                <td><?php echo $row['pID']; ?></td>
                                <td><?php echo $row['quantity']; ?></td>
                                <td><?php echo $row['custAddress']; ?></td>
                                <td><?php echo $row['paymentMode']; ?></td>
                                <td align="center">
                                  <a class="btn btn-success btn-sm" href="#" title=""">
                                   <i class="fas fa-fw fa-check"></i>
                                 </a>
                               </td>
                               <td align="center">
                                <a class="btn btn-danger btn-sm" href="#" title="">
                                 <i class="fas fa-fw fa-trash"></i>
                               </a>
                             </td>
                           </tr>
                           <?php
                         }
                         ?>
                       </tbody>
                     </table>
                   </div>
                 </div>
               </div>
             </div>
             <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
           </div>

           <p class="small text-center text-muted my-5">
            <em>More table examples coming soon...</em>
          </p>

        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © Your Website 2018</span>
            </div>
          </div>
        </footer>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href = "s_process.php?action=logout">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="js/demo/datatables-demo.js"></script>

  </body>

  </html>
