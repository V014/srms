<?php
// check to see if you have a balance.
$queryBalance = "SELECT Balance, Gender FROM students WHERE ID = $ID";
$resultBalance = $connection -> query($queryBalance);
$rowBalance = $resultBalance -> fetch_assoc();
if(!empty($rowBalance)){
    $Balance = $rowBalance['Balance'];
    $Gender = $rowBalance['Gender'];
}else{
    $Balance = "All clear";
}

// Check to see if student has been assgined to a room.
$queryRoom = "SELECT RoomID FROM student_rooms WHERE StudentID = $ID";
$resultRoom = $connection -> query($queryRoom);
$rowRoom = $resultRoom -> fetch_assoc();
if($rowRoom){
    $RoomID = $rowRoom['RoomID'];
}else{
    $RoomID = "Unallocated";
}

// check to see who is your roomate.
if($RoomID == "Unallocated"){
    $Roommate = "No roommate";
} else {
    $queryRoomate = "SELECT sr.StudentID, FirstName, LastName, RoomID FROM student_rooms AS sr INNER JOIN students AS s ON sr.StudentID = s.ID WHERE Gender = '$Gender' AND sr.RoomID = $RoomID AND sr.StudentID != $ID";
    $resultRoomate = $connection -> query($queryRoomate);
    $rowRoomate = $resultRoomate -> fetch_assoc();
    $RoomMateID = $rowRoomate['StudentID'];
    $RoomMateFirstName = $rowRoomate['FirstName'];
    $RoomMateLastName = $rowRoomate['LastName'];
    // display on the dashboard
    if(!empty($rowRoomate && $RoomID)){
        $Roommate = $RoomMateFirstName . " " . $RoomMateLastName;
    } else {
        $Roommate = "No roommate";
    }  
}

// check to see if you recently sent a room request
$queryRequests = "SELECT `StudentID` FROM `requests` WHERE `StudentID` = $ID";
$resultRequests = $connection -> query($queryRequests);
$rowRequests = $resultRequests -> fetch_assoc();

if (!empty($rowRequests)) {
    $Request = "Pending";
} else {
    $Request = "No requests to show";
}

// check to see if you recently sent a leave request
$queryLeave = "SELECT `StudentID` FROM `leaving` WHERE `StudentID` = $ID";
$resultLeave = $connection -> query($queryLeave);
$rowLeave = $resultLeave -> fetch_assoc();
$leaveID = $rowLeave['StudentID'];

if (!empty($leaveID)) {
    $Leave = "Pending";
} else {
    $Leave = "No requests to show";
}

// check to see if you recently sent a room leave request
$queryLeave = "SELECT `StudentID` FROM `leave_room` WHERE `StudentID` = $ID";
$resultLeave = $connection -> query($queryLeave);
$rowLeave = $resultLeave -> fetch_assoc();
$leaveID = $rowLeave['StudentID'];

if (!empty($leaveID)) {
    $LeaveRoom = "Pending";
} else {
    $LeaveRoom = "No requests to show";
}

// check to see if there is a forum taking place
$queryForum = "SELECT `Topic` FROM Forum";
$resultForum = $connection -> query($queryForum);
$rowForum = $resultForum -> fetch_assoc();

if (!empty($rowForum)) {
	$Forum = $rowForum['Topic'];
} else {
	$Forum = "No live forums";
}

?>