<?php
session_start();
include ('connection.php');
$ID = $_SESSION['ID'];
// check to see if student is in a room before going to leave forum
$query = "SELECT `RoomID` FROM `student_rooms` WHERE `StudentID` = $ID";
$result = $connection -> query($query);
$row = $result -> fetch_assoc();
$RoomID = $row['RoomID'];
// if the student doesnt have a room deny
if($RoomID == 0){
  echo "<script>alert('You need to be in a room to leave.')</script>";
  header ("refresh: 0; url=../student/home.php#dorms"); // redirect to home
}else{
    header ("refresh: 0; url=../student/leave.php"); // redirect to leave forum
}
?>