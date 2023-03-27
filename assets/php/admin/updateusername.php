<?php
session_start();
$AdminID = $_SESSION['ID'];
include ('../connection.php');
include ('../utils.php');
$username = $_POST['Username'];
if (isset($username)){
    $query2 = "UPDATE `admin` SET `Username = '$username' WHERE `AdminID` = '$AdminID'";
    $result2 = $connection -> query($query2);

    if($result2){
        $_SESSION['updateUsername'] = "Username updated!";
        $_SESSION['alert'] = "alert-success";
        header ("Location: ../../../adminprofile.php#usernameupdate"); // redirect to home if valid
        exit();
    }else{
        $_SESSION['updateUsername'] = "Failed to update username!";
        $_SESSION['alert'] = "alert-danger";
        header ("Location: ../../../adminprofile.php#usernameupdate"); // redirect to home if valid
        exit();
    }
}
?>