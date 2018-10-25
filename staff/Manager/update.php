<?php

//error_reporting(~E_NOTICE);
require_once '../dbconfig.php';

if (isset($_GET['delete_id']) && !empty($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    $result = $DB_con->prepare("SELECT * FROM users WHERE uID= :userid");
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

        
            $sql = "UPDATE users 
        SET  Active=?
		WHERE uID=?";
            $q = $DB_con->prepare($sql);
            $q->execute(array($active, $id));
//header("location: members.php");

            if ($q) {
                echo "Record Successfully Updated ...";
                header("refresh:2;members.php");
            } else {
                echo "Sorry Data Could Not Updated !";
                header("refresh:3;members.php");
            }
        
           

        
    }

    ?>