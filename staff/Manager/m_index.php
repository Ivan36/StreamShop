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
        <title>home</title>
        <style>
            .m_buttons{
                float:right;
                margin-left:20px;
                padding:10px 20px;
            }
        </style>
    </head>
    <body>
        <div class="b-container">
            <div class="row head">
                 <div class="col-sm-2">
                <img src="images/logo.png" class="img-responsive logo" alt="mulocha">
            </div>

            <div class="col-sm-10">
                    <header class="head1">CLIENTS MANAGEMENT SYSTEM</header>
                </div>
               <?php
                session_start();
                $userID = $_SESSION['uID'];
                $userName = $_SESSION['uName'];
                $userType = $_SESSION['type'];
                if ($userID != NULL && $userName != NULL) {
                    echo "<h4 style='color:#6495ED;float:right;'>" . "logged in as" . " " . $userType . "</h4>";
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
                <div class="row">
                    <div class="col-sm-3">
                        <div class="list-group">
                            <a href="members.php" class="list-group-item ">Members</a>
                            <a href="#" class="list-group-item">Inquires</a>
                            <a href="#" class="list-group-item">Generate reports</a>
                            <a href ="m_process.php?action=logout" class="list-group-item" name = "logout">Logout</a>
                        </div>
                    </div>
                    <div class="col-sm-9">
                        <div class="jumbotron" style="border-radius:1em;padding:30px 20px;">
                            <h1>Hello,<?php echo $userName ?></h1>
                            <p>Welcome to Murocha Bakery Customer management system.fill free to interact and execute your tasks here.</p>
                        </div>
                    </div>
                </div>
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