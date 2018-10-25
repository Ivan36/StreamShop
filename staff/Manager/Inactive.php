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
        <link href="css/dataTables.bootstrap.min.css" rel="Stylesheet">
        <script src="js/jquery.dataTables.min.js"></script>
        <script src="js/datatables.bootstrap.min.js"></script>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link href="css/datatables.min.css" rel="stylesheet" type="text/css">

        <script type="text/javascript" src="js/jquery-1.11.3-jquery.min.js"></script>
        <title>MEMBERS</title>
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
                                            $("body").load('members.php');
                                            $("body").fadeIn('slow');
                                            window.location.href = "members.php";
                                        });
                                    });

                                });
                            </script>
    </head>
    <body>
        <div class="b-container">
            <div class="row head">
                 <div class="col-sm-2">
                <img src="images/loggo.jpg" class="img-responsive logo" alt="mulocha">
            </div>

            <div class="col-sm-10">
                    <header class="head1">MUROCHA BAKERY MANAGEMENT SYSTEM</header>
                </div>
                <?php
                session_start();
                $userID = $_SESSION['uID'];
                $userName = $_SESSION['uName'];
                if ($userID != NULL && $userName != NULL) {
                    echo "<h4 style='color:#6495ED;float:right;'>" . "logged in as" . " " . $userName . "</h4>";
                } else {
                    header("location:../../index.php");
                }
                ?>
            </div>

            <div class="row">
                <?php
                include 'm_menu.php';
                ?>
            </div>
            <div class="row">
                <div class="container">
                    <h2 class="form-signin-heading" style = "color:green;">INACTIVE USERS</h2><hr />
                    <button class="btn btn-info" type="button" id="btn-add" onclick="href="addroles.php""> <span class="glyphicon glyphicon-pencil"></span> &nbsp; ADD USERS</button>
                    <button class="btn btn-info" type="button" id="btn-view"> <span class="glyphicon glyphicon-eye-open"></span> &nbsp; VIEW USERS</button>
                    <hr />

                    <div class="content-loader">
                        <table cellspacing="0" width="100%" id="employee_data" class="table table-striped table-bordered table-hover table-responsive">
                            <thead>
                                <tr>
                                    <td>ID</td>
                                    <td>FIRST NAME</td>
                                    <td>LAST NAME</td>
                                    <td>GENDER</td>
                                    <td>EMAIL</td>
                                    <td>USER TYPE</td>
                                    <td>USER NAME</td>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                require_once '../dbconfig.php';

                                $stmt = $DB_con->prepare("SELECT * FROM users WHERE Active = 'NULL' ORDER BY uID");
                                $stmt->execute();
                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $row['uID']; ?></td>
                                        <td><?php echo $row['fName']; ?></td>
                                        <td><?php echo $row['lName']; ?></td>
                                        <td><?php echo $row['gender']; ?></td>
                                        <td><?php echo $row['emailAddress']; ?></td>
                                        <td><?php echo $row['type']; ?></td>
                                        <td><?php echo $row['uName']; ?></td>
                                       
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <script src="js/bootstrap.min.js"></script>
                <script type="text/javascript" src="js/datatables.min.js"></script>
                <script type="text/javascript" src="js/crud.js"></script>

                <script type="text/javascript" charset="utf-8">
                                                $(document).ready(function () {
                                                    $('#employee_data').DataTable();

                                                    $('#example')
                                                            .removeClass('display')
                                                            .addClass('table table-bordered');
                                                });
                </script>
            </div>
            <div class ="row foot">
                <div class="row">
                    <div class="col-sm-4">

                    </div>
                    <div class="col-sm-1">
                        <a href="https://www.facebook.com/"><img src="images/facebook.png" alt="facebook" class="img-responsive fimage"></a>
                    </div>
                    <div class="col-sm-1">
                        <a href="https://www.instagram.com/"><img src="images/instagram.png" alt="instagram" class="img-responsive fimage"></a>
                    </div>
                    <div class="col-sm-1">
                        <a href="https://twitter.com/"><img src="images/twitter.png" alt="twitter" class="img-responsive fimage"></a>
                    </div>
                    <div class="col-sm-1">
                        <a href="https://www.linkedin.com/"><img src="images/linkedin-128.png" alt="linkedin" class="img-responsive fimage"></a>
                    </div>
                    <div class="col-sm-4">
                    </div>
                </div>
                <div class="row">
                    <p style="text-align:center;font-size:20px;padding-top:2%;">&copy Great-Team</p>
                </div>
            </div>
        </div>
    </body>
</html>

