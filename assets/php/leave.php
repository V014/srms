<?php
session_start();
include ('connection.php');
$ID = $_SESSION['ID']; // ID
$Date = Date("Y-m-d"); // Date
$Time = Date("H:i:s"); // Time
if(isset($_POST['Confirm'])){
    // identify which room the student was in
    $query = "SELECT RoomID FROM student_rooms WHERE StudentID = $ID";
    $result = $connection -> query($query);
    $row = $result -> fetch_assoc();
    $RoomID = $row['RoomID'];
    if($RoomID){
        // conditions for responses
        if(!empty($_POST['Reason']) && !empty($_POST['Explanation'])){
            $Reason = $_POST['Reason'];
            $Explanation = $_POST['Explanation'];
            // insert reason explanantion and  into the leaving table
            $query1 = "INSERT INTO leaving VALUES(NULL, $ID, '$Reason', '$Explanation', $RoomID, '$Date', '$Time')";
            $result1 = $connection -> query($query1);
            echo "<script>alert('Thank you for providing us with your feedback!.')</script>";
        }elseif(!empty($_POST['Reason'])){
            $Reason = $_POST['Reason'];
            // if reson only given, insert reason into the leaving table
            $query2 = "INSERT INTO leaving (ID, StudentID, Reason, RoomID, Date, Time) VALUES (Null, $ID, '$Reason', $RoomID, '$Date', '$Time')";
            $result2 = $connection -> query($query2);
            echo "<script>alert('Thank you for providing us with your feedback!.')</script>";
            
        }elseif(!empty($_POST['Explanation'])){
            $Explanation = $_POST['Explanation'];
            // if explanation only given insert explanantion into the leaving table
            $query3 = "INSERT INTO leaving (ID, StudentID, Explanation, RommID, Date, Time) VALUES (Null, $ID, '$Explanation', $RoomID, '$Date', '$Time')";
            $result3 = $connection -> query($query3);
            echo "<script>alert('Thank you for providing us with your feedback!.')</script>";
        }else{
            // if no reason or explanation given insert minimal details into the leaving table
            $query4 = "INSERT INTO leaving (ID, StudentID, RoomID, Date, Time) VALUES (Null, $ID, $RoomID, '$Date', '$Time')";
            $result4 = $connection -> query($query4);
            echo "<script>alert('Thank you for providing us with your feedback!.')</script>";
        }
        // then delete their existance of their allocation
        $query5 = "DELETE FROM student_rooms WHERE StudentID = $ID";
        $result5 = $connection -> query($query5);
        if($result5){
            header ("refresh: 0; url=../../home.php#dorms");
        }else{
            echo "<script>alert('Failed to remove you from your room!.')</script>";
            header ("refresh: 0; url=../../leave.php#dorms");
        }
    }else{
        echo "<script>alert('You don't have a room to leave!.')</script>";
            header ("refresh: 0; url=../../leave.php#dorms");
    }
    
}
?>