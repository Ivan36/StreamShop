<!Doctype html>
<html>
<head>
    <title>sign up</title>
    <meta charset utf ="8">
    <link href="css/client.css" rel="Stylesheet">
    <link href="css/bootstrap.min.css" rel="Stylesheet">
    <link href="css/bootstrap.css" rel="Stylesheet">
    <link href="css/bootstrap-theme.min.css" rel="Stylesheet">
    <script src="js/jquery-2.1.1.min.js"></script>
    <script src="js/jquery.validate.js"></script>
    <script src="js/form-validation.js"></script>
    <style>
    .signup-container{
        margin-top:2px;
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
        <h3 class="modal-title" style="color:green;">Please sign up here</h3>
    </div>
    <div class = "row signup-container">
        <div class="col-sm-12">
            <form method="POST" name="registration_form" id="registration_form" action="process.php" style="padding:20px 40px;">
             <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <label for="firstName">First name</label>
                    <input type="text" class="form-control" name="fName" id="fName" placeholder="Enter First Name" required>
                    
                </div>
            </div>
            <div class="col-md-6">
              <div class="form-label-group">
                <label for="lastName">Last name</label>
                <input type="text" class="form-control" name="lName" id="lName" placeholder="Enter Last Name" required>
                
            </div>
        </div>
    </div>
</div>

<div class="col-md-12">
  <div class="form-label-group">
   <label>Gender:</label>
   <select name="gender" class="form-control" id="gender" required>
    <option value="Male" selected>Male</option>
    <option value="Female">Female</option>
    <option value="Other">Other</option>
</select>
</div>
</div>

<div class="col-md-12">
  <div class="form-label-group">
   <label>Email Address:</label>
   <input type="Email" class="form-control" name="emailAddress" id="emailAddress" placeholder="Example2323@mail.com" required>
</div>
</div>


<div class="form-group">
    <input type="hidden" value="client" name="type" class="form-control" required>
</div>
<div class="col-md-12">
  <div class="form-label-group">
   <label>Enter Prefered Username:</label>
   <input type="text" class="form-control" name="uName" id="uName" placeholder="user name" required>
</div>
</div>


<div class="form-group">
  <div class="form-row">
    <div class="col-md-6">
      <div class="form-label-group">
        <label for="firstName">Password:</label>
        <input type="password" class="form-control" name="password" id="password" required>
        
    </div>
</div>
<div class="col-md-6">
  <div class="form-label-group">
    <label for="lastName">Confirm Password:</label>
    <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" required>
    
</div>
</div>
</div>
</div>

<button type="submit" style="float:right;margin-right:10px;margin-bottom:10px; margin-top: 10px;" class="btn btn-success" name="register" value="REGISTER">Create Account </button>
</div>
</form>
</div>
</div>
</body>
</html>