<?php
session_start();
include("../config.php");
$action = isset($_GET['action']) ? $_GET['action'] : '';

//-------------------------------------------------logout process-------------------------------------
if ($action == "logout") {
    session_destroy();
    ?>
    <script type="text/javascript">
        window.location = "../../index.php";
    </script>
    <?php
}
//-----------------------------------------------client delete-----------------------------------------------------------
if (ISSET($_POST['delete_client'])) {
    $client_id = $_POST['uID'];

    $selquery = "SELECT*FROM users WHERE uID = $client_id ";
    $sel_result = mysqli_query($conn, $selquery);

    while ($row = mysqli_fetch_array($sel_result)) {
        $delquery = "DELETE FROM users WHERE uID = $client_id ";

        if (mysqli_query($conn, $delquery)) {
            ?>
            <script type="text/javascript">
                window.alert("Client Deleted");
                window.location.href = "index.php";
            </script>
            <?php
        } else {
            echo'client not deleted' . mysqli_connect_errno();
        }
    }
}

//------------------------------------------client edit-------------------------------------------------------------------

if (isset($_POST['saveChanges'])) {
    $fName = $_POST['fName'];
    $lName = $_POST['lName'];
    $gender = $_POST['gender'];
    $emailAddress = $_POST['emailAddress'];
    $type = $_POST['type'];

    $savequery = "UPDATE users SET fName = '{$fName}',lName = '{$lName}',"
            . "gender = '{$gender}',emailAddress = '{$emailAddress}',type = '{$type}'";

    $save_result = mysqli_query($conn, $savequery);

    if ($savequery) {
        ?>
        <script type="text/javascript">
            window.alert('details changed');
            window.location.href = "index.php";
        </script>
        <?php
    } else {
        echo'data not edited' . mysqli_connect_error();
    }
}

if (isset($_POST['cancel'])) {
    $cancelquery = "SELECT * FROM users";
    $canc_result = mysqli_query($conn, $cancelquery);
    if ($canc_result) {
        ?>
        <script type="text/javascript">
            window.location.href = "index.php";
        </script>
        <?php
    }
}
//---------------------------------------------------add_roles_process---------------------------------------------------

if (ISSET($_POST['registerMember'])) {
    $fname = $_POST['fName'];
    $lname = $_POST['lName'];
    $gender = $_POST['gender'];
    $email = $_POST['emailAddress'];
    $type = $_POST['type'];
    $uName = $_POST['uName'];
    $pass = $_POST['password'];
    $cpass = $_POST['confirmPassword'];

    if ($pass == $cpass) {
        $sql = "INSERT INTO users (fName,lName,gender,emailAddress,type,uName,password,confirmPassword) 
	values('$fname','$lname','$gender','$email','$type','$uName','$pass','$cpass')";
    } else {
        ?>
        <script type="text/javascript">
            window.alert("confirm the right password");
            window.location.href = "index.php";
        </script>
        <?php
    }

    if (mysqli_query($conn, $sql)) {
        ?>
        <script type="text/javascript">
            window.alert("Registration Successful");
            window.location.href = "index.php";
        </script>
        <?php
    } else {
        echo"Check the values" . mysqli_error();
    }
}

//---------------------------------------------------logout_process------------------------------------------------------

if ($action == "logout") {
    session_destroy();
    ?>
    <script type="text/javascript">
        window.location = "../../../index.php";
    </script>
    <?php
}
?>


<!----------------------------------------------------edit_client_form-------------------------------------------------->
<!Doctype html>
<html>
    <head>
        <meta charset utf ="8">
        <link href="css/client.css" rel="Stylesheet">
        <link href="css/bootstrap.min.css" rel="Stylesheet">
        <link href="css/bootstrap.css" rel="Stylesheet">
        <link href="css/bootstrap-theme.min.css" rel="Stylesheet">
        <script src="js/jquery-1.11.3.js" type="text/javascript"></script>
        <script src="js/jquery-1.11.3.min (1).js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/script.js" type="text/javascript"></script>
        <title>edit client</title>
        <style>
            .editpanel{
                margin-left:30%;
            }
            .editpanel form{

            }
        </style>
    </head>
    <body>
        <?php
        $userID = $_SESSION['uID'];
        $userName = $_SESSION['uName'];
        if ($userID != NULL && $userName != NULL) {
            echo "<h4 style='color:#6495ED;float:right;margin-right:20px;'>" . "logged in as" . " " . $userName . "</h4>";
        } else {
            header("location:../../index.php");
        }
        ?>

        <div class="b-container">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <p><br/></p>
                <div class='panel panel-success'>
                    <div class='panel-body' style="padding:5% 10;margin:5% 10%;">
                        <div class="row">
                            <h2 style="color:#6495ED;">EDIT MEMBER FORM</h2>
                            <hr>
                        </div>
                        <?php
                        if (isset($_POST['editClient'])) {
                            $id = $_POST['userID'];
                            $editquery = "SELECT*FROM users WHERE uID = '$id' ";

                            $edit_result = mysqli_query($conn, $editquery);
                            while ($row = mysqli_fetch_array($edit_result)) {
                                ?>
                                <div class="row ">
                                    <form method="POST" action="m_process.php">
                                        <table class="table">
                                            <tr>
                                                <td> <label style="color:green;">FIRST NAME:</label>
                                                <td> <input type="text" name ="fName"  class="form-control" value="<?php echo $row['fName'] ?>"/>
                                            </tr>
                                            <tr>
                                                <td><label style="color:green;">LAST NAME:</label>
                                                <td> <input type="text" name ="lName"  class="form-control" value="<?php echo $row['lName'] ?>"/>
                                            </tr>
                                            <tr>
                                                <td>    <label style="color:green;">GENDER:</label>
                                                <td>  <select name="gender"  class="form-control" id="gender" required>
                                                        <option selected><?php echo $row['gender'] ?></option>
                                                        <option>male</option>
                                                        <option>Female</option>
                                                        <option>Other</option>
                                                    </select>
                                            </tr>
                                            <tr>
                                                <td>    <label style="color:green;">EMAIL:</label>
                                                <td><input type="text"  class="form-control" name ="emailAddress"  value="<?php echo $row['emailAddress'] ?>"/>
                                            </tr>
                                            <tr>
                                                <td>  <label style="color:green;">TYPE:</label>
                                                <td>  <select name="type"  class="form-control" id="type" required>
                                                        <option selected><?php echo $row['type'] ?></option>
                                                        <option>client</option>
                                                        <option>manager</option>
                                                        <option>shopkeeper</option>
                                                        <option>admin</option>
                                                    </select>
                                            </tr>
                                            <tr>
                                                <td>       <label style="color:green;">USER NAME:</label>
                                                <td> <input type="text" name ="uName"  class="form-control" value="<?php echo $row['uName'] ?>"/>
                                            </tr>
                                            <tr>
                                              <td>  <label style="color:green;">PASSWORD:</label>
                                              <td><input type="text" name ="password"  class="form-control" value="<?php echo $row['password'] ?>"/>
                                            </tr>
                                           
                                            <tr>
                                                <td>   <input type="submit" value="SAVE-CHANGES" class="btn btn-primary m_buttons" name="saveChanges"/>
                                                <td><input type="submit" value="CANCEL" class="btn btn-primary m_buttons" name="cancel"/>
                                       
                                            </tr>
                                             </table>
                                    </form>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>  
            </div>
            <div class="col-sm-3"></div>
        </div>
    </body>
</html>  
