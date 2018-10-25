<?php

session_start();
include("../config.php");
$action = isset($_GET['action']) ? $_GET['action'] : '';

//-------------------------------------------------logout process-------------------------------------
if ($action == "logout") {
    session_destroy();
    ?>
    <script type="text/javascript">
        window.location = "../../admin/login.php";
    </script>
    <?php

}
//-------------------------------------------------client_delete-----------------------------------------------


require_once'../dbconfig.php';

if ($_REQUEST['delete']) {

    $pid = $_REQUEST['delete'];
    $query = "DELETE FROM products WHERE pID=:pid";

    $stmt = $DBcon->prepare($query);
    $stmt->execute(array(':pid' => $pid));

    if ($stmt) {
        echo "Product Deleted Successfully ...";
    }
}


//-------------------------------------------------client_edit-------------------------------------------------

if (ISSET($_POST['deleteproduct'])) {
    $prod_id = $_POST['pID'];

    $selquery = "SELECT*FROM products WHERE pID = $prod_id ";
    $sel_result = mysqli_query($conn, $selquery);

    while ($row = mysqli_fetch_array($sel_result)) {
        $delquery = "DELETE FROM products WHERE pID = $prod_id ";

        if (mysqli_query($conn, $delquery)) {
            ?>
            <script type="text/javascript">
                window.alert("Products Deleted");

            //                window.location.href = "stock.php";
            </script>
            <?php

            echo'my error' . mysqli_connect_error();
        } else {
            echo'client not deleted' . mysqli_connect_errno();
        }
    }
}

//-------------------------------------------------Logout_process----------------------------------------------


if ($action == "logout") {
    session_destroy();
    ?>
    <script type="text/javascript">
        window.location = "../../../index.php";
    </script>
    <?php

}

//----------------------------------------------edit_product---------------------------------------------------
if ($action == "logout") {
    session_destroy();
    ?>
    <script type="text/javascript">
        window.location = "../../../index.php";
    </script>
    <?php

}
?>