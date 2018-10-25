<?php

//error_reporting(~E_NOTICE);
require_once '../dbconfig.php';

if (isset($_GET['delet_id']) && !empty($_GET['delet_id'])) {
    $id = $_GET['delet_id'];
    $result = $DB_con->prepare("SELECT * FROM orders WHERE orderID= :userid");
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

        
            $sql = "UPDATE orders 
        SET  Active=?
		WHERE orderID=?";
            $q = $DB_con->prepare($sql);
            $q->execute(array($active, $id));
//header("location: members.php");

            if ($q) {
                echo "Order Successfully Verified ...";
                header("refresh:2;ViewOrders.php");
            } else {
                echo "Sorry Order Could Not be Verified !";
                header("refresh:3;ViewOrders.php");
            }
        
           

        
    }
    
    if (isset($_GET['delete_id']) && !empty($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    $result = $DB_con->prepare("SELECT * FROM inquriy WHERE inquiryID= :userid");
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

        
            $sql = "UPDATE inquriy 
        SET  Active=?
		WHERE inquiryID=?";
            $q = $DB_con->prepare($sql);
            $q->execute(array($active, $id));
//header("location: members.php");

            if ($q) {
                echo "Order Successfully Verified ...";
                header("refresh:2;multiple_orders.php");
            } else {
                echo "Sorry Order Could Not be Verified !";
                header("refresh:3;multiple_orders.php");
            }
        
           

        
    }

    ?>