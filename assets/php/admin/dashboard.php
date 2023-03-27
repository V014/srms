<?php

include ('../php/connection.php');

// count how many students there are in the databse
$query = "SELECT COUNT(ID) FROM students";
$result = $connection -> query($query);
$row = $result -> fetch_assoc();
$Students = $row['COUNT(ID)'];

if($row){
    echo("1. There '$Students' students registered.<br>");
}else{
    echo("1. Failed to count students.<br>");
}

// check girls room occupation
$query1 = "SELECT COUNT(student_rooms.StudentID) FROM student_rooms INNER JOIN students ON student_rooms.StudentID = students.ID WHERE Gender = 'Female'";
$result1 = $connection -> query($query1);
$row1 = $result1 -> fetch_assoc();
$assigned1 = $row1['COUNT(student_rooms.StudentID)'];

if($row1){
    if($assigned1 == 1){
        echo("2. '$assigned1' girl has been assigned to a room.<br>");
    }else{
        echo("2. '$assigned1' girls are assigned to a room.<br>");
    }
}else{
    echo("Female Room occupation unknown");
}

// check boys room occupation
$query2 = "SELECT COUNT(student_rooms.StudentID) FROM student_rooms INNER JOIN students ON student_rooms.StudentID = students.ID WHERE Gender = 'Male'";
$result2 = $connection -> query($query2);
$row2 = $result2 -> fetch_assoc();
$assigned2 = $row2['COUNT(student_rooms.StudentID)'];

if($row2){
    if($assigned2 == 1){
        echo("3. '$assigned2' boy has been assigned to a room.<br>");
    }else{
        echo("3. '$assigned2' boys are assigned to a room.<br>");
    }
}else{
    echo("Male Room occupation unknown");
}

$query3 = "SELECT *, COUNT(requests.StudentID) FROM students INNER JOIN requests ON students.ID = requests.StudentID";
$result3 = $connection -> query($query3);
$row3 = $result3 -> fetch_assoc();
$StudentID = $row3['StudentID'];
$FirstName = $row3['FirstName'];
$LastName = $row3['LastName'];
$Requests = $row3['COUNT(requests.StudentID)'];

if($Requests == 1){
    echo("4. $FirstName $LastName (ID: $StudentID) has requested for a room.<br>");
}elseif($Requests > 1){
    echo("4. '$Requests' students have requested for a room.<br>");
}else{
    echo("4. There are no room requests yet.<br>");
}

// check last notification
$query4 = "SELECT `notice` FROM `notification`";
$result4 = $connection -> query($query4);
$row4 = $result4 -> fetch_assoc();
$recent = $row4['notice'];

if($recent){
    echo("5. You wrote: $recent <br>");
}else{
    echo("5. You havent posted any notifications. <br>");
}

// check how many students have rooms
$query5 = "SELECT COUNT(RoomID) FROM student_rooms";
$result5 = $connection -> query($query5);
$row5 = $result5 -> fetch_assoc();
$assigned5 = $row5['COUNT(RoomID)'];

if($row5){
    if($assigned5 == 0){
        echo("6. 'All rooms are unoccupied.<br>");
    }elseif($assigned5 == 1){
        echo("6. '$assigned5' student has a room.<br>");
    }else{
        echo("6. '$assigned5' students have rooms.<br>");
    }
}else{
    echo("Room occupation unknown");
}

// Check how many student dont have rooms
$Roomless = $Students - $assigned5;
if($Roomless == 1){
    echo("7. '$Roomless' student doesnt have a room");
}else{
    echo("7. '$Roomless' students don't have rooms.");
}
?>