<?php
session_start();
$ID = $_SESSION['ID'];
include ("connection.php");
if(isset($_POST['Send'])){
    $RecieverID = $_POST['ID'];
    $Message = $_POST['Message'];
    $Date = Date("Y-m-d");
    $query = "INSERT INTO messages VALUES(NULL, $ID, $RecieverID, '$Message', NULL, '$Date', NULL)";
    $result = $connection -> query($query);
    if($result){
        echo "<script>alert('Message sent!')</script>";
        header ("refresh: 0; url=../student/home.php#message"); // redirect to login if invalid
        exit();
    }else{
        echo "<script>alert('Message failed to send!')</script>" . mysqli_error($connection);
        //header ("refresh: 0; url=../student/home.php#message"); // redirect to login if invalid
        exit();
    }
}
?>