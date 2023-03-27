<?php
session_start();
include ('../connection.php');
include ('../utils.php');

if(isset($_POST['updateUsername'])){
    $Name = esctxt($connection, $_POST['Name']);
    // update username if thats all the user wants
    if(isset($Name) && empty($Password)){
        $query = "UPDATE `admin` SET `AdminName` = '$Name' WHERE `AdminID` = '$AdminID'";
        $result = $connection -> query($query);

        if($result){
            echo ("<script>alert('User updated successfully!')</script>");
            header ("refresh: 0; url=home.php"); // redirect to home if valid
        }else{
            echo ("<script>alert('User update failed!')</script>");
            header ("refresh: 0; url=home.php"); // redirect to home if valid
        }
    // update password if thats all the user wants
    } 
}
?>