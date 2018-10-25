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
        <script type="text/javascript">
            function printcontent(it) {
                var restore = document.body.innerHTML;
                var printcontent = document.getElementById(it).innerHMTL;
                document.body.innerHTML = printcontent;
                window.print();
                document.body.innerHTML = restore;
            }
        </script>
        <title>members</title>
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
                <?php
                include'../config.php';
                $Iquery = "SELECT * FROM inquriy where Active!='NULL' ORDER BY inquiryID";
                $query_result = mysqli_query($conn, $Iquery);
                ?>
                <form method="POST" action="m_process.php">
                    <div class="table" id="inq-table" >
                        <table id="inquiries_data" class="table table-striped table-bordered" >
                            <thead>
                                <tr>
                                    <td>Client-ID</td>
                                    <td>Type of Inquiry</td>
                                    <td>Inquiry description</td>
                                    <td>Date of submission</td>
                                    <td>Verify inquirely</td>
                                </tr>
                            </thead>

                            <?php
                            while ($row = mysqli_fetch_array($query_result)) {
                                ?>
                                <tr>
                                    <td><?php echo $row['uID']; ?></td>
                                    <td><?php echo $row['inquiryName']; ?></td>
                                    <td><?php echo $row['inquiryDesc']; ?></td>
                                    <td><?php echo $row['date']; ?></td>
                                    <td align="center">
                                        <a class="btn btn-info" href="editform.php?edit_id=<?php echo $row['pID']; ?>" title="click for edit" onclick="return confirm('sure to edit = <?php echo $row['pID']; ?> ?')">
                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </a>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </table>
                        <input type="submit" class="btn btn-primary" value="PRINT-CONTENT" name="editClient" onclick="printcontent('inq-table')">
                    </div>
                </form>
                <script type="text/javascript">
                    $(document).ready(function () {
                        $('#inquiries_data').DataTable();
                    });
                </script>
            </div>
            <div class ="row foot">
                <div class="row">
                    <div class="col-sm-4">

                    </div>
                    <div class="col-sm-1">
                        <a href="https://www.facebook.com/i5treams"><img src="images/facebook.png" alt="facebook" class="img-responsive fimage"></a>
                    </div>
                    <div class="col-sm-1">
                        <a href="https://www.instagram.com/innovationstreams"><img src="images/instagram.png" alt="instagram" class="img-responsive fimage"></a>
                    </div>
                    <div class="col-sm-1">
                        <a href="https://twitter.com/innovationstrms"><img src="images/twitter.png" alt="twitter" class="img-responsive fimage"></a>
                    </div>
                    <div class="col-sm-1">
                        <a href="https://www.linkedin.com/company/innovation-streams-limited"><img src="images/linkedin-128.png" alt="linkedin" class="img-responsive fimage"></a>
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

