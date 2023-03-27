<?php
session_start();
include ('connection.php');
include ('details.php');
include ('dashboard.php');
include ('utils.php');
$ID = $_SESSION['ID'];

if(isset($_POST['leave'])){
date_default_timezone_set("Africa/Blantyre");
$Date = date('Y-m-d');

// check to see if student has already sent a request
$queryID = "SELECT `ID` FROM `leave_room` WHERE `StudentID` = $ID";
$resultID = $connection -> query($queryID);
$rowID = $resultID -> fetch_assoc();
$sutdent_id = $rowID['ID'];
    
    if (isset($sutdent_id)) {
        // return duplicate error
        $_SESSION['leave-room'] = "leave request pending";
        $_SESSION['alert'] = "alert-danger";
        header("Location: ../../room.php#leaving");
        exit(); 

    } else {
        // insert request
        $query = "INSERT INTO `leave_room` VALUES(NULL, $ID, $RoomID, '$Date', 'Pending')";
        $result = $connection -> query($query);
         if ($result) {
             // request sent
            $_SESSION['leave-room'] = "leave request sent";
            $_SESSION['alert'] = "alert-success";
            header("Location: ../../room.php#leaving");
            exit();
         } else {
            // request not sent
            $_SESSION['leave-room'] = "leave request error";
            $_SESSION['alert'] = "alert-danger";
            header("Location: ../../room.php#leaving");
            exit();
         }
    }
} // button leave

// if user decides to cancel a request
if(isset($_POST['cancel'])){
    // check if the student had previously sent a request
    $queryCheckLeave = "SELECT `StudentID` FROM `leave_room` WHERE `StudentID` = $ID";
    $resultCheckLeave = $connection -> query($queryCheckLeave);
    $rowCheckLeave = $resultCheckLeave -> fetch_assoc();
    $StudentID = $rowCheckLeave['StudentID'];

    if(isset($StudentID)){
        $queryCancelLeave = "DELETE FROM `leave_room` WHERE `StudentID` = $ID";
        $resultCancelLeave = $connection -> query($queryCancelLeave);

        // if query is successful
        if($resultCancelLeave){
            $_SESSION['leave-room'] = "Room leave canceled";
            $_SESSION['alert'] = "alert-success";
            header ("Location: ../../room.php#leaving"); // redirect to home
            exit();
        }else{
            $_SESSION['leave-room'] = "Room leave error";
            $_SESSION['alert'] = "alert-danger";
            header ("Location: ../../room.php#leaving"); // redirect to home
            exit();
        }
    // if they didn't, tell them
    }else{
        $_SESSION['leave-room'] = "No scheduled leave to abort";
        $_SESSION['alert'] = "alert-danger";
        header ("Location: ../../room.php#leaving"); // redirect to home
    }
}
?>