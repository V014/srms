<?php
session_start();
include ('../connection.php');
include ('../utils.php');
$AdminID = $_SESSION['ID'];
$password = esctxt($connection, $_POST['password']);
$newpassword = esctxt($connection, $_POST['newpassword']);
$confirmpassword = esctxt($connection, $_POST['confirmpassword']);

if (isset($_POST['updatepassword'])){
    $queryPassword = "SELECT Password FROM admin WHERE ID = $AdminID";
    $resultPassword = $connection -> query($queryPassword);
    $rowPassword = $resultPassword -> fetch_assoc();
    $currentPassword = $rowPassword['Password'];

    if($currentPassword == $Password){

        $_SESSION['updateUsername'] = "Username updated!";
        $_SESSION['alert'] = "alert-success";
        header ("Location: ../../../adminprofile.php#usernameupdate"); // redirect to home if valid
        exit();
    }else{
        $_SESSION['updateUsername'] = "Failed to confirm password!";
        $_SESSION['alert'] = "alert-danger";
        header ("Location: ../../../adminprofile.php#usernameupdate"); // redirect to home if valid
        exit();
    }
}
?>