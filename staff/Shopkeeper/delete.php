<?php

//error_reporting(~E_NOTICE);
require_once '../dbconfig.php';

if (isset($_GET['delete_id']) && !empty($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    $result = $DB_con->prepare("SELECT * FROM products WHERE pID= :userid");
    $result->bindParam(':userid', $id);
    $result->execute();


//        $fName = $_POST['fName'];
//        $lName = $_POST['lName'];
//        $gender = $_POST['gender'];
//        $emailAddress = $_POST['emailAddress'];
//        $type = $_POST['type'];
//        $uName = $_POST['uName'];
//        $password = $_POST['password'];
//        $confirmPassword = $_POST['confirmPassword'];
//        $id = $_POST['memids'];
    $active = NULL;


    $sql = "UPDATE products
        SET  Active=?
		WHERE pID=?";
    $q = $DB_con->prepare($sql);
    $q->execute(array($active, $id));
//header("location: members.php");

    if ($q) {
        ?>
 <script type="text/javascript">
            window.alert("Record Successfully Deleted ..");
            window.location.href = "index.php";
        </script>
        <?php
    } else {
        echo "Sorry Data Could Not Deleted !";
    }
}
?>