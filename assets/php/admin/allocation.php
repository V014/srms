<?php
include ('../php/connection.php');
if(isset($_POST['Auto'])){
    // collect student information
    $query = "SELECT requests.StudentID, FirstName, LastName, Gender FROM requests INNER JOIN students ON requests.StudentID = students.ID";
    $result = $connection -> query($query);
    $row = $result -> fetch_assoc();
    $StudentID = $row['StudentID'];
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
    $row5 = $result5 -> fetch_assoc();
    $Room = $row5['ID'];
    // assign student to room
    $query6 = "INSERT INTO student_rooms VALUES($StudentID, $Room)";
    $result6 = $connection -> query($query6);
    // delete request 
    $query7 = "DELETE FROM requests WHERE StudentID = $StudentID";
    $result7 = $connection -> query($query7);
    // give report on query
    if($result7){
        echo "<script>alert('$FirstName $LastName has been assigned to room $Room')</script>";
        header ("refresh: 0; url=home.php");
        exit();
    }else{
        echo "<script>alert('Failed to assign $FirstName $LastName to a room!')</script>" . mysqli_error($connection);
        exit();
    }
}
?>