<?php
session_start();
include ('connection.php');
include ('details.php');
include ('dashboard.php');
include ('utils.php');
$ID = $_SESSION['ID'];

if(isset($_POST['leave'])){
date_default_timezone_set("Africa/Blantyre");
$DateTime = date('Y-m-d h:i:s');
$leaving = $_POST['leaving'];
$arriving = $_POST['arriving'];
$reason = esctxt($connection, $_POST['reason']);

// check to see if student has already sent a request
$queryID = "SELECT `ID` FROM `leaving` WHERE `StudentID` = $ID";
$resultID = $connection -> query($queryID);
$rowID = $resultID -> fetch_assoc();
$sutdent_id = $rowID['ID'];
    
    if (!empty($sutdent_id)) {
        // return duplicate error
        $_SESSION['leave'] = "leave request pending";
        $_SESSION['alert'] = "alert-danger";
        header("Location: ../../room.php#man");
        exit(); 

    } else {
        // insert request
        $query = "INSERT INTO `leaving` VALUES(NULL, $ID, '$reason', $RoomID, '$DateTime', '$leaving', '$arriving', 'Pending')";
        $result = $connection -> query($query);
         if ($result) {
             // request sent
            $_SESSION['leave'] = "leave request sent";
            $_SESSION['alert'] = "alert-success";
            header("Location: ../../room.php#man");
            exit();
         } else {
            // request not sent
            $_SESSION['leave'] = "leave request error";
            $_SESSION['alert'] = "alert-danger";
            header("Location: ../../room.php#man");
            exit();
         }
    }
} // button leave

// if user decides to cancel a request
if(isset($_POST['cancel'])){
    // check if the student had previously sent a request
    $queryCheckLeave = "SELECT `StudentID` FROM `leaving` WHERE `StudentID` = $ID";
    $resultCheckLeave = $connection -> query($queryCheckLeave);
    $rowCheckLeave = $resultCheckLeave -> fetch_assoc();
    $StudentID = $rowCheckLeave['StudentID'];

    if(isset($StudentID)){
        $queryCancelLeave = "DELETE FROM `leaving` WHERE `StudentID` = $ID";
        $resultCancelLeave = $connection -> query($queryCancelLeave);

        // if query is successful
        if($resultCancelLeave){
            $_SESSION['leave'] = "Room leave pending";
            $_SESSION['alert'] = "alert-success";
            header ("Location: ../../room.php#man"); // redirect to home
            exit();
        }else{
            $_SESSION['leave'] = "Room leave error";
            $_SESSION['alert'] = "alert-danger";
            header ("Location: ../../room.php#man"); // redirect to home
            exit();
        }
    // if they didn't, tell them
    }else{
        $_SESSION['leave'] = "No scheduled leave to abort";
        $_SESSION['alert'] = "alert-danger";
        header ("Location: ../../room.php#man"); // redirect to home
    }
}
?>