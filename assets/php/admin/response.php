<?php
include ('../php/connection.php');
if(isset($_POST['Respond'])){
    $ID = $_POST['ID'];
    $Response = $_POST['Response'];
    $Date = date("Y-m-d");
    $query = "UPDATE feedback SET Response = '$Response', sent = '$Date'";
    $result = $connection -> query($query);
    if($result){
        echo "<script>alert('Response has been successfully sent!')</script>";
        header ("refresh: 0; url=home.php#feedback"); // redirect to home if valid
        exit();
    }else{
        echo "<script>alert('Failed to send response!')</script>";
        header ("refresh: 0; url=home.php#feedback"); // redirect to home if valid
        exit();
    }
}

if(isset($_POST['Delete'])){
    $ID = $_POST['ID'];
    $Response = $_POST['Response'];
    $query = "DELETE FROM feedback WHERE ID = $ID";
    $result = $connection -> query($query);
    if($result){
        echo "<script>alert('Successfully deleted response!')</script>";
        header ("refresh: 0; url=home.php#feedback"); // redirect to home if valid
        exit();
    }else{
        echo "<script>alert('Failed to delete response!')</script>";
        header ("refresh: 0; url=home.php#feedback"); // redirect to home if valid
        exit();
    }
}
?>