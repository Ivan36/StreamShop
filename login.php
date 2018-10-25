<!Doctype html>
<html>
<head>
    <title>sign up</title>
    <meta charset utf ="8">
    <link href="css/client.css" rel="Stylesheet">
    <link href="css/bootstrap.min.css" rel="Stylesheet">
    <link href="css/bootstrap.css" rel="Stylesheet">
    <link href="css/bootstrap-theme.min.css" rel="Stylesheet">
    <link href="admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <script src="js/jquery-2.1.1.min.js"></script>
    <script src="js/jquery.validate.js"></script>
    <script src="js/form-validation.js"></script>
    <style>
    .signup-container-login{

        border-radius: 10px;
        height:80%;
        width: 80%;
        background-color: #eee; 
        margin: 10px auto; 
    }

    .signup-container form{

        color:#6495ED;
        font-size:15px;
    }

    .signup-container input{
        padding-left:50px;
    }
</style>
</head>
<body>
    <div class="modal-header">
        <button type="button" class="close" style="color:blue;" data-dismiss="modal" aria-hidden="true">&times;</button> 
        <h3 class="modal-title" style="color:green;">Login form</h3>

    </div>
    <div class = "row signup-container-login">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">

         <form method="POST" action="process.php">
           <br><br>
           <div class="form-group">
              <div class="form-label-group">
                <div class="input-group margin-bottom-sm">
                  <span class="input-group-addon"><i class="fas fa-user fa-fw"></i></span>
                  <input type="text" id="uName" name="uName" class="form-control" placeholder="User Name" required="required" autofocus="autofocus">
              </div>
          </div>
      </div>
      <div class="form-group">
          <div class="form-label-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="fas fa-key fa-fw"></i></span>
              <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required="required">
          </div>
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
   <a href="signup.php" data-toggle="modal" data-target=".demo-popup">Signup to get an account</a><br>
   <a class="d-block small" href="forgot-password.php">Forgot Password?</a>
</div>




</div>
<div class="col-sm-2"></div>
</body>
</html>