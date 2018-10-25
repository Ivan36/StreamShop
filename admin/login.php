<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Client-Login</title>

  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <script src="../js/jquery-2.1.1.min.js"></script>
  <script src="../js/jquery.validate.js"></script>
  <script src="../js/form-validation.js"></script>

</head>

<body class="bg-dark">
  <form method="POST" action="../process.php">
    <div class="container">
      <div class="card card-login mx-auto mt-5">
        <div class="card-header">Login</div>
        <div class="card-body">
          <form>
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" id="uName" name="uName" class="form-control" placeholder="Email address" required="required" autofocus="autofocus">
                <label for="inputEmail">User Name</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required="required">
                <label for="inputPassword">Password</label>
              </div>
            </div>
            <div class="form-group">
              <div class="checkbox">
                <label>
                  <input type="checkbox" value="remember-me">
                  Remember Password
                </label>
              </div>
            </div>
            <input type="submit" class="btn btn-primary btn-block" name="signin" value="Sign in">
          </form>
          <div class="text-center">
           <a href="../signup.php" data-toggle="modal" data-target=".demo-popup">Signup to get an account</a>
           <a class="d-block small" href="forgot-password.php">Forgot Password?</a>
         </div>
       </div>
     </div>
   </div>
 </form>
 <div class="container">
  <!-- popup box modal starts here -->
  <div class="modal fade demo-popup" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel-1" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close"style="color:red;" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">
          <div class = "row signup-container">
            <div class="col-sm-12">
                <form method="POST" name="registration_form" id="registration_form" action="process.php" style="padding:20px 40px;">
                    <div class="form-group">
                        <label>First Name:</label>
                        <input type="text" class="form-control" name="fName" id="fName" placeholder="Enter First Name" required>
                    </div>


                    <div class="form-group">
                        <label>Last Name:</label>
                        <input type="text" class="form-control" name="lName" id="lName" placeholder="Enter Last Name" required>
                    </div>


                    <div class="form-group">
                        <label>Gender:</label>
                        <select name="gender" class="form-control" id="gender" required>
                            <option value="Male" selected>Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>


                    <div class="form-group">
                        <label>Email Address:</label>
                        <input type="Email" class="form-control" name="emailAddress" id="emailAddress" placeholder="Example2323@mail.com" required>
                    </div>

                    <div class="form-group">
                        <input type="hidden" value="client" name="type" class="form-control" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Enter Prefered Username:</label>
                        <input type="text" class="form-control" name="uName" id="uName" placeholder="user name" required>
                    </div>


                    <div class="form-group">
                        <label>Password:</label>
                        <input type="password" class="form-control" name="password" id="password" required>
                    </div>


                    <div class="form-group">
                        <label>Confirm Password:</label>
                        <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" required>
                        <hr>   
                    </div>


                    <button type="submit" style="float:right;margin-right:10px;margin-bottom:10px;" class="btn btn-warning" name="register" value="REGISTER">REGISTER 
                    </button>
                </form>
            </div>
        </div>
        </div>

      </div>
    </div>
  </div>
</div>
<!-- popup box modal ends here -->
<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>
