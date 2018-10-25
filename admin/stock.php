<!Doctype html>
<?php
require_once '../dbconfig.php';

if (isset($_GET['delete_id'])) {
    // select image from db to delete
    $stmt_select = $DB_con->prepare('SELECT productImage FROM products WHERE pID =:uid');
    $stmt_select->execute(array(':uid' => $_GET['delete_id']));
    $imgRow = $stmt_select->fetch(PDO::FETCH_ASSOC);
    unlink("../user_images/" . $imgRow['productImage']);

    // it will delete an actual record from db
    $stmt_delete = $DB_con->prepare('DELETE FROM products WHERE pID =:uid');
    $stmt_delete->bindParam(':uid', $_GET['delete_id']);
    $stmt_delete->execute();

    header("Location: stock.php");
}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link href="css/client.css" rel="Stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet" media="screen"> 
        <link href="css/datatables.min.css" rel="stylesheet" type="text/css">

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
                    $("body").load('stock.php');
                    $("body").fadeIn('slow');
                    window.location.href = "stock.php";
                });
            });

        });
    </script>
</head>
<body>
    <div class="b-container" style="box-shadow: 0 0 10px rgba(0,0,0,0.6);">
        <div class="container">
            <div class="row head">
               <?php
               session_start();
               ob_start();

               error_reporting(0);

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
            <div class="container">
                <h2 class="form-signin-heading" style = "color:green;">CURRENT STOCK</h2><hr />
                <button class="btn btn-info" type="button" id="btn-add"> <span class="glyphicon glyphicon-pencil"></span> &nbsp; UPDATE STOCK</button>
                <button class="btn btn-info" type="button" id="btn-view"> <span class="glyphicon glyphicon-eye-open"></span> &nbsp; VIEW STOCK</button>
                <hr />

                <div class="content-loader">

                    <table cellspacing="0" width="100%" id="example" class="table table-striped table-bordered table-hover table-responsive">
                        <thead>
                            <tr>
                                <th>PRODUCT NAME</th>
                                <th>PRODUCT IMAGE</th>
                                <th>PRODUCT DESC</th>
                                <th>PRODUCT TYPE</th>
                                <th>PRODUCT PRICE</th>
                                <th>EDIT</th>
                                <th>DELETE</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require_once '../dbconfig.php';

                            $stmt = $DB_con->prepare("SELECT * FROM products where Active!='NULL' ORDER BY pID");
                            $stmt->execute();
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                                <tr>
                                    <td><?php echo $row['productName']; ?></td>
                                    <td><img src="../user_images/<?php echo $row['productImage']; ?>" class="img-rounded" width="80" height="80" /></td>
                                    <td><?php echo $row['productDesc']; ?></td>
                                    <td><?php echo $row['productType']; ?></td>
                                    <td><?php echo $row['productPrice']; ?></td>
                                    <td align="center">
                                        <a class="btn btn-info" href="editform.php?edit_id=<?php echo $row['pID']; ?>" title="click for edit" onclick="return confirm('sure to edit = <?php echo $row['pID']; ?> ?')">
                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </a>
                                    </td>
                                    <td align="center">
                                        <a class="btn btn-warning" href="delete.php?delete_id=<?php echo $row['pID']; ?>" title="click for delete" onclick="return confirm('sure to delete = <?php echo $row['pID']; ?> ?')">
                                            <span class="glyphicon glyphicon-trash"></span>
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
            <script src="js/bootstrap.min.js"></script>
            <script type="text/javascript" src="js/datatables.min.js"></script>
            <script type="text/javascript" src="js/crud.js"></script>

            <script type="text/javascript" charset="utf-8">
                $(document).ready(function () {
                    $('#example').DataTable();

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
                    <a href="https://twitter.com"><img src="images/twitter.png" alt="twitter" class="img-responsive fimage"></a>
                </div>
                <div class="col-sm-1">
                    <a href="https://www.linkedin.com"><img src="images/linkedin-128.png" alt="linkedin" class="img-responsive fimage"></a>
                </div>
                <div class="col-sm-4">
                </div>
            </div>

        </div>
    </div>
</div>
</body>
</html>

