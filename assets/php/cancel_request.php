<?php
session_start();
include ('connection.php');
$ID = $_SESSION['ID'];
// if user decides to cancel a request
if(isset($_POST['Cancel'])){
    // check if the student had previously sent a request
    $query = "SELECT `StudentID` FROM `requests` WHERE `StudentID` = '$ID'";
    $result = $connection -> query($query);
    $row = $result -> fetch_assoc();
    $StudentID = $row['StudentID'];
    // if they did delete the entry
    if(!empty($StudentID)){
        $query1 = "DELETE FROM `requests` WHERE `StudentID` = '$ID'";
        $result1 = $connection -> query($query1);
        // if query is successful
        if($result1){
            header ("refresh: 0; url=../student/home.php#dorms"); // redirect to home
        }else{
            echo "<script>alert('Failed to cancel your request, report to the admin!')</script>";
            header ("refresh: 0; url=../student/home.php#dorms"); // redirect to home
        }
    // if they didn't, tell them
    }else{
        echo "<script>alert('You should send a request to cancel it!')</script>";
        header ("refresh: 0; url=../student/home.php#dorms"); // redirect to home
    }
}
?>