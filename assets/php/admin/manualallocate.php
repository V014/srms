<?php
include ('../php/connection.php');
if(isset($_POST['Allocate'])){
    $StudentID = $_POST['ID'];
    // collect student information
    $query = "SELECT FirstName, LastName, Gender FROM students WHERE ID = $StudentID";
    $result = $connection -> query($query);
    $row = $result -> fetch_assoc();
    $FirstName = $row['FirstName'];
    $LastName = $row['LastName'];
    $Gender = $row['Gender'];
    // bring up information about rooms
    $query3 = "SELECT ID FROM rooms WHERE Gender = '$Gender'";
    $result3 = $connection -> query($query3);
    while($row3 = $result3 -> fetch_assoc()){
        $ID = $row3['ID'];
    }
    // count occupants in each room
    $query4 = "SELECT COUNT(RoomID) FROM student_rooms WHERE RoomID = $ID";
    $result4 = $connection -> query($query4);
    $row4 = $result4 -> fetch_assoc();
    $Occupants = $row4['COUNT(RoomID)'];
    // choose a room with space
    $query5 = "SELECT ID FROM rooms WHERE $Occupants < Capacity AND Gender = '$Gender'";
    $result5 = $connection -> query($query5);
    while($row5 = $result5 -> fetch_assoc()){
        $Room = $row5['ID'];
    }
    // check if student already has a room
    $query6 = "SELECT StudentID, RoomID FROM student_rooms WHERE StudentID = $StudentID";
    $result6 = $connection -> query($query6);
    $row6 = $result6 -> fetch_assoc();
    $StudentinRoom = $row6['StudentID'];
    $RoomNumber = $row6['RoomID'];
    // make decision
    if($StudentinRoom == $StudentID){
        echo "<script>alert('$FirstName $LastName has already been assigned to room $RoomNumber')</script>";
        header ("refresh: 0; url=home.php#manualallocate");
        exit();
    }else{
        // assign student to room
        $query7 = "INSERT INTO student_rooms VALUES($StudentID, $Room)";
        $result7 = $connection -> query($query7);
        // give report on query
        if($result7){
            echo "<script>alert('$FirstName $LastName has been assigned to room $Room')</script>";
            header ("refresh: 0; url=home.php#manualallocate");
        exit();
        }else{
            echo "<script>alert('Failed to assign $FirstName $LastName to a room!')</script>" . mysqli_error($connection);
            exit();
        }
    }
}
if(isset($_POST['Remove'])){
    $StudentID = $_POST['ID'];
    $query ="DELETE FROM student_rooms WHERE StudentID = $StudentID";
    $results = $connection -> query($query);
    if($results){
        echo "<script>alert('Successfully removed student from room')</script>";
        header ("refresh: 0; url=home.php#manualallocate");
        exit();
    }else{
        echo "<script>alert('Successfully removed student from room')</script>" . mysqli_error($connection);
        exit();
    }
}
?>