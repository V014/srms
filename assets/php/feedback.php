<?php
session_start();
include ('connection.php');
include ('utils.php');
$ID = $_SESSION['ID'];

if(!empty($_POST['message'])){
    $Message = esctxt($connection, $_POST['message']);
    $query = "INSERT INTO feedback VALUES(NULL, $ID, '$Message', '$Date', '$Time')";
    $result = $connection -> query($query);
    if($result){
        $_SESSION['feedback'] = "Message sent!";
        $_SESSION['alert'] = "alert-success";
        header ("Location: ../../feedback.php"); // redirect to home
        exit();
    }else{
        $_SESSION['feedback'] = "Message not sent!";
        $_SESSION['alert'] = "alert-danger";
        header ("Location: ../../feedback.php"); // redirect to home
        exit();
    }
} else {
    $_SESSION['feedback'] = "Write something first!";
    $_SESSION['alert'] = "alert-danger";
    header ("Location: ../../feedback.php"); // redirect to home
    exit();
}
?>